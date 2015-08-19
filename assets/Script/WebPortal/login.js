angular.module('apps', ['angular-loading-bar', 'apis'])
	.controller('login', ['$window', 'membersApi', function($window, $api){
		var self = this;
		self.JsonModel = $window['LoginJson'];
		
		self.Login = function()
		{
			$api.Login({
				data: self.Member,
				success: function(data){
					console.log('success');
					console.log(data);
				},
				error: function(){
					console.log('error');
				}
			});
		};
		
		self.Register = function()
		{
			$api.Create({
				data: self.NewMember,
				success: function(data){
					console.log('success');
					console.log(data);
				},
				error: function(){
					console.log('error');
				}
			});
		}
	}]);