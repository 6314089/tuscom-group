var
gulp = require('gulp'),
sass = require('gulp-sass'),
autoprefixer = require('gulp-autoprefixer'),
plumber = require("gulp-plumber"),
imagemin = require('gulp-imagemin'),
cssbeautify = require('gulp-cssbeautify'),
jsprettify = require('gulp-jsbeautifier'),
del = require('del'),
fs = require('fs'),
header = require('gulp-header');

var paths = {
    scss      :'./src/scss/*.scss',
    js        :'./src/js/*.js',
    php       :'./src/php/*.php',
    functions :'./src/php/functions/*.php',
    image     :'./src/img/*',
    dist      :'./dist'
};


gulp.task('image', function() {
    gulp
    .src(paths.image)
    .pipe(plumber())
    .pipe(imagemin())
    .pipe(gulp.dest(paths.dist+"/img"));
});

gulp.task('sass', function() {
    gulp
    .src(paths.scss)
    .pipe(plumber())
    .pipe(sass({
        errLogToConsole: true,
        sourceComments: 'normal'
    }))
    .pipe(autoprefixer())
    .pipe(cssbeautify())
    .pipe(header(fs.readFileSync('./src/scss/cssHeader.txt', 'utf8')))
    .pipe(gulp.dest(paths.dist));
});

gulp.task('js', function() {
    gulp
    .src(paths.js)
    .pipe(plumber())
    .pipe(jsprettify())
    .pipe(gulp.dest(paths.dist+"/js"));
});

gulp.task('php', function() {
    gulp
    .src(paths.php)
    .pipe(plumber())
    .pipe(gulp.dest(paths.dist));
});

gulp.task('functions', function() {
    gulp
    .src(paths.functions)
    .pipe(plumber())
    .pipe(gulp.dest(paths.dist+"/functions"));
});


gulp.task('watch', function() {
    gulp.watch(paths.scss,['sass']);
    gulp.watch('./src/scss/cssHeader.txt',['sass']);
    gulp.watch(paths.php,['php']);
    gulp.watch(paths.functions,['functions']);
    gulp.watch(paths.js,['js']);
    gulp.watch(paths.image,['image']);
});


gulp.task('create', ['sass','php','functions','js','image']);
gulp.task('default', ['create','watch']);
