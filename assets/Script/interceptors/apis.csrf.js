(function () {
	angular.module('apis')
		.factory('csrf', csrf);

	csrf.$inject = ['$q', '$window'];
	function csrf($q, $window) {
		return {
			request: function (config) {
				if (config.method === 'POST') {
					config.data['csrf_test_name'] = $window['$IsDev'] ?
						'<?pho echo $this->security->get_csrf_hash(); ?>' :
						undefined;
				}
				
				return config;
			}
		};
	}
})();