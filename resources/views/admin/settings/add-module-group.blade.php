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
												<h3 class="card-title">Add Module Group</h3>
											</div>
											<!--begin::Form-->
											<form action="{{route('module-group-add')}}" method="POST">
												@csrf
												<input type="text" value="{{auth()->user()->id}}" hidden="" name="created_by">
												<div class="card-body">
													<div class="form-group">
														<label>Group Name</label>
														<input type="text" required="" autocomplete="off" class="form-control @error('access_group_name') is-invalid @enderror" name="access_group_name"  value="{{ old('access_group_name') }}" placeholder="Group Name" />
														<input type="text" value="1" hidden="" name="is_active">
														@error('access_group_name')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
														@enderror

													</div>
													<p><h4>Select Access</h4></p>
													<hr>
													@foreach($modules as $module)
													@if($module->is_parent == 1)
													<div class="form-group">
														<div class="checkbox-list">
															<label class="checkbox">
															<input value="{{$module->module_id}}" type="checkbox"  name="module_id[]"/>
															<span></span>{{ $module->module_name}}</label>
														</div>
													</div>
													@elseif($module->is_parent == 0)
													<div class="form-group">
														<div class="checkbox-list">
															<label class="checkbox">
															<input value="{{$module->module_id}}" type="checkbox"  name="module_id[]" />
															<span></span>{{$module->module_name}}</label>
															<div class="" style="margin-left: 6%;">
																@foreach($submodules as $sm)
																@if($sm->module_id == $module->module_id)
																	<label class="checkbox">
																	<input value="{{$sm->submodule_id}}" type="checkbox" name="submodule_id[]" />
																	<span></span>{{$sm->submodule_name}}</label>
																@endif
																@endforeach
															</div>
														</div>
													</div>
													@endif
													@endforeach
													
													
												</div>
												<div class="card-footer">
													<button type="submit" class="btn btn-primary mr-2">Submit</button>
													<a href="{{url('module-group')}}" class="btn btn-secondary">Back</a>
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