<?php require_once 'baglan.php';?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To-Do</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
   
  <?php 
      $gorevsor=$db->prepare("SELECT * FROM todo WHERE id=:id");

      $gorevsor->execute(array(
  
      'id'=>@$_GET['id']
  
      ));
      
      $gorevcek=$gorevsor->fetch(PDO::FETCH_ASSOC);
  
     ?>
    
<div style="margin:0 auto 0 auto; display:table" class="form">
<form action="guncelle.php" method="POST">
  <div class="mb-3">
    <label class="form-label">Görev Adı</label>
    <input value="<?php echo $gorevcek['task_name'] ?>" name="ad" type="text" class="form-control">
    
  </div>
  <div class="mb-3">
    <label class="form-label">Görev Açıklaması</label>
    <input value="<?php echo $gorevcek['task_text'] ?>" name="aciklama"  type="text" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Başlangıç Tarihi</label>
    <input value="<?php echo $gorevcek['task_s_time'] ?>"name="s_date"  type="date" class="form-control">
  </div>
  <div class="mb-3">
    <label class="form-label">Bitiş Tarihi</label>
    <input value="<?php echo $gorevcek['task_f_time'] ?>" name="f_date" type="date" class="form-control">
  </div>
  <input type="hidden" value="<?php echo $gorevcek['id'] ?>" name="id">
  <button type="submit" name="guncelle" class="btn btn-success">Güncelle</button>
</form>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>