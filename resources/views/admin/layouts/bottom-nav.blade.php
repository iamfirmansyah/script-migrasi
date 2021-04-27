				<div class="header-bottom">
					<!--begin::Container-->
					<div class="container">
						<!--begin::Header Menu Wrapper-->
						<div class="header-menu-wrapper" id="">
							<!--begin::Header Menu-->
							<div id="kt_header_menu" class="header-menu header-menu-left header-menu-mobile header-menu-layout-default">
								<!--begin::Header Nav-->
								<ul class="menu-nav">
									<li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="hover" aria-haspopup="true">
										<a href="{{url('dashboard')}}" class="menu-link">
										<span class="menu-text">Dashboard</span>
										<span class="menu-desc">Recent Updates</span>
										</a>
									</li>
									<li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="hover" aria-haspopup="true">
										<a href="javascript:;" class="menu-link">
										<span class="menu-text">Private Area</span>
										<span class="menu-desc">Records &amp; Form Entries</span>
										</a>
									</li>
									<li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="hover" aria-haspopup="true">
										<a href="javascript:;" class="menu-link">
										<span class="menu-text">Mail Box</span>
										<span class="menu-desc">Message for All Users</span>
										</a>
									</li>

									<li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
										<a href="#" class="menu-link">
										<span class="menu-text">Help</span>
										<span class="menu-desc">For your information</span>
										</a>
									</li>
									<li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
										<a class="menu-link menu-toggle" href="{{ route('logout') }}"
				                            onclick="event.preventDefault();
				                                 document.getElementById('logout-form').submit();">
					                                <span class="menu-text">Logout</span>
													<span class="menu-desc">Keluar dari halaman</span>
				                            </a>

				                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				                            @csrf
				                            
				                      </form>
									</li>
								</ul>
								<!--end::Header Nav--></div>
							<!--end::Header Menu--></div>
						<!--end::Header Menu Wrapper--></div>
					<!--end::Container--></div>
				<!--end::Bottom--></div>