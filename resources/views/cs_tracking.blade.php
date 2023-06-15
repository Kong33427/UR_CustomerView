<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cutomer Service</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../../index3.html" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" href="/logout" role="button">
                        Logout <i class="fas fa-key"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../forms_cs/cs_tracking.html" class="brand-link">
                <img src="../../dist/img/AdminLTELogo1.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">IT Cutomer Service</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">
                            @php
                                echo Auth::user()->username;
                            @endphp</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    User
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="main_user" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../forms_cs/cs_tracking.html" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tracking</p>
                                    </a>

                                </li>
                            </ul>
                        </li>
                        <a href="/cs_upload" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>upload</p>
                        </a>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
                        <div class="row mb-2">
                <div class="col-sm-5">
                    <h1>Tracking</h1>
                </div>
                <div class="col-sm-7">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">ChartJS</li>
                    </ol>
                </div>
            </div>
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>@php echo array_sum($statusCounts); @endphp</h3>
                                    <p>Complete</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>@php echo $statusCounts['IN PROGRESS'] + $statusCounts['DELAY']; @endphp</h3>
                                    <p>In Progress</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>@php echo $statusCounts['TO DO']; @endphp</h3>
                                    <p>Open</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>@php echo $statusCounts['COMPLETE']+$statusCounts['CANCEL']; @endphp</h3>
                                    <p>Closed</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Tracking</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Tracking</li>
                            </ol>
                        </div>
                    </div>
                    <label>Requester</label>
                        <div>
                            @php
                                $optionrequester = session('optionrequester');
                            @endphp
                            <form id="myForm" action="/cs_tracking_option" method="POST">
                                @csrf
                                <div>
                                    <div class="row" style="justify-content: left;">
                                        <div class="col-3">
                                    <select id="option" class="custom-select" name="optionrequester">
                                        <option value=''>all user</option>
                                        @foreach ($Createrequester as $Createrequester)
                                            <option value="{{ $Createrequester->requester }}"
                                                {{ $Createrequester->requester == $optionrequester ? 'selected' : '' }}>
                                                {{ $Createrequester->requester }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                    @php
                                        $optiontype = session('optiontype');
                                        if ($optiontype === null) {
                                            $optiontype = [0];
                                        }
                                    @endphp
                                    <div class="col-2">
                                        <label class="form-check">Project
                                            <input type="checkbox" name="optiontype[]"
                                                value="1. Main Project"{{ implode($optiontype) == '1. Main Project' || implode($optiontype) == '1. Main Project3. UR' ? 'checked' : '' }}>
                                            <span class="form-check-input"></span>
                                        </label>
                                    </div>

                                    <div class="col-2">
                                        <label class="checkbox-container">UR
                                            <input type="checkbox" name="optiontype[]"
                                                value='3. UR'{{ implode($optiontype) == '3. UR' || implode($optiontype) == '1. Main Project3. UR' ? 'checked' : '' }}>
                                            <span class="form-check-input"></span>
                                        </label>
                                    </div>
                                    <div class="col-1">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>

                
                    </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">

                            <!-- /.card -->

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">DataTable with default features</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Reference No.</th>
                                                <th>Name</th>
                                                <th>Completed</th>
                                                <th>Status</th>
                                                <th>Due Date</th>
                                                <th>Team</th>
                                                <th>BU</th>
                                                <th>Type</th>
                                                <th>project owner</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ $item->task_id }}</td>
                                                    <td>{{ $item->task_name }}</td>
                                                    <td>{{ $item->completion }}</td>
                                                    <td>
                                                        <div <?php
                                                        if ($item->status == 'COMPLETE') {
                                                            echo 'class="badge badge-success"';
                                                        } elseif ($item->status == 'TO DO') {
                                                            echo 'class="badge badge-secondary"';
                                                        } elseif ($item->status == 'DELAY') {
                                                            echo 'class="badge badge-warning"';
                                                        } elseif ($item->status == 'IN PROGRESS') {
                                                            echo 'class="badge badge-info"';
                                                        } elseif ($item->status == 'HOLD') {
                                                            echo 'class="badge badge-danger"';
                                                        }
                                                        ?>>
                                                            {{ $item->status }}</div>
                                                    </td>
                                                    <td>{{ $item->end_date }}</td>
                                                    <td>{{ $item->team }}</td>
                                                    <td>{{ $item->bu }}</td>
                                                    <td>{{ $item->type }}</td>
                                                    <td>{{ $item->pic_cit }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th>Reference No.</th>
                                                <th>Name</th>
                                                <th>Completed</th>
                                                <th>Status</th>
                                                <th>Due Date</th>
                                                <th>Team</th>
                                                <th>BU</th>
                                                <th>Type</th>
                                                <th>project owner</th>
                                            </tr>
                                        </tfoot>
                                    </table>


                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 0.0.1
            </div>
            <strong>Nanyang Textile</strong>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../plugins/jszip/jszip.min.js"></script>
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>
