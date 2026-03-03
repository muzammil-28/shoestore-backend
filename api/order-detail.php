<?php
    include("../config/database.php");
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");

    if(!isset($_GET["order_id"]))
    {
        die("Id missing.");
    }
    $order_id = $_GET["order_id"] ?? '';

    $order_detail_sql = $conn->prepare(
                "SELECT 
                        orders.id AS order_id,
                        orders.amount,
                        orders.status,
                        orders.created_at,
                        order_item.quantity,
                        products.name,
                        products.image
                        From orders INNER JOIN order_item
                        ON 
                        orders.id = order_item.order_id
                        INNER JOIN products 
                        ON 
                        order_item.product_id = products.id 
                        WHERE
                        orders.id = ?
    "
    );
    $order_detail_sql->bind_param("i", $order_id);
    $order_detail_sql->execute();
    $order_detail_product = $order_detail_sql->get_result();
    $result = $order_detail_product->fetch_assoc();
    
    echo json_encode($result);
?>