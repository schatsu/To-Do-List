<?php
    require_once 'baglan.php';

    if (isset($_POST['guncelle'])) {
        $gorevId=$_POST['id'];
  
  
  
        $duzenle=$db->prepare("UPDATE todo SET
        task_name=:task_name,
        task_text=:task_text,
        task_s_time=:task_s_time,
        task_f_time=:task_f_time
        WHERE id={$_POST['id']}
     
    "); }
    
        $guncelle=$duzenle->execute(array(
    
        'task_name'=>$_POST['ad'],
        'task_text'=>$_POST['aciklama'],
        'task_s_time'=>$_POST['s_date'],
        'task_f_time'=>$_POST['f_date'],
    
    
    
        ));
    
    
        if ($guncelle) {
            
         echo "başarılı";
    
         header("location:index.php?durumx=tamamlandı&ID=$gorevID");
    
         exit;
    
    
        }else {
            echo "Beklenmedik Bir Durum Oluştu";
    
            header("location:index.php?durumx=hata&ID=$gorevID");
    
            exit;
        }


?>