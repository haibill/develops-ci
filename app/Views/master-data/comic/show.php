<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/comic">Comic</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Comic</li>
        </ol>
    </nav>
</div>
<div class="container container-box mt-4">
    <div class="row">
        <div class="col">
            <h2><?= $title ?></h2>
            <hr>
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/<?= $comic['cover'] ?>" class="card-img" alt="comic cover">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold text-info"><?= $comic['title'] ?></h5>
                            <p class="card-text"><?= $comic['detail'] ?></p>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="card-text"><small class="text-muted">Author:</small> <?= $comic['author'] ?></p>
                                </div>
                                <div class="col-md-4">
                                    <p class="card-text"><small class="text-muted">Publisher:</small> <?= $comic['publisher'] ?></p>
                                </div>
                            </div>
                            <a href="/comic" class="btn btn-outline-secondary mt-4" data-toggle="tooltip" title="Back to the List Comic" data-placement="bottom">
                                <i class="fas fa-angle-left"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>