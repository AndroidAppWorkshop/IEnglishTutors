angular.module('apps', ['angular-loading-bar', 'apis'])
	.controller('index', ['$window', 'assetApi', function ($window, $api) {
		var _Site = $window['$base_url'];
		var self = this;

		self.JsonModel = $window['IndexJson'];
		self.Initialize = function () {
			self.JsonModel.Link.Title = _Site + self.JsonModel.Link.Title;
			self.ClearNavState();
		};

		self.Refresh = function () {
			self.ClearNavState();
			self.Asset = true;

			$api.Refresh({
				success: function (data) {
					self.ClearNavState();
				}
			});
		};

		self.SetMailServer = function () {
			self.ClearNavState();
			self.Email = true;
		};

		self.SignOut = function () {
			self.ClearNavState();
			self.Logout = true;
		};

		self.ClearNavState = function () {
			self.Asset = false;
			self.Email = false;
			self.Logout = false;
		};

		self.Initialize();
	}]);