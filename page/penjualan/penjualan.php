<?php 
$kode = $_GET['kodepj'];
?>

<!-- general form elements -->
<div class="box box-primary">

	<!-- /.box-header -->
	<!-- form start -->
	<form role="form" method="POST">
		<div class="box-body">
			<div class="col-md-2">                
				<input type="text" class="form-control" name="kode" value="<?php echo $kode; ?>" readonly>
			</div>
			<div class="col-md-2">                  
				<input type="text" class="form-control" name="kode_barcode">
			</div>
			<div class="col-md-2">                  
				<input type="submit" class="btn btn-primary" name="simpan" value="Tambahkan">
			</div>
		</div>
	</form>
</div>

<?php 
if(isset($_POST['simpan'])){

	$date = date("Y-m-d");

	$kd_pj = $_POST['kode'];
	$barcode = $_POST['kode_barcode'];

	$barang  = $koneksi->query("SELECT * FROM tb_barang WHERE kode_barcode='$barcode'");

	$data_barang = $barang->fetch_assoc();
	$harga_jual = $data_barang['harga_jual'];
	$total = $jumlah * $harga_jual;
	$barang2 = $koneksi->query("SELECT * FROM tb_barang WHERE kode_barcode='$barcode'");

	while ($data_barang2 = $barang2->fetch_assoc()) {
		$sisa = $data_barang2['stok'];

		if($sisa < 1 ){
			?>

			<script type="text/javascript">

				alert("Stock Barang HABIS... Tidak Dapat melakukan penjualan");
				window.location.href='?page=penjualan&kodepj=<?php echo $kode; ?>'
			</script>

			<?php
		}

		else{
			$koneksi->query("INSERT INTO tb_penjualan (kode_penjualan, kode_barcode, jumlah, total, tgl_penjualan ) values('$kodepj', ) ");
		}

	}



}
?>
