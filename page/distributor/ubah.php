

 <?php
 	$kodedistributor = $_GET['id'];
 	$sql = $koneksi->query("SELECT * FROM tb_distributor where id_distributor='$kodedistributor'");
 	$tampil = $sql->fetch_assoc();

 ?>
 <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ubah distributor</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="">Kode distributor</label>
                  <input type="text" class="form-control" name="kode_distributor" readonly="" value="<?php echo $tampil['id_distributor'];?>">
                </div>
                <div class="form-group">
                  <label for="">Nama distributor</label>
                  <input type="text" class="form-control" name="nama_distributor" value="<?php echo $tampil['nama_distributor'];?>">
                </div>
           
               
                
                <!-- textarea -->
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" rows="3" name="alamat" ><?php echo $tampil['alamat'];?></textarea>
                </div>
                <div class="form-group">
                  <label for="">Kota Asal</label>
                  <input class="form-control" name="kota_asal" value="<?php echo $tampil['kota_asal'];?>">
                </div><div class="form-group">
                  <label for="">Email</label>
                  <input class="form-control" name="email" value="<?php echo $tampil['email'];?>">
                </div>
                <div class="form-group">
                  <label for="">Telpon</label>
                  <input type="number" class="form-control" name="telpon" value="<?php echo $tampil['telpon'];?>">
                </div>
                 
               
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="submit" name="update" value="Ubah" class="btn btn-primary"></input>
              </div>
            </form>

            <?php
            if(isset($_POST['update'])){
            	$kode_distributor= $_POST['kode_distributor'];
              $nama_distributor= $_POST['nama_distributor'];
              $alamat= $_POST['alamat'];
              $kota_asal= $_POST['kota_asal'];
              $email= $_POST['email'];
              $telpon= $_POST['telpon'];
            	$sql = $koneksi->query("UPDATE tb_distributor set nama_distributor='$nama_distributor',alamat='$alamat',kota_asal='$kota_asal',email='$email',telpon ='$telpon' WHERE id_distributor='$kodedistributor'");
 				if($sql){
 					?>
 					<script type="text/javascript">
 						alert("Data Berhasil dirubah");
 						window.location.href="?page=distributor";
 					</script>
 					<?php
 				}

            }
            ?>
          </div>
          <!-- /.box -->