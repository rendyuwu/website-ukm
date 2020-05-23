<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

        <div class="card">
            <div class="card-header">
                Form Ubah Data Anggota UKM <?= $ukm ?>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $detailAnggota['id'] ?>">
                    <div class="form-group">
                        <label for="nim">Nim</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="<?= $detailAnggota['nim'] ?>">
                        <small class="form-text text-danger"><?= form_error('nim') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $detailAnggota['nama'] ?>">
                        <small class="form-text text-danger"><?= form_error('nama') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" id="jurusan" name="jurusan">
                            <?php foreach($Jurusan as $jurusan) : ?>
                                <?php if( $jurusan['nama'] == $detailAnggota['jurusan'] ): ?>
                                    <option value="<?= $jurusan['nama'] ?>" selected><?= $jurusan['nama'] ?></option>
                                <?php else : ?>
                                    <option value="<?= $jurusan['nama'] ?>"><?= $jurusan['nama'] ?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <select class="form-control" id="jabatan" name="jabatan">
                            <?php foreach($Jabatan as $jabatan) : ?>
                                <?php if( $jabatan['nama'] == $detailAnggota['jabatan'] ): ?>
                                    <option value="<?= $jabatan['nama'] ?>" selected><?= $jabatan['nama'] ?></option>
                                <?php else : ?>
                                    <option value="<?= $jabatan['nama'] ?>"><?= $jabatan['nama'] ?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?= $detailAnggota['email'] ?>">
                        <small class="form-text text-danger"><?= form_error('email') ?></small>
                    </div>
                    <div class="form-group">
                        <label for="telp">No Telp</label>
                        <input type="text" class="form-control" id="telp" name="telp" value="<?= $detailAnggota['telp'] ?>">
                        <small class="form-text text-danger"><?= form_error('telp') ?></small>
                    </div>
                    <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                </form>
            </div>
        </div>
        
        
        </div>
    </div>
</div>