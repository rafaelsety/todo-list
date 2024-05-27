<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card ">
            <div class="card-header bg-white py-3">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Form Ubah Password
                </h4>
            </div>
            <hr>
            <div class="card-body">                
                <?= form_open(); ?>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="password_lama">Password Lama</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('password_lama'); ?>" name="password_lama" id="password_lama" type="password" class="form-control" placeholder="Password Lama...">
                        <?= form_error('password_lama', '<small class="text-danger">', '</small>'); ?>
                        <?= $this->session->flashdata('password_lama') ? '<span class="text-danger">' . $this->session->flashdata('password_lama') . '</span>': '' ?>
                    </div>
                </div>
                <hr>
                <div class="row form-group mb-3">
                    <label class="col-md-3 text-md-right" for="password_baru">Password Baru</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('password_baru'); ?>" name="password_baru" id="password_baru" type="password" class="form-control" placeholder="Password Baru...">
                        <?= form_error('password_baru', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group mb-3">
                    <label class="col-md-3 text-md-right" for="konfirmasi_password">Konfirmasi Password</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('konfirmasi_password'); ?>" name="konfirmasi_password" id="konfirmasi_password" type="password" class="form-control" placeholder="Konfirmasi Password...">
                        <?= form_error('konfirmasi_password', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= site_url('profil') ?>" class="btn btn-light">Kembali</a>

                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>