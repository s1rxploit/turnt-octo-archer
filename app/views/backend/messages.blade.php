@extends('backend.layouts.master')

@section('content')
<!-- Page header -->
<div class="page-header">
	<div class="page-title">
		<h3>Messages </h3>
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
			Messages
		</li>
	</ul>
</div>
<!-- /breadcrumbs line -->


<div class="row">
      <div class="col-lg-3">
       <h6><i class="icon-paragraph-justify2"></i> Online contacts</h6>
                       <ul class="message-list" style="height:500px;overflow: scroll;">
                         <li class="message-list-header">Buddies</li>
                         <li>
                           <div class="clearfix">
                             <div class="chat-member"><a href="#"><img src="/assets/images/demo/users/face1.png" alt=""></a>
                               <h6>Eugene Kopyov <span class="status status-success"></span> </h6>
                             </div>
                         </div>
                         </li>
                         <li>
                           <div class="clearfix">
                             <div class="chat-member"><a href="#"><img src="/assets/images/demo/users/face2.png" alt=""></a>
                               <h6>Duncan McMart <span class="status status-default"></span> </h6>
                             </div>
                           </div>
                         </li>
                         <li>
                           <div class="clearfix">
                             <div class="chat-member"><a href="#"><img src="/assets/images/demo/users/face3.png" alt=""></a>
                               <h6>Lucy Smith <span class="status status-warning"></span> </h6>
                             </div>
                           </div>
                         </li>
                         <li class="message-list-header">Colleagues</li>
                         <li>
                           <div class="clearfix">
                             <div class="chat-member"><a href="#"><img src="/assets/images/demo/users/face5.png" alt=""></a>
                               <h6>Angel Nowak <span class="status status-default"></span></h6>
                             </div>
                           </div>
                         </li>
                         <li>
                           <div class="clearfix">
                             <div class="chat-member"><a href="#"><img src="/assets/images/demo/users/face6.png" alt=""></a>
                               <h6>Vin Dins <span class="status status-danger"></span> </h6>
                             </div>
                           </div>
                         </li>
                         <li class="message-list-header">Remote team members</li>
                         <li>
                           <div class="clearfix">
                             <div class="chat-member"><a href="#"><img src="/assets/images/demo/users/face10.png" alt=""></a>
                               <h6>Robert Razinsky <span class="status status-default"></span></h6>
                             </div>
                            </div>
                         </li>
                         <li>
                           <div class="clearfix">
                             <div class="chat-member"><a href="#"><img src="/assets/images/demo/users/face11.png" alt=""></a>
                               <h6>Malik Smitsons <span class="status status-danger"></span></h6>
                             </div>
                           </div>
                         </li>
                       </ul>
      </div>

      <div class="col-lg-9">
      <h6><i class="icon-paragraph-justify2"></i> Recent Messages</h6>
            <div class="chat" style="height:500px;overflow: scroll;">
                                <div class="message"> <a class="message-img" href="#"><img src="images/demo/users/face2.png" alt=""></a>
                                  <div class="message-body"><span class="typing"></span> </div>
                                </div>
                                <div class="message reversed"> <a class="message-img" href="#"><img src="images/demo/users/face3.png" alt=""></a>
                                  <div class="message-body"> Nunc volutpat commodo ullamcorper. Vivamus consequat sapien ac ante pharetra pellentesque. Sed molestie leo vitae erat sagittis, ac posuere nibh faucibus. In nec massa suscipit, sagittis ligula non, accumsan velit. Pellentesque habitant morbi tristique senectus et netus et malesuada fames. <span class="attribution">14:23pm, 4th Dec 2010</span> </div>
                                </div>
                                <div class="moment">10 Nov, 2013</div>
                                <div class="message"> <a class="message-img" href="#"><img src="images/demo/users/face2.png" alt=""></a>
                                  <div class="message-body"> Aenean dictum vitae tortor vitae placerat. Donec tristique urna tellus, porttitor commodo quam facilisis sit amet. Pellentesque ullamcorper metus sed libero imperdiet, id consequat libero malesuada. Aenean mattis, nisl nec sodales adipiscing, nunc mauris volutpat nulla, quis dictum sapien nibh vitae metus. Fusce vehicula aliquam enim, sed viverra ipsum elementum at <span class="attribution">14:23pm, 4th Dec 2010</span> </div>
                                </div>
                                <div class="message reversed"> <a class="message-img" href="#"><img src="images/demo/users/face3.png" alt=""></a>
                                  <div class="message-body"> Nulla venenatis enim et mi egestas blandit. Praesent in consequat eros, et sagittis metus <span class="attribution">14:23pm, 4th Dec 2010</span> </div>
                                </div>
                                <div class="message"> <a class="message-img" href="#"><img src="images/demo/users/face2.png" alt=""></a>
                                  <div class="message-body"> Mauris at tellus viverra, lobortis elit non, luctus dolor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla in ornare ligula. Sed in pellentesque justo, vitae tristique urna. Vestibulum congue ligula ac posuere pharetra <span class="attribution">14:23pm, 4th Dec 2010</span> </div>
                                </div>
                                <div class="moment">12 Nov, 2013</div>
                                <div class="message reversed"> <a class="message-img" href="#"><img src="images/demo/users/face3.png" alt=""></a>
                                  <div class="message-body"> Pellentesque ut sollicitudin quam, et suscipit lectus. Duis accumsan, purus ac feugiat condimentum, sem risus eleifend mi, vitae sagittis nisi sem nec libero. Nunc mauris tellus, cursus vel faucibus non, accumsan quis risus <span class="attribution">14:23pm, 4th Dec 2010</span> </div>
                                </div>
                                <div class="message"> <a class="message-img" href="#"><img src="images/demo/users/face2.png" alt=""></a>
                                  <div class="message-body"> Morbi lacus nulla, tristique eu hendrerit non, auctor ut arcu. Morbi id ligula mi. Vivamus ultricies lobortis erat sed placerat. Etiam molestie urna pulvinar porta fringilla. Aenean vitae lacinia felis, id laoreet diam <span class="attribution">14:23pm, 4th Dec 2010</span> </div>
                                </div>
                                <div class="message reversed"> <a class="message-img" href="#"><img src="images/demo/users/face3.png" alt=""></a>
                                  <div class="message-body"> Nunc laoreet aliquam enim adipiscing placerat. Donec ac ultricies nisi. Nunc vel varius ante, et luctus elit. In eros urna, dignissim vitae quam eu, facilisis lacinia leo <span class="attribution">14:23pm, 4th Dec 2010</span> </div>
                                </div>
                              </div>
      </div>

</div>

@stop