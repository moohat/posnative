<?php
$id = $_GET['id'];
$kode_pj = $_GET['kode_pj'];
$harga_jual = $_GET['harga_jual'];
$kode_barcode = $_GET['kode_barcode'];
$jumlah = $_GET['jumlah'];


$sql = $koneksi->query("UPDATE tb_barang SET stok=(stok+'$jumlah') WHERE kode_barcode='$kode_barcode'");
$sql2 = $koneksi->query("DELETE FROM tb_penjualan WHERE kode_penjualan = '$kode_pj' AND kode_barcode='$kode_barcode'");

if( $sql1 || $sql2){
    ?>
    <script>
    window.location.href="?page=penjualan&kodepj=<?php echo $kode_pj; ?>";
    </script>

    <?php
}

?>