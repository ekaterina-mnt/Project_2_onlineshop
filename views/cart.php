<?php
$link = mysqli_connect('localhost', 'root', '', 'onlineshop');
if ($_SESSION['auth']) {
    $user_id = $_SESSION['user_id'];
    $in_cart = mysqli_query($link, "SELECT goods.id as good_id, goods.description, goods.name, goods.price, orders.id as order_id FROM orders LEFT JOIN goods ON goods.id=orders.good_id WHERE user_id=$user_id and status='in_cart'");

    if ($in_cart->num_rows) {
?>
        <form action="/pay_process.php" method="POST">
            <table>
                <?php
                foreach ($in_cart as $order) { ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="<?= $order['order_id'] ?>">
                        </td>
                        <td>
                            <a href="/goods/<?= $order['good_id'] ?>">
                                <p><?= $order['name'] ?><br>
                                    <?= $order['price'] ?><br>
                                    <?= $order['description'] ?>
                                </p>
                            </a>
                        </td>
                        <td>
                            <a href="/delete_from_cart/<?= $order['good_id'] ?>">
                                Удалить из корзины
                                <?php $_SESSION['cart_redirect'] = TRUE; ?>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <input type="submit" value="Оплатить">
        </form>
<?php
    } else {
        echo "<p>Корзина пуста</p>";
    }
} else {
    $_SESSION['flash'] = 'Необходимо авторизоваться';
    header('Location: /login');
}
