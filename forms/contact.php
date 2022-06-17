<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
require("PHPMailer/src/PHPMailer.php");
require("PHPMailer/src/SMTP.php");
require("PHPMailer/src/Exception.php");

try {
	$mail = new PHPMailer\PHPMailer\PHPMailer(true);

    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.yandex.ru';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'sales@goqode.com';                     // SMTP username
    $mail->Password   = 'BKS@Sales@2020';                               // SMTP password
    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('sales@goqode.com', 'Sales GoQode');
    $mail->addAddress('sales@goqode.com');               // Name is optional

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $_POST['subject'];
    //$mail->Body    = 'Name: '. $_POST['name'] . '<br> Email: '. $_POST['email'] .'<br> Message: '. $_POST['message'].'';
    $mail->Body    = '<p><span style="text-decoration: underline;"><strong>This is the enquiry from GoQode Site</strong></span></p><p><strong>Name:</strong>&nbsp;'. $_POST['name'] .'</p><p><strong>Email:</strong>&nbsp;'. $_POST['email'] .'</p><p><strong>Message:</strong>&nbsp;'. $_POST['message'].'</p>';  

    $mail->send();
    echo 'OK';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>