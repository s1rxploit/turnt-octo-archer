// signin controller
app.controller('AuthController', ['$sce','$scope', '$http', '$state','Auth','$timeout', function($sce,$scope, $http, $state,Auth,$timeout) {
    $scope.user = {};
    $scope.authError = null;

    // Date Picker Config Starts
    $scope.datePickerFormats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'shortDate'];
    $scope.datePickerFormat = $scope.datePickerFormats[0];
    $scope.datePickerOptions = {
        formatYear: 'yy',
        startingDay: 1,
        class: 'datepicker'
    };

    $scope.datePickerOpened=false;
    $scope.datePickerDisabled = function(date, mode) {
        return ( mode === 'day' && ( date.getDay() === 0 || date.getDay() === 6 ) );
    };

    $scope.datePickerOpen = function($event) {
        $event.preventDefault();
        $event.stopPropagation();

        $scope.datePickerOpened = true;
    };
    // Date Picker Config ENDS

    $scope.login = function() {

        $scope.authError = null;

        Auth.login($scope.user.email,$scope.user.password).then(function(response)
        {
            if (parseInt(response.result)==0 ) {
                $scope.authError = response.data;
            }else{
                $state.go('app.dashboard');
            }
        });

    };

    $scope.register = function() {

        $scope.authError = null;

        if($scope.user.agree!=1)
        {
            $scope.authError = "Please accept terms and conditions to register";
        }

        Auth.register($scope.user.name,$scope.user.email,$scope.user.confirm_email,$scope.user.password,$scope.user.birthday,$scope.user.gender)
            .then(function(response)
            {
                if (parseInt(response.result)==1 )
                {
                    $scope.auth_success = 'Registration was successful';
                    $timeout(function()
                    {
                        $state.go('app.dashboard');
                    },500);
                }
                else
                {
                    $scope.auth_error = response.data;
                }
            }
        );
    };

    $scope.forgotpassword = function() {

        $scope.authError = null;
        $scope.isCollapsed = !$scope.isCollapsed

        Auth.forgotpassword($scope.user.email).then(function(response){

           if (parseInt(response.result)==0 ) {
                $scope.authError = response.data;
           }else{
               $scope.authSuccess = response.data;
               // $state.go('app.dashboard');
           }

        });
    };



}])
