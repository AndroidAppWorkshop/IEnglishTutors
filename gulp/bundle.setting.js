module.exports = function (config) {
	var script = config.script;
	var style = config.style;
	var lib = config.lib;
	
	var css = {
		app: {
			css1: style + 'app/css1.css'
		},
		bower: {
			bootstrap: lib + 'bootstrap/css/bootstrap.css'
		}
	};
	
	var js = {
		app: {
			js1: script + 'app/js1.js'
		},
		bower: {
			jquery: lib + 'jquery/jquery.js',
			bootstrap: lib + 'bootstrap/js/bootstrap.js'
		}
	};
	
	var setting = {
		"global": {
			"style": [
					css.bower.bootstrap
			],
			"script": [
					js.bower.jquery,
					js.bower.bootstrap
			]
		},
		"home.lobby": {
			"style": [
				css.app.css1
			],
			"script": [
				js.app.js1
			]
		}
	};
	
	return setting;
};