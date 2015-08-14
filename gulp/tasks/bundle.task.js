module.exports = function (gulp, config, $, es) {
   gulp.task('bundle', ['copy'], function () {
      var setting = require(__base + 'gulp/bundle.setting')(config);
      var _streamArray = [];

      for (var key in setting) {
         if (setting[key].script) {
            _streamArray.push(
                gulp.src(setting[key].script)
                    .pipe($.concat(key.replace('$', '') + '.js'))
                    .pipe($.uglify())
                    .pipe(gulp.dest(config.js))
            );
         }

         if (setting[key].style) {
            _streamArray.push(
                gulp.src(setting[key].style)
                    .pipe($.concat(key.replace('$', '') + '.css'))
                    .pipe($.minifyCss())
                    .pipe(gulp.dest(config.css))
            );
         }
      }

      return es.concat(_streamArray);
   });
};