<?php
if (isset($_POST["name"], $_POST["price"], $_POST["category"]) && !$_FILES["image_1"]["error"]) {
    include "db.php";
    /**
     * @var $db mysqli
     */
    $name = $db->real_escape_string($_POST["name"]);
    $price = intval($_POST["price"]);
    $category = intval($_POST["category"]);
    $is_new = intval($_POST["is_new"] === "on");
    $image_1 = $_FILES["image_1"]["name"];
    $extension = pathinfo($image_1, PATHINFO_EXTENSION);
    $hash = sha1($image_1 . time());
    $image_name_1 = $hash . "." . $extension;
    move_uploaded_file($_FILES["image_1"]["tmp_name"], "../images/" . $image_name_1);
    $images = [$image_name_1];
    if (!$_FILES["image_2"]["error"]) {
        $image_2 = $_FILES["image_2"]["name"];
        $extension = pathinfo($image_2, PATHINFO_EXTENSION);
        $hash = sha1($image_2 . time());
        $image_name_2 = $hash . "." . $extension;
        move_uploaded_file($_FILES["image_2"]["tmp_name"], "../images/" . $image_name_2);
        $images[] = $image_name_2;
    }
    $images = $db->real_escape_string(json_encode($images));
    $db->query("INSERT INTO `products` (Name, Price, Images, Category_id, Is_new) VALUES ('$name', '$price', '$images', '$category', '$is_new')");
    header("location: ../admin/index.php");
}