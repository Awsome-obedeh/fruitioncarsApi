
<?php
$supportMail = "info@optimustok.com";
$supportPassword = 'Teslaoptimus@2024';

require 'vendor/autoload.php';
// load enviroment files
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Access environment variables

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$date = date('Y');
function sendContactEmail($fullname, $phone, $message, $recipientEmail) {
    $mail = new PHPMailer(true);
    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.titan.email'; // Replace with your SMTP host
        $mail->SMTPAuth = true;
        $mail->Username =  $_ENV['SMTP_USERNAME']; // Replace with your SMTP username
        $mail->Password =  $_ENV['SMTP_PASSWORD']; // Replace with your SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email Headers
        $mail->setFrom($_ENV['SMTP_USERNAME'], 'Fruition Motors');
        $mail->addAddress($recipientEmail);
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';

        // Email Body
        $emailBody = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px; }
                .container { max-width: 600px; background: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
                .header { background: #007bff; color: white; padding: 10px; text-align: center; border-radius: 8px 8px 0 0; }
                .content { padding: 20px; }
                .footer { text-align: center; font-size: 12px; color: #777; margin-top: 20px; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>New Contact Form Submission</h2>
                </div>
                <div class='content'>
                    <p><strong>Full Name:</strong> {$fullname}</p>
                    <p><strong>Phone Number:</strong> {$phone}</p>
                    <p><strong>Message:</strong></p>
                    <p style='background: #f9f9f9; padding: 10px; border-left: 4px solid #007bff;'>{$message}</p>
                </div>
                <div class='footer'>
                    <p>&copy; " . date('Y') . " Your Website. All rights reserved.</p>
                </div>
            </div>
        </body>
        </html>
        ";
        
        $mail->Body = $emailBody;
        if($mail->send()){
            echo json_encode(
                ["msg"=>"User contact saved"]
            );
        }

        return true;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>