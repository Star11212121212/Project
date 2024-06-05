<?php
if (isset($_POST["id"])) {
    include "db.php";
    /**
     * @var $db mysqli
     */
    $id = intval($_POST["id"]);
    $db->query("DELETE FROM products  WHERE Id = $id");
    header("location: ../admin/index.php");
}