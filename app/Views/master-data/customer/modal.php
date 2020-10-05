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
            <form action="" class="customer-form" method="post">
                <div class="modal-body">
                    <?= csrf_field(); ?>
                    <input type="hidden" id="customer_id" name="customer_id" class="form-control" readonly>
                    <div class="form-group">
                        <label class="font-weight-bold">Customer Code <span style="color: tomato;">*</span></label>
                        <input type="text" class="form-control" id="customer_code" name="customer_code" placeholder="ex: CTR" autocomplete="off">
                        <div class="invalid-feedback error-customer-code"></div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Name <span style="color: tomato;">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="ex: Niaga Jaya" autocomplete="off">
                        <div class="invalid-feedback error-name"></div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Phone Number <span style="color: tomato;">*</span></label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="ex: 087830661966" autocomplete="off">
                        <div class="invalid-feedback error-phone-number"></div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Address <span style="color: tomato;">*</span></label>
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
<?= $this->include('master-data/customer/ajax/function-create') ?>