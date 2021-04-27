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
											<form action="{{ route('module-update', $module->module_id) }}"  method="POST">
                        						@csrf
                        						<input type="text" name="module_id" value="{{$module->module_id}}" hidden="">
												<div class="card-body">
													<div class="form-group">
														<label>Group Name</label>
														<input type="text" required="" autocomplete="off" value="{{$module->module_name}}" name="module_name" class="form-control" placeholder="Group Name" />
													</div>
													<div class="form-group">
														<label>Order Number</label>
														<input type="number" value="{{$module->module_order}}" name="module_order" class="form-control" placeholder="Order Number" />
													</div>
													<div class="form-group">
														<label for="exampleSelect1">Is Parent</label>
														<select class="form-control" name="is_parent" id="exampleSelect1">
															@if($module->is_parent == 0)
																<option value="0" selected="">Yes</option>
																<option value="1" >No</option>

															@else
																<option value="0" >Yes</option>
																<option value="1" selected="">No</option>

															@endif
														</select>
													</div>
													<div class="form-group">
														<label>URL Parameter</label>
														<input type="text" autocomplete="off" value="{{$module->module_url}}" name="module_url" class="form-control" placeholder="If Parent fill with #" />
													</div>
													<div class="form-group">
														<label>Icon</label>
														<input type="text" value="{{$module->module_icon}}" name="module_icon" class="form-control" placeholder="Example: fas fa-users"/>
														<a target="_blank" href="https://fontawesome.com/icons?d=gallery">See All Icons</a>
													</div>
													<input type="text" name="updated_by" value="{{auth()->user()->id}}" hidden="">
												</div>
												<div class="card-footer">
													<button type="submit" class="btn btn-primary mr-2">Submit</button>
													<a href="{{url('module')}}" class="btn btn-secondary">Back</a>
													{{-- <button type="reset" class="btn btn-secondary">Reset</button> --}}
												</div>
											</form>
										</div>
							</div>
</div>
</div>
</div>
			</div>

@endsection