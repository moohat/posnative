<div class="box">
	<div class="box-header">
		<h3 class="box-title">Data Barang</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr><th>No</th>
					<th>Kode Barcode</th>
					<th>Nama Barang</th>
					<th>Satuan</th>
					<th>Stok</th>
					<th>Harga Beli</th>
					<th>Harga Jual</th>
					<th>Profit</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				$sql = $koneksi->query("select * from tb_barang");
				while($data=$sql->fetch_assoc()){

					?>
				<tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['kode_barcode'];?></td>
                  <td><?php echo $data['nama_barang'];?></td>
                  <td><?php echo $data['satuan'];?></td>
                  <td><?php echo $data['stok'];?></td>
                  <td><?php echo $data['harga_beli'];?></td>
                  <td><?php echo $data['harga_jual'];?></td>
                  <td><?php echo $data['profit'];?></td>
                  <td>
                  	<a href="?page=barang&aksi=ubah&id=<?php echo $data['kode_barcode'] ?>" class="btn btn-warning btn-flat" ><i class="fa fa-pencil-square-o"></i></a>
                  	<a onclick="return confirm('apakah mau hapus data?')" href="?page=barang&aksi=delete&id=<?php echo $data['kode_barcode'] ?>" class="btn btn-danger btn-flat" ><i class="fa fa-trash-o"></i></a>
                  	
                  </td>
                </tr>
                <?php

					
				}

				?>


			</tbody>
			<tfoot>
				<tr><th>No</th>
					<th>Kode Barcode</th>
					<th>Nama Barang</th>
					<th>Satuan</th>
					<th>Stok</th>
					<th>Harga Beli</th>
					<th>Harga Jual</th>
					<th>Profit</th>
					<th>Aksi</th>
				</tr>
			</tfoot>
		</table>
		<a href="?page=barang&aksi=tambah" class="btn btn-primary">Tambah</a>
	</div>
	<!-- /.box-body -->
</div>
<!-- /.box -->