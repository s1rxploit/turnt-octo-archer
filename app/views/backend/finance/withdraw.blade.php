@extends('backend.layouts.master')

@section('content')
<!-- Page header -->
<div class="page-header">
	<div class="page-title">
		<h3>Request Withdraw </h3>
	</div>
</div>

@include('backend.layouts.notify')

@if(Auth::user()->cash > Config::get('cashout.min_withdraw'))
{{Form::open(['url'=>'/withdraw_funds','method'=>'post','class'=>'form-horizontal form-bordered','role'=>'form'])}}

<!-- Button trigger modal -->

<div class="panel panel-default">
	<div class="panel-heading">
		<h6 class="panel-title"><i class="icon-user-plus2"></i> Request Withdraw</h6>
		<div class="table-controls pull-right">
			<input type="submit" value="Save" class="btn btn-info">
		</div>
	</div>
	<div class="panel-body">

		<div class="form-group">
			<label class="col-sm-2 control-label">Amount</label>
			<div class="col-sm-10">
				<input name="amount" type="text" class="form-control" >
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Paypal Email</label>
			<div class="col-sm-10">
				<input name="paypal_email" type="text" class="form-control" >
			</div>
		</div>

		<div class="form-actions text-right">
			<label class="col-sm-2 control-label"></label>
			<input type="submit" value="Save" class="btn btn-info">
		</div>
	</div>
</div>
{{Form::close()}}
@else

<div class="alert alert-danger">
	<strong>Error!</strong> Minimum withdrawal amount is {{Config::get('cashout.min_withdraw')}} $
</div>

@endif

@stop