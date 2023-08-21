<?php
$link = mysqli_connect('localhost', 'root', '', 'onlineshop');
$goods = mysqli_query($link, "SELECT * FROM goods") or die(mysqli_error($link));

foreach ($goods as $good) { 
    echo '<a href="/goods/' . "$good[id]" . '">' .
    "<p>$good[name]<br>
    $good[price]<br>
    $good[description]</p>" . '</a>';
}
?>