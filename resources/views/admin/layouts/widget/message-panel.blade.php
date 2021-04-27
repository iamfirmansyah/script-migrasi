<!--begin::Chat Panel-->
<div class="modal modal-sticky modal-sticky-bottom-right" id="kt_chat_modal" role="dialog" data-backdrop="false">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<!--begin::Card-->
			<div class="card card-custom">
				<!--begin::Header-->
				<div class="card-header align-items-center px-4 py-3">
					<div class="text-left flex-grow-1">
						<!--begin::Dropdown Menu-->
						<div class="dropdown dropdown-inline">
							<button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="svg-icon svg-icon-lg">
							<!--begin::Svg Icon | path:admin/assets/media/svg/icons/Communication/Add-user.svg-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewbox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<polygon points="0 0 24 0 24 24 0 24"/>
							<path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
							<path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
							</g>
							</svg>
							<!--end::Svg Icon--></span>
							</button>
							<div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-md">
								<!--begin::Navigation-->
								<ul class="navi navi-hover py-5">
									<li class="navi-item">
										<a href="#" class="navi-link">
										<span class="navi-icon">
										<i class="flaticon2-drop"></i>
										</span>
										<span class="navi-text">New Group</span>
										</a>
									</li>
									<li class="navi-item">
										<a href="#" class="navi-link">
										<span class="navi-icon">
										<i class="flaticon2-list-3"></i>
										</span>
										<span class="navi-text">Contacts</span>
										</a>
									</li>
									<li class="navi-item">
										<a href="#" class="navi-link">
										<span class="navi-icon">
										<i class="flaticon2-rocket-1"></i>
										</span>
										<span class="navi-text">Groups</span>
										<span class="navi-link-badge">
										<span class="label label-light-primary label-inline font-weight-bold">new</span>
										</span>
										</a>
									</li>
									<li class="navi-item">
										<a href="#" class="navi-link">
										<span class="navi-icon">
										<i class="flaticon2-bell-2"></i>
										</span>
										<span class="navi-text">Calls</span>
										</a>
									</li>
									<li class="navi-item">
										<a href="#" class="navi-link">
										<span class="navi-icon">
										<i class="flaticon2-gear"></i>
										</span>
										<span class="navi-text">Settings</span>
										</a>
									</li>
									<li class="navi-separator my-3"></li>
									<li class="navi-item">
										<a href="#" class="navi-link">
										<span class="navi-icon">
										<i class="flaticon2-magnifier-tool"></i>
										</span>
										<span class="navi-text">Help</span>
										</a>
									</li>
									<li class="navi-item">
										<a href="#" class="navi-link">
										<span class="navi-icon">
										<i class="flaticon2-bell-2"></i>
										</span>
										<span class="navi-text">Privacy</span>
										<span class="navi-link-badge">
										<span class="label label-light-danger label-rounded font-weight-bold">5</span>
										</span>
										</a>
									</li>
								</ul>
								<!--end::Navigation--></div>
						</div>
						<!--end::Dropdown Menu--></div>
					<div class="text-center flex-grow-1">
						<div class="text-dark-75 font-weight-bold font-size-h5">Matt Pears</div>
						<div>
							<span class="label label-dot label-success"></span>
							<span class="font-weight-bold text-muted font-size-sm">Active</span>
						</div>
					</div>
					<div class="text-right flex-grow-1">
						<button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-dismiss="modal">
						<i class="ki ki-close icon-1x"></i>
						</button>
					</div>
				</div>
				<!--end::Header-->
				@include('admin.layouts.widget.message-content')
				<!--begin::Footer-->
				@include('admin.layouts.footer')
				<!--end::Footer--></div>
			<!--end::Card--></div>
	</div>
</div>
<!--end::Chat Panel-->