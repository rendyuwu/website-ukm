<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title><?= $judul ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- MATERIAL DESIGN ICONIC FONT -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/register/') ?>fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

	<!-- STYLE CSS -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/register/') ?>css/style.css">
</head>

<body>

	<div class="wrapper">
		<div class="inner">
			<form action="" method="post">
				<h3>Form Pendaftaran</h3>
				<div class="form-group">
					<input type="text" name="namaAwal" id="namaAwal" placeholder="Nama Awal" value="<?= set_value('namaAwal') ?>" class="form-control">
					<input type="text" name="namaAkhir" id="namaAkhir" placeholder="Nama Akhir" value="<?= set_value('namaAkhir') ?>" class="form-control">
				</div>
				<small class="form-text text-danger"><?= form_error('namaAwal') ?></small>
				<div class="form-wrapper">
					<input type="text" name="email" id="email" placeholder="Alamat Email" value="<?= set_value('email') ?>" class="form-control">
					<i class="zmdi zmdi-email"></i>
				</div>
				<small class="form-text text-danger"><?= form_error('email') ?></small>
				<div class="form-wrapper">
					<select name="pengurus" id="pengurus" class="form-control">
						<option value="" disabled selected>Pengurus</option>
						<?php foreach ($Pengurus as $pengurus) : ?>
							<?php if ($user['pengurus'] == $pengurus['nama']) : ?>
								<option value="<?= $pengurus['nama'] ?>"><?= $pengurus['nama'] ?></option>
							<?php else : ?>
								<?php if ($user['pengurus'] == 'Admin') : ?>
									<option value="<?= $pengurus['nama'] ?>"><?= $pengurus['nama'] ?></option>
								<?php else : ?>
									<option value="<?= $pengurus['nama'] ?>" disabled><?= $pengurus['nama'] ?></option>
								<?php endif ?>
							<?php endif ?>
						<?php endforeach ?>
					</select>
					<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
				</div>
				<div class="form-wrapper">
					<input type="password" name="password1" id="password1" value="<?= set_value('password1') ?>" placeholder="Password" class="form-control">
					<i class="zmdi zmdi-lock"></i>
				</div>
				<small class="form-text text-danger"><?= form_error('password1') ?></small>
				<div class="form-wrapper">
					<input type="password" name="password2" id="password2" value="<?= set_value('password2') ?>" placeholder="Konfirmasi Password" class="form-control">
					<i class="zmdi zmdi-lock"></i>
				</div>
				<button type="submit">Daftar
					<i class="zmdi zmdi-arrow-right"></i>
				</button>
			</form>
		</div>
	</div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>