app.controller('MainController', function($rootScope, $scope, analytics, AuthService)
{
    $scope.greeting = 'Welcome';

    $scope.login = {};
    $scope.register = {};
    $scope.register_errors = [];

    $scope.months = [
        'January','February','March','April','May','June',
        'July','August','September','October','November','December'
    ];

    $scope.authorized = $rootScope.application.authorized ? '' : 'active';

    $scope.submitLoginForm = function ()
    {
        AuthService.login($scope.login).then(function(response)
        {
            if(response.result == 1)
            {
                $rootScope.startApplication({
                    user: response.data.user
                });
            }
            else
            {
                $scope.login_errors = response.data;
            }
        });
    };

    $scope.submitRegisterForm = function ()
    {
        AuthService.register($scope.register).then(function(response)
        {
            if(response.result == 1)
            {
                $rootScope.startApplication({
                    user: response.data.user
                });
            }
            else
            {
                $scope.register_errors = response.data;
            }
        });
    };

    //var scrollItems = [];
    //
    //for (var i=1; i<=100; i++) {
    //    scrollItems.push("Item " + i);
    //}
    //
    //$scope.scrollItems = scrollItems;
    //$scope.invoice = {payed: true};
    //
    //$scope.userAgent =  navigator.userAgent;
    //$scope.chatUsers = [
    //    { name: "Carlos  Flowers", online: true },
    //    { name: "Byron Taylor", online: true },
    //    { name: "Jana  Terry", online: true },
    //    { name: "Darryl  Stone", online: true },
    //    { name: "Fannie  Carlson", online: true },
    //    { name: "Holly Nguyen", online: true },
    //    { name: "Bill  Chavez", online: true },
    //    { name: "Veronica  Maxwell", online: true },
    //    { name: "Jessica Webster", online: true },
    //    { name: "Jackie  Barton", online: true },
    //    { name: "Crystal Drake", online: false },
    //    { name: "Milton  Dean", online: false },
    //    { name: "Joann Johnston", online: false },
    //    { name: "Cora  Vaughn", online: false },
    //    { name: "Nina  Briggs", online: false },
    //    { name: "Casey Turner", online: false },
    //    { name: "Jimmie  Wilson", online: false },
    //    { name: "Nathaniel Steele", online: false },
    //    { name: "Aubrey  Cole", online: false },
    //    { name: "Donnie  Summers", online: false },
    //    { name: "Kate  Myers", online: false },
    //    { name: "Priscilla Hawkins", online: false },
    //    { name: "Joe Barker", online: false },
    //    { name: "Lee Norman", online: false },
    //    { name: "Ebony Rice", online: false }
    //];
});