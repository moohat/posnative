 <?php
 	$kodePelanggan = $_GET['id'];
 	$sql = $koneksi->query("DELETE FROM tb_pelanggan where kode_pelanggan='$kodePelanggan'");
 	if($sql){
 					?>
 					<script type="text/javascript">
 						alert("Data Berhasil dihapus");
 						window.location.href="?page=pelanggan";
 					</script>
 					<?php
 				}

 ?>