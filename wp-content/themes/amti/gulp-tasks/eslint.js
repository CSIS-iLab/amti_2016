const argv = require('yargs').argv
const config = require('../gulp.config.js')
const { dest, src } = require('gulp')
const eslint = require('gulp-eslint')

// function runESLint () {
//   return src([config.assets + config.js.src + '/**/*.js', '!node_modules/**'])
//     .pipe(eslint())
//     .pipe(eslint.format())
//     .pipe(eslint.failOnError())
// }

function runESLint() {
  let autoFix = false
  let failAfterError = false
  if (argv.fix) {
    autoFix = true
  }

  if (argv.allow_eslint_fail) {
    failAfterError = true
  }

  let stream = src([config.assets + config.js.src + '/**/*.js', '!node_modules/**']).pipe(
    eslint({
			failAfterError: failAfterError,
			fix: autoFix,
		})
	)
	.pipe(eslint.format())

  if (autoFix) {
    stream = stream.pipe(dest(config.assets + config.js.src))
  }

  return stream
}

module.exports = runESLint
