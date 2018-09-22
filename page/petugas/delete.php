 <?php
 	$kodepetugas = $_GET['id'];
 	$sql = $koneksi->query("DELETE FROM tb_petugas where id_petugas='$kodepetugas'");
 	if($sql){
 					?>
 					<script type="text/javascript">
 						alert("Data Berhasil dihapus");
 						window.location.href="?page=petugas";
 					</script>
 					<?php
 				}

 ?>