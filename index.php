<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
</head>

<body>
    <header>
        <?php
        error_reporting(E_ALL); #включение вывода нотисов и варнингсов
        ini_set('display_errors', 'on');

        include 'views/header.php';

        if (isset($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            echo "<p>$flash</p>";
            unset($_SESSION['flash']);
        }

        ?>
    </header>
    <main>
        <?php
        if ($_SERVER['REQUEST_URI'] == '/') {
            $path = 'views/main.php';
        } elseif ($_SERVER['REQUEST_URI'] == '/goods') {
            $path = 'views/goods/index.php';
        } elseif (preg_match("#/goods/(\d+)#", $_SERVER['REQUEST_URI'], $param)) {
            $path = 'views/goods/show.php';
            $good_id = $param[1];
        } elseif (preg_match("#/(.+_cart)/(\d+)#", $_SERVER['REQUEST_URI'], $param)) {
            $path = $param[1] . '.php';
            $good_id = $param[2];
        } else {
            $path = 'views' . $_SERVER['REQUEST_URI'] . '.php';
        }

        if (file_exists($path)) {
            include $path;
        } else {
            echo "<p>не найден нужный файл</p>";
        }
        ?>
    </main>
</body>

</html>