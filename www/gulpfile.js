var gulp         = require('gulp'),
    sass         = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    rename       = require('gulp-rename'),
    cssmin       = require('gulp-cssmin'),
    jshint       = require('gulp-jshint'),
    concat       = require('gulp-concat'),
    uglify       = require('gulp-uglify'),
    watch        = require('gulp-watch'),
    livereload   = require('gulp-livereload'),
    imagemin     = require('gulp-imagemin'),
    order        = require("gulp-order"),
    critical     = require("critical"),
    sprity       = require('sprity'),
    addsrc       = require('gulp-add-src'),
    gulpif       = require('gulp-if');

gulp.task('sass', function() {
    gulp.src('./css/screen.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer("last 2 version", "ie 9", "ie 8"))
        .pipe(cssmin())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('./dist/css'));
});

gulp.task('js', function() {
    gulp.src('./js/scripts.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'))
        .pipe(addsrc('./bower_components/jquery/dist/jquery.js'))
        .pipe(order([
                'bower_components/jquery/dist/jquery.js',
                'js/scripts.js'
            ], { base: './' }))
        .pipe(concat('scripts.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./dist/js'));
});

gulp.task('images', function () {
    return gulp.src('./images/**/*')
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}]
        }))
        .pipe(gulp.dest('./dist/images'));
});

gulp.task('copystyles', function () {
    return gulp.src('./dist/css/screen.min.css')
        .pipe(rename({
            basename: "site"    // site.css
        }))
        .pipe(gulp.dest('./dist/css'));
});

gulp.task('critical', function() {
    critical.generateInline({
        base: './',
        inline: false,
        src: 'http://localhost:8888',
        css: ['dist/css/screen.min.css'],
        styleTarget: 'dist/css/critical.css',
        ignore: ['@font-face',/url\(/,/.icon/],
        dimensions: [{
            height: 640,
            width: 320
        }, {
            height: 768,
            width: 1024
        }, {
            height: 900,
            width: 1200
        }],
        minify: true
    });
});

gulp.task('sprites', function () {
    return sprity.src({
        src: './images/sprites/*.{png,jpg}',
        style: '_sprite.scss',
        cssPath: '../images',
        prefix: 'sprite',
        'dimension': [{
            ratio: 1, dpi: 72
        }, {
            ratio: 2, dpi: 192
        }],
        processor: 'sass', // make sure you have installed sprity-sass
    })
    .pipe(gulpif('*.png', gulp.dest('./dist/images/'), gulp.dest('./css/ui/')))
});

gulp.task('watch', function() {
    livereload.listen();

    gulp.watch('./css/**/*.scss', ['sass']).on('change', livereload.changed);
    gulp.watch('./js/**/*.js', ['js']).on('change', livereload.changed);
    // gulp.watch('./**/*.php').on('change', livereload.changed);
});

gulp.task('default', ['sass', 'js']);
