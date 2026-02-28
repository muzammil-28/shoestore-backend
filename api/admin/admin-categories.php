<?php
    include("../../config/database.php");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Method: POST");
    header("Access-Control-Allow-Headers: Content-Type");

    $category_sql = $conn->prepare("SELECT * FROM navbar");
    $category_sql->execute();
    $category_result = $category_sql->get_result();
    $category = [];
    while($row = $category_result->fetch_assoc())
    {
        $category[] = $row;
    }
    echo json_encode($category);
?>