<?php
    include("../config/database.php");
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");

    $catg_sql = $conn->prepare("SELECT * FROM navbar INNER JOIN products ON navbar.id = products.category_id");
    $catg_sql->execute();
    $catg_prod = $catg_sql->get_result();

    $products = [];
    while($data = $catg_prod->fetch_assoc())
    {
        $products[] = $data;
    }
    echo json_encode($products);
?>