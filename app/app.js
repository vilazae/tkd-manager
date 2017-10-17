// app.js
var tkdApp = angular.module('tkdApp', ['ui.router', 'ngCookies']);

tkdApp.config([ '$stateProvider', '$urlRouterProvider', '$httpProvider', '$cookiesProvider', 
	function($stateProvider, $urlRouterProvider, $httpProvider, $cookiesProvider) {

		// INTERCEPTOR
		$httpProvider.interceptors.push('authInterceptor');
		// $httpProvider.defaults.headers['X-TOKEN'] = 
	
		console.log($httpProvider.defaults);
		
		$urlRouterProvider.otherwise('/home');

		$stateProvider
		.state('home', {
			url: "/home",
			templateUrl: "app/home/partials/home.html",
			controller: "homeController as homeCtrl"
		})
		.state('campeonatos', {
			url: "/campeonatos",
			templateUrl: "app/championships/partials/list.html",
			controller: "championshipController as campCtrl"
		})
		.state('competidores', {
			url: "/competidores",
			templateUrl: "app/competitors/partials/list.html",
			controller: "competitorController as compCtrl"
		})	
		.state('datos-club', {
			url: "/datos_club",
			templateUrl: "club/partials/info_club.html",
			controller: "clubController as clubCtrl"
		});
		
			
	}
]);

// INTERCEPTOR
tkdApp.factory('authInterceptor', function ($rootScope, $q, $cookies, $location, $timeout) {
	return {
		request: function (config) {
			delete $rootScope.errorKey;

			config.headers = config.headers || {};
// console.log($cookies.getAll())			
config.headers['VMLAZARO-TOKEN'] = 'SpecialToken';	

			if ($cookies.authenticationToken && $cookies.email) {
				config.headers['X-AUTH-TOKEN'] = $cookies.authenticationToken;
				config.headers['X-AUTH-EMAIL'] = $cookies.email;
			}
			return config;
		},
		responseError: function (response) {
			var status = response.status;

		// user is not authenticated -> redirect
		if(status === 401) {
			$rootScope.errorKey = 'global.errors.unauthorized';
			$timeout(function () {
				$location.path('/');
			}, 3000);

			// ignore form validation errors because there are handled in the specific controller
		} else if(status !== 0 && angular.isUndefined(response.data.errors)) {

		// server error
			if(response.data.text) {
				$rootScope.errorKey = response.data.text;
			} else {
				$rootScope.showErrorMsg = true; // general error message
				$timeout(function() {
					$rootScope.showErrorMsg = false;
				}, 5000);
			}
		}

		return $q.reject(response);
		}
	};
});




tkdApp.controller('homeController', [ function() {
console.log('ctrl saludo homeController!');	
	var me = this;
	me.nombre = window.nombreUsuario;
	me.saludo = 'hola men!';
} ] );

// tkdApp.controller('campeonatosController', [ '$http', function($http) {
// console.log('ctrl saludo campeonatosController!');	
// 	var me = this;
// 	me.nombre = window.nombreUsuario;
// 	me.saludo = 'hola men!';
// 	    $http.post('backend/api.php', { action: 'say_hello', name: me.nombre } )
// 		.success(function(data) {
// 				console.log(data)
// 			})
// 		.error(function(error) {
// 				console.log('Error: ' + error);
// 		});
 
	
	
	
	
	
// } ] );


tkdApp.controller('clubController', [ function() {
console.log('ctrl saludo clubController!');	
	var me = this;
	me.nombre = window.nombreUsuario;
	me.saludo = 'hola men!';
} ] );


// img.img-circle.img-responsive.img-center:hover {
    // border: 1px solid grey;
// }
// img.img-circle.img-responsive.img-center {
    // display: initial;
    // margin-left: 14px;
    // border: 1px solid black;
// }