@extends('backend.layouts.master')

@section('content')
<!-- Page header -->
<div class="page-header">
	<div class="page-title">
		<h3>Users </h3>
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
			Users
		</li>
	</ul>
</div>
<!-- /breadcrumbs line -->

<div class="panel panel-default">
	<div class="panel-heading">
		<h6 class="panel-title"><i class="icon-user4"></i> Users</h6>
		<div class="table-controls pull-right">
			<a href="/admin/users/add_admin" class="btn btn-default btn-icon btn-xs tip" title="" data-original-title="Add Admin"><i class="icon-plus"></i></a>
		</div>
	</div>
	<div class="table-responsive">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Birthday</th>
                        <th>Country</th>
                        <th>Activated</th>
                        <th>Activate</th>
                        <th>View</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                      <tr>
                        <td>{{$user->id}}</td>
                        <td><img src="{{$user->avatar}}" style="width:100px;height:100px;"/></td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->gender}}</td>
                        <td>{{$user->birthday}}</td>
                        <td>{{$user->country}}</td>
                        <td>{{$user->activated==1?"<span class='label label-info'>Yes</label>":"<span class='label label-danger'>No</label>"}}</td>
                        <td><a {{$user->activated==1?"disabled":""}} href="/admin/users/activate/{{$user->id}}" class="btn btn-primary btn-sm">Activate</a></td>
                        <td><a href="/admin/users/view/{{$user->id}}" class="btn btn-success btn-sm">View</a></td>
                        <td><a href="/admin/users/delete/{{$user->id}}" class="btn btn-danger btn-sm">Delete</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>



                </div>
                 <div class="table-footer">
                              <div class="table-actions">

                              </div>
                             {{ $users->links(); }}
                            </div>

</div>



@stop