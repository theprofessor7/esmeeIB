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
				  <a class="btn btn-rounded btn-success mb-5" href="{{ route('school.add') }}" style="float: right">Add School</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Sigle</th>
								<th>Pays</th>
								<th>Universite</th>
								<th>IELTSMin</th>
								<th>IELTSMax</th>
								<th>Writing</th>
								<th>Reading</th>
								<th>Speaking</th>
								<th>Moyenne</th>
								<th>Places</th>
								<th>Management</th>
								<th>Stage</th>
								<th>Espagnol</th>
								<th>Nombre Etudiants</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($allData as $key => $school )
							<tr>
								<td>{{ $school->Sigle }}</td>
								<td>{{ $school->Pays }}</td>
								<td>{{ $school->Universite }}</td>
								<td>{{ $school->IELTSMin }}</td>
								<td>{{ $school->IELTSMax }}</td>
								<td>{{ $school->Reading }}</td>
								<td>{{ $school->Writing }}</td>
								<td>{{ $school->Speaking }}</td>
								<td>{{ $school->Moyenne }}</td>
								<td>{{ $school->Places }}</td>
								<td>{{ $school->Management }}</td>
								<td>{{ $school->Stage }}</td>
								<td>{{ $school->Espagnol }}</td>
								<td>{{ $school->NombreEtudiants }}</td>
								<td>
									<a href="{{ route('school.edit', $school->id) }}" class="btn btn-info btn-xs mb-3">Edit</a>
									<a href="{{ route('school.delete', $school->id) }}" class="btn btn-danger btn-xs mb-3" id="delete">Delete</a>
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