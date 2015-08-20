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
					<li ng-class="{ 'active': self.Asset }" ng-click="self.Refresh()">
						<a href="#" ng-show="self.Asset"><i class="fa fa-refresh fa-spin"></i></a>
						<a href="javascript: void(0);" ng-hide="self.Asset">
							<i class="fa fa-refresh" ng-bind="self.JsonModel.Text.Asset"></i>
						</a>
					</li>
					<li ng-class="{ 'active': self.Email }" ng-click="self.SetMailServer()">
						<a href="#" ng-show="self.Email"><i class="fa fa-refresh fa-spin"></i></a>
						<a href="javascript: void(0);" ng-hide="self.Email">
							<i class="fa fa-envelope-o" ng-bind="self.JsonModel.Text.Email"></i>
						</a>
					</li>
					<li ng-class="{ 'active': self.Logout }" ng-click="self.SignOut()">
						<a href="#" ng-show="self.Logout"><i class="fa fa-refresh fa-spin"></i></a>
						<a href="javascript: void(0);" ng-hide="self.Logout">
							<i class="fa fa-sign-out" ng-bind="self.JsonModel.Text.Logout"></i>
						</a>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row">
		</div>
	</div>
</div>