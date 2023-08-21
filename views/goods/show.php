<?php
$link = mysqli_connect('localhost', 'root', '', 'onlineshop');
$goods = mysqli_query($link, "SELECT * FROM goods WHERE id=$good_id") or die(mysqli_error($link));

if ($goods->num_rows != 0) {
    foreach ($goods as $good) {
        echo '<a href="/goods/' . "$good[id]" . '">' .
            "<p>$good[name]<br>
            $good[price]<br>
            $good[description]</p>" . '</a>';
    }
} else {
    echo "<p>К сожалению, данный товар не найден.</p>";
}
?>
