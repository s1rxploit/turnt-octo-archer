@extends('backend.layouts.master')

@section('content')
<!-- Page header -->
<div class="page-header">
	<div class="page-title">
		<h3>Approved Withdrawals </h3>
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
			Approved Withdrawals
		</li>
	</ul>
</div>
<!-- /breadcrumbs line -->

<div class="panel panel-default">
	<div class="panel-heading">
		<h6 class="panel-title"><i class="icon-user4"></i> Approved Withdrawals</h6>
	</div>
	<div id="transaction_list">
    		<table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Paypal Email</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Requested On</th>
                        <th>Approved By</th>
                        <th>Approved On</th>
                        <th>View</th>
                      </tr>
                    </thead>

                    <tbody>
                    @foreach($withdrawals as $withdrawal)
                      <tr>
                        <td>{{$withdrawal->id}}</td>
                        <td>{{$withdrawal->user->name}}</td>
                        <td>{{$withdrawal->paypal_email}}</td>
                        <td>{{$withdrawal->amount}}</td>
                        <td>{{$withdrawal->status==1?"<span class='label label-info'>Approved</span>":"<span class='label label-danger'>Pending Approval</span>"}}</td>
                        <td>{{Cashout\Helpers\Utils::prettyDate($withdrawal->created_at,true)}}</td>
                        <td>{{$withdrawal->status==1?"Admin":"-"}}</td>
                        <td>{{$withdrawal->status==1?Cashout\Helpers\Utils::prettyDate($withdrawal->approved_on,true):"-"}}</td>
                        <td><a class="btn btn-success" href="/admin/users/view/{{$withdrawal->user_id}}">View User</a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>



                </div>
                 <div class="table-footer">
                              <div class="table-actions">

                              </div>
                             {{ $withdrawals->links(); }}
                            </div>

</div>



@stop


@section('scripts')
{{HTML::style("/assets/plugins/datatables/css/dataTables.bootstrap.css")}}
{{HTML::script("/assets/plugins/datatables/js/jquery.dataTables.min.js")}}
{{HTML::script("/assets/plugins/datatables/js/dataTables.bootstrap.js")}}
<script type="text/javascript">
oTable = $('#transaction_list table').dataTable({
		"bJQueryUI": false,
		"bAutoWidth": false,
        "bPaginate": false,
        "bInfo" : false,
		"sDom": '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
		"oLanguage": {
			"sSearch": "<span>Filter:</span> _INPUT_",
			"sLengthMenu": "<span>Show entries:</span> _MENU_"
		}
    });
</script>
@stop