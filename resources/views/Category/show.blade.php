@extends('layouts.app', [
    'namePage' => 'Gestion category',
  'class' => 'sidebar-mini',
  'activePage' => 'category',
])


@section('content')
  <!-- End Google Tag Manager (noscript) -->
  <div class="wrapper">
        
		<form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
	  @csrf</form>



<div class="main-panel">
 <!-- Navbar -->


  <!-- End Navbar --> <div class="panel-header">
  </div>

  <div class="content">
    <div class="row">
      <div class="col-md-12">
<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Category Details</b></div>
			<div class="col col-md-6">
				<a href="{{ route('category.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>category Name</b></label>
			<div class="col-sm-10">
				{{ $category->category_name }}
			</div>
		</div>
		
		
     
		
	</div>
</div>
	  </div>
	</div>
  </div>

<footer class="footer">
  <div class=" container-fluid ">
    <nav>
      <ul>
        <li>
          <a href="https://www.creative-tim.com" target="_blank">
             Creative Tim
          </a>
        </li>
        <li>
          <a href="http://presentation.creative-tim.com" target="_blank">
             About Us
          </a>
        </li>
        <li>
          <a href="http://blog.creative-tim.com" target="_blank">
             Blog
          </a>
        </li>
        <li>
          <a href="https://www.updivision.com" target="_blank">
             Updivision</a>
        </li>
      </ul>
    </nav>
    <div class="copyright" id="copyright">
      ©2020,  Designed by
      <a href="https://www.invisionapp.com" target="_blank"> Invision</a> . Coded by
      <a href="https://www.creative-tim.com" target="_blank"> Creative Tim </a>&amp;
      <a href="https://www.updivision.com" target="_blank"> Updivision</a>
    </div>
  </div>
</footer></div>                    </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('assets') }}/js/core/jquery.min.js"></script>
  <script src="{{ asset('assets') }}/js/core/popper.min.js"></script>
  <script src="{{ asset('assets') }}/js/core/bootstrap.min.js"></script>
  <script src="{{ asset('assets') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="{{ asset('assets') }}/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets') }}/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets') }}/js/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('assets') }}/demo/demo.js"></script>
  @stack('js')
