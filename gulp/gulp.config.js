module.exports = function (fs) {
	
	var paths = {
		assets: __base + 'assets/',
		bower: __base + 'bower_components/'
	};
	
	var config = {
		bundleSettingPath: __base + 'gulp/bundle.setting',
		bower: {
			"bootstrap": paths.bower + 'bootstrap/dist/**/*.{js,map,css,ttf,svg,woff,woff2,eot}',
			"jquery": paths.bower + 'jquery/dist/jquery*.{js,map}',
			"angular": paths.bower + 'angular/angular*.{js,map}',
			"angular-animate": paths.bower + 'angular-animate/*.{js,map}',
			"angular-loading-bar": paths.bower + 'angular-loading-bar/build/*.{js,css}',
			"font-awesome": paths.bower + 'font-awesome-bower/**/*.{css,otf,eot,svg,ttf,woff,woff2}',
			"ng-file-upload": paths.bower + 'ng-file-upload/*.js',
			"angular-bootstrap": paths.bower + 'angular-bootstrap/*.{js,css}',
			"angular-bootstrap-calendar": paths.bower + 'angular-bootstrap-calendar/dist/**/*.{js,css,map}',
			"moment": paths.bower + 'moment/moment.js',
			"knockout": paths.bower + 'knockout/dist/knockout.js',
			"vegas": paths.bower + 'vegas/dist/*.{js,css,map}'
		},
		lib: paths.assets + 'lib/',
		js: paths.assets + 'js/',
		css: paths.assets + 'css/',
		script: paths.assets + 'Script/',
		style: paths.assets + 'Style/',
		fonts: {
			path: paths.assets + 'fonts/',
			source: [
				paths.bower + 'bootstrap/dist/fonts/*.{ttf,svg,woff,woff2,eot}',
				paths.bower + 'font-awesome-bower/fonts/*.{otf,eot,svg,ttf,woff,woff2}'
			]
		}
	};
	
	return config;
}