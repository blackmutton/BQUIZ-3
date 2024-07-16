<?php
include "base.php";

dd($_FILES);
/* Array
(
    [trailer] => Array
        (
            [name] => 03B01v.mp4
            [full_path] => 03B01v.mp4
            [type] => video/mp4
            [tmp_name] => C:\xampp\tmp\php475F.tmp
            [error] => 0
            [size] => 1577596
        )

    [poster] => Array
        (
            [name] => 03B01.png
            [full_path] => 03B01.png
            [type] => image/png
            [tmp_name] => C:\xampp\tmp\php4760.tmp
            [error] => 0
            [size] => 567882
        )

) */
dd($_POST);
/* Array
(
    [name] => 548
    [levle] => 1
    [length] => 100
    [year] => 2024
    [month] => 7
    [day] => 1
    [publish] => publisher
    [director] => director
    [intro] => 劇情簡介13
) */
if (isset($_FILES['poster']['tmp_name'])) {
    move_uploaded_file($_FILES['poster']['tmp_name'], "../images/" . $_FILES['poster']['name']);
    $_POST['poster'] = $_FILES['poster']['name'];
}
if (isset($_FILES['trailer']['tmp_name'])) {
    move_uploaded_file($_FILES['trailer']['tmp_name'], "../images/" . $_FILES['trailer']['name']);
    $_POST['trailer'] = $_FILES['trailer']['name'];
}
$_POST['ondate'] = $_POST['year'] . "-" . $_POST['month'] . "-" . $_POST['day'];
unset(
    $_POST['year'],
    $_POST['month'],
    $_POST['day']
);
$_POST['sh'] = 1;
$_POST['rank'] = $Movie->max() + 1;
dd($_POST);
/* Array
(
    [name] => 548
    [levle] => 1
    [length] => 100
    [publish] => publisher
    [director] => director
    [intro] => 劇情簡介13
    [poster] => 03B01.png
    [trailer] => 03B01v.mp4
    [ondate] => 2024-7-1
    [sh] => 1
    [rank] => 13
) */
$Movie->save($_POST);
to("../admin.php?do=movie");
