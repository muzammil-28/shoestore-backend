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

    $category_sql = $conn->prepare("SELECT * FROM navbar");
    $category_sql->execute();
    $category_result = $category_sql->get_result();
    $category = [];
    while($row = $category_result->fetch_assoc())
    {
        $category[] = $row;
    }
    echo json_encode($category);
?>