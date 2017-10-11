tkdApp.controller('championshipController', [ 'apiService', function( apiService ) {

	console.log('ctrl saludo campeonatosController!');	
	var me = this;
	me.nombre = window.nombreUsuario;
	me.saludo = 'hola ' + me.nombre;
	me.championshipList = [];
	me.showTable       = true;
	
	apiService.getChampionshipList()
	.then( function (data) {		
		me.championshipList = data.data;
		console.log("Te paso la lista:");
		console.log(data.data);
	} );

	/*me.selectChampionshipList = function ( campeonato ) {
		angular.forEach(me.championshipList, function (tmpChampionship) {
			tmpChampionship.selected = false;
		});
		campeonato.selected = true;
		me.selectedChampionship = angular.copy( campeonato );
		me.showDetail = true;

	};*/

	me.selectChampionship = function ( campeonato ) {
		me.showDetail       = false;
		me.selectedChampionship = undefined;
		angular.forEach(me.championshipList, function (tmpCamp) {
			tmpCamp.selected = false;
		});

		if ( campeonato ) {

			campeonato.selected                      = true;
			me.selectedChampionship                  = angular.copy( campeonato );
			me.selectedChampionship.name             = angular.copy(campeonato.name);
			me.selectedChampionship.date             = new Date( campeonato.date ).toLocaleDateString();
			me.selectedChampionship.lugar            = angular.copy(campeonato.lugar);
			me.selectedChampionship.abierto          = angular.copy(campeonato.abierto);
			me.showDetail                          = true;
		}

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

	me.updateChampionship = function () {
		apiService.updateChampionship(me.selectedChampionship)
		.then( function (data) {
			console.log(data.data);
		} );
	}

	me.cerrarChampionship = function (campeonato) {
		apiService.cerrarChampionship(campeonato)
		.then( function (data) {
			console.log(data.data);
		} );
	}

	me.deleteChampionship = function (id) {
		apiService.deleteChampionship(id)
		.then( function (data) {
			console.log(data.data);
		} );
	}
	
	me.addNewChampionship = function ( campeonato ) {

		me.selectedChampionship = undefined;
		me.showTable          = false;
		me.showDetail         = true;

	};

	me.addChampionship = function () {
		me.showTable = true;
		apiService.addChampionship(me.selectedChampionship)
		.then( function (data) {
			console.log(data.data);
		} );
	}
	
} ] );