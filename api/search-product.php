<?php
    include("../config/database.php");
    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Methods: GET, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    header("Content-Type: application/json");

    if($_SERVER["REQUEST_METHOD"] === "OPTIONS")
    {
        http_response_code(200);
        exit();
    }

    if(!isset($_GET["id"]))
    {
        die("Value not found.");
    }

    $search = $_GET["id"] ?? '';
    $search_value = "$search";

    $search_sql = $conn->prepare(
                "SELECT products.* FROM products
                        INNER JOIN navbar ON navbar.id = products.category_id
                        WHERE products.name LIKE ?
                        OR navbar.title LIKE ?
    ");
    $search_sql->bind_param("ss", $search_value, $search_value);
    $search_sql->execute();
    $search_product = $search_sql->get_result();

    $products = [];
    while($result = $search_product->fetch_assoc())
    {
        $products[] = $result;
    }
    echo json_encode($products);
?>