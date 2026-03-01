<?php
    session_start();
    header("Content-Type: application/json");
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

    if(!isset($_GET["id"]))
    {
        echo json_encode([
            "status" => false,
            "message" => "Id missing"
        ]);
        exit();
    }
    $type = $_GET["type"];
    $id = intval($_GET["id"]);

    if(!isset($_SESSION["user_id"]))
    {
        echo json_encode([
            "status" => false,
            "message" => "User id not found"
        ]);
        exit();
    }
    $user_id = intval($_SESSION["user_id"]);

    if($type === "cart")
    {
        $checkout_sql = $conn->prepare(
            "SELECT
                    cart.id AS cart_id,
                    cart.product_id,
                    cart.quantity,
                    cart.price,
                    products.name,
                    products.image
                    FROM cart
                    INNER JOIN products ON products.id = cart.product_id
                    WHERE cart.user_id = ? AND cart.id = ?
        ");
        $checkout_sql->bind_param("ii", $user_id, $id);
        $checkout_sql->execute();
    }else if($type === "product")
    {
        $checkout_sql = $conn->prepare(
            "SELECT 
                    cart.id AS cart_id,
                    cart.product_id,
                    cart.quantity,
                    cart.price,
                    products.name,
                    products.image
                    FROM cart
                    INNER JOIN products ON products.id = cart.product_id
                    WHERE cart.user_id = ? AND products.id = ?
        ");
        $checkout_sql->bind_param("ii", $user_id, $id);
        $checkout_sql->execute();
    }

    $checkout_product = $checkout_sql->get_result();
    $result = $checkout_product->fetch_assoc();

    echo json_encode($result);
?>