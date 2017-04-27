var gulp = require("gulp"),
livereload = require('gulp-livereload'),
concat = require('gulp-concat'), 
sass = require('gulp-sass');


gulp.task('default', ['watch']);

gulp.task('watch', function() {
	livereload.listen();
	gulp.watch('**/*.scss', ['sass', 'reload']);
	gulp.watch('**/*.js', ['reload']);
	gulp.watch('**/*.html', ['reload']);
	gulp.watch('**/*.php', ['reload']);
});

gulp.task('reload', function() {
	livereload.reload();
}); 

gulp.task('changed', function() {
	livereload.changed('style.css');
}); 

gulp.task('sass', function () {
	console.log("Sass change");
  gulp.src('./sass/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('.'));
});