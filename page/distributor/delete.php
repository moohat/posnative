 <?php
 	$kodeDistributor = $_GET['id'];
 	$sql = $koneksi->query("DELETE FROM tb_distributor where id_distributor='$kodeDistributor'");
 	if($sql){
 					?>
 					<script type="text/javascript">
 						alert("Data Berhasil dihapus");
 						window.location.href="?page=distributor";
 					</script>
 					<?php
 				}

 ?>