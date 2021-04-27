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
											<form action="{{ route('module-group-update') }}" method="POST">
												@csrf
												<input type="hidden" value="{{auth()->user()->id}}" name="updated_by">
												<input type="hidden" value="{{ $appAccessGroup->access_group_id }}" name="access_group_id">
												<input type="hidden" value="{{ $appAccessGroup->created_by }}" name="created_by">


												<div class="card-body">
													<div class="form-group">
														<label>Group Name</label>
														@foreach($getId as $i)
														<input type="text" class="form-control" name="access_group_name" placeholder="Group Name" value="{{ $i->access_group_name }}" />
														<input type="hidden" value="{{ $i->is_active }}" name="is_active">

														@endforeach

													</div>
													<p><h4>Select Access</h4></p>
													<hr>
													@foreach($modules as $module)
													@php
													$checkAccess1 = \App\Accessmodule::where('access_group_id', $appAccessGroup->access_group_id)
													->where('module_id', $module->module_id)
													->where('submodule_id', '')
													->count();
													$dataAccess1 = \App\Accessmodule::where('access_group_id', $appAccessGroup->access_group_id)
													->where('module_id', $module->module_id)
													->where('submodule_id', '')
													->first();
													@endphp
													@if($module->is_parent == 1)
													<div class="form-group">
														<div class="checkbox-list">
													
															<label class="checkbox">
															<input value="{{$module->module_id}}" type="checkbox" class="checkidot" name="module_id[]" @if($checkAccess1 != 0) checked="" @endif/>
															<span></span>{{ $module->module_name}}</label>
														</div>
													</div>
													@elseif($module->is_parent == 0)
													<div class="form-group">
														<div class="checkbox-list">
													
															<label class="checkbox">
															<input value="{{$module->module_id}}" type="checkbox" class="checkidot" name="module_id[]" @if($checkAccess1 != 0) checked="" @endif/>
															<span></span>{{$module->module_name}}</label>
															<div class="" style="margin-left: 6%;">
																@foreach($submodules as $sm)
																@php
																$checkAccess2 = \App\Accessmodule::where('access_group_id', $appAccessGroup->access_group_id)
																->where('module_id', $module->module_id)
																->where('submodule_id', $sm->submodule_id)
																->count();
																$dataAccess2 = \App\Accessmodule::where('access_group_id', $appAccessGroup->access_group_id)
																->where('module_id', $module->module_id)
																->where('submodule_id', $sm->submodule_id)
																->first();
																@endphp
																@if($sm->module_id == $module->module_id)
															
																	<label class="checkbox">
																	<input value="{{$sm->submodule_id}}" type="checkbox" class="checkidot" name="submodule_id[]" @if($checkAccess2 != 0) checked="" @endif/>
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
										</div>
							</div>
	</div>
	</div>
	</div>
</div>

@endsection