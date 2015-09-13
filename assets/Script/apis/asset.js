(function () {
	angular.module('apis')
		.factory('assetApi', assetApi);

	assetApi.$inject = ['$http', '$window'];
	function assetApi($http, $window) {
		var _Site = $window['$base_url'];
		var _Refresh = _Site + 'Services/Asset/Refresh';

		return {
			Refresh: function (options) {
				return $http({
					method: 'GET',
					url: _Refresh,
					params: options.params
				}).then(function (response) {
					options.success(response.data);
				}, function (response) {
					options.error(response.data);
				});
			}
		}
	}
})();