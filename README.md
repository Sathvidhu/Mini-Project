# Smart Study Planner

[![PHP](https://img.shields.io/badge/PHP-8.1%2B-777BB4?logo=php&logoColor=white)](https://www.php.net/)
[![MariaDB](https://img.shields.io/badge/Database-MariaDB%2FMySQL-003545?logo=mariadb&logoColor=white)](https://mariadb.org/)
[![Frontend](https://img.shields.io/badge/Frontend-HTML%20%7C%20CSS%20%7C%20JavaScript-E34F26?logo=html5&logoColor=white)](https://developer.mozilla.org/)

A PHP web application for students to access study materials, organize a weekly study routine, and practice subject- and chapter-based mock tests. It also includes student account/profile pages and an administrator area for student and learning-material management.

> **Project status:** This repository contains multiple iterations and legacy/template files. Database connection settings and schema references vary between pages; review the setup notes and verify the modules you need before using the application beyond a local development environment.

## Table of Contents

- [Project Overview](#project-overview)
- [Key Features](#key-features)
- [Screenshots](#screenshots)
- [Technology Stack](#technology-stack)
- [Project Architecture](#project-architecture)
- [Folder Structure](#folder-structure)
- [Database Configuration](#database-configuration)
- [Installation and Setup](#installation-and-setup)
- [How to Run the Application](#how-to-run-the-application)
- [Application Modules](#application-modules)
- [Future Enhancements](#future-enhancements)
- [Contributing](#contributing)
- [License](#license)

## Project Overview

Smart Study Planner is intended for students who want a central place to browse subject resources, plan study sessions, and practice course material. The current codebase includes a student-facing PHP site, database-backed registration and login, a profile form, a weekly timetable planner, and pages for videos, PDFs, question papers, and mock-test results. An administrator interface supports viewing student information and managing learning resources.

The repository also includes a separate `egss/` education-template site, duplicated template assets, and older or experimental PHP pages. They are part of the repository but should not be assumed to be integrated into the primary student workflow.

## Key Features

Features below are based on functionality present in the PHP/HTML files; several modules depend on database tables and content being available.

- **Student registration and login:** `student/registration.php` inserts student details and `student/login.php` checks credentials and initializes session values.
- **Student profile:** `student/profile.php` collects parent and school details, subject marks, extracurricular activities, and hobbies.
- **Personalized weekly timetable:** `student/timetablee.php` saves difficulty rankings for Maths, Physics, Chemistry, and Biology and builds a Monday–Sunday schedule with study, break, and weekend meal blocks. The schedule is stored per student and week.
- **Study-resource navigation:** `student/dashboard.php` links students to subject video classes, PDFs, question papers, timetable, and results/marks pages.
- **Chapter video lessons:** `student/videoclass.php` fetches chapter video IDs from the database and plays them using the YouTube IFrame API.
- **PDF learning materials:** `student/pdf.php` lists uploaded PDFs by class, subject, and chapter.
- **Mock tests and results:** `student/take_mocktest.php` loads chapter questions and options, records submitted answers, and `student/view_result.php` displays stored scores and answer review.
- **Activity and page-time records:** login/profile actions write to `student_activity`; `student/dashboard.php` sends elapsed-page time to `student/track_time.php`, which records it in `page_time`.
- **Administrator pages:** `admin/` includes an admin login/dashboard, student and parent information pages, and material upload/management pages.

**Not represented as a complete implemented feature:** a general-purpose study-task CRUD module, a distinct daily planner, or a comprehensive progress analytics dashboard. Avoid relying on these capabilities without further implementation and testing.

## Screenshots

No application screenshots were found in the repository. The existing `img/` directories contain site/template imagery, not verified captures of the running application, so no illustrative screenshots are presented as if they were real product screens.

To build a screenshot gallery, capture and add genuine screenshots such as:

1. Public landing page (`student/index.php`).
2. Student dashboard after login (`student/dashboard.php`).
3. Weekly timetable and subject-ranking form (`student/timetablee.php`).
4. Subject/chapter video list and player (`student/videoclass.php`).
5. PDF library or mock-test screen (`student/pdf.php`, `student/take_mocktest.php`).
6. Administrator dashboard and material management (`admin/index.php`, `admin/material.php`).

Save the captures under a future `screenshots/` directory and reference them with relative Markdown paths when they are available. The repository has not been changed to add screenshots or a placeholder directory.

## Technology Stack

- **Backend:** PHP (the SQL exports identify PHP 8.1.25); procedural PHP and `mysqli`/MySQLi.
- **Database:** MySQL-compatible database; the main SQL export is for MariaDB 10.4.32.
- **Frontend:** HTML, CSS/SCSS, and JavaScript.
- **UI libraries:** Bootstrap (locally bundled Bootstrap 4 assets and pages that also load Bootstrap 5 from a CDN), jQuery, Owl Carousel, and SweetAlert2.
- **External services/assets:** Google Fonts, Font Awesome, jsDelivr/CDN-hosted libraries, and YouTube's IFrame API are referenced by pages.

There is no Composer, npm, or frontend build manifest in the inspected project tree. `scss/style.scss` and Bootstrap source are present, while compiled CSS is also committed.

## Project Architecture

This is a traditional, page-oriented PHP application rather than a framework-based or API-driven application:

1. The browser requests a PHP page from `student/` or `admin/`.
2. PHP pages render HTML and handle form submissions in the same file.
3. Pages connect directly to MySQL/MariaDB using MySQLi and local connection literals.
4. PHP sessions carry student or administrator state; the database stores student records, rankings, schedules, activities, resources, and test answers.
5. Static CSS, JavaScript, images, and vendor libraries are served from repository directories; some pages also load libraries from external CDNs.

Database connection details are repeated in multiple scripts rather than supplied through a shared configuration file. Some pages use a different database name or an older schema, so the repository currently has no single consistent application-wide configuration/migration layer.

## Folder Structure

```text
.
├── admin/       Administrator pages and dashboard assets; also includes uploaded files
├── css/         Root-site compiled stylesheets
├── db/          SQL exports for smartstudy, admin, and class-specific databases
├── egss/        Separate Edukate-based education site/template and PHP pages
├── img/         Root-site images and template artwork
├── js/          Root-site JavaScript
├── lib/         Root-site vendor JavaScript and Owl Carousel assets
├── page/        Alternate registration/login UI prototype
├── parent/      Parent login/dashboard prototype pages
├── pdf/         Repository PDF file(s)
├── scss/        Bootstrap SCSS sources and root theme stylesheet
├── student/     Primary student-facing PHP pages and its own frontend assets
└── studentpdf/  Student PDF/resource files
```

The `admin/` and `student/` directories include their own pages and front-end assets. `egss/` and `student/egss/` contain duplicated education-template material. There is no root package/build manifest or shared PHP configuration file.

## Database Configuration

### Main database

The main export is `db/smartstudy (1).sql`. It creates a database named `smartstudy` and contains tables including `registration`, `page_time`, `student_activity`, `subject_rankings`, `table_student_subject_ranking`, and `user_timetables`. Other pages refer to additional tables for videos, PDFs, question papers, and mock tests.

The repository also includes `db/admin (1).sql`, `db/class8 (1).sql`, `db/class9 (1).sql`, and `db/class10 (1).sql`. These are separate exports, not a documented one-step schema installation. The SQL files have spaces and `(1)` in their filenames; quote paths when using shell commands.

### Import the available main SQL export

Create/import the database in phpMyAdmin, or from a terminal with MySQL/MariaDB tools:

```bash
mysql -u root -p < "db/smartstudy (1).sql"
```

The dump itself includes `CREATE TABLE` statements and selects the `smartstudy` database. If you use a different database account or password, update the connection settings in the PHP pages before running the application.

### Important schema and configuration caveats

- PHP files contain hard-coded connection parameters, usually `localhost`, user `root`, an empty password, and database `smartstudy`. Other pages use `smart`, `your_database_name`, or older table/column names. There is no central `.env` or connection configuration file.
- The checked-in `smartstudy` export does **not** define every table referenced throughout the PHP files (including several resource/video/mock-test tables). The other SQL exports are separate and do not provide a documented unified migration path. Some modules may therefore require additional tables/data or code/schema alignment before they work.
- Registration, login, and timetable implementations do not all use identical field names or credential flows. Test the specific flow and schema in a disposable local database.
- The SQL dump contains sample records. Do not use real student/parent personal information in a public deployment or commit production database exports.
- Several pages contain direct SQL construction and development-era credential assumptions. Treat the application as a local/demo project until database access, password storage, input validation, and session handling have been reviewed and secured.

## Installation and Setup

### Requirements

- PHP 8.1 or later with the `mysqli` extension enabled. The SQL export was generated with PHP 8.1.25.
- MySQL or MariaDB. The SQL export reports MariaDB 10.4.32.
- Apache or another PHP-capable web server. XAMPP is one convenient local option; a PHP development server can also serve the pages.
- A browser. Internet connectivity is needed for pages that load fonts, UI libraries, alerts, or video playback from external services.

### Steps

1. **Clone the repository.**

   ```bash
   git clone https://github.com/Sathvidhu/Mini-Project.git
   cd Mini-Project
   ```

2. **Start a MySQL/MariaDB server** and import `db/smartstudy (1).sql` as described above.

3. **Configure database access.** Update the connection values in the relevant PHP pages to match the local server. Because connection settings are duplicated, check the page/module you intend to run; do not assume one change updates every page.

4. **Review required tables.** Compare the SQL tables with the tables queried by your chosen module. Add or reconcile any missing resource/mock-test tables and data before using those modules. There is no repository-provided complete installer or seed script for all features.

5. **Use a local development database.** The committed SQL export includes sample personal data; use test data and avoid publishing real student records.

## How to Run the Application

### PHP development server

From the repository root, start the PHP built-in server:

```bash
php -S 127.0.0.1:8000
```

Then open the primary student landing page at [http://127.0.0.1:8000/student/](http://127.0.0.1:8000/student/) or [http://127.0.0.1:8000/student/index.php](http://127.0.0.1:8000/student/index.php). The administrator pages are under `/admin/`, for example `http://127.0.0.1:8000/admin/adminlogin.php`.

The server command serves files; it does not configure the database or resolve schema differences. Ensure PHP's MySQLi extension is enabled, the database is running, and the target page's database/table requirements are satisfied. If the built-in server does not route a directory URL as expected, use the explicit `index.php` URL.

### Apache/XAMPP

Place the cloned repository inside the web server's document root (for example, `htdocs/Mini-Project`), start Apache and MySQL, import the SQL dump, and visit:

```text
http://localhost/Mini-Project/student/index.php
```

## Application Modules

| Area | Entry points | Purpose |
| --- | --- | --- |
| Student public site | `student/index.php`, `student/studytips.html` | Landing page, registration/login entry points, and static study tips. |
| Student account/profile | `student/registration.php`, `student/login.php`, `student/profile.php` | Student account forms, session-based login, and profile/school/parent details. |
| Student dashboard/resources | `student/dashboard.php`, `student/pdf.php`, `student/videoclass.php`, `student/questionpaper.php` | Resource links, PDF listings, video lessons, and question-paper page. Availability depends on associated content and schema. |
| Planner | `student/timetablee.php`, `student/rank.php` | Subject difficulty rankings and weekly timetable generation/persistence. `student/timetable.php` is another implementation with different assumptions. |
| Tests and results | `student/take_mocktest.php`, `student/view_result.php`, `student/mocktest.php` | Database-backed chapter tests/results, plus a separate static sample quiz. |
| Administration | `admin/adminlogin.php`, `admin/index.php`, `admin/student.php`, `admin/parent.php`, `admin/material.php` | Admin login/dashboard, student/parent records, and learning-material management. |
| Parent and legacy pages | `parent/`, `page/`, `egss/` | Separate prototype or template pages; not documented as the primary integrated student workflow. |

## Future Enhancements

These are suggestions, not claims about existing functionality:

- Consolidate database settings into a shared configuration file or environment variables and provide a complete schema/migration installer.
- Align the registration, login, profile, and timetable schemas and remove obsolete/duplicate implementations.
- Use password hashing, prepared statements consistently, server-side validation, authorization checks, and secure session practices before deployment.
- Build task creation/completion workflows and reliable daily planning if task management is a project goal.
- Add validated progress summaries, timetable editing, schedule regeneration controls, and clearer test history.
- Add automated tests, a reproducible local setup (for example, Docker Compose), and current screenshots of actual application screens.
- Review third-party template and asset notices and document their attribution/license requirements.

## Contributing

Contributions are welcome. Before opening a pull request:

1. Open an issue describing the bug or proposed change.
2. Keep changes scoped to a module and avoid committing database dumps containing personal data, credentials, or uploads that are not intended for public distribution.
3. Test the affected page with the documented PHP/MySQL environment and note any required schema changes.
4. Include screenshots for user-interface changes and document new setup/configuration requirements.
5. Submit a pull request with a concise description, test steps, and any known limitations.

## License

No project-level license file is present at the repository root, so a license for the Smart Study Planner application is **not specified** here. The repository contains separate third-party/template license notices, including `admin/LICENSE`, `lib/owlcarousel/LICENSE`, and the Edukate template attribution/license information in `egss/READ-ME.txt`. Those notices apply to their respective included materials and should be reviewed before reuse or redistribution; they do not establish an overall license for this project.
