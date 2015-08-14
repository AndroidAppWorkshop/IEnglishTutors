module.exports = function (gulp, config, $) {
   gulp.task('clean', function () {
      var lib = config.lib;
      var js = config.js;
      var css = config.css;
      var fonts = config.fonts.path;

      return gulp.src([lib, js, css, fonts], { read: false })
           .pipe($.clean());
   });
};