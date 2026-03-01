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

    $data = json_decode(file_get_contents("php://input"), true);
    $user_id = $_SESSION["user_id"];
    $product_id = intval($data["product_id"]);
    $product_name = $data["product_name"];
    $product_quantity = intval($data["product_quantity"]);
    $total_amount = floatval($data["total"]);
    $payment_method = $data["payment_method"];

    // check product exist
    $product_sql = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $product_sql->bind_param("i", $product_id);
    $product_sql->execute();
    $fetch_product = $product_sql->get_result();
    $product_result = $fetch_product->fetch_assoc();

    if(!$product_result)
    {
        echo json_encode([
            "status" => false,
            "message" => "product not found."
        ]);
        exit();
    }

    // insert into order
    $order_sql = $conn->prepare(
        "INSERT INTO `orders`
                (`user_id`, `name`, `amount`, `status`, `created_at`) 
                VALUES 
                (?,?,?,'pending',NOW())");
    $order_sql->bind_param("isi", $user_id, $product_name, $total_amount);
    $order_sql->execute();
    $order_result = mysqli_insert_id($conn);

    // insert into order_item
    $product_price = $product_result['new_price'];

    $order_item_sql = $conn->prepare(
                "INSERT INTO `order_item`
                        (`order_id`, `product_id`, `quantity`, `price`) 
                        VALUES 
                        (?,?,?,?)"
    );
    $order_item_sql->bind_param("iiii", $order_result, $product_id, $product_quantity, $product_price);
    $order_item_sql->execute();
    echo json_encode([
        "status" => true,
        "message" => "Order placed Successfully",
        "order_id" => $order_result
    ]);
?>