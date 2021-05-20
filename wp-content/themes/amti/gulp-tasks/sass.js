const { dest, src } = require('gulp')
const config = require('../gulp.config.js')
const sassProcessor = require('gulp-sass')
const autoprefixer = require('autoprefixer')
const cssnano = require('cssnano');
const postcss = require('gulp-postcss')
const t2 = require('through2')
const log = require('fancy-log')
const sourcemaps = require('gulp-sourcemaps')
const filter = require('gulp-filter')
const rename = require('gulp-rename')

// We want to be using canonical Sass, rather than node-sass
sassProcessor.compiler = require('sass')

/*----------  SASS  ----------*/

function sass() {
	const plugins = [
		autoprefixer(config.sass.autoprefixer),
		cssnano()
	]

  return (
    src(config.assets + config.sass.src + '/**/*.scss')
			// .pipe(debug())
			.pipe(sourcemaps.init())
      .pipe(
        sassProcessor({ outputStyle: config.sass.outputStyle }).on(
          'error',
          sassProcessor.logError
        )
			)
			.pipe(sourcemaps.write({ includeContent: false }))
      .pipe(sourcemaps.init({ loadMaps: true }))
      .pipe(postcss(plugins))
      .pipe(
        t2.obj((chunk, enc, cb) => {
          // Execute through2
          let date = new Date()
          chunk.stat.atime = date
          chunk.stat.mtime = date
          cb(null, chunk)
        })
			)
			.pipe(sourcemaps.write('./'))
			.pipe(dest(determineDestDirectory))
			.pipe(filter('**/*.css'))
			.pipe(rename({ suffix: '.min' }))
			.pipe(dest(determineDestDirectory))
      .on('end', () => log('SASS updated'))
  )
}

function determineDestDirectory(f) {
  /* We need to move our main stylesheet to the root directory and all others can stay in the asset directory. */
  if (f.relative.includes('/')) {
    return config.assets + config.sass.dest
  }

  return config.sass.mainStyleSheetDest
}

module.exports = sass
