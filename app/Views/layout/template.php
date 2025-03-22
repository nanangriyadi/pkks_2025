<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Koleksi Portfolio CI4'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="<?= base_url('admin_portfolio') ?>" class="brand-link">
                <span class="brand-text font-weight-light">Koleksi Portfolio</span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?= base_url('admin') ?>" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>  
                        <li class="nav-header">ABOUT</li> 
                        <li class="nav-item">
                            <a href="<?= base_url('admin_about') ?>" class="nav-link">
                                <i class="nav-icon fas fa-image"></i>
                                <p>About</p>
                            </a>
                        </li>                      
                        <li class="nav-item">
                            <a href="<?= base_url('admin_about/create') ?>" class="nav-link">
                                <i class="nav-icon fas fa-image"></i>
                                <p>Tambah About</p>
                            </a>
                        </li>                      
                        <li class="nav-header">PORTFOLIO</li> 
                        <li class="nav-item">
                            <a href="<?= base_url('admin_portfolio') ?>" class="nav-link">
                                <i class="nav-icon fas fa-upload"></i>
                                <p>Portfolio</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('portfolio/upload') ?>" class="nav-link">
                                <i class="nav-icon fas fa-upload"></i>
                                <p>Tambah Portfolio</p>
                            </a>
                        </li>
                       
                        <li class="nav-header">TEAM</li> 
                        <li class="nav-item">
                            <a href="<?= base_url('/404') ?>" class="nav-link">
                                <i class="nav-icon fas fa-brands fa-teamspeak"></i>
                                <p>Tambah team</p>
                            </a>
                        </li>
                        <li class="nav-header">APLIKASI</li> 
                        <li class="nav-item">
                            <a href="<?= base_url('/') ?>" class="nav-link">
                                <i class="nav-icon fas fa-regular fa-house"></i>
                                <p>Kembali Ke aplikasi PKKS</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                </div>
            </aside>

            
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div></div></div></div>
            <div class="content">
                <div class="container-fluid">
                   
                <?= $this->renderSection('content') ?>

                </div></div>
            </div>

          


        <aside class="control-sidebar control-sidebar-dark">
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        
        <div class="container mt-4">
            <?php if(session()->getFlashdata('message')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('message') ?>
                </div>
            <?php endif; ?>
            
            <?php if(session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                    <?php foreach(session()->getFlashdata('errors') as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            
           
        </div>
        </aside>
    </div>
    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid p-4">
            <a class="navbar-brand" href="<?= base_url('admin_portfolio') ?>">Koleksi Portfolio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('admin_portfolio') ?>">Beranda Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/') ?>">Kembali Ke aplikasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('portfolio/upload') ?>">Upload Portfolio</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> -->



    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>