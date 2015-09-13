(function () {
	angular.module('apps')
		.controller('viewresources', viewresources);

	viewresources.$inject = ['$window', '$timeout', 'systemApi'];
	function viewresources($window, $timeout, $api) {
		var self = this;

		self.Initialize = function () {
			self.JsonModel = $window['ViewResourcesJson'];
			self.GetLang();
		};

		self.GetLang = function () {
			$api.GetLang({
				success: function (data) {
					self.Category = data;
				}
			});
		};

		self.GetLangUsage = function (category) {
			if (!!category.Usage) {
				category.Usage = null;
			} else {
				$api.GetLangUsage({
					params: { id: category.Id },
					success: function (data) {
						category.Usage = data;
					}
				});
			}
		};

		self.ChangeFormModel = function (usage) {
			self.FormModel = usage;
		};

		self.UpdateLangUsage = function () {
			$api.UpdateLangUsage({
				data: self.FormModel,
				success: function (response) {
					if (response.Success) {
						self.GetLang();
					}
				}
			});
		};

		self.Initialize();
	}
})();