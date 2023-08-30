<?php
$link = mysqli_connect('localhost', 'root', '', 'onlineshop');
$goods = mysqli_query($link, "SELECT * FROM goods WHERE id=$good_id") or die(mysqli_error($link));

if ($goods->num_rows != 0) {
    echo '<table>';
    foreach ($goods as $good) { ?>
        <tr>
            <td>
                <div class="show-good-wrapper">
                    <?= $good['name'] ?><br>
                    <?= $good['price'] ?><br>
                    <?= $good['description'] ?>

                </div>
            </td>
            <td>
                <img class="show-good" src="/goods_img/<?= $good['img_src'] ?>">
            </td>
        </tr>
    <?php    } ?>
    </table>

    <form action="<?php if (isset($_SESSION['auth'])) { ?>
        /add_to_cart/<?= $good['id'] ?>
        <?php } else { ?>
            /login
            <?php
                    }
            ?>">
        <button type="submit">
            Добавить в корзину
        </button>
    </form>
<?php
} else {
    echo "<p>К сожалению, данный товар не найден.</p>";
}
