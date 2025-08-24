<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
$fname = $_SESSION['fname'] ?? 'Guest';
// --- CONFIG ---
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'smartstudy';


?>

<?php   // reset ranking

$con = mysqli_connect("localhost","root","","smartstudy"); 
if(!$con){ die("DB Connection failed: ".mysqli_connect_error()); }

$email = $_SESSION['email'] ?? null;

// --- Reset Ranking ---
if($email && $_SERVER['REQUEST_METHOD']==='POST' && ($_POST['action'] ?? '') === 'reset_ranking'){
    mysqli_begin_transaction($con);
            logActivity($con, $email, "Reset ranking");
    try{
         // Delete subject rankings
        $del1 = mysqli_prepare($con, "DELETE FROM subject_rankings WHERE email=?");
        mysqli_stmt_bind_param($del1, 's', $email);
        mysqli_stmt_execute($del1);
        mysqli_stmt_close($del1);

        // Delete timetable too
        $del2 = mysqli_prepare($con, "DELETE FROM user_timetables WHERE email=?");
        mysqli_stmt_bind_param($del2, 's', $email);
        mysqli_stmt_execute($del2);
        mysqli_stmt_close($del2);


        mysqli_commit($con);
        echo json_encode(['status'=>'success','message'=>'Your ranking has been reset.']);
    } catch(Throwable $e){
        mysqli_rollback($con);
        echo json_encode(['status'=>'error','message'=>'Reset failed: '.$e->getMessage()]);
    }
    exit;
}


// ✅ handle save ranking (your old code)
if($email && $_SERVER['REQUEST_METHOD']==='POST' && ($_POST['action'] ?? '') === 'save_ranking'){
    mysqli_begin_transaction($con);
    try{
        $del = mysqli_prepare($con,"DELETE FROM subject_rankings WHERE email=?");
        mysqli_stmt_bind_param($del,'s',$email); 
        mysqli_stmt_execute($del); 
        mysqli_stmt_close($del);

        $ins = mysqli_prepare($con,"INSERT INTO subject_rankings (email, subject, difficulty_level) VALUES (?,?,?)");
        foreach($SUBJECTS as $s){
            $field = 'diff_'.strtolower($s);
            $lvl = isset($_POST[$field]) ? max(1,min(5,(int)$_POST[$field])) : 3;
            mysqli_stmt_bind_param($ins,'ssi',$email,$s,$lvl);
            mysqli_stmt_execute($ins);
        }
        mysqli_stmt_close($ins);

        mysqli_commit($con);
        $save_ok = true; 
        $save_msg = 'Rankings saved.';
    } catch(Throwable $e){
        mysqli_rollback($con);
        $save_ok = false; 
        $save_msg = 'Save failed: '.$e->getMessage();
    }
}
?>

<?php
// Subjects and colors
$SUBJECTS = ['Maths','Physics','Chemistry','Biology']; // Same order every day
$LEVEL_TEXT = [1=>'Very Easy',2=>'Easy',3=>'Medium',4=>'Hard',5=>'Very Hard'];
$COLORS = [
  'Maths'=>'#3b82f6','Physics'=>'#10b981','Chemistry'=>'#f59e0b','Biology'=>'#8b5cf6',
  'Food'=>'#ef4444','Break'=>'#64748b'
];

// DB connect
$con = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);
if(!$con) { die("DB connect error: ".htmlspecialchars(mysqli_connect_error())); }
mysqli_set_charset($con,'utf8mb4');





