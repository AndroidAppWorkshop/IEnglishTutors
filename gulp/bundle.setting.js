module.exports = function (config) {
	var script = config.script;
	var style = config.style;
	var lib = config.lib;
	
	var css = {
		app: {
			css1: style + 'app/css1.css'
		},
		bower: {
			bootstrap: lib + 'bootstrap/css/bootstrap.min.css',
			loadingbar: lib + 'loadingbar/loading-bar.min.css'
		}
	};
	
	var js = {
		apis: {
			system: script + 'apis/system.js'
		},
		app: {
			js1: script + 'app/js1.js'
		},
		webportal: {
			login: script + 'WebPortal/login.js'
		},
		bower: {
			jquery: lib + 'jquery/jquery.min.js',
			bootstrap: lib + 'bootstrap/js/bootstrap.min.js',
			angular: lib + 'angular/angular.min.js',
			loadingbar: lib + 'loadingbar/loading-bar.min.js'
		}
	};
	
	var setting = {
		"global": {
			"style": [
					css.bower.bootstrap,
					css.bower.loadingbar
			],
			"script": [
					js.bower.jquery,
					js.bower.bootstrap,
					js.bower.angular,
					js.bower.loadingbar
			]
		},
		"home.lobby": {
			"style": [
				css.app.css1
			],
			"script": [
				js.app.js1
			]
		},
		"webportal.login": {
			"style": [
			],
			"script": [
				js.apis.system,
				js.webportal.login
			]
		}
	};
	
	return setting;
};