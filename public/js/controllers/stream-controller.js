// signin controller
app.controller('StreamController', ['$scope', '$http', '$state','Stream', function($scope, $http, $state,Stream) {
    $scope.user = {};
    $scope.authError = null;
    $scope.profile;


    $scope.profile = function() {

        $scope.authError = null;

        Stream.profile().then(function(response)
        {
            if (parseInt(response.result)==0 ) {
                $scope.authError = response.data;
            }else{
                $scope.profile = response.profile;
                $scope.followers = response.followers;
                $scope.following = response.following;
            }
        });

    };

    $scope.profile();


}])
