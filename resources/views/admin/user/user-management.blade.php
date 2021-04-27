@extends('admin.layouts.main') 
<title>Brain App | Users</title>
@section('content')
<div class="mt-0 mt-lg-3">
	<div class="card card-custom gutter-b">
		<div class="card-header flex-wrap py-3">
			<div class="card-title">
				<h3 class="card-label">All Users <span class="d-block text-muted pt-2 font-size-sm">sorting &amp; pagination remote datasource</span></h3>
			</div>
			<div class="card-toolbar">
				<!--begin::Button-->
				<a href="{{url('user-management/create')}}" class="btn btn-primary font-weight-bolder">
				<span class="svg-icon svg-icon-md">
				<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewbox="0 0 24 24" version="1.1">
				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
				<rect x="0" y="0" width="24" height="24"/>
				<circle fill="#000000" cx="9" cy="15" r="6"/>
				<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3"/>
				</g>
				</svg>
				<!--end::Svg Icon--></span>New Record</a>
				<!--end::Button--></div>
		</div>
		<div class=" card card-body">
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
			<!--begin: Datatable-->
			<table class="table  table-checkable" id="kt_datatable">
			<thead>
			<tr>
				<th>Name </th>
				<th cols>Email</th>
				<th>Access</th>
				<th>Active</th>
				<th>Action</th>

			</tr>
			</thead>
			<tbody>
			@php
			($i = 1)
			@endphp
			@foreach($getProfile as $user)
			@if($user->is_deleted == false)
			<tr>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				@foreach($get_group as $get)
				@if ($get->access_group_id == $user->access_group_id )
					<td>{{$get->access_group_name}}</td>
				@endif
				@endforeach
				@if ($user->access_group_id == "")
					<td>User tidak memiliki akses</td>
				@endif
				<td>
				<form action="{{route('user-status', $user->id)}}" method="POST" name="status_form{{ $user->id }}">
				@csrf
				@method('POST')
	    			@if($user->is_active == 0)
	    			<button type="button" class="btn   btn-info btn-sm font-weight-bold mr-2 is_active" data-form="{{ $user->id }}" >
	    				<i class="fas fa-toggle-off"></i> Active </button>
	    			<input type="text" value="1" hidden="" name="is_active">
	    			@else
	    			<button type="button" class="btn   btn-danger btn-sm font-weight-bold mr-2 is_active" data-form="{{ $user->id }}">
	    					<i class="fas fa-toggle-on"></i> Deactive </button>
	    			<input type="text" value="0" hidden="" name="is_active">
	    			@endif
	    		</form>
				</td>
				<td class="text-center">
				
	    		{{-- {{ url('module-group/edit/' . $mg->access_group_id) }} --}}
	    		{{-- {{route('modulegroups-destroy', $mg->access_group_id)}} --}}
	    		<form action="{{route('user-deleted', $user->id)}}" method="POST" name="delete_form{{ $user->id }}">
				@csrf
				@method('POST')
				<a href="{{route('edit-user',$user->id)}}" class="btn btn-primary btn-sm font-weight-bold mr-2">
	    		<i class="far fa-edit"></i></a>
	    		<button type="button" class="btn  btn-sm btn-danger  font-weight-bold mr-2 is_deleted" data-form="{{ $user->id }}">
	    		<i class="fas fa-trash"></i> </button>
	    		<input type="text" value="1" hidden="" name="is_deleted">
	    		</form>
				
				</td>
			</tr>

			@endif
			@endforeach
			</tbody>
			</table>
		</div>
	</div>
</div>

@endsection
@push('script')
<script>
	$(document).on('click', '.is_active', function() {
		var id = $(this).attr('data-form');
		Swal.fire({
			title: "Are you sure?",
			text: "You won't be able to revert this!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonText: "Yes, change it!"
		}).then(function(result) {
			if (result.value) {
				$('form[name=status_form'+ id +']').submit();
			}
		});
	});
	$(document).on('click', '.is_deleted', function() {
		var id = $(this).attr('data-form');
		Swal.fire({
			title: "Are you sure?",
			text: "You won't be able to revert this!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonText: "Yes, delete it!"
		}).then(function(result) {
			if (result.value) {
				$('form[name=delete_form'+ id +']').submit();
			}
		});
	});
</script>
@endpush