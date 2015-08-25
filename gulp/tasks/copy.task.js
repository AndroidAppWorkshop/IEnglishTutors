module.exports = function (gulp, config, $, es) {
	gulp.task('copy', ['clean', 'less'], function () {
		var bower = config.bower;
		var lib = config.lib;
		var fonts = config.fonts;

		var _streamArray = [];

		for (var destinationDir in bower) {
			_streamArray.push(
				gulp.src(bower[destinationDir])
					.pipe(gulp.dest(lib + destinationDir))
			);
		}

		_streamArray.push(
			gulp.src(fonts.source)
				.pipe(gulp.dest(fonts.path))
		);

		return es.concat(_streamArray);
	});
};