<div class="container-fluid" ng-app="modal" ng-controller="mailserversetting as self">
	<div class="bs-example-modal-lg" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<div class="alert alert-success text-center"
						role="alert"
						ng-show="self.AlertSuccess">
						<h2><strong ng-bind="self.JsonModel.Text.SuccessMsg"></strong></h2>
					</div>
					<div class="alert alert-danger text-center"
						role="alert"
						ng-show="self.AlertError">
						<h2><strong ng-bind="self.JsonModel.Text.ErrorMsg"></strong></h2>
					</div>
					<h4 class="modal-title text-center" ng-bind="self.JsonModel.Text.Title"></h4>
					<h6 class="text-warning text-center"  ng-bind="self.JsonModel.Text.Description"></h6>
				</div>
				<div class="modal-body">
					<form class="form-horizontal"
						name="config">
						<div class="form-group">
							<label class="col-sm-2 control-label" ng-bind="self.JsonModel.Text.Account"></label>
							<div class="col-sm-10">
								<input type="text"
									class="form-control"
									name="account"
									ng-model="self.Config.Account"
									required />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" ng-bind="self.JsonModel.Text.Password"></label>
							<div class="col-sm-10">
								<input type="password"
									class="form-control"
									name="password"
									ng-model="self.Config.Password"
									required />
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button"
						class="btn btn-default"
						data-dismiss="modal"
						ng-bind="self.JsonModel.Text.Close"
						ng-click="self.Close();"></button>
					<button type="button"
						class="btn btn-primary"
						ng-disabled="config.$invalid"
						ng-bind="self.JsonModel.Text.Save"
						ng-click="self.SaveMailServer()"></button>
				</div>
			</div>
		</div>
	</div>
</div>