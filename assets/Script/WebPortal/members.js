angular.module('apps', [])
	.controller('members', ['$window', function ($window) {
		var self = this;

		self.Initialize = function () {
			// self.JsonModel = $window['MembersJson'];
			angular.element('[data-toggle="popover"]').popover();
		};
		
		self.Initialize();
	}]);