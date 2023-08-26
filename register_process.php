<?php
$name = $_POST['name'];
$login = $_POST['login'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

$confirm = boolval($password === $password_confirm);

$link = mysqli_connect('localhost', 'root', '', 'onlineshop');

if (
    empty($name) or empty($login) or
    empty($password) or empty($password_confirm)
) {
    session_start();
    $_SESSION['flash'] = 'Введены не все данные';
    $_SESSION['post'] = $_POST;
    header('Location: /register');
} elseif (!$confirm) {
    session_start();
    $_SESSION['flash'] = 'Пароли не совпадают';
    $_SESSION['post'] = $_POST;
    header('Location: /register');
} elseif (mysqli_query($link, "SELECT * FROM users WHERE login='$login'")->num_rows) {
    session_start();
    $_SESSION['flash'] = "Пользователь с таким логином уже существует";
    $_SESSION['post'] = $_POST;
    header('Location: /register');
} else {
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($link, "INSERT INTO users (name, login, password) VALUES ('$name', '$login', '$password')");

    if (mysqli_query($link, "SELECT * FROM users WHERE name='$name' AND login='$login' AND password='$password'")) {
        session_start();
        $_SESSION['flash'] = 'Аккаунт успешно зарегистрирован!';
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['auth'] = TRUE;
        header('Location: /');
    } else {
        echo '<p>Возникла ошибка. Попробуйте еще раз или сообщите нам о проблеме.</p>';
    }
}
