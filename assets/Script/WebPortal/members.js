(function () {
	angular.module('apps')
		.controller('members', members);

	members.$inject = ['$window', '$scope', 'membersApi'];
	function members($window, $scope, $api) {
		var _Site = $window['$base_url'];
		var _Members = _Site + 'WebPortal/Members';
		var self = this;

		self.Initialize = function () {
			self.JsonModel = $window['MembersJson'];
			self.ImgPath = '/assets/images/Members/';
			self.DefaultImg = self.ImgPath + 'null.png';
			self.All();
		};

		$scope.$watch('self.File', function () {
			if (self.File) {
				self.UploadFile(self.File);
			}
		});

		self.All = function () {
			$api.All({
				success: function (response) {
					self.AllMem = response;
				}
			});
		};

		self.ToggleEdit = function (mem) {
			mem.FormVisible = !mem.FormVisible;
		};

		self.Update = function (mem) {
			$api.Update({
				data: mem,
				success: function (response) {
					self.All();
				}
			});
		};

		self.UploadFile = function (file) {
			$api.Upload({
				file: file,
				progress: function (evt) {
					var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
					self.FileProgress = progressPercentage + '%';
				},
				success: function (data, status, headers, config) {
					$window.location.href = _Members;
				},
				error: function (data, status, headers, config) {
					console.log('error status: ' + status);
				}
			});
		};

		self.Initialize();
	}
})();