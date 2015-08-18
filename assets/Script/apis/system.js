angular.module('apis', [])
	.factory('systemApi', ['$http', function($http){
		return {
			JsonOutput: function(){
				return $http.get('/index.php/Services/System/JsonOutput');
			}
		}
	}]);