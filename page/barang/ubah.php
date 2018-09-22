 <script type="text/javascript">
 	function sum(){
 		var harga_beli = document.getElementById('harga_beli').value;
 		var harga_jual = document.getElementById('harga_jual').value;
 		var result = parseInt(harga_jual) - parseInt(harga_beli);
 		if(!isNaN(result)){
 			document.getElementById('profit').value = result;
 		}
 	}
 </script>

 <?php
 	$kodeBarcode = $_GET['id'];
 	$sql = $koneksi->query("SELECT * FROM tb_barang where kode_barcode='$kodeBarcode'");
 	$tampil = $sql->fetch_assoc();
 	$satuan = $tampil['satuan'];

 ?>

 <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Barang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="">Kode Barcode</label>
                  <input type="text" class="form-control" name="kode" readonly="" value="<?php echo $tampil['kode_barcode'];?>">
                </div>
                <div class="form-group">
                  <label for="">Nama Barang</label>
                  <input type="text" class="form-control" name="nama_barang" value="<?php echo $tampil['nama_barang'];?>">
                </div>
                 <!-- select -->
                <div class="form-group">
                  <label>Satuan</label>
                  <select name="satuan" class="form-control">
                    <option value="">--Pilih Satuan--</option>
                    <option value="LUSIN" <?php if($satuan=='LUSIN'){echo "selected";}  ?>>LUSIN</option>
                    <option value="PACK" <?php if($satuan=='PACK'){echo "selected";}  ?>>PACK</option>
                    <option value="PCS" <?php if($satuan=='PCS'){echo "selected";}  ?>>PCS</option>
                  </select>
                </div>
                
                 
                <div class="form-group">
                  <label for="">Stock</label>
                  <input type="number" class="form-control" name="stok" value="<?php echo $tampil['stok'];?>">
                </div>
                <div class="form-group">
                  <label for="">Harga Beli</label>
                  <input type="number" class="form-control" name="harga_beli" id="harga_beli" onkeyup="sum()"  value="<?php echo $tampil['harga_beli'];?>">
                </div>
                 <div class="form-group">
                  <label for="">Harga Jual</label>
                  <input type="number" class="form-control" name="harga_jual" id="harga_jual" onkeyup="sum()"  value="<?php echo $tampil['harga_jual'];?>">
                </div>
                 <div class="form-group">
                  <label for="">Profit</label>
                  <input type="number" class="form-control" name="profit" id="profit" readonly="" value="<?php echo $tampil['profit'];?>" style="background-color: #e7e3e9;" value="0">
                </div>
               
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="submit" name="update" value="update" class="btn btn-primary"></input>
              </div>
            </form>

            <?php
            if(isset($_POST['update'])){
            	$kode= $_POST['kode'];
            	$nama_barang= $_POST['nama_barang'];
            	$satuan= $_POST['satuan'];
            	$stok= $_POST['stok'];
            	$harga_beli= $_POST['harga_beli'];
            	$harga_jual= $_POST['harga_jual'];
            	$profit= $_POST['profit'];

            	$sql = $koneksi->query("UPDATE tb_barang set nama_barang='$nama_barang',satuan='$satuan',stok ='$stok',harga_beli='$harga_beli',harga_jual='$harga_jual',profit='$profit' WHERE kode_barcode='$kodeBarcode'");
 				if($sql){
 					?>
 					<script type="text/javascript">
 						alert("Data Berhasil diupdate");
 						window.location.href="?page=barang";
 					</script>
 					<?php
 				}

            }
            ?>
          </div>
          <!-- /.box -->