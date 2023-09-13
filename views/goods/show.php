<?php
$link = mysqli_connect('localhost', 'root', '', 'onlineshop');
$good = mysqli_query($link, "SELECT * FROM goods WHERE id=$good_id") or die(mysqli_error($link));

if ($good->num_rows) {
    $good = mysqli_fetch_assoc($good);
    echo "<h2>" . $good['name'] . "</h2>";
?>
    <table>
        <tr>
            <td>
                <div class="show-good-wrapper">
                    <?= $good['price'] ?><br>
                    <?= $good['description'] ?>
                </div>
            </td>
            <td>
                <img class="show-good" src="/goods_img/<?= $good['img_src'] ?>">
            </td>
        </tr>
    </table>

    <form action=<?php if (isset($_SESSION['auth'])) { ?> "/add_to_cart/<?= $good['id'] ?>">
    <?php } else { ?>
        "/login">
    <?php
                        $_SESSION['flash'] = 'Необходимо авторизоваться.';
                    }
    ?>
    <button type="submit">
        Добавить в корзину
    </button>
    </form>
<?php
} else {
    echo "<p>К сожалению, данный товар не найден.</p>";
}
