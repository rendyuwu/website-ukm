<div class="container">
    <div class="row mt-3">
        <div class="col-md-7">

        <div class="card">
            <div class="card-header">
                Detail anggota <?= $ukm ?>
            </div>
            <div class="card-body">
                <table class="table">
                <tbody>
                    <tr>
                        <td><h5 class="card-title">Nama</h5></td>
                        <td>
                            <h5 class="card-title"><?= $detailAnggota['nama'] ?><small class="card-text ml-2">(<?= $detailAnggota['jabatan'] ?>)</small></h5>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><h6 class="card-subtitle mb-2 text-muted"><?= $detailAnggota['email'] ?></h6></td>
                    </tr>
                    <tr>
                        <td><p class="card-text">Nim</p></td>
                        <td><p class="card-text"><?= $detailAnggota['nim'] ?></p></td>
                    </tr>
                    <tr>
                        <td><p class="card-text">Jurusan</p></td>
                        <td><p class="card-text"><?= $detailAnggota['jurusan'] ?></p></td>
                    </tr>
                    <tr>
                        <td><p class="card-text">No Telp</p></td>
                        <td><p class="card-text"><?= $detailAnggota['telp'] ?></p></td>
                    </tr>
                    <tr>
                        <td colspan="2"><a href="<?= base_url('ukm/index/') ?><?= $ukm ?>" class="btn btn-primary">Kembali</a></td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>

        </div>
    </div>