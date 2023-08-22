<p>
<form action="/register_process.php" method="POST">
    <input name="name" type="text" placeholder="Имя" value="<?php if (isset($_SESSION['post'])) {
                                                                echo($_SESSION['post']['name']);
                                                            } ?>">
    <input name="login" type="text" placeholder="Придумайте логин" value="<?php if (isset($_SESSION['post'])) {
                                                                echo($_SESSION['post']['login']);
                                                            } ?>">
    <input name="password" type="password" placeholder="Придумайте пароль">
    <input name="password_confirm" type="password" placeholder="Повторите пароль">
    <input type="submit" value="Зарегистрироваться">
</form>
</p>