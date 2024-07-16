<?php
include "base.php";
$movie = $Movie->find($_POST['id']);
/* if($movie['sh']==1){
    $movie['sh']=0;
}else{
    $movie['sh']=1;
} */

// (1+1)%2=0,(0+1)%2=1
$movie['sh'] = ($movie['sh'] + 1) % 2;

$Movie->save($movie);
