angular.module('modal', ['angular-loading-bar', 'apis'])
	.controller('mailserversetting', ['$window', '$timeout', 'systemApi', function ($window, $timeout, $api) {
		var self = this;

		self.Initialize = function () {
			self.JsonModel = $window['MailServerSettingJson'];
			self.AlertSuccess = false;
			self.AlertError = false;
		};

		self.SaveMailServer = function () {
			$api.SaveMailServer({
				data: self.Config,
				success: function (response) {
					if (response.Success) {
						self.AlertSuccess = true;
						$timeout(self.Close, 2500);
					} else {
						self.AlertError = true;
					}
				}
			});
		}

		self.Close = function () {
			var parentscope = parent.angular.element('[ng-controller^="index"]').scope();
			parentscope.self.iframePath = '';
			parentscope.self.ActiveEmail = false;
			parentscope.$apply();
		};
		
		self.Initialize();
	}]);