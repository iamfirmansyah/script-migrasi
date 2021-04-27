@extends('admin.layouts.main')
<title>Brain App | User</title>
@section('content')
<div class="mt-0 mt-lg-3">
							<!-- ISI KONTEN -->
								<!--begin::Card-->
										<div class="card card-custom ">
											<div class="card-header">
												<h3 class="card-title">Add User</h3>
											</div>
											<!--begin::Form-->
											<div class="row">
												<div class="col-md-10 offset-1">
												<form action="{{route('user-management.store')}}" method="POST">
                        						@csrf
                       							@method('POST')

                        						<?php
						                            $get_group = App\Modulegroup::where('is_active',true)->get();
						                         ?>
												<div class="card-body">
													<div class="form-group">
														<label>Nama Lengkap</label>
														<input type="text" id="name"  type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="Nama Lengkap" />

														 @error('name')
						                                    <span class="invalid-feedback" role="alert">
						                                        <strong>{{ $message }}</strong>
						                                    </span>
						                                @enderror
													</div>
													<div class="form-group">
														<label>Email</label>
														<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email"/>

														@error('email')
						                                    <span class="invalid-feedback" role="alert">
						                                        <strong>{{ $message }}</strong>
						                                    </span>
						                                @enderror
													</div>
													<div class="row">
														<div class="form-group col-md-6">
															<label>Password</label>
															<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" minlength="8" required="" name="password" placeholder="Password" />
															{{-- <span class="text-muted" style="font-size: 12px">&#8226; Isi jika ingin merubah password</span> --}}

															@error('password')
							                                    <span class="invalid-feedback" role="alert">
							                                        <strong>{{ $message }}</strong>
							                                    </span>
							                                @enderror
														</div>
														<div class="form-group col-md-6">
															<label>Password Confirmation</label>
															<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required="" minlength="8" placeholder="Confirm Password"  />
															{{-- <span class="text-muted" style="font-size: 12px">&#8226; Isi jika ingin merubah password</span> --}}
														</div>
													</div>
													<label>Access</label>
													 <select class="form-control" name="access_group_id">
					                                   @foreach($get_group as $get)
					                                        <option value="{!!$get->access_group_id!!}">{{ $get->access_group_name }}</option>
					                                    @endforeach
					                                    
					                                </select>
													
													<input type="text" name="created_by" value="{{auth()->user()->id}}" hidden="">
												</div>
												<div class="card-footer">
													<button type="submit" class="btn btn-primary mr-2">Submit</button>
													<a href="{{url('user-management')}}" class="btn btn-secondary">Back</a>
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
