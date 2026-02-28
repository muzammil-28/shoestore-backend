<?php
    include("../../config/database.php");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Method: POST");
    header("Access-Control-Allow-Headers: Content-Type");

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