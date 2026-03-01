<?php
    header("Access-Control-Allow-Origin: https://shoestore-mi.netlify.app");
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    header("Content-Type: application/json");

    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        http_response_code(200);
        exit();
    }
	include("../config/database.php");
    $products_sql = $conn->prepare("SELECT * FROM products");
    $products_sql->execute();
    $result = $products_sql->get_result();
    $products = [];
    while ($product = $result->fetch_assoc()) {
        $products[] = $product;
    }
    echo json_encode($products);
?>