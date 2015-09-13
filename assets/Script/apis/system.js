(function () {
	angular.module('apis')
		.factory('systemApi', systemApi);

	systemApi.$inject = ['$http', '$window'];
	function systemApi($http, $window) {
		var _Site = $window['$base_url'];
		var _IsDev = !!$window['$IsDev'];
		var _JsonOutput = _Site + 'Services/System/JsonOutput';
		var _SaveMailServer = _Site + 'Services/System/SaveMailServer';
		var _SavePreference = _Site + 'Services/System/SavePreference';
		var _GetLang = _Site + 'Services/System/GetLang';
		var _GetLangUsage = _Site + 'Services/System/GetLangUsage';
		var _UpdateLangUsage = _Site + 'Services/System/UpdateLangUsage';

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
			},
			SavePreference: function (options) {
				return $http({
					method: 'GET',
					url: _SavePreference,
					params: options.params
				}).then(function (response) {
					options.success(response.data);
				}, function (response) {
					options.error(response.data);
				});
			},
			GetLang: function (options) {
				return $http({
					method: 'GET',
					url: _GetLang,
					params: options.params
				}).then(function (response) {
					options.success(response.data);
				}, function (response) {
					options.error(response.data);
				});
			},
			GetLangUsage: function (options) {
				return $http({
					method: 'GET',
					url: _GetLangUsage,
					params: options.params
				}).then(function (response) {
					options.success(response.data);
				}, function (response) {
					options.error(response.data);
				});
			},
			UpdateLangUsage: function (options) {
				return $http({
					method: 'POST',
					url: _UpdateLangUsage,
					headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
					data: AvoidCSRFProtection(options.data)
				}).then(function (response) {
					options.success(response.data);
				}, function (response) {
					options.error(response.data);
				});
			}
		}
	}
})();