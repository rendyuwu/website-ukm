<div class="container">
    
    <?php if( $this->session->flashdata('flash') ) : ?>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data anggota <?= $ukm ?> <strong>berhasil</strong> <?= $this->session->flashdata('flash') ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <?php endif ?>

    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?= base_url('ukm/tambah/') ?><?= $ukm ?>" class="btn btn-primary">Tambah Data Anggota</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-5">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari data anggota <?= $ukm ?>.." name="keyword" autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <input class="btn btn-primary" type="submit" name="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md">
        <h4 class="mt-3">Daftar anggota ukm <?= $ukm; ?></h4>
        <h5>Results : <?= $total_rows ?></h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php if ( empty($anggotaUkm) ) : ?>
                    <tr>
                        <td colspan="4">
                            <div class="alert alert-danger" role="alert">
                                Data anggota ukm <?= $ukm ?> tidak ditemukan.
                            </div>
                        </td>
                    </tr>                    
                <?php endif ?>
                <?php foreach($anggotaUkm as $anggota): ?>
                    <tr>
                        <th><?= ++$start ?></th>
                        <td><?= $anggota['nama'] ?></td>
                        <td><?= $anggota['email'] ?></td>
                        <td>
                            <a href="<?= base_url() ?>ukm/hapus/<?= $ukm ?>/<?= $anggota['id'] ?>" class="badge badge-warning">detail</a>
                            <a href="<?= base_url() ?>ukm/ubah/<?= $ukm ?>/<?= $anggota['id'] ?>" class="badge badge-success">ubah</a>
                            <a href="<?= base_url() ?>ukm/detail/<?= $ukm ?>/<?= $anggota['id'] ?>" class="badge badge-danger" onclick="return confirm('yakin?')">hapus</a>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>

            <?= $this->pagination->create_links(); ?>

        </div>
    </div>
</div>