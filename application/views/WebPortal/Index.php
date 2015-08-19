<div ng-app="apps" ng-controller="index as self">
	<h2 class="text-center" ng-bind="self.Message"></h2>
	<button type="button" class="btn btn-warning" ng-click="self.Refresh()">Refresh</button>
</div>