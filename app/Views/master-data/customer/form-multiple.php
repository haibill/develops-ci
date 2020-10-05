<div class="table-responsive view-data">
    <form action="" class="customer-multiple-form" method="post">
        <?= csrf_field() ?>
        <table class="table table-bordered table-hover rounded">
            <thead>
                <tr>
                    <th>Customer Code <span style="color: tomato;">*</span></th>
                    <th>Name <span style="color: tomato;">*</span></th>
                    <th>Phone Number <span style="color: tomato;">*</span></th>
                    <th>Address <span style="color: tomato;">*</span></th>
                    <th style="width: 10%;" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody class="form-add">
                <tr>
                    <td>
                        <input type="text" class="form-control" name="customer_code[]" placeholder="ex: CTR" autocomplete="off">
                        <div class="invalid-feedback error-customer-code"></div>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="name[]" placeholder="ex: Sri Widi" autocomplete="off">
                        <div class="invalid-feedback error-name"></div>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="phone_number[]" placeholder="ex: 082216647807" autocomplete="off">
                        <div class="invalid-feedback error-phone-number"></div>
                    </td>
                    <td>
                        <textarea class="form-control" name="address[]" rows="1" placeholder="ex: Perumahan Cikoneng, Bandung"></textarea>
                        <div class="invalid-feedback error-address"></div>
                    </td>
                    <td class="text-center">
                        <button type="button" class="btn btn-lg btn-primary btn-plus" data-toggle="tooltip" data-placement="top" title="Add Row Field">
                            <i class="fas fa-plus"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
            <tr>
                <td colspan="5">
                    <button type="submit" class="btn btn-success btn-block font-weight-bold btn-multiple-insert">
                        <i class="fas fa-save"></i> Save
                    </button>
                </td>
            </tr>
        </table>
    </form>
</div>

<?= $this->include('master-data/customer/ajax/function-multiple-insert') ?>