const { parallel, series, watch } = require('gulp')
const browsersync = require('browser-sync').create()
const del = require('del')
const config = require('./gulp.config.js')

// Pull in each task
const images = require('./gulp-tasks/images.js')
const sass = require('./gulp-tasks/sass.js')
const webpack = require('./gulp-tasks/webpack.js')
const eslint = require('./gulp-tasks/eslint.js')

function serve(done) {
  browsersync.init({
    proxy: config.projectURL,
    open: config.browserAutoOpen,
    injectChanges: config.injectChanges,
    watchEvents: ['change', 'add', 'unlink', 'addDir', 'unlinkDir'],
  })
  done()
}

const reload = (done) => {
  browsersync.reload()
  done()
}

// Set each directory and contents that we want to watch and
// assign the relevant task. `ignoreInitial` set to true will
// prevent the task being run when we run `gulp watch`, but it
// will run when a file changes.
const watcher = () => {
  watch(
    config.assets + config.imagemin.src + '/**/*',
    { ignoreInitial: true },
    series(images, reload)
  )
  watch(
    config.assets + config.sass.src + '/**/*.scss',
    { ignoreInitial: true },
    series(sass, reload)
  )
  watch(config.assets + config.js.src + '/**/*', series(webpack, reload))

  watch(config.php, reload) // Reload on PHP file changes.

  watch(config.pluginsJS, reload) // Reload on plugin JS file changes.
}

// Clean dist folder
function clean() {
  return del([
    config.assets + config.sass.dest,
    config.assets + config.js.dest,
    config.assets + config.imagemin.dest,
    config.sass.mainStyleSheetDest + '*.css',
    config.sass.mainStyleSheetDest + '*.css.map',
  ])
}

// The default (if someone just runs `gulp`) is to run each task in parallel
exports.default = series(
  clean,
  parallel(images, sass, webpack),
  parallel(serve, watcher)
)

// Build site for production
exports.build = series(
  clean,
  parallel(images, sass, webpack)
)

// This is our watcher task that instructs gulp to watch directories and
// act accordingly
exports.watch = watcher

exports.sass = sass
exports.webpack = webpack
exports.eslint = eslint
