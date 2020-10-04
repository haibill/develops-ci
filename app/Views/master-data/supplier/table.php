<table class="table table-bordered table-hover rounded dataTables" id="dataSupplier">
    <thead>
        <tr>
            <th style="width: 10%;">Action</th>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($list as $item) : ?>
            <tr>
                <td>
                    <?php
                    echo buttonModalAction($item['supplier_id'], 'Edit', 'Supplier');
                    echo buttonModalAction($item['supplier_id'], 'Delete', 'Supplier');
                    ?>
                </td>
                <td><a href="/supplier/<?= $item['supplier_id'] ?>" class="text-decoration-none font-weight-bold" data-toggle="tooltip" title="Detail Supplier"><?= formatCode($item['supplier_code'], $item['supplier_id']) ?></a></td>
                <td><?= $item['name'] ?></td>
                <td><?= $item['address'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th></th>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
        </tr>
    </tfoot>
</table>
<?= $this->include('master-data/supplier/ajax-update-delete') ?>