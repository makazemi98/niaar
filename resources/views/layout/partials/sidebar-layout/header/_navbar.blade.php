<!--begin::Navbar-->
<div class="app-navbar flex-shrink-0">

	{{-- <div class="app-navbar-item ms-1 ms-md-3">
		<div class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px position-relative" id="kt_drawer_chat_toggle">{!! getIcon('message-text-2', 'fs-2 fs-md-1') !!}
		<span class="bullet bullet-dot bg-success h-6px w-6px position-absolute translate-middle top-0 start-50 animation-blink"></span></div>
	</div> --}}


	<div class="app-navbar-item ms-1 ms-md-3" id="kt_header_user_menu_toggle">
		<div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
			<img src="{{ asset(auth()->user()->avatar ?? 'assets/media/avatars/300-1.jpg') }}" alt="user" />
		</div>
		@include('partials/menus/_user-account-menu')
	</div>

	<div class="app-navbar-item d-lg-none ms-2 me-n3" title="Show header menu">
		<div class="btn btn-icon btn-active-color-primary w-30px h-30px w-md-35px h-md-35px" id="kt_app_header_menu_toggle">{!! getIcon('text-align-left', 'fs-2 fs-md-1') !!}</div>
	</div>
</div>