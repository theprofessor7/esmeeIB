
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Esmee - Dashboard</title>
    
    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">
      
    <!-- Style-->  
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <meta name="_token" content="{{ csrf_token() }}">
  <style>
  /*#sortable { list-style-type: none; margin: 0px auto; padding-left: 20%; padding-top: 5%; width: 80%; }*/
   #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }

  #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.1em; height: 32px; background: #ddd7ec}
  #sortable li span { position: absolute; margin-left: -1.3em; margin-top: 0.2em; }
  i.flag-icon { margin-right: 1em;  }
  </style>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
    $(function() {
        $( "#sortable" ).sortable()
        $( "#sortable" ).disableSelection();
    });

  </script>
</head>
<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
    <div class="wrapper">
         @include('admin.body.header')
        <!-- Left side column. contains the logo and sidebar -->
        @include('admin.body.sidebar')

        <div class="content-wrapper">
            <div class="container-full">
                <div class="content-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h3 class="page-title">Choose destination</h3>
                            <div class="d-inline-block align-items-center">
                                <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                        <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                                        <li class="breadcrumb-item active" aria-current="page">Drag and drop the destination in your preferred order. Click the button below to submit.</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="content">
                    <form method="post" action="{{  route('userchoice.update') }}" novalidate="">
                        @csrf
                        <ul id="sortable" style="margin-bottom: 1.5em">
                                @foreach($schools as $key => $school )
                                  <li class="ui-state-default" data-slug="{{ $school->Sigle }}"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><i class="flag-icon {{ $school->Flag }}" title="ve" id="ve"></i>{{ $school->Sigle }} - {{ $school->Universite }}</li>
                                @endforeach
                        </ul>
                        <input type="hidden" id="data" name="data" value="">
                        <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
                    </form>
                </section>
            </div>
        </div>
    </div>

     @include('admin.body.footer')

      <!-- Control Sidebar -->
      <!-- /.control-sidebar -->
      
      <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>

     <script type="text/javascript">
        $(document).ready(function(){
            $( "#sortable" ).on( "sortupdate", function( event, ui ) {
                var list = new Array();
                $('#sortable').find('.ui-state-default').each(function(){
                    var slug=$(this).attr('data-slug');    
                    list.push(slug);
                });
                var data = list.join();
                $("#data").val(data);
            });
        });
     </script>

        <script src="{{ asset('../assets/icons/feather-icons/feather.min.js') }}"></script> 
        <!-- Sunny Admin App -->
        <script src="{{ asset('backend/js/template.js') }}"></script>
        <script src="{{ asset('backend/js/pages/dashboard.js') }}"></script>


</body>
</html>