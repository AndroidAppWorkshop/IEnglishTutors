angular.module('apps', ['angular-loading-bar', 'apis'])
	.controller('members', ['$window', 'membersApi', function ($window, $api) {
		var self = this;

		self.Initialize = function () {
			self.JsonModel = $window['MembersJson'];
			self.ImgPath = '/assets/images/Members/';
			self.DefaultImg = self.ImgPath + 'null.png';
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
			$api.Update({
				data: mem,
				success: function(response) {
					self.All();
				}
			});
		};
		
		self.Initialize();
	}]);