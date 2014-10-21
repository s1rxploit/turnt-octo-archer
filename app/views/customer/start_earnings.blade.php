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
<iframe name="offer_walls" id="offer_walls" src="https://www.trialpay.com/dispatch/a23ea0770fb4bc863a83874c5b96197c?sid={{Auth::user()->id}}&tph=f8246899e6b0194c&toi=Y4mVms&cn=US&hmac=e00cb5a3fe6d8bf9aebf59313acf977f&message=sid%3D2%26timestamp%3D1413891165" frameborder="0" width="100%" height="1200" scrolling="no" ></iframe>

	</div>
</div>

@stop