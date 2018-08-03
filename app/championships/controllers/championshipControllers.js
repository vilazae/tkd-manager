tkdApp.controller('championshipController', [ 'apiService', function( apiService ) {
console.log('ctrl saludo campeonatosController!');	
	var me = this;
	me.nombre = window.nombreUsuario;
	me.saludo = 'hola ' + me.nombre;
	me.championshipList = [];
	
	apiService.sayHello(me.nombre)
	.then( function (data) {
		console.log(data.data);
	} );
	
 	apiService.getChampionshipList()
	.then( function (data) {
		console.log(data.data);
		me.championshipList = data.data;
	} );
 
	me.selectChampionship = function ( championship ) {
		angular.forEach(me.championshipList, function (tmpChamp) {
			tmpChamp.selected = false;
		});
		championship.selected = true;
		me.selectedChampionship = angular.copy( championship );
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
	
	
} ] );