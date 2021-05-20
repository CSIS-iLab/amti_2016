const { dest, src } = require('gulp')
const config = require('../gulp.config.js')
const imagemin = require('gulp-imagemin')

// Grabs all images, runs them through imagemin
// and plops them in the dist folder
const images = () => {
  // We have specific configs for jpeg and png files to try
  // to really pull down asset sizes
  return src(config.assets + config.imagemin.src + '/**/*')
    .pipe(
      imagemin(
        [
          imagemin.mozjpeg(config.imagemin.mozjpeg),
          imagemin.optipng(config.imagemin.optipng),
          imagemin.svgo({
            plugins: config.imagemin.svgoPlugins,
          }),
        ],
        {
          silent: true,
        }
      )
    )
    .pipe(dest(config.assets + config.imagemin.dest))
}

module.exports = images
