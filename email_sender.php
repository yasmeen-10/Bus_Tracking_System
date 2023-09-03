<?php
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

require 'config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// Create a new PHPMailer instance
$mail = new PHPMailer();

// Configure SMTP settings
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server hostname
$mail->SMTPAuth = true;
$mail->Username   = 'applemac6364@gmail.com';
$mail->Password   = 'bidpvlsizkuhbgff';
$mail->SMTPSecure = 'tls';
$mail->Port = 587; // The SMTP port number

// Set the email subject and body
$subject = 'Location Update Reminder';
$body = 'Hello Driver Update your Current Bus Location Now.';

// Infinite loop to send emails every 5 minutes
while (true) {
    // Connect to the database
    // $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

    // Check the database connection
    // if ($conn->connect_error) {
    //     die('Failed to connect to the database: ' . $conn->connect_error);
    // }

    // Get the drivers' email addresses from the database
    $sql = 'SELECT Email FROM drivers';
    $result = mysqli_query($con, $sql);

    if ($result) {
        // Fetch each row from the result set
        while ($row = $result->fetch_assoc()) {
            $driverEmail = $row['Email'];

            // Set the recipient email address
            $to = $driverEmail;

            // Set the sender and recipient
            $mail->setFrom('applemac6364@gmail.com');
            $mail->addAddress($to);
            $mail->isHTML(true);

            // Set the email subject and body
            $mail->Subject = $subject;
            $mail->Body = $body;

            // Send the email
            if ($mail->send()) {
                echo 'Email sent successfully to ' . $to . '\n';
            } else {
                echo 'Failed to send the email to ' . $to . '. Error: ' . $mail->ErrorInfo . '\n';
            }
        }
    } else {
        echo 'Failed to retrieve driver emails from the database: \n';
    }

    // Close the database connection

    // Wait for 5 minutes before sending the next email
    sleep(300); // 5 minutes = 300 seconds
}
?>
