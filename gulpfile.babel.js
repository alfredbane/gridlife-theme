import { src, dest, watch, task } from 'gulp';
import yargs from 'yargs';
import sass from 'gulp-sass';
import cleanCss from 'gulp-clean-css';
import gulpif from 'gulp-if';

import sourcemaps from 'gulp-sourcemaps';
import postcss from 'gulp-postcss';
import autoprefixer from 'autoprefixer';

/**
 * File paths and environment
 * @type const
*/
const PRODUCTION = yargs.argv.prod;
const SRCPATH = 'assets/itcss';
const SRCFILE = '/style.scss';
const DESTPATH = './';


/**
 * Method to compile sass to css
 * This method uses sourcemap, autoprefixer
 * cleanCss based on environment
 *
 * @method gulp
 *
*/
export const styles = () => {

  return src(SRCPATH+SRCFILE)
    .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss([ autoprefixer() ]))
    .pipe(gulpif(PRODUCTION, cleanCss({ compatibility:'ie8',
                                        level:{1:{specialComments: 'all'}},
                                        format:'keep-breaks',
                                      })))
    .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
    .pipe(dest(DESTPATH))
}


/**
 * Method to watch for any file changes
 * in sass, works on every save from editor
 *
 * @method watch
 *
*/
export const watchForChanges = () => {
  watch(SRCPATH+'/**/*.scss', styles);
}

/**
 * Method to build final file for distribution
 * in sass
 *
 * @method build
 *
*/
export const build = (done) => {
  styles();
  done();
}

export default build;