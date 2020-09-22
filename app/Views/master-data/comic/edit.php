<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent">
            <li class="breadcrumb-item"><a href="/"><i class="fas fa-igloo"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-server"></i> Master Data</a></li>
            <li class="breadcrumb-item"><a href="/comic">Comic</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Comic</li>
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
            <form action="/comic/update/<?= $comic['id'] ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $comic['slug'] ?>" readonly>
                <input type="hidden" name="oldCover" value="<?= $comic['cover'] ?>" readonly>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label font-weight-bold">Title <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : '' ?>" name="title" placeholder="Ex: Nisekoi" value="<?= (old('title')) ? old('title') : $comic['title'] ?>">
                        <div class="invalid-feedback"><?= $validation->getError('title') ?></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label font-weight-bold">Author <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control <?= ($validation->hasError('author')) ? 'is-invalid' : '' ?>" name="author" placeholder="Ex: Naoshi Komi" value="<?= (old('author')) ? old('author') : $comic['author'] ?>">
                        <div class="invalid-feedback"><?= $validation->getError('author') ?></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label font-weight-bold">Publisher <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control <?= ($validation->hasError('publisher')) ? 'is-invalid' : '' ?>" name="publisher" placeholder="Ex: Shonen Jump" value="<?= (old('publisher')) ? old('publisher') : $comic['publisher'] ?>">
                        <div class="invalid-feedback"><?= $validation->getError('publisher') ?></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label font-weight-bold">Cover <span class="text-danger">*</span></label>
                    <div class="col-sm-2">
                        <img src="/img/<?= $comic['cover'] ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-6">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('cover')) ? 'is-invalid' : '' ?>" id="cover" name="cover" onchange="previewImg()">
                            <div class="invalid-feedback"><?= $validation->getError('cover') ?></div>
                            <label class="custom-file-label" for="cover"><?= $comic['cover'] ?></label>
                        </div>
                    </div>
                    <!-- <div class="col-sm-8">
                        <input type="text" class="form-control <?= ($validation->hasError('cover')) ? 'is-invalid' : '' ?>" name="cover" placeholder="Ex: nisekoi.jpg" value="<?= (old('cover')) ? old('cover') : $comic['cover'] ?>">
                        <div class="invalid-feedback"><?= $validation->getError('cover') ?></div>
                    </div> -->
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label font-weight-bold">Detail <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                        <textarea class="form-control <?= ($validation->hasError('detail')) ? 'is-invalid' : '' ?>" name="detail" rows="3" placeholder="ex: Blablabla.."><?= (old('detail')) ? old('detail') : $comic['detail'] ?></textarea>
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