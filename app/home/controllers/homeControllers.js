tkdApp.controller('homeController', [ 'apiService', function( apiService ) {

	console.log('ctrl saludo homeController!');	
	var me = this;
	me.nombre = window.nombreUsuario;
	me.saludo = 'hola men!';
} ] );