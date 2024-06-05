<?php
if (isset($_POST['name'], $_POST['login'], $_POST['password'])) {
    include "db.php";
    /**
     * @var $db mysqli
     */
    $login = $db->real_escape_string($_POST['login']);
    $result = $db->query("SELECT * FROM `users` WHERE `Login` = '$login'");
    if ($result && $result->num_rows < 1) {
        $name = $db->real_escape_string($_POST["name"]);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $db->query("INSERT INTO `users` (Login, Password, Name) VALUES ('$login', '$password', '$name')");
        session_start();
        $_SESSION['user_id'] = $db->insert_id;
        $_SESSION['user_name'] = $name;
        $_SESSION['user_phone'] = $login;
        header('Location: ../index.php');
    }
    else {
        header('Location: ../index.php?register_error=Телефон+уже+зарегистрирован');
    }
}
else {
    header('Location: ../index.php?register_error=Не+заполнены+все+данные');
}