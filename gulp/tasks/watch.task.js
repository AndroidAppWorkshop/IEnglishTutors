module.exports = function (gulp, config, $) {
	gulp.task('watch', [], function () {
		var style = config.style;
		
		gulp.watch(style + '**/*/*.less', ['less']);
	});
};