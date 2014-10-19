@extends('layouts.master')

@section('content')
<!-- Page header -->
<div class="page-header">
	<div class="page-title">
		<h3>Edit Profile </h3>
	</div>
</div>

@include('layouts.notify')

{{Form::open(['url'=>'/customer/profile/edit','method'=>'post','class'=>'form-horizontal form-bordered','role'=>'form'])}}

<!-- Button trigger modal -->

<div class="panel panel-default">
	<div class="panel-heading">
		<h6 class="panel-title"><i class="icon-user-plus2"></i> Edit Profile</h6>
		<div class="table-controls pull-right">
			<input type="submit" value="Save" class="btn btn-info">
		</div>
	</div>
	<div class="panel-body">

		<div class="form-group">
			<label class="col-sm-2 control-label">Change Avatar</label>
			<div class="col-sm-10">
				<p><img class="img-circle" style="width:80px;" src="{{$profile->avatar}}"/>
				</p>
				<input name="photo" type="file" class="form-control">
				<input name="old_photo" type="hidden" value="{{$profile->avatar}}">
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Email</label>
			<div class="col-sm-10">
				<input disabled name="email" type="text" class="form-control" value="{{$profile->email}}">
				<input name="user_id" type="hidden" class="form-control" value="{{$profile->id}}">
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Username</label>
			<div class="col-sm-10">
				<input disabled name="username" type="text" class="form-control" value="{{$profile->username}}">
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Name</label>
			<div class="col-sm-10">
				<input name="name" type="text" class="form-control" value="{{$profile->name}}">
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Date of Birth</label>
			<div class="col-sm-10">
                 <input type="text" class="form-control" data-mask="dd-mm-yyyy" value="{{date('d-m-Y',strtotime($profile->birthday))}}">
            </div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Bio</label>
			<div class="col-sm-10">
				<textarea name="bio" class="form-control">{{$profile->bio}}</textarea>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Gender</label>
			<div class="col-sm-1">
				<input name="gender" type="radio" {{($profile->gender=="male"||$profile->gender=="m")?"checked":""}}> Male
			</div>
			<div class="col-sm-1">
            	<input name="gender" type="radio" {{($profile->gender=="female"||$profile->gender=="f")?"checked":""}}> Female
            </div>

		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Mobile No</label>
			<div class="col-sm-10">
				<input name="mobile_no" type="text" class="form-control" value="{{$profile->mobile_no}}">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Country</label>
			<div class="col-sm-10">
				<select name="country" class="form-control">
				    <option {{$profile->country=="india"?"selected":""}} value="india">India</option>
				    <option {{$profile->country=="usa"?"selected":""}} value="usa">USA</option>
				</select>
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