<?php
$link = mysqli_connect('localhost', 'root', '', 'onlineshop');
session_start();

if ($_POST) {

    foreach ($_POST as $order_id => $i) {
        $order = mysqli_query($link, "SELECT * FROM orders WHERE id=$order_id and status='in_cart'");

        if (!empty($order)) {
            $date = date("y-m-d H:i:s", time());
            mysqli_query($link, "UPDATE orders SET status='paid', timestamps='$date' WHERE id=$order_id");
        } else {
            $_SESSION['flash'] = 'Товар не найден в корзине!';
            header('Location: /cart');
        }
    }

    $_SESSION['flash'] = 'Заказ успешно оплачен!';
    header('Location: /orders');

} else {
    $_SESSION['flash'] = 'Не выбран товар для оплаты.';
    header('Location: /cart');
}
