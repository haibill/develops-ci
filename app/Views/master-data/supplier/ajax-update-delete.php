<script type="text/javascript">
    $(document).ready(function() {
        // Setup - add a text input to each footer cell
        $('.dataTables tfoot th').each(function() {
            var title = $(this).text()
            console.log(title)
            if (title !== '') {
                $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '.." />')
            }
        })

        // DataTable
        var table = $('.dataTables').DataTable({
            initComplete: function() {
                // Apply the search
                this.api().columns().every(function() {
                    var that = this;

                    $('input', this.footer()).on('keyup change clear', function() {
                        if (that.search() !== this.value) {
                            that
                                .search(this.value)
                                .draw()
                        }
                    })
                })
            }
        })

        $('.modalEdit').click(function(e) {
            save_method = 'update';
            const id = $(this).data('id')
            $.ajax({
                type: 'POST',
                url: 'supplier/edit',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                data: {
                    supplier_id: id
                },
                dataType: 'json',
                success: function(response) {
                    if (response.okay) {
                        $('.view-modal').html(response.okay).show()
                        $('#formModal').modal('show')
                        $('#formModalLabel').html('Form Edit Supplier')
                        $('#name').val(response.data.name)
                        $('#address').val(response.data.address)
                        $('#supplier_code').val(response.data.supplier_code)
                        $('#supplier_id').val(response.data.supplier_id)
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                }
            })
        })

        $('.modalDelete').click(function(e) {
            save_method = 'delete';
            console.log(save_method)
            const id = $(this).data('id')
            console.log(id)
            $.ajax({
                type: 'POST',
                url: 'supplier/delete',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                data: {
                    supplier_id: id
                },
                dataType: 'json',
                success: function(response) {
                    if (response.okay) {
                        $('.view-modal').html(response.okay).show()
                        $('#modalConfirm').modal('show')
                        $('#formModalLabel').html('Modal Confirmation')
                        $('#supplier_id').val(response.data.supplier_id)
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                }
            })
        })
    })
</script>