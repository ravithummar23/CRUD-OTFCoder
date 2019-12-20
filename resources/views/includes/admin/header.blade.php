
<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
	<!-- begin:: Header Menu -->
	<!-- Uncomment this to display the close button of the panel
				<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
				-->
	<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
		<div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
		</div>
	</div>
	<!-- end:: Header Menu -->
	<!-- begin:: Header Topbar -->
	<div class="kt-header__topbar">
		<!--begin: User Bar -->
		<div class="kt-header__topbar-item kt-header__topbar-item--user">
			<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
				<div class="kt-header__topbar-user">
					<span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
					<span class="kt-header__topbar-username kt-hidden-mobile">{{Auth::user()->first_name . ' '. Auth::user()->last_name }}</span>

					<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
					@if(Auth::user()->profile_image)
					<img class="kt" alt="Pic" src="{{URL::to('public/'.config('admin.image.user_image').Auth::user()->profile_image)}}" />
					@else
					<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">{{Auth::user()->first_name[0]}}</span>
						
					@endif
				</div>
			</div>
			<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
				<!--begin: Head -->
				<div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-color: #1e1e2d87">
					<div class="kt-user-card__avatar">
						@if(Auth::user()->profile_image)

							<img class="kt" alt="Pic" src="{{URL::to('public/'.config('admin.image.user_image').Auth::user()->profile_image)}}" />
						@else
							<span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">{{Auth::user()->first_name[0]}}</span>
							
						@endif
					</div>
					<div class="kt-user-card__name">
						{{Auth::user()->first_name . ' '. Auth::user()->last_name }}
					</div>
					<div class="kt-user-card__badge">
						<a class="btn btn-success btn-sm btn-bold btn-font-md" href="{{URL::to('admin\logout')}}">Logout</a>
					</div>
				</div>

				<!--end: Head -->

				<!--begin: Navigation -->
				<div class="kt-notification">
					<a href="{{URL::to('admin/users/'.Auth::user()->id)}}" class="kt-notification__item">
						<div class="kt-notification__item-icon">
							<i class="flaticon2-calendar-3 kt-font-success"></i>
						</div>
						<div class="kt-notification__item-details">
							<div class="kt-notification__item-title kt-font-bold">
								My Profile
							</div>
							<div class="kt-notification__item-time">
								Account settings and more
							</div>
						</div>
					</a>
				</div>

				<!--end: Navigation -->
			</div>
		</div>
		<!--end: User Bar -->
	</div>
	<!-- end:: Header Topbar -->
</div>