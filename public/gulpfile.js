const { src, dest, watch, series } = require('gulp');
const sass = require('gulp-sass')(require('sass'));

// Task to compile Sass
function compileSass() {
    return src('resources/sass/**/*.scss')  // Source of your .scss files
        .pipe(sass().on('error', sass.logError))
        .pipe(dest('public/css'));  // Output directory for compiled CSS
}

// Watch Sass files for changes
function watchSass() {
    watch('resources/sass/**/*.scss', compileSass);
}

// Default task
exports.default = series(compileSass, watchSass);
