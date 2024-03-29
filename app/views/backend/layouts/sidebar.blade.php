<!-- Sidebar -->
<div class="sidebar collapse">
	<div class="sidebar-content">
		<!-- User dropdown -->
		<div class="user-menu dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{Auth::user()->avatar}}" alt="">
			<div class="user-info">
				{{Auth::user()->name}}
				<span><i class="icon-coin"></i> Coins : {{Auth::user()->coins}}</span>
				<span><i class="icon-coin"></i> Cash : {{Auth::user()->cash}} $</span>
			</div> </a>
			<div class="popup dropdown-menu dropdown-menu-right">
				<div class="thumbnail">
					<div class="thumb"><img alt="" src="{{Auth::user()->avatar}}">
						<div class="thumb-options">
							<span><a href="/profile/edit" class="btn btn-icon btn-success"><i class="icon-pencil"></i></a></span>
						</div>
					</div>
					<div class="caption text-center">
						<h6>{{Auth::user()->name}}</h6>
					</div>
				</div>
				<ul class="list-group">
					<li class="list-group-item">
						<i class="icon-coin text-muted"></i> Coins <span class="label label-success">{{Auth::user()->coins}}</span>
					</li>
					<li class="list-group-item">
						<i class="icon-coin text-muted"></i> Cash <span class="label label-success">{{Auth::user()->cash}} $</span>
					</li>
				</ul>
			</div>
		</div>
		<!-- /user dropdown -->
		<!-- Main navigation -->
		<ul class="navigation">

			<li>
				<a class="btn btn-block btn-success" href="/earnings"> <i class="icon-cash"></i> <span>Start Earnings </span> </a>
			</li>

			<li {{!isset(Request::segments()[0])?"class='active'":""}}>
				<a href="/dashboard"> <i class="icon-screen2"></i> <span>Dashboard </span> </a>
			</li>

			<li>
				<a href="" class="expand"><span>Profile</span> <i class="icon-user4"></i></a>
				<ul>
					<li>
						<a href="/profile/edit">Edit Profile</a>
					</li>
					<li>
						<a href="/profile/change_password">Change Password</a>
					</li>
				</ul>
			</li>

			<li>
				<a href="" class="expand"><span>Finance</span> <i class="icon-coin"></i></a>
				<ul>
					@if(Auth::check()&&Auth::user()->isCustomer())
					<li>
						<a href="/withdraw_funds">Withdraw Funds</a>
					</li>
					<li>
						<a href="/withdraw_funds/all">Transaction history</a>
					</li>
					@endif

					@if(Auth::check()&&Auth::user()->isAdmin())
					<li>
						<a href="/admin/pending_withdrawals">Pending Withdrawals</a>
					</li>
					<li>
						<a href="/admin/approved_withdrawals">Approved Withdrawals</a>
					</li>
					@endif
				</ul>
			</li>

			<li>
				<a class="expand"><span>Referrals</span> <i class="icon-users"></i></a>
				<ul>
					<li>
						<a href="/referral/my_referrals">My Referrals</a>
					</li>
					<li>
						<a href="/referral/pending">Pending Referrals</a>
					</li>
					<li>
						<a href="/referral/new">Add New Referral</a>
					</li>
				</ul>
			</li>

			@if(Auth::check()&&Auth::user()->isAdmin())
			<li>
				<a class="expand"><span>News</span> <i class="icon-coin"></i></a>
				<ul>
					<li>
						<a href="/admin/news/all">All News</a>
					</li>
					<li>
						<a href="/admin/news/add">Add News</a>
					</li>
				</ul>
			</li>
			@endif

			@if(Auth::check()&&Auth::user()->isAdmin())
			<li>
				<a class="expand"><span>Users</span> <i class="icon-users"></i></a>
				<ul>
					<li>
						<a href="/admin/users/all">All Users</a>
					</li>
					<li>
						<a href="/admin/users/add_account">Create New Account</a>
					</li>
				</ul>
			</li>
			@endif

			<li>
				<a class="expand"><span>Cash Generation</span> <i class="icon-coin"></i></a>
				<ul>
					<li>
						<a href="/cgs">CGS Tree</a>
					</li>

				</ul>
			</li>

		</ul>
		<!-- /main navigation -->
	</div>
</div>
<!-- /sidebar -->