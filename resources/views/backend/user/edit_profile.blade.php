@extends('admin.admin_master')
@section('admin')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

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
			  <h4 class="box-title">Manage Profile</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="post" action="{{  route('profile.store') }}" enctype="multipart/form-data">
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

							<div class="col-md-6">
								<div class="form-group">
									<h5>User Mobile</h5>
									<div class="controls">
										<input type="text" name="mobile" class="form-control" required="" value="{{ $editData->mobile }}" > <div class="help-block"></div></div>
								</div>
							</div>

						</div>  <!-- End row -->

						<div class="row">
							
							<div class="col-md-6">
								<div class="form-group">
									<h5>User Gender</h5>
									<div class="controls">
										<select name="gender" id="select" required="" class="form-control">
											<option value="" selected="" disabled="">Select...</option>
											<option value="Female" {{ ($editData->gender == "Female" ? "selected" : "") }}>Female</option>
											<option value="Male" {{ ($editData->gender == "Male" ? "selected" : "") }}>Male</option>
										</select>
									<div class="help-block"></div></div>
								</div>

							</div>

							<div class="col-md-6">
								<div class="form-group">
									<h5>Profile Image</h5>
									<div class="controls">
										<input type="file" name="image" class="form-control" id="image">
									<div class="help-block"></div></div>
								</div>
								<div class="form-group">
									<div class="controls">
										<img id="showImage" src="{{ (!empty($user->image)) ? url('upload/user_images/'.$user->image) : url('upload/no_image.jpg') }}" style="width: 100px; border: 1px solid #000000">
									</div>
								</div>
							</div>

						</div>  <!-- End row -->

							
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

<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>

@endsection