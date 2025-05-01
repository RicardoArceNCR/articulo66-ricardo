import domReady from '@roots/sage/client/dom-ready';
import initDestacadosSlider from './destacados-slider';
import initPrincipalesSlider from './principales-slider';

/**
 * Application entrypoint
 */
domReady(async () => {
  // Inicializar los sliders
  initDestacadosSlider();
  initPrincipalesSlider();
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error); 