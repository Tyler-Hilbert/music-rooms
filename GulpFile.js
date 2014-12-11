var gulp = require('gulp');
var path = require('path');
var less = require('gulp-less');
var notify = require('gulp-notify');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var minifyCSS = require('gulp-minify-css');
var autoprefixer = require('gulp-autoprefixer');

var jsOutDir = './public/js/';
var cssOutDir = './public/css/';

var jsDir = './resources/js';
var lessDir = './resources/less/';

var jsFiles = [
	'./resources/js/global.js',
	'./bower_components/jquery/dist/jquery.js'
];

gulp.task('less', function() {
	gulp.src(lessDir + 'styles.less')
		.pipe(less())
		.pipe(autoprefixer('last 10 versions'))
		.pipe(minifyCSS())
		.pipe(gulp.dest(cssOutDir))
		.on('error', function(error) {
			notify.onError({
				title: 'Failure!',
				message: error.message
			});
		})
		.pipe(notify({
			title: 'Success',
			icon: __dirname + '/success.png',
			message: 'LESS compiled without error!'
		}));
});

gulp.task('js', function() {
	gulp.src(jsFiles)
		.pipe(concat('app.js'))
		.pipe(uglify('app.js'))
		.pipe(gulp.dest(jsOutDir));
});

gulp.task('watch', function() {
	gulp.watch(lessDir + '*.less', ['less']);
	gulp.watch(jsDir + '*.js', ['js']);
});

gulp.task('default', ['watch']);