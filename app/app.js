/**
 * Create app.
 */
var tkdApp = angular.module('tkdApp', ['ui.router', 'ngCookies']);

/**
 * App configuration.
 */
tkdApp.config([ '$stateProvider', '$urlRouterProvider', '$httpProvider', '$cookiesProvider', 
	function($stateProvider, $urlRouterProvider, $httpProvider, $cookiesProvider) {

		// Add request interceptor.
		$httpProvider.interceptors.push('authInterceptor');
		
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
		.state('inscribir', {
			url: "/inscribir/:id",
			templateUrl: "app/inscripciones/partials/inscribir.html",
			controller: "inscripcionController as inscripCtrl",
			params: {
				championshipName:null
			}
		})	
		.state('clubes', {
			url: "/clubes",
			templateUrl: "app/club/partials/list.html",
			controller: "clubController as clubCtrl"
		});
		
			
	}
]);

/**
 * Http Interceptor.
 */
tkdApp.factory('authInterceptor', function ($rootScope, $q, $cookies, $location, $timeout) {
	return {
		request: function (config) {
			delete $rootScope.errorKey;

			config.headers = config.headers || {};
			config.headers['X-TOKEN'] = window.sessionToken;	

			// if ($cookies.authenticationToken && $cookies.email) {
			// 	config.headers['X-AUTH-TOKEN'] = $cookies.authenticationToken;
			// 	config.headers['X-AUTH-EMAIL'] = $cookies.email;
			// }
			return config;
		},
		responseError: function (response) {
			var status = response.status;

			// user is not authenticated -> redirect
			if( status === 401) {
				$rootScope.errorKey = 'global.errors.unauthorized';
				$timeout(function () {
					$location.path('/');
				}, 3000);

			} 

			return $q.reject(response);
		}
	};
});