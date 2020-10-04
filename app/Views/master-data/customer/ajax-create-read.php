<script type="text/javascript">
    function dataCustomer() {
        $.ajax({
            url: 'customer/getData',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            dataType: 'json',
            success: function(response) {
                $('.btn-back').hide()
                $('.btn-group').show()
                $('h3').html('List of Customer')
                $('.view-data').html(response.data)
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
            }
        })
    }
    $(document).ready(function() {
        dataCustomer()

        $('.modal-add').click(function(e) {
            e.preventDefault()
            save_method = 'store';

            $.ajax({
                url: 'customer/create',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                dataType: 'json',
                success: function(response) {
                    $('.view-modal').html(response.data).show()
                    $('#formModal').modal('show')
                    $('#formModalLabel').html('Form Add Customer')
                    $('.customer-form').attr('action', '/customer/store')
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                }
            })
        })

        $('.multiple-insert-button').click(function(e) {
            e.preventDefault()

            $.ajax({
                url: 'customer/multipleCreate',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                dataType: 'json',
                beforeSend: function() {
                    $('.preloader-single').show().fadeOut(1000)
                },
                success: function(response) {
                    $('.view-data').html(response.data).show()
                    $('h3').html('Add Multiple Data Customer')
                    $('.btn-group').hide()
                    $('.btn-back').show()

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                }
            })
        })
    })
</script>