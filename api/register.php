<?php
    include("../config/database.php");
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");

    if($_SERVER["REQUEST_METHOD"] === "OPTIONS")
    {
        http_response_code(200);
        exit;
    }

    $raw_data = file_get_contents("php://input");
    $data = json_decode($raw_data, true);

    if(!$data)
    {
        echo json_encode([
            "status"=> false,
            "message"=> "Data not received"
        ]);
        exit();
    }

    $fullname = trim($data["fullname"] ?? '');
    $email = trim($data["email"] ?? '');
    $password = trim($data["password"] ?? '');
    $confirm_pass = trim($data['confirmpass'] ??'');

    if($fullname == '' || $email == '' || $password == '' || $confirm_pass == '')
    {
        echo json_encode([
            "staus" => false,
            "message"=> "All fields are required."
        ]);
        exit();
    }

    // check kiya ka user ki email already register to ni ha 
    $email_sql = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $email_sql->bind_param("s", $email);
    $email_sql->execute();
    $result = $email_sql->get_result();

    if ($result->num_rows > 0) {
        echo json_encode([
            "status" => false,
            "message" => "Email already exist."
        ]);
        exit();
    }

    // Password hash
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    $confirm_pass_hashed = password_hash($confirm_pass, PASSWORD_DEFAULT);

    // insert user code 
    $insert_sql = $conn->prepare(
        "INSERT INTO users (fullname, email, password, confirmpassword) VALUES (?, ?, ?, ?)"
    );
    $insert_sql->bind_param("ssss", $fullname, $email, $password_hashed, $confirm_pass_hashed);

    if ($insert_sql->execute()) {
        echo json_encode([
            "status" => true,
            "message" => "User Successfully Registered."
        ]);
    } else {
        echo json_encode([
            "status" => false,
            "message" => "User not Registered"
        ]);
    }
?>