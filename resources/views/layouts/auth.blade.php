<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BUKU TAMU DASHBOARD | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')
</head>

<body class="hold-transition login-page">
    @yield('content')
    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
</body>

</html>
