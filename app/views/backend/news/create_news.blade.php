@extends('backend.layouts.master')

@section('content')
<!-- Page header -->
<div class="page-header">
	<div class="page-title">
		<h3>Create News </h3>
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
			Create News
		</li>
	</ul>
</div>
<!-- /breadcrumbs line -->

{{Form::open(['url'=>'/admin/news/add','method'=>'post','class'=>'form-horizontal form-bordered','role'=>'form'])}}

<!-- Button trigger modal -->

<div class="panel panel-default">
	<div class="panel-heading">
		<h6 class="panel-title"><i class="icon-user-plus2"></i> Create a News Item</h6>
		<div class="table-controls pull-right">
			<input type="submit" value="Save" class="btn btn-info">
		</div>
	</div>
	<div class="panel-body">

		<div class="form-group">
        			<label class="col-sm-2 control-label">Title</label>
        			<div class="col-sm-10">
                         <input name="title" type="text" class="form-control" value="{{Input::old('title')}}">
                    </div>
        		</div>

        <div class="form-group">
                			<label class="col-sm-2 control-label">Description</label>
                			<div class="col-sm-10">
                                 <textarea name="description" type="text" class="form-control" id="ckeditor">{{Input::old('description')}}</textarea>
                            </div>
                		</div>

        <div class="form-group">
                        			<label class="col-sm-2 control-label">Status</label>
                        			<div class="col-sm-10">
                                         <select class="form-control input-lg" name="status">
                                            <option {{Input::old('status')==1?"selected":""}} value="1">Active</option>
                                            <option {{Input::old('status')==0?"selected":""}} value="0">Inactive</option>
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

@section('scripts')
{{HTML::script('/assets/plugins/ckeditor/ckeditor.js')}}
<script>

                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                $(document).ready(function(){
                CKEDITOR.replace( 'ckeditor' );
                });

            </script>
@stop