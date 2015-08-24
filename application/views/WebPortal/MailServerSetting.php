<div class="container-fluid" ng-app="apps" ng-controller="mailserversetting as self">
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
								<div class="input-group">
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
									</span>
									<input type="text"
										class="form-control"
										name="account"
										ng-model="self.Config.Account"
										required />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" ng-bind="self.JsonModel.Text.Password"></label>
							<div class="col-sm-10">
								<div class="input-group">
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
									</span>
									<input type="password"
										class="form-control"
										name="password"
										ng-model="self.Config.Password"
										required />
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button"
						class="btn btn-primary"
						ng-disabled="config.$invalid"
						ng-click="self.SaveMailServer()">
						<i class="fa fa-floppy-o"></i>
						<span ng-bind="self.JsonModel.Text.Save"></span>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>