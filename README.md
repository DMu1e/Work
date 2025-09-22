# PHP User Registration with Email Verification

A small, practical example project that demonstrates user registration with email confirmation. It's meant to be simple to read and extend — great for learning or as a starter for your own project.

## What this does

- Let users register with name, email and password
- Send an email with a verification token to confirm addresses
- Store passwords securely using modern PHP hashing
- Use PHPMailer to send emails
- Simple Bootstrap-based UI
- Organized with PSR-4 autoloading

## Requirements

- PHP 8.0 or newer
- MySQL
- Composer

## Quick start

1. Clone the repo:

2. Install dependencies:

    ```bash
    composer install
    ```

3. Create the database table:

    Run this SQL to create the `users` table:

    ```sql
    CREATE TABLE `users` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `name` varchar(255) NOT NULL,
      `email` varchar(255) NOT NULL,
      `password` varchar(255) NOT NULL,
      `VerificationToken` varchar(255) DEFAULT NULL,
      `IsVerified` tinyint(1) DEFAULT 0,
      `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp(),
      PRIMARY KEY (`id`)
    );
    ```

## Configuration

1. Database

    Open `src/config/database.php` and put your database credentials:

    ```php
    <?php

    return [
        "host" => "mysqli",
        "dbname" => "your-database-name",
        "username" => "root",
        "password" => "your-database-password",
        "charset" => "utf8mb4",
    ];
    ```

2. Email

    Configure SMTP in `src/classes/Mailer.php` for your mail provider (the project uses Gmail by default):

    ```php
    // src/classes/Mailer.php

    // ...
    $this->mailer->Host = "your-smtp-host";
    $this->mailer->Username = "your-email@example.com";
    $this->mailer->Password = "your-email-password";
    // ...
    ```

3. Verification URL

    Make sure the verification link in `src/classes/Mailer.php` matches your environment:

    ```php
    // src/classes/Mailer.php

    // ...
    $verificationUrl = "http://localhost/your-project-directory/public/verify.php?token=" . $token;
    // ...
    ```

---

For demonstration, here are some sample rows from the database:

+----+-------------+-----------------------------+--------------------------------------------------------------+------------+------------------------------------------------------------------+---------------------+
| id | name        | email                       | password                                                     | IsVerified | VerificationToken                                                | CreatedAt           |
+----+-------------+-----------------------------+--------------------------------------------------------------+------------+------------------------------------------------------------------+---------------------+
|  1 | Test User   | test.1758515212@example.com | $2y$10$F9XfMtiuq28KyDwlU9UsTOp20DdqlYgpL5mjLGRCPWgDCRsxRxAFS |          0 | 394505374de793037386225224dda25f67602c9abdc31e7ed527287193f53149 | 2025-09-22 07:26:52 |
|  2 | Dalton Mule | daltonmulem@gmail.com       | $2y$10$IfR1zpwxyZGVA4R8VTQ.7eCYaJqMkx3UwB5tqPaWchMFjdN0XBRXa |          0 | 0c6a1fd3f3dbd28dd7479ae121a0cffd61de4a8855052fe42ef327d051a28d97 | 2025-09-22 07:28:28 |
|  3 | Adam Etyang | adam.etyang@strathmore.edu  | $2y$10$mtKhvLCV515ZhZq2BhDjdujHRRi9OBzxKDK89lU5z6v7eXVR73J8. |          0 | 69c8b03799937b9eafd67fd826c1281d104d1889361d380ce6026f86edd0add2 | 2025-09-22 07:39:09 |
+----+-------------+-----------------------------+--------------------------------------------------------------+------------+------------------------------------------------------------------+---------------------+






