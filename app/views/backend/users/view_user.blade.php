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

<div class="row">
	<div class="col-lg-2">
		<!-- Profile links -->
		<div class="block">
			<div class="block">
				<div class="thumbnail">
					<div class="thumb"><img alt="" src="{{$profile->avatar}}">
					</div>
					<div class="caption text-center">
						<label>Coins : 100</label>
						<label>Cash : 200</label>
					</div>
				</div>
			</div>

		</div>
		<!-- /profile links -->
	</div>

	<div class="col-lg-10">
		<!-- Page tabs -->
		<div class="tabbable page-tabs">
			<ul class="nav nav-pills nav-justified">
				<li class="active">
					<a href="#activity" data-toggle="tab"><i class="icon-paragraph-justify2"></i> Activity</a>
				</li>
				<li>
					<a href="#stats" data-toggle="tab"><i class="icon-stats2"></i> Reports <i class="icon-spinner7 spin pull-right"></i></a>
				</li>
				<li>
					<a href="#profile-messages" data-toggle="tab"><i class="icon-bubbles3"></i> Messages <span class="label label-danger">12</span></a>
				</li>
				<li>
					<a href="#tasks" data-toggle="tab"><i class="icon-settings"></i> Tasks <span class="label label-danger">7</span></a>
				</li>
				<li>
					<a href="#settings" data-toggle="tab"><i class="icon-cogs"></i> Settings</a>
				</li>
			</ul>
			<div class="tab-content">
				<!-- First tab -->
				<div class="tab-pane active fade in" id="activity">
					<!-- Statistics -->
					<div class="block">
						<ul class="statistics list-justified">
							<li>
								<div class="statistics-info">
									<a href="#" title="" class="bg-success"><i class="icon-user-plus"></i></a><strong>12,476</strong>
								</div>
								<div class="progress progress-micro">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
										<span class="sr-only">60% Complete</span>
									</div>
								</div>
								<span>User registrations</span>
							</li>
							<li>
								<div class="statistics-info">
									<a href="#" title="" class="bg-warning"><i class="icon-point-up"></i></a><strong>621,873</strong>
								</div>
								<div class="progress progress-micro">
									<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
										<span class="sr-only">20% Complete</span>
									</div>
								</div>
								<span>Total clicks</span>
							</li>
							<li>
								<div class="statistics-info">
									<a href="#" title="" class="bg-info"><i class="icon-cart-plus"></i></a><strong>562</strong>
								</div>
								<div class="progress progress-micro">
									<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
										<span class="sr-only">90% Complete</span>
									</div>
								</div>
								<span>New orders</span>
							</li>
							<li>
								<div class="statistics-info">
									<a href="#" title="" class="bg-danger"><i class="icon-coin"></i></a><strong>$45,360</strong>
								</div>
								<div class="progress progress-micro">
									<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
										<span class="sr-only">70% Complete</span>
									</div>
								</div>
								<span>General balance</span>
							</li>
							<li>
								<div class="statistics-info">
									<a href="#" title="" class="bg-primary"><i class="icon-people"></i></a><strong>562K+</strong>
								</div>
								<div class="progress progress-micro">
									<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
										<span class="sr-only">50% Complete</span>
									</div>
								</div>
								<span>Total users</span>
							</li>
							<li>
								<div class="statistics-info">
									<a href="#" title="" class="bg-info"><i class="icon-facebook"></i></a><strong>36,290</strong>
								</div>
								<div class="progress progress-micro">
									<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="93" aria-valuemin="0" aria-valuemax="100" style="width: 93%;">
										<span class="sr-only">93% Complete</span>
									</div>
								</div>
								<span>Facebook fans</span>
							</li>
						</ul>
					</div>
					<!-- /statistics -->

					<!-- Contacts (list) -->
					<div class="block">
						<h6><i class="icon-paragraph-justify2"></i> Online contacts</h6>
						<ul class="message-list">
							<li class="message-list-header">
								Up Referrals
							</li>
							<li>
								<div class="clearfix">
									<div class="chat-member">
										<a href="#"><img src="images/demo/users/face1.png" alt=""></a>
										<h6>Eugene Kopyov <span class="status status-success"></span><small>&nbsp; /&nbsp; Wed developer</small></h6>
									</div>
									<div class="chat-actions">
										<a class="btn btn-link btn-icon btn-xs" data-toggle="collapse" href="#eugene_kopyov"><i class="icon-bubble3"></i></a><a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-phone2"></i></a><a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-camera5"></i></a>
									</div>
								</div>
							</li>
							<li class="message-list-header">
								Up Referrals
							</li>
							<li>
								<div class="clearfix">
									<div class="chat-member">
										<a href="#"><img src="images/demo/users/face2.png" alt=""></a>
										<h6>Duncan McMart <span class="status status-default"></span><small>&nbsp; /&nbsp; Wed designer</small></h6>
									</div>
									<div class="chat-actions">
										<a class="btn btn-link btn-icon btn-xs" data-toggle="collapse" href="#duncan_mcmart"><i class="icon-bubble3"></i></a><a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-phone2"></i></a><a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-camera5"></i></a>
									</div>
								</div>
							</li>
						</ul>
					</div>
					<!-- contacts (list) -->

					<!-- Recent activity -->
					<div class="block">
						<h6 class="heading-hr"><i class="icon-people"></i> Recent activity</h6>
						<ul class="media-list">
							<li class="media">
								<a class="pull-left" href="#"><img class="media-object" src="images/demo/users/face25.png" alt=""></a>
								<div class="media-body">
									<div class="clearfix">
										<a href="#" class="media-heading">Eugene Kopyov</a><span class="media-notice">December 10, 2013 / 10:20 pm</span>
									</div>
									Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
								</div>
							</li>
						</ul>
					</div>
					<!-- /recent activity -->

				</div>
				<!-- /first tab -->

				<!-- Second tab -->
				<div class="tab-pane fade" id="stats">
					<!-- Stats graphs -->
					<h6><i class="icon-bars"></i> Profile Analytics</h6>

					<!--Graphs showing . .. Coins & Cash earned from all times -->
					<!--Graphs showing . .. Referred users activity -->
					<!--Graphs showing . .. Coins & Cash earned from referrals -->
				</div>
				<!-- /second tab -->

				<!-- Third tab -->
				<div class="tab-pane fade" id="profile-messages">
					<div class="chat-member-heading clearfix">
						<h6 class="pull-left"><i class="icon-bubbles"></i> Messages</small></h6>
						<div class="pull-right">
							<a href="#" class="btn btn-primary btn-icon btn-xs"><i class="icon-plus-circle"></i></a>
						</div>
					</div>
					<div class="block">
						<ul class="message-list">
							<li>
								<div class="clearfix">
									<div class="chat-member">
										<a href="#"><img src="images/demo/users/face1.png" alt=""></a>
										<h6>Eugene Kopyov <span class="user-online"></span><small>/ &nbsp; Wed developer</small></h6>
									</div>
									<div class="chat-actions">
										<a class="btn btn-link btn-icon btn-xs" data-toggle="collapse" href="#eugene"><i class="icon-bubble3"></i></a><a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-phone2"></i></a><a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-camera5"></i></a>
									</div>
								</div>
								<div class="panel-collapse collapse in" id="eugene">
									<div class="chat">
										<div class="message">
											<a class="message-img" href="#"><img src="images/demo/users/face1.png" alt=""></a>
											<div class="message-body">
												<span class="typing"></span>
											</div>
										</div>
										<div class="message reversed">
											<a class="message-img" href="#"><img src="images/demo/users/face2.png" alt=""></a>
											<div class="message-body">
												Nunc volutpat commodo ullamcorper. Vivamus consequat sapien ac ante pharetra pellentesque. Sed molestie leo vitae erat sagittis, ac posuere nibh faucibus. In nec massa suscipit, sagittis ligula non, accumsan velit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames. <span class="attribution">14:23pm, 4th Dec 2010</span>
											</div>
										</div>
										<div class="moment">
											10 Nov, 2013
										</div>
										<div class="message">
											<a class="message-img" href="#"><img src="images/demo/users/face1.png" alt=""></a>
											<div class="message-body">
												Aenean dictum vitae tortor vitae placerat. Donec tristique urna tellus, porttitor commodo quam facilisis sit amet. Pellentesque ullamcorper metus sed libero imperdiet, id consequat libero malesuada. Aenean mattis, nisl nec sodales adipiscing, nunc mauris volutpat nulla, quis dictum sapien nibh vitae metus. Fusce vehicula aliquam enim, sed viverra ipsum elementum at <span class="attribution">14:23pm, 4th Dec 2010</span>
											</div>
										</div>
										<div class="message reversed">
											<a class="message-img" href="#"><img src="images/demo/users/face2.png" alt=""></a>
											<div class="message-body">
												Nulla venenatis enim et mi egestas blandit. Praesent in consequat eros, et sagittis metus <span class="attribution">14:23pm, 4th Dec 2010</span>
											</div>
										</div>
										<div class="message">
											<a class="message-img" href="#"><img src="images/demo/users/face1.png" alt=""></a>
											<div class="message-body">
												Mauris at tellus viverra, lobortis elit non, luctus dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla in ornare ligula. Sed in pellentesque justo, vitae tristique urna. Vestibulum congue ligula ac posuere pharetra <span class="attribution">14:23pm, 4th Dec 2010</span>
											</div>
										</div>
										<div class="moment">
											12 Nov, 2013
										</div>
										<div class="message reversed">
											<a class="message-img" href="#"><img src="images/demo/users/face2.png" alt=""></a>
											<div class="message-body">
												Pellentesque ut sollicitudin quam, et suscipit lectus. Duis accumsan, purus ac feugiat condimentum, sem risus eleifend mi, vitae sagittis nisi sem nec libero. Nunc mauris tellus, cursus vel faucibus non, accumsan quis risus <span class="attribution">14:23pm, 4th Dec 2010</span>
											</div>
										</div>
										<div class="message">
											<a class="message-img" href="#"><img src="images/demo/users/face1.png" alt=""></a>
											<div class="message-body">
												Morbi lacus nulla, tristique eu hendrerit non, auctor ut arcu. Morbi id ligula mi. Vivamus ultricies lobortis erat sed placerat. Etiam molestie urna pulvinar porta fringilla. Aenean vitae lacinia felis, id laoreet diam <span class="attribution">14:23pm, 4th Dec 2010</span>
											</div>
										</div>
										<div class="message reversed">
											<a class="message-img" href="#"><img src="images/demo/users/face2.png" alt=""></a>
											<div class="message-body">
												Nunc laoreet aliquam enim adipiscing placerat. Donec ac ultricies nisi. Nunc vel varius ante, et luctus elit. In eros urna, dignissim vitae quam eu, facilisis lacinia leo <span class="attribution">14:23pm, 4th Dec 2010</span>
											</div>
										</div>
									</div>
									<textarea name="enter-message" class="form-control" rows="3" cols="1" placeholder="Enter your message..."></textarea>
									<div class="message-controls">
										<span class="pull-left"><i class="icon-checkmark-circle"></i> Some basic <a href="#" title="">HTML</a> is OK</span>
										<div class="pull-right">
											<div class="upload-options">
												<a href="#" title="" class="tip" data-original-title="Smileys"><i class="icon-smiley"></i></a><a href="#" title="" class="tip" data-original-title="Upload photo"><i class="icon-camera3"></i></a><a href="#" title="" class="tip" data-original-title="Attach file"><i class="icon-attachment"></i></a>
											</div>
											<button type="button" class="btn btn-danger btn-loading" data-loading-text="<i class='icon-spinner7 spin'></i> Processing">
												Submit
											</button>
										</div>
									</div>
								</div>
							</li>
							<li>
								<div class="clearfix">
									<div class="chat-member">
										<a href="#"><img src="images/demo/users/face2.png" alt=""></a>
										<h6>Duncan McMart <span class="user-offline"></span><small>/ &nbsp; Wed designer</small></h6>
									</div>
									<div class="chat-actions">
										<a class="btn btn-link btn-icon btn-xs" data-toggle="collapse" href="#duncan"><i class="icon-bubble3"></i></a><a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-phone2"></i></a><a href="#" class="btn btn-link btn-icon btn-xs"><i class="icon-camera5"></i></a>
									</div>
								</div>
								<div class="panel-collapse collapse" id="duncan">
									<div class="chat">
										<div class="message">
											<a class="message-img" href="#"><img src="images/demo/users/face2.png" alt=""></a>
											<div class="message-body">
												<span class="typing"></span>
											</div>
										</div>
										<div class="message reversed">
											<a class="message-img" href="#"><img src="images/demo/users/face3.png" alt=""></a>
											<div class="message-body">
												Nunc volutpat commodo ullamcorper. Vivamus consequat sapien ac ante pharetra pellentesque. Sed molestie leo vitae erat sagittis, ac posuere nibh faucibus. In nec massa suscipit, sagittis ligula non, accumsan velit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames. <span class="attribution">14:23pm, 4th Dec 2010</span>
											</div>
										</div>
										<div class="moment">
											10 Nov, 2013
										</div>
										<div class="message">
											<a class="message-img" href="#"><img src="images/demo/users/face2.png" alt=""></a>
											<div class="message-body">
												Aenean dictum vitae tortor vitae placerat. Donec tristique urna tellus, porttitor commodo quam facilisis sit amet. Pellentesque ullamcorper metus sed libero imperdiet, id consequat libero malesuada. Aenean mattis, nisl nec sodales adipiscing, nunc mauris volutpat nulla, quis dictum sapien nibh vitae metus. Fusce vehicula aliquam enim, sed viverra ipsum elementum at <span class="attribution">14:23pm, 4th Dec 2010</span>
											</div>
										</div>
										<div class="message reversed">
											<a class="message-img" href="#"><img src="images/demo/users/face3.png" alt=""></a>
											<div class="message-body">
												Nulla venenatis enim et mi egestas blandit. Praesent in consequat eros, et sagittis metus <span class="attribution">14:23pm, 4th Dec 2010</span>
											</div>
										</div>
										<div class="message">
											<a class="message-img" href="#"><img src="images/demo/users/face2.png" alt=""></a>
											<div class="message-body">
												Mauris at tellus viverra, lobortis elit non, luctus dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla in ornare ligula. Sed in pellentesque justo, vitae tristique urna. Vestibulum congue ligula ac posuere pharetra <span class="attribution">14:23pm, 4th Dec 2010</span>
											</div>
										</div>
										<div class="moment">
											12 Nov, 2013
										</div>
										<div class="message reversed">
											<a class="message-img" href="#"><img src="images/demo/users/face3.png" alt=""></a>
											<div class="message-body">
												Pellentesque ut sollicitudin quam, et suscipit lectus. Duis accumsan, purus ac feugiat condimentum, sem risus eleifend mi, vitae sagittis nisi sem nec libero. Nunc mauris tellus, cursus vel faucibus non, accumsan quis risus <span class="attribution">14:23pm, 4th Dec 2010</span>
											</div>
										</div>
										<div class="message">
											<a class="message-img" href="#"><img src="images/demo/users/face2.png" alt=""></a>
											<div class="message-body">
												Morbi lacus nulla, tristique eu hendrerit non, auctor ut arcu. Morbi id ligula mi. Vivamus ultricies lobortis erat sed placerat. Etiam molestie urna pulvinar porta fringilla. Aenean vitae lacinia felis, id laoreet diam <span class="attribution">14:23pm, 4th Dec 2010</span>
											</div>
										</div>
										<div class="message reversed">
											<a class="message-img" href="#"><img src="images/demo/users/face3.png" alt=""></a>
											<div class="message-body">
												Nunc laoreet aliquam enim adipiscing placerat. Donec ac ultricies nisi. Nunc vel varius ante, et luctus elit. In eros urna, dignissim vitae quam eu, facilisis lacinia leo <span class="attribution">14:23pm, 4th Dec 2010</span>
											</div>
										</div>
									</div>
									<textarea name="enter-message" class="form-control" rows="3" cols="1" placeholder="Enter your message..."></textarea>
									<div class="message-controls">
										<span class="pull-left"><i class="icon-checkmark-circle"></i> Some basic <a href="#" title="">HTML</a> is OK</span>
										<div class="pull-right">
											<div class="upload-options">
												<a href="#" title="" class="tip" data-original-title="Smileys"><i class="icon-smiley"></i></a><a href="#" title="" class="tip" data-original-title="Upload photo"><i class="icon-camera3"></i></a><a href="#" title="" class="tip" data-original-title="Attach file"><i class="icon-attachment"></i></a>
											</div>
											<button type="button" class="btn btn-danger btn-loading" data-loading-text="<i class='icon-spinner7 spin'></i> Processing">
												Submit
											</button>
										</div>
									</div>
								</div>
							</li>

						</ul>
					</div>
				</div>
				<!-- /third tab -->
				<!-- Fourth tab -->
				<div class="tab-pane fade" id="tasks">
					<!-- Tasks table -->
					<div class="block">
						<h6 class="heading-hr"><i class="icon-settings"></i> Transaction History</h6>
						<div class="datatable-tasks">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Task Description</th>
										<th class="task-priority">Priority</th>
										<th class="task-date-added">Date Added</th>
										<th class="task-progress">Progress</th>
										<th class="task-deadline">Deadline</th>
										<th class="task-tools text-center">Tools</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="task-desc"><a href="task_detailed.html">Donec suscipit ultrices commodo. Suspendisse potenti</a><span>General layout additions</span></td>
										<td class="text-center"><span class="label label-danger">High</span></td>
										<td>September 20, 2013</td>
										<td>
										<div class="progress progress-micro">
											<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
												<span class="sr-only">90% Complete</span>
											</div>
										</div></td>
										<td><i class="icon-clock"></i><strong class="text-danger">14</strong> hours left</td>
										<td class="text-center">
										<div class="btn-group">
											<button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown">
												<i class="icon-cog4"></i>
											</button>
											<ul class="dropdown-menu icons-right dropdown-menu-right">
												<li>
													<a href="#"><i class="icon-quill2"></i> Edit task</a>
												</li>
												<li>
													<a href="#"><i class="icon-share2"></i> Reassign</a>
												</li>
												<li>
													<a href="#"><i class="icon-checkmark3"></i> Complete</a>
												</li>
												<li>
													<a href="#"><i class="icon-stack"></i> Archive</a>
												</li>
											</ul>
										</div></td>
									</tr>
									<tr>
										<td class="task-desc"><a href="task_detailed.html">Donec sagittis sit amet felis non semper</a><span>Design &amp; UI concepts</span></td>
										<td class="text-center"><span class="label label-danger">High</span></td>
										<td>September 18, 2013</td>
										<td>
										<div class="progress progress-micro">
											<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
												<span class="sr-only">40% Complete</span>
											</div>
										</div></td>
										<td><i class="icon-clock"></i><strong class="text-danger">2</strong> days left</td>
										<td class="text-center">
										<div class="btn-group">
											<button type="button" class="btn btn-icon btn-success dropdown-toggle" data-toggle="dropdown">
												<i class="icon-cog4"></i>
											</button>
											<ul class="dropdown-menu icons-right dropdown-menu-right">
												<li>
													<a href="#"><i class="icon-quill2"></i> Edit task</a>
												</li>
												<li>
													<a href="#"><i class="icon-share2"></i> Reassign</a>
												</li>
												<li>
													<a href="#"><i class="icon-checkmark3"></i> Complete</a>
												</li>
												<li>
													<a href="#"><i class="icon-stack"></i> Archive</a>
												</li>
											</ul>
										</div></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<!-- /tasks table -->
				</div>
				<!-- /fourth tab -->
				<!-- Fifth tab -->
				<div class="tab-pane fade" id="settings">
					<!-- Profile information -->

					{{Form::open(['url'=>'/admin/users/update/'.$profile->id,'method'=>'post','files'=>true,'class'=>'block','role'=>'form'])}}
					<h6 class="heading-hr"><i class="icon-user"></i> Profile information:</h6>
					<div class="block-inner">
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<label>Name</label>
									<input type="text" name="name" value="{{$profile->name}}" class="form-control">
								</div>
								<div class="col-md-6">
									<label>Email</label>
									<input readonly="readonly" type="text" value="{{$profile->email}}" class="form-control">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<label>Bio</label>
									<textarea type="text" name="bio" class="form-control">{{$profile->bio}}</textarea>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="row">

								<div class="col-md-6">
									<label>Gender:</label><p></p>
									<input name="gender" type="radio"/>
									Male
									<input name="gender" type="radio"/>
									Female
								</div>

								<div class="col-md-6">
									<label>Country:</label>
									<select data-placeholder="Choose a Country..." name="country" class="select-full" tabindex="2">
										<option value=""></option>
										<option {{Input::old('country',$profile->country)=="Afghanistan"?"selected":""}} value="Afghanistan">Afghanistan</option>
										<option {{Input::old('country',$profile->country)=="Albania"?"selected":""}} value="Albania">Albania</option>
										<option {{Input::old('country',$profile->country)=="Algeria"?"selected":""}} value="Algeria">Algeria</option>
										<option {{Input::old('country',$profile->country)=="American Samoa"?"selected":""}} value="American Samoa">American Samoa</option>
										<option {{Input::old('country',$profile->country)=="Andorra"?"selected":""}} value="Andorra">Andorra</option>
										<option {{Input::old('country',$profile->country)=="Angola"?"selected":""}} value="Angola">Angola</option>
										<option {{Input::old('country',$profile->country)=="Anguilla"?"selected":""}} value="Anguilla">Anguilla</option>
										<option {{Input::old('country',$profile->country)=="Antigua & Barbuda"?"selected":""}} value="Antigua & Barbuda">Antigua &amp; Barbuda</option>
										<option {{Input::old('country',$profile->country)=="Argentina"?"selected":""}} value="Argentina">Argentina</option>
										<option {{Input::old('country',$profile->country)=="Armenia"?"selected":""}} value="Armenia">Armenia</option>
										<option {{Input::old('country',$profile->country)=="Aruba"?"selected":""}} value="Aruba">Aruba</option>
										<option {{Input::old('country',$profile->country)=="Australia"?"selected":""}} value="Australia">Australia</option>
										<option {{Input::old('country',$profile->country)=="Austria"?"selected":""}} value="Austria">Austria</option>
										<option {{Input::old('country',$profile->country)=="Azerbaijan"?"selected":""}} value="Azerbaijan">Azerbaijan</option>
										<option {{Input::old('country',$profile->country)=="Bahamas"?"selected":""}} value="Bahamas">Bahamas</option>
										<option {{Input::old('country',$profile->country)=="Bahrain"?"selected":""}} value="Bahrain">Bahrain</option>
										<option {{Input::old('country',$profile->country)=="Bangladesh"?"selected":""}} value="Bangladesh">Bangladesh</option>
										<option {{Input::old('country',$profile->country)=="Barbados"?"selected":""}} value="Barbados">Barbados</option>
										<option {{Input::old('country',$profile->country)=="Belarus"?"selected":""}} value="Belarus">Belarus</option>
										<option {{Input::old('country',$profile->country)=="Belgium"?"selected":""}} value="Belgium">Belgium</option>
										<option {{Input::old('country',$profile->country)=="Belize"?"selected":""}} value="Belize">Belize</option>
										<option {{Input::old('country',$profile->country)=="Benin"?"selected":""}} value="Benin">Benin</option>
										<option {{Input::old('country',$profile->country)=="Bermuda"?"selected":""}} value="Bermuda">Bermuda</option>
										<option {{Input::old('country',$profile->country)=="Bhutan"?"selected":""}} value="Bhutan">Bhutan</option>
										<option {{Input::old('country',$profile->country)=="Bolivia"?"selected":""}} value="Bolivia">Bolivia</option>
										<option {{Input::old('country',$profile->country)=="Bonaire"?"selected":""}} value="Bonaire">Bonaire</option>
										<option {{Input::old('country',$profile->country)=="Bosnia & Herzegovina"?"selected":""}} value="Bosnia & Herzegovina">Bosnia &amp; Herzegovina</option>
										<option {{Input::old('country',$profile->country)=="Botswana"?"selected":""}} value="Botswana">Botswana</option>
										<option {{Input::old('country',$profile->country)=="Brazil"?"selected":""}} value="Brazil">Brazil</option>
										<option {{Input::old('country',$profile->country)=="British Indian Ocean Territory"?"selected":""}} value="British Indian Ocean Territory">British Indian Ocean Territory</option>
										<option {{Input::old('country',$profile->country)=="Brunei"?"selected":""}} value="Brunei">Brunei</option>
										<option {{Input::old('country',$profile->country)=="Bulgaria"?"selected":""}} value="Bulgaria">Bulgaria</option>
										<option {{Input::old('country',$profile->country)=="Burkina Faso"?"selected":""}} value="Burkina Faso">Burkina Faso</option>
										<option {{Input::old('country',$profile->country)=="Burundi"?"selected":""}} value="Burundi">Burundi</option>
										<option {{Input::old('country',$profile->country)=="Cambodia"?"selected":""}} value="Cambodia">Cambodia</option>
										<option {{Input::old('country',$profile->country)=="Cameroon"?"selected":""}} value="Cameroon">Cameroon</option>
										<option {{Input::old('country',$profile->country)=="Canada"?"selected":""}} value="Canada">Canada</option>
										<option {{Input::old('country',$profile->country)=="Canary Islands"?"selected":""}} value="Canary Islands">Canary Islands</option>
										<option {{Input::old('country',$profile->country)=="Cape Verde"?"selected":""}} value="Cape Verde">Cape Verde</option>
										<option {{Input::old('country',$profile->country)=="Cayman Islands"?"selected":""}} value="Cayman Islands">Cayman Islands</option>
										<option {{Input::old('country',$profile->country)=="Central African Republic"?"selected":""}} value="Central African Republic">Central African Republic</option>
										<option {{Input::old('country',$profile->country)=="Chad"?"selected":""}} value="Chad">Chad</option>
										<option {{Input::old('country',$profile->country)=="Channel Islands"?"selected":""}} value="Channel Islands">Channel Islands</option>
										<option {{Input::old('country',$profile->country)=="Chile"?"selected":""}} value="Chile">Chile</option>
										<option {{Input::old('country',$profile->country)=="China"?"selected":""}} value="China">China</option>
										<option {{Input::old('country',$profile->country)=="Christmas Island"?"selected":""}} value="Christmas Island">Christmas Island</option>
										<option {{Input::old('country',$profile->country)=="Cocos Island"?"selected":""}} value="Cocos Island">Cocos Island</option>
										<option {{Input::old('country',$profile->country)=="Colombia"?"selected":""}} value="Colombia">Colombia</option>
										<option {{Input::old('country',$profile->country)=="Comoros"?"selected":""}} value="Comoros">Comoros</option>
										<option {{Input::old('country',$profile->country)=="Congo"?"selected":""}} value="Congo">Congo</option>
										<option {{Input::old('country',$profile->country)=="Cook Islands"?"selected":""}} value="Cook Islands">Cook Islands</option>
										<option {{Input::old('country',$profile->country)=="Costa Rica"?"selected":""}} value="Costa Rica">Costa Rica</option>
										<option {{Input::old('country',$profile->country)=="Cote D'Ivoire"?"selected":""}} value="Cote D'Ivoire">Cote D'Ivoire</option>
										<option {{Input::old('country',$profile->country)=="Croatia"?"selected":""}} value="Croatia">Croatia</option>
										<option {{Input::old('country',$profile->country)=="Cuba"?"selected":""}} value="Cuba">Cuba</option>
										<option {{Input::old('country',$profile->country)=="Curacao"?"selected":""}} value="Curacao">Curacao</option>
										<option {{Input::old('country',$profile->country)=="Cyprus"?"selected":""}} value="Cyprus">Cyprus</option>
										<option {{Input::old('country',$profile->country)=="Czech Republic"?"selected":""}} value="Czech Republic">Czech Republic</option>
										<option {{Input::old('country',$profile->country)=="Denmark"?"selected":""}} value="Denmark">Denmark</option>
										<option {{Input::old('country',$profile->country)=="Djibouti"?"selected":""}} value="Djibouti">Djibouti</option>
										<option {{Input::old('country',$profile->country)=="Dominica"?"selected":""}} value="Dominica">Dominica</option>
										<option {{Input::old('country',$profile->country)=="Dominican Republic"?"selected":""}} value="Dominican Republic">Dominican Republic</option>
										<option {{Input::old('country',$profile->country)=="East Timor"?"selected":""}} value="East Timor">East Timor</option>
										<option {{Input::old('country',$profile->country)=="Ecuador"?"selected":""}} value="Ecuador">Ecuador</option>
										<option {{Input::old('country',$profile->country)=="Egypt"?"selected":""}} value="Egypt">Egypt</option>
										<option {{Input::old('country',$profile->country)=="El Salvador"?"selected":""}} value="El Salvador">El Salvador</option>
										<option {{Input::old('country',$profile->country)=="Equatorial Guinea"?"selected":""}} value="Equatorial Guinea">Equatorial Guinea</option>
										<option {{Input::old('country',$profile->country)=="Eritrea"?"selected":""}} value="Eritrea">Eritrea</option>
										<option {{Input::old('country',$profile->country)=="Estonia"?"selected":""}} value="Estonia">Estonia</option>
										<option {{Input::old('country',$profile->country)=="Ethiopia"?"selected":""}} value="Ethiopia">Ethiopia</option>
										<option {{Input::old('country',$profile->country)=="Falkland Islands"?"selected":""}} value="Falkland Islands">Falkland Islands</option>
										<option {{Input::old('country',$profile->country)=="Faroe Islands"?"selected":""}} value="Faroe Islands">Faroe Islands</option>
										<option {{Input::old('country',$profile->country)=="Fiji"?"selected":""}} value="Fiji">Fiji</option>
										<option {{Input::old('country',$profile->country)=="Finland"?"selected":""}} value="Finland">Finland</option>
										<option {{Input::old('country',$profile->country)=="France"?"selected":""}} value="France">France</option>
										<option {{Input::old('country',$profile->country)=="French Guiana"?"selected":""}} value="French Guiana">French Guiana</option>
										<option {{Input::old('country',$profile->country)=="French Polynesia"?"selected":""}} value="French Polynesia">French Polynesia</option>
										<option {{Input::old('country',$profile->country)=="French Southern Ter"?"selected":""}} value="French Southern Ter">French Southern Ter</option>
										<option {{Input::old('country',$profile->country)=="Gabon"?"selected":""}} value="Gabon">Gabon</option>
										<option {{Input::old('country',$profile->country)=="Gambia"?"selected":""}} value="Gambia">Gambia</option>
										<option {{Input::old('country',$profile->country)=="Georgia"?"selected":""}} value="Georgia">Georgia</option>
										<option {{Input::old('country',$profile->country)=="Germany"?"selected":""}} value="Germany">Germany</option>
										<option {{Input::old('country',$profile->country)=="Ghana"?"selected":""}} value="Ghana">Ghana</option>
										<option {{Input::old('country',$profile->country)=="Gibraltar"?"selected":""}} value="Gibraltar">Gibraltar</option>
										<option {{Input::old('country',$profile->country)=="Great Britain"?"selected":""}} value="Great Britain">Great Britain</option>
										<option {{Input::old('country',$profile->country)=="Greece"?"selected":""}} value="Greece">Greece</option>
										<option {{Input::old('country',$profile->country)=="Greenland"?"selected":""}} value="Greenland">Greenland</option>
										<option {{Input::old('country',$profile->country)=="Grenada"?"selected":""}} value="Grenada">Grenada</option>
										<option {{Input::old('country',$profile->country)=="Guadeloupe"?"selected":""}} value="Guadeloupe">Guadeloupe</option>
										<option {{Input::old('country',$profile->country)=="Guam"?"selected":""}} value="Guam">Guam</option>
										<option {{Input::old('country',$profile->country)=="Guatemala"?"selected":""}} value="Guatemala">Guatemala</option>
										<option {{Input::old('country',$profile->country)=="Guinea"?"selected":""}} value="Guinea">Guinea</option>
										<option {{Input::old('country',$profile->country)=="Guyana"?"selected":""}} value="Guyana">Guyana</option>
										<option {{Input::old('country',$profile->country)=="Haiti"?"selected":""}} value="Haiti">Haiti</option>
										<option {{Input::old('country',$profile->country)=="Hawaii"?"selected":""}} value="Hawaii">Hawaii</option>
										<option {{Input::old('country',$profile->country)=="Honduras"?"selected":""}} value="Honduras">Honduras</option>
										<option {{Input::old('country',$profile->country)=="Hong Kong"?"selected":""}} value="Hong Kong">Hong Kong</option>
										<option {{Input::old('country',$profile->country)=="Hungary"?"selected":""}} value="Hungary">Hungary</option>
										<option {{Input::old('country',$profile->country)=="Iceland"?"selected":""}} value="Iceland">Iceland</option>
										<option {{Input::old('country',$profile->country)=="India"?"selected":""}} value="India">India</option>
										<option {{Input::old('country',$profile->country)=="Indonesia"?"selected":""}} value="Indonesia">Indonesia</option>
										<option {{Input::old('country',$profile->country)=="Iran"?"selected":""}} value="Iran">Iran</option>
										<option {{Input::old('country',$profile->country)=="Iraq"?"selected":""}} value="Iraq">Iraq</option>
										<option {{Input::old('country',$profile->country)=="Ireland"?"selected":""}} value="Ireland">Ireland</option>
										<option {{Input::old('country',$profile->country)=="Isle of Man"?"selected":""}} value="Isle of Man">Isle of Man</option>
										<option {{Input::old('country',$profile->country)=="Israel"?"selected":""}} value="Israel">Israel</option>
										<option {{Input::old('country',$profile->country)=="Italy"?"selected":""}} value="Italy">Italy</option>
										<option {{Input::old('country',$profile->country)=="Jamaica"?"selected":""}} value="Jamaica">Jamaica</option>
										<option {{Input::old('country',$profile->country)=="Japan"?"selected":""}} value="Japan">Japan</option>
										<option {{Input::old('country',$profile->country)=="Jordan"?"selected":""}} value="Jordan">Jordan</option>
										<option {{Input::old('country',$profile->country)=="Kazakhstan"?"selected":""}} value="Kazakhstan">Kazakhstan</option>
										<option {{Input::old('country',$profile->country)=="Kenya"?"selected":""}} value="Kenya">Kenya</option>
										<option {{Input::old('country',$profile->country)=="Kiribati"?"selected":""}} value="Kiribati">Kiribati</option>
										<option {{Input::old('country',$profile->country)=="Korea North"?"selected":""}} value="Korea North">Korea North</option>
										<option {{Input::old('country',$profile->country)=="Korea South"?"selected":""}} value="Korea South">Korea South</option>
										<option {{Input::old('country',$profile->country)=="Kuwait"?"selected":""}} value="Kuwait">Kuwait</option>
										<option {{Input::old('country',$profile->country)=="Kyrgyzstan"?"selected":""}} value="Kyrgyzstan">Kyrgyzstan</option>
										<option {{Input::old('country',$profile->country)=="Laos"?"selected":""}} value="Laos">Laos</option>
										<option {{Input::old('country',$profile->country)=="Latvia"?"selected":""}} value="Latvia">Latvia</option>
										<option {{Input::old('country',$profile->country)=="Lebanon"?"selected":""}} value="Lebanon">Lebanon</option>
										<option {{Input::old('country',$profile->country)=="Lesotho"?"selected":""}} value="Lesotho">Lesotho</option>
										<option {{Input::old('country',$profile->country)=="Liberia"?"selected":""}} value="Liberia">Liberia</option>
										<option {{Input::old('country',$profile->country)=="Libya"?"selected":""}} value="Libya">Libya</option>
										<option {{Input::old('country',$profile->country)=="Liechtenstein"?"selected":""}} value="Liechtenstein">Liechtenstein</option>
										<option {{Input::old('country',$profile->country)=="Lithuania"?"selected":""}} value="Lithuania">Lithuania</option>
										<option {{Input::old('country',$profile->country)=="Luxembourg"?"selected":""}} value="Luxembourg">Luxembourg</option>
										<option {{Input::old('country',$profile->country)=="Macau"?"selected":""}} value="Macau">Macau</option>
										<option {{Input::old('country',$profile->country)=="Macedonia"?"selected":""}} value="Macedonia">Macedonia</option>
										<option {{Input::old('country',$profile->country)=="Madagascar"?"selected":""}} value="Madagascar">Madagascar</option>
										<option {{Input::old('country',$profile->country)=="Malaysia"?"selected":""}} value="Malaysia">Malaysia</option>
										<option {{Input::old('country',$profile->country)=="Malawi"?"selected":""}} value="Malawi">Malawi</option>
										<option {{Input::old('country',$profile->country)=="Maldives"?"selected":""}} value="Maldives">Maldives</option>
										<option {{Input::old('country',$profile->country)=="Mali"?"selected":""}} value="Mali">Mali</option>
										<option {{Input::old('country',$profile->country)=="Malta"?"selected":""}} value="Malta">Malta</option>
										<option {{Input::old('country',$profile->country)=="Marshall Islands"?"selected":""}} value="Marshall Islands">Marshall Islands</option>
										<option {{Input::old('country',$profile->country)=="Martinique"?"selected":""}} value="Martinique">Martinique</option>
										<option {{Input::old('country',$profile->country)=="Mauritania"?"selected":""}} value="Mauritania">Mauritania</option>
										<option {{Input::old('country',$profile->country)=="Mauritius"?"selected":""}} value="Mauritius">Mauritius</option>
										<option {{Input::old('country',$profile->country)=="Mayotte"?"selected":""}} value="Mayotte">Mayotte</option>
										<option {{Input::old('country',$profile->country)=="Mexico"?"selected":""}} value="Mexico">Mexico</option>
										<option {{Input::old('country',$profile->country)=="Midway Islands"?"selected":""}} value="Midway Islands">Midway Islands</option>
										<option {{Input::old('country',$profile->country)=="Moldova"?"selected":""}} value="Moldova">Moldova</option>
										<option {{Input::old('country',$profile->country)=="Monaco"?"selected":""}} value="Monaco">Monaco</option>
										<option {{Input::old('country',$profile->country)=="Mongolia"?"selected":""}} value="Mongolia">Mongolia</option>
										<option {{Input::old('country',$profile->country)=="Montserrat"?"selected":""}} value="Montserrat">Montserrat</option>
										<option {{Input::old('country',$profile->country)=="Morocco"?"selected":""}} value="Morocco">Morocco</option>
										<option {{Input::old('country',$profile->country)=="Mozambique"?"selected":""}} value="Mozambique">Mozambique</option>
										<option {{Input::old('country',$profile->country)=="Myanmar"?"selected":""}} value="Myanmar">Myanmar</option>
										<option {{Input::old('country',$profile->country)=="Nambia"?"selected":""}} value="Nambia">Nambia</option>
										<option {{Input::old('country',$profile->country)=="Nauru"?"selected":""}} value="Nauru">Nauru</option>
										<option {{Input::old('country',$profile->country)=="Nepal"?"selected":""}} value="Nepal">Nepal</option>
										<option {{Input::old('country',$profile->country)=="Netherland Antilles"?"selected":""}} value="Netherland Antilles">Netherland Antilles</option>
										<option {{Input::old('country',$profile->country)=="Netherlands (Holland, Europe)"?"selected":""}} value="Netherlands (Holland, Europe)">Netherlands (Holland, Europe)</option>
										<option {{Input::old('country',$profile->country)=="Nevis"?"selected":""}} value="Nevis">Nevis</option>
										<option {{Input::old('country',$profile->country)=="New Caledonia"?"selected":""}} value="New Caledonia">New Caledonia</option>
										<option {{Input::old('country',$profile->country)=="New Zealand"?"selected":""}} value="New Zealand">New Zealand</option>
										<option {{Input::old('country',$profile->country)=="Nicaragua"?"selected":""}} value="Nicaragua">Nicaragua</option>
										<option {{Input::old('country',$profile->country)=="Niger"?"selected":""}} value="Niger">Niger</option>
										<option {{Input::old('country',$profile->country)=="Nigeria"?"selected":""}} value="Nigeria">Nigeria</option>
										<option {{Input::old('country',$profile->country)=="Niue"?"selected":""}} value="Niue">Niue</option>
										<option {{Input::old('country',$profile->country)=="Norfolk Island"?"selected":""}} value="Norfolk Island">Norfolk Island</option>
										<option {{Input::old('country',$profile->country)=="Norway"?"selected":""}} value="Norway">Norway</option>
										<option {{Input::old('country',$profile->country)=="Oman"?"selected":""}} value="Oman">Oman</option>
										<option {{Input::old('country',$profile->country)=="Pakistan"?"selected":""}} value="Pakistan">Pakistan</option>
										<option {{Input::old('country',$profile->country)=="Palau Island"?"selected":""}} value="Palau Island">Palau Island</option>
										<option {{Input::old('country',$profile->country)=="Palestine"?"selected":""}} value="Palestine">Palestine</option>
										<option {{Input::old('country',$profile->country)=="Panama"?"selected":""}} value="Panama">Panama</option>
										<option {{Input::old('country',$profile->country)=="Papua New Guinea"?"selected":""}} value="Papua New Guinea">Papua New Guinea</option>
										<option {{Input::old('country',$profile->country)=="Paraguay"?"selected":""}} value="Paraguay">Paraguay</option>
										<option {{Input::old('country',$profile->country)=="Peru"?"selected":""}} value="Peru">Peru</option>
										<option {{Input::old('country',$profile->country)=="Philippines"?"selected":""}} value="Philippines">Philippines</option>
										<option {{Input::old('country',$profile->country)=="Pitcairn Island"?"selected":""}} value="Pitcairn Island">Pitcairn Island</option>
										<option {{Input::old('country',$profile->country)=="Poland"?"selected":""}} value="Poland">Poland</option>
										<option {{Input::old('country',$profile->country)=="Portugal"?"selected":""}} value="Portugal">Portugal</option>
										<option {{Input::old('country',$profile->country)=="Puerto Rico"?"selected":""}} value="Puerto Rico">Puerto Rico</option>
										<option {{Input::old('country',$profile->country)=="Qatar"?"selected":""}} value="Qatar">Qatar</option>
										<option {{Input::old('country',$profile->country)=="Republic of Montenegro"?"selected":""}} value="Republic of Montenegro">Republic of Montenegro</option>
										<option {{Input::old('country',$profile->country)=="Republic of Serbia"?"selected":""}} value="Republic of Serbia">Republic of Serbia</option>
										<option {{Input::old('country',$profile->country)=="Reunion"?"selected":""}} value="Reunion">Reunion</option>
										<option {{Input::old('country',$profile->country)=="Romania"?"selected":""}} value="Romania">Romania</option>
										<option {{Input::old('country',$profile->country)=="Russia"?"selected":""}} value="Russia">Russia</option>
										<option {{Input::old('country',$profile->country)=="Rwanda"?"selected":""}} value="Rwanda">Rwanda</option>
										<option {{Input::old('country',$profile->country)=="St Barthelemy"?"selected":""}} value="St Barthelemy">St Barthelemy</option>
										<option {{Input::old('country',$profile->country)=="St Eustatius"?"selected":""}} value="St Eustatius">St Eustatius</option>
										<option {{Input::old('country',$profile->country)=="St Helena"?"selected":""}} value="St Helena">St Helena</option>
										<option {{Input::old('country',$profile->country)=="St Kitts-Nevis"?"selected":""}} value="St Kitts-Nevis">St Kitts-Nevis</option>
										<option {{Input::old('country',$profile->country)=="St Lucia"?"selected":""}} value="St Lucia">St Lucia</option>
										<option {{Input::old('country',$profile->country)=="St Maarten"?"selected":""}} value="St Maarten">St Maarten</option>
										<option {{Input::old('country',$profile->country)=="St Pierre & Miquelon"?"selected":""}} value="St Pierre & Miquelon">St Pierre &amp; Miquelon</option>
										<option {{Input::old('country',$profile->country)=="St Vincent & Grenadines"?"selected":""}} value="St Vincent & Grenadines">St Vincent &amp; Grenadines</option>
										<option {{Input::old('country',$profile->country)=="Saipan"?"selected":""}} value="Saipan">Saipan</option>
										<option {{Input::old('country',$profile->country)=="Samoa"?"selected":""}} value="Samoa">Samoa</option>
										<option {{Input::old('country',$profile->country)=="Samoa American"?"selected":""}} value="Samoa American">Samoa American</option>
										<option {{Input::old('country',$profile->country)=="San Marino"?"selected":""}} value="San Marino">San Marino</option>
										<option {{Input::old('country',$profile->country)=="Sao Tome & Principe"?"selected":""}} value="Sao Tome & Principe">Sao Tome &amp; Principe</option>
										<option {{Input::old('country',$profile->country)=="Saudi Arabia"?"selected":""}} value="Saudi Arabia">Saudi Arabia</option>
										<option {{Input::old('country',$profile->country)=="Senegal"?"selected":""}} value="Senegal">Senegal</option>
										<option {{Input::old('country',$profile->country)=="Serbia"?"selected":""}} value="Serbia">Serbia</option>
										<option {{Input::old('country',$profile->country)=="Seychelles"?"selected":""}} value="Seychelles">Seychelles</option>
										<option {{Input::old('country',$profile->country)=="Sierra Leone"?"selected":""}} value="Sierra Leone">Sierra Leone</option>
										<option {{Input::old('country',$profile->country)=="Singapore"?"selected":""}} value="Singapore">Singapore</option>
										<option {{Input::old('country',$profile->country)=="Slovakia"?"selected":""}} value="Slovakia">Slovakia</option>
										<option {{Input::old('country',$profile->country)=="Slovenia"?"selected":""}} value="Slovenia">Slovenia</option>
										<option {{Input::old('country',$profile->country)=="Solomon Islands"?"selected":""}} value="Solomon Islands">Solomon Islands</option>
										<option {{Input::old('country',$profile->country)=="Somalia"?"selected":""}} value="Somalia">Somalia</option>
										<option {{Input::old('country',$profile->country)=="South Africa"?"selected":""}} value="South Africa">South Africa</option>
										<option {{Input::old('country',$profile->country)=="Spain"?"selected":""}} value="Spain">Spain</option>
										<option {{Input::old('country',$profile->country)=="Sri Lanka"?"selected":""}} value="Sri Lanka">Sri Lanka</option>
										<option {{Input::old('country',$profile->country)=="Sudan"?"selected":""}} value="Sudan">Sudan</option>
										<option {{Input::old('country',$profile->country)=="Suriname"?"selected":""}} value="Suriname">Suriname</option>
										<option {{Input::old('country',$profile->country)=="Swaziland"?"selected":""}} value="Swaziland">Swaziland</option>
										<option {{Input::old('country',$profile->country)=="Sweden"?"selected":""}} value="Sweden">Sweden</option>
										<option {{Input::old('country',$profile->country)=="Switzerland"?"selected":""}} value="Switzerland">Switzerland</option>
										<option {{Input::old('country',$profile->country)=="Syria"?"selected":""}} value="Syria">Syria</option>
										<option {{Input::old('country',$profile->country)=="Tahiti"?"selected":""}} value="Tahiti">Tahiti</option>
										<option {{Input::old('country',$profile->country)=="Taiwan"?"selected":""}} value="Taiwan">Taiwan</option>
										<option {{Input::old('country',$profile->country)=="Tajikistan"?"selected":""}} value="Tajikistan">Tajikistan</option>
										<option {{Input::old('country',$profile->country)=="Tanzania"?"selected":""}} value="Tanzania">Tanzania</option>
										<option {{Input::old('country',$profile->country)=="Thailand"?"selected":""}} value="Thailand">Thailand</option>
										<option {{Input::old('country',$profile->country)=="Togo"?"selected":""}} value="Togo" >Togo</option>
										<option {{Input::old('country',$profile->country)=="Tokelau"?"selected":""}} value="Tokelau">Tokelau</option>
										<option {{Input::old('country',$profile->country)=="Tonga"?"selected":""}} value="Tonga">Tonga</option>
										<option {{Input::old('country',$profile->country)=="Trinidad & Tobago"?"selected":""}} value="Trinidad & Tobago">Trinidad &amp; Tobago</option>
										<option {{Input::old('country',$profile->country)=="Tunisia"?"selected":""}} value="Tunisia">Tunisia</option>
										<option {{Input::old('country',$profile->country)=="Turkey"?"selected":""}} value="Turkey">Turkey</option>
										<option {{Input::old('country',$profile->country)=="Turkmenistan"?"selected":""}} value="Turkmenistan">Turkmenistan</option>
										<option {{Input::old('country',$profile->country)=="Turks & Caicos Is"?"selected":""}} value="Turks & Caicos Is">Turks &amp; Caicos Is</option>
										<option {{Input::old('country',$profile->country)=="Tuvalu"?"selected":""}} value="Tuvalu">Tuvalu</option>
										<option {{Input::old('country',$profile->country)=="Uganda"?"selected":""}} value="Uganda">Uganda</option>
										<option {{Input::old('country',$profile->country)=="Ukraine"?"selected":""}} value="Ukraine">Ukraine</option>
										<option {{Input::old('country',$profile->country)=="United Arab Emirates"?"selected":""}} value="United Arab Emirates">United Arab Emirates</option>
										<option {{Input::old('country',$profile->country)=="United Kingdom"?"selected":""}} value="United Kingdom">United Kingdom</option>
										<option {{Input::old('country',$profile->country)=="United States of America"?"selected":""}} value="United States of America">United States of America</option>
										<option {{Input::old('country',$profile->country)=="Uruguay"?"selected":""}} value="Uruguay">Uruguay</option>
										<option {{Input::old('country',$profile->country)=="Uzbekistan"?"selected":""}} value="Uzbekistan">Uzbekistan</option>
										<option {{Input::old('country',$profile->country)=="Vanuatu"?"selected":""}} value="Vanuatu">Vanuatu</option>
										<option {{Input::old('country',$profile->country)=="Vatican City State"?"selected":""}} value="Vatican City State">Vatican City State</option>
										<option {{Input::old('country',$profile->country)=="Venezuela"?"selected":""}} value="Venezuela">Venezuela</option>
										<option {{Input::old('country',$profile->country)=="Vietnam"?"selected":""}} value="Vietnam">Vietnam</option>
										<option {{Input::old('country',$profile->country)=="Virgin Islands (Brit)"?"selected":""}} value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
										<option {{Input::old('country',$profile->country)=="Virgin Islands (USA)"?"selected":""}} value="Virgin Islands (USA)">Virgin Islands (USA)</option>
										<option {{Input::old('country',$profile->country)=="Wake Island"?"selected":""}} value="Wake Island">Wake Island</option>
										<option {{Input::old('country',$profile->country)=="Wallis & Futana Is"?"selected":""}} value="Wallis & Futana Is">Wallis &amp; Futana Is</option>
										<option {{Input::old('country',$profile->country)=="Yemen"?"selected":""}} value="Yemen">Yemen</option>
										<option {{Input::old('country',$profile->country)=="Zaire"?"selected":""}} value="Zaire">Zaire</option>
										<option {{Input::old('country',$profile->country)=="Zambia"?"selected":""}} value="Zambia">Zambia</option>
										<option {{Input::old('country',$profile->country)=="Zimbabwe"?"selected":""}} value="Zimbabwe">Zimbabwe</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<label>Mobile #</label>
									<input type="text" value="{{Input::old('mobile_no',$profile->mobile_no)}}" name="mobile_no" class="form-control"/>
								</div>
								<div class="col-md-6">
									<label>Change profile image:</label>
									<input name="avatar" type="file" class="styled form-control">
									<input name="old_avatar" type="hidden" value="{{$profile->avatar}}">
									<span class="help-block">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
								</div>
							</div>
						</div>
					</div>
					<h6 class="heading-hr"><i class="icon-lock"></i> Security information:</h6>
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label>New password:</label>
								<input type="password" placeholder="Enter new password" class="form-control">
							</div>
							<div class="col-md-6">
								<label>Repeat password:</label>
								<input type="password_confirmation" placeholder="Repeat new password" class="form-control">
							</div>
						</div>
					</div>
					<div class="text-right">
						<input type="reset" value="Cancel" class="btn btn-default">
						<input type="submit" value="Apply changes" class="btn btn-success">
					</div>
					{{Form::close()}}
					<!-- /profile information -->
				</div>
				<!-- /fifth tab -->
			</div>
		</div>
		<!-- /page tabs -->
	</div>

</div>

@stop