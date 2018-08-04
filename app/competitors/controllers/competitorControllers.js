tkdApp.controller('competitorController', [ 'apiService', function( apiService ) {
console.log('ctrl saludo campeonatosController!');
	var me = this;

	me.competitorsList = [];

	apiService.sayHello(me.nombre)
	.then( function (data) {
		console.log(data.data);
	} );

 	apiService.getCompetitorsList()
	.then( function (data) {

		me.competitorsList = data.data;

	} );

	me.selectCompetitor = function ( competitor ) {
		angular.forEach(me.competitorsList, function (tmpComp) {
			tmpComp.selected = false;
		});
		competitor.selected = true;
		competitor.birthday_date = new Date( competitor.birthday_date ).toLocaleDateString();
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

	me.updateCompetitor = function () {
		console.log('update')
		apiService.updateCompetitor(me.selectedCompetitor)
		.then( function (data) {
			console.log(data.data);
		} );
	}

	me.deleteCompetitor = function () {
		console.log('deleteCompetitor')
		apiService.deleteCompetitor(me.selectedCompetitor.id)
		.then( function (data) {
			console.log(data.data);
		} );
	}

	me.addCompetitor = function () {
		console.log('addCompetitor')
		apiService.addCompetitor(competitor)
		.then( function (data) {
			console.log(data.data);
		} );
	}





} ] );