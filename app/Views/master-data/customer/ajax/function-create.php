<script type="text/javascript">
    $(document).ready(function() {
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
                    $('.customer-form').attr('action', 'customer/store')
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                }
            })
        })

        $('.customer-form').submit(function(e) {
            e.preventDefault()
            $.ajax({
                type: 'POST',
                url: 'customer/store',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                data: $(this).serialize(),
                dataType: 'json',
                beforeSend: function() {
                    $('.btn-save').attr('disable', 'disabled')
                    $('.btn-save').html('<i class="fa fa-spin fa-spinner"></i> Save')
                },
                complete: function() {
                    $('.btn-save').removeAttr('disable')
                    $('.btn-save').html('<i class="fas fa-save"></i> Save')
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.customer_code) {
                            $('#customer_code').addClass('is-invalid')
                            $('.error-customer-code').html(response.error.customer_code)
                            $('#notification-failed').show(function() {
                                Lobibox.notify('error', {
                                    size: 'mini',
                                    delay: 12000,
                                    icon: true,
                                    showClass: 'bounceIn',
                                    hideClass: 'bounceOut',
                                    img: 'img/failed.png',
                                    msg: '<b>HEY ! </b> ' + `${response.error.customer_code}`
                                })
                            })
                        } else {
                            $('#customer_code').removeClass('is-invalid')
                            $('.error-customer-code').html('')
                        }

                        if (response.error.name) {
                            $('#name').addClass('is-invalid')
                            $('.error-name').html(response.error.name)
                            $('#notification-failed').show(function() {
                                Lobibox.notify('error', {
                                    size: 'mini',
                                    delay: 12000,
                                    icon: true,
                                    showClass: 'bounceIn',
                                    hideClass: 'bounceOut',
                                    img: 'img/failed.png',
                                    msg: '<b>HEY ! </b> ' + `${response.error.name}`
                                })
                            })
                        } else {
                            $('#name').removeClass('is-invalid')
                            $('.error-name').html('')
                        }

                        if (response.error.phone_number) {
                            $('#phone_number').addClass('is-invalid')
                            $('.error-phone-number').html(response.error.phone_number)
                            $('#notification-failed').show(function() {
                                Lobibox.notify('error', {
                                    size: 'mini',
                                    delay: 12000,
                                    icon: true,
                                    showClass: 'bounceIn',
                                    hideClass: 'bounceOut',
                                    img: 'img/failed.png',
                                    msg: '<b>HEY ! </b> ' + `${response.error.phone_number}`
                                })
                            })
                        } else {
                            $('#phone_number').removeClass('is-invalid')
                            $('.error-phone-number').html('')
                        }

                        if (response.error.address) {
                            $('#address').addClass('is-invalid')
                            $('.error-address').html(response.error.address)
                            $('#notification-failed').show(function() {
                                Lobibox.notify('error', {
                                    size: 'mini',
                                    delay: 12000,
                                    icon: true,
                                    showClass: 'bounceIn',
                                    hideClass: 'bounceOut',
                                    img: 'img/failed.png',
                                    msg: '<b>HEY ! </b> ' + `${response.error.address}`
                                })
                            })
                        } else {
                            $('#address').removeClass('is-invalid')
                            $('.error-address').html('')
                        }
                    } else {
                        $('#formModal').modal('hide')
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