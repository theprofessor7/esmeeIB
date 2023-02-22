@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <div class="container-full">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
          <div class="container mt-5">
 
   
              @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
              @endif
             
              <div class="card">
             
                <div class="card-header font-weight-bold">
                  <h2 class="float-left">Import Export Excel, CSV File (Users)</h2>
                  <h2 class="float-right"><a href="{{url('users/export/xlsx')}}" class="btn btn-success mr-1">Export Excel</a><a href="{{url('users/export/csv')}}" class="btn btn-success">Export CSV</a></h2>
                </div>
             
                <div class="card-body">
             
                    <form id="users-csv-import-form" method="POST"  action="{{ route('users.import') }}" accept-charset="utf-8" enctype="multipart/form-data">
             
                      @csrf
                               
                        <div class="row">
             
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="file" name="file" placeholder="Choose file">
                                </div>
                                @error('file')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>              
              
                            <div class="col-md-12">
                                <input type="submit" value="Load" class="btn btn-primary" id="submit">
                            </div>
                        </div>     
                    </form>
             
                </div>
             
              </div>

              <div class="card">
             
                <div class="card-header font-weight-bold">
                  <h2 class="float-left">Import Export Excel, CSV File (Schools)</h2>
                  <h2 class="float-right"><a href="{{url('schools/export/xlsx')}}" class="btn btn-success mr-1">Export Excel</a><a href="{{url('schools/export/csv')}}" class="btn btn-success">Export CSV</a></h2>
                </div>
             
                <div class="card-body">
             
                    <form id="schools-csv-import-form" method="POST"  action="{{ route('schools.import') }}" accept-charset="utf-8" enctype="multipart/form-data">
             
                      @csrf
                               
                        <div class="row">
             
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="file" name="file" placeholder="Choose file">
                                </div>
                                @error('file')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>              
              
                            <div class="col-md-12">
                                <input type="submit" value="Load" class="btn btn-primary" id="submit">
                            </div>
                            </div>
                        </div>     
                    </form>
             
                </div>
             
              </div>
             
            </div>
                    </section>
        <!-- /.content -->
      
      </div>
  </div>
  <!-- /.content-wrapper -->


@endsection