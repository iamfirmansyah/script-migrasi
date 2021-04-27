<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head>
<base href="">
<meta charset="utf-8"/>
<meta name="description" content="Updates and statistics"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
<link href="{{asset('admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css?v=7.0.5')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('admin/assets/plugins/global/plugins.bundle.css?v=7.0.5')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('admin/assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.5')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('admin/assets/css/style.bundle.css?v=7.0.5')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('admin/assets/css/pages/wizard/wizard-1.css?v=7.0.5')}}" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="{{asset('admin/assets/media/logos/perdoski-favicon.png')}}"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>
</head>
<body id="kt_body" class="header-fixed header-mobile-fixed page-loading">
 @include('admin.layouts.header-mobile')
<div class="d-flex flex-column flex-root">
	<div class="d-flex flex-row flex-column-fluid page">
		<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
			<div id="kt_header" class="header flex-column header-fixed">
				<div class="header-top">
					<div class="container">
						<div class="d-none d-lg-flex align-items-center mr-3">
						<a href="{{url('dashboard')}}" class="mr-20"><img alt="Logo" src="{{asset('admin/assets/media/logos/logo-letter-9.png')}}" class="max-h-35px"/></a>
							@include('admin.layouts.widget.search-bar')
							<div class="topbar">
								 {{-- @include('admin.layouts.widget.search-mobile') --}} 
								 @include('admin.layouts.widget.top-navbar-icon')
							</div>
						</div>
					</div>
					 @include('admin.layouts.bottom-nav')
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<div class="d-flex flex-column-fluid">
							<div class="container">
								<div class="row">
									 @include('admin.layouts.sidebar') 
									<!-- KONTEN -->
									<div class="col-md-9">
										<main class="">
								            @yield('content')
								        </main>
								  	  </div>
									</div>

									 {{-- END KONTEN --}}
								</div>
							</div>
						</div>
						 {{--
					</div>
					 --}} @include('admin.layouts.footer')
				</div>
			</div>
		</div>
		 @include('admin.layouts.widget.profile') @include('admin.layouts.widget.tab-panel')
	</div>
</div>
</div>
 @include('admin.layouts.widget.message-panel') @include('admin.layouts.scrolltop')
<script>var HOST_URL = "https://keenthemes.com/metronic/tools/preview";</script>
<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#0BB783", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#D7F9EF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
<script src="{{asset('admin/assets/plugins/global/plugins.bundle.js?v=7.0.5')}}"></script>
<script src="{{asset('admin/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.5')}}"></script>
<script src="{{asset('admin/assets/js/scripts.bundle.js?v=7.0.5')}}"></script>
<script src="{{asset('admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js?v=7.0.5')}}"></script>
<script src="{{asset('admin/assets/js/pages/widgets.js?v=7.0.5')}}"></script>
<script src="{{asset('admin/assets/js/pages/crud/ktdatatable/base/html-table.js?v=7.0.5')}}"></script>
<script src="{{asset('admin/assets/js/pages/custom/profile/profile.js?v=7.0.5')}}"></script>
<script src="{{asset('admin/assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js?v=7.0.5')}}"></script>
<script src="{{asset('admin/assets/js/pages/custom/wizard/wizard-1.js?v=7.0.5')}}"></script>
<script src="{{asset('admin/assets/js/pages/features/miscellaneous/sweetalert2.js?v=7.0.5')}}"></script>
@include('sweetalert::alert')
@stack('script')

</body>
</html>