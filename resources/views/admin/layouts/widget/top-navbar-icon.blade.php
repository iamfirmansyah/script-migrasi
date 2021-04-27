	<?php
		$profile = App\User::select('users.*')
										->where('users.id',auth()->user()->id)
        						        ->first();

	?>
<div class="topbar-item">
	<div class="btn btn-icon btn-hover-transparent-white btn-lg mr-1" id="kt_quick_panel_toggle">
		<span class="svg-icon svg-icon-xl">
		<i class="fa fa-bell"></i>
		</span>
	</div>
</div>
<div class="topbar-item">
	<div class="btn btn-icon btn-hover-transparent-white w-auto d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
		<div class="d-flex flex-column text-right pr-3">
			<span class="text-white opacity-50 font-weight-bold font-size-sm d-none d-md-inline">Hello</span>
			<span class="text-white font-weight-bolder font-size-sm d-none d-md-inline">{{Str::limit($profile->name, 12)}}&nbsp;</span>
		</div>
		<span class="symbol symbol-35">
		<span class="symbol-label font-size-h5 font-weight-bold text-white bg-white-o-30"><i class="fas fa-user"></i></span>
		</span>
	</div>
</div>