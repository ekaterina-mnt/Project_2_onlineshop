<?php
$link = mysqli_connect('localhost', 'root', '', 'onlineshop');
if ($_SESSION['auth']) {
    $user_id = $_SESSION['user_id'];
    $orders = mysqli_query($link, "SELECT good_id, timestamps FROM orders WHERE user_id=$user_id and status='paid'");

    if ($orders->num_rows) {
        $goods = [];

        foreach ($orders as $order) {
            $good_id = $order['good_id'];
            $good = mysqli_query($link, "SELECT * FROM goods WHERE id=$good_id") or die(mysqli_error($link));
            $goods[$order['timestamps']] = $good;
        }

?>
        <table>
            <?php
            foreach ($goods as $timestamps => $good) {
                $good = mysqli_fetch_assoc($good); ?>
                <tr>
                    <td>
                        <a href="/goods/<?= $good['id'] ?>">
                            <p><?= $good['name'] ?><br>
                                <?= $good['price'] ?><br>
                                <?= $good['description'] ?>
                            </p>
                        </a>
                    </td>
                    <td>
                        <p>
                            <?= $timestamps ?>
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
