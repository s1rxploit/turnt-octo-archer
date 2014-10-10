app.factory('FollowService', function ($q, $http, API_URL)
{
    var self = {};

    self.getNations = function()
    {
        var d = $q.defer();

        $http.get(API_URL+'/follow/nation').
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

    self.followNation = function(nation)
    {
        var d = $q.defer();

        $http.post(API_URL+'/follow/nation',nation).
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