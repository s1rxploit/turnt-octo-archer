@extends('customer.layouts.master')

@section('styles')
<style type="text/css">
.jOrgChart {
  margin                : 10px;
  padding               : 20px;
}

/* Custom node styling */
.jOrgChart .node {
	font-size 			: 14px;
	background-color 	: #35363B;
	border-radius 		: 8px;
	border 				: 5px solid white;
	color 				: #F38630;
	-moz-border-radius 	: 8px;
}
	.node label{
		font-family 	: tahoma;
		font-size 		: 14px;
		line-height 	: 11px;
		padding-top 		: 30px;
	}
</style>
@stop

@section('content')
<!-- Page header -->
<div class="page-header">
	<div class="page-title">
		<h3>CGS Tree </h3>
	</div>
</div>

@include('customer.layouts.notify')

<div class="panel panel-default">
	<div class="panel-heading">
		<h6 class="panel-title"><i class="icon-user-plus2"></i> CGS Tree</h6>
	</div>
	<div class="panel-body">
    <ul id="org" style="display:none">
    <li>
    <label>{{Auth::user()->name}}</label>
    <ul>
        <li>
            <label>2</label>
            <ul>
                <li></li>
                <li></li>
            </ul>
        </li>
        <li>
            <label>3</label>
            <ul>
                <li></li>
                <li></li>
            </ul>
        </li>
    </ul>
    </li>
    </ul>

    <div id="chart" class="orgChart">
                	<div class="zoom">
                    	<span class="zoom_control">+</span>
                		<div id="zoom_slider"></div>
                        <span class="zoom_control">-</span>
                    </div>

</div>

@stop

@section('scripts')
{{HTML::script("/assets/plugins/jorg-charts/jquery.jOrgChart.js")}}
{{HTML::style("/assets/plugins/jorg-charts/tree.css")}}
{{HTML::script("/assets/plugins/jorg-charts/tree.js")}}
<script type="text/javascript">
    $(document).ready(function() {

    $("#org").jOrgChart({
                chartElement : '#chart',
                dragAndDrop  : false,
                slider:true
            });
    });
</script>
@stop