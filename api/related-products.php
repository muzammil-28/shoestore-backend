<?php
    include("../config/database.php");
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");

    if(!isset($_GET["rel_product_id"]))
    {
        echo json_encode([
            "status" => false,
            "message" => "Missing Related Product Id."
        ]);
        exit();
    }
    $rel_prod_id = $_GET["rel_product_id"] ?? '';

    $rel_product_sql = "SELECT * FROM products WHERE category_id = '$rel_prod_id'";
    $rel_product_query = mysqli_query($conn, $rel_product_sql);
    $rel_product_sql = $conn->prepare("SELECT * FROM products WHERE category_id = ?");
    $rel_product_sql->bind_param("i", $rel_prod_id);
    $rel_product_sql->execute();
    $rel_product_result = $rel_product_sql->get_result();
    $products = [];
    while($row = $rel_product_result->fetch_assoc())
    {
        $products[] = $row;
    }

    echo json_encode($products);
?>