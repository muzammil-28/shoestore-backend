<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'mailer/src/Exception.php';
    require 'mailer/src/PHPMailer.php';
    require 'mailer/src/SMTP.php';
    require 'config.php';

    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");

    if($_SERVER["REQUEST_METHOD"] === "OPTIONS")
    {
        http_response_code(200);
        exit();
    }

    $mail_data = json_decode(file_get_contents("php://input"), true);
    $fullname = trim($mail_data["fullName"] ?? '');
    $email = trim($mail_data["email"] ?? '');
    $subject = trim($mail_data["subject"] ?? '');
    $description = trim($mail_data["description"] ?? '');

    if($fullname === '' || $email === '' || $subject === '' || $description === '')
    {
        echo json_encode([
            "status" => false,
            "message" => "All fields are required."
        ]);
        exit();
    }

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = SMTP_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_USERNAME;
        $mail->Password = SMTP_PASSWORD;
        $mail->SMTPSecure = 'tls';
        $mail->Port = SMTP_PORT;

        $mail->setFrom(SMTP_USERNAME, 'ShoeStore');
        $mail->addAddress('muzammilislam31@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = "$subject";
        $mail->Body = "
            <h2>Complaint Received</h2>
            <p>Name : $fullname</p>
            <p>Email : $email</p>
            <p>Message : $description</p>
        ";

        // user ko msg send ho ga 

        $mail->clearAddresses();
        $mail->addAddress($email);

        $mail->Subject = "Complaint Successfully Sent to ShoeStore";
        $mail->Body = "
            <h2>Hello $fullname 👋</h2>
            <p>Your complaint has been <b>successfully sent</b>.</p>
            <p>Our support team will contact you shortly.</p>
            <hr>
            <p><b>Your Complaint:</b></p>
            <p>$description</p>
            <br>
            <p>Thank you for contacting us.</p>
            <p><b>ShoeStore Support Team</b></p>
        ";

        $mail->send();

        if($mail->send())
        {
            echo json_encode([
            "status" => true,
            "message" => "Email was successfully sent."
            ]);
        }
    } catch (Exception $e) {
        echo "Error: " . $mail->ErrorInfo;
    }
?>