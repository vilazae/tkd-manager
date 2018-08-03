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

    function updateCompetitor( competitor ) {
        return $http.post('backend/api.php', 
            { 
                action: 'update_competitor', 
                parameters: {
                    'id'                  : competitor['id'],
                    'name'                : competitor['name'],
                    'last_name'           : competitor['last_name'],
                    'dni'                 : competitor['dni'],
                    'birth_date'          : competitor['birth_date'],
                    'license_number'      : competitor['license_number'],
                    'liscense_expiration' : competitor['license_expiration_date'],
                    'gender'              : competitor['gender'],
                    'belt'                : competitor['cinturon'],
                    'club_id'             : competitor['club_id']
                }
            } 
        );
    }

    function getChampionshipList () {
        return $http.post('backend/api.php', { action: 'list_championships' } )
    }

    function getClubesList () {
        return $http.post('backend/api.php', { action: 'list_clubes' } )
    }

    return {
        apiMethod           : apiMethod,
        sayHello            : sayHello,
        getUsersList        : getUsersList,
        getCompetitorsList : getCompetitorsList,
        updateCompetitor : updateCompetitor,
        getChampionshipList : getChampionshipList,
        getClubesList : getClubesList
    }

} ] );