<?php
if (isset($_POST["name"], $_POST["phone"])) {
    include "db.php";
    /**
     * @var $db mysqli
     */
    session_start();
    $cart = $_SESSION["cart"] ?? [];
    $name = $db->escape_string($_POST["name"]);
    $phone = $db->escape_string($_POST["phone"]);
    $db->query("INSERT INTO orders (Name, Phone) VALUES ('$name', '$phone')");
    $order_id = $db->insert_id;
    foreach ($cart as $id => $count) {
        $db->query("INSERT INTO order_info (Order_id, Product_id, Count) VALUES ($order_id, $id, $count)");
    }
    $_SESSION["cart"] = [];
}
header("Location: ../index.php");