<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent">
            <li class="breadcrumb-item"><a href="/"><i class="fas fa-igloo"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-server"></i> Master Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Customer</li>
        </ol>
    </nav>
</div>
<div class="container container-box rounded shadow mt-4">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-8">
                    <h3></h3>
                </div>
                <div class="col-4 text-right">
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-outline-primary font-weight-bold dropdown-toggle fade-down" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu dropdown-content" aria-labelledby="btnGroupDrop1">
                            <a class="dropdown-item" href="#">Add</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item multiple-insert-button" href="#">Multiple Add</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </div>
                    <button type="button" class="btn btn-outline-secondary font-weight-bold btn-back" data-toggle="tooltip" title="Back to the table">
                        <i class="fas fa-caret-left"></i> Back
                    </button>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="preloader-single shadow-inner mg-t-30" style="display: none;">
                <div class="ts_preloading_box">
                    <div id="ts-preloader-absolute30">
                        <div id="absolute30">
                            <span></span><span></span><span></span><span></span><span></span>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="table-responsive view-data">
            </div>
        </div>
    </div>
</div>
<div class="view-modal" style="display: none;"></div>
<div id="notification-success" style="display: none;"></div>
<div id="notification-failed" style="display: none;"></div>
<?= $this->include('master-data/customer/ajax-create-read') ?>
<?= $this->endSection() ?>