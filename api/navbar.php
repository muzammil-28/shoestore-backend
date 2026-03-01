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
    
    $navbar_sql = $conn->prepare("SELECT * FROM navbar");
    $navbar_sql->execute();
    $navbar_item = $navbar_sql->get_result();

    $menu = [];
    while($navbar_result = $navbar_item->fetch_assoc())
    {
        $menu[] = $navbar_result;
    }
    
    echo json_encode($menu)
?>