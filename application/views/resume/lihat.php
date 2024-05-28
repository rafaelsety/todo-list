
<link rel="stylesheet" href="<?= base_url('assets/ckeditor/content-style.css') ?>" />

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header bg-primary py-3">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary text-white">
                    <?= $data->judul ?>
                </h4>
            </div>            
            <div class="card-body">   
                <?php foreach($data->kategori as $item) {?>
                    <span class="badge bg-info"><?= $item['nama'] ?></span>
                <?php } ?> 
                <span class="ms-2"><?= date('d M Y', strtotime($data->tanggal_dibuat)) ?></span>
               <div class="ck-content">
                    <?= $data->deskripsi ?>
                </div>
            </div>
            <div class="card-footer">
            <a href="<?= site_url('resume/edit/'. $data->id) ?>" class="btn btn-warning">Ubah</a>
                        <a href="<?= site_url('resume') ?>" class="btn btn-muted">Kembali</a>
            </div>
        </div>
    </div>
</div>
<script>
    document.querySelectorAll( 'oembed[url]' ).forEach( element => {
        // Create the <a href="..." class="embedly-card"></a> element that Embedly uses
        // to discover the media.
        const anchor = document.createElement( 'a' );

        anchor.setAttribute( 'href', element.getAttribute( 'url' ) );
        anchor.className = 'embedly-card';

        element.appendChild( anchor );
    } );
</script>