// Helper functions
function h($s){ return htmlspecialchars((string)$s,ENT_QUOTES,'UTF-8'); }
function time_str($ts){ return date('g:i A',$ts); }
function logActivity($conn, $email, $activity) {
    $stmt = $conn->prepare("INSERT INTO student_activity (student_email, activity) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $activity);
    $stmt->execute();
    $stmt->close();
}


// identify student
$email = $_SESSION['email'] ?? null;

// handle ranking save (if any)
$save_ok = null; $save_msg = '';
if($email && $_SERVER['REQUEST_METHOD']==='POST' && ($_POST['action'] ?? '') === 'save_ranking'){
  mysqli_begin_transaction($con);
  try{
    $del = mysqli_prepare($con,"DELETE FROM subject_rankings WHERE email=?");
    mysqli_stmt_bind_param($del,'s',$email); mysqli_stmt_execute($del); mysqli_stmt_close($del);

    $ins = mysqli_prepare($con,"INSERT INTO subject_rankings (email, subject, difficulty_level) VALUES (?,?,?)");
    foreach($SUBJECTS as $s){
      $field = 'diff_'.strtolower($s);
      $lvl = isset($_POST[$field]) ? max(1,min(5,(int)$_POST[$field])) : 3;
      mysqli_stmt_bind_param($ins,'ssi',$email,$s,$lvl);
      mysqli_stmt_execute($ins);
    }
    mysqli_stmt_close($ins);
    mysqli_commit($con);
    $save_ok = true; $save_msg = 'Rankings saved.';
  } catch(Throwable $e){
    mysqli_rollback($con);
    $save_ok = false; $save_msg = 'Save failed: '.$e->getMessage();
  }
}

// load rankings (default Medium=3 if missing)
$rankings = [];
if($email){
  $sel = mysqli_prepare($con,"SELECT subject,difficulty_level FROM subject_rankings WHERE email=?");
  mysqli_stmt_bind_param($sel,'s',$email); mysqli_stmt_execute($sel);
  $res = mysqli_stmt_get_result($sel);
  while($r = mysqli_fetch_assoc($res)) $rankings[$r['subject']] = (int)$r['difficulty_level'];
  mysqli_stmt_close($sel);
}
foreach($SUBJECTS as $s) if(!isset($rankings[$s])) $rankings[$s]=3;

// Week key (Mon of this week)
$today = new DateTime('today');
$weekStartDT = clone $today; $weekStartDT->modify('monday this week');
$weekStart = $weekStartDT->format('Y-m-d');

// load existing timetable for this week
$existing_timetable = null;
if($email){
  $sel = mysqli_prepare($con,"SELECT schedule_json FROM user_timetables WHERE email=? AND week_start=? LIMIT 1");
  mysqli_stmt_bind_param($sel,'ss',$email,$weekStart); mysqli_stmt_execute($sel);
  $res = mysqli_stmt_get_result($sel);
  if($r = mysqli_fetch_assoc($res)){ $existing_timetable = json_decode($r['schedule_json'], true); }
  mysqli_stmt_close($sel);
}

// determine if rankings exist in DB
$has_rankings_in_db = false;
if($email){
  $q = mysqli_query($con,"SELECT 1 FROM subject_rankings WHERE email='".mysqli_real_escape_string($con,$email)."' LIMIT 1");
  $has_rankings_in_db = (bool)mysqli_fetch_row($q);
}

// Generate timetable if none exists yet (Mon–Sun), SAME SUBJECT ORDER DAILY, no holiday handling
if(!$existing_timetable && $email && $has_rankings_in_db){
  $week_schedule = array_fill(0, 7, []);

  // helper to timestamp on a given date
  $ts = function(DateTime $date, $h, $m=0){ return strtotime($date->format('Y-m-d').sprintf(' %02d:%02d:00',$h,$m)); };

  // study windows: weekdays (Mon-Fri) 06:00am–07:00am , and 19:00–22:00; weekends (Sat/Sun) 10:00–13:00, 14:30–19:00, 20:30–22:00
  $get_windows = function(DateTime $date) use($ts){
    $dow = (int)$date->format('N'); // 1..7
    $windows = [];
    if($dow >= 6){ // Sat/Sun
      $windows[] = [$ts($date,10,0), $ts($date,13,0)];
      $windows[] = [$ts($date,14,30), $ts($date,19,0)];
      $windows[] = [$ts($date,20,30), $ts($date,22,30)];
    } else { // Weekdays
      $windows[] = [$ts($date,6,0), $ts($date,7,0)];
      $windows[] = [$ts($date,19,0), $ts($date,22,30)];
    }
    return $windows;
  };

  // Food blocks only on weekends, placed between study windows (not on top)
  $day_foods = array_fill(0,7,[]);
  for($d=0;$d<7;$d++){
    $dt = clone $weekStartDT; $dt->modify("+$d day");
    $dow = (int)$dt->format('N');
    if($dow >= 6){
      $day_foods[$d][] = ['start'=>$ts($dt,13,0),'end'=>$ts($dt,14,30),'type'=>'Food'];
      $day_foods[$d][] = ['start'=>$ts($dt,19,0),'end'=>$ts($dt,20,30),'type'=>'Food'];
    }
  }

  for($d=0;$d<7;$d++){
    $dt = clone $weekStartDT; 
    $dt->modify("+$d day");
    $windows = $get_windows($dt);

    $slots = $day_foods[$d]; // include food; we’ll sort later

    // 🔹 Randomize subjects for this day (no repeats in one day)
    $dailySubjects = $SUBJECTS;
    shuffle($dailySubjects);

    // Split subjects across windows
    $windowSubjects = array_chunk($dailySubjects, ceil(count($dailySubjects)/count($windows)));

    foreach($windows as $wIdx=>$win){
        $cursor = $win[0];
        $subjectsForWindow = $windowSubjects[$wIdx] ?? [];

        foreach($subjectsForWindow as $subj){
            // ensure we’re inside the window
            if($cursor + 3600 > $win[1]) break;

            // check overlap with food
            $jumped = false;
            foreach($day_foods[$d] as $fd){
                if(!($cursor + 3600 <= $fd['start'] || $cursor >= $fd['end'])){
                    $cursor = max($cursor, $fd['end']);
                    $jumped = true;
                    break;
                }
            }
            if($jumped && $cursor + 3600 > $win[1]) break;

            // place the study session
            $sStart = $cursor;
            $sEnd   = $sStart + 3600;

            // skip if overlaps food
            $overlap = false;
            foreach($day_foods[$d] as $fd){
                if(!($sEnd <= $fd['start'] || $sStart >= $fd['end'])){ $overlap = true; break; }
            }
            if($overlap){
                foreach($day_foods[$d] as $fd){
                    if(!($sEnd <= $fd['start'] || $sStart >= $fd['end'])){ $cursor = $fd['end']; break; }
                }
                if($cursor + 3600 > $win[1]) break;
                continue; // retry subject
            }

            $slots[] = [
              'start'=>$sStart,
              'end'=>$sEnd,
              'type'=>'Study',
              'subject'=>$subj,
              'level'=>$rankings[$subj] ?? 3
            ];
            $cursor = $sEnd;

            // 🔹 Insert 10-min break only if NOT last session of window
            $BREAK_MIN = 10 * 60;
            if($cursor + $BREAK_MIN <= $win[1] - 1800){ // leave at least 30 mins margin
                $breakStart = $cursor;
                $breakEnd   = $cursor + $BREAK_MIN;

                // skip break if it overlaps food
                $breakOverFood = false; $alignAfterFood = null;
                foreach($day_foods[$d] as $fd){
                    if(!($breakEnd <= $fd['start'] || $breakStart >= $fd['end'])){
                        $breakOverFood = true;
                        $alignAfterFood = $fd['end'];
                        break;
                    }
                }
                if(!$breakOverFood){
                    $slots[] = ['start'=>$breakStart,'end'=>$breakEnd,'type'=>'Break'];
                    $cursor = $breakEnd;
                } else {
                    $cursor = $alignAfterFood;
                }
            }
        } // end foreach subjects in window
    } // end foreach windows

    // sort by time
    usort($slots, function($a,$b){ return $a['start'] <=> $b['start']; });
    $week_schedule[$d] = $slots;
}


  // Save schedule JSON (persist for the week)
  $schedule_json = json_encode($week_schedule);
  $ins = mysqli_prepare($con,"INSERT INTO user_timetables (email, week_start, schedule_json, created_at)
                              VALUES (?,?,?,NOW())
                              ON DUPLICATE KEY UPDATE schedule_json=VALUES(schedule_json), created_at=NOW()");
  mysqli_stmt_bind_param($ins,'sss',$email,$weekStart,$schedule_json);
  mysqli_stmt_execute($ins);
  mysqli_stmt_close($ins);

  $existing_timetable = $week_schedule;
}

// Use existing timetable (if any)
$week_schedule = $existing_timetable ?? null;

// Determine current or next session label
$now = time();
$currentLabel = 'No session right now';
if($week_schedule){
  $found = null; $upcoming = null;
  for($d=0;$d<7;$d++){
    foreach($week_schedule[$d] as $slot){
      if($slot['type']==='Study'){
        if($now >= $slot['start'] && $now < $slot['end']){ $found = $slot; break 2; }
        if($slot['start'] > $now){ if($upcoming===null || $slot['start'] < $upcoming['start']) $upcoming = $slot; }
      }
    }
  }
  if($found) $currentLabel = 'Studying now: '.$found['subject'].' ('.$LEVEL_TEXT[$found['level']].')';
  elseif($upcoming) $currentLabel = 'Next: '.$upcoming['subject'].' at '.time_str($upcoming['start']);
}

// Check whether to show ranking form (only if no prior rankings stored)
$has_prior = false;
if($email){
  $q = mysqli_query($con,"SELECT 1 FROM subject_rankings WHERE email='".mysqli_real_escape_string($con,$email)."' LIMIT 1");
  $has_prior = (bool)mysqli_fetch_row($q);
}

// HTML output
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Study Planner</title>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<style>
        /* Back Button Styles */
        .back {
            margin: 20px;
            text-align: left;
            border-bottom: 1px solid #1f2937;
            padding-bottom: 10px;
        }

        .back a {
            display: inline-block;
            padding: 8px 16px;
            background-color: #1f2937;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            transition: background-color 0.2s ease, transform 0.2s ease;
        }

        .back a:hover {
            background-color: #374151; /* Lighter gray on hover */
            transform: translateX(-4px); /* Arrow animation */
        }
    </style>
<style>
:root{ --bg:#0f172a; --card:#0b1220; --muted:#94a3b8; --text:#e5e7eb; --border:#1f2937; --accent:#22d3ee; }
*{ box-sizing:border-box }
body{ margin:0; font-family:Inter,system-ui,-apple-system,Segoe UI,Roboto,sans-serif; background:linear-gradient(135deg,#0f172a,#0b1020); color:var(--text) }
.container{ max-width:1200px; margin:28px auto; padding:18px }
.card{ background:rgba(11,18,32,.85); border:1px solid var(--border); border-radius:14px; padding:18px; box-shadow:0 10px 30px rgba(0,0,0,.35) }
h1{ margin:0 0 6px; font-size:26px }
.sub{ color:var(--muted); margin-bottom:12px }
.row{ display:grid; grid-template-columns:180px 1fr; gap:12px; align-items:center; padding:10px; border:1px solid var(--border); border-radius:12px; background:#0b1322; margin-bottom:8px }
select{ width:100%; padding:8px 10px; border-radius:8px; border:1px solid #263246; background:#071026; color:var(--text) }
.actions{ display:flex; gap:10px; justify-content:flex-end; margin-top:10px }
.btn{ padding:8px 12px; border-radius:10px; cursor:pointer; font-weight:600; border:1px solid transparent }
.primary{ background:linear-gradient(90deg,#06b6d4,#22d3ee); color:#001018 }
.badge{ display:inline-block; padding:6px 10px; border-radius:999px; border:1px solid #1f2937; background:#071023; color:var(--muted) }
.legend{ display:flex; gap:10px; flex-wrap:wrap; margin-top:10px }
.chip{ display:inline-flex; align-items:center; gap:8px; padding:6px 10px; border-radius:999px; border:1px solid #1f2937; background:#071022; font-size:13px }
.dot{ width:12px; height:12px; border-radius:999px }
.table{ width:100%; border-collapse:collapse; margin-top:12px }
.table th{ text-align:center; padding:8px; background:#071022; border:1px solid var(--border); border-radius:6px }
.col{ width:14%; vertical-align:top; padding:8px }
.slot{ background:#071022; border:1px solid #122233; border-radius:10px; padding:8px; margin-bottom:8px; text-align:center }
.note{ color:var(--muted); font-size:13px; margin-top:8px }
.small{ font-size:12px; color:#94a3b8 }
</style>
</head>
<body>
    <div class="back">
    <a href="dashboard.php">← Back to Dashboard</a>
</div>

<div class="container">
  <div class="card">
    <h1>📚 Study Planner</h1>
    <div class="sub">Logged in as: <strong><?php echo h($fname ?: 'Guest'); ?></strong></div>
    <div class="badge">Now/Next: <?php echo h($currentLabel); ?></div>

    <?php if(!$email): ?>
      <div class="note">⚠️ No email in session. Login is required to save rankings & timetable.</div>
    <?php endif; ?>

    <?php if($email && !$has_prior): ?>
      <h2 style="margin-top:12px">Rank your subjects</h2>
      <p class="sub">Pick how hard each subject feels (used to label sessions). You will not be asked again after saving.</p>
      <form method="post">
        <input type="hidden" name="action" value="save_ranking">
        <?php foreach($SUBJECTS as $s):
            $pref = $rankings[$s] ?? 3;
        ?>
          <div class="row">
            <label for="diff_<?php echo strtolower($s); ?>" style="font-weight:700"><?php echo h($s); ?></label>
            <select id="diff_<?php echo strtolower($s); ?>" name="diff_<?php echo strtolower($s); ?>">
              <?php foreach($LEVEL_TEXT as $k=>$txt): $sel = ($k==$pref)?'selected':''; ?>
                <option value="<?php echo $k;?>" <?php echo $sel;?>><?php echo h($txt);?></option>
              <?php endforeach;?>
            </select>
          </div>
        <?php endforeach;?>
        <div class="actions"><button class="btn primary" type="submit">Save Rankings & Generate Timetable</button></div>
      </form>
    <?php else: ?>
      <div style="margin-top:12px" class="badge">✅ Rankings saved — timetable generated (fixed for this week).</div>
    <?php endif; ?>

    <h2 style="margin-top:16px">This Week's Timetable (Mon → Sun)</h2>
    <div class="legend">
      <?php foreach($SUBJECTS as $s): ?>
        <div class="chip"><span class="dot" style="background:<?php echo $COLORS[$s]; ?>;border:1px solid rgba(0,0,0,.2)"></span><?php echo h($s);?></div>
      <?php endforeach; ?>
      <div class="chip"><span class="dot" style="background:<?php echo $COLORS['Food']; ?>"></span>Food</div>
      <div class="chip"><span class="dot" style="background:<?php echo $COLORS['Break']; ?>"></span>Break</div>
    </div>

    <?php if(!$week_schedule): ?>
      <div class="note" style="margin-top:12px">No timetable yet. Save rankings to generate your weekly timetable.</div>
    <?php else: ?>
      <table class="table" role="table">
        <tr>
          <?php
            $dayNames = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
            for($i=0;$i<7;$i++):
              $dateStr = date('d M Y', strtotime($weekStart." +$i day"));
          ?>
              <th>
                <?php echo h($dayNames[$i]); ?><br>
                <span class="small"><?php echo h($dateStr); ?></span>
              </th>
          <?php endfor; ?>
        </tr>
        <tr>
          <?php for($d=0;$d<7;$d++): ?>
            <td class="col">
              <?php
                $slots = $week_schedule[$d];
                if(empty($slots)){ echo '<div class="slot">No sessions</div>'; }
                else{
                  foreach($slots as $sl){
                    if($sl['type']==='Study'){
                      $bg = $COLORS[$sl['subject']] ?? '#0f172a';
                      echo '<div class="slot" style="background:'.$bg.'; color:#001018">';
                      echo '<div style="font-weight:700">'.h($sl['subject']).'</div>';
                      $lvl = $sl['level'] ?? null;
                      if($lvl) echo '<div style="font-size:12px">'.h($LEVEL_TEXT[$lvl]??'').'</div>';
                      echo '<div style="font-size:12px">'.h(time_str($sl['start']).' - '.time_str($sl['end'])).'</div>';
                      echo '</div>';
                    } elseif($sl['type']==='Food'){
                      $bg = $COLORS['Food'];
                      echo '<div class="slot" style="background:'.$bg.'; color:#fff">🍽️ Food<br><div style="font-size:12px">'.h(time_str($sl['start']).' - '.time_str($sl['end'])).'</div></div>';
                    } else { // Break
                      $bg = $COLORS['Break'];
                      echo '<div class="slot" style="background:'.$bg.'; color:#fff">☕ Break<br><div style="font-size:12px">'.h(time_str($sl['start']).' - '.time_str($sl['end'])).'</div></div>';
                    }
                  }
                }
              ?>
            </td>
          <?php endfor; ?>
        </tr>
      </table>
    <?php endif; ?>

<div class="note">
    Rules: Weekends → 10:00–22:00 with food at 13:00–14:30 & 19:00–20:30.
    Weekdays → 06:00–07:00 and 19:00–22:00.
    A 10-minute break is placed between study sessions when space allows.
</div>

<!-- Reset Ranking Button -->
<button id="resetRankingBtn" style="
    margin-top: 10px; 
    padding: 8px 14px; 
    background-color: #dc2626; 
    color: white; 
    border: none; 
    border-radius: 5px;">
    Reset Ranking
</button>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.getElementById('resetRankingBtn').addEventListener('click', function() {
    fetch('', {   // same page
        method: 'POST',
        body: new URLSearchParams({ action: 'reset_ranking' })
    })
    .then(r => r.json())
    .then(res => {
        Swal.fire('Done', res.message, 'success').then(() => {
            location.reload(); // reload page to show fresh "Rank your subject"
        });
    })
    .catch(err => {
        Swal.fire('Error', 'Something went wrong!', 'error');
    });
});
</script>
<script>
<?php if($save_ok===true): ?>
  Swal.fire({icon:'success',title:'Saved',text:<?php echo json_encode($save_msg);?>,timer:1600,showConfirmButton:false}).then(()=>{ location.href = location.href; });
<?php elseif($save_ok===false): ?>
  Swal.fire({icon:'error',title:'Error',text:<?php echo json_encode($save_msg);?>});
<?php endif; ?>
</script>
</body>
</html>
