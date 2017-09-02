// Include gulp
var gulp = require('gulp');

// Include Our Plugins
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var minify = require('gulp-minify-css');
var merge = require('gulp-merge-json');

//Merge JSON
gulp.task('json', function() {

	gulp.src('data/json/*.json')
    .pipe(merge({
    	concatArrays: true,
    	edit: (parsedJson, file) => {return parsedJson.Attendees},
    	startObj: []
    }))
    .pipe(gulp.dest('./data'));
});

// Compile Our Sass
gulp.task('sass', function() {
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
gulp.task('css', function() {
    gulp.src('css/*.css')
    .pipe(concat('concat.css'))
    .pipe(minify())
    .pipe(gulp.dest('dist/css/'));
});

// Watch Files For Changes
gulp.task('watch', function() {
    // gulp.watch('js/*.js', ['lint', 'scripts']);
    gulp.watch('scss/*.scss', ['sass']);
});

// Default Task
gulp.task('default', ['sass', 'watch', 'json', 'js', 'css']);