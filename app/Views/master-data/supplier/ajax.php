<script>
    $(document).ready(function() {
        $('.supplier-form').submit(function(e) {
            e.preventDefault()
            if (save_method === 'store') {
                url = '/supplier/store'
                message = '<strong>OK !</strong>&nbsp;&nbsp;Data added successfully.'
            } else if (save_method === 'update') {
                url = '/supplier/update/'
                message = '<strong>OK !</strong>&nbsp;&nbsp;Data updated successfully.'
            }

            $.ajax({
                type: 'POST',
                url: url,
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
                        if (response.error.supplier_code) {
                            $('#supplier_code').addClass('is-invalid')
                            $('.error-supplier-code').html(response.error.supplier_code)
                        } else {
                            $('#supplier_code').removeClass('is-invalid')
                            $('.error-supplier-code').html('')
                        }

                        if (response.error.name) {
                            $('#name').addClass('is-invalid')
                            $('.error-name').html(response.error.name)
                        } else {
                            $('#name').removeClass('is-invalid')
                            $('.error-name').html('')
                        }

                        if (response.error.address) {
                            $('#address').addClass('is-invalid')
                            $('.error-address').html(response.error.address)
                        } else {
                            $('#address').removeClass('is-invalid')
                            $('.error-address').html('')
                        }

                        $('#notification-failed').show(function() {
                            Lobibox.notify('error', {
                                size: 'mini',
                                delay: 12000,
                                icon: true,
                                showClass: 'bounceIn',
                                hideClass: 'bounceOut',
                                img: 'img/failed.png',
                                msg: '<strong>SORRY !</strong>&nbsp;&nbsp;Please fill in the form.'
                            })
                        })
                    } else {
                        $('#formModal').modal('hide')
                        dataSupplier()
                        $('#notification-success').show(function() {
                            Lobibox.notify('success', {
                                size: 'mini',
                                delay: 12000,
                                showClass: 'bounceIn',
                                hideClass: 'bounceOut',
                                img: 'img/success.png',
                                msg: message
                            })
                        })
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                }
            })
        })

        $('.confirmation-form').submit(function(e) {
            e.preventDefault()

            $.ajax({
                type: 'POST',
                url: '/supplier/destroy',
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
                        dataSupplier()
                        $('#notification-success').show(function() {
                            Lobibox.notify('success', {
                                size: 'mini',
                                delay: 12000,
                                showClass: 'bounceIn',
                                hideClass: 'bounceOut',
                                img: 'img/success.png',
                                msg: '<strong>OK !</strong>&nbsp;&nbsp;Data removed successfully.'
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