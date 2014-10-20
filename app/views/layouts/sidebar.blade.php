<!-- Sidebar -->
<div class="sidebar collapse">
	<div class="sidebar-content">
		<!-- User dropdown -->
		<div class="user-menu dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{Auth::user()->avatar}}" alt="">
			<div class="user-info">
				{{Auth::user()->name}}
				<span><i class="icon-coin"></i> Coins : {{Auth::user()->coins}}</span>
				<span><i class="icon-coin"></i> Cash : {{Auth::user()->cash}}</span>
			</div> </a>
			<div class="popup dropdown-menu dropdown-menu-right">
				<div class="thumbnail">
					<div class="thumb"><img alt="" src="{{Auth::user()->avatar}}">
						<div class="thumb-options">
							<span><a href="/customer/profile/edit" class="btn btn-icon btn-success"><i class="icon-pencil"></i></a></span>
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
						<i class="icon-coin text-muted"></i> Cash <span class="label label-success">{{Auth::user()->cash}}</span>
					</li>
				</ul>
			</div>
		</div>
		<!-- /user dropdown -->
		<!-- Main navigation -->
		<ul class="navigation">

			<li {{!isset(Request::segments()[0])?"class='active'":""}}>
				<a href="/customer"> <i class="icon-screen2"></i> <span>Dashboard </span> </a>
			</li>

			<li>
				<a href="" class="expand"><span>Profile</span> <i class="icon-user4"></i></a>
				<ul>
					<li>
						<a href="/customer/profile/edit">Edit Profile</a>
					</li>
					<li>
						<a href="/customer/profile/change_password">Change Password</a>
					</li>
				</ul>
			</li>

			<li>
				<a href="" class="expand"><span>Finance</span> <i class="icon-coin"></i></a>
				<ul>
					<li>
						<a href="">Withdraw Funds</a>
					</li>
					<li>
						<a href="">Transaction history</a>
					</li>
				</ul>
			</li>

			<li>
				<a class="expand"><span>Referrals</span> <i class="icon-users"></i></a>
				<ul>
					<li>
						<a href="/customer/referral/my_referrals">My Referrals</a>
					</li>
					<li>
						<a href="/customer/referral/pending">Pending Referrals</a>
					</li>
					<li>
						<a href="/customer/referral/new">Add New Referral</a>
					</li>
				</ul>
			</li>

		</ul>
		<!-- /main navigation -->
	</div>
</div>
<!-- /sidebar -->