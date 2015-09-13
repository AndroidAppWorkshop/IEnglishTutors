(function () {
	angular.module('apps')
		.controller('mailserversetting', mailserversetting);

	mailserversetting.$inject = ['$window', '$timeout', 'systemApi'];
	function mailserversetting($window, $timeout, $api) {
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
						$timeout(function () {
							parentscope.$apply(function () {
								parentscope.self.CloseIframe();
							})
						}, 1000);
					} else {
						self.AlertError = true;
					}
				}
			});
		}

		self.Initialize();
	}
})();