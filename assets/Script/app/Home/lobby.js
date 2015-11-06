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
	JsonModel.Developers.Members = ko.observableArray();
	JsonModel.Location.Email = ko.observable();
	$.get(window.$base_url + 'Services/Members/All', { rid: 1 }, function (data) {
		$.each(data, function (index, value) {
			value.Picture = value.Picture ? value.Picture : 'null.png';
		});
		
		JsonModel.Teacher.Members(data);
		JsonModel.Location.Email(data[0].Username);
	});

	$.get(window.$base_url + 'Services/Members/All', { rid: 2 }, function (data) {
		$.each(data, function (index, value) {
			value.Picture = value.Picture ? value.Picture : 'null.png';
		});
		
		JsonModel.Developers.Members(data);
		$('.plus .email').popover();
	});

	JsonModel.SendEmail = function () {
		var url = window.$base_url + 'Services/System/SendEmail';
		$.post(url, $('form.row').serialize(), function (data) {
			if (data.Success) {
				$('form.row input, form.row textarea').val('');
				$('#send-email-success').modal('show');
				setTimeout(function () {
					$('#send-email-success').modal('hide');
				}, 1500);
			} else {
				$('#send-email-failure').modal('show');
			}
		})
	};

	ko.applyBindings(JsonModel);
});