var gulp = require('gulp');
var replace = require('gulp-replace');
var concat = require('gulp-concat');
var less = require('gulp-less');
var prefix = require('gulp-autoprefixer');
var minifyCSS = require('gulp-minify-css');
var uglify = require('gulp-uglify');
var jshint = require('gulp-jshint');
var refresh = require('gulp-livereload');
var lr = require('tiny-lr');
var server = lr();


gulp.task('scripts', function() {
    gulp.src([
    		'src/js/plugins/jquery.min.js',
            'src/js/plugins/jquery.easyModal.js',
            'src/js/plugins/slick.js',
    		'src/js/main.js'
    	])
        .pipe(jshint())
    	.pipe(uglify())
        .pipe(concat('main.min.js'))
        .pipe(gulp.dest('build/js/'))
        .pipe(refresh(server))
});

gulp.task('styles', function() {
    gulp.src(['src/less/style.less'])
        .pipe(less())
        .pipe(minifyCSS())
        .pipe(prefix(['last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'], { cascade: true }))
        .pipe(concat('style.min.css'))
        .pipe(gulp.dest('build/css/'))
        .pipe(refresh(server))
});

gulp.task('stylesDev', function() {
    gulp.src(['src/less/style.less'])
        .pipe(less())
        .pipe(prefix(['last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'], { cascade: true }))
        .pipe(concat('style.css'))
        .pipe(gulp.dest('src/css/'))
        .pipe(refresh(server))
});

gulp.task('images', function(){
	gulp.src(['src/img/*'])
		.pipe(gulp.dest('build/img/'))
        .pipe(refresh(server))
});


gulp.task('embedProd', function() {

    gulp.src(['header.php'])
        .pipe(replace(/(<!--GameChangersHeadStart([^]*)GameChangersHeadEnd-->)/ig,'\
<!--GameChangersHeadStart-->\
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/build/css/style.min.css">\
<!--GameChangersHeadEnd-->'))
        .pipe(replace(/(<!--GameChangersMetaStart([^]*)GameChangersMetaEnd-->)/ig,'\
<!--GameChangersMetaStart-->\
<META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">\
<!--GameChangersMetaEnd-->'))
        .pipe(gulp.dest('.'))
        .pipe(refresh(server));

    gulp.src(['footer.php'])
        .pipe(replace(/(<!--GameChangersScriptsStart([^]*)GameChangersScriptsEnd-->)/ig,'\
<!--GameChangersScriptsStart-->\
<script src="<?php echo get_stylesheet_directory_uri(); ?>/build/js/main.min.js"></script>\
<!--GameChangersScriptsEnd-->'))
        .pipe(gulp.dest('.'))
        .pipe(refresh(server));

});

gulp.task('embedDev', function() {
    
    gulp.src(['header.php'])
        .pipe(replace(/(<!--devHeadStart([^]*)devHeadEnd-->)/ig,'\
<!--devHeadStart-->\
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/src/css/style.css">\
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/src/js/plugins/jquery.min.js"></script>\
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/src/js/plugins/jquery.easyModal.js"></script>\
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/src/js/plugins/slick.js"></script>\
<!--devHeadEnd-->'))
        .pipe(replace(/(<!--devMetaStart([^]*)devMetaEnd-->)/ig,'\
<!--devMetaStart-->\
<META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">\
<!--devMetaEnd-->'))
        .pipe(gulp.dest('.'))
        .pipe(refresh(server));

    gulp.src(['footer.php'])
        .pipe(replace(/(<!--devScriptsStart([^]*)devScriptsEnd-->)/ig,'\
<!--devScriptsStart edited by gulpfile.js-->\
<script src="<?php echo get_stylesheet_directory_uri(); ?>/src/js/main.js"></script>\
<!--devScriptsEnd-->'))
        .pipe(gulp.dest('.'))
        .pipe(refresh(server));
});


gulp.task('lr-server', function() {
    server.listen(35729, function(err) {
        if(err) return console.log(err);
    });
});

gulp.task('watchDev', function () {
    gulp.watch('src/js/**', ['scripts']);
    gulp.watch('src/less/**', ['stylesDev']);
    gulp.watch('src/img/**', ['images']);
});

gulp.task('watchProd', function () {
    gulp.watch('src/js/**', ['scripts']);
    gulp.watch('src/less/**', ['styles']);
    gulp.watch('src/img/**', ['images']);
});

gulp.task('production', ['scripts','styles','images','embedProd']);
gulp.task('dev', ['scripts', 'stylesDev', 'images', 'embedDev']);

gulp.task('build', ['production','watchProd']);
gulp.task('default', ['dev','watchDev']);

