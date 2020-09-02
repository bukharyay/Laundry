<script type="text/javascript">
	function sum() {
		var jumlah_kiloan = document.getElementById('jumlah_kiloan').value;
		var total = parseInt(jumlah_kiloan) * 7000;

		if (!isNaN(total)) {
			document.getElementById('nominal').value = total;

		}
	}
</script>
<div class="mx-auto w-75 justify-content-center">
	<div class="card shadow">
		<h5 class="card-header">Tambah Data Transaksi Laundry</h5>
		<div class="card-body">
			<h5 class="card-title" hidden>Silahkan Masukkan Tambah Data!</h5>

			<form method="POST">

				<div class="form-group">
					<label for="outlet">Outlet : </label>
					<select class="form-control" name="outlet" required>
						<option value="">- Pilih Outlet -</option>
						<?php
						$sql = $konek->query("SELECT * FROM tb_outlet");
						while ($data = $sql->fetch_array()) {
							echo "<option value='$data[id_outlet]'>$data[nama_outlet]</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="pelanggan">Pelanggan : </label>
					<select class="form-control" name="pelanggan" required>
						<option value="">- Pilih Pelanggan -</option>
						<?php
						$sql = $konek->query("SELECT * FROM tb_pelanggan");
						while ($data = $sql->fetch_array()) {
							echo "<option value='$data[kode_pelanggan]'>$data[nama]</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="tanggal terima">Tanggal Terima : </label>
					<input type="date" class="form-control" name="tgl_terima" required>
				</div>
				<div class="form-group">
					<label for="tanggal selesai">Tanggal Selesai : </label>
					<input type="date" class="form-control" name="tgl_selesai" required>
				</div>
				<div class="form-group">
					<label for="jumlah kiloan">Jumlah Kiloan : </label>
					<div class="input-group">
						<input type="text" class="form-control number" name="jml_kiloan" onkeyup="sum();" id="jumlah_kiloan" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" required>
						<div class="input-group-append">
							<span class="input-group-text">KG</span>
						</div>
					</div>
					<small class="form-text text-muted">Input berat yang sesuai</small>

				</div>
				<div class="form-group">
					<label for="nominal">Nominal : </label>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Rp</span>
						</div>
						<input type="text" class="form-control" name="total" id="nominal" readonly>
						<div class="input-group-append">
							<span class="input-group-text">.00</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="status">Status : </label>
					<select class="form-control" name="status" required>
						<option value="">-Pilih Status-</option>
						<option value="Lunas">Lunas</option>
						<option value="Belum Lunas">Belum Lunas</option>
					</select>
				</div>
				<div class="form-group">
					<label for="catatan">Catatan : </label>
					<textarea name="catatan" rows="3" class="form-control" required></textarea>
				</div>
				<div class="mt-5 text-center">
					<a href="?page=Transaksi Laundry" class="btn btn-secondary"><i class="fas fa-fw fa-chevron-left"></i> Back</a>
					<button type="submit" name="simpan" class="btn btn-primary">Save <i class="fas fa-fw fa-magic"></i></button>
				</div>
			</form>

		</div>
	</div>

</div>

<?php

if (isset($_POST['simpan'])) {

	$outlet = $_POST['outlet'];
	$pelanggan = $_POST['pelanggan'];
	$tgl_terima = $_POST['tgl_terima'];
	$tgl_selesai = $_POST['tgl_selesai'];
	$jml_kiloan = $_POST['jml_kiloan'];
	$nominal = $_POST['total'];
	$status = $_POST['status'];
	$catatan = $_POST['catatan'];
	// $id_user = $_POST['id_user'];


	$sql = $konek->query("INSERT INTO `tb_laundry` (`id_laundry`, `kode_pelanggan`, `id_user`, `id_outlet`, `tanggal_terima`, `tanggal_selesai`, `jumlah_kiloan`, `nominal`, `status`, `catatan`) VALUES (NULL, '$pelanggan', '$id_user', '$outlet', '$tgl_terima', '$tgl_selesai', '$jml_kiloan', '$nominal', '$status', '$catatan')");

	if ($sql) {
?>
		<script type="text/javascript">
			// alert("Data berhasil di Tambahkan!");
			window.location.href = "?page=Transaksi Laundry&msg";
		</script>
		<?php }
	if ($status == "1") {

		$sql = $konek->query("INSERT INTO `tb_transaksi` (`id_transaksi`, `id_user`, `tgl_transaksi`, `pemasukan`, `catatan`, `keterangan`) VALUES (NULL, '$id_user', '$tgl_terima', '$nominal','$catatan','pemasukan')");

		if ($sql) {
		?>
			<script type="text/javascript">
				// alert("Data berhasil di Tambahkan!");
				window.location.href = "?page=Transaksi Laundry&msg";
			</script>
<?php
		}
	}
}
?>