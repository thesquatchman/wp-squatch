var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');

var input = './stylesheets/**/*.scss';
var output = './public/css';

var jsFiles = ['./node_modules/squatch/scripts/squatch.js', './scripts/**/*.js'],
    jsDest = './public/js';

var sassOptions = {
    errLogToConsole: true,
    outputStyle: 'expanded'
};

gulp.task('sass', function() {
    return (
        gulp
            // Find all `.scss` files from the `stylesheets/` folder
            .src(input)
            // Run Sass on those files
            .pipe(sourcemaps.init())
            .pipe(sass(sassOptions).on('error', sass.logError))
            .pipe(sourcemaps.write())
            .pipe(autoprefixer())
            // Write the resulting CSS in the output folder
            .pipe(gulp.dest(output))
            .pipe(rename({ suffix: '.min' }))
            //write compressed file
            .pipe(sass({ outputStyle: 'compressed' }))
            .pipe(autoprefixer())
            .pipe(gulp.dest(output))
    );
});

gulp.task('scripts', function() {
    return gulp
        .src(jsFiles)
        .pipe(concat('wpsquatch.js'))
        .pipe(gulp.dest(jsDest))
        .pipe(rename('wpsquatch.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(jsDest));
});

gulp.task('watch', function() {
    gulp.watch(input, ['sass']).on('change', function(event) {
        console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
    });
    gulp.watch(jsFiles, ['scripts']).on('change', function(event) {
        console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
    });
});

gulp.task('default', ['sass', 'watch', 'scripts' /*, possible other tasks... */]);
