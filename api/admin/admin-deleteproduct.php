<?php
    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Content-Type: application/json");
    include("../../config/database.php");
    
    if($_SERVER["REQUEST_METHOD"] === "OPTIONS")
    {
        http_response_code(200);
        exit();
    }

    if($_SERVER["REQUEST_METHOD"] === "POST")
    {
        if(!isset($_GET["id"]))
        {
            echo json_encode([
                "status" => false,
                "message" => "Id missing"
            ]);
            exit();
        }

        $id = $_GET["id"];
        $delete_product_sql = $conn->prepare("DELETE FROM products WHERE id = ?");
        $delete_product_sql->bind_param("i", $id);
        if($delete_product_sql->execute())
        {
            echo json_encode([
                "status" => true,
                "message" => "Product Successfully deleted."
            ]);
        }else{
            echo json_encode([
                "status" => false,
                "message" => "Product not deleted."
            ]);
        }
    }
?>