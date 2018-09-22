 <?php
 	$kodeBarcode = $_GET['id'];
 	$sql = $koneksi->query("DELETE FROM tb_barang where kode_barcode='$kodeBarcode'");
 	if($sql){
 					?>
 					<script type="text/javascript">
 						alert("Data Berhasil dihapus");
 						window.location.href="?page=barang";
 					</script>
 					<?php
 				}

 ?>