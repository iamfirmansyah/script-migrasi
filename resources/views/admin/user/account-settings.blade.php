@extends('admin.layouts.main')
<title>Brain App | User</title>
@section('content')
<div class="mt-0 mt-lg-3">
<!-- ISI KONTEN -->
	<!--begin::Card-->
			<div class="card card-custom ">
				<div class="card-header">
					<h3 class="card-title">Edit User</h3>
				</div>
				<!--begin::Form-->
				<div class="row">
					<div class="col-md-10 offset-1">
					<form action="{{ route('account-update',auth()->user()->id) }}" method="POST" name="status_form{{ auth()->user()->id }}">
					@csrf
					<input type="text" name="id" value="{{auth()->user()->id}}" hidden="">
					<input type="text" name="updated_by" value="{{auth()->user()->id}}" hidden="">
					<div class="card-body">
						<div class="form-group">
							<label>Name</label>
							<input id="name" type="email" class="form-control @error('email') is-invalid @enderror" name="name" value="{{ auth()->user()->name }}" placeholder="Full Name" required autocomplete="name"/>

							@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						<div class="form-group">
							<label>Email</label>
							<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ auth()->user()->email }}" placeholder="Email" required autocomplete="email"/>

							@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						<div class="row">
							<div class="form-group col-md-6">
								<label>Password</label>
								<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" minlength="8" name="password" placeholder="Password" />
								<span class="text-muted" style="font-size: 12px">&#8226; Isi jika ingin merubah password</span>

								@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
							<div class="form-group col-md-6">
								<label>Password Confirmation</label>
								<input id="password-confirm" type="password" class="form-control" name="password_confirmation"  minlength="8" placeholder="Confirm Password"  />
								<span class="text-muted" style="font-size: 12px">&#8226; Isi jika ingin merubah password</span>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<button type="button" class="btn btn-primary mr-2 is_active" data-form="{{ auth()->user()->id }}" >Submit</button>
						<a href="{{url('account-settings')}}" class="btn btn-secondary">Back</a>
						{{-- <button type="reset" class="btn btn-secondary">Reset</button> --}}
					</div>
				</form>
					</div>
				</div>
				<!--end::Form-->
			</div>
			<!--end::Card-->
</div>
						<!--end::Row-->
						<!--end::Dashboard--></div>
					<!--end::Container--></div>
				<!--end::Entry--></div>
			<!--end::Content-->

			<!--begin::Footer-->
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