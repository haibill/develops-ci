<script type="text/javascript">
    $(document).ready(function() {
        $('.btn-plus').click(function(e) {
            e.preventDefault()

            $('.form-add').append(`
            <tr>
                <td>
                    <input type="text" class="form-control" name="customer_code[]" placeholder="ex: CTR">
                </td>
                <td>
                    <input type="text" class="form-control" name="name[]" placeholder="ex: Sri Widi">
                </td>
                <td>
                    <input type="text" class="form-control" name="phone_number[]" placeholder="ex: 082216647807">
                </td>
                <td>
                    <textarea class="form-control" name="address[]" rows="1" placeholder="ex: Perumahan Cikoneng, Bandung"></textarea>
                </td>
                <td class="text-center">
                    <button type="submit" class="btn btn-lg btn-danger btn-minus" data-toggle="tooltip" data-placement="top" title="Delete Row Field">
                        <i class="fas fa-minus"></i>
                    </button>
                </td>
            </tr>
            `)
        })

        $('.btn-back').click(function(e) {
            e.preventDefault()
            dataCustomer()
        })

        $('.customer-multiple-form').submit(function(e) {
            e.preventDefault()
            $.ajax({
                type: 'POST',
                url: '/customer/multipleStore',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                data: $(this).serialize(),
                dataType: 'json',
                beforeSend: function() {
                    $('.btn-multiple-insert').attr('disable', 'disabled')
                    $('.btn-multiple-insert').html('<i class="fa fa-spin fa-spinner"></i> Save')
                },
                complete: function() {
                    $('.btn-multiple-insert').removeAttr('disable')
                    $('.btn-multiple-insert').html('<i class="fas fa-save"></i> Save')
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.customer_code) {
                            $('#customer_code').addClass('is-invalid')
                            $('.error-customer-code').html(response.error.customer_code)
                        } else {
                            $('#customer_code').removeClass('is-invalid')
                            $('.error-customer-code').html('')
                        }

                        if (response.error.name) {
                            $('#name').addClass('is-invalid')
                            $('.error-name').html(response.error.name)
                        } else {
                            $('#name').removeClass('is-invalid')
                            $('.error-name').html('')
                        }

                        if (response.error.phone_number) {
                            $('#phone_number').addClass('is-invalid')
                            $('.error-phone-number').html(response.error.phone_number)
                        } else {
                            $('#phone_number').removeClass('is-invalid')
                            $('.error-phone-number').html('')
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
                        $('#notification-success').show(function() {
                            Lobibox.notify('success', {
                                size: 'mini',
                                delay: 2000,
                                showClass: 'bounceIn',
                                hideClass: 'bounceOut',
                                img: 'img/success.png',
                                msg: `${response.success}`
                            })
                        })
                        setTimeout(
                            function() {
                                window.location.href = 'customer'
                            }, 3000);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                }
            })
        })

        $('[data-toggle="tooltip"]').tooltip()
    })
    $(document).on('click', '.btn-minus', function(e) {
        e.preventDefault()

        $(this).parents('tr').remove()
    })
</script>