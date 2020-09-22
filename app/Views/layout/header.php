<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title'] ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('/css/bootstrap.css') ?>">
    <!-- Loader CSS -->
    <link rel="stylesheet" href="<?= base_url('/css/loader.css') ?>">
    <!-- Data-table CSS -->
    <link rel="stylesheet" href="<?= base_url('/js/dataTables/dataTables.bootstrap4.css') ?>">
    <!-- Favicon  -->
    <link rel="stylesheet" href="<?= base_url('/fontawesome-free-5.13.0-web/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/fontawesome-free-5.13.0-web/css/brands.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/fontawesome-free-5.13.0-web/css/regular.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/fontawesome-free-5.13.0-web/css/solid.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/fontawesome-free-5.13.0-web/css/svg-with-js.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/fontawesome-free-5.13.0-web/css/v4-shims.min.css') ?>">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('/style.css') ?>">
</head>

<body>
    <div class="loading_bg">
        <div class="loading">
            <hr />
            <hr />
            <hr />
            <hr />
        </div>
    </div>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('') ?>">CI app4</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown megamenu-li dmenu">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Menu
                        </a>
                        <div class="dropdown-menu megamenu sm-menu border-top" aria-labelledby="dropdown01">
                            <div class="row">
                                <div class="col-sm-6 col-lg-3 border-right mb-4">
                                    <h5><i class="fas fa-server"></i> Master Data</h5>
                                    <a class="dropdown-item" href="<?= base_url('') ?>/students"> Students</a>
                                    <a class="dropdown-item" href="#"> CoA</a>
                                </div>
                                <div class="col-sm-6 col-lg-3 border-right mb-4">
                                    <h5><i class="fas fa-comments-dollar"></i> Transaction</h5>
                                    <a class="dropdown-item" href="#"> Purchase</a>
                                    <a class="dropdown-item" href="#"> Sales</a>
                                    <a class="dropdown-item" href="#"> Production</a>
                                </div>
                                <div class="col-sm-6 col-lg-3 border-right mb-4">
                                    <h5><i class="fas fa-file-invoice-dollar"></i> Report</h5>
                                    <a class="dropdown-item" href="#"> General Journal</a>
                                    <a class="dropdown-item" href="#"> General Ledger</a>
                                    <a class="dropdown-item" href="#"> Trial Balance</a>
                                    <a class="dropdown-item" href="#"> Income Statement</a>
                                    <a class="dropdown-item" href="#"> Capital Statement</a>
                                </div>
                                <div class="col-sm-6 col-lg-3 border-right mb-4">
                                    <h5><i class="fas fa-cogs"></i>&nbsp;&nbsp;Setting</h5>
                                    <a class="dropdown-item" href="<?= base_url('/about') ?>"> About</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="<?= base_url('/img/billy.jpeg') ?>" alt="Profile Picture" width="24" class="rounded-circle">
                            Muhammad Balyan
                        </a>
                        <div class="dropdown-menu" aria-labelledby="">
                            <a class="dropdown-item" href="<?= base_url('/about') ?>"><i class="fas fa-user"></i> Profile</a>
                            <a class="dropdown-item" href=""><i class="fas fa-key"></i> Chance Password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="fas fa-power-off"></i> Logout</a>

                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br>
    <div id="particles-js"></div>