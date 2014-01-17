'use strict';

var app = angular.module('NasdApp', ['ui.compat', 'nasd.controllers', 'nasd.services', 'nasd.directives', 'nasd.filters']);
app.config(function($routeProvider, $interpolateProvider) {
    $interpolateProvider.startSymbol('{[{');
    $interpolateProvider.endSymbol('}]}');
    
    $routeProvider.when('/view1', {
        templateUrl: '/angular/bundles/frontend/partials/partial1.html', 
        controller: 'MyCtrl1'
    });
    $routeProvider.when('/view2', {
        templateUrl: '/angular/bundles/frontend/partials/partial2.html', 
        controller: 'MyCtrl2'
    });
    $routeProvider.otherwise(
        {redirectTo: '/view1'});
});