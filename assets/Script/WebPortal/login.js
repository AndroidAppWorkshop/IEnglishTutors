angular.module('apps', ['angular-loading-bar', 'apis'])
	.controller('login', ['$window', '$timeout', 'membersApi', function ($window, $timeout, $api) {
		var _Site = $window['$base_url'];
		var self = this;
		var goWebPortal = function () {
			$window.location.href = _Site + 'WebPortal';
		};
		
		self.Initialize = function () {
			self.JsonModel = $window['LoginJson'];
		};

		self.Login = function () {
			$api.Login({
				data: self.Member,
				success: function (data) {
					if (data.Success) {
						$('#modal-success').modal('show');
						$timeout(goWebPortal, 2000);
					} else {
						$('#modal-error').modal('show');
					}
				}
			});
		};

		self.Register = function () {
			$api.Create({
				data: self.NewMember,
				success: function (data) {
					if (data.Success) {
						$('#modal-success').modal('show');
						$timeout(goWebPortal, 2000);
					} else {
						$('#modal-error').modal('show');
					}
				}
			});
		}
		
		self.Initialize();
	}]);