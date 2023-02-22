@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->

		<!-- Main content -->
		<section class="content">
		  <div class="callout callout-success">
			<h4>Félicitations !</h4>
			Vos voeux ont bien été enregistrés. A très bientôt !
			<a href="{{ route('userchoice.edit') }}">Modifiez votre choix</a>
		  </div>
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>
  <!-- /.content-wrapper -->


@endsection