angular.module('apis', [])
	.factory('systemApi', ['$http', '$window', function ($http, $window) {
		var _Site = $window['$base_url'];
		var _JsonOutput = _Site + 'Services/System/JsonOutput';

		return {
			JsonOutput: function (options) {
				return $http({
					method: 'GET',
					url: _JsonOutput,
					params: options.params
				}).then(function (response) {
					options.success(response.data);
				}, function (response) {
					options.error(response.data);
				});
			}
		}
	}]);