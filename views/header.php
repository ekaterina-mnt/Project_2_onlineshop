<nav>
    <?php
    session_start();
    ?>
    <a href="/">Главная</a>
    <a href="/goods">Каталог</a>
    <?php
    if (!empty($_SESSION['auth'])) { ?>
        <a href="/cart">Корзина</a>
    <?php
    } ?>
    <a href="<?php
                if (!empty($_SESSION['auth'])) { ?>
            /orders">Мои заказы</a><?php } else { ?>
    /login">Войти<?php
                                } ?></a>
    <a href="<?php
                if (!empty($_SESSION['auth'])) { ?>
            /logout_process.php">Выйти</a><?php } else { ?>
    /register">Регистрация<?php
                                        } ?></a>
</nav>