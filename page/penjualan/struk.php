<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
   <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
        <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet"
href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


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
<hr  color="black">



<!-- Table row -->
<div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Nama Barang</th>
              <th align="left">Harga Jual</th>
              <th>Jumlah</th>
              <th>Total</th>
            </tr>
            </thead>
            <tbody>
            
<?php

$sql2 = $koneksi->query("SELECT * FROM tb_penjualan, tb_penjualan_detail, tb_barang WHERE tb_penjualan.kode_penjualan = tb_penjualan_detail.kode_penjualan AND 
tb_penjualan.kode_barcode=tb_barang.kode_barcode AND
tb_penjualan.kode_penjualan='$kode_pj'");

while($tampil2 = $sql2->fetch_assoc()){
    ?>
<tr>
              <td><?php echo $tampil2['nama_barang'];?></td>
              <td><?php echo number_format($tampil2['harga_jual']).',-'.'&nbsp'.'&nbsp';?></td>
              <td>X <?php echo '&nbsp'.'&nbsp'.$tampil2['jumlah'];?></td>
              <td><?php echo number_format($tampil2['total']);?></td>
            </tr>
            <?php
            $diskon = $tampil2['diskon'];
            $potongan = $tampil2['potongan'];
            $bayar = $tampil2['bayar'];
            $kembali = $tampil2['kembali'];
            $total_b = $tampil2['total_b'];
            @$total_bayar = $total_bayar + $tampil2['total'];
}
            ?>

            <tr>
            <td><hr></td>
            </tr>
                      <tr>
          <th colspan="3" >Total  </th>
          <td>: <?php echo number_format($total_bayar); ?></td>
          </tr>
          <tr>
          <th colspan="3" >Diskon  </th>
          <td>: <?php echo $diskon; ?>%</td>
          </tr>
          <tr>
          <th colspan="3" >Potongan  </th>
          <td>: <?php echo number_format($potongan); ?></td>
          </tr>
          <tr>
          <th colspan="3" >Bayar  </th>
          <td>: <?php echo number_format($bayar); ?></td>
          </tr>
          <tr>
          <th colspan="3" >Kembali  </th>
          <td>: <?php echo number_format($kembali); ?></td>
          </tr>

            </tbody>
          </table>
          <hr  color="black">
          <table>
          <tr>
          <td>Barang yang sudah dibeli tidak dapat dikembalikan</td>
          </tr>
          </table>

          <hr>
          <div align="center">
          <input type="button" value="print" class="btn btn-lg btn-warning btn-flat" onClick="window.print()">
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->




<?php


?>