/**
 * scripts.js
 *
 * Main JavaScript file for the Rodals Admin Site.
 * v10: Added Dark Mode Toggle functionality. Removed DesktopDropdownToggle.
 */

(function() {
    'use strict'; // Enforce stricter parsing and error handling

    // --- Configuration ---
    const CONFIG = {
        stickyHeaderThreshold: 50,
        backToTopThreshold: 300,
        scrollAnimationThreshold: 0.15,
        lazyLoadMargin: '200px',
        debounceDelay: 100,
        throttleDelay: 150,
        preloaderFadeOutDuration: 500,
        parallaxSpeed: 0.4,
        localStorageDarkModeKey: 'rodals-dark-mode' // Key for storing theme preference
    };

    // --- Utility Functions ---

    function debounce(func, delay = CONFIG.debounceDelay) {
        let timeoutId;
        return function(...args) {
            clearTimeout(timeoutId);
            timeoutId = setTimeout(() => {
                func.apply(this, args);
            }, delay);
        };
    }

    function throttle(func, limit = CONFIG.throttleDelay) {
        let lastFunc;
        let lastRan;
        return function(...args) {
            const context = this;
            if (!lastRan) {
                func.apply(context, args);
                lastRan = Date.now();
            } else {
                clearTimeout(lastFunc);
                lastFunc = setTimeout(function() {
                    if ((Date.now() - lastRan) >= limit) {
                        func.apply(context, args);
                        lastRan = Date.now();
                    }
                }, limit - (Date.now() - lastRan));
            }
        };
    }

    // --- Core Functionality Modules ---

    const Preloader = {
        init: function() {
            this.preloaderElement = document.getElementById('page-preloader');
            if (!this.preloaderElement) return;
            this.bindEvents();
        },
        bindEvents: function() {
            window.addEventListener('load', this.hidePreloader.bind(this));
            // Fallback timeout in case load event fails
            setTimeout(this.hidePreloader.bind(this), 6000);
        },
        hidePreloader: function() {
            if (!this.preloaderElement || this.preloaderElement.classList.contains('preloader-hidden')) return;
            this.preloaderElement.classList.add('preloader-fade-out');
            setTimeout(() => {
                if (this.preloaderElement) {
                   this.preloaderElement.style.display = 'none';
                   this.preloaderElement.classList.add('preloader-hidden');
                }
            }, CONFIG.preloaderFadeOutDuration);
        }
    };

    const LazyLoadImages = {
        init: function() {
            this.lazyImages = document.querySelectorAll('img.lazy, .lazy-bg'); // Include background images
            if (!this.lazyImages.length || !('IntersectionObserver' in window)) {
                 console.warn('Lazy loading not supported or no lazy elements found.');
                 // Fallback: Load all images immediately if no observer support
                 if (!('IntersectionObserver' in window)) {
                     this.lazyImages.forEach(el => this.loadImage(el));
                 }
                 return;
             }
            this.createObserver();
        },
        loadImage: function(element) {
             if (element.dataset.src) {
                 element.src = element.dataset.src;
                 element.removeAttribute('data-src');
             }
             if (element.dataset.bg) {
                 element.style.backgroundImage = `url('${element.dataset.bg}')`;
                 element.removeAttribute('data-bg');
             }
             element.classList.remove('lazy', 'lazy-bg');
             element.classList.add('lazy-loaded');
        },
        createObserver: function() {
            const observerOptions = { root: null, rootMargin: `0px 0px ${CONFIG.lazyLoadMargin} 0px`, threshold: 0.01 };
            const observerCallback = (entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const lazyElement = entry.target;
                        this.loadImage(lazyElement);
                        observer.unobserve(lazyElement);
                    }
                });
            };
            const imageObserver = new IntersectionObserver(observerCallback, observerOptions);
            this.lazyImages.forEach(img => imageObserver.observe(img));
        }
    };

    const StickyHeader = {
        init: function() {
            this.headerElement = document.getElementById('site-header');
            if (!this.headerElement) return;
            this.isSticky = false;
            this.bindEvents();
            this.checkStickyState(); // Initial check
        },
        bindEvents: function() {
            window.addEventListener('scroll', throttle(this.checkStickyState.bind(this)), { passive: true });
        },
        checkStickyState: function() {
            const shouldBeSticky = window.scrollY > CONFIG.stickyHeaderThreshold;
            if (shouldBeSticky && !this.isSticky) {
                this.headerElement.classList.add('is-sticky'); this.isSticky = true;
            } else if (!shouldBeSticky && this.isSticky) {
                this.headerElement.classList.remove('is-sticky'); this.isSticky = false;
            }
        }
    };

    const BackToTop = {
        init: function() {
            this.buttonElement = document.getElementById('back-to-top');
            if (!this.buttonElement) return;
            this.bindEvents();
            this.checkVisibility(); // Initial check
        },
        bindEvents: function() {
            window.addEventListener('scroll', throttle(this.checkVisibility.bind(this)), { passive: true });
            this.buttonElement.addEventListener('click', this.scrollToTop.bind(this));
        },
        checkVisibility: function() {
            if (window.scrollY > CONFIG.backToTopThreshold) {
                this.buttonElement.classList.add('visible'); this.buttonElement.classList.remove('gone');
            } else {
                this.buttonElement.classList.remove('visible'); this.buttonElement.classList.add('gone');
            }
        },
        scrollToTop: function(event) {
            event.preventDefault(); window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    };

    const ScrollAnimations = {
        init: function() {
            this.elementsToAnimate = document.querySelectorAll('.animate-on-scroll');
            if (!this.elementsToAnimate.length || !('IntersectionObserver' in window)) {
                // If no observer or elements, ensure elements are visible if preloader didn't run
                 if (!document.getElementById('page-preloader')) {
                     this.elementsToAnimate.forEach(el => { el.style.opacity = '1'; });
                 }
                 console.warn('Scroll animations not supported or no elements found.');
                 return;
            }
            // Ensure elements start hidden if preloader is not active
            if (!document.getElementById('page-preloader')) {
                 this.elementsToAnimate.forEach(el => { el.style.opacity = '0'; });
            }
            this.createObserver();
        },
        createObserver: function() {
            const observerOptions = { root: null, rootMargin: '0px', threshold: CONFIG.scrollAnimationThreshold };
            const observerCallback = (entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const target = entry.target;
                        const animationClass = target.dataset.animation || 'fadeInUp'; // Default animation
                        const delay = parseInt(target.dataset.delay, 10) || 0;
                        const duration = parseInt(target.dataset.duration, 10) || CONFIG.animationDuration * 1000; // Use configured duration

                        // Ensure opacity is set before starting animation timer
                        target.style.opacity = '1';

                        setTimeout(() => {
                            target.style.animationDuration = `${duration}ms`;
                            target.classList.add('animated', animationClass);
                            // Optional: remove animation classes after completion to prevent re-triggering on style changes
                            // target.addEventListener('animationend', () => {
                            //     target.classList.remove('animated', animationClass);
                            // }, { once: true });
                        }, delay);
                        observer.unobserve(target);
                    }
                });
            };
            const animationObserver = new IntersectionObserver(observerCallback, observerOptions);
            this.elementsToAnimate.forEach(el => animationObserver.observe(el));
        }
    };

    const MobileMenu = {
        init: function() {
            this.menuToggleButton = document.getElementById('mobile-menu-toggle');
            this.navigationContainer = document.getElementById('main-navigation');
            if (!this.menuToggleButton || !this.navigationContainer) return;
            this.menuList = this.navigationContainer.querySelector('ul');
            if (!this.menuList) return;
            this.focusableElementsString = 'a[href], button:not([disabled]), textarea:not([disabled]), input:not([disabled]), select:not([disabled])';
            this.firstFocusableElement = null; this.lastFocusableElement = null;
            this.bindEvents();
        },
        bindEvents: function() {
            this.menuToggleButton.addEventListener('click', this.toggleMenu.bind(this));
            document.addEventListener('keydown', this.handleKeydown.bind(this));
            document.addEventListener('click', this.handleClickOutside.bind(this));
        },
        toggleMenu: function(event) {
             if(event) event.stopPropagation(); // Prevent click outside logic

            const isOpen = this.navigationContainer.classList.toggle('is-open');
            this.menuToggleButton.setAttribute('aria-expanded', isOpen);
            const icon = this.menuToggleButton.querySelector('i.fa'); // Target only Font Awesome icon
            if (icon) { icon.classList.toggle('fa-bars'); icon.classList.toggle('fa-times'); }
            document.body.classList.toggle('mobile-menu-active', isOpen);
            if (isOpen) {
                 this.setupFocusTrap();
                 // Delay focus slightly to ensure elements are visible after animation
                 setTimeout(() => this.firstFocusableElement?.focus(), 50);
            } else {
                 // Refocus the toggle button if it was the element that triggered the close
                 if (document.activeElement === this.menuToggleButton || this.menuList.contains(document.activeElement)) {
                     this.menuToggleButton.focus();
                 }
            }
        },
        setupFocusTrap: function() {
            const focusableContent = this.menuList.querySelectorAll(this.focusableElementsString);
            this.firstFocusableElement = focusableContent[0] || this.menuToggleButton;
            this.lastFocusableElement = focusableContent[focusableContent.length - 1] || this.menuToggleButton;
        },
        handleKeydown: function(event) {
            if (!this.navigationContainer.classList.contains('is-open')) return;
            if (event.key === 'Escape' || event.key === 'Esc') { this.toggleMenu(); return; }
            if (event.key === 'Tab') {
                if (!this.firstFocusableElement) return; // No focusable elements in menu
                if (event.shiftKey) { // Shift + Tab
                    if (document.activeElement === this.firstFocusableElement) {
                        this.lastFocusableElement.focus();
                        event.preventDefault();
                    }
                } else { // Tab
                    if (document.activeElement === this.lastFocusableElement) {
                        this.firstFocusableElement.focus();
                        event.preventDefault();
                    }
                }
            }
        },
         handleClickOutside: function(event) {
             if (!this.navigationContainer.classList.contains('is-open')) return;
             // Close if click is not the toggle button and not inside the nav container itself
             if (!this.menuToggleButton.contains(event.target) && !this.navigationContainer.contains(event.target)) {
                 this.toggleMenu(); // Pass no event here
             }
         }
    };

    const SmoothScroll = {
        init: function() { this.bindEvents(); },
        bindEvents: function() { document.addEventListener('click', this.handleClick.bind(this)); },
        handleClick: function(event) {
            const link = event.target.closest('a[href^="#"]');
             if (!link || link.getAttribute('href') === '#') return; // Ignore empty or plain "#" links

             // Check if the target element exists on the current page
            const targetId = link.getAttribute('href');
            let targetElement = null;
             try {
                 targetElement = document.querySelector(targetId);
            } catch (e) {
                console.warn(`SmoothScroll: Invalid selector "${targetId}"`, e);
                return; // Exit if selector is invalid
            }

            if (targetElement) {
                event.preventDefault(); // Prevent default browser jump only if target exists on page

                const header = document.getElementById('site-header');
                // Check if header is sticky when calculating offset
                const headerHeight = (header && header.classList.contains('is-sticky'))
                                      ? CONFIG.headerHeightSticky
                                      : (header ? CONFIG.headerHeight : 0);

                const elementPosition = targetElement.getBoundingClientRect().top;
                // Respect potential scroll-margin-top defined in CSS
                const scrollMarginTop = parseInt(window.getComputedStyle(targetElement).scrollMarginTop || '0', 10);
                // Calculate final offset, adding a small buffer (e.g., 16px)
                const offsetPosition = window.scrollY + elementPosition - headerHeight - scrollMarginTop - 16;

                window.scrollTo({ top: offsetPosition, behavior: 'smooth' });

                 // Close mobile menu if open after clicking an anchor link
                 const mobileNav = document.getElementById('main-navigation');
                 if(mobileNav && mobileNav.classList.contains('is-open')) {
                     // Ensure MobileMenu has been initialized before calling its methods
                     if (typeof MobileMenu !== 'undefined' && MobileMenu.toggleMenu) {
                         MobileMenu.toggleMenu();
                     }
                 }
            }
            // If targetElement is not found, the default link behavior (potentially navigating away) is allowed
        }
    };

    // --- NEW: Dark Mode Toggle Module ---
    const DarkModeToggle = {
        init: function() {
            this.toggleButton = document.getElementById('dark-mode-toggle');
            this.body = document.body;
            if (!this.toggleButton) {
                 console.warn('Dark mode toggle button not found.');
                 return;
             }
             this.icon = this.toggleButton.querySelector('i.fa'); // Target Font Awesome icon
             this.applyInitialTheme();
            this.bindEvents();
             console.log('Dark Mode Toggle Initialized.');
        },
        applyInitialTheme: function() {
            try {
                const savedPreference = localStorage.getItem(CONFIG.localStorageDarkModeKey);
                if (savedPreference === 'dark') {
                    this.enableDarkMode();
                } else if (savedPreference === 'light') {
                    this.disableDarkMode();
                } else {
                    // Optional: Check system preference if no preference is saved
                    // if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    //     this.enableDarkMode();
                    // }
                }
            } catch (e) {
                console.error('Could not access localStorage for dark mode preference.', e);
            }
        },
        bindEvents: function() {
            this.toggleButton.addEventListener('click', this.toggleDarkMode.bind(this));
            // Optional: Listen for system preference changes
            // window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
            //     if (localStorage.getItem(CONFIG.localStorageDarkModeKey) === null) { // Only change if no manual preference set
            //         e.matches ? this.enableDarkMode(false) : this.disableDarkMode(false);
            //     }
            // });
        },
        toggleDarkMode: function() {
            if (this.body.classList.contains('dark-mode')) {
                this.disableDarkMode();
            } else {
                this.enableDarkMode();
            }
        },
        enableDarkMode: function(savePreference = true) {
            this.body.classList.add('dark-mode');
            if (this.icon) {
                this.icon.classList.remove('fa-moon-o');
                this.icon.classList.add('fa-sun-o');
            }
            this.toggleButton.setAttribute('aria-label', 'Switch to light mode');
            if (savePreference) {
                try { localStorage.setItem(CONFIG.localStorageDarkModeKey, 'dark'); } catch (e) { console.error('Failed to save dark mode preference.', e); }
            }
        },
        disableDarkMode: function(savePreference = true) {
            this.body.classList.remove('dark-mode');
             if (this.icon) {
                 this.icon.classList.remove('fa-sun-o');
                 this.icon.classList.add('fa-moon-o');
             }
            this.toggleButton.setAttribute('aria-label', 'Switch to dark mode');
            if (savePreference) {
                 try { localStorage.setItem(CONFIG.localStorageDarkModeKey, 'light'); } catch (e) { console.error('Failed to save light mode preference.', e); }
             }
        }
    };


    // --- Initialization ---
    function initializeSite() {
        console.log('Rodals Site JS Initializing...');
        // Initialize Dark Mode FIRST to apply theme before other elements might measure/render
        DarkModeToggle.init();

        // Initialize other modules
        Preloader.init();
        LazyLoadImages.init();
        StickyHeader.init();
        BackToTop.init();
        ScrollAnimations.init();
        MobileMenu.init();
        SmoothScroll.init();

        // --- Initialize Vendor Plugins ---
        if (typeof jQuery !== 'undefined') {
             console.log('jQuery detected. Initializing jQuery plugins...');
            // Initialize Parallax if library is loaded and elements exist
            if (typeof jQuery.fn.parallax === 'function' && jQuery('.parallax-window').length > 0) {
                 try {
                     jQuery('.parallax-window').parallax({ speed: CONFIG.parallaxSpeed });
                     console.log('Parallax initialized.');
                 } catch (e) { console.error('Error initializing Parallax:', e); }
             } else if (jQuery('.parallax-window').length > 0) {
                console.warn('Parallax elements found, but parallax.min.js not loaded or loaded after this script.');
             }
        } else { console.warn('jQuery not loaded. Skipping jQuery plugin initialization.'); }

        console.log('Rodals Site JS Initialized.');
    }

    // Wait for the DOM to be ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initializeSite);
    } else {
        initializeSite(); // DOM already ready
    }

})(); // End IIFE