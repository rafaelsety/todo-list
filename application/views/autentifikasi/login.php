<div class="card mb-0">
    <div class="card-body">
        <div class="d-flex justify-content-center">
    <a href="" class="text-nowrap logo-img text-center d-block py-3">
        <img src="<?= base_url('assets/img/logo.jpg') ?>" width="100" alt="">
    </a>
    </div>
    <p class="text-center">Login</p>
    <?= $this->session->flashdata('error') ? '<span class="text-danger">' . $this->session->flashdata('error') . '</span>': '' ?>
    
    <?= form_open(''); ?>

        <div class="mb-3">
        <label for="exampleInputusername1" class="form-label">Username</label>
        <input type="text" class="form-control" id="exampleInputusername1" aria-describedby="usernameHelp" name="username" value="<?= set_value('username') ?>">
        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>

        </div>
        <div class="mb-4">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="<?= set_value('password') ?>">
        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>

        </div>
        
        <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
        <div class="d-flex align-items-center justify-content-center">
        <p class="fs-4 mb-0 fw-bold">New to YOA?</p>
        <a class="text-primary fw-bold ms-2" href="<?= site_url('register') ?>">Registrasi</a>
        </div>
    <?= form_close(); ?>    
    </div>
</div>