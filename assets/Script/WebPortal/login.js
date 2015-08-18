angular.module('apps', ['angular-loading-bar', 'apis'])
	.controller('login', ['$window', 'systemApi', function($window, $api){
		var self = this;
		self.JsonModel = $window['LoginJson'];
		
		self.Login = function()
		{
			$api.JsonOutput().then(function(result){
				console.log(result);
			});
		};
		
		self.Register = function()
		{
			console.log(self.NewMember);
		}
	}]);