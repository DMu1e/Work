<?php

namespace Dalton\Work\classes;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
  private PHPMailer $mailer;

  public function __construct()
  {
    $this->mailer = new PHPMailer(true);

    // SMTP configuration
    $this->mailer->SMTPDebug = SMTP::DEBUG_SERVER;
    $this->mailer->isSMTP();
    $this->mailer->Host = "smtp.gmail.com";
    $this->mailer->SMTPAuth = true;
    $this->mailer->Username = "dalton.muindi@strathmore.edu";
    $this->mailer->Password = "gevp gyvz meaq ejdi"; // App password
    $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $this->mailer->Port = 587;

    $this->mailer->setFrom("dalton.muindi@strathmore.edu", "App");
  }

  public function sendVerificationEmail($email, $name, $token)
  {
    try {
      $this->mailer->addAddress($email, $name);

      $verificationUrl =
        "http://localhost/demos.localhost:8080/public/verify.php?token=" . $token;

      $this->mailer->isHTML(true);
      $this->mailer->Subject = "Confirm Your Registration";
      $this->mailer->Body = "
                <h2>Welcome, {$name}!</h2>
                <p>Thank you for signing up. To complete your registration, please confirm your email address by clicking the button below:</p>
                <a href='{$verificationUrl}' style='display:inline-block; background:#28a745; color:#fff; padding:12px 24px; border-radius:4px; text-decoration:none;'>Confirm Email</a>
                <p>If the button doesn't work, copy and paste this link into your browser:</p>
                <p><code>{$verificationUrl}</code></p>
                <hr>
                <small>If you did not create an account, please ignore this email.</small>
            ";

      return $this->mailer->send();
    } catch (Exception $e) {
      error_log("Mailer Error: " . $this->mailer->ErrorInfo);
      return false;
    }
  }
}
