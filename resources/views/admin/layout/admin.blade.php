@include('admin/layout/header')


<body>
	

	@include('admin/layout/navbar')

	@include('admin/layout/right_sidebar')

	@include('admin/layout/left_sidebar')

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		@yield('content')
	</div>
	<!-- js -->

	 @include('admin/layout/scripts')
</body>
</html>