@extends('layouts.app')
@section('additionalStyles')
  <!-- DataTables -->
  <link rel="stylesheet" href=" {{ asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }} ">
  <link rel="stylesheet" href=" {{ asset('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }} ">
  <link rel="stylesheet" href=" {{ asset('asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }} ">
    @yield('evenMoreStyles')
@endsection

@section('content')
   

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $students }}</h3>

                <p>Total Students</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
      
          <!-- ./col -->
 
          <!-- ./col -->
      
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
    
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('additionalScripts')

<script src=" {{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }} "></script>
<script src=" {{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }} "></script>
<script src=" {{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }} "></script>
<script src=" {{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }} "></script>
<script src=" {{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }} "></script>
<script src=" {{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }} "></script>
<script src=" {{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }} "></script>
<script src=" {{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }} "></script>
<script src=" {{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }} "></script>


  <script>
    $(function () {
      $("#example1").DataTable({
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
    @yield('additionalScripts')
@endsection
