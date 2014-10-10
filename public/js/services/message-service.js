'use strict';

app.factory('MessageService', function ($q, $http, PATH_TO_API)
{
    var self = {};

    self.getConversations = function()
    {
        var d = $q.defer();
        $http.get(PATH_TO_API + 'conversations').
            success(function (data)
            {
                d.resolve(data);
            }
        ).error(function(data)
            {
                d.resolve(data);
            }
        );
        return d.promise;
    };

    self.find = function( id )
    {
        var d = $q.defer();

        $http.get(PATH_TO_API + 'conversations/' + id).
            success(function (data)
            {
                d.resolve(data);
            }
        ).error(function(data)
            {
                d.resolve(data);
            }
        );

        return d.promise;
    };

    return self;
});