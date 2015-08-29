angular.module('apps', ['angular-loading-bar', 'apis'])
	.controller('members', ['$window', 'membersApi', function ($window, $api) {
		var self = this;

		self.Initialize = function () {
			self.JsonModel = $window['MembersJson'];
			self.ImgPath = '/assets/images/Members/';
			self.DefaultImg = self.ImgPath + 'null.png';
			angular.element('[data-toggle="popover"]').popover();
			self.All();
		};
		
		self.All = function () {
			$api.All({
				success: function (response) {
					self.AllMem = response;
				}
			});
		};
		
		self.ToggleEdit = function(mem) {
			mem.FormVisible = !mem.FormVisible;
		};
		
		self.Update = function(mem) {
			console.log(mem);
		};
		
		self.Initialize();
	}]);