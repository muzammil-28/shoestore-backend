<?php
    include("../config/database.php");
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    $navbar_sql = "SELECT * FROM navbar";
    $navbar_query = mysqli_query($conn, $navbar_sql);

    $navbar_sql = $conn->prepare("SELECT * FROM navbar");
    $navbar_sql->execute();
    $navbar_item = $navbar_sql->get_result();

    $menu = [];
    while($navbar_result = $navbar_item->fetch_assoc())
    {
        $menu[] = $navbar_result;
    }
    
    echo json_encode($menu)
?>