<div class="card mb-0">
    <div class="card-body">
    <a href="" class="text-nowrap logo-img text-center d-block py-3 w-100">
        <img src="<?= base_url('assets/img/logo.jpg') ?>" width="100" alt="">
    </a>
    <p class="text-center">Register</p>
    <?= form_open(''); ?>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email Address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email"  value="<?= set_value('email') ?>">
        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>

        </div>
        <div class="mb-3">
        <label for="exampleInputUsername" class="form-label">Username</label>
        <input type="text" class="form-control" id="exampleInputUsername" name="username" value="<?= set_value('username') ?>">
        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>

        </div>
        <div class="mb-3">
        <label for="exampleInputtext1" class="form-label">Nama</label>
        <input type="text" class="form-control" id="exampleInputtext1" name="nama" value="<?= set_value('nama') ?>">
        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>

        </div>    
        <div class="mb-4">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="<?= set_value('password') ?>">
        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
        </div>
        <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign Up</button>
        <div class="d-flex align-items-center justify-content-center">
        <p class="fs-4 mb-0 fw-bold">Sudah memiliki akun?</p>
        <a class="text-primary fw-bold ms-2" href="<?= site_url('login') ?>">Sign In</a>
        </div>
    <?= form_close(); ?>    
    </div>
</div>