<?php
if (isset($_POST["id"], $_POST["name"], $_POST["price"], $_POST["category"])) {
    include "db.php";
    /**
     * @var $db mysqli
     */
    $id = intval($_POST["id"]);
    $name = $db->real_escape_string($_POST["name"]);
    $price = intval($_POST["price"]);
    $category = intval($_POST["category"]);
    $is_new = intval($_POST["is_new"] === "on");
    $db->query("UPDATE products SET Name = '$name', Price = $price, Category_id = $category, Is_new = $is_new WHERE Id = $id");
    header("location: ../admin/index.php");
}