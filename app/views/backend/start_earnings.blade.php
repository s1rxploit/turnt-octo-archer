@extends('backend.layouts.master')

@section('content')
<!-- Page header -->
<div class="page-header">
	<div class="page-title">
		<h3>Start Earnings </h3>
	</div>
</div>

@include('backend.layouts.notify')

<div class="panel panel-default">
	<div class="panel-heading">
		<h6 class="panel-title"><i class="icon-user-plus2"></i> Offer Wall</h6>
	</div>
	<div class="panel-body">
        <iframe src="https://api.paymentwall.com/api/subscription/?key=539f0c0f95db5bbaaa064977af360820&uid={{Auth()->user()->id}}&widget=p10_1" width="750" height="800" frameborder="0"></iframe>
	</div>
</div>

@stop