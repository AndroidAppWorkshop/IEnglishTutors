angular.module('apps', ['angular-loading-bar', 'apis'])
	.controller('index', ['$window', '$timeout', 'assetApi', 'membersApi', 'systemApi', function ($window, $timeout, $assetApi, $membersApi, $systemApi) {
		var _Site = $window['$base_url'];
		var _Login = _Site + 'WebPortal/Login';
		var _MailServerSetting = _Site + 'WebPortal/MailServerSetting';
		var self = this;
		var goLogin = function () {
			$window.location.href = _Login;
		};

		self.Initialize = function () {
			self.JsonModel = $window['IndexJson'];
			self.JsonModel.Link.Title = _Site + self.JsonModel.Link.Title;
			self.ClearNavState();
			self.CurrentLang = $window['$CurrentLang'];
			self.Preference = $window['Preference'];
			self.Nav = self.GetNav(self.JsonModel.SideBarMenu);
		};

		self.Refresh = function () {
			self.ClearNavState();
			self.ActiveAsset = true;

			$assetApi.Refresh({
				success: function () {
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
				success: function () {
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

		self.ChangeLang = function () {
			$systemApi.SavePreference({
				params: { language: self.CurrentLang },
				success: function (data) {
					$window.location.reload();
				}
			});
		};

		self.GetNav = function (SideBar) {
			var result = [];
			
			SideBar.forEach(function (element) {
				element.Button.forEach(function (ele) {
					result.push(ele);
				});
			});
			
			return result;
		};

		self.Initialize();
	}]);