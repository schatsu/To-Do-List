<?php 
require_once 'baglan.php';

        // Insert İşlemi//

if (isset($_POST['ekle'])) {

    $kaydet=$db->prepare("INSERT INTO todo SET
    
    
    task_name=:task_name,
    task_text=:task_text,
    task_s_time=:task_s_time,
    task_f_time=:task_f_time

 
"); }

    $ekle=$kaydet->execute(array(

    'task_name'=>$_POST['ad'],
    'task_text'=>$_POST['aciklama'],
    'task_s_time'=>$_POST['s_date'],
    'task_f_time'=>$_POST['f_date'],



    ));


    if ($ekle) {
        
     echo "Yeni Görev Oluşturuldu";

     header("location:index.php?durum=basarili");

     exit;


    }else {
        echo "Beklenmedik Bir Durum Oluştu";

        header("location:index.php?durum=basarisiz");

        exit;
    };


?>