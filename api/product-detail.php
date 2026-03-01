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
    if(!isset($_GET["id"]))
    {
        echo json_encode([
            "status"=> false,
            "message"=> "id missing"
        ]);
        die;
    } 

    $id = $_GET["id"];

    $product_detail_sql = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $product_detail_sql->bind_param('i', $id);
    $product_detail_sql->execute();
    $product_result = $product_detail_sql->get_result();

    if(!$product_detail_sql)
    {
        echo json_encode([
            "status" => false,
            "message"=> "Query Failed."
        ]);
        die;
    }

    $products = $product_result->fetch_assoc();

    // images ka liye 
    $images_sql = $conn->prepare("SELECT image FROM product_images WHERE product_id = ?");
    $images_sql->bind_param('i', $id);
    $images_sql->execute();
    $images_result = $images_sql->get_result();
    $images = [];
    while($row = $images_result->fetch_assoc())
    {
        $images[] = $row['image'];
    }
    $products['image'] = $images;

    echo json_encode($products);
?>