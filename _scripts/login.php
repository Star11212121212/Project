<?php
include "db.php";
/**
 * @var $db mysqli
 */
$login = preg_replace("/\D/", "", $_POST['login'] ?? "");
$password = $_POST['password'] ?? "";
$result = $db->query("SELECT * FROM `users` WHERE `Login` = '$login'");
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['Password'])) {
        session_start();
        $_SESSION['user_id'] = $row['Id'];
        $_SESSION['user_name'] = $row['Name'];
        $_SESSION['user_phone'] = $login;
        header('Location: ../index.php');
    }
    else {
        header('Location: ../index.php?login_error=Неверный+телефон+или+пароль');
    }
}
else {
    header('Location: ../index.php?login_error=Неверный+телефон+или+пароль');
}