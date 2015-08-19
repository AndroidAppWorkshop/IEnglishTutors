angular.module('apps', ['angular-loading-bar', 'apis'])
	.controller('index', ['$window', 'assetApi', function($window, $api){
		var self = this;
		
		self.Message = "Welcome !";
		self.Refresh = function()
		{
			$api.Refresh({
				success: function(data){
					console.log('success');
					console.log(data);
				},
				error: function(){
					console.log('error');
				}
			});
		};
	}]);