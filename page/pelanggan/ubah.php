

 <?php
 	$kodePelanggan = $_GET['id'];
 	$sql = $koneksi->query("SELECT * FROM tb_pelanggan where kode_pelanggan='$kodePelanggan'");
 	$tampil = $sql->fetch_assoc();

 ?>
 <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ubah Pelanggan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="">Kode Pelanggan</label>
                  <input type="text" class="form-control" name="kode_pelanggan" readonly="" value="<?php echo $tampil['kode_pelanggan'];?>">
                </div>
                <div class="form-group">
                  <label for="">Nama Pelanggan</label>
                  <input type="text" class="form-control" name="nama_pelanggan" value="<?php echo $tampil['nama'];?>">
                </div>
           
               
                
                <!-- textarea -->
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" rows="3" name="alamat" ><?php echo $tampil['alamat'];?></textarea>
                </div>
                <div class="form-group">
                  <label for="">Telpon</label>
                  <input type="number" class="form-control" name="telpon" value="<?php echo $tampil['telpon'];?>">
                </div>
                  <div class="form-group">
                  <label for="">Email</label>
                  <input type="text" class="form-control" name="email" value="<?php echo $tampil['email'];?>">
                </div>
                 
               
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="submit" name="update" value="Ubah" class="btn btn-primary"></input>
              </div>
            </form>

            <?php
            if(isset($_POST['update'])){
            	$kode_pelanggan= $_POST['kode_pelanggan'];
            	$nama= $_POST['nama_pelanggan'];
            	$alamat= $_POST['alamat'];
            	$telpon= $_POST['telpon'];
              $email= $_POST['email'];

            	$sql = $koneksi->query("UPDATE tb_pelanggan set nama='$nama',alamat='$alamat',telpon ='$telpon', email='$email' WHERE kode_pelanggan='$kodePelanggan'");
 				if($sql){
 					?>
 					<script type="text/javascript">
 						alert("Data Berhasil dirubah");
 						window.location.href="?page=pelanggan";
 					</script>
 					<?php
 				}

            }
            ?>
          </div>
          <!-- /.box -->