<script type="text/javascript">
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
    })
</script>