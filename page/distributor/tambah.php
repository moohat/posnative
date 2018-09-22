
 <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah distributor</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="">Kode Distributor</label>
                  <input type="text" class="form-control" name="kode_distributor" placeholder="Kode distributor">
                </div>
                <div class="form-group">
                  <label for="">Nama Distributor</label>
                  <input type="text" class="form-control" name="nama_distributor" placeholder="Nama distributor">
                </div>
           
               
                
                 <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" rows="3" name="alamat" ></textarea>
                </div>
                <div class="form-group">
                  <label for="">Kota Asal</label>
                  <input class="form-control" name="kota_asal" placeholder="Kota Asal Distributor">
                </div>
                <div class="form-group">
                  <label for="">Email</label>
                  <input  class="form-control" name="email" placeholder="Email distributor">
                </div>
                <div class="form-group">
                  <label for="">Telpon</label>
                  <input type="number" class="form-control" name="telpon" placeholder="Isi Nomor telpon distributor">
                </div>
                 
               
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="submit" name="simpan" value="simpan" class="btn btn-primary"></input>
              </div>
            </form>

            <?php
            if(isset($_POST['simpan'])){
            	$kode_distributor= $_POST['kode_distributor'];
            	$nama_distributor= $_POST['nama_distributor'];
            	$alamat= $_POST['alamat'];
              $kota_asal= $_POST['kota_asal'];
              $email= $_POST['email'];
            	$telpon= $_POST['telpon'];

            	$sql = $koneksi->query("INSERT INTO tb_distributor values ('$kode_distributor','$nama_distributor','$alamat','$kota_asal','$email','$telpon')");
 				if($sql){
 					?>
 					<script type="text/javascript">
 						alert("Data Berhasil disimpan");
 						window.location.href="?page=distributor";
 					</script>
 					<?php
 				}

            }
            ?>
          </div>
          <!-- /.box -->