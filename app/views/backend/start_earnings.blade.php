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
		<iframe name="offer_walls" id="offer_walls" src="https://www.trialpay.com/dispatch/53dae2e916e22b4347f686cd173ba159?sid={{Auth::user()->id}}&tph=b18d98f0be48c4de&toi=Y4mVms&cn=IN&hmac=a76c3dea7e1bd34061e2821a93a16584&message=sid%3D1%26timestamp%3D1414099664" frameborder="0" width="100%" height="1200" scrolling="no" ></iframe>

	</div>
</div>

@stop