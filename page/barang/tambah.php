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
                  <input type="text" class="form-control" name="kode" placeholder="Kode Barcode">
                </div>
                <div class="form-group">
                  <label for="">Nama Barang</label>
                  <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang">
                </div>
                 <!-- select -->
                <div class="form-group">
                  <label>Satuan</label>
                  <select name="satuan" class="form-control">
                    <option value="">--Pilih Satuan--</option>
                    <option value="LUSIN">LUSIN</option>
                    <option value="PACK">PACK</option>
                    <option value="PCS">PCS</option>
                  </select>
                </div>
               
                
                 <div class="form-group">
                  <label for="">Stock</label>
                  <input type="number" class="form-control" name="stok" placeholder="Stok Barang">
                </div>
                 <div class="form-group">
                  <label for="">Harga Beli</label>
                  <input type="number" class="form-control" name="harga_beli" id="harga_beli" onkeyup="sum()"  placeholder="Harga Beli">
                </div>
                 <div class="form-group">
                  <label for="">Harga Jual</label>
                  <input type="number" class="form-control" name="harga_jual" id="harga_jual" onkeyup="sum()"  placeholder="Harga Jual">
                </div>
                 <div class="form-group">
                  <label for="">Profit</label>
                  <input type="number" class="form-control" name="profit" id="profit" readonly="" style="background-color: #e7e3e9;" value="0">
                </div>
               
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="submit" name="simpan" value="simpan" class="btn btn-primary"></input>
              </div>
            </form>

            <?php
            if(isset($_POST['simpan'])){
            	$kode= $_POST['kode'];
            	$nama_barang= $_POST['nama_barang'];
            	$satuan= $_POST['satuan'];
            	$stok= $_POST['stok'];
            	$harga_beli= $_POST['harga_beli'];
            	$harga_jual= $_POST['harga_jual'];
            	$profit= $_POST['profit'];

            	$sql = $koneksi->query("INSERT INTO tb_barang values ('$kode','$nama_barang','$satuan','$stok','$harga_beli','$harga_jual','$profit')");
 				if($sql){
 					?>
 					<script type="text/javascript">
 						alert("Data Berhasil disimpan");
 						window.location.href="?page=barang";
 					</script>
 					<?php
 				}

            }
            ?>
          </div>
          <!-- /.box -->