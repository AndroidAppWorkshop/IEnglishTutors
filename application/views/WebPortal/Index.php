<div class="wrapper" ng-app="apps" ng-controller="index as self">
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9" aria-expanded="false">
					<i class="fa fa-bars fa-lg"></i>
				</button>
				<a class="navbar-brand"
					ng-href="{{self.JsonModel.Link.Title}}">
					<i class="fa fa-user-secret" ng-bind="self.JsonModel.Text.Title"></i>
				</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-9">
				<ul class="nav navbar-nav">
					<li ng-class="{ 'active': self.ActiveAsset }" ng-click="self.Refresh()">
						<a href="#" ng-show="self.ActiveAsset"><i class="fa fa-refresh fa-spin"></i></a>
						<a href="javascript: void(0);" ng-hide="self.ActiveAsset">
							<i class="fa fa-refresh" ng-bind="self.JsonModel.Text.Asset"></i>
						</a>
					</li>
					<li ng-class="{ 'active': self.ActiveEmail }" ng-click="self.SetMailServer()">
						<a href="#" ng-show="self.ActiveEmail"><i class="fa fa-refresh fa-spin"></i></a>
						<a href="javascript: void(0);" ng-hide="self.ActiveEmail">
							<i class="fa fa-envelope-o" ng-bind="self.JsonModel.Text.Email"></i>
						</a>
					</li>
					<li ng-class="{ 'active': self.ActiveLogout }" ng-click="self.SignOut()">
						<a href="#" ng-show="self.ActiveLogout"><i class="fa fa-refresh fa-spin"></i></a>
						<a href="javascript: void(0);" ng-hide="self.ActiveLogout">
							<i class="fa fa-sign-out" ng-bind="self.JsonModel.Text.Logout"></i>
						</a>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row">
			<div class="side-bar-left col-sm-2">
				<div class="uese-picture hidden-xs">
					<img src="https://unsplash.it/g/200?random" class="img-circle">
				</div>
			</div>
			<div class="col-sm-10">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="/index.php"></iframe>
				</div>
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
</div>