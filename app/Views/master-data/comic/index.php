<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent">
            <li class="breadcrumb-item"><a href="/"><i class="fas fa-igloo"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-server"></i> Master Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Comic</li>
        </ol>
    </nav>
</div>
<div class="container container-box mt-4">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-8">
                    <h3><?= $title ?></h3>
                </div>
                <div class="col-4 text-right">
                    <a href="/comic/create" class="btn btn-outline-primary modalAdd" data-toggle="tooltip" title="Add Comic" data-placement="bottom">
                        <i class="fas fa-plus"></i> <b>New</b>
                    </a>
                </div>
            </div>
            <?php
            if (session()->getFlashdata('message')) {
                echo "  <div class='alert alert-primary' role='alert'>
                            " . session()->getFlashdata('message') . "
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";
            }
            ?>
        </div>
        <div class="col-12">
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered table-hover dataTables">
                    <thead class="thead-dark">
                        <tr>
                            <th style="width: 10%;">Action</th>
                            <th>Title</th>
                            <th>Cover</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list as $item) : ?>
                            <tr>
                                <td>
                                    <a href="/comic/edit/<?= $item['slug'] ?>" class="btn btn-sm btn-outline-warning" data-toggle="tooltip" title="Edit Comic">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    &nbsp;
                                    <form action="/comic/<?= $item['id'] ?>" method="post" class="d-inline">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" title="Delete Comic" onclick="return confirm('Are you sure?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                <td><a href="/comic/<?= $item['slug'] ?>" class="href" data-toggle="tooltip" title="Detail Comic"><?= $item['title'] ?></a></td>
                                <td><img src="/img/<?= $item['cover'] ?>" alt="cover" class="myCover"></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>