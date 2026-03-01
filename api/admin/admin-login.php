<?php
    session_start();
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: https://shoestore-mi.netlify.app");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    include("../config/database.php");

    if($_SERVER["REQUEST_METHOD"] === "OPTIONS")
    {
        http_response_code(200);
        exit();
    }

    $data = json_decode(file_get_contents("php://input"), true);
    $email = trim($data["userEmail"] ?? '');
    $password = trim($data["userPassword"] ?? '');
    $role = 1;

    if($email === '' || $password === '')
    {
        echo json_encode([
            "status" => false,
            "message" => "All Fields are Required."
        ]);
        exit();
    }

    $login_sql = $conn->prepare("SELECT * FROM users WHERE role = ?");
    $login_sql->bind_param("i",$role);
    $login_sql->execute();
    $login_result = $login_sql->get_result();
    $data = $login_result->fetch_assoc();

    if($data["email"] === $email && password_verify($password, $data["password"]))
    {
        $_SESSION["user_email"] = $email;
        echo json_encode([
            "status" => true,
            "data" => $data,
            "message" => "Login Successful"
        ]);
    }else{
        echo json_encode([
            "status" => false,
            "message" => "User not Login"
        ]);
    }
    
?>