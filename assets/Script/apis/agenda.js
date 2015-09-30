(function () {
	angular.module('apis')
		.factory('agendaApi', agendaApi);

	agendaApi.$inject = ['$http', '$window', 'Upload'];
	function agendaApi($http, $window, $upload) {
		var _Site = $window['$base_url'];
		var _Add = _Site + 'Services/Agenda/Add';
		var _Update = _Site + 'Services/Agenda/Update';
		var _Upload = _Site + 'Services/Agenda/Upload';
		var _Get = _Site + 'Services/Agenda/Get';
		
		return {
			Accept: 'image/*,application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.openxmlformats-officedocument.presentationml.presentation',
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
			},
			Update: function(options) {
				return $http({
					method: 'POST',
					url: _Update,
					data: options.data
				}).then(function (response) {
					options.success(response.data);
				}, function (response) {
					options.error(response.data);
				});
			},
			Upload: function (options) {
				return $upload.upload({
					url: _Upload,
					fields: options.fields,
					file: options.file
				}).progress(function (evt) {
					options.progress(evt);
				}).success(function (data, status, headers, config) {
					options.success(data, status, headers, config);
				}).error(function (data, status, headers, config) {
					options.error(data, status, headers, config)
				});
			},
			Get: function(options){
				return $http({
					method: 'GET',
					url: _Get,
					params: options.params
				}).then(function (response) {
					options.success(response.data);
				}, function (response) {
					options.error(response.data);
				});
			}
		};
	}
})();