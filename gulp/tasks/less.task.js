module.exports = function (gulp, config, $) {
	gulp.task('less', [], function () {
		var style = config.style;
		
		return gulp.src(style + '**/*/*.less')
			.pipe($.less())
			.pipe(gulp.dest(function(f) {
					return f.base;
			}))
	});
};