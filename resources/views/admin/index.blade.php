@extends('admin.admin_master')
@section('admin')

@php
	$schools = DB::table('schools')->take(4)->orderby('NombreEtudiants', 'DESC')->get();
	$userchoices = DB::table('userchoices')->get();
	$logged_user = DB::table('users')->where('id', Auth::user()->id)->first();
@endphp


<div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
			<div class="row">

				@foreach($schools as $key => $school )
				<div class="col-xl-3 col-6">
					<div class="box overflow-hidden pull-up">
						<div class="box-body">							
							<div class="icon rounded w-60 h-60" style="background-color: #272e48;">
								<i class="flag-icon {{ $school->Flag }}"></i>
							</div>
							<div>
								<p class="text-mute mt-20 mb-0 font-size-16">{{ $school->Sigle }}</p>
								<p>{{ $school->Universite }}</p>
								<h3 class="text-white mb-0 font-weight-500">{{ $school->Places }} <small class="text-success"><i class="fa fa-caret-up"></i> {{ $school->NombreEtudiants  }}</small></h3>
							</div>
						</div>
					</div>
				</div>
				@endforeach
		
				@if($logged_user->usertype == "Administrator")
				<div class="col-12">
					<div class="box">
						<div class="box-header">
							<h4 class="box-title align-items-start flex-column">
								New Registrants
								<small class="subtitle">More than 400+ students</small>
							</h4>
						</div>
						<div class="box-body">
							<div class="table-responsive">
								<table class="table no-border">
									<thead>
										<tr class="text-uppercase bg-lightest">
											<th style="min-width: 250px"><span class="text-white">Name</span></th>
											<th style="min-width: 200px" colspan="2"><span class="text-fade">User Choices</span></th>
											<th style="min-width: 150px"><span class="text-fade">Last Modified</span></th>
											<th style="min-width: 130px"><span class="text-fade">Status</span></th>
											<th style="min-width: 120px">Actions</th>
										</tr>
									</thead>
									<tbody>

										@foreach($userchoices as $key => $userchoice )
											@php
												$current_user = DB::table('users')->where('id', $userchoice->user_id)->first();
												$userChoiceController = new App\Http\Controllers\UserChoiceController();
												$schoolObject = $userChoiceController->getSchoolFromColumn('Sigle', $userchoice->school)[0];
											@endphp
										<tr>										
											<td class="pl-0 py-8">
												<div class="d-flex align-items-center">
													<div class="flex-shrink-0 mr-20">
														<div class="bg-img h-50 w-50" style="background-image: url({{ (!empty($user->image)) ? url('upload/user_images/'.$user->image) : url('upload/no_image.jpg') }})"></div>
													</div>

													<div>
														<a href="#" class="text-white font-weight-600 hover-primary mb-1 font-size-16">{{ $current_user->lastname }} {{ $current_user->firstname }}</a>
														<span class="text-fade d-block">{{ $schoolObject->Universite }}</span>
													</div>
												</div>
											</td>
											<td colspan="2">
												<span class="text-fade font-weight-600 d-block font-size-14">
													{{ $schoolObject->Sigle }}
												</span>
												<span class="text-white font-weight-600 d-block font-size-10">
													{{ $userchoice->order }}
												</span>
											</td>
											<td>
												<span class="text-fade font-weight-600 d-block font-size-12">
													{{ $userchoice->updated_at }}
												</span>
											</td>
											<td>
												@if($current_user->status == 1)
												<span class="badge badge-primary-light badge-lg">In Progress</span>
												@elseif($current_user->status == 2)
												<span class="badge badge-success-light badge-lg">Validated</span>
												@elseif($current_user->status == 0)
												<span class="badge badge-warning-light badge-lg">Registered</span>
												@endif

											</td>
											<td class="text-right">
												<a href="{{ route('user.edit', $current_user->id) }}" class="waves-effect waves-light btn btn-info btn-circle mx-5"><i class="fa fa-user"></i></a>
												<a href="{{ route('school.edit', $schoolObject->id) }}" class="waves-effect waves-light btn btn-info btn-circle mx-5"><i class="fa fa-briefcase"></i></a>
											</td>
										</tr>
										@endforeach	
									</tbody>
								</table>
							</div>
						</div>
					</div>  
				</div>
				@endif
			</div>
		</section>
		<!-- /.content -->
	  </div>
  </div>

  @endsection