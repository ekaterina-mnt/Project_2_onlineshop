<?php
$link = mysqli_connect('localhost', 'root', '', 'onlineshop');
if ($_SESSION['auth']) {
    $user_id = $_SESSION['user_id'];
    $paid = mysqli_query($link, "SELECT orders.timestamps, goods.name, goods.price, orders.good_id FROM orders LEFT JOIN goods ON orders.good_id=goods.id WHERE user_id=$user_id and status='paid'");

    if ($paid->num_rows) {
        $orders = [];
?>
        <table>
            <?php
            foreach ($paid as $order) { ?>
                <tr>
                    <td>
                        <a href="/goods/<?= $order['good_id'] ?>">
                            <p><?= $order['name'] ?><br>
                                <?= $order['price'] ?><br>
                            </p>
                        </a>
                    </td>
                    <td>
                        <p>
                            <?= $order['timestamps'] ?>
                        </p>
                    </td>
                </tr>
            <?php } ?>
        </table>
<?php
    } else {
        echo "<p>Вы не сделали ни одного заказа.</p>";
    }
} else {
    $_SESSION['flash'] = 'Необходимо авторизоваться';
    header('Location: /login');
}
