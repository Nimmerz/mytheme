var gulp = require('gulp'),
	autoprefixer = require('gulp-autoprefixer'), 
	minifyCSS = require('gulp-minify-css'),
	rename = require('gulp-rename'),
	sass = require('gulp-sass'),
	notify = require("gulp-notify");

gulp.task('css', function() {
	gulp.src('sass/main.scss')
		.pipe(sass())
		.pipe(minifyCSS())
		.pipe(rename('screen.min.css'))
		.pipe(gulp.dest('stylesheets/'))
		.pipe(notify('Done!'));
});

gulp.task ('watch', function() {
	gulp.watch('sass/main.scss', ['css'])
})

 