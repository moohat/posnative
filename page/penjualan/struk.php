<?php
$koneksi = new mysqli("127.0.0.1","root","","db_pos" );
 $nama_petugas =  $_GET['nama_petugas'];
 $kode_pj = $_GET['kode_pj'];
?>

<h4>Struk Belanja</h4>

<table>
<tr>
<td>Koperasi ABC</td>
</tr>
<tr>
<td>Jl. Raya Narogong blok  A 77 No. 123</td>
</tr>
</table>
<hr  color="black">
<table>
<?php
$sql = $koneksi->query("SELECT * FROM tb_penjualan,tb_pelanggan WHERE tb_penjualan.id_pelanggan=tb_pelanggan.kode_pelanggan AND kode_penjualan = '$kode_pj' ");
$tampil = $sql->fetch_assoc();

?>

<tr>
<td>Kode Penjualan &nbsp&nbsp</td>
<td>: <?php echo $tampil['kode_penjualan']; ?></td>
</tr>
<tr>
<td>Tanggal  &nbsp&nbsp</td>
<td>: <?php echo $tampil['tgl_penjualan']; ?></td>
</tr>
<tr>
<td>Pelanggan  &nbsp&nbsp</td>
<td>: <?php echo $tampil['nama']; ?></td>
</tr>
<tr>
<td>Kasir  &nbsp&nbsp</td>
<td>: <?php echo $nama_petugas ?></td>
</tr>

</table>


<?php

$sql2 = $koneksi->query("SELECT * FROM tb_penjualan, tb_penjualan_detail, tb_barang WHERE tb_penjualan.kode_penjualan = tb_penjualan_detail.kode_penjualan AND 
tb_penjualan.kode_barcode=tb_barang.kode_barcode AND
tb_penjualan.kode_penjualan='$kode_pj'");

while($tampil2 = $sql2->fetch_assoc()){
    ?>

<tr>
<td>Nama Barang  &nbsp&nbsp</td>
<td>: <?php echo $tampil2['nama_barang'];?></td>
<td>: <?php echo number_format($tampil2['harga_jual'],2).'&nbsp'.'&nbsp'.'X'.'&nbsp'.'&nbsp'.$tampil2['jumlah'].'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp'.'&nbsp';?></td>
</tr>



<?php
}

?>