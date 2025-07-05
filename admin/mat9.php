<html>
    <head>
        <title>Yt Link Uploader</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
        <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f4f7;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-top: 30px;
        }

        form {
            width: 400px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px;
            vertical-align: top;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"],
        input[type="password"] {
            width: 95%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        input[type="submit"],
        input[type="reset"] {
            padding: 10px 20px;
            background: #2980b9;
            border: none;
            border-radius: 6px;
            color: white;
            cursor: pointer;
            margin: 10px 5px;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background: #3498db;
        }

        #area {
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
    </head>    
    <body>
        <form method = "post" action="">
            <table align = "center">
                <tr>
                 <h1 align = "center">
                      Class 8 maths
                </h1>
                </tr>
             <tr>
                <td>chapter1</td>
                <td><input type="text" placeholder = "Link Here" id = "nm" name = "chapter1" required></td>
             </tr>
               
               <tr>
                <td>
                    chapter2
                </td>
                <td>
                    <input type="text" placeholder="Link Here"   id ="age" name="chapter2">
                </td>
               </tr>
               <tr>
                <td>
                    chapter3
                </td>
                <td>
                    <input type="text" placeholder="Link Here" id = "eml"  name = " chapter3" required>
                </td>
               </tr>
               <tr>
                <td>
                        chapter4
                </td>
                <td>
                    <input type="text" placeholder="Link Here" id = "nmm" name = "chapter4" required>
                </td>
               </tr>
                <tr>
                 <td colspan="2" align="center">
                        <input type="submit" name="submit" value="Upload">
                 </td>
                    <td><input type="reset" ></td>
                </tr>
            </table>
<?php
 if(isset($_POST["submit"] ))
                {
 $corn = mysqli_connect("localhost","root","","class9");
 echo "hi";
 extract ($_POST);
$d = "INSERT INTO maths (chapter1, chapter2, chapter3, chapter4) 
      VALUES ('$chapter1', '$chapter2', '$chapter3', '$chapter4')";
  if(!$corn){
    die("Connection Failed: " . mysqli_connect_error());
  }

 $a = mysqli_query($corn,$d);
  if($a){
    ?>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Link Uploaded Successfully!',
        text: 'You can now proceed to the next step.',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = "mat9.php";
        }
    });
</script>

      <?php
  }
  else{
    ?>
    <script>
        alert("Link Not Uploaded");
        window.location ="mat9.php";
        </script>
        <?php
  }
                }

?>
        </form>
    
</body>

</html>