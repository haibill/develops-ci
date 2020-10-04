<script type="text/javascript">
    function dataSupplier() {
        $.ajax({
            url: 'supplier/getData',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            dataType: 'json',
            success: function(response) {
                $('.view-data').html(response.data)
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
            }
        })
    }
    $(document).ready(function() {
        dataSupplier()

        $('.modalAdd').click(function(e) {
            e.preventDefault()
            save_method = 'store';

            $.ajax({
                url: 'supplier/create',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                dataType: 'json',
                success: function(response) {
                    $('.view-modal').html(response.data).show()
                    $('#formModal').modal('show')
                    $('#formModalLabel').html('Form Add Supplier')
                    $('.supplier-form').attr('action', '/supplier/store')
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                }
            })
        })
    })
</script>