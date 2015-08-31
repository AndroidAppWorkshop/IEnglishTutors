angular.module('apps', ['angular-loading-bar', 'apis', 'mwl.calendar', 'ui.bootstrap'])
	.controller('filemanage', ['$window', function ($window) {
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
			
			self.eventClicked = function(event) {
				showModal('Clicked', event);
			};
		
			self.eventEdited = function(event) {
				showModal('Edited', event);
			};
		
			self.eventDeleted = function(event) {
				showModal('Deleted', event);
			};
		
			self.eventTimesChanged = function(event) {
				showModal('Dropped or resized', event);
			};
		};

		self.Initialize();
	}]);