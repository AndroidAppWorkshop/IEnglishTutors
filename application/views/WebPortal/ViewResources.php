<div class="container-fluid" ng-app="apps" ng-controller="viewresources as self">
	<div class="row">
		<div class="col-sm-4">
			<h3 class="text-muted">
				<i class="fa fa-tag"></i>
				<span ng-bind="self.JsonModel.Text.Lang"></span>
			</h3>
			<div class="panel" ng-repeat="category in self.Category">
				<div class="panel-heading" ng-click="self.GetLangUsage(category)">
					<i class="fa fa-angle-right"ng-hide="category.Usage"></i>
					<i class="fa fa-angle-down" ng-show="category.Usage"></i>
					<span ng-bind="category.Name"></span>
				</div>
				<div class="panel-body"
					ng-repeat="usage in category.Usage"
					ng-bind="usage.Name"
					ng-click="self.ChangeFormModel(usage)">
				</div>
			</div>
		</div>
		<div class="col-sm-8">
			<h3 class="text-muted">
				<i class="fa fa-file-text"></i>
				<span ng-bind="self.JsonModel.Text.Content"></span>
			</h3>
			<div class="panel">
				<div class="panel-heading" >
					<input class="form-control" type="text" ng-model="self.FormModel.VarName" disabled>
				</div>
				<div class="panel-body">
					<form>
						<textarea class="form-control" ng-model="self.FormModel.Content"></textarea>
					</form>
				</div>
				<div class="panel-footer text-right">
					<button type="button" class="btn btn-lg" ng-click="self.UpdateLangUsage()">
						<i class="fa fa-floppy-o"></i>
						<span ng-bind="self.JsonModel.Text.Save"></span>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>