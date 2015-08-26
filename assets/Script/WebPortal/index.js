angular.module('apps', ['angular-loading-bar', 'apis'])
	.controller('index', ['$window', '$timeout', 'assetApi', 'membersApi', 'systemApi', function ($window, $timeout, $assetApi, $membersApi, $systemApi) {
		var _Site = $window['$base_url'];
		var _Login = _Site + 'WebPortal/Login';
		var self = this;
		var goLogin = function () {
			$window.location.href = _Login;
		};

		self.Initialize = function () {
			self.JsonModel = $window['IndexJson'];
			self.JsonModel.Link.Title = _Site + self.JsonModel.Link.Title;
			self.CurrentLang = $window['$CurrentLang'];
			self.Preference = $window['Preference'];
			self.Nav = self.GetNav(self.JsonModel.SideBarMenu);
		};

		self.Refresh = function () {
			$assetApi.Refresh({
				success: function () {
				}
			});
		};

		self.CloseIframe = function () {
			self.iframePath = '';
		};

		self.ChangeIframePath = function (item) {
			if (item.Link) {
				self.iframePath = _Site + item.Link;
			} else if (item.Func) {
				self[item.Func]();
			}
			
			return false;
		};

		self.SignOut = function () {
			$membersApi.Logout({
				success: function () {
					$('#modal-success').modal('show');
					$timeout(goLogin, 1500);
				}
			});
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