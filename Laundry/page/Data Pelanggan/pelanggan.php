    <!-- DataTales Example -->

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
      </div>
      <div class="card-body">
        <?php if (isset($_GET["msg"])) { ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            Data Pelanggan <strong>Berhasil!</strong> disimpan.
          </div>
        <?php } ?>
        <?php if (isset($_GET["msgu"])) { ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            Data Pelanggan <strong>Berhasil!</strong> diupdate.
          </div>
        <?php } ?>
        <?php if (isset($_GET["msgh"])) { ?>
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            Data Pelanggan <strong>Berhasil!</strong> dihapus.
          </div>
        <?php } ?>
        <a href="?page=Data Pelanggan&aksi=tambah" class="btn btn-info mb-4"><i class="fas fa-fw fa-plus"></i> Tambah</a>
        <div class="table-responsive">
          <table class="table table-bordered DataTable" style="white-space: nowrap;" id="myTable" width="100%" cellspacing="0">

            <thead align="center">
              <tr>
                <th>No</th>
                <th>Kode Pleanggan</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody align="center">
              <?php
              $no = 1;
              // $data = mysqli_query($konek,"select * from tb_pelanggan");
              $sql = $konek->query("select * from tb_pelanggan");
              while ($data = $sql->fetch_array()) {
              ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['kode_pelanggan']; ?></td>
                  <td><?php echo $data['nama']; ?></td>
                  <td><?php echo $data['alamat']; ?></td>
                  <td><?php echo "+62 " . $data['no_telp']; ?></td>
                  <td>
                    <a href="?page=Data Pelanggan&aksi=ubah&id=<?php echo $data['kode_pelanggan']; ?>" class="btn btn-warning" title=""><i class="fas fa-fw fa-edit"></i> Ubah</a>
                    <a onclick="return confirm('Apakah Anda yakin untuk menghapus data ini')" href="?page=Data Pelanggan&aksi=hapus&id=<?php echo $data['kode_pelanggan']; ?>" class="btn btn-danger" title=""><i class="fas fa-fw fa-trash"></i> Hapus</a>

                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>