
<!-- general form elements -->
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Tambah Pelanggan</h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form role="form" method="POST">
		<div class="box-body">
			<div class="form-group">
				<label for="">Kode Pelanggan</label>
				<input type="text" class="form-control" name="kode_pelanggan" placeholder="Kode Pelanggan">
			</div>
			<div class="form-group">
				<label for="">Nama Pelanggan</label>
				<input type="text" class="form-control" name="nama_pelanggan" placeholder="Nama Pelanggan">
			</div>



			<div class="form-group">
				<label>Alamat</label>
				<textarea class="form-control" rows="3" name="alamat" ></textarea>
			</div>
			<div class="form-group">
				<label for="">Telpon</label>
				<input type="number" class="form-control" name="telpon" placeholder="Isi Nomor telpon pelanggan">
			</div>
			<div class="form-group">
				<label for="">Email</label>
				<input type="text" class="form-control" name="email" placeholder="Email Pelanggan">
			</div>


			<!-- /.box-body -->

			<div class="box-footer">
				<input type="submit" name="simpan" value="simpan" class="btn btn-primary"></input>
			</div>
		</form>

		<?php
		if(isset($_POST['simpan'])){
			$kode_pelanggan= $_POST['kode_pelanggan'];
			$nama_pelanggan= $_POST['nama_pelanggan'];
			$alamat= $_POST['alamat'];
			$telpon= $_POST['telpon'];
			$email= $_POST['email'];

			$sql = $koneksi->query("INSERT INTO tb_pelanggan values ('$kode_pelanggan','$nama_pelanggan','$alamat','$telpon','$email')");
			if($sql){
				?>
				<script type="text/javascript">
					alert("Data Berhasil disimpan");
					window.location.href="?page=pelanggan";
				</script>
				<?php
			}

		}
		?>
	</div>
          <!-- /.box -->