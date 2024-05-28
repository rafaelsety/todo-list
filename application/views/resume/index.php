<!-- Resume -->
<div class="row">
  
<div class="row mb-3 d-flex align-items-center">
  <div class="col-md-9" style="overflow-x: auto;white-space: nowrap;">
  <a href="<?= site_url('resume?kategori=semua') ?>" class="badge bg-info">Semua kategori</a>
  <?php foreach($listKategori as $key => $item){ ?>
    <a href="<?= site_url('resume?kategori=' . $item->id) ?>" class="badge bg-info"><?= $item->nama ?></a>
    <?php } ?>   
  </div>
  <div class="col-md-3">
    <a href="<?= site_url('kategori') ?>" class="btn btn-primary">List Kategori</a>
  </div>
</div>

  <hr>
  <div class="row d-flex justify-content-between align-items-center mb-2">
    <div class="col-md-9">
    <h4>Resume</h4>

    </div>
  <div class="col-md-3" >
  <a href="<?= site_url('resume/tambah') ?>" class="btn btn-primary">Tambah Resume</a>
  </div>
  </div>
  <?php foreach($dataResume as $key => $item) { ?>
  <div class="card w-200">
    <div class="card-body row d-flex align-items-center">      
        <div class="col-1">
          <span class="badge bg-success rounded"><?= $key+1 ?></span>
        </div>
      <div class="col-9">
        <a href="<?= site_url('resume/lihat/'. $item['slug']) ?>">
          <p class="card-title fw-semibold mb-2"><?= $item['judul']?></p>      
            <?php foreach($item['kategori'] as $index => $value) { ?>
              <span class="badge bg-info me-1"><?= $value['nama'] ?></span>
              <?php } ?>      
        </a>
      </div>      
      <div class="col-2">
      <a href="<?= site_url('resume/edit/'. $item['id']) ?>" class="btn btn-sm btn-warning">
          <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-pencil"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>
      </a>
      <a href="<?= site_url('resume/hapus/'. $item['id']) ?>" class="btn btn-sm btn-danger">
          <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
      </a>
      </div>
    </div>
  </div>
  <?php } ?>

  <?php if(count($dataResume) == 0) { ?>
    <h3>Data tidak ada</h3>
    <?php } ?>

</div>