var gulp = require("gulp"),
livereload = require('gulp-livereload'),
concat = require('gulp-concat');

gulp.task('default', ['watch']);

gulp.task('watch', function() {
	livereload.listen();
	gulp.watch('**/*.css', ['reload']);
	gulp.watch('**/*.js', ['reload']);
	gulp.watch('**/*.html', ['reload']);
	gulp.watch('**/*.php', ['reload']);
});

gulp.task('reload', function() {
	livereload.reload();
}); 