tkdApp.controller('competitorController', [ 'apiService', function( apiService ) {
console.log('ctrl saludo campeonatosController!');
	var me = this;

	me.competitorsList = [];
	me.showTable       = true;

	apiService.sayHello(me.nombre)
	.then( function (data) {
		console.log(data.data);
	} );

 	apiService.getCompetitorsList()
	.then( function (data) {

		me.competitorsList = data.data;

	} );

	me.selectCompetitor = function ( competitor ) {
		me.showDetail       = false;
		me.selectedCompetitor = undefined;
		angular.forEach(me.competitorsList, function (tmpComp) {
			tmpComp.selected = false;
		});

		if ( competitor ) {

			competitor.selected                    = true;
			me.selectedCompetitor                  = angular.copy( competitor );
			me.selectedCompetitor.birthday_date    = new Date( competitor.birthday_date ).toLocaleDateString();
			me.selectedCompetitor.public_name      = angular.copy(competitor.name);
			me.selectedCompetitor.public_last_name = angular.copy(competitor.last_name);
			me.showDetail                          = true;
		}

	};

	me.addNewCompetitor = function ( competitor ) {

		me.selectedCompetitor = undefined;
		me.showTable          = false;
		me.showDetail         = true;

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

	me.updateCompetitor = function () {
		apiService.updateCompetitor(me.selectedCompetitor)
		.then( function (data) {
			console.log(data.data);
		} );
	}


	me.deleteCompetitor = function (id) {
		apiService.deleteCompetitor(id)
		.then( function (data) {
			console.log(data.data);
		} );
	}

	me.addCompetitor = function () {
		me.showTable = true;
		apiService.addCompetitor(me.selectedCompetitor)
		.then( function (data) {
			console.log(data.data);
		} );
	}





} ] );