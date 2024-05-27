<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card ">
            <div class="card-header bg-white py-3">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                   Ubah Profil
                </h4>
            </div>
            <hr>
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                <?= form_open_multipart('', []); ?>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="foto">Foto</label>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-3">
                                <img src="<?= base_url('assets/img/'. $foto) ?>" alt="<?= $nama; ?>" class="shadow-sm img-thumbnail">
                            </div>
                            <div class="col-9">
                                <input type="file" name="foto" id="foto">
                                <?= form_error('foto', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="username">Username</label>
                    <div class="col-md-9">
                        <div class="input-group">                            
                            <span class="input-group-text" id="basic-addon1"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg></span>                            
                            <input value="<?= set_value('username', $username); ?>" name="username" id="username" type="text" class="form-control" placeholder="Username...">
                        </div>
                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <hr>
                <div class="row form-group mb-3">
                    <label class="col-md-3 text-md-right" for="nama">Nama Anda</label>
                    <div class="col-md-9">
                        <div class="input-group">                            
                            <span class="input-group-text" id="basic-addon1"> <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg></span>                            
                            <input value="<?= set_value('nama', $nama); ?>" name="nama" id="nama" type="text" class="form-control" placeholder="Nama Anda...">
                        </div>
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="email">Email</label>
                    <div class="col-md-9">
                        <div class="input-group">                            
                                <span class="input-group-text" id="basic-addon1"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-mail"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" /><path d="M3 7l9 6l9 -6" /></svg></span>                            
                            <input value="<?= set_value('email', $email); ?>" name="email" id="email" type="text" class="form-control" placeholder="Email...">
                        </div>
                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>             
                <hr>
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