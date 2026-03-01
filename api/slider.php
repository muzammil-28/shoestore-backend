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

    $slider_sql = $conn->prepare("SELECT * FROM slider");
    $slider_sql->execute();
    $slide_image = $slider_sql->get_result();

    $slides = [];
    while ($result = $slide_image->fetch_assoc()) {
        $slides[] = $result;
    }
    echo json_encode($slides);
?>