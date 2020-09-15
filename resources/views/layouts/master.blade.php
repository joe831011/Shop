<!doctype html>
<html>
<head>
<meta charset="UTF-8">
    <title>{{ env('APP_NAME') }}-@yield('title')</title>
    @yield('css')
    <!-- Bootstrap core CSS -->
    <link href="/business_casual/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/business_casual/css/business-casual.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="/sb_admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/sb_admin/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="/sb_admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
@include('layouts.navbar')
@yield('content')

<!-- Bootstrap core JavaScript-->
<script src="/business_casual/vendor/jquery/jquery.min.js"></script>
<script src="/business_casual/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/sb_admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="/sb_admin/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="/sb_admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/sb_admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="/sb_admin/js/demo/datatables-demo.js"></script>
@yield('scripts')
</body>
</html>
