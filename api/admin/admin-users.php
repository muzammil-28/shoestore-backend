<?php
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: https://shoestore-mi.netlify.app");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    include("../config/database.php");

    if($_SERVER["REQUEST_METHOD"] === "OPTIONS")
    {
        http_response_code(200);
        exit();
    }

    $users_sql = $conn->prepare("SELECT * FROM users");
    $users_sql->execute();
    $users_result = $users_sql->get_result();
    $users = [];
    while($row = $users_result->fetch_assoc())
    {
        $users[] = $row;
    }
    echo json_encode($users);
?>