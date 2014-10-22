@extends('backend.layouts.master')

@section('content')
<!-- Page header -->
<div class="page-header">
	<div class="page-title">
		<h3>Create New Account </h3>
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
			Create New Account
		</li>
	</ul>
</div>
<!-- /breadcrumbs line -->

{{Form::open(['url'=>'/admin/users/add_account','method'=>'post','files'=>true,'class'=>'form-horizontal form-bordered','role'=>'form'])}}

<!-- Button trigger modal -->

<div class="panel panel-default">
	<div class="panel-heading">
		<h6 class="panel-title"><i class="icon-user-plus2"></i> Create New Account</h6>
		<div class="table-controls pull-right">
			<input type="submit" value="Save" class="btn btn-info">
		</div>
	</div>
	<div class="panel-body">

		<div class="form-group">
        			<label class="col-sm-2 control-label">Name</label>
        			<div class="col-sm-10">
                         <input name="name" type="text" class="form-control" value="{{Input::old('title')}}">
                    </div>
        		</div>

        		<div class="form-group">
                        			<label class="col-sm-2 control-label">Email</label>
                        			<div class="col-sm-10">
                                         <input name="email" type="text" class="form-control" value="{{Input::old('email')}}">
                                    </div>
                        		</div>
         <div class="form-group">
                 			<label class="col-sm-2 control-label">Password</label>
                 			<div class="col-sm-10">
                                  <input name="password" type="password" class="form-control" >
                             </div>
                 		</div>

<div class="form-group">
                 			<label class="col-sm-2 control-label">Confirm Password</label>
                 			<div class="col-sm-10">
                                  <input name="password_confirmation" type="password" class="form-control" >
                             </div>
                 		</div>

<div class="form-group">
			<label class="col-sm-2 control-label">Avatar</label>
			<div class="col-sm-10">
				<input name="avatar" type="file" class="form-control">
			</div>
		</div>

		 <div class="form-group">
                                			<label class="col-sm-2 control-label">Account Type</label>
                                			<div class="col-sm-10">
                                                 <select class="form-control input-lg" name="group">
                                                    <option {{Input::old('group')=="admin"?"selected":""}} value="admin">Admin Account</option>
                                                    <option {{Input::old('group')=="customer"?"selected":""}} value="customer">User Account</option>
                                                 </select>
                                            </div>
                                		</div>

        <div class="form-group">
                			<label class="col-sm-2 control-label">Activate</label>
                			<div class="col-sm-1">
                                 <input name="activate" type="checkbox" value="1"/>
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