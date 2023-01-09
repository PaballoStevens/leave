<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			
		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
						<i class="dw dw-settings2"></i>
					</a>
				</div>
			</div>
			
			<div class="user-info-dropdown">
				<div class="dropdown">

					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							@if (Auth::user()->avatar)
							<img src="/uploads/avatars/{{Auth::user()->avatar}}" alt="">
							@else
							 <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name)}}" alt="">
							@endif
						</span>
						<span class="user-name">{{Auth::user()->name}}</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="my_profile.php"><i class="dw dw-user1"></i> Profile</a>
						<a class="dropdown-item" href="change_password.php"><i class="dw dw-help"></i> Reset Password</a>
						<a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                        >
                            <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                            <i class="dw dw-logout"></i> Log Out 
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
					</div>
				</div>
			</div>
			
		</div>
	</div>