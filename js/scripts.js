/**
 * scripts.js
 *
 * Main JavaScript file for the Rodals Admin Site.
 * v12: Integrated Copy Phone Number functionality into existing structure.
 * MODIFIED: Added LogoCompassHover module.
 */

(function() { // Start IIFE
    'use strict'; // Enforce stricter parsing and error handling

    // --- Configuration ---
    const CONFIG = {
        stickyHeaderThreshold: 50,
        backToTopThreshold: 300,
        scrollAnimationThreshold: 0.15, // Adjusted animation trigger point
        lazyLoadMargin: '200px',
        debounceDelay: 100,
        throttleDelay: 150,
        preloaderFadeOutDuration: 500,
        parallaxSpeed: 0.4,
        localStorageDarkModeKey: 'rodals-dark-mode', // Key for storing theme preference
        animationDuration: 0.8, // Default animation duration in seconds (matches CSS)
        copyFeedbackDuration: 1500 // Duration for copy feedback message (in ms)
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
            // Store original header height (assuming CONFIG holds these if needed, otherwise calculate)
            // this.originalHeight = this.headerElement.offsetHeight;
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
                        // Use CONFIG for default duration, allow override via data attribute
                        const duration = parseInt(target.dataset.duration, 10) || (CONFIG.animationDuration * 1000) || 800;

                        // Ensure opacity is set before starting animation timer
                        target.style.opacity = '1';

                        setTimeout(() => {
                            target.style.animationDuration = `${duration}ms`;
                            target.classList.add('animated', animationClass);
                            // Optional: remove animation classes after completion
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
             if(event) event.stopPropagation(); // Prevent click outside logic when toggle is clicked

            const isOpen = this.navigationContainer.classList.toggle('is-open');
            this.menuToggleButton.setAttribute('aria-expanded', isOpen);
            const icon = this.menuToggleButton.querySelector('i.fa'); // Target only Font Awesome icon
            if (icon) { icon.classList.toggle('fa-bars'); icon.classList.toggle('fa-times'); }
            document.body.classList.toggle('mobile-menu-active', isOpen);
            if (isOpen) {
                 this.setupFocusTrap();
                 // Delay focus slightly to ensure elements are visible after animation/display change
                 setTimeout(() => this.firstFocusableElement?.focus(), 50);
            } else {
                 // Refocus the toggle button if focus was inside the menu or on the button itself
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
                if (!this.firstFocusableElement) return; // No focusable elements
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
                 this.toggleMenu(); // Pass no event here to avoid issues
             }
         }
    };

    const SmoothScroll = {
        init: function() { this.bindEvents(); },
        bindEvents: function() { document.addEventListener('click', this.handleClick.bind(this)); },
        handleClick: function(event) {
            const link = event.target.closest('a[href^="#"]');
             if (!link || link.getAttribute('href') === '#') return; // Ignore empty or plain "#" links

            const targetId = link.getAttribute('href');
            let targetElement = null;
             try {
                 // Ensure the selector is valid CSS
                 if (targetId.length > 1 && targetId.startsWith('#') && !targetId.includes(' ')) {
                      targetElement = document.querySelector(targetId);
                 } else {
                     console.warn(`SmoothScroll: Potentially invalid selector "${targetId}"`);
                     return; // Don't proceed with invalid selectors
                 }
            } catch (e) {
                console.error(`SmoothScroll: Error querying selector "${targetId}"`, e);
                return; // Exit if selector causes error
            }

            if (targetElement) {
                event.preventDefault(); // Prevent default browser jump only if target exists on page

                const header = document.getElementById('site-header');
                const headerHeight = (header && header.classList.contains('is-sticky'))
                                      ? (parseInt(getComputedStyle(header).height, 10) || 60) // Use computed or fallback sticky height
                                      : (header ? (parseInt(getComputedStyle(header).height, 10) || 75) : 0); // Use computed or fallback normal height

                const elementPosition = targetElement.getBoundingClientRect().top;
                const scrollMarginTop = parseInt(window.getComputedStyle(targetElement).scrollMarginTop || '0', 10);
                const buffer = 16; // Small buffer space
                const offsetPosition = window.scrollY + elementPosition - headerHeight - scrollMarginTop - buffer;

                window.scrollTo({ top: offsetPosition, behavior: 'smooth' });

                 // Close mobile menu if open
                 const mobileNav = document.getElementById('main-navigation');
                 if(mobileNav && mobileNav.classList.contains('is-open')) {
                     if (typeof MobileMenu !== 'undefined' && MobileMenu.toggleMenu) {
                         MobileMenu.toggleMenu();
                     }
                 }
            }
            // If targetElement is not found, default link behavior is allowed
        }
    };

   // --- UPDATED: Dark Mode Toggle Module ---
   const DarkModeToggle = {
    init: function() {
        this.toggleButton = document.getElementById('dark-mode-toggle');
        // Target html element instead of body
        this.htmlElement = document.documentElement; // <-- Changed from document.body
        if (!this.toggleButton) {
             console.warn('Dark mode toggle button not found.');
             return;
         }
         this.icon = this.toggleButton.querySelector('i.fa');
         // Note: Initial theme application still happens via inline script in <head>
         // We just need to make sure the *toggle* function targets the right element
         // and updates the button state correctly based on htmlElement.
         this.updateButtonState(); // Update button based on initial state applied by inline script
         this.bindEvents();
         console.log('Dark Mode Toggle Initialized (targeting <html>).');
    },
    // applyInitialTheme function is removed as the inline script handles the initial state
    bindEvents: function() {
        this.toggleButton.addEventListener('click', this.toggleDarkMode.bind(this));
    },
    updateButtonState: function() {
         const isDarkMode = this.htmlElement.classList.contains('dark-mode');
         if (this.icon) {
            if (isDarkMode) {
                this.icon.classList.remove('fa-moon-o');
                this.icon.classList.add('fa-sun-o');
                this.toggleButton.setAttribute('aria-label', 'Switch to light mode');
            } else {
                this.icon.classList.remove('fa-sun-o');
                this.icon.classList.add('fa-moon-o');
                this.toggleButton.setAttribute('aria-label', 'Switch to dark mode');
            }
         }
    },
    toggleDarkMode: function() {
        // Toggle class on html element
        const enabling = !this.htmlElement.classList.contains('dark-mode');
        if (enabling) {
            this.enableDarkMode();
        } else {
            this.disableDarkMode();
        }
    },
    enableDarkMode: function(savePreference = true) {
        // Add class to html element
        this.htmlElement.classList.add('dark-mode'); // <-- Changed from this.body
        this.updateButtonState(); // Update button based on new state
        if (savePreference) {
            try { localStorage.setItem(CONFIG.localStorageDarkModeKey, 'dark'); } catch (e) { console.error('Failed to save dark mode preference.', e); }
        }
        console.log('Dark mode enabled');
    },
    disableDarkMode: function(savePreference = true) {
        // Remove class from html element
        this.htmlElement.classList.remove('dark-mode'); // <-- Changed from this.body
        this.updateButtonState(); // Update button based on new state
        if (savePreference) {
             try { localStorage.setItem(CONFIG.localStorageDarkModeKey, 'light'); } catch (e) { console.error('Failed to save light mode preference.', e); }
         }
         console.log('Dark mode disabled');
    }
};

    // --- **NEW/REVISED** Copy Phone Number to Clipboard Module ---
    const CopyPhoneNumber = {
        feedbackTimeout: null,

        init: function() {
            console.log('Initializing Phone Number Copy feature (v2)...');
            document.body.addEventListener('click', this.handlePhoneClick.bind(this));
        },

        handlePhoneClick: function(event) {
            const phoneElement = event.target.closest('.js-copy-phone');

            if (!phoneElement) {
                return; // Exit if not a copy target
            }

            // Check if the element is currently showing feedback
            if (phoneElement.classList.contains('copy-feedback-active')) {
                return; // Do nothing if already showing feedback
            }

            event.preventDefault(); // Prevent default action (like tel: link)

            let phoneNumberToCopy = '';

            // --- REVISED NUMBER EXTRACTION ---
            // PRIORITY 1: Get number from 'href' if it's a 'tel:' link
            if (phoneElement.tagName === 'A' && phoneElement.getAttribute('href')?.startsWith('tel:')) {
                 phoneNumberToCopy = phoneElement.getAttribute('href').substring(4);
                 phoneNumberToCopy = phoneNumberToCopy.replace(/[^\d+]/g, '');
            }
            // PRIORITY 2: Get number from a specific data attribute (if you add one)
            else if (phoneElement.dataset.copyValue) {
                 phoneNumberToCopy = phoneElement.dataset.copyValue;
            }
            // PRIORITY 3: Fallback to text content (clean aggressively)
            else {
                 let textContent = phoneElement.textContent || phoneElement.innerText || '';
                 phoneNumberToCopy = textContent.replace(/[^+\d]/g, '');
            }
            // --- END REVISED EXTRACTION ---

            if (!phoneNumberToCopy || !/\d/.test(phoneNumberToCopy)) {
                console.warn('Could not extract a valid phone number from:', phoneElement);
                this.showFeedback(phoneElement, 'Format Invalid');
                return;
            }

            if (navigator.clipboard && typeof navigator.clipboard.writeText === 'function') {
                navigator.clipboard.writeText(phoneNumberToCopy).then(() => {
                    console.log(`Phone number copied: ${phoneNumberToCopy}`);
                    this.showFeedback(phoneElement, 'Copiat!');
                }).catch(err => {
                    console.error('Failed to copy phone number: ', err);
                    this.showFeedback(phoneElement, 'Eroare Copiere');
                });
            } else {
                console.warn('Clipboard API not available.');
                this.showFeedback(phoneElement, 'API Indisponibil');
            }
        },

        showFeedback: function(element, message) {
            // Clear any existing timeout and reset previous element
            if (this.feedbackTimeout) {
                 const previousElement = document.querySelector('.copy-feedback-active[data-original-text]');
                 if(previousElement && previousElement.dataset.originalText) {
                     previousElement.innerText = previousElement.dataset.originalText;
                     previousElement.classList.remove('copy-feedback-active');
                     delete previousElement.dataset.originalText;
                 }
                 clearTimeout(this.feedbackTimeout);
                 this.feedbackTimeout = null;
            }

            // Store original text if not already stored (handles rapid clicks)
            if (!element.hasAttribute('data-original-text')) {
                 element.dataset.originalText = element.innerText;
            }

            // Display feedback
            element.innerText = message;
            element.classList.add('copy-feedback-active');

            // Set timeout to revert
            this.feedbackTimeout = setTimeout(() => {
                 if (element && element.dataset.originalText) {
                     element.innerText = element.dataset.originalText;
                     element.classList.remove('copy-feedback-active');
                     delete element.dataset.originalText; // Clean up data attribute
                 }
                 this.feedbackTimeout = null; // Clear timeout reference
            }, CONFIG.copyFeedbackDuration);
        }
    };
    // --- End Copy Phone Number Module ---

    // --- **NEW** Logo Compass Hover Effect ---
    const LogoCompassHover = {
        init: function() {
            this.logoLink = document.getElementById('companyLogoLink');
            this.logoSvg = document.getElementById('rodals-logo-svg'); // Get SVG by its new ID

            if (!this.logoLink || !this.logoSvg) {
                console.warn('Logo link or SVG element not found for compass hover effect.');
                return;
            }
            this.bindEvents();
            console.log('Logo Compass Hover Initialized.');
        },

        bindEvents: function() {
            // У вас уже есть эти обработчики — просто добавим переключение класса:
            this.logoLink.addEventListener('mouseenter', () => {
              this.logoSvg.classList.add('logo-hovered');
            });
            this.logoLink.addEventListener('mouseleave', () => {
              this.logoSvg.classList.remove('logo-hovered');
            });
          }
          ,

        handleMouseEnter: function() {
            // Add the class to the SVG element itself
            if (this.logoSvg) {
                this.logoSvg.classList.add('logo-hovered');
            }
        },

        handleMouseLeave: function() {
            // Remove the class from the SVG element
            if (this.logoSvg) {
                this.logoSvg.classList.remove('logo-hovered');
            }
        }
    };
    // --- **END** Logo Compass Hover Effect ---


    // --- Initialization Function ---
    function initializeSite() {
        console.log('Rodals Site JS Initializing...');
        // Initialize Dark Mode FIRST to apply theme before other elements might measure/render
        DarkModeToggle.init();

        // Initialize other modules from your original file
        Preloader.init();
        LazyLoadImages.init();
        StickyHeader.init();
        BackToTop.init();
        ScrollAnimations.init();
        MobileMenu.init();
        SmoothScroll.init();

        // Initialize Copy Phone Number
        CopyPhoneNumber.init();

        // --- Initialize Logo Compass Hover Effect ---
        LogoCompassHover.init();
        // --- End Initialization ---

        // --- Initialize Vendor Plugins --- (Copied from your original file)
        if (typeof jQuery !== 'undefined') {
             console.log('jQuery detected. Initializing jQuery plugins...');
            // Initialize Parallax if library is loaded and elements exist
            // Check if Parallax.js is loaded and elements exist
            if (typeof jQuery.fn.parallax === 'function' && $('.parallax-window').length) {
                console.log('Initializing Parallax...');
                 try {
                    $('.parallax-window').parallax({
                         androidFix: true, // Adjust if necessary
                         iosFix: true,     // Adjust if necessary
                         speed: CONFIG.parallaxSpeed,
                         // You might need to explicitly set the image path if data-parallax="scroll" and data-image-src isn't sufficient
                         // imageSrc: $(this).data('image-src') // Example if path is in data-attribute
                    });
                     console.log('Parallax initialized successfully.');
                } catch (e) {
                    console.error('Error initializing Parallax:', e);
                }
            } else {
                if (typeof jQuery.fn.parallax !== 'function') console.warn('Parallax function not found on jQuery.');
                if (!$('.parallax-window').length) console.warn('No parallax window elements found.');
            }

            // Add other jQuery plugin initializations here if needed...
            // e.g., Slick Carousel, Sticky Kit

        } else { console.warn('jQuery not loaded. Skipping jQuery plugin initialization.'); }

        console.log('Rodals Site JS Initialized.');
    }

    // --- DOM Ready Execution --- (Copied from your original file)
    if (document.readyState === 'loading') {
        // Loading hasn't finished yet
        document.addEventListener('DOMContentLoaded', initializeSite);
    } else {
        // `DOMContentLoaded` has already fired
        initializeSite();
    }

})(); // End IIFE