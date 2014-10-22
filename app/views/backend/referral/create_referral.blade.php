@extends('backend.layouts.master')

@section('content')
<!-- Page header -->
<div class="page-header">
	<div class="page-title">
		<h3>Create New Referrals </h3>
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
			Create New Referrals
		</li>
	</ul>
</div>
<!-- /breadcrumbs line -->

{{Form::open(['url'=>'/referral/new','method'=>'post','class'=>'form-horizontal form-bordered','role'=>'form'])}}

<!-- Button trigger modal -->

<div class="panel panel-default">
	<div class="panel-heading">
		<h6 class="panel-title"><i class="icon-user-plus2"></i> Enter Emails of New Referrals</h6>
		<div class="table-controls pull-right">
			<input type="submit" value="Save" class="btn btn-info">
		</div>
	</div>
	<div class="panel-body">
		<div class="form-group">
			<label class="col-sm-12 control-label">Enter Emails Separated by comma</label>
		</div>
		<div class="form-group">
        	<div class="col-sm-10">
        		<textarea name="emails" class="form-control">{{Input::old('emails')}}</textarea>
        	</div>
        </div>
		<div class="form-actions text-right">
			<label class="col-sm-2 control-label"></label>
			<input type="submit" value="Save" class="btn btn-info">
		</div>
	</div>
</div>
{{Form::close()}}


@stop