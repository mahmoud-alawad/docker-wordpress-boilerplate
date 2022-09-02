import { domReady } from '@roots/sage/client';
import Alpine from 'alpinejs';
import cssVariables from './utils/cssVariables';

/**
 * app.main
 */
const main = async (err) => {
  if (err) {
    // handle hmr errors
    console.error(err);
  }
  document.addEventListener('alpine:init', () => {

  });
  Alpine.start();
  cssVariables.init();
  // application code
};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);
