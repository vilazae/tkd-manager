tkdApp.controller('championshipController', [ 'apiService', function( apiService ) {
console.log('ctrl saludo campeonatosController!');	
	var me = this;
	
	me.championshipList = [];	
	
	apiService.sayHello(me.nombre)
	.then( function (data) {
		console.log(data.data);
	} );

	apiService.getChampionshipList()
	.then( function (data) {
console.log('data -- ',  angular.copy(data));		
		me.championshipList = data.data;
		me.championshipList = [{"id":"1","name":"Campeonato Pokemon","date":"2018-09-20","lugar":"Logroño","abierto":"1"},
{"id":"2","name":"Campeonato Chester","date":"2018-09-20","lugar":"El Chester","abierto":"1"}]		

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