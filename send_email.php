<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/phpmailer/src/Exception.php';
require 'vendor/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate the email address
    if (isset($_POST["email_address"]) && filter_var($_POST["email_address"], FILTER_VALIDATE_EMAIL)) {
        $email = htmlspecialchars($_POST["email_address"]);

        // Create an instance of PHPMailer
        // echo $email;
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->Host = 'smtp.gmail.com';
            $mail->Username = 'anuragmahto1968@gmail.com';
            $mail->Password = 'kcqa buvb gofm qfgi';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('anuragmahto1968@gmail.com', 'Your Name');
            $mail->addAddress($email, 'User');
            $mail->addReplyTo('anuragmahto1968@gmail.com', 'Your Name');

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Welcome to BloodHub! Your Journey to Save Lives Begins Here';
            $emailContent = '<!DOCTYPE html>
                            <html lang="en">
                            <head>
                                <meta charset="UTF-8">
                                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                <title>Welcome to BloodHub!</title>
                            </head>
                            <body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
                                <h3 style="color: #333;">Dear ' . $email . ',</h3>
                                <p style="color: #333;">Welcome to BloodHub!</p>
                                <p style="color: #333;">We are thrilled to have you as part of our community dedicated to saving lives through blood donation. Your willingness to contribute can make a significant difference in the lives of those in need.</p>
                                
                                <h3 style="color: #333;">Here’s what you can do next:</h3>
                                <ol>
                                    <li style="color: #333;">Complete Your Profile:
                                        <ul style="color: #333;">
                                            <li style="color: #333;">Ensure your information is up-to-date so we can match you with donation opportunities that fit your schedule and eligibility.</li>
                                            <li style="color: #333;"><a href="register.php" style="color: #007bff; text-decoration: none;">Complete Profile</a></li>
                                        </ul>
                                    </li>
                                    <li style="color: #333;">Learn About Blood Donation:
                                        <ul>
                                            <li style="color: #333;">Understand the process, benefits, and impact of blood donation.</li>
                                            <li><a href="canyoudonate.php" style="color: #007bff; text-decoration: none;">See the Resources</a></li>
                                        </ul>
                                    </li>
                                    <li style="color: #333;">Find Donation Opportunities:
                                        <ul>
                                            <li><a href="donate.php" style="color: #007bff; text-decoration: none;">Link to donation opportunities</a></li>
                                        </ul>
                                    </li>
                                </ol>
                                
                                <h3 style="color: #333;">Stay Connected:</h3>
                                <ul>
                                    <li style="color: #333;">Follow us on social media for the latest news, success stories, and events:
                                        <ul>
                                            <li>
                                                <a href="https:https://www.instagram.com/anurag_m301/">Instagram</a>,
                                                <a href="https://www.facebook.com/">Facebook</a>,
                                                <a href="https://twitter.com/andycandy3251">Twitter</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                
                                <h3 style="color: #333;">Need Assistance?</h3>
                                <ul>
                                    <li style="color: #333;">Our support team is here to help you with any questions or concerns.</li>
                                    <li style="color: #333;">Email: <a href="mailto:anuragmahto1968@gmail.com" style="color: #007bff; text-decoration: none;">anuragmahto1968@gmail.com</a></li>
                                    <li style="color: #333;">Mobile: +91 7558 9513 51 | Telephone: 0484-292674</li>
                                </ul>
                                
                                <p style="color: #333;">Thank you for joining us in this life-saving mission. Together, we can bridge the gap between donors and recipients, providing a seamless and efficient experience for all.</p>
                                
                                <p style="color: #333;">Warm Regards,</p>
                                <p style="color: #333;">Anurag Mahto</p>
                                <p style="color: #333;">Founder of BloodHub</p>
                                <p><a href="index.php" style="color: #007bff; text-decoration: none;">BloodHub</a></p>
                                <hr>
                            </body>
                            </html>';
            $mail->Body = $emailContent;                                
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            // Send email
            if ($mail->send()) {
                $_SESSION['status'] = $email;
                
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "bloodhub";
                // Create a connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                // Prepare and execute the SQL query to insert the email into the database
                
                $stmt = $conn->prepare("INSERT INTO response_back (email) VALUES (?)");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $stmt->close();
                $conn->close();
                $_SESSION['last_page'] = $_SERVER['HTTP_REFERER'];
                header("Location: {$_SERVER["HTTP_REFERER"]}");
                exit();
            } else {
                $_SESSION['status'] = "";
                $_SESSION['last_page'] = $_SERVER['HTTP_REFERER'];
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit();
            }
        } catch (Exception $e) {
            $_SESSION['status'] = "";
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
} else {
    $_SESSION['last_page'] = $_SERVER['HTTP_REFERER'];
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
