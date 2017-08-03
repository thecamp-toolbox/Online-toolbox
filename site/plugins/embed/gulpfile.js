var gulp          = require('gulp');
var autoprefixer  = require('gulp-autoprefixer');
var sass          = require('gulp-sass');
var cssmin        = require('gulp-cssmin');
var rename        = require('gulp-rename');
var uglify        = require('gulp-uglify');

gulp.task('css', function() {
  return gulp.src('assets/scss/oembed.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(rename('oembed.css'))
    .pipe(cssmin())
    .pipe(gulp.dest('assets/css'));
});

gulp.task('css-field', function() {
  return gulp.src('field/assets/scss/field.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(rename('field.css'))
    .pipe(cssmin())
    .pipe(gulp.dest('field/assets/css'));
});

gulp.task('js', function() {
  return gulp.src('assets/js/src/embed.js')
    .pipe(uglify())
    .pipe(gulp.dest('assets/js'));
});

gulp.task('watch', function() {
  gulp.watch('assets/scss/**/*.scss', ['css']);
  gulp.watch('field/assets/scss/**/*.scss', ['css-field']);
  gulp.watch('assets/js/src/*.js', ['js']);
});
