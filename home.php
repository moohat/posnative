<?php 
$tgl = date("Y-m-d");
$sql = $koneksi->query("SELECT * FROM tb_penjualan,tb_barang WHERE tb_penjualan.kode_barcode = tb_barang.kode_barcode AND tgl_penjualan='$tgl'");

while($tampil=$sql->fetch_assoc()){

  $profit = $tampil['profit']* $tampil['jumlah']; 
  $total_pj = $total_pj + $tampil['total'];
  $total_profit = $total_profit+$profit;

}  

$sql2 = $koneksi->query("SELECT * FROM tb_barang");

while($tampil2 =$sql2->fetch_assoc()){
  $jumlah_brg = $sql2->num_rows;
}

$qry =  $koneksi->query(" SELECT SUM(profit*jumlah) as profit_total FROM tb_penjualan,tb_barang WHERE tb_penjualan.kode_barcode = tb_barang.kode_barcode ");
$data = $qry->fetch_assoc();
$profit_total =  $data['profit_total'];


?>
 <marquee behavior="" direction="">Selamat Datang di Sistem Informasi Penjualan</marquee>
 <!-- Main content -->
 <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $jumlah_brg; ?></h3>

              <p>Data Barang</p>
            </div>
            <div class="icon">
              <i class="fa fa-inbox"></i>
            </div>
            <a href="?page=barang" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>Rp. <?php echo number_format($total_pj) ; ?></h3>

              <p>Penjualan Hari Ini</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>Rp. <?php echo number_format($total_profit) ; ?></h3>

              <p>Profit Hari ini</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>Rp. <?php echo number_format($profit_total) ; ?></h3>

              <p>Total Profit </p>
            </div>
            <div class="icon">
              <i class="fa fa-bar-chart-o"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
     
          <!-- /.nav-tabs-custom -->