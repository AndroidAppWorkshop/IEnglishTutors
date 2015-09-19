(function () {
	angular.module('apps.file', ['angular-loading-bar', 'apis', 'mwl.calendar', 'ui.bootstrap', 'ngAnimate'])
		.controller('filemanage', filemanage);

	filemanage.$inject = ['$window', 'moment'];
	function filemanage($window, moment) {
		var self = this;

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
	}
})();