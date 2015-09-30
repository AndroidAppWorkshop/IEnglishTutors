(function () {
	angular.module('apps.file', ['angular-loading-bar', 'apis', 'mwl.calendar', 'ui.bootstrap', 'ngAnimate'])
		.controller('filemanage', filemanage);

	filemanage.$inject = ['$window', '$scope', 'agendaApi', 'moment'];
	function filemanage($window, $scope, $api, moment) {
		var self = this;
		self.$api = $api;

		self.Initialize = function () {
			self.JsonModel = $window['FileManageJson'];
			self.NewCourse = new Course();

			$('.new-course, .edit-course').on('hidden.bs.modal', function (e) {
				$scope.$apply(function () { self.ClearCourse(); });
			})
			
			//angular-bootstrap-calendar
			self.GetAll();
			self.calendarDay = new Date();
			self.calendarView = 'month';

			self.eventClicked = function (event) {
				$('.edit-course').modal('show');
				self.EditCourse = new Course(event);
			};

			self.eventEdited = function (event) {
				$('.edit-course').modal('show');
				self.EditCourse = new Course(event);
			};

			self.eventDeleted = function (event) {
				console.log(event);
			};

			self.eventTimesChanged = function (event) {
				console.log(event);
			};
		};

		self.AddCourse = function () {
			self.NewCourse.Clickable = false;
			$api.Add({
				data: self.NewCourse,
				success: function (data) {
					var id = data.id;
					if (data.Success) {
						angular.forEach(self.Files, function (value) {
							$api.Upload({
								file: value,
								fields: { Id: id },
								progress: function (evt) {
									var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
									value.progress = progressPercentage + '%';
								},
								success: function (data, status, headers, config) {
									// console.log(data);
								},
								error: function (data, status, headers, config) {
									// console.log('error status: ' + status);
								}
							});
						});

						self.GetAll();
					}
				}
			});
		};

		self.UpdateCourse = function () {
			self.EditCourse.Clickable = false;
			$api.Update({
				data: self.EditCourse,
				success: function (data) {
					if (data.Success) {
						angular.forEach(self.Files, function (value) {
							$api.Upload({
								file: value,
								fields: { Id: self.EditCourse.Id },
								progress: function (evt) {
									var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
									value.progress = progressPercentage + '%';
								},
								success: function (data, status, headers, config) {
									// console.log(data);
								},
								error: function (data, status, headers, config) {
									// console.log('error status: ' + status);
								}
							});
						});

						self.GetAll();
					}
				}
			});
		};

		self.ClearCourse = function () {
			self.NewCourse = new Course();
			self.EditCourse = null;
			self.Files = null;
		};

		self.GetAll = function () {
			$api.Get({
				success: function (response) {
					response.forEach(function (element) {
						element.startsAt = new Date(element.StartAt);
						element.endsAt = new Date(element.EndAt);
					})

					self.events = response;
				}
			});
		};

		self.Initialize();
	}

	function Course(data) {
		this.StartDateTime = new Date();
		this.SDTStatus = false;
		this.EndDateTime = new Date();
		this.EDTStatus = false;
		this.HStep = 1;
		this.MStep = 15;
		this.IsMeridian = false;
		this.Name = "";
		this.Clickable = true;

		if (data) {
			this.StartDateTime = data.startsAt;
			this.EndDateTime = data.endsAt;
			this.Name = data.title;
			this.Id = data.Id;
			this.Files = data.files;
		}
	}
})();