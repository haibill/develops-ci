<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/comic">Comic</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Comic</li>
        </ol>
    </nav>
</div>
<div class="container container-box mt-4">
    <div class="row">
        <div class="col-12">
            <h3><?= $title ?></h3>
        </div>
        <div class="col-12">
            <hr>
            <form action="/comic/store" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label font-weight-bold">Title <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : '' ?>" name="title" placeholder="Ex: Nisekoi" value="<?= old('title') ?>" autofocus>
                        <div class="invalid-feedback"><?= $validation->getError('title') ?></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label font-weight-bold">Author <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control <?= ($validation->hasError('author')) ? 'is-invalid' : '' ?>" name="author" placeholder="Ex: Naoshi Komi" value="<?= old('author') ?>">
                        <div class="invalid-feedback"><?= $validation->getError('author') ?></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label font-weight-bold">Publisher <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control <?= ($validation->hasError('publisher')) ? 'is-invalid' : '' ?>" name="publisher" placeholder="Ex: Shonen Jump" value="<?= old('publisher') ?>">
                        <div class="invalid-feedback"><?= $validation->getError('publisher') ?></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label font-weight-bold">Cover <span class="text-danger">*</span></label>
                    <div class="col-sm-2">
                        <img src="/img/default.png" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-6">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('cover')) ? 'is-invalid' : '' ?>" id="cover" name="cover" onchange="previewImg()">
                            <div class="invalid-feedback"><?= $validation->getError('cover') ?></div>
                            <label class="custom-file-label" for="cover">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label font-weight-bold">Detail <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <textarea class="form-control <?= ($validation->hasError('detail')) ? 'is-invalid' : '' ?>" name="detail" rows="3" placeholder="ex: Blablabla.." value="<?= old('detail') ?>"></textarea>
                        <div class="invalid-feedback"><?= $validation->getError('detail') ?></div>
                    </div>
                </div>
                <div class="form-group row text-right">
                    <div class="col-sm-10">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-outline-secondary" onclick="window.location.href='/comic'" data-toggle="tooltip" title="Back to the List Comic" data-placement="bottom">
                                <i class="fas fa-angle-left"></i> Back
                            </button>
                            &nbsp;
                            <button type="submit" class="btn btn-outline-success"><i class="fas fa-save"></i> Save</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>