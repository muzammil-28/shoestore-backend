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

    $raw_data = file_get_contents("php://input");
    $data = json_decode($raw_data, true);

    $email = trim($data["email"] ?? '');
    $password = trim($data['password'] ?? '');

    if($data["email"] == "" || $data["password"] == "")
    {
        echo json_encode([
            "status" => false,
            "message"=> "Fill All Field."
        ]);
        exit();
    }

    // pehle database sa user ka data fetch kro 

    $user_sql = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $user_sql->bind_param("s", $email);
    $user_sql->execute();
    $user_res = $user_sql->get_result();
    $user_data = $user_res->fetch_assoc();

    // ab niche user ka data database sa compare kiya ha 

    if($user_data["email"] == $email && password_verify($password, $user_data["password"]))
    {
        $_SESSION["user_email"] = $email;
        $_SESSION["user_id"] = $user_data["id"];
        $_SESSION["user_name"] = $user_data["fullname"];
        echo json_encode([
            "status" => true,
            "message" => "User Successfully Login."
        ]);
    }else{
        echo json_encode([
            "status" => false,
            "message" => "Invalid Email and Password."
        ]);
    }
?>