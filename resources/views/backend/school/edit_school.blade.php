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
					<form method="post" action="{{  route('school.update', $editData->id) }}" novalidate="">
						@csrf
					  <div class="row">
						<div class="col-12">

					
							<div class="col-md-12">
								<div class="form-group">
									<h5>Sigle <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="Sigle" class="form-control" value="{{ $editData->Sigle }}" required=""> <div class="help-block"></div></div>
								</div>

							</div>

							<div class="col-md-12">
								<div class="form-group">
									<h5>Pays <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="Pays" class="form-control" value="{{ $editData->Pays }}" required=""> <div class="help-block"></div></div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group">
									<h5>Universite <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text" name="Universite" class="form-control" value="{{ $editData->Universite }}" required=""> <div class="help-block"></div></div>
								</div>
							</div>

						
							<div class="col-md-12">
								<div class="form-group">
									<h5>IELTS Min </h5>
									<div class="controls">
										<input type="text" name="IELTSMin" class="form-control" value="{{ $editData->IELTSMin }}"> <div class="help-block"></div></div>
									<div class="help-block"></div></div>
								</div>

					<div class="col-md-12">
								<div class="form-group">
									<h5>IELTS Max </h5>
									<div class="controls">
										<input type="text" name="IELTSMax" class="form-control" value="{{ $editData->IELTSMax }}"> <div class="help-block"></div></div>
									<div class="help-block"></div></div>
								</div>

					
							
							<div class="col-md-12">
								<div class="form-group">
									<h5>Reading </h5>
									<div class="controls">
										<input type="text" name="Reading" class="form-control" value="{{ $editData->Reading }}"> <div class="help-block"></div></div>
									<div class="help-block"></div></div>
								</div>
						
							<div class="col-md-12">
								<div class="form-group">
									<h5>Writing</h5>
									<div class="controls">
										<input type="text" name="Writing" class="form-control" value="{{ $editData->Writing }}"> <div class="help-block"></div></div>
									<div class="help-block"></div></div>
								</div>

							
							<div class="col-md-12">
								<div class="form-group">
									<h5>Speaking</h5>
									<div class="controls">
										<input type="text" name="Speaking" class="form-control" value="{{ $editData->Speaking }}"> <div class="help-block"></div></div>
									<div class="help-block"></div></div>
								</div>

						<div class="col-md-12">
								<div class="form-group">
									<h5>Listening </h5>
									<div class="controls">
										<input type="text" name="Listening" class="form-control" value="{{ $editData->Listening }}"> <div class="help-block"></div></div>
									<div class="help-block"></div></div>
								</div>

							
							<div class="col-md-12">
								<div class="form-group">
									<h5>Moyenne </h5>
									<div class="controls">
										<input type="text" name="Moyenne" class="form-control" value="{{ $editData->Moyenne }}"> <div class="help-block"></div></div>
									<div class="help-block"></div></div>
								</div>

							
							<div class="col-md-12">
								<div class="form-group">
									<h5>Places </h5>
									<div class="controls">
										<input type="text" name="Places" class="form-control" value="{{ $editData->Places}}"> <div class="help-block"></div></div>
									<div class="help-block"></div></div>
								</div>

					
							
							<div class="col-md-12">
								<div class="form-group">
										<input type="checkbox" id="Management" name="Management" value="oui" {{ ($editData->Management == "oui" ? "checked" : "") }}><label for="management">Management</label> 
									<div class="help-block"></div>
								</div>
							</div>

									
							
							<div class="col-md-12">
								<div class="form-group">
										<input type="checkbox" id="Stage" name="stage" value="oui" {{ ($editData->Stage == "oui" ? "checked" : "") }}><label for="stage">Stage</label> 
									<div class="help-block"></div>
								</div>
							</div>

		
							
							<div class="col-md-12">
								<div class="form-group">
										<input type="checkbox" id="Espagnol" name="Espagnol" value="oui" {{ ($editData->Espagnol == "oui" ? "checked" : "") }}><label for="espagnol">Espagnol</label> 
										<div class="help-block"></div>
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