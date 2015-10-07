module.exports = function (config) {
	var script = config.script;
	var style = config.style;
	var lib = config.lib;
	
	var css = {
		app: {
			home_lobby: style + 'app/Home/lobby.css'
		},
		webportal: {
			index: style + 'WebPortal/index.css',
			login: style + 'WebPortal/login.css',
			mailserversetting: style + 'WebPortal/mailserversetting.css',
			viewresources: style + 'WebPortal/viewresources.css',
			members: style + 'WebPortal/members.css',
			filemanage: style + 'WebPortal/filemanage.css'
		},
		bower: {
			bootstrap: lib + 'bootstrap/css/bootstrap.css',
			loadingbar: lib + 'angular-loading-bar/loading-bar.css',
			fontawesome: lib + 'font-awesome/css/font-awesome.css',
			angularbootstrapcalendar: lib + 'angular-bootstrap-calendar/css/angular-bootstrap-calendar.css'
		}
	};
	
	var js = {
		apis: {
			core: script + 'apis/apis.core.js',
			system: script + 'apis/system.js',
			members: script + 'apis/members.js',
			asset: script + 'apis/asset.js',
			agenda: script + 'apis/agenda.js'
		},
		app: {
			home_lobby: script + 'app/Home/lobby.js'
		},
		webportal: {
			apps: script + 'WebPortal/apps.module.js',
			index: script + 'WebPortal/index.js',
			login: script + 'WebPortal/login.js',
			mailserversetting: script + 'WebPortal/mailserversetting.js',
			viewresources: script + 'WebPortal/viewresources.js',
			members: script + 'WebPortal/members.js',
			filemanage: script + 'WebPortal/filemanage.js'
		},
		bower: {
			jquery: lib + 'jquery/jquery.js',
			bootstrap: lib + 'bootstrap/js/bootstrap.js',
			angular: lib + 'angular/angular.js',
			angularanimate: lib + 'angular-animate/angular-animate.js',
			loadingbar: lib + 'angular-loading-bar/loading-bar.js',
			ngfileupload: lib + 'ng-file-upload/ng-file-upload-all.js',
			angularbootstrap: lib + 'angular-bootstrap/ui-bootstrap-tpls.js',
			moment: lib + 'moment/moment.js',
			angularbootstrapcalendar: lib + 'angular-bootstrap-calendar/js/angular-bootstrap-calendar-tpls.js',
			knockout: lib + 'knockout/knockout.js'
		},
		interceptors: {
			csrf: script + 'interceptors/apis.csrf.js'
		}
	};
	
	var setting = {
		"global": {
			"style": [
					css.bower.bootstrap,
					css.bower.fontawesome
			],
			"script": [
					js.bower.jquery,
					js.bower.bootstrap,
					js.bower.knockout
			]
		},
		"webportal.global": {
			"style": [
					css.bower.bootstrap,
					css.bower.loadingbar,
					css.bower.fontawesome
			],
			"script": [
					js.bower.jquery,
					js.bower.bootstrap,
					js.bower.angular,
					js.bower.loadingbar,
					js.bower.ngfileupload,
					js.apis.core,
					js.webportal.apps,
					js.interceptors.csrf
			]
		},
		"home.lobby": {
			"style": [
				css.app.home_lobby
			],
			"script": [
				js.app.home_lobby
			]
		},
		"webportal.index": {
			"style": [
				css.webportal.index
			],
			"script": [
				js.apis.members,
				js.apis.asset,
				js.apis.system,
				js.webportal.index
			]
		},
		"webportal.login": {
			"style": [
				css.webportal.login
			],
			"script": [
				js.apis.members,
				js.webportal.login
			]
		},
		"webportal.mailserversetting": {
			"style": [
				css.webportal.mailserversetting
			],
			"script": [
				js.apis.system,
				js.webportal.mailserversetting
			]
		},
		"webportal.viewresources": {
			"style": [
				css.webportal.viewresources
			],
			"script": [
				js.apis.system,
				js.webportal.viewresources
			]
		},
		"webportal.members": {
			"style": [
				css.webportal.members
			],
			"script": [
				js.apis.members,
				js.webportal.members
			]
		},
		"webportal.filemanage": {
			"style": [
				css.bower.angularbootstrapcalendar,
				css.webportal.filemanage
			],
			"script": [
				js.bower.angularanimate,
				js.bower.angularbootstrap,
				js.bower.moment,
				js.bower.angularbootstrapcalendar,
				js.apis.agenda,
				js.webportal.filemanage
			]
		}
	};
	
	return setting;
};