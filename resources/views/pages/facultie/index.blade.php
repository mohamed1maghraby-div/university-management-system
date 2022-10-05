@extends('layouts.admin')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">{{ __('university.faculties') }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">{{ __('university.faculties') }}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  {{-- <section class="content">
    <div class="container-fluid">
      <div class="row">
      <div class="col-md-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="card-title m-0">Featured</h5>
          </div>
          <div class="card-body">
            <h6 class="card-title">Special title treatment</h6>

            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
      </div>
    </div>
  </section> --}}

  <!-- /.row -->
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Title</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            </div>
          </div>
          <div class="card-body">
            <div>
              <button class="btn bg-gradient-info btn-flat" onclick="showform()">{{ __('university.add_fac') }}</button>
            </div>
              <div id="queck-hidden-form">
                <!-- left column -->
                <div class="col-md-6 offset-3">
                  <!-- general form elements -->
                  <div class="card card-primary">
                    
                    <!-- /.card-header -->
                    <!-- form start -->
                    {!! Form::open(['route' => 'facultie.store', 'method' => 'post', 'role' => 'form']) !!}
                      @include('pages.facultie.fields')
                    {!! Form::close() !!}
  
                  </div>
                  <!-- /.card -->
                </div>
            </div>
  
  
  
  
            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
  
                <div class="input-group-append">
                  <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>


          <!-- /.table -->
          @include('pages.facultie.table')
          <!-- /.end Table -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
  <!-- /.row -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
  <div class="p-3">
    <h5>Title</h5>
    <p>Sidebar content</p>
  </div>
</aside>
<!-- /.control-sidebar -->
<script>
  function showform(){
    document.getElementById("queck-hidden-form").classList.add("fly-form");
  }
  function closeForm(){
    document.getElementById("queck-hidden-form").classList.remove("fly-form");
    @if($faculties)
      @foreach ($faculties as $facultie)
        document.getElementById("{{ $facultie->id ? 'edit'.$facultie->id : '' }}").classList.remove("fly-form");
      @endforeach 
    @endif
  }
  
</script>
@endsection