<?php
require_once 'baglan.php';
?>
<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To-Do</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <a href="index.php"><h2 style="text-align:center ;">To-Do-List</h2></a> <hr>
    <div class="container text-center">
    <table class="table table-dark table-striped table-hover">
  <thead>
    <tr style="color:white" >
      
      <th scope="col">Görev Adı</th>
      <th scope="col">Görev Açıklaması</th>
      <th scope="col">Başlangıç Tarihi</th>
      <th scope="col">Bitiş Tarihi</th>
      <th scope="col">Güncelle</th>
      <th scope="col">Sil</th>
    </tr>
  </thead>
  <tbody>
    <?php
    
    $gorevsor=$db->prepare("SELECT * FROM todo");
    $gorevsor->execute();

    while ($gorevcek=$gorevsor->fetch(PDO::FETCH_ASSOC)) {?>  
    <tr>
      
      <td><?php echo $gorevcek['task_name'] ?></td>
      <td><?php echo $gorevcek['task_text'] ?></td>
      <td><?php echo $gorevcek['task_s_time'] ?></td>
      <td><?php echo $gorevcek['task_f_time'] ?></td>

      <td><a href="duzenle.php?id=<?php echo $gorevcek['id']?>"><button style="color:aliceblue" type="button" name="düzenle" class="btn btn-warning">Güncelle</button></a></td>
      <td><a href="sil.php?id=<?php echo $gorevcek['id']?>&gorevsil=yes"><button style="width: 75px;" type="button" name="Sil" class="btn btn-danger">Sil</button></a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Yeni Görev Ekle
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Yeni Görev Ekle</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="islem.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Görev Adı</label>
                <input required="required" name="ad" placeholder="Görev Adınızı Giriniz" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label  class="form-label">Görev Açıklaması</label>
                <input required="required" name="aciklama" placeholder="Görev Açıklamasını Giriniz" type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label  class="form-label">Başlangıç Tarihi</label>
                <input required="required" name="s_date" type="date" class="form-control" placeholder="Başlangıç Tarihi Seçiniz">
            </div>
            <div class="mb-3">
                <label  class="form-label">Bitiş Tarihi</label>
                <input required="required" name="f_date" type="date" class="form-control"  placeholder="Bitiş Tarihi Seçiniz" >
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">İptal</button>
                <button type="submit" name="ekle" class="btn btn-success">Ekle</button>
            </div>
            </form>
      </div>      
    </div>
  </div>
</div>
              <!-- görev ekleme -->
               <?php
              if (isset($_GET['durum'])=="basarili") { ?>
                
              <script>
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Yeni Görev Eklendi',
                showConfirmButton: false,
                timer: 2000
              })
              </script>
                
              <?php  } ?>

              <!-- Silme İşlemi -->

              <?php
              if (isset($_GET['durums'])=="ok") { ?>
                
              <script>
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Görev Silindi',
                showConfirmButton: false,
                timer: 2000
              })
              </script>
                
              <?php  } ?>

              <!-- Düzenleme İşlemi -->

              <?php
              if (isset($_GET['durumx'])=="tamamlandı") { ?>
                
              <script>
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Görev Güncellendi',
                showConfirmButton: false,
                timer: 2000
              })
              </script>
                
              <?php  } ?>

    <!-- Button trigger modal -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
   
    
  </body>
</html>