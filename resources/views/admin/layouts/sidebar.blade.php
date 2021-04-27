<div class="col-md-3 mt-0 mt-lg-3">
	<!--begin::Aside-->
	<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
		<!--begin::Aside Menu-->
		<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
			<!--begin::Menu Container-->
			<div id="kt_aside_menu" class="aside-menu min-h-lg-700px" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
				<!--begin::Menu Nav-->
				<?php 
				$get_group = App\Modulegroup::where('access_group_id',auth()->user()->access_group_id)->get();
				$get_all_menu = App\Accessmodule::select('app_access_module.*', 'app_module.module_name','app_module.*')
												->leftJoin('app_module', 'app_access_module.module_id', '=', 'app_module.module_id')
												->where('access_group_id', auth()->user()->access_group_id)
												->groupBy('app_access_module.module_id')
												->orderBy('module_order')
												->get();
				{{-- dd($get_group);  --}}
				?>
				@foreach($get_group as $get)
				{{-- {{dd($get)}} --}}
				@if($get->is_active == 1)
				<ul class="menu-nav">
					@foreach ($get_all_menu->sortBy('module_order') as $menus)
					@if($menus->is_parent)
						<li class="menu-item" aria-haspopup="true">
						<a href="{{url($menus->module_url)}}" class="menu-link">
							<span class="svg-icon menu-icon">
								<i class="{{$menus->module_icon}}"></i>
							</span>
							<span class="menu-text">{{ $menus->module_name }}</span>
						</a>
					</li>

					@else
						<?php 
							$get_sub_menu = App\Accessmodule::select('app_access_module.*', 'app_submodule.submodule_name','app_submodule.submodule_url')
															->leftJoin('app_submodule', 'app_access_module.submodule_id', '=', 'app_submodule.submodule_id')
															->where('app_access_module.module_id', $menus->module_id)
															->where('access_group_id', auth()->user()->access_group_id)
															->orderBy('order_number')
															->get();
						?>
						<li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
						<a href="#" class="menu-link menu-toggle">
							<span class="svg-icon menu-icon {{$menus->module_icon}}">
								<!--begin::Svg Icon | path:admin/assets/media/svg/icons/Shopping/Box2.svg-->

								<!--end::Svg Icon--></span>
								<span class="menu-text">{{$menus->module_name}}</span>
								<i class="menu-arrow"></i>
							</a>
							<div class="menu-submenu">
								<i class="menu-arrow"></i>
								<ul class="menu-subnav">
									@foreach($get_sub_menu as $sub_menu)
										@if($sub_menu->submodule_id)
											<li class="menu-item" aria-haspopup="true">
												<a href="{{url($sub_menu->submodule_url)}}" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">{{ $sub_menu->submodule_name }}</span>
												</a>
											</li>
										@endif
									@endforeach
								</ul>
							</div>
						</li>
					@endif
					@endforeach
					</ul>
				@endif
				@endforeach
					<!--end::Menu Nav--></div>
					<!--end::Menu Container--></div>
					<!--end::Aside Menu--></div>
					<!--end::Aside--></div>
