var gulp = require('gulp');
var fs = require('fs');
var es = require('event-stream');
var plugins = require('gulp-load-plugins')();
var config = require(__base + 'gulp/gulp.config')(fs);
var taskList = fs.readdirSync(__base + 'gulp/tasks/');

taskList.forEach(function (file) {
	require(__base + 'gulp/tasks/' + file)(gulp, config, plugins, es);
});