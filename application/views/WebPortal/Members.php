<div class="container" ng-app="apps" ng-controller="members as self">
	<div class="row">
		<div class="col-sm-4" ng-repeat="mem in self.AllMem">
			<section class="can-edit">
				<button type="button" ng-if="mem.CanEdit" ng-click="self.ToggleEdit(mem)">
					<i class="fa fa-pencil-square-o"></i>
					<span ng-bind="self.JsonModel.Text.Edit" ng-hide="mem.FormVisible"></span>
					<span ng-bind="self.JsonModel.Text.Back" ng-show="mem.FormVisible"></span>
				</button>
			</section>
			<div class="thumbnail"
				ng-hide="mem.FormVisible">
				<img ng-if="mem.Picture" ng-src="{{self.ImgPath + mem.Picture + mem.Key}}" class="img-circle">
				<img ng-if="!mem.Picture" ng-src="{{self.DefaultImg}}" class="img-circle">
				<div class="caption text-center">
					<h3 ng-bind="mem.DisplayName"></h3>
					<p class="desc" ng-bind="mem.Description"></p>
					<p class="plus">
						<a ng-href="{{mem.GitHub}}"
							ng-show="mem.GitHub"
							class="btn btn-github"
							target="_blank">
							<i class="fa fa-github"></i>
							<span ng-bind="self.JsonModel.Text.GitHub"></span>
						</a>
						<a ng-href="{{mem.Facebook}}"
							ng-show="mem.Facebook"
							class="btn btn-facebook"
							target="_blank">
							<i class="fa fa-facebook-official"></i>
							<span ng-bind="self.JsonModel.Text.Facebook"></span>
						</a>
					</p>
					<p class="plus">
						<i class="fa fa-envelope"></i>
						<span ng-bind="mem.Username"></span>
					</p>
				</div>
			</div>
			<!-- Edit Start -->
			<div class="thumbnail"
				ng-show="mem.FormVisible">
				<form>
					<div class="form-group">
						<label ng-bind="self.JsonModel.Text.Picture"></label>
						<div ngf-select ngf-drop class="drop-box"
							ng-model="self.File"
							ngf-drag-over-class="dragover"
							ngf-pattern="'image/*'">
							<span ng-bind="self.JsonModel.Text.UploadTip"></span>
						</div>
					</div>
					<div class="progress"
						ng-show="self.FileProgress">
						<div class="progress-bar progress-bar-striped progress-bar-striped active"
							role="progressbar"
							aria-valuemin="0"
							aria-valuemax="100"
							ng-style="{width: self.FileProgress}">
							<span ng-bind="self.FileProgress"></span>
						</div>
					</div>
					<img ng-show="self.File" ngf-src="self.File" />
				</form>
				<form ng-submit="self.Update(mem)">
					<div class="form-group">
						<label ng-bind="self.JsonModel.Text.DisplayName"></label>
						<input type="text" class="form-control" ng-model="mem.DisplayName" />
					</div>
					<div class="form-group">
						<label ng-bind="self.JsonModel.Text.Description"></label>
						<textarea class="form-control" ng-model="mem.Description" rows="3"></textarea>
					</div>
					<div class="form-group">
						<label ng-bind="self.JsonModel.Text.GitHub"></label>
						<input type="text" class="form-control" ng-model="mem.GitHub" />
					</div>
					<div class="form-group">
						<label ng-bind="self.JsonModel.Text.Facebook"></label>
						<input type="text" class="form-control" ng-model="mem.Facebook" />
					</div>
					<button type="submit" class="btn" ng-bind="self.JsonModel.Text.Update"></button>
				</form>
			</div>
			<!-- Edit End -->
		</div>
	</div>
</div>