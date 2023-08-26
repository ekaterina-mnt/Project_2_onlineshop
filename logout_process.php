<?php
session_start();
if (isset($_SESSION['auth'])) {
    $_SESSION['flash'] = 'Вы успешно вышли из аккаунта!';
    unset($_SESSION['user_id']);
    unset($_SESSION['auth']);
    header("Location: /");
} else {
    session_start();
    $_SESSION['flash'] = 'Возникла ошибка';
    header("Location: /");
}
