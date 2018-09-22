
<!-- general form elements -->
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Tambah petugas</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form role="form" method="POST" enctype="multipart/form-data">
    <div class="box-body">
      <div class="form-group">
        <label for="">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Kode petugas">
      </div>
      <div class="form-group">
        <label for="">Nama</label>
        <input type="text" class="form-control" name="nama_petugas" placeholder="Nama petugas">
      </div>
      <div class="form-group">
        <label for="">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">
      </div>

      <div class="form-group">
        <label for="">Level</label>
        <div class="form-line">
          <select name="level" class="form-control show-tick">
            <option value="">--Pilih Level--</option>
            <option value="admin">Admin</option>
            <option value="kasir">Kasir</option>
          </select>                    
        </div>
      </div>
      <div class="form-group">
        <label for="">Foto</label>
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

       $sql = $koneksi->query("INSERT INTO tb_petugas(username,nama_petugas,password,level,foto) values ('$username','$nama_petugas','$password','$level','$foto')");
       if($sql){
        ?>
        <script type="text/javascript">
         alert("Data Berhasil disimpan");
         window.location.href="?page=petugas";
       </script>
       <?php
     } 
     }
      }
      else{
      ?>
      <script type="text/javascript">
         alert("Data Gagal disimpan, format harus jpg atau png");
       </script>
       <?php


   }
 }
   ?>


</div>
          <!-- /.box -->