 <!-- jQuery 3 -->
 <script src="bower_components/jquery/dist/jquery.min.js"></script>

<?php
$kode = $_GET['kodepj'];
$nama_petugas = $data['nama_petugas'];
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
if (isset($_POST['simpan'])) {

    $date = date("Y-m-d");

    $kd_pj = $_POST['kode'];
    $barcode = $_POST['kode_barcode'];

    $barang = $koneksi->query("SELECT * FROM tb_barang WHERE kode_barcode='$barcode'");

    $data_barang = $barang->fetch_assoc();
    $harga_jual = $data_barang['harga_jual'];
    $jumlah = 1;
    $total = $jumlah * $harga_jual;
    $barang2 = $koneksi->query("SELECT * FROM tb_barang WHERE kode_barcode='$barcode'");

    while ($data_barang2 = $barang2->fetch_assoc()) {
        $sisa = $data_barang2['stok'];

        if ($sisa < 1) {
            ?>

			<script type="text/javascript">

				alert("Stock Barang HABIS... Tidak Dapat melakukan penjualan");
				window.location.href='?page=penjualan&kodepj=<?php echo $kode; ?>'
			</script>

			<?php
} else {
            $inputData = $koneksi->query("INSERT INTO tb_penjualan (kode_penjualan, kode_barcode, jumlah, total, tgl_penjualan ) values('$kode','$barcode', '$jumlah', '$total', '$date' ) ");
        }

    }

}
?>

<br><br><br><br>
<form method="post">
<div class="col-md-4">
<label for="">Pelanggan</label>
<select name="pelanggan" class="form-control show-tick">
<?php
$pelanggan = $koneksi->query("SELECT * FROM  tb_pelanggan order by kode_pelanggan");
while($d_pelanggan = $pelanggan->fetch_assoc()){
	echo"
	<option value='$d_pelanggan[kode_pelanggan]'>$d_pelanggan[nama]</option>
	";
}
?>
</select>
</div>

<hr><hr><hr>
<div class="box">
	<div class="box-header">
		<h3 class="box-title">Daftar Belanjaan</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table class="table table-striped">
			<thead>
				<tr><th>No</th>
					<th>Kode Barcode</th>
					<th>Nama Barang</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Subtotal</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
$no = 1;
$sql = $koneksi->query("SELECT * FROM tb_penjualan, tb_barang
				WHERE tb_penjualan.kode_barcode=tb_barang.kode_barcode
				AND kode_penjualan='$kode'");
while ($data = $sql->fetch_assoc()) {
    ?>
				<tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['kode_barcode']; ?></td>
                  <td><?php echo $data['nama_barang']; ?></td>
                  <td><?php echo $data['harga_jual']; ?></td>
                  <td><?php echo $data['jumlah']; ?></td>
                  <td><?php echo $data['total']; ?></td>
				  <td>
					<a href="?page=pelanggan&aksi=ubah&id=<?php echo $data['kode_pelanggan'] ?>" class="btn btn-warning btn-flat" >Tambah</a>
					<a href="?page=pelanggan&aksi=ubah&id=<?php echo $data['kode_pelanggan'] ?>" class="btn btn-warning btn-flat" >Kurang</a>
                  	<a onclick="return confirm('apakah mau hapus data?')" href="?page=pelanggan&aksi=delete&id=<?php echo $data['kode_pelanggan'] ?>" class="btn btn-danger btn-flat" >Hapus</a>
                  </td>

                </tr>
                <?php
				$total_bayar = $total_bayar+$data['total'];
}
?>

			</tbody>
			<tr>
			<th colspan="5" style="text-align: right;">Total</th>
			<td><input style="text-align: right;" type="text" nama="total_bayar" id="total_bayar" onkeyup="hitung();" value="<?php echo $total_bayar?>" readonly></td>
			</tr>
			<tr>
			<th colspan="5" style="text-align: right;">Diskon</th>
			<td><input style="text-align: right;" type="number"  onkeyup="hitung();" name="diskon" id="diskon"></td>
			</tr>
			<tr>
			<th colspan="5" style="text-align: right;">Potongan Harga</th>
			<td><input style="text-align: right;" name="potongan" id="potongan" onkeyup="hitung();" type="number"></td>
			</tr>
			</tr>
			<tr>
			<th colspan="5" style="text-align: right;">Sub Total</th>
			<td><input style="text-align: right;" name="s_total" id="s_total"  type="number"></td>
			</tr>
			</tr>
			<tr>
			<th colspan="5" style="text-align: right;">Bayar</th>
			<td><input style="text-align: right;" name="bayar" id="bayar" onkeyup="hitung();"  type="number"></td>
			</tr>
			<tr>
			<th colspan="5" style="text-align: right;">Kembali</th>
			<td><input style="text-align: right;" name="kembali" id="kembali"  type="number">
			
			<input type="submit" name="simpan_pj" value="Simpan" class="btn btn-info btn-flat">

			<input type="submit" value="Cetak Struk" class="btn btn-success btn-flat" onclick="window.open('page/penjualan/struk.php?kode_pj=<?php echo $kode; ?>&nama_petugas=<?php echo $nama_petugas; ?>','mywindow','width=500px, height=600px, left=300px;')">
			</td>
			</tr>

		</table>

	</div>
	<!-- /.box-body -->
</div>
<!-- /.box -->
</form>

<?php
if(isset($_POST['simpan_pj'])){
	$pelanggan = $_POST['pelanggan'];
	$total_bayar = $_POST['total_$total_bayar'];
	$diskon = $_POST['diskon'];
	$potongan = $_POST['potongan'];
	$s_total = $_POST['s_total'];


	$bayar = $_POST['bayar'];
	$kembali = $_POST['kembali'];

	$koneksi->query("INSERT INTO tb_penjualan_detail(kode_penjualan, bayar, kembali, diskon, potongan, total )VALUES('$kode', '$bayar','$kembali','$diskon','$potongan', '$s_total')");

	$koneksi->query("UPDATE tb_penjualan SET id_pelanggan='$pelanggan' WHERE kode_penjualan='$kode'");

}

?>



<script type="text/javascript">
function hitung() {	
	var total_bayar = document.getElementById('total_bayar').value;
	var diskon = document.getElementById('diskon').value;
	var diskon_pot = parseInt(total_bayar)* parseInt(diskon)/parseInt(100);
	var bayar = document.getElementById('bayar').value;	

	if(!isNaN(diskon_pot)){
		var potongan = document.getElementById('potongan').value = diskon_pot;
	}

	var jumlahSubTotal = parseInt(total_bayar)- parseInt(diskon_pot);
	if(!isNaN(jumlahSubTotal)){

		var s_total = document.getElementById('s_total').value = jumlahSubTotal;
	}

	var kembali = parseInt(bayar)- parseInt(jumlahSubTotal);
	if(!isNaN(kembali)){

		var kembalian =	document.getElementById('kembali').value=kembali;
	}
	}

</script>