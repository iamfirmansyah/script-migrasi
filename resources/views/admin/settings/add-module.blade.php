@extends('admin.layouts.main')
<title>Brain App | Settings</title>
@section('content')

							<div class="mt-0 mt-lg-3">
								@if ($errors->any())
								    <div class="alert alert-danger">
								        <strong>Whoops!</strong> There were some problems with your input.<br><br>
								        <ul>
								            @foreach ($errors->all() as $error)
								                <li>{{ $error }}</li>
								            @endforeach
								        </ul>
								    </div>
								@endif
							<!-- ISI KONTEN -->
								<!--begin::Card-->
										<div class="card card-custom ">
											<div class="card-header">
												<h3 class="card-title">List Module</h3>
											</div>
											<!--begin::Form-->
											<form action="{{route('module.store')}}" method="POST">
                        						@csrf
                        					
												<div class="card-body">
													<div class="form-group">
														<label>Group Name</label>
														<input type="text" required="" autocomplete="off" name="module_name" class="form-control" placeholder="Group Name" />
													</div>
													<div class="form-group">
														<label>Order Number</label>
														<input type="number" name="module_order" class="form-control" placeholder="Order Number" required="" />
													</div>
													<div class="form-group">
														<label for="exampleSelect1">Is Parent</label>
														<select class="form-control" name="is_parent" id="exampleSelect1">
															<option value="0">Yes</option>
															<option value="1">No</option>
														</select>
													</div>
													<div class="form-group">
														<label>URL Parameter</label>
														<input type="text" autocomplete="off" name="module_url" class="form-control" required="" placeholder="If Parent fill with #" />
													</div>
													<div class="form-group">
														<label>Icon</label>
														<input type="text" required="" name="module_icon" class="form-control" placeholder="Example: fas fa-users"/>
														<a target="_blank" href="https://fontawesome.com/icons?d=gallery">See All Icons</a>
													</div>
													<input type="text" name="created_by" value="{{auth()->user()->id}}" hidden="">
												</div>
												<div class="card-footer">
													<button type="submit" class="btn btn-primary mr-2">Submit</button>
													<a href="{{url('module')}}" class="btn btn-secondary">Back</a>
													{{-- <button type="reset" class="btn btn-secondary">Reset</button> --}}
												</div>
											</form>
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