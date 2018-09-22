<div class="box">
	<div class="box-header">
		<h3 class="box-title">Data petugas</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>ID Petugas</th>
					<th>username </th>
					<th>Nama</th>
					<th>level</th>
					<th>foto</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				$sql = $koneksi->query("select * from tb_petugas");
				while($data=$sql->fetch_assoc()){

					?>
				<tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['id_petugas'];?></td>
                  <td><?php echo $data['username'];?></td>
                  <td><?php echo $data['nama_petugas'];?></td>
                  <td><?php echo $data['level'];?></td>
                  <td><img src="dist/img/<?php echo $data['foto'];?>" width="50" height="50" alt> </td>
                  <td>
                  	<a href="?page=petugas&aksi=ubah&id=<?php echo $data['id_petugas'] ?>" class="btn btn-warning btn-flat" ><i class="fa fa-pencil-square-o"></i></a>
                  	<a onclick="return confirm('apakah mau hapus data?')" href="?page=petugas&aksi=delete&id=<?php echo $data['id_petugas'] ?>" class="btn btn-danger btn-flat" ><i class="fa fa-trash-o"></i></a>
                  	
                  </td>
                </tr>
                <?php

					
				}

				?>


			</tbody>
			<tfoot>
				<tr>
					<th>No</th>
					<th>ID Petugas</th>
					<th>username </th>
					<th>Nama</th>
					<th>level</th>
					<th>foto</th>
					<th>Aksi</th>
				</tr>
			</tfoot>
		</table>
		<a href="?page=petugas&aksi=tambah" class="btn btn-primary">Tambah</a>
	</div>
	<!-- /.box-body -->
</div>
<!-- /.box -->