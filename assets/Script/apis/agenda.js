(function () {
	angular.module('apis')
		.factory('agendaApi', agendaApi);

	agendaApi.$inject = ['$http', '$window', 'Upload'];
	function agendaApi($http, $window, $upload) {
		var _Site = $window['$base_url'];
		var _Add = _Site + 'Services/Agenda/Add';
		
		return {
			Add: function(options) {
				return $http({
					method: 'POST',
					url: _Add,
					data: options.data
				}).then(function (response) {
					options.success(response.data);
				}, function (response) {
					options.error(response.data);
				});
			}
		};
	}
})();