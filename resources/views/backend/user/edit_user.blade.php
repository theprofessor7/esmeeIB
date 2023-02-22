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
			  <h4 class="box-title">Update User</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{  route('user.update', $editData->id) }}" novalidate="">
						@csrf
					  <div class="row">
						<div class="col-12">

						<div class="row">
							
							<div class="col-md-6">
								<div class="form-group">
									<h5>Firstname <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="firstname" class="form-control" value="{{ $editData->firstname }}" required=""> <div class="help-block"></div></div>
								</div>

							</div>

							<div class="col-md-6">
								<div class="form-group">
									<h5>Lastname <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="lastname" class="form-control" value="{{ $editData->lastname }}" required=""> <div class="help-block"></div></div>
								</div>
							</div>

						</div>  <!-- End row -->


						<div class="row">
							
							<div class="col-md-6">
								<div class="form-group">
									<h5>User email <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="email" name="email" class="form-control" required="" value="{{ $editData->email }}" style="background-color: white; color: black"> <div class="help-block"></div></div>
								</div>

							</div>

							<!--<div class="col-md-6">
								<div class="form-group">
									<h5>User password <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="password" name="password" class="form-control" required="" style="background-color: white; color: black"> <div class="help-block"></div></div>
								</div>
							</div>-->

						</div>  <!-- End row -->

						<div class="row">
							
							<div class="col-md-6">
								<div class="form-group">
									<h5>Civility <span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="civility" id="select" required="" class="form-control">
											<option value="" selected="" disabled="">Select...</option>
											<option value="Mr" {{ ($editData->civility == "Mr" ? "selected" : "") }}>Mr</option>
											<option value="Mme" {{ ($editData->civility == "Mme" ? "selected" : "") }}>Mme</option>
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
											<option value="1A" {{ ($editData->section == "1A" ? "selected" : "") }}>1A</option>
											<option value="1B" {{ ($editData->section == "1B" ? "selected" : "") }}>1B</option>
											<option value="1C" {{ ($editData->section == "1C" ? "selected" : "") }}>1C</option>
											<option value="1D" {{ ($editData->section == "1D" ? "selected" : "") }}>1D</option>
											<option value="1E" {{ ($editData->section == "1E" ? "selected" : "") }}>1E</option>
											<option value="1F" {{ ($editData->section == "1F" ? "selected" : "") }}>1F</option>
											<option value="1G" {{ ($editData->section == "1G" ? "selected" : "") }}>1G</option>
											<option value="1H" {{ ($editData->section == "1H" ? "selected" : "") }}>1H</option>
											<option value="1I" {{ ($editData->section == "1I" ? "selected" : "") }}>1I</option>
											<option value="1O" {{ ($editData->section == "1O" ? "selected" : "") }}>1O</option>
											<option value="1S" {{ ($editData->section == "1S" ? "selected" : "") }}>1S</option>
											<option value="1Y" {{ ($editData->section == "1Y" ? "selected" : "") }}>1Y</option>
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
										<input type="text" name="register" class="form-control" value="{{ $editData->register }}" required=""> <div class="help-block"></div></div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<h5>Nationality <span class="text-danger">*</span></h5>
									<div class="controls">
										<select name="nationality" id="select" required="" class="form-control">
											<option value="" selected="" disabled="">Select...</option>
											<option value="FRANCE" {{ ($editData->nationality == "FRANCE" ? "selected" : "") }}>FRANCE</option>
											<option value="ALGERIE" {{ ($editData->nationality == "ALGERIE" ? "selected" : "") }}>ALGERIE</option>
											<option value="COTE D'IVOIRE" {{ ($editData->nationality == "COTE D'IVOIRE" ? "selected" : "") }}>COTE D'IVOIRE</option>
											<option value="ITALIE" {{ ($editData->nationality == "ITALIE" ? "selected" : "") }}>ITALIE</option>
											<option value="MOLDAVIE" {{ ($editData->nationality == "MOLDAVIE" ? "selected" : "") }}>MOLDAVIE</option>
											<option value="PORTUGAL" {{ ($editData->nationality == "PORTUGAL" ? "selected" : "") }}>PORTUGAL</option>
											<option value="ETATS-UNIS" {{ ($editData->nationality == "ETATS-UNIS" ? "selected" : "") }}>ETATS-UNIS</option>
											<option value="CHINE" {{ ($editData->nationality == "CHINE" ? "selected" : "") }}>CHINE</option>
											<option value="JAPON" {{ ($editData->nationality == "JAPON" ? "selected" : "") }}>JAPON</option>
											<option value="GRANDE BRETAGNE" {{ ($editData->nationality == "GRANDE BRETAGNE" ? "selected" : "") }}>GRANDE BRETAGNE</option>
											<option value="ESPAGNE" {{ ($editData->nationality == "ESPAGNE" ? "selected" : "") }}>ESPAGNE</option>
											<option value="AUTRE" {{ ($editData->nationality == "AUTRE" ? "selected" : "") }}>AUTRE</option>
										</select>
									<div class="help-block"></div></div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<h5>Rank <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="rank" class="form-control" value="{{ $editData->rank }}" required=""> <div class="help-block"></div></div>
								</div>
							</div>



						</div>
							
						</div>

						<div class="text-xs-right">
							<input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
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