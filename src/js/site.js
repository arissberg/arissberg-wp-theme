/* ==========================================================================
  App.js
  ========================================================================== */

import headspace from './utilities/headspace';
import mobileNav from './components/mobile-nav/shape-overlays';
import lazyVideos from './utilities/lazyload';

window.ab_site = {
  init() {
    //Setup the main nav hide/unhide on scroll
    this.mainNav = headspace(document.querySelector(".top-navbar-container"), {
      classNames: {
        base: "top-navbar-container",
        fixed: "fixed",
        hidden: "navbar--hidden",
        hasScrolled: "has-scrolled"
      }
    });

    //Setup the mobile nav
    this.mobileNav = mobileNav();

    //Lazy load assets
    lazyVideos(document.querySelectorAll("video.lazy"));
  },
};

// Code spliting
//-------------
// Was going to use this feature instead of enqueuing scripts with Wordpress
// but there's an issue with the current version of Webpack and Laravel Mix that
// causes the code below to be included in the compliled CSS file. I believe this
// is what was causing rendering issues on some employees Android devices.
// Webpack 5 will apparently have this issue fixed.
function getComponents() {
  // if (document.querySelector('.featured-posts-slider')) {
  //   console.log('Found Featured Posts Slider');
  //   import(/* webpackChunkName: "/dist/js/featuredPostsSlider" */ './components/sliders/featured-posts-slider')
  //     .then(module => module.default('.featured-posts-slider') )
  //     .catch(error => 'An error occurred while loading the team member slider component');
  // }
  // Look for video overlay dom element
  // if (document.getElementById('videoOverlayContainer')) {
  //   console.log('Found the video overlay');
  //   import(/* webpackChunkName: "/dist/js/videoOverlay" */ './components/video-overlay/video-overlay')
  //     .then(module => {
  //       module.default();
  //     })
  //     .catch(error => 'An error occurred while loading the video overlay component');
  // }
  // Look for course registration overlay dom element
  // if (document.getElementById('regContainer')) {
  //   console.log('Found the course registration overlay');
  //   import(/* webpackChunkName: "/dist/js/registrationOverlay" */ './components/course/registration-overlay')
  //     .then(module => {
  //       module.default();
  //     })
  //     .catch(error => 'An error occurred while loading the course registration overlay component');
  // }
  // Look for tab-accordians
  // if (document.querySelector('.tab-accordion')) {
  //   console.log('Found some tab accordions');
  //   import(/* webpackChunkName: "/dist/js/tabAccordion" */ './components/tab-accordion/tab-accordion')
  //     .then(TabAccordion => TabAccordion.init('.tab-accordion') );
  // }
  // Look for show more's
  // if (document.querySelector('.show-more')) {
  //   console.log('Found some show mores');
  //   import(/* webpackChunkName: "/dist/js/showMore" */ './components/show-more/show-more')
  //     .then(module => module.default('.show-more'))
  //     .catch(error => 'An error occurred while loading the show more component');
  // }
}

document.addEventListener('DOMContentLoaded', () => {
  getComponents();

  ab_site.init();
});
