/* Created by Sergey on 15.05.2017.*/

/*===========GULP==============*/


var gulp = require('gulp'),
     sass = require('gulp-sass'),
     plumber = require('gulp-plumber'),
	runSequence = require('run-sequence'),
     autoprefixer = require('gulp-autoprefixer');


/*===========Compile SCSS==============*/


gulp.task('sass', function() {

    gulp.src('sass/**/*.scss')
		.pipe(plumber())
        .pipe(sass())
		.pipe(autoprefixer())
        .pipe(gulp.dest('css'))
        .pipe(sass({errLogToConsole: true}));
});


/*/!*===========Watch==============*!/*/
gulp.task('watch', ['sass'], function (){

	gulp.watch('sass/**/*.scss', ['sass']);
	// others
});


/*/!*=============Join tasks==============*!/*/


gulp.task('default', function(callback) {
	runSequence(['sass', 'watch'],
		callback
	)
});

