app.factory('Stream', function ($q, $http,APP_CONSTANTS)
{
    var self = {

    };

    self.profile = function()
    {
        var d = $q.defer();

        $http.get(APP_CONSTANTS.API_PATH+'/stream').
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