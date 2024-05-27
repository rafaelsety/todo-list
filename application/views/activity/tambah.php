<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card ">
            <div class="card-header bg-primary py-3">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary text-white">
                    Tambah Activity
                </h4>
            </div>            
            <div class="card-body">                
                <?= form_open(); ?>
                <div class="row form-group mb-3">
                    <label class="col-md-2 text-md-right" for="deskripsi">Deskripsi</label>
                    <div class="col-md-9">
                        <textarea name="deskripsi" class="form-control" placeholder="Masukkan deskripsi activity" id=""><?= set_value('deskripsi'); ?></textarea>                        
                        <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>                        
                    </div>
                </div>                       
                <div class="row form-group mb-3 d-flex align-items-center">
                    <label for="label" class="col-md-2 text-md-right">Label</label>
                    <div class="col-md-4">
                    <select
                        class="form-select "
                        name="label"
                        id=""
                    >
                        <option value="">Pilih salah satu</option>
                        <option value="easy" <?= set_select('label', 'easy'); ?>>Easy</option>
                        <option value="medium" <?= set_select('label', 'medium'); ?>>Medium</option>
                        <option value="hard" <?= set_select('label', 'hard'); ?>>Hard</option>
                    </select>
                    <?= form_error('label', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <label class="col-md-2 text-md-right" for="tanggal_dibuat">Atur tanggal</label>
                    <div class="col-md-4">
                        <input type="date" name="tanggal_dibuat" class="form-control" value="<?= set_value('tanggal_dibuat'); ?>" id=""></input>
                        <?= form_error('tanggal_dibuat', '<small class="text-danger">', '</small>'); ?>                        
                    </div>
                </div>                                   
                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= site_url('activity') ?>" class="btn btn-light">Kembali</a>

                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>