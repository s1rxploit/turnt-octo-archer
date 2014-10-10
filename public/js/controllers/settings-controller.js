app.controller('SettingsController', ['$scope','$rootScope','FollowService','$timeout', function($scope, $rootScope, FollowService,$timeout)
{
    $scope.nations = {};

    var nationalities = $rootScope.application.nationalities;


    FollowService.getNations().then(function(data)
    {
        angular.forEach(nationalities, function(country)
        {
            country.follow = data.data.indexOf(country.id) > -1 ? true : false;
        });
        $scope.nations = nationalities;
    });

    $scope.followNation = function(index)
    {
        $scope.nations[index].follow = ! $scope.nations[index].follow;
        if ($scope.pendingPromise) { $timeout.cancel($scope.pendingPromise); }
        $scope.pendingPromise = $timeout(function () {
            FollowService.followNation($scope.nations[index]);
        }, 1);

    };
    $scope.doNothing = function()
    {

    }









}]);