var app = angular.module('myApp', ['ngRoute', 'ngAnimate', 'ui.bootstrap']);

app.config(['$locationProvider', '$routeProvider', '$httpProvider', function ($locationProvider, $routeProvider, $httpProvider) {

    var path = '/templates/';

    $routeProvider

        .when('/', {
            templateUrl: '/site/template-index',
            controller: 'index',
        })

        .when('/site/index', {
            templateUrl: '/site/template-index',
            controller: 'index'
        })

        .when('/post', {
            templateUrl: path + 'post/index.html',
            controller: 'postIndex'
        })

        .when('/post/create', {
            templateUrl: path + 'post/form.html',
            controller: 'postCreate'
        })

        .when('/post/delete/:id', {
            controller: 'postDelete'
        })

        .when('/post/:id', {
            templateUrl: path + 'post/view.html',
            controller: 'postView'
        })

        .when('/post/update/:id', {
            templateUrl: path + 'post/form.html',
            controller: 'postForm'
        })

        .when('/site/error', {
            templateUrl: path + 'site/error.html',
            controller: 'error'
        })

        .otherwise({
            redirectTo: '/site/error'
        });

    $locationProvider.html5Mode(true).hashPrefix('!');
}]);

app.controller('index', ['$scope', function ($scope) {
    $scope.data = {
        message: "Index page"
    };
}]);

app.controller('error', ['$scope', function ($scope) {
    $scope.error = {
        code: 404,
        message: "The above error occurred while the Web server was processing your request."
    };
}]);

app.service('rest', function ($http, $location, $routeParams) {
    return {
        url: undefined,
        models: function () {
            return $http.get(this.url + location.search);
        },
        model: function () {
            return $http.get(this.url + "/" + $routeParams.id);
        },
        get: function () {
            return $http.get(this.url);
        },
        postModel: function (model) {
            return $http.post(this.url, model);
        },
        putModel: function (model) {
            return $http.put(this.url + "/" + $routeParams.id, model);
        },
        deleteModel: function (model) {
            return $http.delete(this.url + "/" + $routeParams.id, model);
        },
        deleteById: function (model) {
            return $http.delete(this.url + "/" + model.id, model);
        }
    };
});