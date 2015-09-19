<div class="container-fluid" ng-app="apps.file" ng-controller="filemanage as self">
	<h2 class="text-center" ng-bind="self.calendarTitle"></h2>
	<div class="row">
		<div class="navbar">
			<div class="col-sm-2">
				<button class="btn btn-danger" data-toggle="modal" data-target=".new-course" ng-bind="self.JsonModel.Text.Add"></button>
			</div>
			<div class="col-sm-5 btn-group">
				<button class="btn btn-primary"
					mwl-date-modifier
					date="self.calendarDay"
					decrement="self.calendarView"
					ng-bind="self.JsonModel.Text.Previous">
				</button>
				<button class="btn btn-default"
					mwl-date-modifier
					date="self.calendarDay"
					set-to-today
					ng-bind="self.JsonModel.Text.Today">
				</button>
				<button class="btn btn-primary"
					mwl-date-modifier
					date="self.calendarDay"
					increment="self.calendarView"
					ng-bind="self.JsonModel.Text.Next">
				</button>
			</div>
			<div class="col-sm-5 btn-group">
				<label class="btn btn-primary" ng-model="self.calendarView" btn-radio="'year'" ng-bind="self.JsonModel.Text.Year"></label>
				<label class="btn btn-primary active" ng-model="self.calendarView" btn-radio="'month'" ng-bind="self.JsonModel.Text.Month"></label>
				<label class="btn btn-primary" ng-model="self.calendarView" btn-radio="'week'" ng-bind="self.JsonModel.Text.Week"></label>
				<label class="btn btn-primary" ng-model="self.calendarView" btn-radio="'day'" ng-bind="self.JsonModel.Text.Day"></label>
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
	<div class="modal fade bs-example-modal-lg new-course">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="gridSystemModalLabel" ng-bind="self.JsonModel.NewCourse.Title"></h4>
				</div>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-2">
								<label ng-bind="self.JsonModel.NewCourse.StartsAt"></label>
							</div>
							<div class="col-sm-10">
								<p class="input-group">
									<input type="date"
										class="form-control"
										datepicker-popup
										ng-model="self.NewCourse.StartDate"
										is-open="self.NewCourse.SDStatus"
										close-text="Close" />
									<span class="input-group-btn">
										<button type="button" class="btn btn-default" ng-click="self.NewCourse.SDStatus = true;"><i class="glyphicon glyphicon-calendar"></i></button>
									</span>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>