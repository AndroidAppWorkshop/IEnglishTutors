<div ng-app="apps" ng-controller="login as self">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<h4 class="modal-title" ng-bind="self.JsonModel.Text.Title"></h4>
		</div>
		<div class="modal-body">
			<div>
				<ul class="nav nav-tabs">
					<li class="active"><a href="#login" data-toggle="tab" ng-bind="self.JsonModel.Text.Login"></a></li>
					<li><a href="#register" data-toggle="tab" ng-bind="self.JsonModel.Text.CreateAcc"></a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="login">
						<br />
						<form class="form-horizontal"
							name="login"
							ng-submit="self.Login()">
							<div class="form-group">
								<div class="col-xs-12">
									<div class="input-group"
										ng-class="{ 'has-error': login.email.$invalid && login.email.$dirty }">
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
										</span>
										<input type="email"
											name="email"
											ng-model="self.Member.Email"
											class="form-control"
											placeholder="{{self.JsonModel.Text.Email}}" 
											required />
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12">
									<div class="input-group"
										ng-class="{ 'has-error': login.password.$invalid && login.password.$dirty }">
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
										</span>
										<input type="password"
											name="password"
											ng-model="self.Member.Password"
											class="form-control"
											placeholder="{{self.JsonModel.Text.Password}}"
											required />
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12">
									<div class="checkbox">
										<label>
											<input type="checkbox" ng-model="self.Member.Remember" />
											<span ng-bind="self.JsonModel.Text.Remember"></span>
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12">
									<button type="submit" class="btn btn-success" ng-bind="self.JsonModel.Text.Login"></button>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="register">
						<br />
						<form class="form-horizontal"
							name="register"
							ng-submit="self.Register()">
							<div class="form-group">
								<div class="col-xs-12 text-warning" ng-bind="self.JsonModel.Text.Statement">
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12">
									<div class="input-group"
										ng-class="{ 'has-error': register.email.$invalid && register.email.$dirty }">
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
										</span>
										<input type="email"
											name="email"
											ng-model="self.NewMember.Email"
											class="form-control"
											placeholder="{{self.JsonModel.Text.Email}}" 
											required />
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12">
									<div class="input-group"
										ng-class="{ 'has-error': register.password.$invalid && register.password.$dirty }">
										<span class="input-group-addon">
											<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
										</span>
										<input type="password"
											name="password"
											ng-model="self.NewMember.Password"
											class="form-control"
											placeholder="{{self.JsonModel.Text.Password}}"
											required />
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12"
									ng-class="{ 'has-error': register.role.$invalid && register.role.$dirty }">
									<label class="radio-inline">
										<input type="radio"
											name="role"
											ng-model="self.NewMember.Role"
											value="owner"
											required />
										<span ng-bind="self.JsonModel.Text.Owner"></span>
									</label>
									<label class="radio-inline">
										<input type="radio"
											name="role"
											ng-model="self.NewMember.Role"
											value="developer"
											required />
										<span ng-bind="self.JsonModel.Text.Developer"></span>
									</label>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12">
									<button type="submit" class="btn btn-success" ng-bind="self.JsonModel.Text.Register"></button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
		</div>
		</div>
	</div>
	<div class="modal fade bs-example-modal-sm" id="modal-success" tabindex="-1">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button"
						class="close"
						data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title text-center text-info" ng-bind="self.JsonModel.Modal.SuccessTitle"></h4>
				</div>
				<div class="modal-body text-center" ng-bind="self.JsonModel.Modal.SuccessContent">
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade bs-example-modal-sm" id="modal-error" tabindex="-1">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button"
						class="close"
						data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title text-center text-danger" ng-bind="self.JsonModel.Modal.ErrorTitle"></h4>
				</div>
				<div class="modal-body text-center" ng-bind="self.JsonModel.Modal.ErrorContent">
				</div>
			</div>
		</div>
	</div>
</div>