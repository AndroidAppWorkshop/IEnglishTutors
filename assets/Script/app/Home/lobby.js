$(function () {
	var JsonModel = window.LobbyJson;
	$('body').vegas({
		timer: false,
		preloadImage: true,
		slides: JsonModel.Slides
	});

	JsonModel.Preference = window.Preference;
	JsonModel.ChangeLang = function (currentLang) {
		var url = window.$base_url + 'Services/System/SavePreference';
		$.get(url, { language: currentLang }, function (data) {
			window.location.reload();
		});
	};

	JsonModel.NavTarget = function (Link) {
		if (Link.substring(0, 1) != '#') {
			return window.$base_url + Link;
		}

		return Link;
	};
	
	JsonModel.Teacher.Members = ko.observableArray();
	$.get(window.$base_url + '/Services/Members/All', { rid: 1 }, function (data) {
		JsonModel.Teacher.Members(data);
	});

	ko.applyBindings(JsonModel);
});