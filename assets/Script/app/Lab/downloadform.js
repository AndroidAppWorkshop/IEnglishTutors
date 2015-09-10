$(document).ready(function() {
	
	function DownloadFrom() {
		var self = this;
		self.course = ko.observableArray(ViewModel);
		
		self.url = 'mother';
	}
	
	ko.applyBindings(new DownloadFrom());
	
});