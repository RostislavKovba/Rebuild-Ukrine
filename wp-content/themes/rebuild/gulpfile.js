'use strict';
const gulp = require('gulp');
const sass = require('gulp-dart-sass');
const autoprefixer = require('autoprefixer');
const postcss = require('gulp-postcss');
const cssnano = require('cssnano');
const rigger = require('gulp-rigger');
let terser = require('gulp-terser-js');

var path = {
  build: { 
      js: 'build/js/',
      css: 'build/css/',
  },
  src: { 
      js: 'js/main.js',
      style: 'scss/main.scss',
  },
  watch: {
      js: 'js/**/*.js',
      style: 'scss/**/*.scss',
  },
  clean: './build'
};

gulp.task("style:build", function() {
    return gulp
        .src(path.src.style)
        .pipe(sass().on('error', sass.logError))
        .pipe(postcss([ autoprefixer(), cssnano() ])) 
        .pipe(gulp.dest(path.build.css))
});


gulp.task('js:build', function() {
    return gulp
      .src(path.src.js)
      .pipe(rigger())
      .pipe(terser({
          mangle: {
              toplevel: true
          }
      }))
      .on('error', function (error) {
          if (error.plugin !== "gulp-terser-js") {
              console.log(error.message)
          }
        this.emit('end')
      })
      .pipe(gulp.dest(path.build.js))
  });

gulp.task('serve', gulp.series('style:build', function() {
    gulp.watch(path.watch.style,
      gulp.series('style:build'));

    gulp.watch(path.watch.js,
      gulp.series("js:build"));
  }));
  
  gulp.task('default',
    gulp.series('style:build', "js:build", 'serve'));