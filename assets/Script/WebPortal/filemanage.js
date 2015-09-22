(function () {
	angular.module('apps.file', ['angular-loading-bar', 'apis', 'mwl.calendar', 'ui.bootstrap', 'ngAnimate'])
		.controller('filemanage', filemanage);

	filemanage.$inject = ['$window', 'agendaApi', 'moment'];
	function filemanage($window, $api, moment) {
		var self = this;
		self.$api = $api;

		self.Initialize = function () {
			self.JsonModel = $window['FileManageJson'];
			self.NewCourse = new NewCourse();
			
			//angular-bootstrap-calendar
			self.calendarDay = new Date();
			self.calendarView = 'month';
			self.events = [
				{
					title: 'An event',
					type: 'warning',
					startsAt: moment().startOf('week').subtract(2, 'days').add(8, 'hours').toDate(),
					endsAt: moment().startOf('week').add(1, 'week').add(9, 'hours').toDate(),
					draggable: true,
					resizable: true
				},
				{
					title: '<i class="glyphicon glyphicon-asterisk"></i> <span class="text-primary">Another event</span>, with a <i>html</i> title',
					type: 'info',
					startsAt: moment().subtract(1, 'day').toDate(),
					endsAt: moment().add(5, 'days').toDate(),
					draggable: true,
					resizable: true
				},
				{
					title: 'This is a really long event title that occurs on every year',
					type: 'important',
					startsAt: moment().startOf('day').add(7, 'hours').toDate(),
					endsAt: moment().startOf('day').add(19, 'hours').toDate(),
					recursOn: 'year',
					draggable: true,
					resizable: true
				}
			];
		};

		self.eventClicked = function (event) {
			console.log(event);
		};

		self.eventEdited = function (event) {
			console.log(event);
		};

		self.eventDeleted = function (event) {
			console.log(event);
		};

		self.eventTimesChanged = function (event) {
			console.log(event);
		};

		self.Initialize();

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
									console.log(data);
								},
								error: function (data, status, headers, config) {
									console.log('error status: ' + status);
								}
							});
						});
					}
				}
			});
		};

		self.ClearNewCourse = function () {
			self.NewCourse = new NewCourse();
			self.Files = null;
		};
	}

	function NewCourse() {
		this.StartDateTime = new Date();
		this.SDTStatus = false;
		this.EndDateTime = new Date();
		this.EDTStatus = false;
		this.HStep = 1;
		this.MStep = 15;
		this.IsMeridian = false;
		this.Name = "";
		this.Clickable = true;
	}
})();