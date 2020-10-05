<table class="table table-bordered table-hover rounded dataTables" id="dataCustomer">
    <thead>
        <tr>
            <th style="width: 10%;">Action</th>
            <th>ID</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Address</th>
            <!-- <th>
                <input type="checkbox" id="checklist-all">
            </th> -->
        </tr>
    </thead>
    <tbody>

    </tbody>
    <tfoot>
        <tr>
            <th></th>
            <th>ID</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Address</th>
            <!-- <th></th> -->
        </tr>
    </tfoot>
</table>
<?php
echo $this->include('master-data/customer/ajax/function-update');
echo $this->include('master-data/customer/ajax/function-datatable');
?>