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

    $category_id = $_GET['category_id'] ?? '';

    if ($category_id == '') {
        echo json_encode([
            "status" => false,
            "message" => "Category id missing"
        ]);
        exit;
    }

    $category_sql = $conn->prepare("SELECT * FROM products WHERE category_id = ?");
    $category_sql->bind_param("i", $category_id);
    $category_sql->execute();
    $category_product = $category_sql->get_result();

    $products = [];

    while ($row = $category_product->fetch_assoc()) {
        $products[] = $row;
    }

    echo json_encode([
        "status" => true,
        "data" => $products
    ]);
?>