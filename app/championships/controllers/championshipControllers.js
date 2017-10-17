tkdApp.controller('championshipController', [ 'apiService', function( apiService ) {
console.log('ctrl saludo campeonatosController!');	
	var me = this;
	me.nombre = window.nombreUsuario;
	me.saludo = 'hola men!';
	
	
	apiService.sayHello(me.nombre)
	.then( function (data) {
		console.log(data.data);
	} );

	apiService.getUsersList()
	.then( function (data) {
		console.log(data.data);
	} );
	
 	apiService.getCompetitorsList()
	.then( function (data) {
		console.log(data.data);
	} );
 

	
	
	
	
} ] );