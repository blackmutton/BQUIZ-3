<?php
include "base.php";
$today = date("Y-m-d");
$ondate = date("Y-m-d", strtotime("-2 days"));

$movies = q("select * from `movies` where ondate >= '$ondate' && ondate <='$today' && sh=1");
foreach ($movies as $movie) {
    echo "<option value='{$movie['id']}'>{$movie['name']}</option>";
}
