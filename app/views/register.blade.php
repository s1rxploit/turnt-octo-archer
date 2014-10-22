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

  <form action="/register" method="POST" role="form">
    <div class="popup-header"><a href="#" class="pull-left"><i class="icon-user-plus"></i></a><span class="text-semibold">Register</span>
      <div class="btn-group pull-right"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cogs"></i></a>
        <ul class="dropdown-menu icons-right dropdown-menu-right">
          <li><a href="/forgot-password"><i class="icon-info"></i> Forgot Password </a></li>
          <li><a href="/login"><i class="icon-user4"></i> Already registered ? Sign in </a></li>
        </ul>
      </div>
    </div>
    <div class="well">
    <div class="form-group has-feedback">
            <label>Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name">
            <i class="icon-user4 form-control-feedback"></i></div>
      <div class="form-group has-feedback">
        <label>Email</label>
        <input type="text" class="form-control" name="email" placeholder="Email">
        <i class="icon-users form-control-feedback"></i></div>
      <div class="form-group has-feedback">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">
        <i class="icon-lock form-control-feedback"></i></div>
        <div class="form-group has-feedback">
                <label>Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="Password">
                <i class="icon-lock form-control-feedback"></i></div>

       <div class="row form-actions">
              <div class="col-xs-12">
                <div class="checkbox checkbox-success">
                  <label>
                    <input type="checkbox" name="terms_conditions" value="1" class="styled">
                    I accept the Terms of Service and Privacy Policy </label>
                </div>
              </div>

            </div>

      <div class="row form-actions">
        <div class="col-xs-6">

        </div>
        <div class="col-xs-6">
          <button type="submit" class="btn btn-warning pull-right"><i class="icon-menu2"></i> Register</button>
        </div>
      </div>

      <div class="row form-actions">
                    <div class="col-xs-12">
                      <a href="/forgot-password"> Forgot Password ?</a>
                    </div>

                  </div>

      <div class="row form-actions">
              <div class="col-xs-12">
                <a href="/facebook" type="submit" class="btn btn-info btn-block pull-right"><i class="icon-facebook"></i> Register with Facebook</a>
              </div>

            </div>
    </div>
  </form>
</div>
<!-- /login wrapper -->
<!-- Footer -->

<!-- /footer -->
</body>
</html>