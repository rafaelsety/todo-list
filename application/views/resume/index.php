<!-- Resume -->
<div class="col-lg-8 d-flex align-items-stretch">
  <div class="card w-200">
    <div class="card-body p-4">
      <h5 class="card-title fw-semibold mb-4">Resume</h5>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <?php foreach($listKategori as $key => $item) {?>
              <a class="nav-link" href="#"><?= $item->nama ; ?></a>
            <?php } ?>
              <a class="nav-link" href="#">Features</a>
              <a class="nav-link" href="#">Pricing</a>
              <a class="nav-link" href="#">Disabled</a>
            </div>
          </div>
        </div>
      </nav>
      <div class="list-group">
        <button type="button" class="list-group-item list-group-item-action">first judul</button>
        <button type="button" class="list-group-item list-group-item-action">A third button item</button>
        <button type="button" class="list-group-item list-group-item-action">A fourth button item</button>
        <button type="button" class="list-group-item list-group-item-action" disabled>A disabled button
          item</button>
      </div>
    </div>
  </div>
</div>