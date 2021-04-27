@extends('admin.layouts.main')
<title>Brain App | Settings</title>
@section('content')

<!-- KONTEN -->
	<div class="mt-0 mt-lg-3">
		<div class="card card-custom">
			<div class="card-header flex-wrap border-0 pt-6 pb-0">
				<div class="card-title">
					<h3 class="card-label">List Module
					<span class="d-block text-muted pt-2 font-size-sm">Datatable initialized from HTML table</span></h3>
				</div>
				<!--begin::Dropdown-->
					<div class="dropdown dropdown-inline mr-2">
						<button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="svg-icon svg-icon-md">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<rect x="0" y="0" width="24" height="24" />
								<circle fill="#000000" cx="9" cy="15" r="6" />
								<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
							</g>
						</svg>
							<!--end::Svg Icon-->
						</span>New Record</button>
						<!--begin::Dropdown Menu-->
						<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
							<!--begin::Navigation-->
							<ul class="navi flex-column navi-hover py-2">
								<li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Choose an option:</li>
								<li class="navi-item">
									<a href="{{url('module/create')}}" class="navi-link">
										<span class="navi-icon">
											<i class="la la-folder-plus"></i>
										</span>
										<span class="navi-text">Add Module</span>
									</a>
								</li>
								<li class="navi-item">
									<a href="{{url('submodule')}}" class="navi-link">
										<span class="navi-icon">
											<i class="la la-copy"></i>
										</span>
										<span class="navi-text">Submodule</span>
									</a>
								</li>
							</ul>
							<!--end::Navigation-->
						</div>
						<!--end::Dropdown Menu-->
					</div>

			</div>
			<div class="card-body">
				<!--begin: Search Form-->
				<!--begin::Search Form-->
				<div class="mb-7">
					<div class="row align-items-center">
						<div class="col-lg-9 col-xl-8">
							<div class="row align-items-center">
								<div class="col-md-6 my-2 my-md-0">
									<div class="input-icon">
										<input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
										<span>
											<i class="flaticon2-search-1 text-muted"></i>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end::Search Form-->
				<!--end: Search Form-->
				<!--begin: Datatable-->

				<table class="table table-responsive" id="kt_datatable">
					<thead>
						<tr>
							<th>Module Name</th>
							<th>Is Parent</th>
							<th>Module Order</th>
							<th>Sub Module / Url</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($modules as $module)
						@if($module->is_parent == 0)
						<tr>
							<td>{{$module->module_name}}</td>
							<td>Yes</td>
							<td>{{$module->module_order}}</td>
							<td >
								@foreach($submodules as $row)
								@if($row->module_id == $module->module_id)
								<p>&#8226; {{ $row->submodule_name}}</p>
								@endif
								@endforeach
								
							</td>
							<td>
							<form action="{{route('module-destroy', $module->module_id)}}" method="POST">
								@csrf
								@method('POST')
								<a href="{{route('module-showing',$module->module_id)}}" class="btn btn-primary btn-sm font-weight-bold mr-2">
										<i class="flaticon-edit"></i></a>
								<button type="submit" class="btn btn-danger btn-sm font-weight-bold mr-2" onclick="return confirm('Are you sure?')"><i class="flaticon2-trash"></i></button>  
							</form>
							</td>
						</tr>
						@elseif($module->is_parent == 1)
						<tr>
							<td>{{$module->module_name}}</td>
							<td>No</td>
							<td>{{$module->module_order}}</td>
							<td><p>{{$module->module_url}}</p></td>
							<td >
							<form action="{{route('module-destroy', $module->module_id)}}" method="POST">
								@csrf
								@method('POST')
								<a href="{{route('module-showing',$module->module_id)}}" class="btn btn-primary btn-sm font-weight-bold mr-2">
										<i class="flaticon-edit"></i></a>
								<button type="submit" class="btn btn-danger btn-sm font-weight-bold mr-2" onclick="return confirm('Are you sure?')"><i class="flaticon2-trash"></i></button>  
							</form>
							</td>
							{{-- @foreach($get_name as $get)
							<td>{{$get->full_name}}</td>
							@endforeach --}}
						</tr>
						@endif
						@endforeach
						
					</tbody>
				</table>
				
			</div>
		</div>
</div>
</div>
</div>
</div>
</div>
@endsection