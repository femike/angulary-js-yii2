app.controller('postIndex', ['$scope', 'rest', '$location', '$route', function ($scope, rest, $location, $route) {
        rest.url = '/api/posts';
        var errorCallback = function (data) {
            console.log(data.message);
        };

        $scope.delete = function (id) {
            rest.deleteById({id: id}).success(function () {
                $location.path('/post');
                $route.reload();
            }).error(errorCallback);
        }

        rest.models().success(function (data) {
            $scope.posts = data;
        }).error(errorCallback);
    }])
    .controller('postView', ['$scope', 'rest', function ($scope, rest) {
        rest.url = '/api/posts';
        var errorCallback = function (data) {
            console.log(data.message);
        };

        rest.model().success(function (data) {
            $scope.post = data;
        }).error(errorCallback);
    }])
    .controller('postForm', ['$scope', 'rest', '$location', function ($scope, rest, $location) {
        rest.url = '/api/posts';

        $scope.save = function () {
            rest.putModel($scope.post).success(function () {
                $location.path('post/' + $scope.post.id);
            }).error(errorCallback);
        };

        rest.model().success(function (data) {
            $scope.post = data;
        }).error(errorCallback);

        var errorCallback = function (data) {
            data.map(function (el) {
                alert(el.message);
            })
        };
    }])
    .controller('postCreate', ['$scope', 'rest', '$location', function ($scope, rest, $location) {
        rest.url = '/api/posts';

        $scope.post = {};

        $scope.save = function () {
            rest.postModel($scope.post).success(function (data) {
                $location.path('post/' + data.id);
            }).error(errorCallback);
        };

        var errorCallback = function (data) {
            data.map(function (el) {
                alert(el.message);
            })
        };
    }])
    .controller('postDelete', ['$scope', 'rest', '$location', function ($scope, rest, $location) {
        rest.url = '/api/posts';

        rest.deleteModel($scope.post).success(function () {
            $location.path('/post');
        }).error(errorCallback);

        var errorCallback = function (data) {
            data.map(function (el) {
                alert(el.message);
            })
        };
    }])

app.directive('ngConfirmClick', [
    function () {
        return {
            priority: 1,
            terminal: true,
            link: function (scope, element, attr) {
                var msg = attr.ngConfirmClick || "Are you sure?";
                var clickAction = attr.ngClick;
                element.bind('click', function (event) {
                    if (window.confirm(msg)) {
                        scope.$eval(clickAction)
                    }
                });
            }
        };
    }])
