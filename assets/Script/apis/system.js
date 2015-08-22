angular.module('apis')
	.factory('systemApi', ['$http', '$window', function ($http, $window) {
		var _Site = $window['$base_url'];
		var _IsDev = !!$window['$IsDev'];
		var _JsonOutput = _Site + 'Services/System/JsonOutput';
		var _SaveMailServer = _Site + 'Services/System/SaveMailServer';
		var _SavePreference = _Site + 'Services/System/SavePreference';

		function AvoidCSRFProtection(data) {
			if (_IsDev) {
				data['csrf_test_name'] = '<?pho echo $this->security->get_csrf_hash(); ?>';
			}

			return data;
		}

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
			},
			SaveMailServer: function (options) {
				return $http({
					method: 'POST',
					url: _SaveMailServer,
					headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
					data: AvoidCSRFProtection(options.data)
				}).then(function (response) {
					options.success(response.data);
				}, function (response) {
					options.error(response.data);
				});
			},SavePreference: function (options) {
				return $http({
					method: 'GET',
					url: _SavePreference,
					params: options.params
				}).then(function (response) {
					options.success(response.data);
				}, function (response) {
					options.error(response.data);
				});
			}
		}
	}]);