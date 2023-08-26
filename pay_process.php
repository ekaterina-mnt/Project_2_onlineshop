<?php
$link = mysqli_connect('localhost', 'root', '', 'onlineshop');
session_start();

if ($_POST) {

    foreach ($_POST as $good_id => $i) {
        $order = mysqli_query($link, "SELECT * FROM orders WHERE id=$good_id and status='in_cart'");

        if (!empty($order)) {

            $order_id = mysqli_fetch_assoc($order)['id'];
            $date = date("y-m-d m:i:s", time());
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
