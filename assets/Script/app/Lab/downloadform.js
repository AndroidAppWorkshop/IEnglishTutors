$(document).ready(function() {
	
	for (var i = 1; i <= 3; i++) {
		var motherBtn = '#' + 'motherBtn' + i;
		var childPanel = '#' + 'childPanel' + i;
		var previousM = '';
		var previousC = '';
		(function(motherBtn, childPanel) {
			$(motherBtn).click(function() {
				if(previousM == motherBtn)
				{
					$(childPanel).fadeToggle();
					previousM = '';
					previousC = '';
				}
				else
				{
					$(previousC).hide();
					$(childPanel).fadeIn();
					previousM = motherBtn;
					previousC = childPanel;
				}
		});
		})(motherBtn, childPanel);
	}
	
});