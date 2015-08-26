angular.module('apps', ['angular-loading-bar', 'apis'])
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
						var parentscope = parent.angular.element('[ng-controller^="index"]').scope();
						$timeout(parentscope.self.CloseIframe, 2000);
						$timeout(parentscope.$apply, 2500);
					} else {
						self.AlertError = true;
					}
				}
			});
		}
		
		self.Initialize();
	}]);