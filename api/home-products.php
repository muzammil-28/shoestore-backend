<?php
    include("../config/database.php");
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");

    // $products_sql = "SELECT * FROM products";
    // $products_query = mysqli_query($conn, $products_sql);
    $products_sql = $conn->prepare("SELECT * FROM products");
    $products_sql->execute();
    $result = $products_sql->get_result();
    $products = [];
    while ($product = $result->fetch_assoc()) {
        $products[] = $product;
    }
    echo json_encode($products);
?>