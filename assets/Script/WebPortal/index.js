angular.module('apps', ['angular-loading-bar', 'apis'])
	.controller('index', ['$window', '$timeout', 'assetApi', 'membersApi', function ($window, $timeout, $assetApi, $membersApi) {
		var _Site = $window['$base_url'];
		var _Login = _Site + 'WebPortal/Login';
		var _MailServerSetting = _Site + 'WebPortal/MailServerSetting';
		var self = this;
		var goLogin = function () {
			$window.location.href = _Login;
		};

		self.JsonModel = $window['IndexJson'];
		self.Initialize = function () {
			self.JsonModel.Link.Title = _Site + self.JsonModel.Link.Title;
			self.ClearNavState();
		};

		self.Refresh = function () {
			self.ClearNavState();
			self.ActiveAsset = true;

			$assetApi.Refresh({
				success: function (data) {
					self.ClearNavState();
				}
			});
		};

		self.SetMailServer = function () {
			self.ClearNavState();
			self.ActiveEmail = true;
			self.iframePath = _MailServerSetting;
		};

		self.SignOut = function () {
			self.ClearNavState();
			self.ActiveLogout = true;
			
			$membersApi.Logout({
				success: function(data) {
					self.ClearNavState();
					$('#modal-success').modal('show');
					$timeout(goLogin, 1500);
				}
			});
		};

		self.ClearNavState = function () {
			self.ActiveAsset = false;
			self.ActiveEmail = false;
			self.ActiveLogout = false;
		};

		self.Initialize();
	}]);