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

+----+-------------+------------------------+--------------------------------------------------------------+------------+------------------------------------------------------------------+---------------------+
| id | name        | email                  | password                                                     | IsVerified | VerificationToken                                                | CreatedAt           |
+----+-------------+------------------------+--------------------------------------------------------------+------------+------------------------------------------------------------------+---------------------+
|  1 | Dalton Mule | daltonm2411@gmail.com | $2y$12$ouUa90/P8O3TuWjiHJGk9ebJxixIG9vGB0kyBrD7p/065vOEVQFJu |          0 | bdb0082ad9cef5e7452527c3f7b73085178a484471247db03aa7d2fd06bad769 | 2025-09-12 19:14:44 |
|  2 | Dalton Mule | daltonmulem@gmail.com  | $2y$12$ISKU.OGzVkM7ynCrQC9MT.ifST4C6JpMcc1GKcFj6un6SpIrKQCzC |          0 | fa404f487fa91a83f5a1e69a57ee0df5cf9fdf14e333258ff89faeb6f4a33f8a | 2025-09-12 19:28:36 |
+----+-------------+------------------------+--------------------------------------------------------------+------------+------------------------------------------------------------------+---------------------+







