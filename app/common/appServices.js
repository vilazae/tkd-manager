tkdApp.service('apiService', [ '$http', function( $http ) {
    function apiMethod () {
        console.log('estoy en el servicio!');
    }

    function sayHello (user_name) {
        return $http.post('backend/api.php', { action: 'say_hello', name: user_name } )
    }

    function getUsersList () {
        return $http.post('backend/api.php', { action: 'list_users' } )
    }

    function getCompetitorsList () {
        return $http.post('backend/api.php', { action: 'list_competitors' } )
    }

    return {
        apiMethod           : apiMethod,
        sayHello            : sayHello,
        getUsersList        : getUsersList,
        getCompetitorsList : getCompetitorsList
    }

} ] );