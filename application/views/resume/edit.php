<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header bg-primary py-3">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary text-white">
                    Edit Resume
                </h4>
            </div>            
            <div class="card-body">                
                <?= form_open(); ?>
                <div class="row form-group mb-3">
                    <label class="col-md-2 text-md-right" for="deskripsi">Judul</label>
                    <div class="col-md-9">
                        <input type="text" name="judul" value="<?= set_value('judul', $data->judul) ?>" class="form-control">                        
                        <?= form_error('judul', '<small class="text-danger">', '</small>'); ?>                        
                    </div>
                </div>                                  
                <div class="row form-group mb-3">
                    <label for="label" class="col-md-2 text-md-right">Kategori</label>
                    <div class="col-md-4">
                    <select
                        class="form-select "
                        name="kategori[]"
                        id="kategori" 
                        multiple
                        >
                        <option value="">Pilih salah satu</option>
                        <?php foreach($listKategori as $key => $item){ ?>
                        <option value="<?= $item->id ?>" <?= set_select('kategori[]', $item->id, (array_search($item->id, array_column($data->kategori, 'id')) !== false)); ?>><?= $item->nama ?></option>
                        <?php } ?>                        
                    </select>
                    <?= form_error('kategori[]', '<small class="text-danger">', '</small>'); ?>
                    </div>                    
                </div>    
                <div class=" form-group mb-3">
                    <label class="mb-3 text-md-right" for="deskripsi">Deskripsi</label>
                    <div class="col-md-12">
                        <textarea style="height: 100px" id="editor" name="deskripsi" class="form-control" placeholder="Masukkan deskripsi " id=""><?= set_value('deskripsi', $data->deskripsi); ?></textarea>                        
                        <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>                        
                    </div>
                </div>                       
                                               
                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?= site_url('resume') ?>" class="btn btn-light">Kembali</a>

                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
<script>
        $(document).ready(function() {
            $('#kategori').select2();
        });
</script>

<script>
    ClassicEditor
    .create( document.querySelector( '#editor' ), {                          
        ckfinder: {
            // Upload the images to the server using the CKFinder QuickUpload command.
            uploadUrl: 'upload_image'
        }
    } )
    .catch( error => {
            console.error( error );
        } );
</script>
