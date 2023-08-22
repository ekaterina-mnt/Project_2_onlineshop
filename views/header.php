<nav>
    <?php
    session_start();
    ?>
    <a href="/">Главная</a>
    <a href="/goods">Каталог</a>
    <a href="<?php
                if (!empty($_SESSION['auth'])) { ?>
            /orders">Мои заказы</a><?php } else { ?>
    /login">Войти<?php
                            } ?></a>
    <a href="<?php
                if (!empty($_SESSION['auth'])) { ?>
            /logout">Выйти</a><?php } else { ?>
    /register">Регистрация<?php
                            } ?></a>
    <div>
        <?php
        if (isset($_SESSION['auth'])) {
            echo $_SESSION['auth'];
        } else {
            echo 'not auth';
        }
        ?>
    </div>
</nav>