$(function () {
	var JsonModel = window.LobbyJson;
	$('body').vegas({
		timer: false,
		slides: JsonModel.Slides
	});
	
	ko.applyBindings(JsonModel);
});