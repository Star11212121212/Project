<?php
include "db.php";
/**
 * @var $db mysqli
 */
$login = $_POST['login'] ?? "";
$password = $_POST['password'] ?? "";
$result = $db->query("SELECT * FROM `users` WHERE `Login` = '$login'");
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['Password'])) {
        session_start();
        $_SESSION['admin_auth'] = true;
    }
}
header('Location: ../admin/index.php');