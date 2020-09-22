<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent">
            <li class="breadcrumb-item active" aria-current="page"><a href="/">Home</a></li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="jumbotron bg-transparent mt-4">
        <h1 class="display-4">Welcome to My Website!</h1>
        <p class="lead">Halo nama saya Muhammad Balyan</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
    </div>
</div>
<?= $this->endSection() ?>