<div class="container-fluid" ng-app="apps" ng-controller="filemanage as self">
	<h2 class="text-center">{{self.calendarTitle}}</h2>
	<div class="row">
		<div class="navbar">
			<div class="btn-group col-sm-6">
				<button class="btn btn-primary"
					mwl-date-modifier
					date="self.calendarDay"
					decrement="self.calendarView">Previous
				</button>
				<button class="btn btn-default"
					mwl-date-modifier
					date="self.calendarDay"
					set-to-today>Today
				</button>
				<button class="btn btn-primary"
					mwl-date-modifier
					date="self.calendarDay"
					increment="self.calendarView">Next
				</button>
			</div>
			<div class="btn-group col-sm-6">
				<label class="btn btn-primary ng-pristine ng-untouched ng-valid" ng-model="self.calendarView" btn-radio="'year'">Year</label>
				<label class="btn btn-primary ng-pristine ng-untouched ng-valid active" ng-model="self.calendarView" btn-radio="'month'">Month</label>
				<label class="btn btn-primary ng-pristine ng-untouched ng-valid" ng-model="self.calendarView" btn-radio="'week'">Week</label>
				<label class="btn btn-primary ng-pristine ng-untouched ng-valid" ng-model="self.calendarView" btn-radio="'day'">Day</label>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="calendar">
			<mwl-calendar
				view="self.calendarView"
				view-title="self.calendarTitle"
				current-day="self.calendarDay"
				events="self.events"
				on-event-click="self.eventClicked(calendarEvent)"
				edit-event-html="'<i class=\'glyphicon glyphicon-pencil\'></i>'"
				delete-event-html="'<i class=\'glyphicon glyphicon-remove\'></i>'"
				on-edit-event-click="self.eventEdited(calendarEvent)"
				on-delete-event-click="self.eventDeleted(calendarEvent)"
				auto-open="true">
			</mwl-calendar>
		</div>
	</div>
</div>