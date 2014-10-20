<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cashout</title>
<link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/assets/css/londinium-theme.min.css" rel="stylesheet" type="text/css">
<link href="/assets/css/styles.min.css" rel="stylesheet" type="text/css">
<link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/charts/sparkline.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/uniform.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/select2.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/inputmask.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/autosize.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/inputlimit.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/listbox.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/multiselect.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/validate.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/tags.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/switch.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/uploader/plupload.full.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/uploader/plupload.queue.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/wysihtml5/wysihtml5.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/forms/wysihtml5/toolbar.js"></script>
<script type="text/javascript" src="/assets/js/plugins/interface/daterangepicker.js"></script>
<script type="text/javascript" src="/assets/js/plugins/interface/fancybox.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/interface/moment.js"></script>
<script type="text/javascript" src="/assets/js/plugins/interface/jgrowl.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/interface/datatables.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/interface/colorpicker.js"></script>
<script type="text/javascript" src="/assets/js/plugins/interface/fullcalendar.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/interface/timepicker.min.js"></script>
<script type="text/javascript" src="/assets/js/plugins/interface/collapsible.min.js"></script>
<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/js/application.js"></script>
</head>
<body class="full-width page-condensed">
<!-- Navbar -->
<div class="navbar navbar-inverse" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-right"><span class="sr-only">Toggle navbar</span><i class="icon-grid3"></i></button>
    <a class="navbar-brand" href="#"><img style="width: 100px;margin-top: -16px;" src="/assets/images/logo.png" alt="Cashout"></a></div>

</div>
<!-- /navbar -->
<!-- Login wrapper -->



<div class="login-wrapper">

    @include('layouts.notify')

  <form action="/customer/reset/change-password" method="POST" role="form">

    <div class="well">
      <div class="form-group has-feedback">
        <label>Enter New Password</label>
        <input type="hidden" name="email" value="{{$email}}"/>
        <input type="hidden" name="code" value="{{$code}}"/>
        <input type="password" class="form-control" name="password" >
        <i class="icon-lock form-control-feedback"></i></div>

         <div class="form-group has-feedback">
                <label>Confirm New Password</label>
                <input type="password" class="form-control" name="password_confirmation" >
                <i class="icon-lock form-control-feedback"></i></div>

      <div class="row form-actions">
        <div class="col-xs-4">

        </div>
        <div class="col-xs-8">
          <button type="submit" class="btn btn-warning pull-right"><i class="icon-menu2"></i> Change Password</button>
        </div>
      </div>

    </div>
  </form>
</div>
<!-- /login wrapper -->
<!-- Footer -->
<div class="footer clearfix">
  <div class="pull-left">&copy; 2014. Cashout </div>
</div>
<!-- /footer -->
</body>
</html>