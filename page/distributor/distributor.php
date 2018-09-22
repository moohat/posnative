<div class="box">
	<div class="box-header">
		<h3 class="box-title">Data Distributor</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr><th>No</th>
					<th>Kode Distributor</th>
					<th>Nama </th>
					<th>Alamat</th>
					<th>Kota Asal</th>
					<th>Email</th>
					<th>Telpon</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				$sql = $koneksi->query("select * from tb_distributor");
				while($data=$sql->fetch_assoc()){

					?>
				<tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['id_distributor'];?></td>
                  <td><?php echo $data['nama_distributor'];?></td>
                  <td><?php echo $data['alamat'];?></td>
                  <td><?php echo $data['kota_asal'];?></td>
                  <td><?php echo $data['email'];?></td>
                  <td><?php echo $data['telpon'];?></td>
                  <td>
                  	<a href="?page=distributor&aksi=ubah&id=<?php echo $data['id_distributor'] ?>" class="btn btn-warning btn-flat" ><i class="fa fa-pencil-square-o"></i></a>
                  	<a onclick="return confirm('apakah mau hapus data?')" href="?page=distributor&aksi=delete&id=<?php echo $data['id_distributor'] ?>" class="btn btn-danger btn-flat" ><i class="fa fa-trash-o"></i></a>
                  	
                  </td>
                </tr>
                <?php

					
				}

				?>


			</tbody>
			<tfoot>
				<tr><th>No</th>
					<th>Kode Distributor</th>
					<th>Nama </th>
					<th>Alamat</th>
					<th>Kota Asal</th>
					<th>Email</th>
					<th>Telpon</th>
					<th>Aksi</th>
				</tr>
			</tfoot>
		</table>
		<a href="?page=distributor&aksi=tambah" class="btn btn-primary">Tambah</a>
	</div>
	<!-- /.box-body -->
</div>
<!-- /.box -->