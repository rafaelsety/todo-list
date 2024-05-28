<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/images/logos/favicon.png') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/styles.min.css') ?>" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns"></script>
  
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <h3>LOGO</h3>
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">          
            <li class="sidebar-item">              
            <a class="sidebar-link <?= $url == 'dashboard' ? 'active' : ''?>" href="<?= site_url('dashboard') ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>   
            <li class="sidebar-item">
              <a class="sidebar-link <?= $url == 'activity' ? 'active' : ''?>" href="<?= site_url('activity') ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-list-check fs-6"></i>
                </span>
                <span class="hide-menu">Activity</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link <?= $url == 'resume' ? 'active' : ''?>" href="<?= site_url('resume') ?>" aria-expanded="false">
                <span>
                <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Resume</span>
              </a>
            </li>            
            <li class="sidebar-item">
              <a class="sidebar-link <?= $url == 'profil' ? 'active' : ''?>" href="<?= site_url('profil') ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-user"></i>
                </span>
                <span class="hide-menu">Profil</span>
              </a>
            </li>           
          </ul>
      
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
           
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">            
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="<?= base_url('assets/img/' . $foto) ?>" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="<?= site_url('profil') ?>" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">Profilku</p>
                    </a>             
                    <a href="<?= site_url('logout') ?>" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">        

  <div class="row mb-3">
  <canvas id="activityChart" width="400" height="200"></canvas>

  </div>
        <div class="row">         
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Recent Activity</h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">#</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Deskripsi</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Label</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Status</h6>
                        </th>                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($listActivity as $key => $item) { ?>
                      <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0"><?= $key+1 ?></h6></td>
                        <td class="border-bottom-0">                            
                            <span class="fw-normal"><?= $item->deskripsi?></span>                          
                        </td>
                        <td class="border-bottom-0">                          
                        <span class="badge <?= $item->label == 'hard' ? 'bg-danger' :  ($item->label == 'medium' ? 'bg-warning' : 'bg-success') ?> "><?= $item->label ?></span>
                        </td>
                        <td class="border-bottom-0">
                          <div class="d-flex align-items-center gap-2">
                            <?=$item->status ?>
                          </div>
                        </td>                     
                      </tr> 
                      <?php } ?>                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>       
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank" class="pe-1 text-primary text-decoration-underline">AdminMart.com</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a></p>
        </div>
      </div>
    </div>
  </div>
   <script>
        var ctx = document.getElementById('activityChart').getContext('2d');
        var chartData = <?= json_encode($chart_data) ?>;

        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: chartData.dates,
                datasets: [
                    {
                        label: 'todo',
                        data: chartData.data.todo,
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)'
                    },
                    {
                        label: 'In Progress',
                        data: chartData.data.progress,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        backgroundColor: '#FFAE1F'
                    },
                    {
                        label: 'Done',
                        data: chartData.data.done,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)'
                    }
                ]
            },
            options: {
                scales: {
                    x: {
                        type: 'time',
                        time: {
                            unit: 'day'
                        },
                        title: {
                            display: true,
                            text: 'Date'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        max: 20,
                        ticks: {
                            stepSize: 1,
                            callback: function(value) {
                                return Number.isInteger(value) ? value : null;
                            }
                        },
                        title: {
                            display: true,
                            text: 'Count'
                        }
                    }
                }
              }
        });
    </script>
  <script src="<?= base_url('assets/libs/jquery/dist/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/sidebarmenu.js') ?>"></script>
  <script src="<?= base_url('assets/js/app.min.js') ?>"></script>
  <script src="<?= base_url('assets/libs/apexcharts/dist/apexcharts.min.js') ?>"></script>
  <script src="<?= base_url('assets/libs/simplebar/dist/simplebar.js') ?>"></script>
  <script src="<?= base_url('assets/js/dashboard.js') ?>"></script>
</body>

</html>