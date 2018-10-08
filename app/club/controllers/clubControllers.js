tkdApp.controller('clubController', [ 'apiService', function( apiService ) {

	console.log('ctrl saludo clubController!');	
	var me = this;
	me.nombre = window.nombreUsuario;
	me.saludo = 'hola men!';
	me.clubesList = [];

	apiService.getClubesList()
	.then( function (data) {		
		me.clubesList = data.data;
		console.log(data.data);
	} );

	me.selectClub = function ( club ) {
		angular.forEach(me.clubesList, function (tmpClub) {
			tmpClub.selected = false;
		});
		club.selected = true;
		me.selectedClub = angular.copy( club );
		me.showDetail = true;

	};

	me.enterEdit = function ( ) {
		me.edit = true;
	};

	me.aceptEdition = function ( event ) {
		if ( event.which === 13 ) {
			me.edit = false;
		}
	};
 
 	me.cancelUpdate = function () {
		me.selectCompetitor( undefined );
	};

	me.updateClub = function () {
		apiService.updateClub(me.selectedClub)
		.then( function (data) {
			console.log(data.data);
		} );
	}

	me.deleteClub = function (id) {
		apiService.deleteClub(id)
		.then( function (data) {
			console.log(data.data);
		} );
	}
	
	me.addNewClub = function ( club ) {

		me.selectedClub = undefined;
		me.showTable          = false;
		me.showDetail         = true;

	};

	me.addClub = function () {
		me.showTable = true;
		apiService.addClub(me.selectedClub)
		.then( function (data) {
			console.log(data.data);
		} );
	}
	
} ] );