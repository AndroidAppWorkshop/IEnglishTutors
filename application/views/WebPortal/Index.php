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
					<i class="fa fa-user-secret"></i>
					<span ng-bind="self.JsonModel.Text.Title"></span>
				</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-9">
				<ul class="nav navbar-nav">
					<li class="select">
							<i class="fa fa-language"></i>
							<select class="form-control"
								ng-model="self.CurrentLang"
								ng-options="l as l for l in self.Preference.langs"
								ng-change="self.ChangeLang();">
							</select>
					</li>
					<li ng-class="{ 'active': self.ActiveAsset }" ng-click="self.Refresh()">
						<a href="javascript: void(0);">
							<i class="fa fa-refresh" ng-hide="self.ActiveAsset"></i>
							<i class="fa fa-refresh fa-spin" ng-show="self.ActiveAsset"></i>
							<span ng-bind="self.JsonModel.Text.Asset"></span>
						</a>
					</li>
					<li ng-class="{ 'active': self.ActiveEmail }" ng-click="self.SetMailServer()">
						<a href="">
							<i class="fa fa-envelope-o" ng-hide="self.ActiveEmail"></i>
							<i class="fa fa-envelope" ng-show="self.ActiveEmail"></i>
							<span ng-bind="self.JsonModel.Text.Email"></span>
						</a>
					</li>
					<li ng-class="{ 'active': self.ActiveLogout }" ng-click="self.SignOut()">
						<a href="javascript: void(0);">
							<i class="fa fa-sign-out" ng-hide="self.ActiveLogout"></i>
							<i class="fa fa-refresh fa-spin" ng-show="self.ActiveLogout"></i>
							<span ng-bind="self.JsonModel.Text.Logout"></span>
						</a>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row">
			<div class="side-bar-left col-sm-2 hidden-xs">
				<div class="uesr-picture">
					<i class="fa fa-map-signs fa-5x"></i>
				</div>
				<!-- Fake Link Start -->
				<div class="menu-block" ng-repeat="item in self.JsonModel.SideBarMenu">
					<div class="menu-section">
						<label ng-bind="item.Label"></label>
					</div>
					<div class="menu-section" ng-repeat="button in item.Button">
						<button ng-bind="button.Text"></button>
					</div>
				</div>
				<!-- Fake Link End -->
			</div>
			<div class="col-sm-10 main">
				<div class="embed-responsive embed-responsive-4by3" ng-show="self.iframePath">
					<iframe class="embed-responsive-item" ng-src="{{self.iframePath}}"></iframe>
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