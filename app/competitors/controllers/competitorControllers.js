tkdApp.controller('competitorController', [ 'apiService', function( apiService ) {
console.log('ctrl saludo campeonatosController!');	
	var me = this;
	me.nombre = window.nombreUsuario;
	me.saludo = 'hola men!';
	

	me.competitorsList = [];
	
	apiService.sayHello(me.nombre)
	.then( function (data) {
		console.log(data.data);
	} );

 	apiService.getCompetitorsList()
	.then( function (data) {
console.log('data -- ',  angular.copy(data));		
		me.competitorsList = data.data;
me.competitorsList = [{"id":"1","name":"Javier","surname":"Romero","dni":"12345678C","birthday_date":"1995-01-17","gender":"male","liscense":"084-R017","liscense_expiry_date":"2016-06-10","club_id":"1"},{"id":"2","name":"Ainhoa","surname":"Lorza Gamarra","dni":"16111111L","birthday_date":"2001-05-15","gender":"female","liscense":"084-R021","liscense_expiry_date":"2017-05-05","club_id":"1"},{"id":"3","name":"Carlos","surname":"Garc\u00eda","dni":"1666555I","birthday_date":"1992-01-17","gender":"male","liscense":"084-R111","liscense_expiry_date":"2017-01-11","club_id":"2"},{"id":"4","name":"Leyre","surname":"Fern\u00e1ndez","dni":"16666888A","birthday_date":"2000-05-15","gender":"female","liscense":"092-R003","liscense_expiry_date":"2017-01-13","club_id":"3"},
{"id":"1","name":"Javier","surname":"Romero","dni":"12345678C","birthday_date":"1995-01-17","gender":"male","liscense":"084-R017","liscense_expiry_date":"2016-06-10","club_id":"1"},{"id":"2","name":"Ainhoa","surname":"Lorza Gamarra","dni":"16111111L","birthday_date":"2001-05-15","gender":"female","liscense":"084-R021","liscense_expiry_date":"2017-05-05","club_id":"1"},{"id":"3","name":"Carlos","surname":"Garc\u00eda","dni":"1666555I","birthday_date":"1992-01-17","gender":"male","liscense":"084-R111","liscense_expiry_date":"2017-01-11","club_id":"2"},{"id":"4","name":"Leyre","surname":"Fern\u00e1ndez","dni":"16666888A","birthday_date":"2000-05-15","gender":"female","liscense":"092-R003","liscense_expiry_date":"2017-01-13","club_id":"3"},
{"id":"1","name":"Javier","surname":"Romero","dni":"12345678C","birthday_date":"1995-01-17","gender":"male","liscense":"084-R017","liscense_expiry_date":"2016-06-10","club_id":"1"},{"id":"2","name":"Ainhoa","surname":"Lorza Gamarra","dni":"16111111L","birthday_date":"2001-05-15","gender":"female","liscense":"084-R021","liscense_expiry_date":"2017-05-05","club_id":"1"},{"id":"3","name":"Carlos","surname":"Garc\u00eda","dni":"1666555I","birthday_date":"1992-01-17","gender":"male","liscense":"084-R111","liscense_expiry_date":"2017-01-11","club_id":"2"},{"id":"4","name":"Leyre","surname":"Fern\u00e1ndez","dni":"16666888A","birthday_date":"2000-05-15","gender":"female","liscense":"092-R003","liscense_expiry_date":"2017-01-13","club_id":"3"},
{"id":"1","name":"Javier","surname":"Romero","dni":"12345678C","birthday_date":"1995-01-17","gender":"male","liscense":"084-R017","liscense_expiry_date":"2016-06-10","club_id":"1"},{"id":"2","name":"Ainhoa","surname":"Lorza Gamarra","dni":"16111111L","birthday_date":"2001-05-15","gender":"female","liscense":"084-R021","liscense_expiry_date":"2017-05-05","club_id":"1"},{"id":"3","name":"Carlos","surname":"Garc\u00eda","dni":"1666555I","birthday_date":"1992-01-17","gender":"male","liscense":"084-R111","liscense_expiry_date":"2017-01-11","club_id":"2"},{"id":"4","name":"Leyre","surname":"Fern\u00e1ndez","dni":"16666888A","birthday_date":"2000-05-15","gender":"female","liscense":"092-R003","liscense_expiry_date":"2017-01-13","club_id":"3"},
{"id":"1","name":"Javier","surname":"Romero","dni":"12345678C","birthday_date":"1995-01-17","gender":"male","liscense":"084-R017","liscense_expiry_date":"2016-06-10","club_id":"1"},{"id":"2","name":"Ainhoa","surname":"Lorza Gamarra","dni":"16111111L","birthday_date":"2001-05-15","gender":"female","liscense":"084-R021","liscense_expiry_date":"2017-05-05","club_id":"1"},{"id":"3","name":"Carlos","surname":"Garc\u00eda","dni":"1666555I","birthday_date":"1992-01-17","gender":"male","liscense":"084-R111","liscense_expiry_date":"2017-01-11","club_id":"2"},{"id":"4","name":"Leyre","surname":"Fern\u00e1ndez","dni":"16666888A","birthday_date":"2000-05-15","gender":"female","liscense":"092-R003","liscense_expiry_date":"2017-01-13","club_id":"3"},
{"id":"1","name":"Javier","surname":"Romero","dni":"12345678C","birthday_date":"1995-01-17","gender":"male","liscense":"084-R017","liscense_expiry_date":"2016-06-10","club_id":"1"},{"id":"2","name":"Ainhoa","surname":"Lorza Gamarra","dni":"16111111L","birthday_date":"2001-05-15","gender":"female","liscense":"084-R021","liscense_expiry_date":"2017-05-05","club_id":"1"},{"id":"3","name":"Carlos","surname":"Garc\u00eda","dni":"1666555I","birthday_date":"1992-01-17","gender":"male","liscense":"084-R111","liscense_expiry_date":"2017-01-11","club_id":"2"},{"id":"4","name":"Leyre","surname":"Fern\u00e1ndez","dni":"16666888A","birthday_date":"2000-05-15","gender":"female","liscense":"092-R003","liscense_expiry_date":"2017-01-13","club_id":"3"},
{"id":"1","name":"Javier","surname":"Romero","dni":"12345678C","birthday_date":"1995-01-17","gender":"male","liscense":"084-R017","liscense_expiry_date":"2016-06-10","club_id":"1"},{"id":"2","name":"Ainhoa","surname":"Lorza Gamarra","dni":"16111111L","birthday_date":"2001-05-15","gender":"female","liscense":"084-R021","liscense_expiry_date":"2017-05-05","club_id":"1"},{"id":"3","name":"Carlos","surname":"Garc\u00eda","dni":"1666555I","birthday_date":"1992-01-17","gender":"male","liscense":"084-R111","liscense_expiry_date":"2017-01-11","club_id":"2"},{"id":"4","name":"Leyre","surname":"Fern\u00e1ndez","dni":"16666888A","birthday_date":"2000-05-15","gender":"female","liscense":"092-R003","liscense_expiry_date":"2017-01-13","club_id":"3"}]		

	} );

	me.selectCompetitor = function ( competitor ) {
		angular.forEach(me.competitorsList, function (tmpComp) {
			tmpComp.selected = false;
		});
		competitor.selected = true;
		me.selectedCompetitor = angular.copy( competitor );
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