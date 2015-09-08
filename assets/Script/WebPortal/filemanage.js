angular.module('apps', ['angular-loading-bar', 'apis', 'mwl.calendar', 'ui.bootstrap', 'ngAnimate'])
	.controller('filemanage', ['$window', '$modal', 'moment', function ($window, $modal, moment) {
		var self = this;

		self.Initialize = function () {
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

			self.dt = new Date();
			self.minDate = new Date();
			self.maxDate = new Date(2020, 5, 22);
			self.status = false;
			self.dateOptions = {
				formatYear: 'yy',
				startingDay: 1
			};
			self.disabled = function (date, mode) {
				return (mode === 'day' && (date.getDay() === 0 || date.getDay() === 6));
			};
			self.open = function () {
				self.status = true;
			};
		};

		self.eventClicked = function (event) {
			console.log(event);
			// showModal('Clicked', event);
		};

		self.eventEdited = function (event) {
			console.log(event);
			// showModal('Edited', event);
		};

		self.eventDeleted = function (event) {
			console.log(event);
			// showModal('Deleted', event);
		};

		self.eventTimesChanged = function (event) {
			console.log(event);
			// showModal('Dropped or resized', event);
		};

		self.Initialize();
	}]);