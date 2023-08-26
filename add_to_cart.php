<?php
$link = mysqli_connect('localhost', 'root', '', 'onlineshop');

$user_id = $_SESSION['user_id'];
$good_price = mysqli_query($link, "SELECT price FROM goods WHERE id=$good_id");
$good_price = mysqli_fetch_assoc($good_price)['price'];
mysqli_query($link, "INSERT INTO orders (good_id, user_id, sum, status) VALUES ($good_id, $user_id,  '$good_price', 'in_cart')") or die(mysqli_error($link));

$_SESSION['flash'] = 'Товар успешно добавлен в корзину!';
header('Location: /goods/index');