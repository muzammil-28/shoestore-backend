<?php
    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Methods: GET, POST , OPTIONS");
    header("Content-Type: application/json");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    include("../../config/database.php");

    if($_SERVER["REQUEST_METHOD"] === "OPTIONS")
    {
        http_response_code(200);
        exit();
    }

    $name = $_POST["productName"];
    $category = $_POST["productCatg"];
    $old_price = $_POST["productOldPrice"];
    $new_price = $_POST["productNewPrice"];
    $quantity = $_POST["productQty"];
    $description = $_POST["productDesc"];
    $status = 1;

    $image = time() . "_" . $_FILES["productImg"]["name"];
    $tmp_name = $_FILES["productImg"]["tmp_name"];

    $dir = "../../uploads/image/" . $image;

    if(move_uploaded_file($tmp_name, $dir))
    {
        $add_product_sql = $conn->prepare("INSERT INTO `products`
                        (`name`, `text`, `image`, `quantity`, `old_price`, `new_price`, `category_id`, `status`) 
                        VALUES 
                        (?,?,?,?,?,?,?,?)");
        $add_product_sql->bind_param(
            "sssiiiii",
            $name, $description, $image, $quantity, $old_price, $new_price, $category, $status);
        $add_product_sql->execute();

        echo json_encode([
            "status" => true,
            "message" => "successfully added."
        ]);
    }
?>