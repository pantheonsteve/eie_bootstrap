var gulp       = require('gulp'),
    sequence   = require('run-sequence'),
    $          = require('gulp-load-plugins')({rename: {'gulp-concat-util': 'concat'}});


// Compile SCSS files to CSS.
gulp.task('sass', function () {
  return gulp.src('./build/scss/eie_bootstrap.scss')
    .pipe($.sass())
    .pipe(gulp.dest('./dist/css'))
    .pipe($.notify("Sass Compiled!"));
});

// Watch source files for changes and compile them.
gulp.task('watch', function () {
  gulp.watch('./build/scss/**/*.scss', ['sass']);
});

// Default task
gulp.task('default', ['watch']);
