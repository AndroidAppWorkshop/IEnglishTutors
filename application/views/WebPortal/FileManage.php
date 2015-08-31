<div class="container-fluid" ng-app="apps" ng-controller="filemanage as self">
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<mwl-calendar
				view="self.calendarView"
				current-day="self.calendarDay"
				events="self.events"
				on-event-click="self.eventClicked(calendarEvent)"
				on-event-times-changed="calendarEvent.startsAt = calendarNewEventStart; calendarEvent.endsAt = calendarNewEventEnd"
				edit-event-html="'<i class=\'glyphicon glyphicon-pencil\'></i>'"
				delete-event-html="'<i class=\'glyphicon glyphicon-remove\'></i>'"
				on-edit-event-click="self.eventEdited(calendarEvent)"
				on-delete-event-click="self.eventDeleted(calendarEvent)"
				auto-open="true">
			</mwl-calendar>
		</div>
	</div>
</div>