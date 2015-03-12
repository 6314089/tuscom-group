var
gulp = require('gulp'),
sass = require('gulp-sass'),
autoprefixer = require('gulp-autoprefixer'),
plumber = require("gulp-plumber"),
imagemin = require('gulp-imagemin'),
cssbeautify = require('gulp-cssbeautify'),
jsprettify = require('gulp-jsbeautifier'),
changed = require('gulp-changed'),
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
    .pipe(changed(paths.dist+"/img"))
    .pipe(imagemin())
    .pipe(gulp.dest(paths.dist+"/img"));
});

gulp.task('sass', function() {
    gulp
    .src(paths.scss)
    .pipe(plumber())
    .pipe(changed(paths.dist))
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
    .pipe(changed(paths.dist+"/js"))
    .pipe(jsprettify())
    .pipe(gulp.dest(paths.dist+"/js"));
});

gulp.task('php', function() {
    gulp
    .src(paths.php)
    .pipe(plumber())
    .pipe(changed(paths.dist))
    .pipe(gulp.dest(paths.dist));
});

gulp.task('functions', function() {
    gulp
    .src(paths.functions)
    .pipe(plumber())
    .pipe(changed(paths.dist+"/functions"))
    .pipe(gulp.dest(paths.dist+"/functions"));
});

gulp.task('clean', function(cb) {
  del(paths.dist, cb);
});

gulp.task('watch', function() {
    gulp.watch(paths.scss,['sass']);
    gulp.watch('./src/scss/cssHeader.txt',['sass']);
    gulp.watch(paths.php,['php']);
    gulp.watch(paths.functions,['functions']);
    gulp.watch(paths.js,['js']);
    gulp.watch(paths.image,['image']);
});

gulp.task('build', ['clean'], function(){
    gulp.start('create');
});

gulp.task('create', ['sass','php','functions','js','image']);
gulp.task('default', ['build','watch']);
