<?php
    include("../../config/database.php");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Method: POST");
    header("Access-Control-Allow-Headers: Content-Type");

    $users_sql = $conn->prepare("SELECT * FROM users");
    $users_sql->execute();
    $users_result = $users_sql->get_result();
    $users = [];
    while($row = $users_result->fetch_assoc())
    {
        $users[] = $row;
    }
    echo json_encode($users);
?>