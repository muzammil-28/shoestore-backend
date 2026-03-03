<?php
    include("../config/database.php");
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");

    $slider_sql = $conn->prepare("SELECT * FROM slider");
    $slider_sql->execute();
    $slide_image = $slider_sql->get_result();

    $slides = [];
    while ($result = $slide_image->fetch_assoc()) {
        $slides[] = $result;
    }
    echo json_encode($slides);
?>