<?php
$link = mysqli_connect('localhost', 'root', '', 'onlineshop');
$goods = mysqli_query($link, "SELECT * FROM goods") or die(mysqli_error($link));
$user_id = $_SESSION['user_id'];
$in_cart = mysqli_query($link, "SELECT good_id FROM orders WHERE user_id=$user_id and status='in_cart'");

$cart_goods = [];
foreach ($in_cart as $i) {
    $cart_goods[] = $i['good_id'];
}

if (isset($_SESSION['auth'])) {
    echo '<table>';
    foreach ($goods as $good) { ?>
        <tr>
            <td>
                <a href="/goods/<?= $good['id'] ?>">
                    <p><?= $good['name'] ?><br>
                        <?= $good['price'] ?><br>
                        <?= $good['description'] ?>
                    </p>
                </a>
            </td>
            <?php if (in_array($good['id'], $cart_goods)) { ?>
                <td>
                    <a href="/delete_from_cart/<?= $good['id'] ?>">
                        Удалить из корзины
                    </a>
                </td>
            <?php } else { ?>
                <td>
                    <a href="/add_to_cart/<?= $good['id'] ?>">
                        Добавить в корзину
                    </a>
                </td>
            <?php } ?>
        </tr>
    <?php } ?>
    </table>
    <?php
} else {
    echo "Добавлять товары в корзину могут только зарегистрированнные пользователи";
    echo '<table>';
    foreach ($goods as $good) { ?>
        <tr>
            <td>
                <a href="/goods/<?= $good['id'] ?>">
                    <p><?= $good['name'] ?><br>
                        <?= $good['price'] ?><br>
                        <?= $good['description'] ?>
                    </p>
                </a>
            </td>
        </tr>
    <?php } ?>
    </table>
<?php
}
