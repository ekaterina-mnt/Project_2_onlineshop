<?php
$login = $_POST['login'];
$password = $_POST['password'];


if (empty($login) or empty($password)) {
    session_start();
    $_SESSION['flash'] = 'Введены не все данные';
    $_SESSION['post'] = $_POST;
    header('Location: /login');
} else {
    $link = mysqli_connect('localhost', 'root', '', 'onlineshop');
    $user = mysqli_query($link, "SELECT * FROM users WHERE login='$login'");
    $user = mysqli_fetch_assoc($user);

    if (!empty($user) and password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['flash'] = 'Вы успешно вошли в аккаунт!';
        $_SESSION['auth'] = TRUE;
        header("Location: /");
    } else {
        session_start();
        $_SESSION['flash'] = 'Неверно введен логин/пароль';
        header("Location: /login");
    }
}
