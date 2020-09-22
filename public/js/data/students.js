$(function() {

    $('.modalAdd').on('click', function() {
        $('#formModalLabel').html('Form Add Student')
        $('.modal-body form').attr('action', 'http://localhost/php-mvc/public/students/create')
        $('#nama').val('');
        $('#nim').val('');
        $('#email').val('');
        $('#jurusan').val('');
        $('#id').val('');
    })

    $('.modalEdit').on('click', function() {
        $('#formModalLabel').html('Form Edit Student')
        $('.modal-body form').attr('action', 'http://localhost/php-mvc/public/students/change')

        const id =$(this).data('id')
        $.ajax({
            url: 'http://localhost/php-mvc/public/students/edit',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#nama').val(data.nama)
                $('#nim').val(data.nim)
                $('#email').val(data.email)
                $('#jurusan').val(data.jurusan)
                $('#id').val(data.id)
            }
        })

    })
})