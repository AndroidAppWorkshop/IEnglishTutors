$(function () {
	var JsonModel = window.LobbyJson;
	$('body').vegas({
		timer: false,
		preloadImage: true,
		slides: JsonModel.Slides
	});
	
	ko.applyBindings(JsonModel);
});