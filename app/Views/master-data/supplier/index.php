<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent">
            <li class="breadcrumb-item"><a href="/"><i class="fas fa-igloo"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-server"></i> Master Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Supplier</li>
        </ol>
    </nav>
</div>
<div class="container container-box rounded shadow mt-4">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-8">
                    <h3><?= $title; ?></h3>
                </div>
                <div class="col-4 text-right">
                    <button type="button" class="btn btn-outline-primary modalAdd" data-toggle="tooltip" title="Add Supplier" data-placement="bottom">
                        <i class="fas fa-plus"></i> New
                    </button>
                </div>
            </div>
        </div>
        <div class="col-12">
            <hr>
            <div class="table-responsive view-data">
            </div>
        </div>
    </div>
</div>
<div class="view-modal" style="display: none;"></div>
<div id="notification-success" style="display: none;"></div>
<div id="notification-failed" style="display: none;"></div>
<?= $this->include('master-data/supplier/ajax-create-read') ?>
<?= $this->endSection() ?>