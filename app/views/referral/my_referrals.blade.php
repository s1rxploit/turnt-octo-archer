@extends('layouts.master')

@section('content')
<!-- Page header -->
<div class="page-header">
	<div class="page-title">
		<h3>Referrals </h3>
	</div>
</div>

@include('layouts.notify')

<!-- /page header -->
<!-- Breadcrumbs line -->
<div class="breadcrumb-line">
	<ul class="breadcrumb">
		<li>
			<a href="/dashboard">Home</a>
		</li>
		<li class="active">
			My Referrals
		</li>
	</ul>
</div>
<!-- /breadcrumbs line -->

<div class="panel panel-default">
	<div class="panel-heading">
		<h6 class="panel-title"><i class="icon-user4"></i> My Referrals</h6>
		<div class="table-controls pull-right">
			<a href="/referral/new" class="btn btn-default btn-icon btn-xs tip" title="" data-original-title="Add Referral"><i class="icon-plus"></i></a>
			<a href="/referral/pending" class="btn btn-default btn-icon btn-xs tip" title="" data-original-title="Pending Referrals"><i class="icon-cogs"></i></a>
		</div>
	</div>
	<div class="datatable">
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Photo</th>
					<th>Name</th>
					<th>Email</th>
					<th>Referred On</th>
					<th>Referral Registered On</th>
				</tr>
			</thead>
			<tbody>
				@foreach($referrals as $referral)
				<tr>
					<td>{{$referral->user_id}}</td>
					<td><img class="img-circle" style="width:80px;" src="{{$referral->avatar}}"/></td>
					<td>{{$referral->name}}</td>
					<td>{{$referral->email}}</td>
					<td>{{Cashout\Helpers\Utils::prettyDate($referral->referred_on,true)}}</td>
					<td>{{Cashout\Helpers\Utils::prettyDate($referral->registered_on,true)}}</td>
				</tr>
				@endforeach
			</tbody>

		</table>
	</div>
</div>


@stop