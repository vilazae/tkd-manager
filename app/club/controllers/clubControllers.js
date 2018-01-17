tkdApp.controller('clubController', [ 'apiService', function( apiService ) {

	console.log('ctrl saludo clubController!');	
	var me = this;
	me.nombre = window.nombreUsuario;
	me.saludo = 'hola men!';
} ] );