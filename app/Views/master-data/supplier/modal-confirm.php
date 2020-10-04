<!-- Modal -->
<div class="modal fade" id="modalConfirm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel"></h5>
                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" class="confirmation-form" method="post">
                <div class="modal-body">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE" readonly>
                    <input type="hidden" id="supplier_id" name="supplier_id" readonly>
                    <p class="text-break">
                        Hey are you sure you want to delete this data
                        [ <b>ID: </b> <span class="href"><?= formatCode($supplier_code, $supplier_id) ?></span> ] <i class="fas fa-question"></i>
                    </p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="far fa-sad-cry"></i> No</button>
                    <button type="submit" class="btn btn-outline-primary btn-save"><i class="far fa-smile-wink"></i> Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->include('master-data/supplier/ajax') ?>