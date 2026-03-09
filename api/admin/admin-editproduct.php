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

    $id = $_GET["id"];
    $edit_data_sql = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $edit_data_sql->bind_param("i", $id);
    $edit_data_sql->execute();
    $edit_res = $edit_data_sql->get_result();
    $edit_product_data = $edit_res->fetch_assoc();

    echo json_encode($edit_product_data);
?>