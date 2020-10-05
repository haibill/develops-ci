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
    })
</script>