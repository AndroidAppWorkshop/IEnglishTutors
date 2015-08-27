<div class="wrapper" ng-app="apps" ng-controller="index as self">
	<nav class="navbar navbar-inverse visible-xs-block">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9" aria-expanded="false">
					<i class="fa fa-bars fa-lg"></i>
				</button>
				<a class="navbar-brand"
					ng-href="{{self.JsonModel.Link.Title}}">
					<i class="fa fa-home"></i>
					<span ng-bind="self.JsonModel.Text.Title"></span>
				</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-9">
				<ul class="nav navbar-nav">
					<li ng-repeat="li in self.Nav" ng-click="self.ChangeIframePath(li)">
						<i ng-class="li.Icon"></i>
						<span ng-bind="li.Text"></span>
					</li>
					<li>
						<i class="fa fa-language"></i>
						<select ng-hide="button.Text"
							ng-model="self.CurrentLang"
							ng-options="l as l for l in self.Preference.langs"
							ng-change="self.ChangeLang();">
						</select>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row">
			<!-- Left Side Bar Start -->
			<div class="side-bar-left col-sm-2 hidden-xs">
				<div class="uesr-picture">
					<i class="fa fa-cogs fa-5x"></i>
				</div>
				<div class="menu-block" ng-repeat="item in self.JsonModel.SideBarMenu">
					<div class="menu-topic">
						<label ng-bind="item.Label"></label>
					</div>
					<div class="menu-section"
						ng-repeat="button in item.Button"
						ng-click="self.ChangeIframePath(button)">
						
							<i ng-class="button.Icon"></i>
							<span ng-bind="button.Text"></span>
						
					</div>
				</div>
				<div class="menu-block">
					<div class="menu-section">
						<i class="fa fa-language"></i>
						<select ng-hide="button.Text"
							ng-model="self.CurrentLang"
							ng-options="l as l for l in self.Preference.langs"
							ng-change="self.ChangeLang();">
						</select>
					</div>
				</div>
			</div>
			<!-- Left Side Bar End -->
			<div class="col-sm-10 main">
				<button type="button"
					class="embed-close"
					ng-click="self.CloseIframe()"
					ng-show="self.iframePath">
					<i class="fa fa-times"></i>
				</button>
				<div class="embed-responsive embed-responsive-4by3" ng-show="self.iframePath">
					<iframe class="embed-responsive-item" ng-src="{{self.iframePath}}"></iframe>
				</div>
				<div class="overview" ng-hide="self.iframePath">
					<div class="row" ng-repeat="item in self.JsonModel.Overview">
						<div class="col-sm-4">
							<img ng-if="item.Col4.Img" ng-src="{{self.ImgPath + item.Col4.Img}}">
							<h1 ng-if="item.Col4.Title" ng-bind="item.Col4.Title"></h1>
							<p ng-if="item.Col4.Desc" ng-bind="item.Col4.Desc"></p>
						</div>
						<div class="col-sm-8">
							<img ng-if="item.Col8.Img" ng-src="{{self.ImgPath + item.Col8.Img}}">
							<h1 ng-if="item.Col8.Title" ng-bind="item.Col8.Title"></h1>
							<p ng-if="item.Col8.Desc" ng-bind="item.Col8.Desc"></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal Start -->
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
	<!-- Modal End -->
</div>