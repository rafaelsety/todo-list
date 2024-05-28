<div class="row d-flex justify-content-center">
    <div class="col-md-6">
        <div class="card">
        <div class="card-header bg-primary py-3">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary text-white">
                    Tambah Kategori
                </h4>
            </div>   
            <div class="card-body">
            <?= form_open(); ?>
                <div class="row form-group mb-3">
                    <label class="col-md-2 text-md-right" for="deskripsi">Nama</label>
                    <div class="col-md-9">
                        <input type="text" name="nama" value="<?= set_value('nama') ?>" class="form-control">                        
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>                        
                    </div>
                </div>                                       
                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= site_url('kategori') ?>" class="btn btn-light">Kembali</a>

                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>