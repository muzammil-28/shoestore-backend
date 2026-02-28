<?php
    session_start();
    include("../config/database.php");
    header("Content-Type: Application/json");
    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");    

    if($_SERVER["REQUEST_METHOD"] === "OPTIONS")
    {
        http_response_code(200);
        exit();
    }

    if(!isset($_SESSION["user_id"]))
    {
        echo json_encode([
            "status" => false,
            "message" => "User Id not found."
        ]);
        exit();
    }

    $user_id = $_SESSION["user_id"];

    $cart_data = json_decode(file_get_contents("php://input"), true);
    if(!isset($cart_data["cart_id"]))
    {
        echo json_encode([
            "status" => false,
            "message" => "Cart id missing."
        ]);
        exit();
    }
    $cart_id = intval($cart_data["cart_id"]);

    // $cart_delete_sql = "DELETE FROM cart WHERE id ='$cart_id' AND user_id = '$user_id'";
    // $cart_delete_query = mysqli_query($conn, $cart_delete_sql);

    $cart_delete_sql = $conn->prepare("DELETE FROM cart WHERE id = ? AND user_id = ?");
    $cart_delete_sql->bind_param("ii", $cart_id, $user_id);
    $cart_delete_sql->execute();

    if($cart_delete_sql)
    {
        echo json_encode([
            "status" => true,
            "message" => "Cart successfully deleted."
        ]);
    }else{
        echo json_encode([
            "status" => false,
            "message" => "Cart not deleted."
        ]);
    }
?>