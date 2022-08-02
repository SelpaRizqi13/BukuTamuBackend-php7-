<html>

<head>
    <meta name="keywords" content="BukuTamu, DISKOMINFO">
    <meta name="author" content="Selpa Rizqi">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BUKU TAMU | Admin</title>
    @include('includes.style')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('includes.navbar')
        @include('includes.sidebar')
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>
                                @yield('title')
                            </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item">@yield('title_crumb2')</li>
                                @yield('tambah_breadcrumb')
                            </ol>
                        </div>
                    </div>
                </div>
                @yield('content')
                <!-- The Modal -->
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h1 class="modal-title">@stack('title_modal')</h1>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <label for="label"> Tanggal Awal </label>
                                    <input type="date" name="tglawal" id="tglawal" class="form-control" />
                                </div>
                                <div class="input-group mb-3">
                                    <label for="label">Tanggal Akhir </label>
                                    <input type="date" name="tglakhir" id="tglakhir" class="form-control" />
                                </div>

                            </div>

                            <!-- Modal footer -->

                            @stack('button')

                        </div>
                    </div>
                </div>
                <!-- The Modal -->
                <div class="modal fade" id="myModalDownload">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h1 class="modal-title">@stack('title_modal')</h1>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <label for="label"> Tanggal Awal </label>
                                    <input type="date" name="awal" id="awal" class="form-control" />
                                </div>
                                <div class="input-group mb-3">
                                    <label for="label">Tanggal Akhir </label>
                                    <input type="date" name="akhir" id="akhir" class="form-control" />
                                </div>

                            </div>

                            <!-- Modal footer -->

                            @stack('button_download')
                        </div>
                    </div>
                </div>


            </section>
        </div>
        @include('includes.script')
        @stack('script')
</body>
@stack('jquery')
</html>
