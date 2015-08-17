angular.module('apps', [])
	.controller('login', ['$window', function($window){
		var self = this;
		self.JsonModel = $window['LoginJson'];
		
		self.Login = function()
		{
			console.log(self.Member);
		};
		
		self.Register = function()
		{
			console.log(self.NewMember);
		}
	}]);