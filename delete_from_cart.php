<?php
$link = mysqli_connect('localhost', 'root', '', 'onlineshop');

$order = mysqli_query($link, "SELECT * FROM orders WHERE id=$good_id and status='in_cart'");
if (!empty($order)) {
    mysqli_query($link, "DELETE FROM orders WHERE good_id=$good_id");
    $_SESSION['flash'] = 'Товар успешно удален из корзины!';
    if (isset($_SESSION['cart_redirect'])) {
        unset($_SESSION['cart_redirect']);
        header('Location: /cart');
    } else {
        header('Location: /goods');
    }
} else {
    $_SESSION['flash'] = 'Товар не найден в корзине!';
    header('Location: /goods');
}
