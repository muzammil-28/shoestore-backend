<?php
    include("../config/database.php");

    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");

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