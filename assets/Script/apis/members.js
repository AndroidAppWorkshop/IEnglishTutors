angular.module('apis')
	.factory('membersApi', ['$http', '$window', 'Upload', function ($http, $window, $upload) {
		var _Site = $window['$base_url'];
		var _IsDev = !!$window['$IsDev'];
		var _Create = _Site + 'Services/Members/Create';
		var _Login = _Site + 'Services/Members/Login';
		var _Logout = _Site + 'Services/Members/Logout';
		var _All = _Site + 'Services/Members/All';
		var _Update = _Site + 'Services/Members/Update';
		var _UpdatePhoto = _Site + 'Services/Members/UpdatePhoto';

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
			},
			Logout: function (options) {
				return $http({
					method: 'GET',
					url: _Logout,
					params: options.params
				}).then(function (response) {
					options.success(response.data);
				},function(response){
					options.error(response.data);
				});
			},
			All: function (options) {
				return $http({
					method: 'GET',
					url: _All,
					params: options.params
				}).then(function (response) {
					options.success(response.data);
				},function(response){
					options.error(response.data);
				});
			},
			Update: function (options) {
				return $http({
					method: 'POST',
					url: _Update,
					headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
					data: AvoidCSRFProtection(options.data)
				}).then(function (response) {
					options.success(response.data);
				},function(response){
					options.error(response.data);
				});
			},
			Upload: function (options) {
				return $upload.upload({
					url: _UpdatePhoto,
					file: options.file
				}).progress(function (evt) {
					options.progress(evt);
				}).success(function (data, status, headers, config) {
					options.success(data, status, headers, config);
				}).error(function (data, status, headers, config) {
					options.error(data, status, headers, config)
				});
			}
		}
	}]);