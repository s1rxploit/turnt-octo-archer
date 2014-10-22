<!-- Navbar -->
<div class="navbar navbar-inverse" role="navigation">

	<div class="navbar-header">
		<a class="navbar-brand" href="#"><img style="width: 100px;margin-top: -16px;" src="/assets/images/logo.png" alt="Cashout"></a><a class="sidebar-toggle"><i class="icon-menu2"></i></a>
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-icons">
			<span class="sr-only">Toggle navbar</span><i class="icon-grid3"></i>
		</button>
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar">
			<span class="sr-only">Toggle navigation</span><i class="icon-paragraph-justify2"></i>
		</button>

	</div>

	<ul class="nav navbar-nav navbar-right collapse" id="navbar-icons">
		<li class="dropdown">
			<a href="/customer/referral/my_referrals" ><i class="icon-users"></i> My Referrals</a>
		</li>
		<li class="dropdown">
			<a href="/customer/referral/new"><i class="icon-user4"></i> New Referral</a>
		</li>
		<li class="dropdown">
			<a href="/customer/funds/withdraw"><i class="icon-coin"></i> Withdraw Funds</a>
		</li>
		<li class="user dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown"><img src="{{Auth::user()->avatar}}" alt=""><span>{{Auth::user()->name}}</span><i class="caret"></i></a>
			<ul class="dropdown-menu dropdown-menu-right icons-right">
				<li>
					<a href="/customer/profile/edit"><i class="icon-user"></i> Profile</a>
				</li>
				<li>
					<a href="/customer/profile/change_password"><i class="icon-lock"></i> Change Password</a>
				</li>
				<li>
					<a href="/logout"><i class="icon-exit"></i> Logout</a>
				</li>
			</ul>
		</li>
	</ul>
</div>
<!-- /navbar -->