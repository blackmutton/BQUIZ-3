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
//     [seats] => Array
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

// dd($_POST);
// Array
// (
//     [date] => 2024-08-05
//     [session] => 14:00~16:00
//     [seats] => a:2:{i:0;s:1:"4";i:1;s:1:"9";}
//     [no] => 202408050001
//     [movie] => 院線112
//     [qt] => 2
// )
?>
<style>
    #orderResult {
        width: 500px;
        margin: auto;
        border: 1px solid #999;
        padding: 20px;
        border-radius: 10px;
    }

    #orderResult tr:nth-child(even) {
        background: #eee;
    }

    #orderResult td {
        padding: 5px;
    }
</style>
<table id="orderResult">
    <tr>
        <td colspan="2">感謝您的訂購，您的訂單編號是:<?= $_POST['no'] ?></td>
        <!-- <td></td> -->
    </tr>
    <tr>
        <td>電影名稱:</td>
        <td><?= $_POST['movie'] ?></td>
    </tr>
    <tr>
        <td>日期:</td>
        <td><?= $_POST['date'] ?></td>
    </tr>
    <tr>
        <td>場次時間:</td>
        <td><?= $_POST['session'] ?></td>
    </tr>
    <tr>
        <td colspan="2">
            座位: <br>
            <?php
            $seats = unserialize($_POST['seats']);
            foreach ($seats as $seat) {
                echo (floor($seat / 5) + 1) . "排" . ($seat % 5 + 1) . "號";
                echo "<br>";
            }
            ?>
            共<?= $_POST['qt'] ?>張電影票
        </td>
        <!-- <td></td> -->
    </tr>
    <tr>
        <td colspan="2">
            <button onclick="location.href='index.php'">確認</button>
        </td>
        <!-- <td></td> -->
    </tr>
</table>