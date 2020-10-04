<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <!-- Icon -->
    <link rel="shortcut icon" type="image/png" href="/img.ico" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <!-- Loader CSS -->
    <link rel="stylesheet" href="/css/loader.css">
    <!-- Data-table CSS -->
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="/js/dataTables/dataTables.bootstrap4.css">
    <!-- Notifications CSS -->
    <link rel="stylesheet" href="css/notifications/Lobibox.min.css">
    <link rel="stylesheet" href="css/notifications/notifications.css">
    <!-- Preloader CSS -->
    <link rel="stylesheet" href="css/preloader/preloader-style.css">
    <!-- Favicon  -->
    <link rel="stylesheet" href="/fontawesome-free-5.13.0-web/css/all.min.css">
    <link rel="stylesheet" href="/fontawesome-free-5.13.0-web/css/brands.min.css">
    <link rel="stylesheet" href="/fontawesome-free-5.13.0-web/css/regular.min.css">
    <link rel="stylesheet" href="/fontawesome-free-5.13.0-web/css/solid.min.css">
    <link rel="stylesheet" href="/fontawesome-free-5.13.0-web/css/svg-with-js.min.css">
    <link rel="stylesheet" href="/fontawesome-free-5.13.0-web/css/v4-shims.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/style.css">
    <script src="/js/jquery/jquery-3.5.1.min.js"></script>
</head>

<body>
    <?= $this->include('layout/navbar-menu') ?>
    <br>
    <div id="particles-js"></div>

    <?= $this->renderSection('content') ?>
    <!-- Footer -->
    <!-- <footer class="page-footer font-small blue">

        <!-- Copyright -->
    <!-- <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href=""> Muhammad Balyan</a>
        </div> -->
    <!-- Copyright -->

    <!-- </footer>  -->
    <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <!-- <script src="/js/popper.min.js"></script> -->
    <script src="/js/bootstrap.min.js"></script>
    <!-- Data table js -->
    <script src="/js/dataTables/jquery.dataTables.min.js"></script>
    <script src="/js/dataTables/dataTables.bootstrap4.min.js"></script>
    <!-- Particles js -->
    <script src="/js/particles/particles.min.js"></script>
    <script src="/js/particles/app.js"></script>
    <!-- Notification JS -->
    <script src="js/notifications/Lobibox.js"></script>
    <script src="js/notifications/notification-active.js"></script>
    <!-- Image Preview -->
    <script src="/js/img/preview.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('.dataTables thead tr').clone(true).appendTo('.dataTables thead')
            $('.dataTables thead tr:eq(1) th').each(function(i) {
                var title = $(this).text()
                if (title !== 'Action') {
                    $(this).html('<input type="text" class="form-control" placeholder="Filter by ' + title + '.." />')
                } else {
                    $(this).html('')
                }

                $('input', this).on('keyup change', function() {
                    if (table.column(i).search() !== this.value) {
                        table
                            .column(i)
                            .search(this.value)
                            .draw()
                    }
                });
            });

            var table = $('.dataTables').DataTable({
                orderCellsTop: true,
                fixedHeader: true
            })
            $('.alert').fadeIn().delay(8000).fadeOut()
            $('[data-toggle="tooltip"]').tooltip()
            $('.loading_bg').fadeToggle(1200)

            $('#hover-menu').hover(function() {
                $('#hover-menu').html(`<b>SAMPLE</b>`)
            }, function() {
                $('#hover-menu').html(`<i class="fas fa-bars"></i>`)
            })
        })
    </script>

</body>

</html>