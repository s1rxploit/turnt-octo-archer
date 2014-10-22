<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Earn money while you browse</title>

		{{HTML::style("/assets/css/bootstrap.min.css")}}
		{{HTML::style("/assets/css/londinium-theme.min.css")}}
		{{HTML::style("/assets/css/styles.min.css")}}
		{{HTML::style("/assets/css/icons.min.css")}}
		{{HTML::style("http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=latin,cyrillic-ext")}}
		{{HTML::style("//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css")}}

		{{HTML::script("/assets/js/jquery-1.10.2.min.js")}}
		{{HTML::script("//code.jquery.com/ui/1.11.0/jquery-ui.js")}}
		{{HTML::script("/assets/js/plugins/charts/sparkline.min.js")}}
		{{HTML::script("/assets/js/plugins/forms/uniform.min.js")}}
		{{HTML::script("/assets/js/plugins/forms/select2.min.js")}}
		{{HTML::script("/assets/js/plugins/forms/inputmask.js")}}
		{{HTML::script("/assets/js/plugins/forms/autosize.js")}}
		{{HTML::script("/assets/js/plugins/forms/inputlimit.min.js")}}
		{{HTML::script("/assets/js/plugins/forms/listbox.js")}}
		{{HTML::script("/assets/js/plugins/forms/multiselect.js")}}
		{{HTML::script("/assets/js/plugins/forms/validate.min.js")}}

		{{HTML::script("/assets/js/plugins/forms/tags.min.js")}}
		{{HTML::script("/assets/js/plugins/forms/switch.min.js")}}
		{{HTML::script("/assets/js/plugins/forms/uploader/plupload.full.min.js")}}
		{{HTML::script("/assets/js/plugins/forms/uploader/plupload.queue.min.js")}}
		{{HTML::script("/assets/js/plugins/forms/wysihtml5/wysihtml5.min.js")}}
		{{HTML::script("/assets/js/plugins/forms/wysihtml5/toolbar.js")}}
		{{HTML::script("/assets/js/plugins/interface/daterangepicker.js")}}
		{{HTML::script("/assets/js/plugins/interface/fancybox.min.js")}}
		{{HTML::script("/assets/js/plugins/interface/moment.js")}}
		{{HTML::script("/assets/js/plugins/interface/jgrowl.min.js")}}
		{{HTML::script("/assets/js/plugins/interface/datatables.min.js")}}

		{{HTML::script("/assets/js/plugins/interface/colorpicker.js")}}
		{{HTML::script("/assets/js/plugins/interface/fullcalendar.min.js")}}
		{{HTML::script("/assets/js/plugins/interface/timepicker.min.js")}}
		{{HTML::script("/assets/js/plugins/interface/collapsible.min.js")}}
		{{HTML::script("/assets/js/bootstrap.min.js")}}
		{{HTML::script("/assets/js/application.js")}}

		<style>
			/* Ajax Stuff */
			#ajaxLoading {
				position: fixed;
				top: 50%;
				left: 50%;
				margin-top: -50px;
				margin-left: -100px;
				color: #43ac6a;
				z-index: 99999999999;
				display: none;
			}
			.no-click {
				pointer-events: none;
				cursor: default;
			}
			/* end Ajax */
		</style>

		@yield('styles')
		<base href="/"/>

	</head>
	<body class="sidebar-wide">

		@include('layouts.header');
		@include('layouts.sidebar');

		<!-- Page container -->
		<div class="page-container">

			<!-- Page content -->
			<div class="page-content">

				@yield('content')

				<!-- Footer -->
				@include('layouts.footer')
				<!-- /footer -->

			</div>
			<!-- /page content -->
		</div>
		<!-- /page container -->

		<script>
			jQuery(document).ready(function($) {

				$(document).bind("ajaxSend", function() {
					$(".disableOnAjax").prop('disabled', true).addClass("no-click");
					$("#ajaxLoading").show();
				}).bind("ajaxComplete", function() {
					$(".disableOnAjax").prop('disabled', false).removeClass("no-click");
					$("#ajaxLoading").hide();
				});

			});
		</script>

		@yield('scripts')

		<i id="ajaxLoading" class="fa fa-spinner fa-spin fa-5x"></i>

	</body>
</html>