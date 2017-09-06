// Include gulp
var gulp = require('gulp');

// Include Our Plugins
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var minify = require('gulp-clean-css');
var merge = require('gulp-merge-json');
var exec = require ('child_process').exec;

//Trim JSON files
gulp.task('json-trim', function() {
    return exec('python scripts/jsonTrim.py');
});

//Merge JSON
gulp.task('json-merge', ['json-trim'], function() {
	gulp.src('data/json/trimmed/*.json')
    .pipe(merge({
    	concatArrays: true,
    	startObj: []
    }))
    .pipe(gulp.dest('./data'));
});

// Compile Our Sass
gulp.task('compile-sass', function() {
    return gulp.src('scss/*.scss')
        .pipe(sass())
        .pipe(gulp.dest('css'));
});

// Uglify JS
gulp.task('js', function() {
    gulp.src('js/*.js')
    .pipe(concat('concat.js'))
    .pipe(uglify())
    .pipe(gulp.dest('dist/js/'));
});

//Minify CSS
gulp.task('css', ['compile-sass'], function() {
    gulp.src('css/*.css')
    .pipe(minify())
    .pipe(gulp.dest('dist/css/'));
});

// Watch Files For Changes
gulp.task('watch', function() {
    // gulp.watch('js/*.js', ['lint', 'scripts']);
    gulp.watch('scss/*.scss', ['compile-sass']);
});

// Default Task
gulp.task('default', ['watch', 'json-merge', 'js', 'css']);