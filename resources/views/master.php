<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Mobile Angular UI Examples</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimal-ui" />
    <meta name="apple-mobile-web-app-status-bar-style" content="yes" />
    <link rel="shortcut icon" href="/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="/dist/css/mobile-angular-ui-hover.min.css" />
    <link rel="stylesheet" href="/dist/css/mobile-angular-ui-base.min.css" />
    <link rel="stylesheet" href="/dist/css/mobile-angular-ui-desktop.min.css" />
    <link rel="stylesheet" href="/css/app.css" />
    <script src="/dist/js/angular.min.js"></script>
    <script src="/dist/js/angular-route.min.js"></script>
    <script src="/dist/js/angular-touch.min.js"></script>
    <script src="/dist/js/mobile-angular-ui.min.js"></script>
    <script src="/dist/js/angular-ng-storage.min.js"></script>
    <script>
        window.slim = window.slim || <?php echo $window; ?>;
    </script>
    <script src="/js/app.js"></script>
    <!-- Services && Factories -->
    <?php foreach($window->services() as $path): ?>
        <script src="<?php echo $path; ?>"></script>
    <?php endforeach; ?>
    <!-- End Services && Factories -->
    <!-- Controllers -->
    <?php foreach($window->controllers() as $path): ?>
        <script src="<?php echo $path; ?>"></script>
    <?php endforeach; ?>
</head>
<body ng-app="MobileAngularUiExamples" ng-controller="MainController">

<!-- Sidebars -->
<div ng-include="'/tpl/sidebar.html'" class="sidebar sidebar-left" toggleable parent-active-class="sidebar-left-in" id="mainSidebar"></div>

<div ng-include="'/tpl/sidebarRight.html'" class="sidebar sidebar-right" toggleable parent-active-class="sidebar-right-in" id="rightSidebar"></div>

<div class="app">

    <!-- Navbars -->

    <div class="navbar navbar-app navbar-absolute-top">
        <div class="navbar-brand navbar-brand-center" yield-to="title">
            <span>Mobile Angular UI</span>
        </div>
        <div class="btn-group pull-left">
            <div ng-click="toggle('mainSidebar')" class="btn btn-navbar sidebar-toggle">
                <i class="fa fa-bars"></i> Menu
            </div>
        </div>
        <div class="btn-group pull-right" yield-to="navbarAction">
            <div ng-click="toggle('rightSidebar')" class="btn btn-navbar">
                <i class="fa fa-comment"></i> Chat
            </div>
        </div>
    </div>

    <div class="navbar navbar-app navbar-absolute-bottom">
        <div class="btn-group justified">
            <a href="http://mobileangularui.com/" class="btn btn-navbar"><i class="fa fa-home fa-navbar"></i> Docs</a>
            <a href="https://github.com/mcasimir/mobile-angular-ui" class="btn btn-navbar"><i class="fa fa-github fa-navbar"></i> Sources</a>
            <a href="https://github.com/mcasimir/mobile-angular-ui/issues" class="btn btn-navbar"><i class="fa fa-exclamation-circle fa-navbar"></i> Issues</a>
        </div>
    </div>

    <!-- App Body -->
    <div class="app-body" ng-class="{loading: loading}">
        <div ng-show="loading" class="app-content-loading">
            <i class="fa fa-spinner fa-spin loading-spinner"></i>
        </div>

        <ng-view class="app-content" ng-hide="loading"></ng-view>
    </div>

    <div ng-include="'/tpl/auth/index.html'"></div>

</div><!-- ~ .app -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    //ga('create', 'UA-48036416-1', 'mobileangularui.com');
    //ga('send', 'pageview');
</script>
</body>
</html>
