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
	<!-- Modal: New Course -->
	<div class="modal fade bs-example-modal-lg new-course">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form name="newcourse" ng-submit="self.AddCourse()">
					<!-- Header -->
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						<h4 class="modal-title" id="gridSystemModalLabel" ng-bind="self.JsonModel.NewCourse.Title"></h4>
					</div>
					<!-- Body -->
					<div class="modal-body">
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-2">
									<label ng-bind="self.JsonModel.NewCourse.Name"></label>
								</div>
								<div class="col-sm-10">
									<input type="text" class="form-control" ng-model="self.NewCourse.Name" placeholder="{{self.JsonModel.NewCourse.Name}}" required>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-2">
									<label ng-bind="self.JsonModel.NewCourse.StartsAt"></label>
								</div>
								<div class="col-sm-10">
									<p class="input-group">
										<input type="date"
											class="form-control"
											datepicker-popup
											ng-model="self.NewCourse.StartDateTime"
											is-open="self.NewCourse.SDTStatus"
											close-text="Close" />
										<span class="input-group-btn">
											<button type="button" class="btn btn-default" ng-click="self.NewCourse.SDTStatus = true;"><i class="glyphicon glyphicon-calendar"></i></button>
										</span>
									</p>
									<timepicker ng-model="self.NewCourse.StartDateTime" ng-change="" hour-step="self.NewCourse.HStep" minute-step="self.NewCourse.MStep" show-meridian="self.NewCourse.IsMeridian"></timepicker>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-2">
									<label ng-bind="self.JsonModel.NewCourse.EndsAt"></label>
								</div>
								<div class="col-sm-10">
									<p class="input-group">
										<input type="date"
											class="form-control"
											datepicker-popup
											min-date="self.NewCourse.StartDateTime"
											ng-model="self.NewCourse.EndDateTime"
											is-open="self.NewCourse.EDTStatus"
											close-text="Close" />
										<span class="input-group-btn">
											<button type="button" class="btn btn-default" ng-click="self.NewCourse.EDTStatus = true;"><i class="glyphicon glyphicon-calendar"></i></button>
										</span>
									</p>
									<timepicker ng-model="self.NewCourse.EndDateTime" hour-step="self.NewCourse.HStep" minute-step="self.NewCourse.MStep" show-meridian="self.NewCourse.IsMeridian"></timepicker>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-8 upload">
									<div class="drop-box"
										ngf-select ngf-drop 
										ng-model="self.Files"
										ngf-drag-over-class="dragover"
										ngf-multiple="true"
										ngf-pattern="self.$api.Accept"
										ngf-keep="true"
										ngf-keep-distinct="true">
										<span ng-bind="self.JsonModel.Text.UploadTip"></span>
									</div>
								</div>
								<div class="col-sm-4">
									<ul>
										<li ng-repeat="file in self.Files"">
											<p>{{file.name}} {{file.$error}} {{file.$errorParam}}</p>
											<div class="progress"
												ng-show="file.progress">
												<div class="progress-bar progress-bar-striped progress-bar-striped active"
													role="progressbar"
													aria-valuemin="0"
													aria-valuemax="100"
													ng-style="{width: file.progress}">
													<span ng-bind="file.progress"></span>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- Footer -->
					<div class="modal-footer">
						<button type="submit"
							class="btn btn-primary"
							ng-show="self.NewCourse.Clickable"
							ng-bind="self.JsonModel.NewCourse.Create"
							ng-disabled="self.NewCourse.StartDateTime > self.NewCourse.EndDateTime"></button>
						<button type="button"
							class="btn btn-success"
							data-dismiss="modal"
							ng-hide="self.NewCourse.Clickable"
							ng-click="self.ClearNewCourse()"
							ng-bind="self.JsonModel.NewCourse.Done"></button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal: Edit Course -->
	<div class="modal fade bs-example-modal-lg edit-course">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form name="editcourse" ng-submit="self.EditCourse()">
					<!-- Header -->
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						<h4 class="modal-title" id="gridSystemModalLabel" ng-bind="self.JsonModel.EditCourse.Title"></h4>
					</div>
					<!-- Body -->
					<div class="modal-body">
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-2">
									<label ng-bind="self.JsonModel.EditCourse.Name"></label>
								</div>
								<div class="col-sm-10">
									<input type="text" class="form-control" ng-model="self.EditCourse.Name" placeholder="{{self.JsonModel.EditCourse.Name}}" required>
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-sm-2">
									<label ng-bind="self.JsonModel.EditCourse.StartsAt"></label>
								</div>
								<div class="col-sm-10">
									<p class="input-group">
										<input type="date"
											class="form-control"
											datepicker-popup
											ng-model="self.EditCourse.StartDateTime"
											is-open="self.EditCourse.SDTStatus"
											close-text="Close" />
										<span class="input-group-btn">
											<button type="button" class="btn btn-default" ng-click="self.EditCourse.SDTStatus = true;"><i class="glyphicon glyphicon-calendar"></i></button>
										</span>
									</p>
									<timepicker ng-model="self.EditCourse.StartDateTime" ng-change="" hour-step="self.EditCourse.HStep" minute-step="self.EditCourse.MStep" show-meridian="self.EditCourse.IsMeridian"></timepicker>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-2">
									<label ng-bind="self.JsonModel.EditCourse.EndsAt"></label>
								</div>
								<div class="col-sm-10">
									<p class="input-group">
										<input type="date"
											class="form-control"
											datepicker-popup
											min-date="self.EditCourse.StartDateTime"
											ng-model="self.EditCourse.EndDateTime"
											is-open="self.EditCourse.EDTStatus"
											close-text="Close" />
										<span class="input-group-btn">
											<button type="button" class="btn btn-default" ng-click="self.EditCourse.EDTStatus = true;"><i class="glyphicon glyphicon-calendar"></i></button>
										</span>
									</p>
									<timepicker ng-model="self.EditCourse.EndDateTime" hour-step="self.EditCourse.HStep" minute-step="self.EditCourse.MStep" show-meridian="self.EditCourse.IsMeridian"></timepicker>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-8 upload">
									<div class="drop-box"
										ngf-select ngf-drop 
										ng-model="self.Files"
										ngf-drag-over-class="dragover"
										ngf-multiple="true"
										ngf-pattern="self.$api.Accept"
										ngf-keep="true"
										ngf-keep-distinct="true">
										<span ng-bind="self.JsonModel.Text.UploadTip"></span>
									</div>
								</div>
								<div class="col-sm-4">
									<ul>
										<li ng-repeat="file in self.Files"">
											<p>{{file.name}} {{file.$error}} {{file.$errorParam}}</p>
											<div class="progress"
												ng-show="file.progress">
												<div class="progress-bar progress-bar-striped progress-bar-striped active"
													role="progressbar"
													aria-valuemin="0"
													aria-valuemax="100"
													ng-style="{width: file.progress}">
													<span ng-bind="file.progress"></span>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- Footer -->
					<div class="modal-footer">
						<button type="submit"
							class="btn btn-primary"
							ng-show="self.EditCourse.Clickable"
							ng-bind="self.JsonModel.EditCourse.Edit"
							ng-disabled="self.EditCourse.StartDateTime > self.EditCourse.EndDateTime"></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>