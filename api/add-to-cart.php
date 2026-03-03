<?php
    session_start();
    include("../config/database.php");
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    
    if($_SERVER["REQUEST_METHOD"] === "OPTIONS")
    {
        http_response_code(200);
        exit();
    }

    if(!isset($_SESSION["user_email"]))
    {
        echo json_encode([
            "status" => false,
            "login" => false,
            "message" => "User not logged in."
        ]);
        exit();
    }

    $user_id = $_SESSION["user_id"];

    $cart_data = json_decode(file_get_contents("php://input"), true);
    $product_id = $cart_data["product_id"] ?? 0;
    $product_quantity = $cart_data["qty"] ?? 1;

    if($product_id <= 0){
        echo json_encode([
            "status"=> false,
            "message"=> "Invalid Product Id."
        ]);
        exit();
    }

    $product_sql = "SELECT image, name, new_price FROM products WHERE id = '$product_id'";
    $product_query = mysqli_query($conn, $product_sql);
    $product_result = mysqli_fetch_assoc($product_query);

    $product_sql = $conn->prepare("SELECT image, name, new_price FROM products WHERE id = ?");
    $product_sql->bind_param("i", $product_id);
    $product_sql->execute();
    $product_result = $product_sql->get_result();
    $fetch_product = $product_result->fetch_assoc();

    if(!$fetch_product)
    {
        echo json_encode([
            "status"=> false,
            "message"=> "Product not found."
        ]);
        exit();
    }

    $product_image = $fetch_product["image"];
    $product_name = $fetch_product["name"];
    $product_price = $fetch_product["new_price"];

    // check kro product exist krta ha agr krta ha to quantity update kr do
    // $check_sql = "SELECT id, quantity FROM cart WHERE user_id = '$user_id' AND product_id = '$product_id'";
    // $check_query = mysqli_query($conn, $check_sql);

    $check_sql = $conn->prepare("SELECT id, quantity FROM cart WHERE user_id = ? AND product_id = ?");
    $check_sql->bind_param("ii", $user_id, $product_id);
    $check_sql->execute();
    $check_result = $check_sql->get_result();

    if(mysqli_num_rows($check_result) > 0)
    {
        $row = $check_result->fetch_assoc();
        $new_quantity = $row["quantity"] + $product_quantity;
        // $update_sql = "UPDATE cart SET quantity = '$new_quantity' WHERE user_id = '$user_id' AND product_id = '$product_id'";
        // $update_query = mysqli_query($conn, $update_sql);

        $update_sql = $conn->prepare("UPDATE cart SET quantity = ? WHERE user_id = ? AND product_id = ?");
        $update_sql->bind_param("iii", $new_quantity, $user_id, $product_id);
        $update_sql->execute();

        echo json_encode([
            "status"=> true,
            "login" => true,
            "message"=> "quantity Successfully updated."
        ]);
        exit();
    }

    // $cart_sql = "INSERT INTO `cart`
    //                     (`user_id`, `image`, `name`, `product_id`, `quantity`, `price`) 
    //                     VALUES 
    //                     ('$user_id','$product_image','$product_name','$product_id','$product_quantity','$product_price')";
    // $cart_query = mysqli_query($conn, $cart_sql);

    $cart_sql = $conn->prepare("INSERT INTO `cart`
                        (`user_id`, `image`, `name`, `product_id`, `quantity`, `price`) 
                        VALUES 
                        (?,?,?,?,?,?)");
    $cart_sql->bind_param("issiii", $user_id, $product_image, $product_name,$product_id,$product_quantity, $product_price);
    $cart_sql->execute();
    if($cart_sql)
    {
        echo json_encode([
            "status"=> true,
            "login" => true,
            "message"=> "Cart Successfully Inserted."
        ]);
    }else{
        echo json_encode([
            "status"=> false,
            "message"=> "Failed to add cart."
        ]);
    }
?>