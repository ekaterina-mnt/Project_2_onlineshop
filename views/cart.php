<?php
$link = mysqli_connect('localhost', 'root', '', 'onlineshop');
if ($_SESSION['auth']) {
    $user_id = $_SESSION['user_id'];
    $orders = mysqli_query($link, "SELECT id, good_id FROM orders WHERE user_id=$user_id and status='in_cart'");

    if ($orders->num_rows) {
    $goods = [];

        foreach ($orders as $order) {
            $good_id = $order['good_id'];
            $good = mysqli_query($link, "SELECT * FROM goods WHERE id=$good_id") or die(mysqli_error($link));
            $goods[$order['id']] = $good;
        }

?>
        <form action="/pay_process.php" method="POST">
            <table>
                <?php
                foreach ($goods as $order_id => $good) {
                    $good = mysqli_fetch_assoc($good); ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="<?= $order_id ?>">
                        </td>
                        <td>
                            <a href="/goods/<?= $good['id'] ?>">
                                <p><?= $good['name'] ?><br>
                                    <?= $good['price'] ?><br>
                                    <?= $good['description'] ?>
                                </p>
                            </a>
                        </td>
                        <td>
                            <a href="/delete_from_cart/<?= $good['id'] ?>">
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
