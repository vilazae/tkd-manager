tkdApp.controller('clubController', [ 'apiService', function( apiService ) {

	console.log('ctrl saludo clubController!');	
	var me = this;
	me.nombre = window.nombreUsuario;
	me.saludo = 'hola men!';
	me.clubesList = [];

	apiService.getClubesList()
	.then( function (data) {
console.log('data -- ',  angular.copy(data));		
		me.clubesList = data.data;
me.clubesList = [{"id":"1","name":"Club Kim Taekwondo","cif":"16161616F","address":"C\ Duquesa de la Victoria 9 Bajo","email":"clubkim@gmail.com"},{"id":"1","name":"Club Kim Taekwondo","cif":"16161616F","address":"C\ Duquesa de la Victoria 9 Bajo","email":"clubkim@gmail.com"}
		

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
 

	
	
	
	
} ] );