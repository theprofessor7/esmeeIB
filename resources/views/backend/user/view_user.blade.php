@extends('admin.admin_master')
@section('admin')

@php
$logged_user = DB::table('users')->where('id', Auth::user()->id)->first();
@endphp

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
				  @if($logged_user->usertype == "Administrator")
				  <a class="btn btn-rounded btn-success mb-5" href="{{ route('user.add') }}" style="float: right">Add User</a>
				  @endif
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								@if($logged_user->usertype == "Administrator")
								<th>Matricule</th>
								@endif
								<th>Nom</th>
								<th>Prénom</th>
								<th>Civilité</th>
								<th>Email</th>
								<th>Nationalité</th>
								<th>Section</th>
								@if($logged_user->usertype == "Administrator")
								<th>Rang</th>
								@endif
								<th>Statut</th>
								@if($logged_user->usertype == "Administrator")
								<th>Action</th>
								@endif
							</tr>
						</thead>
						<tbody>
							@foreach($allData as $key => $user )
							<tr>
								@if($logged_user->usertype == "Administrator")
								<td>{{ $user->register }}</td>
								@endif
								<td>{{ $user->lastname }}</td>
								<td>{{ $user->firstname }}</td>
								<td>{{ $user->civility }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->nationality }}</td>
								<td>{{ $user->section }}</td>
								@if($logged_user->usertype == "Administrator")
								<td>{{ $user->rank }}</td>
								@endif
								<td>
										@if($user->status == 1)
										<span class="badge badge-primary-light badge-lg">Choices Made</span>
										@elseif($user->status == 2)
										<span class="badge badge-success-light badge-lg">Validated</span>
										@elseif($user->status == 0)
										<span class="badge badge-warning-light badge-lg">Registered</span>
										@endif
								</td>
								@if($logged_user->usertype == "Administrator")
								<td>
									<a href="{{ route('user.edit', $user->id) }}" class="btn btn-info btn-xs mb-3">Edit</a>
									<a href="{{ route('user.delete', $user->id) }}" class="btn btn-danger btn-xs mb-3" id="delete">Delete</a>
								</td>
								@endif
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