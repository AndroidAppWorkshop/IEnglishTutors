angular.module('apis', [])
	.factory('membersApi', ['$http', '$window', function ($http, $window) {
		var _Site = $window['$base_url'];
		var _IsDev = !!$window['$IsDev'];
		var _Create = _Site + 'Services/Members/Create';
		var _Login = _Site + 'Services/Members/Login';

		function AvoidCSRFProtection(data) {
			if (_IsDev) {
				data['csrf_test_name'] = '<?pho echo $this->security->get_csrf_hash(); ?>';
			}

			return data;
		}

		return {
			Create: function (options) {
				return $http({
					method: 'POST',
					url: _Create,
					headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
					data: AvoidCSRFProtection(options.data)
				}).then(function (response) {
					options.success(response.data);
				}, function (response) {
					options.error(response.data);
				});
			},
			Login: function (options) {
				return $http({
					method: 'POST',
					url: _Login,
					headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
					data: AvoidCSRFProtection(options.data)
				}).then(function (response) {
					options.success(response.data);
				}, function (response) {
					options.error(response.data);
				});
			}
		}
	}]);