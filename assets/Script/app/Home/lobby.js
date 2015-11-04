$(function () {
	var JsonModel = window.LobbyJson;
	$('body').vegas({
		timer: false,
		preloadImage: true,
		slides: JsonModel.Slides
	});
	
	JsonModel.Preference = window.Preference;
	JsonModel.ChangeLang = function(currentLang) {
		var url = window.$base_url + 'Services/System/SavePreference';
		$.get(url, { language: currentLang }, function(data) {
			window.location.reload();
		});
	};
	
	ko.applyBindings(JsonModel);
});