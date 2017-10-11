tkdApp.controller('inscripcionController', [ 'apiService', '$state', '$stateParams', function( apiService, $state, $stateParams ) {
console.log('ctrl saludo inscripcionController!', $state);
console.log($stateParams)
	var me = this;

	me.inscripscionesList = [];
	me.showTable       = true;

	me.championshipId = $state.params.id;
	me.championshipName = $state.params.championshipName;

 	apiService.getCompetitorsList()
	.then( function (data) {

		me.inscripscionesList = data.data;

	} );

	/**
	 *	Add the selected competitors to the current Championship.
	 */
	me.addToChampionship = function () {

		var userIs = [];
		angular.forEach( me.inscripscionesList, function( competitor ) {
			if ( competitor.selected ) {
				userIs.push( competitor.id );
			}

		} );

		//	Check if there is any selected.
		if ( userIs.length > 0 ) {
 			apiService.joinToChampionship( me.championshipId, userIs )
 			.then( function( response ) {
 				alert( "Los competidores fueron añadidos con éxito!")
 			} ).catch( function ( error ) {
 				console.error( error )
 			})
			
		}

	};


} ] );