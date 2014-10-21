@extends('customer.layouts.master')

@section('content')
<!-- Page header -->
<div class="page-header">
	<div class="page-title">
		<h3>Start Earnings </h3>
	</div>
</div>

@include('customer.layouts.notify')

<div class="panel panel-default">
	<div class="panel-heading">
		<h6 class="panel-title"><i class="icon-user-plus2"></i> Offer Wall</h6>
	</div>
	<div class="panel-body">
<iframe name="survey_iframe" id="survey_iframe" src="https://www.superrewards-offers.com/super/offers?h=iomqixkwasv.822194950894&uid=304" frameborder="0" width="100%" height="1200" scrolling="no" ></iframe>

	</div>
</div>

@stop