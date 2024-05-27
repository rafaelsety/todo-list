<div class="row d-flex justify-content-center">
    <div class="col-md-10">
<div class="card p-2 ">
    <div class="card-header bg-white">
        
        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
            <?= $nama; ?>
        </h4>
        
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2 mb-4 mb-md-0">
                <img src="<?= base_url('assets/img/' . $foto) ?>" alt="" class="img-thumbnail  rounded mb-2">                
            </div>
            <div class="col-md-10">
                <table class="table">
                    <tr>
                        <th width="200">Username</th>
                        <td><?= $username; ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?= $email; ?></td>
                    </tr>
                </table>
                <a href="<?= base_url('profil/ubah-profil'); ?>" class="btn btn-sm btn-block btn-primary"><i class="fa fa-edit"></i> Ubah Profile</a>
                <a href="<?= base_url('profil/ubah-password'); ?>" class="btn btn-sm btn-block btn-primary"><i class="fa fa-lock"></i> Ubah Password</a>                
                <?php if($this->session->flashdata('message')) { ?>
                <span class="badge bg-success p-1 ms-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-check"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
                </span>
                <?php } ?>                
            </div>
        </div>
    </div>
    
</div>
</div>
</div>
</div>