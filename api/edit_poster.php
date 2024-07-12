<?php
include "base.php";
dd($_POST);
/* 
Array
(
    [name] => Array
        (
            [0] => 預告片11
            [1] => 預告片25
        )

    [sh] => Array
        (
            [0] => 1
            [1] => 2
        )

    [ani] => Array
        (
            [0] => 2
            [1] => 1
        )

    [id] => Array
        (
            [0] => 1
            [1] => 2
        )

)
*/
foreach ($_POST['id'] as $idx => $id) {
    if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
        $Poster->del($id);
    } else {
        $row = $Poster->find($id);
        $row['name'] = $_POST['name'][$idx];
        $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
        $row['ani'] = $_POST['ani'][$idx];
        $Poster->save($row);
    }
}

to("../admin.php?do=poster");
