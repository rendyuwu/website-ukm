<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

        <div class="card">
            <div class="card-header">
                Form Tambah Data Anggota UKM <?= $ukm ?>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="nim">Nim</label>
                        <input type="text" class="form-control" id="nim" value="<?= set_value('nim') ?>" name="nim">
                        <small class="form-text text-danger"><?= form_error('nim') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" value="<?= set_value('nama') ?>" name="nama">
                        <small class="form-text text-danger"><?= form_error('nama') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" id="jurusan" name="jurusan">
                            <?php foreach($Jurusan as $jurusan) : ?>
                                <option value="<?= $jurusan['nama'] ?>"><?= $jurusan['nama'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <select class="form-control" id="jabatan" value="<?= set_value('jabatan') ?>" name="jabatan">
                            <?php foreach($Jabatan as $jabatan) : ?>
                                <option value="<?= $jabatan['nama'] ?>"><?= $jabatan['nama'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" value="<?= set_value('email') ?>" name="email">
                        <small class="form-text text-danger"><?= form_error('email') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="telp">No Telp</label>
                        <input type="text" class="form-control" id="telp" value="<?= set_value('telp') ?>" name="telp">
                        <small class="form-text text-danger"><?= form_error('telp') ?></small>
                    </div>
                    <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                </form>
            </div>
        </div>
        
        
        </div>
    </div>
</div>