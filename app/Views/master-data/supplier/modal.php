<!-- Modal -->
<div class="modal fade" id="formModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel"></h5>
                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" class="supplier-form" method="post">
                <div class="modal-body">
                    <?= csrf_field(); ?>
                    <input type="hidden" id="supplier_id" name="supplier_id" class="form-control" readonly>
                    <div class="form-group">
                        <label><b>Supplier Code <span style="color: tomato;">*</span></b></label>
                        <input type="text" class="form-control" id="supplier_code" name="supplier_code" placeholder="ex: SUP">
                        <div class="invalid-feedback error-supplier-code"></div>
                    </div>
                    <div class="form-group">
                        <label><b>Name <span style="color: tomato;">*</span></b></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="ex: Niaga Jaya">
                        <div class="invalid-feedback error-name"></div>
                    </div>
                    <div class="form-group">
                        <label><b>Address <span style="color: tomato;">*</span></b></label>
                        <textarea class="form-control" id="address" name="address" rows="3" placeholder="ex: Tambora"></textarea>
                        <div class="invalid-feedback error-address"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-success btn-save"><i class="fas fa-save"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->include('master-data/supplier/ajax') ?>