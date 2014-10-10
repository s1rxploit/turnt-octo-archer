angular.module('Messages-Controller',[])
    .controller('Messages-Controller', ['$scope','convos','MessageService', function($scope,convos,MessageService)
{

    $scope.conversations = convos.conversations;
    $scope.conversation = {};

    $scope.getConversation = function(id)
    {
        MessageService.find(id).then(function(data)
        {
            console.log(data.messages);
            $scope.conversation = data.messages;
        });
    };



}]);