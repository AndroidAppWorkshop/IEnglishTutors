<div class="container-fluid" ng-app="apps" ng-controller="filemanage as self">
	<h2 class="text-center">{{self.calendarTitle}}</h2>
	<div class="row">
		<div class="navbar">
			<div class="col-sm-2">
				<button class="btn btn-danger" data-toggle="modal" data-target=".new-course">Add</button>
			</div>
			<div class="col-sm-5 btn-group">
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
			<div class="col-sm-5 btn-group">
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
	<div class="modal fade bs-example-modal-lg new-course" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="gridSystemModalLabel">Modal title</h4>
				</div>
				<div class="modal-body">
					<p class="input-group">
						<input type="date"
							class="form-control"
							datepicker-popup
							ng-model="self.dt"
							is-open="self.status"
							min-date="self.minDate"
							max-date="self.maxDate"
							datepicker-options="self.dateOptions"
							date-disabled="self.disabled(date, mode)"
							close-text="Close" />
						<span class="input-group-btn">
							<button type="button" class="btn btn-default" ng-click="self.open($event)"><i class="glyphicon glyphicon-calendar"></i></button>
						</span>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>