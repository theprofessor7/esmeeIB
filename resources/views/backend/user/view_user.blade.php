@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->

		<!-- Main content -->
		<section class="content">
		  <div class="row">  

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">User List</h3>
				  <a class="btn btn-rounded btn-success mb-5" href="{{ route('user.add') }}" style="float: right">Add User</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Matricule</th>
								<th>Nom</th>
								<th>Prénom</th>
								<th>Civilité</th>
								<th>Email</th>
								<th>Nationalité</th>
								<th>Section</th>
								<th>Statut</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($allData as $key => $user )
							<tr>
								<td>{{ $user->register }}</td>
								<td>{{ $user->lastname }}</td>
								<td>{{ $user->firstname }}</td>
								<td>{{ $user->civility }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->nationality }}</td>
								<td>{{ $user->section }}</td>
								<td>{{ $user->status }}</td>
								<td>
									<a href="{{ route('user.edit', $user->id) }}" class="btn btn-info btn-xs mb-3">Edit</a>
									<a href="{{ route('user.delete', $user->id) }}" class="btn btn-danger btn-xs mb-3" id="delete">Delete</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->          
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>
  <!-- /.content-wrapper -->


@endsection