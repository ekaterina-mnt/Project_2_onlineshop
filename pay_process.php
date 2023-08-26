<?php
$link = mysqli_connect('localhost', 'root', '', 'onlineshop');

$order = mysqli_query($link, "SELECT * FROM orders WHERE id=$good_id and status='in_cart'");
if (!empty($order)) {
    mysqli_query($link, "UPDATE orders SET status='paid'");
    $_SESSION['flash'] = 'Товар успешно оплачен!';
    header('Location: /orders');
} else {
    $_SESSION['flash'] = 'Товар не найден в корзине!';
    header('Location: /orders');
}