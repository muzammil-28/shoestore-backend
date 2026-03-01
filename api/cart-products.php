<?php
    session_start();
    header("Content-Type: Application/json");
    header("Access-Control-Allow-Origin: https://shoestore-mi.netlify.app");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    include("../config/database.php");

    if($_SERVER["REQUEST_METHOD"] === "OPTIONS")
    {
        http_response_code(200);
        exit();
    }

    if(!isset($_SESSION["user_id"]))
    {
        die("User id not found.");
    }

    $user_id = $_SESSION["user_id"];

    $cart_product_sql = $conn->prepare("SELECT * FROM cart WHERE user_id = ?");
    $cart_product_sql->bind_param("i", $user_id);
    $cart_product_sql->execute();
    $cart_product = $cart_product_sql->get_result();
    $products = [];
    while($result = $cart_product->fetch_assoc())
    {
        $products[] = $result;
    }
    echo json_encode($products);
?>