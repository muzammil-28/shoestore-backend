<?php
    session_start();
    include("../config/database.php");
    header("Content-Type: Application/json");
    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Credentials: true");

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