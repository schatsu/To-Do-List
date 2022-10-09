<?php

require_once 'baglan.php';


if (isset($_GET['gorevsil'])=="yes") {

    $sil=$db->prepare("DELETE FROM todo WHERE id=:id");
    $kontrol=$sil->execute(array(
     'id'=>$_GET['id']
    ));
 
    if ($kontrol) {
 
    header("location:index.php?durums=ok");

    exit;

    }else {
     header("location:index.php?durums=no");

     exit;

    }


}



?>