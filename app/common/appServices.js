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

    //COMPETITORS
    function getCompetitorsList () {
        return $http.post('backend/api.php', { action: 'list_competitors' } )
    }

    function updateCompetitor( competitor ) {
        return $http.post('backend/api.php',
            {
                action: 'update_competitor',
                parameters: {
                    'id'                      : competitor['id'],
                    'name'                    : competitor['name'],
                    'last_name'               : competitor['last_name'],
                    'dni'                     : competitor['dni'],
                    'birth_date'              : competitor['birth_date'],
                    'license_number'          : competitor['license_number'],
                    'license_expiration_date' : competitor['license_expiration_date'],
                    'gender'                  : competitor['gender'],
                    'belt'                    : competitor['belt'],
                    'club_id'                 : competitor['club_id']
                }
            }
        );
    }

    function addCompetitor( competitor ) {
        return $http.post('backend/api.php',
            {
                action: 'add_competitor',
                parameters: {
                    'id'                  : competitor['id'],
                    'name'                : competitor['name'],
                    'last_name'           : competitor['last_name'],
                    'dni'                 : competitor['dni'],
                    'birth_date'          : competitor['birth_date'],
                    'license_number'      : competitor['license_number'],
                    'license_expiration_date' : competitor['license_expiration_date'],
                    'gender'              : competitor['gender'],
                    'belt'                : competitor['belt'],
                    'club_id'             : competitor['club_id']
                }
            }
        );
    }

    function deleteCompetitor( competitor_id ) {
        return $http.post('backend/api.php', { action: 'delete_competitor', id: competitor_id } )
    }

    //CHAMPIONSHIP
    function getChampionshipList () {
        return $http.post('backend/api.php', { action: 'list_championships' } )
    }

    function addChampionship( championship ) {
        return $http.post('backend/api.php',
            {
                action: 'add_championship',
                parameters: {
                    'id'                  : championship['id'],
                    'name'                : championship['name'],
                    'date'           : championship['date'],
                    'lugar'                 : championship['lugar'],
                    'abierto'          : championship['abierto']
                }
            }
        );
    }

    function updateChampionship( championship ) {
        return $http.post('backend/api.php',
            {
                action: 'update_championship',
                parameters: {
                    'id'                      : championship['id'],
                    'name'                    : championship['name'],
                    'date'                    : championship['date'],
                    'lugar'                   : championship['lugar'],
                    'abierto'                 : championship['abierto'],
                }
            }
        );
    }

    function cerrarChampionship( championship ) {
        return $http.post('backend/api.php',
            {
                action: 'cerrar_championship',
                parameters: {
                    'id'                      : championship['id'],                    
                }
            }
        );
    }

    function deleteChampionship( championship_id ) {
        return $http.post('backend/api.php', { action: 'delete_championship', id: championship_id } )
    }

    function joinToChampionship( championship_id, arrayCompetitors ) {
        return $http.post('backend/api.php',
            {
                action: 'join_to_championship',
                parameters: {
                    'championship_id'         : championship_id,
                    'array_competitors_id'    : arrayCompetitors
                }
            }
        );
    }

    //CLUBS
    function getClubesList () {
        return $http.post('backend/api.php', { action: 'list_clubes' } )
    }

    function addClub( club ) {
        return $http.post('backend/api.php',
            {
                action: 'add_club',
                parameters: {
                    'id'                  : club['id'],
                    'name'                : club['name'],
                    'cif'           : club['cif'],
                    'address'                 : club['address'],
                    'email'          : club['email']
                }
            }
        );
    }

    function updateClub( club ) {
        return $http.post('backend/api.php',
            {
                action: 'update_club',
                parameters: {
                    'id'                      : club['id'],
                    'name'                    : club['name'],
                    'cif'                     : club['cif'],
                    'address'                 : club['address'],
                    'email'                   : club['email']
                }
            }
        );
    }

    function deleteClub( club_id ) {
        return $http.post('backend/api.php', { action: 'delete_club', id: club_id } )
    }

    return {
        apiMethod           : apiMethod,
        sayHello            : sayHello,
        getUsersList        : getUsersList,
        getCompetitorsList : getCompetitorsList,
        updateCompetitor : updateCompetitor,
        addCompetitor : addCompetitor,
        deleteCompetitor : deleteCompetitor,
        getChampionshipList : getChampionshipList,
        addChampionship : addChampionship,
        updateChampionship : updateChampionship,
        cerrarChampionship : cerrarChampionship,
        deleteChampionship : deleteChampionship,
        joinToChampionship : joinToChampionship,
        getClubesList : getClubesList,
        addClub : addClub,
        updateClub : updateClub,
        deleteClub : deleteClub
    }

} ] );