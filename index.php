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
        include 'views/header.php';
        ?>
    </header>
    <main>
        <?php
        if ($_SERVER['REQUEST_URI'] == '/') {
            $path = 'views/main.php';
        } else {
            $path = 'views' . $_SERVER['REQUEST_URI'] . '.php';
        }
        
        if (file_exists($path)) {
            $content = file_get_contents($path);
            echo $content;
        } else {
            echo "<p>не найден нужный файл</p>";
        }
        ?>
    </main>
</body>

</html>