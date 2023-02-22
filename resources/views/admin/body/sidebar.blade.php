@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

$user = DB::table('users')->where('id', Auth::user()->id)->first();

@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">	
		
        <div class="user-profile">
			<div class="ulogo">
				 <a href="{{ url('/') }}">
				  <!-- logo for regular state and mobile devices -->
					 <div class="d-flex align-items-center justify-content-center">					 	
						  <img src="{{asset('backend/images/logo_esme.png')}}" alt="">
						  <h3><b>Esmee</b> IB</h3>
					 </div>
				</a>
			</div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li class="{{ ($route == 'dashboard') ? 'active' : '' }}">
          <a href="{{ route('dashboard') }}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>

        <li class="treeview {{ ($prefix == '/userchoice') ? 'active' : '' }}">
          <a href="#">
            <i data-feather="send"></i>
            <span>Choose destination</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('userchoice.add') }}"><i class="ti-more"></i>View destinations</a></li>
          </ul>
        </li>  
		    
        @if ( $user->usertype == "Administrator" )
        <li class="treeview {{ ($prefix == '/users') ? 'active' : '' }}">
          <a href="#">
            <i data-feather="user"></i>
            <span>Manage User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('user.view') }}"><i class="ti-more"></i>View User</a></li>
            <li><a href="{{ route('user.add') }}"><i class="ti-more"></i>Add User</a></li>
          </ul>
        </li>
        @endif 
		  
        <li class="treeview {{ ($prefix == '/profile') ? 'active' : '' }}">
          <a href="#">
            <i data-feather="settings"></i> <span>Manage Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('profile.view') }}"><i class="ti-more"></i>Your Profile</a></li>
            <li><a href="{{ route('profilepassword.view') }}"><i class="ti-more"></i>Change Password</a></li>
          </ul>
        </li>  
		    
        @if ( $user->usertype == "Administrator" )
        <li class="treeview {{ ($prefix == '/schools') ? 'active' : '' }}">
          <a href="#">
            <i data-feather="book-open"></i>
            <span>Manage Schools</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('school.view') }}"><i class="ti-more"></i>View School</a></li>
            <li><a href="{{ route('school.add') }}"><i class="ti-more"></i>Add School</a></li>
          </ul>
        </li>
        @endif 
		       
      </ul>
    </section>
	
	<div class="sidebar-footer">
		<!-- item-->
		<a href="{{ route('profilepassword.view') }}" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
		<!-- item-->
		<a href="mailto: bri@esme.fr" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
		<!-- item-->
		<a href="{{ route('admin.logout') }}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
	</div>
  </aside>