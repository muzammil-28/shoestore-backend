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

    $parent_id = 0;
    $category_sql = $conn->prepare("SELECT * FROM navbar WHERE parent_id != ?");
    $category_sql->bind_param("i", $parent_id);
    $category_sql->execute();
    $category_res = $category_sql->get_result();
    $categories = [];
    while($result = $category_res->fetch_assoc())
    {
        $categories[] = $result;
    } 
    echo json_encode($categories);
?>