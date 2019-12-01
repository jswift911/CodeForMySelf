const gulp = require('gulp');
const sass = require('gulp-sass');
const plumber = require('gulp-plumber');
const autoprefixer = require('gulp-autoprefixer');
const browserSync = require('browser-sync').create();
const soureceMaps = require('gulp-sourcemaps');

gulp.task('sass', function () {
    return gulp.src('scss/style.scss')
        .pipe(plumber())
        .pipe(soureceMaps.init())
        .pipe(sass())
        .pipe(autoprefixer({
            browsers: ['last 2 version']
        }))
        .pipe(soureceMaps.write())
        .pipe(gulp.dest('build/css'))
        .pipe(browserSync.reload({stream: true}));
});

gulp.task('html', function () {
    return gulp.src('*.html')
        .pipe(gulp.dest('build'))
        .pipe(browserSync.reload({stream: true}));
});

//gulp.task('serve', gulp.parallel("html", "sass"), function () {
gulp.task('serve', function () {
    browserSync.init({
        server: "build"
    });

    gulp.watch("scss/**/*.scss", gulp.parallel("sass"));
    gulp.watch("*.html", gulp.parallel("html"));
});


