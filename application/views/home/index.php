<div class="container">
    <div class="jumbotron mt-4">
        <?= $this->session->flashdata('auth') ?>
        <h1 class="display-4">Hello, <?= $user['nama'] ?></h1>
        <hr class="my-4">
        <p>Selamat datang, silakan menggunakan aplikasi dan jangan lupa logout setelah selesai.</p>
        <br>
    </div>
</div>