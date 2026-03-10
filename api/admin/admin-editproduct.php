<?php
    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Content-Type: application/json");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    include("../../config/database.php");

    if($_SERVER["REQUEST_METHOD"] === "OPTIONS")
    {
        http_response_code(200);
        exit();
    }

    // edit form ma data bhejne ka liye 
    if($_SERVER["REQUEST_METHOD"] === "GET")
    {
        if(!isset($_GET["id"]))
        {
            echo json_encode([
                "status" => false,
                "message" => "Id missing."
            ]);
            exit();
        }

        $id = $_GET["id"];
        $edit_data_sql = $conn->prepare("SELECT * FROM products WHERE id = ?");
        $edit_data_sql->bind_param("i", $id);
        $edit_data_sql->execute();
        $edit_res = $edit_data_sql->get_result();
        $edit_product_data = $edit_res->fetch_assoc();
        echo json_encode($edit_product_data);
        exit();
    }

    // update edit data 
    if($_SERVER["REQUEST_METHOD"] === "POST")
    {
        $id = $_GET["id"];

        $editData = json_decode(file_get_contents("php://input"), true);
        $name = $editData["name"];
        $category = $editData["category_id"];
        $old_price = $editData["old_price"];
        $new_price = $editData["new_price"];
        $quantity = $editData["quantity"];
        $description = $editData["text"];

        $update_product_sql = $conn->prepare(
                                "UPDATE products
                                        SET 
                                        name=?,
                                        text=?,
                                        quantity=?,
                                        old_price=?,
                                        new_price=?,
                                        category_id=?
                                        WHERE id = ?"
        );
        $update_product_sql->bind_param("ssiiiii", $name, $tedescriptionxt, $quantity, $old_price, $new_price, $category, $id);
        if($update_product_sql->execute())
        {
            echo json_encode([
                "status" => true,
                "message" => "Product Successfully Updated."
            ]);
        }else{
            echo json_encode([
                "status" => false,
                "message" => "product not updated"
            ]);
        }
        
    }
?>