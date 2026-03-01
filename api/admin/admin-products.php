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

    $products_sql = $conn->prepare("SELECT * FROM products");
    $products_sql->execute();
    $products_result = $products_sql->get_result();
    $products = [];
    while($row = $products_result->fetch_assoc())
    {
        $products[] = $row;
    }
    echo json_encode($products);
?>