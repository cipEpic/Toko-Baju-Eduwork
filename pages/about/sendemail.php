<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['Name'];
  $email = $_POST['Email'];
  $message = $_POST['Message'];

  // Email configuration
  $to = "tugas.cipe@gmail.com";  // Replace with your email address
  $subject = "New Contact Form Submission";
  $headers = "From: $name <$email>";

  // Compose the email message
  $email_message = "Name: $name\n";
  $email_message .= "Email: $email\n";
  $email_message .= "Message: $message\n";

  // Send the email
  if (mail($to, $subject, $email_message, $headers)) {
    echo "Email sent successfully.";
  } else {
    echo "Error sending email.";
  }
}

header("location:manajemen.php");
?>
