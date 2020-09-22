<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <!-- Icon -->
    <!-- <link rel="icon" href="icon.png"> -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <!-- Loader CSS -->
    <link rel="stylesheet" href="/css/loader.css">
    <!-- Data-table CSS -->
    <link rel="stylesheet" href="/js/dataTables/dataTables.bootstrap4.css">
    <!-- Favicon  -->
    <link rel="stylesheet" href="/fontawesome-free-5.13.0-web/css/all.min.css">
    <link rel="stylesheet" href="/fontawesome-free-5.13.0-web/css/brands.min.css">
    <link rel="stylesheet" href="/fontawesome-free-5.13.0-web/css/regular.min.css">
    <link rel="stylesheet" href="/fontawesome-free-5.13.0-web/css/solid.min.css">
    <link rel="stylesheet" href="/fontawesome-free-5.13.0-web/css/svg-with-js.min.css">
    <link rel="stylesheet" href="/fontawesome-free-5.13.0-web/css/v4-shims.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/style.css">
</head>

<body>
    <?= $this->include('layout/navbar-menu') ?>
    <div id="particles-js"></div>

    <?= $this->renderSection('content') ?>

    <script src="/js/jquery/jquery-3.5.1.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- Data table js -->
    <script src="/js/dataTables/jquery.dataTables.min.js"></script>
    <script src="/js/dataTables/dataTables.bootstrap4.min.js"></script>
    <!-- Particles js -->
    <script src="/js/particles/particles.min.js"></script>
    <script src="/js/particles/app.js"></script>
    <!-- Image Preview -->
    <script src="/js/img/preview.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.dataTables').DataTable()
            $('.alert').fadeIn().delay(8000).fadeOut()
            $('[data-toggle="tooltip"]').tooltip()
            $('.loading_bg').fadeToggle(1200)
        })
    </script>

</body>

</html>