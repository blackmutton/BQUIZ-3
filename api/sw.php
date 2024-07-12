<?php
include "base.php";
dd($_POST);
$db = ${$_POST['table']};
$ids = explode("-", $_POST['sw']);
dd($ids);
echo "<br>";
$row1 = $db->find($ids[0]);
$row2 = $db->find($ids[1]);

$tmp = $row1['rank'];
$row1['rank'] = $row2['rank'];
$row2['rank'] = $tmp;
// tmp沒有東西
echo "tmp" . "<br>";
dd($tmp);
echo "row1" . "<br>";
print_r($row1);
echo "row2" . "<br>";
print_r($row2);

$db->save($row1);
$db->save($row2);
