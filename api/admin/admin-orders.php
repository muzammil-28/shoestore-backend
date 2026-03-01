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

    $orders_sql = $conn->prepare("SELECT * FROM orders INNER JOIN order_item INNER JOIN users ON users.id = orders.user_id WHERE orders.id = order_item.order_id");
    $orders_sql->execute();
    $orders_result = $orders_sql->get_result();
    $orders = [];
    while($row = $orders_result->fetch_assoc())
    {
        $orders[] = $row;
    }
    echo json_encode($orders);
?>