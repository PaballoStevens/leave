@include('staff/layout/header')

<body>
	
	@include('staff/layout/navbar')

	@include('staff/layout/right_sidebar')

	@include('staff/layout/left_sidebar')

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		@yield('content')
	</div>
	<!-- js -->

	 @include('staff/layout/scripts')
</body>
</html>