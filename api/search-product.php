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

    if(!isset($_GET["search-prod"]))
    {
        die("Value not found.");
    }

    $search = $_GET["search-prod"] ?? '';

    $search_sql = $conn->prepare("SELECT * FROM products INNER JOIN navbar ON navbar.id = products.category_id WHERE navbar.title LIKE '%$search%'");
    $search_sql->execute();
    $search_product = $search_sql->get_result();

    $products = [];
    while($result = $search_product->fetch_assoc())
    {
        $products[] = $result;
    }
    echo json_encode($products);
?>