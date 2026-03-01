<?php
    session_start();
    header("Content-Type: Application/json");
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

    if(isset($_SESSION["user_id"]))
    {
        echo json_encode([
            "login" => true,
            "user" => [
                "id" => $_SESSION["user_id"],
                "name" => $_SESSION["user_name"],
                "email" => $_SESSION["user_email"]
            ]
            ]);
    }else{
        echo json_encode([
            "login" => false
        ]);
    }
?>