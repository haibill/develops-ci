<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href=""><?= $menu; ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $submenu; ?></li>
        </ol>
    </nav>
</div>
<div class="container container-box mt-4">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-8">
                    <h3><?= $submenu ?></h3>
                </div>
                <div class="col-4 text-right">
                    <a href="/peopleV2/create" class="btn btn-outline-primary modalAdd" data-toggle="tooltip" title="Add People" data-placement="bottom">
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
            <div class="col-4">
                <form action="/peopleV1" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="keyword" placeholder="Search here..">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th style="width: 10%;">Action</th>
                            <th>Name</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        #echo $i = 1 + (6 * ($currentPage - 1)); 
                        foreach ($list as $item) : ?>
                            <tr>
                                <td class="text-center">
                                    <a href="/people/edit/<?= $item['slug'] ?>" class="btn btn-sm btn-outline-warning" data-toggle="tooltip" title="Edit People">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    &nbsp;
                                    <a href="" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" title="Delete People" onclick="return confirm('Are you sure?')">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td><a href="/people/<?= $item['slug'] ?>" class="href" data-toggle="tooltip" title="Detail People"><?= $item['name'] ?></a></td>
                                <td><?= $item['address'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links('people', 'my_pagination') ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>