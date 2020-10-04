<script type="text/javascript">
    function edit(customer_id) {
        save_method = 'update';
        $.ajax({
            type: 'POST',
            url: 'customer/edit',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            data: {
                customer_id: customer_id
            },
            dataType: 'json',
            success: function(response) {
                if (response.okay) {
                    $('.view-modal').html(response.okay).show()
                    $('#formModal').modal('show')
                    $('#formModalLabel').html('Form Edit Customer')
                    $('#name').val(response.data.name)
                    $('#phone_number').val(response.data.phone_number)
                    $('#address').val(response.data.address)
                    $('#customer_code').val(response.data.customer_code)
                    $('#customer_id').val(response.data.customer_id)
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
            }
        })
    }

    function destroy(customer_id) {
        $.ajax({
            type: 'POST',
            url: 'customer/delete',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            data: {
                customer_id: customer_id
            },
            dataType: 'json',
            success: function(response) {
                if (response.okay) {
                    $('.view-modal').html(response.okay).show()
                    $('#modalConfirm').modal('show')
                    $('#formModalLabel').html('Modal Confirmation')
                    $('#customer_id').val(response.data.customer_id)
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
            }
        })
    }
    $(document).ready(function() {
        $('.dataTables tfoot th').each(function() {
            var title = $(this).text()
            if (title !== '') {
                $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '.." />')
            }
        })

        // DataTable
        var table = $('.dataTables').DataTable({
            'processing': true,
            'serverSide': true,
            'order': [],
            'ajax': {
                'url': 'customer/listData',
                'type': 'POST'
            },
            'columnDefs': [{
                'target': 0,
                'orderable': false
            }],
            initComplete: function() {
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

        // $('#checklist-all').click(function(e) {
        //     if ($(this).is(':checked')) {
        //         $('.checklist').prop('checked', true)
        //     } else {
        //         $('.checklist').prop('checked', false)
        //     }
        // })

        $('[data-toggle="tooltip"]').tooltip()
    })
</script>