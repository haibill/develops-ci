<script type="text/javascript">
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
        $('.confirmation-form').submit(function(e) {
            e.preventDefault()
            $.ajax({
                type: 'POST',
                url: 'customer/destroy',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                data: $(this).serialize(),
                dataType: 'json',
                beforeSend: function() {
                    $('.btn-save').attr('disable', 'disabled')
                    $('.btn-save').html('<i class="fa fa-spin fa-spinner"></i> Yes')
                },
                complete: function() {
                    $('.btn-save').removeAttr('disable')
                    $('.btn-save').html('<i class="far fa-smile-wink"></i> Yes')
                },
                success: function(response) {
                    if (response.success) {
                        $('#modalConfirm').modal('hide')
                        dataCustomer()
                        $('#notification-success').show(function() {
                            Lobibox.notify('success', {
                                size: 'mini',
                                delay: 12000,
                                showClass: 'bounceIn',
                                hideClass: 'bounceOut',
                                img: 'img/success.png',
                                msg: `${response.success}`
                            })
                        })
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                }
            })
        })
    })
</script>