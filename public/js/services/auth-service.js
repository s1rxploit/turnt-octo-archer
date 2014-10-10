app.factory('AuthService', function ($q, $http, API_URL)
{
    var self = {};

    this.user = {};

    self.login = function(credentials)
    {
        var d = $q.defer();

        $http.post(API_URL+'/auth/login',credentials).
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

    self.register = function(data)
    {
        var d = $q.defer();

        $http.post(API_URL+ '/auth/register',data).
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

    self.forgotpassword = function(email)
    {
        var d = $q.defer();

        $http.post(API_URL+'/auth/forgotpassword',{email:email}).
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

    self.logout = function(credentials)
    {
        var d = $q.defer();

        $http.get(API_URL+'/auth/logout').
            success(function (data)
            {
                d.resolve(data);
            }
        ).error(function(data)
            {
                d.resolve(data);
            }
        );

        $localStorage.$reset({
            user: {}
        });

        return d.promise;
    };

    self.getUser = function()
    {
        return this.user;
    };

    self.setUser = function( user )
    {
        this.user = user;
    };

    return self;
});