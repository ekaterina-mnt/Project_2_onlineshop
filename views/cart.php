<?php
$link = mysqli_connect('localhost', 'root', '', 'onlineshop');
if ($_SESSION['auth']) {
    $user_id = $_SESSION['user_id'];
    $id_cart = mysqli_query($link, "SELECT good_id FROM orders WHERE user_id=$user_id and status='in_cart'");
    $goods = [];

    if ($id_cart->num_rows) {

    foreach ($id_cart as $i) {
        $id = $i['good_id'];
        $good = mysqli_query($link, "SELECT * FROM goods WHERE id=$id") or die(mysqli_error($link));
        $goods[] = $good;
    }

    echo '<table>';
    foreach ($goods as $good) { 
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
                <a href="/delete_from_cart/<?= $good['id'] ?>">
                    Удалить из корзины
                    <?php $_SESSION['cart_redirect'] = TRUE; ?>
                </a>
            </td>
        </tr>
    <?php } ?>
    </table>
<?php 
    } else {
        echo "<p>Корзина пуста</p>";
    }
} else {
    $_SESSION['flash'] = 'Необходимо авторизоваться';
    header('Location: /login');
}
