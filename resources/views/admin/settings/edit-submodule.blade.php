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
										<div class="card card-custom ">
											<div class="card-header">
												<h3 class="card-title">List Module</h3>
											</div>
											<!--begin::Form-->
											<form action="{{ route('submodule-update', $submodule->submodule_id) }}" method="POST">
                        						@csrf
												<div class="card-body">
													<div class="form-group">
														<label for="exampleSelect1">Module Name</label>
														<select class="form-control" name="module_id" id="exampleSelect1">
															@foreach($modules as $row)
															@if($row->is_parent == 0)
															 @if($row->module_id == $submodule->module_id)
															 <option value="{{$row->module_id}}" selected="">{{$row->module_name}}</option>
															 @else
															 <option value="{{$row->module_id}}" >{{$row->module_name}}</option>
															 @endif
															@endif
															@endforeach
														</select>
													</div>
													<div class="form-group">
														<label>Sub Module Name</label>
														<input type="text" required="" name="submodule_name" value="{{$submodule->submodule_name}}" class="form-control" placeholder="Sub Module Name" />
													</div>
													
													<div class="form-group">
														<label>Order Number Sub</label>
														<input type="number" required="" autocomplete="off" value="{{$submodule->order_number}}" name="order_number" class="form-control" placeholder="Order Number" />
													</div>
													<div class="form-group">
														<label>URL Sub</label>
														<input type="text" name="submodule_url" value="{{$submodule->submodule_url}}" required="" class="form-control" />
													</div>
													<input type="text" name="updated_by" value="{{auth()->user()->id}}" hidden="">
												</div>
												<div class="card-footer">
													<button type="submit" class="btn btn-primary mr-2">Submit</button>
													{{-- <button type="reset" class="btn btn-secondary">Reset</button> --}}
													<a href="{{url('submodule')}}" class="btn btn-secondary">Back</a>
												</div>
											</form>
										</div>
							</div>
					</div>
				</div>
			</div>
			</div>

@endsection