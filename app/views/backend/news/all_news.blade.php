@extends('backend.layouts.master')

@section('content')
<!-- Page header -->
<div class="page-header">
	<div class="page-title">
		<h3>News </h3>
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
			News
		</li>
	</ul>
</div>
<!-- /breadcrumbs line -->

<div class="panel panel-default">
	<div class="panel-heading">
		<h6 class="panel-title"><i class="icon-user4"></i> News</h6>
		<div class="table-controls pull-right">
			<a href="/referral/new" class="btn btn-default btn-icon btn-xs tip" title="" data-original-title="Add News"><i class="icon-plus"></i></a>
		</div>
	</div>
	<div class="table-responsive">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($news as $news_item)
                      <tr>
                        <td>{{$news_item->id}}</td>
                        <td>{{$news_item->title}}</td>
                        <td>{{Str::limit(trim(strip_tags($news_item->description)),300)}}</td>
                        <td>{{$news_item->status==1?"Active":"Inactive"}}</td>
                        <td><a href="/news/{{$news_item->slug}}" class="btn btn-primary">View</a></td>
                        <td><a href="/admin/news/update/{{$news_item->id}}" class="btn btn-success">Edit</a></td>
                        <td><a href="/admin/news/delete/{{$news_item->id}}" class="btn btn-warning">Delete</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>



                </div>
                 <div class="table-footer">
                              <div class="table-actions">

                              </div>
                             {{ $news->links(); }}
                            </div>

</div>



@stop