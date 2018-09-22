

 <?php
 	$kodepetugas = $_GET['id'];
 	$sql = $koneksi->query("SELECT * FROM tb_petugas where id_petugas='$kodepetugas'");
 	$tampil = $sql->fetch_assoc();

  $level = $tampil['level'];

 ?>
 
<!-- general form elements -->
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Ubah petugas</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form role="form" method="POST" enctype="multipart/form-data">
    <div class="box-body">
     
      <div class="form-group">
        <label for="">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $tampil['username'];?>">
      </div>
      <div class="form-group">
        <label for="">Nama</label>
        <input type="text" class="form-control" name="nama_petugas" value="<?php echo $tampil['nama_petugas'];?>">
      </div>
      <div class="form-group">
        <label for="">Password</label>
        <input type="password" class="form-control" name="password" value="<?php echo $tampil['password'];?>">
      </div>

      <div class="form-group">
        <label for="">Level</label>
        <div class="form-line">
          <select name="level" class="form-control show-tick">
            <option value="">--Pilih Level--</option>
            <option value="admin" <?php if($level=='admin'){echo "selected";}  ?>>Admin</option>
            <option value="kasir"  <?php if($level=='kasir'){echo "selected";}  ?>>Kasir</option>
          </select>                    
        </div>
      </div>
      <div class="form-group">
        <label for="">Foto</label>
        <div form-line>
          <img src="dist/img/<?php echo $tampil['foto'];?>" width="150" height="150" alt="">         
        </div>
      </div>
      <div class="form-group">
        <label for="">Ganti Foto</label>
        <input type="file" class="form-control" name="foto">
      </div>






      <!-- /.box-body -->

      <div class="box-footer">
        <input type="submit" name="simpan" value="simpan" class="btn btn-primary"></input>
      </div>
    </form>

    <?php
    if(isset($_POST['simpan'])){   
     $username= $_POST['username'];
     $nama_petugas= $_POST['nama_petugas'];
     $password= $_POST['password'];
     $level= $_POST['level'];

     $foto= $_FILES['foto']['name'];
      $format = pathinfo($foto, PATHINFO_EXTENSION); // Mendapatkan format file

     

     if(($format=="jpg") or ($format=="png")){
      $lokasi = $_FILES['foto']['tmp_name'];
     $upload = move_uploaded_file($lokasi, "dist/img/".$foto);

      if($upload){

       $sql = $koneksi->query("UPDATE tb_petugas set username='$username',nama_petugas='$nama_petugas',password='$password',level='$level',foto='$foto' WHERE id_petugas='$kodepetugas'");
       if($sql){
        ?>
        <script type="text/javascript">
         alert("Data Berhasil dirubah");
         window.location.href="?page=petugas";
       </script>
       <?php
     } 
     }
      }
      else{
      ?>
      <script type="text/javascript">
         alert("format harus jpg atau png");
       </script>
       <?php


   }
 }
   ?>


</div>
          <!-- /.box -->