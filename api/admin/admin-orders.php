<?php
    include("../../config/database.php");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Method: POST");
    header("Access-Control-Allow-Headers: Content-Type");

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