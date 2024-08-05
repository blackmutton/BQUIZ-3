<?php
include "base.php";
// dd(q("select max(`id`) from `orders` "));
// Array
// (
//     [0] => Array
//         (
//             [max(`id`)] => 
//             [0] => 
//         )

// )
$no = q("select max(`id`) from `orders` ")[0][0] + 1;
$_POST['no'] = date("Ymd") . sprintf("%04d", $no);

// dd($_POST);
// Array
// (
//     [id] => 2
//     [date] => 2024-08-05
//     [session] => 14:00~16:00
//     [seat] => Array
//         (
//             [0] => 4
//             [1] => 9
//             [2] => 14
//             [3] => 19
//         )

//     [no] => 202408050001
// )
$_POST['movie'] = $Movie->find($_POST['id'])['name'];

sort($_POST['seats']);

$_POST['qt'] = count($_POST['seats']);

$_POST['seats'] = serialize($_POST['seats']);
unset($_POST['id']);

$Order->save($_POST);

dd($_POST);
// Array
// (
//     [date] => 2024-08-05
//     [session] => 14:00~16:00
//     [seats] => a:2:{i:0;s:1:"4";i:1;s:1:"9";}
//     [no] => 202408050001
//     [movie] => 院線112
//     [qt] => 2
// )
