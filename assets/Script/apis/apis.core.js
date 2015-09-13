(function () {
	angular.module('apis', ['ngFileUpload'])
		.config(apisConfigFn);
		
	apisConfigFn.$inject = ['$httpProvider'];
	function apisConfigFn($httpProvider){
		$httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';
		$httpProvider.interceptors.push('csrf');
	}
})();