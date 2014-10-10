var app = angular.module('MobileAngularUiExamples', [
    "ngRoute",
    "ngTouch",
    "ngStorage",
    "mobile-angular-ui"
]);

app.constant('API_URL', window.slim.url.api);

app.factory('AuthInterceptor', function AuthInterceptor($window, $q) {
    'use strict';
    return {
        request: addHeaders,
        response: interceptResponse,
        responseError: interceptResponseError
    };

    function addHeaders(config)
    {
        config.headers = config.headers || {};
        config.headers.Authorization = $window.slim.csrf_token;
        config.headers['X-Requested-With'] = 'XMLHttpRequest';
        return config;
    }
    function interceptResponse(response)
    {
        return response;
    }
    function interceptResponseError(rejection) {
        if (rejection.status === 400) {
        } else if (rejection.status === 418) {
            return window.location.reload();
        } else if (rejection.status === 422) {
        }
        return $q.reject(rejection);
    }
});

app.factory('DB', function DB($sessionStorage, $localStorage)
{
    'use strict';
    var self = {};

    self.getUser = function()
    {
        return $sessionStorage.slim_user || {};
    };

    self.getSettings = function()
    {
        return $localStorage.slim_settings || {};
    };

    self.truncate = function()
    {
        $localStorage.$reset();
        $sessionStorage.$reset();
    };

    return self;
});

app.config(['$httpProvider', function ($httpProvider)
{
    $httpProvider.interceptors.push('AuthInterceptor');
}]);

app.run(['$rootScope','$window','DB',function($rootScope,$window,DB)
{
    $rootScope.$on("$routeChangeStart", function(){
        $rootScope.loading = true;
    });

    $rootScope.$on("$routeChangeSuccess", function(){
        $rootScope.loading = false;
    });

    $rootScope.application = $window.slim;

    $rootScope.application.defaults = {};

    $rootScope.closeOverlay = function(id)
    {
        var overlay = angular.element(document.getElementById(id));
        overlay.remove();
        var body = angular.element(document.body);
        body.removeClass('overlay-in');
    };

    $rootScope.startApplication = function(defaults)
    {
        $rootScope.closeOverlay('overlay-login');
        angular.extend($rootScope.application.defaults, defaults); // might not need to extend the defaults just the application
    };

}]);

app.config(function($routeProvider, $locationProvider)
{

    $routeProvider.when('/',          {templateUrl: "/tpl/home.html"});
    $routeProvider.when('/settings',  {templateUrl: "/tpl/settings/index.html"});





    $routeProvider.when('/scroll',    {templateUrl: "/tpl/scroll.html"});
    $routeProvider.when('/toggle',    {templateUrl: "/tpl/toggle.html"});
    $routeProvider.when('/tabs',      {templateUrl: "/tpl/tabs.html"});
    $routeProvider.when('/accordion', {templateUrl: "/tpl/accordion.html"});
    $routeProvider.when('/overlay',   {templateUrl: "/tpl/overlay.html"});
    $routeProvider.when('/forms',     {templateUrl: "/tpl/forms.html"});
    $routeProvider.when('/carousel',  {templateUrl: "/tpl/carousel.html"});
});

app.service('analytics', [
    '$rootScope', '$window', '$location', function($rootScope, $window, $location) {
        var send = function(evt, data) {
            ga('send', evt, data);
        }
    }
]);

app.directive( "carouselExampleItem", function($rootScope, $swipe){
    return function(scope, element, attrs){
        var startX = null;
        var startY = null;
        var endAction = "cancel";
        var carouselId = element.parent().parent().attr("id");

        var translateAndRotate = function(x, y, z, deg){
            element[0].style["-webkit-transform"] = "translate3d("+x+"px,"+ y +"px," + z + "px) rotate("+ deg +"deg)";
            element[0].style["-moz-transform"] = "translate3d("+x+"px," + y +"px," + z + "px) rotate("+ deg +"deg)";
            element[0].style["-ms-transform"] = "translate3d("+x+"px," + y + "px," + z + "px) rotate("+ deg +"deg)";
            element[0].style["-o-transform"] = "translate3d("+x+"px," + y  + "px," + z + "px) rotate("+ deg +"deg)";
            element[0].style["transform"] = "translate3d("+x+"px," + y + "px," + z + "px) rotate("+ deg +"deg)";
        }

        $swipe.bind(element, {
            start: function(coords) {
                endAction = null;
                startX = coords.x;
                startY = coords.y;
            },

            cancel: function(e) {
                endAction = null;
                translateAndRotate(0, 0, 0, 0);
                e.stopPropagation();
            },

            end: function(coords, e) {
                if (endAction == "prev") {
                    $rootScope.carouselPrev(carouselId);
                } else if (endAction == "next") {
                    $rootScope.carouselNext(carouselId);
                }
                translateAndRotate(0, 0, 0, 0);
                e.stopPropagation();
            },

            move: function(coords) {
                if( startX != null) {
                    var deltaX = coords.x - startX;
                    var deltaXRatio = deltaX / element[0].clientWidth;
                    if (deltaXRatio > 0.3) {
                        endAction = "next";
                    } else if (deltaXRatio < -0.3){
                        endAction = "prev";
                    } else {
                        endAction = null;
                    }
                    translateAndRotate(deltaXRatio * 200, 0, 0, deltaXRatio * 15);
                }
            }
        });
    }
});