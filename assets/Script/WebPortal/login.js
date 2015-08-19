angular.module('apps', ['angular-loading-bar', 'apis'])
	.controller('login', ['$window', 'membersApi', function($window, $api){
		var _Site = $window['$base_url'];
		var self = this;
		self.JsonModel = $window['LoginJson'];
		
		self.Login = function()
		{
			$api.Login({
				data: self.Member,
				success: function(data){
					if(data.Success){
						$window.location.href = _Site + 'WebPortal';
					}
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
					if(data.Success){
						$window.location.href = _Site + 'WebPortal';
					}
				},
				error: function(){
					console.log('error');
				}
			});
		}
	}]);