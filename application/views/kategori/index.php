<div class="row d-flex justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
            <div class="card-title">List Kategori</div>

            </div>
            <div class="card-body">
            <div class="col-md-12 d-flex justify-content-between">
                <a href="<?= site_url('resume') ?>" class="btn btn-sm btn-light">Kembali</a>
                <a href="<?= site_url('kategori/tambah') ?>" class="btn btn-sm btn-primary">Tambah Kategori</a>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>

                    <?php                    
                    foreach ($list as $a => $item) { ?>
                        <tr>
                            <th scope="row"><?= $a+1 ?></th>
                            <td><?= $item->nama ?></td>
                            <td>
                            <a href="<?= site_url('kategori/edit/'. $item->id) ?>" class="btn btn-sm btn-warning">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-pencil"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>
                            </a>
                            <a href="<?= site_url('kategori/hapus/'. $item->id) ?>"  onclick="return confirm('Apakah anda yakin akan menghapus kategori ini ? Data kategori mempengaruhi resume');" class="btn btn-sm btn-danger">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                            </a>                                
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>