@extends('admin.admin_master')
@section('admin')

  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Form Validation</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Esmee IB</li>
								<li class="breadcrumb-item active" aria-current="page">Add individual user</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>	  

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add User</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{  route('user.store') }}" novalidate="">
						@csrf
					  <div class="row">
						<div class="col-12">

						<div class="row">
							
							<div class="col-md-6">
								<div class="form-group">
									<h5>Firstname <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="firstname" class="form-control" required=""> <div class="help-block"></div></div>
								</div>

							</div>

							<div class="col-md-6">
								<div class="form-group">
									<h5>Lastname <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="lastname" class="form-control" required=""> <div class="help-block"></div></div>
								</div>
							</div>

						</div>  <!-- End row -->


						<div class="row">
							
							<div class="col-md-6">
								<div class="form-group">
									<h5>User email <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="email" name="email" class="form-control" required="" style="background-color: white; color: black"> <div class="help-block"></div></div>
								</div>

							</div>

							<div class="col-md-6">
								<div class="form-group">
									<h5>User password <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="password" name="password" class="form-control" required="" style="background-color: white; color: black"> <div class="help-block"></div></div>
								</div>
							</div>

						</div>  <!-- End row -->

						<div class="row">
							
							<div class="col-md-6">
								<div class="form-group">
									<h5>Civility <span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="civility" id="select" required="" class="form-control">
											<option value="" selected="" disabled="">Select...</option>
											<option value="Mr">Mr</option>
											<option value="Mme">Mme</option>
										</select>
									<div class="help-block"></div></div>
								</div>

							</div>

							<div class="col-md-6">
								<div class="form-group">
									<h5>Section <span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="section" id="select" required="" class="form-control">
											<option value="" selected="" disabled="">Select...</option>
											<option value="1A">1A</option>
											<option value="1B">1B</option>
											<option value="1C">1C</option>
											<option value="1D">1D</option>
											<option value="1E">1E</option>
											<option value="1F">1F</option>
											<option value="1G">1G</option>
											<option value="1H">1H</option>
											<option value="1I">1I</option>
											<option value="1O">1O</option>
											<option value="1S">1S</option>
											<option value="1Y">1Y</option>
										</select>
									<div class="help-block"></div></div>
								</div>
							</div>

						</div>  <!-- End row -->

						<div class="row">

							<div class="col-md-6">
								<div class="form-group">
									<h5>Student Code <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="register" class="form-control" required=""> <div class="help-block"></div></div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<h5>Nationality <span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="nationality" id="select" required="" class="form-control">
											<option value="" selected="" disabled="">Select...</option>
											<option value="FRANCE">FRANCE</option>
											<option value="ALGERIE">ALGERIE</option>
											<option value="COTE D'IVOIRE">COTE D'IVOIRE</option>
											<option value="ITALIE">ITALIE</option>
											<option value="MOLDAVIE">MOLDAVIE</option>
											<option value="PORTUGAL">PORTUGAL</option>
											<option value="ETATS-UNIS">ETATS-UNIS</option>
											<option value="CHINE">CHINE</option>
											<option value="JAPON">JAPON</option>
											<option value="GRANDE BRETAGNE">GRANDE BRETAGNE</option>
											<option value="ESPAGNE">ESPAGNE</option>
											<option value="AUTRE">AUTRE</option>
										</select>
									<div class="help-block"></div></div>
								</div>
							</div>


						</div>
							
						</div>

						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
						</div>
					  </div>
						
					</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
		<!-- /.content -->
	  </div>
  </div>


@endsection