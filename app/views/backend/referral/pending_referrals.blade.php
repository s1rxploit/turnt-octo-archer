@extends('backend.layouts.master')

@section('content')
<!-- Page header -->
<div class="page-header">
	<div class="page-title">
		<h3>Referrals </h3>
	</div>
</div>

@include('backend.layouts.notify')

<!-- /page header -->
<!-- Breadcrumbs line -->
<div class="breadcrumb-line">
	<ul class="breadcrumb">
		<li>
			<a href="/dashboard">Home</a>
		</li>
		<li class="active">
			Pending Referrals
		</li>
	</ul>
</div>
<!-- /breadcrumbs line -->

<div class="panel panel-default">
	<div class="panel-heading">
		<h6 class="panel-title"><i class="icon-user4"></i> Pending Referrals</h6>
		<div class="table-controls pull-right">
			<a href="/referral/new" class="btn btn-default btn-icon btn-xs tip" title="" data-original-title="Add Referral"><i class="icon-plus"></i></a>
			<a href="/referral/my_referrals" class="btn btn-default btn-icon btn-xs tip" title="" data-original-title="My Referrals"><i class="icon-cogs"></i></a>
		</div>
	</div>
	<div class="datatable">
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Email</th>
					<th>Tries</th>
					<th>Referred On</th>
				</tr>
			</thead>
			<tbody>
				@foreach($referrals as $referral)
				<tr>
					<td>{{$referral->id}}</td>
					<td>{{$referral->email}}</td>
					<td>{{$referral->tries}}</td>
					<td>{{Cashout\Helpers\Utils::prettyDate($referral->created_at,true)}}</td>
				</tr>
				@endforeach
			</tbody>

		</table>
	</div>
</div>

@stop