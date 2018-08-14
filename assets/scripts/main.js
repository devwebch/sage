window.Vue = require('vue/dist/vue.common');

// Vue component: Example
import componentExample from './components/example.vue';
Vue.component('example', componentExample);

// Vue component: Posts
import componentPosts from './components/posts.vue';
Vue.component('componentPosts', componentPosts);

// Vue global configuration
Vue.config.silent = true;

// Vue init
const app = new Vue({ el: '.wrap' });

/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function ($) {

    // Use this variable to set up the common and page specific functions. If you
    // rename this variable, you will also need to rename the namespace below.
    let Sage = {
        // All pages
        'common': {
            init: function () {
                // JavaScript to be fired on all pages

                // Register Service Worker
                /*if ('serviceWorker' in navigator) {
                        window.addEventListener('load', () => {
                            navigator.serviceWorker.register('/sw.js').then(registration => {
                            console.log('SW registered: ', registration);
                            }).catch(registrationError => {
                                    console.log('SW registration failed: ', registrationError);
                            });
                    });
                }*/

                /**
                 * Sticky header
                 */
                /*let resetThreshold          = 80; // reset banner state
                let triggerThreshold        = 600; // change banner state
                let resetIntentThreshold    = 300;
                let lastScroll              = 0;
                let resetIntentLastScroll   = 0;
                let scrollingDown           = true;
                let resetIntent             = false;

                $(window).scroll(function () {
                    // determine scroll direction
                    if ( window.scrollY > lastScroll ) {
                        scrollingDown   = true;
                        resetIntent     = false;
                        resetIntentLastScroll     = window.scrollY - resetIntentThreshold;
                    } else {
                        scrollingDown = false;
                        if ( window.scrollY < resetIntentLastScroll ) { resetIntent = true; }
                    }
                    // reset the banner classes
                    if ( window.scrollY <= resetThreshold ) {
                        $('.banner').removeClass('banner--sticky').removeClass('banner--unsticky');
                    }
                    // if the scroll if under the threshold and the user is scrolling up
                    if ( window.scrollY > triggerThreshold && scrollingDown === false && resetIntent === true ) {
                        $('.banner').removeClass('banner--sticky').addClass('banner--unsticky');
                    }
                    // if the scroll if beyond the threshold and the user is scrolling down
                    if ( window.scrollY >= triggerThreshold && scrollingDown === true ) {
                        $('.banner').addClass('banner--sticky').removeClass('banner--unsticky');
                    }
                    // store the scroll value for comparison
                    lastScroll = window.scrollY;
                });*/

                /**
                 * Mobile navigation
                 */
                var fadeSpeed = 200;
                $('.nav-mobile').click(function (e) {
                    $('.hamburger').toggleClass('is-active');
                    $('.hamburger').focusout();
                    $(this).toggleClass('open').toggleClass('closed', !$('.nav-mobile').hasClass('open'));
                    $('body').removeClass('nav-mobile-open');
                });

                $('.hamburger').click(function (e) {
                    $(this).toggleClass('is-active');
                    $('body').toggleClass('nav-mobile-open');
                    $('.nav-mobile').toggleClass('open').toggleClass('closed', !$('.nav-mobile').hasClass('open'));
                });
            },
            finalize: function () {
                // JavaScript to be fired on all pages, after page specific JS is fired
            }
        },
        // Home page
        'home': {
            init: function () {
                // JavaScript to be fired on the home page
            },
            finalize: function () {
                // JavaScript to be fired on the home page, after the init JS
            }
        },
        // About us page, note the change from about-us to about_us.
        'about_us': {
            init: function () {
                // JavaScript to be fired on the about us page
                console.log('this is about us');
            }
        }
    };

    // The routing fires all common scripts, followed by the page specific scripts.
    // Add additional events for more control over timing e.g. a finalize event
    var UTIL = {
        fire: function (func, funcname, args) {
            var fire;
            var namespace = Sage;
            funcname = (funcname === undefined) ? 'init' : funcname;
            fire = func !== '';
            fire = fire && namespace[func];
            fire = fire && typeof namespace[func][funcname] === 'function';

            if (fire) {
                namespace[func][funcname](args);
            }
        },
        loadEvents: function () {
            // Fire common init JS
            UTIL.fire('common');

            // Fire page-specific init JS, and then finalize JS
            $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function (i, classnm) {
                UTIL.fire(classnm);
                UTIL.fire(classnm, 'finalize');
            });

            // Fire common finalize JS
            UTIL.fire('common', 'finalize');
        }
    };

    // Load Events
    $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
