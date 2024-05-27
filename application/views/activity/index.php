<div class="row">
    <div class="col-md-4">
        <div class="d-flex justify-content-between">
             <h5 class="card-title fw-semibold mb-4">To Do</h5>
            <div class="">
            <a href="<?= site_url('activity/tambah') ?>" class="btn btn-primary btn-sm"> 
                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                Tambah data</a>
            </div>
        </div>
        <?php foreach($listToDo as $key => $item) {?>
        <div class="card">
            <div class="card-body">                     
                <p class="card-text"><?= $item->deskripsi ?></p>
                <span class="badge <?= $item->label == 'hard' ? 'bg-danger' :  ($item->label == 'medium' ? 'bg-warning' : 'bg-success') ?> "><?= $item->label ?></span>
                <span class="text-center ms-2"><?= date( 'd F Y', strtotime($item->tanggal_dibuat)) ?></span>

                <div class="d-flex justify-content-between mt-2">
                    <div class="">
                        <a href="<?= site_url('activity/edit/'.$item->id) ?>" class="btn btn-sm btn-warning">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-pencil"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>
                        </a>
                        <a href="<?= site_url('activity/hapus/'.$item->id) ?>" class="btn btn-sm btn-danger">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                        </a>
                    </div>
                    <div class="">                        
                        <a href="<?= site_url('activity/next/'. $item->id) ?>" class="btn btn-sm btn-success">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /><path d="M13 18l6 -6" /><path d="M13 6l6 6" /></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>                   
        <?php } ?>
    </div>

    <div class="col-md-4">
        <h5 class="card-title fw-semibold mb-4">In Progress</h5>
        <?php foreach($listInProgress as $key => $item) {?>

            <div class="card">
                <div class="card-body">                     
                    <p class="card-text"><?= $item->deskripsi ?></p>
                    <span class="badge <?= $item->label == 'hard' ? 'bg-danger' :  ($item->label == 'medium' ? 'bg-warning' : 'bg-success') ?> "><?= $item->label ?></span>
                    <span class="text-center ms-2"><?= date( 'd F Y', strtotime($item->tanggal_dibuat)) ?></span>

                    <div class="d-flex justify-content-between mt-2">
                        <div class="">
                            <a href="<?= site_url('activity/edit/'.$item->id) ?>" class="btn btn-sm btn-warning">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-pencil"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>
                            </a>
                            <a href="<?= site_url('activity/hapus/'.$item->id) ?>" class="btn btn-sm btn-danger">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                            </a>
                        </div>
                        <div class="">     
                            <a href="<?= site_url('activity/back/'. $item->id) ?>" class="btn btn-sm btn-muted me-1">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /><path d="M5 12l6 6" /><path d="M5 12l6 -6" /></svg>
                            </button>                   
                            <a href="<?= site_url('activity/next/'. $item->id) ?>" class="btn btn-sm btn-success">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /><path d="M13 18l6 -6" /><path d="M13 6l6 6" /></svg>
                            </a>
                        </div>
                    </div>                        
                </div>                          
            </div> 
        <?php } ?>
    </div>

    <div class="col-md-4">
        <h5 class="card-title fw-semibold mb-4">Done</h5>
        <?php foreach($listDone as $key => $item) {?>

        <div class="card">
            <div class="card-body">                     
            <p class="card-text"><?= $item->deskripsi ?></p>
                <span class="badge <?= $item->label == 'hard' ? 'bg-danger' :  ($item->label == 'medium' ? 'bg-warning' : 'bg-success') ?> "><?= $item->label ?></span>
                <span class="text-center ms-2"><?= date( 'd F Y', strtotime($item->tanggal_dibuat)) ?></span>

                <div class="d-flex justify-content-between mt-2">
                    <div class="">
                         <a href="<?= site_url('activity/edit/'.$item->id) ?>" class="btn btn-sm btn-warning">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-pencil"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>
                        </a>
                        <a href="<?= site_url('activity/hapus/'.$item->id) ?>" class="btn btn-sm btn-danger">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                        </a>
                    </div>
                    <div class="">                        
                        <a href="<?= site_url('activity/back/'. $item->id) ?>" class="btn btn-sm btn-muted">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /><path d="M5 12l6 6" /><path d="M5 12l6 -6" /></svg>
                        </a>
                    </div>
                </div>
            </div>               
        </div>                  
        <?php } ?>
    </div>    
</div>           
