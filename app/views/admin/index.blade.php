@extends('customer.layouts.master')

@section('content')
<!-- Page header -->
<div class="page-header">
	<div class="page-title">
		<h3>Dashboard <small>Welcome {{Auth::user()->name}}.</small></h3>
	</div>
</div>

@include('customer.layouts.notify')

<!-- /page header -->
<!-- Breadcrumbs line -->
<div class="breadcrumb-line">
	<ul class="breadcrumb">
		<li>
			<a href="/customer">Home</a>
		</li>
		<li class="active">
			Dashboard
		</li>
	</ul>
</div>
<!-- /breadcrumbs line -->

<!-- Default info blocks -->
<ul class="info-blocks">
	<li class="bg-primary">
		<div class="top-info">
			<a href="#">Add new post</a><small>post management</small>
		</div>
		<a href="#"><i class="icon-pencil"></i></a><span class="bottom-info bg-danger">12 drafts in progress</span>
	</li>
	<li class="bg-success">
		<div class="top-info">
			<a href="#">Site parameters</a><small>layout settings</small>
		</div>
		<a href="#"><i class="icon-cogs"></i></a><span class="bottom-info bg-primary">No updates</span>
	</li>
	<li class="bg-danger">
		<div class="top-info">
			<a href="#">Site statistics</a><small>visits, users, orders stats</small>
		</div>
		<a href="#"><i class="icon-stats2"></i></a><span class="bottom-info bg-primary">3 new updates</span>
	</li>
	<li class="bg-info">
		<div class="top-info">
			<a href="#">My messages</a><small>messages history</small>
		</div>
		<a href="#"><i class="icon-bubbles3"></i></a><span class="bottom-info bg-primary">24 new messages</span>
	</li>
	<li class="bg-warning">
		<div class="top-info">
			<a href="#">Orders history</a><small>purchases statistics</small>
		</div>
		<a href="#"><i class="icon-cart2"></i></a><span class="bottom-info bg-primary">17 new orders</span>
	</li>
	<li class="bg-primary">
		<div class="top-info">
			<a href="#">Invoices stats</a><small>invoices archive</small>
		</div>
		<a href="#"><i class="icon-coin"></i></a><span class="bottom-info bg-danger">9 new invoices</span>
	</li>
</ul>
<!-- /default info blocks -->
<div class="row">
	<div class="col-md-12">
		<div class="col-md-6">
			<div class="tabbable page-tabs">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#notifications" data-toggle="tab"><i class="icon-file"></i> Notifications <span class="label label-success">{{sizeof($notifications)}}</span></a>
					</li>
					<li>
						<a href="#archived" data-toggle="tab"><i class="icon-accessibility"></i> Archived <span class="label label-primary">{{sizeof($archived_notifications)}}</span></a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active fade in" id="notifications">
						<!-- Recent activity -->
						<div class="block">
							@foreach($notifications as $notification)
							<div class="media">
								<a class="pull-left"> @if($notification->type=="OFFER_WALL") <img class="media-object" src="" alt=""> @endif </a>
								<div class="media-body">
									{{$notification->message}}
								</div>
							</div>
							<div class="panel-footer">
								<div class="pull-left">
									<ul class="footer-links-group">
										<li>
											<i class="icon-plus-circle muted"></i> Added on: <a class="text-semibold">{{Cashout\Helpers\Utils::prettyDate($notification->created_at,true)}}</a>
										</li>
										<li>
											<a href="/customer/notifications/archive/{{$notification->id}}"><i class="icon-archive"></i> Archive</a>
										</li>
									</ul>
								</div>
							</div>
							@endforeach
						</div>
						<!-- /recent activity -->
					</div>
					<div class="tab-pane" id="archived">
						<!-- Recent activity -->
						<div class="block">
							<ul class="media-list">
								@foreach($archived_notifications as $notification)
								<div class="media">
									<a class="pull-left"> @if($notification->type=="OFFER_WALL") <img class="media-object" src="" alt=""> @endif </a>
									<div class="media-body">
										{{$notification->message}}
									</div>
								</div>
								@endforeach
							</ul>
						</div>
						<!-- /recent activity -->
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="tabbable page-tabs">
				<ul class="nav nav-tabs">
					<li class="active">
						<a href="#news" data-toggle="tab"><i class="icon-file"></i> News</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active fade in" id="news">
						<!-- Recent activity -->
						<div class="block">
							<ul class="media-list">
								<li class="media">
								<!--
									<a class="pull-left" href="#"><img class="media-object" src="images/demo/users/face25.png" alt=""></a>
								-->
								    @foreach($news as $news_item)
									<div class="media-body">
										<div class="clearfix">
											<a href="/news/{{$news_item->slug}}" class="media-heading">{{$news_item->title}}</a><span class="media-notice">{{Cashout\Helpers\Utils::prettyDate($news_item->created_at,true)}}</span>
										</div>
										{{Str::limit(trim(strip_tags($news_item->description)),300)}}
									</div>
									@endforeach
								</li>
							</ul>
						</div>
						<!-- /recent activity -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop