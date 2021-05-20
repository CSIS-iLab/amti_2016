const argv = require('yargs').argv
const config = require('../gulp.config.js')
const { dest, src } = require('gulp')
const plumber = require('gulp-plumber')
const babel = require('gulp-babel')
const named = require('vinyl-named')
const webpackStream = require('webpack-stream')
const webpack = require('webpack')
const rename = require('gulp-rename') // Renames files E.g. style.css -> style.min.css.

// Flags whether we compress the output etc
const isProduction = process.env.NODE_ENV === 'production'

const jsFiles = []
for (var i = 0; i <= config.js.entry.length - 1; i++) {
  jsFiles.push(config.assets + config.js.src + '/' + config.js.entry[i])
}

config.webpack.module.rules.push(config.eslintLoader)

config.webpack.watch = argv.watch
config.webpack.mode = argv.mode || config.webpack.mode

function webpackTask() {
  if (!jsFiles.length) {
    return src('.', { allowEmpty: true })
  }

  return src(jsFiles)
    .pipe(plumber())
    .pipe(named())
    .pipe(babel())
    .pipe(webpackStream(config.webpack, webpack))
    .pipe(
      rename({
        suffix: '.min',
      })
    )
    .pipe(dest(config.assets + config.js.dest))
}

module.exports = webpackTask
