/**
 * NGIST Theme JavaScript
 * 
 * @package NGIST_Theme
 * @version 1.0.0
 */

(function($) {
    'use strict';

    // Initialize when document is ready
    $(document).ready(function() {
        initializeTheme();
    });

    /**
     * Initialize all theme functionality
     */
    function initializeTheme() {
        initializeAOS();
        initializeMobileMenu();
        initializeCarousels();
        initializeForms();
        initializeCounters();
        initializeFilterSystem();
        initializeSmoothScrolling();
        initializeBackToTop();
        initializeSearchToggle();
    }

    /**
     * Initialize AOS (Animate On Scroll)
     */
    function initializeAOS() {
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true,
                offset: 100
            });
        }
    }

    /**
     * Initialize Mobile Menu
     */
    function initializeMobileMenu() {
        // Create mobile menu toggle if it doesn't exist
        if (!$('.mobile-menu-toggle').length) {
            $('.main-navigation').before('<button class="mobile-menu-toggle" aria-label="Toggle Menu"><i class="fas fa-bars"></i></button>');
        }

        // Toggle mobile menu
        $(document).on('click', '.mobile-menu-toggle', function() {
            $(this).toggleClass('active');
            $('.main-navigation').toggleClass('active');
            $('body').toggleClass('menu-open');
            
            // Toggle icon
            const icon = $(this).find('i');
            if ($(this).hasClass('active')) {
                icon.removeClass('fa-bars').addClass('fa-times');
            } else {
                icon.removeClass('fa-times').addClass('fa-bars');
            }
        });

        // Close menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.main-navigation, .mobile-menu-toggle').length) {
                $('.mobile-menu-toggle').removeClass('active');
                $('.main-navigation').removeClass('active');
                $('body').removeClass('menu-open');
                $('.mobile-menu-toggle i').removeClass('fa-times').addClass('fa-bars');
            }
        });

        // Close menu on window resize
        $(window).on('resize', function() {
            if ($(window).width() > 768) {
                $('.mobile-menu-toggle').removeClass('active');
                $('.main-navigation').removeClass('active');
                $('body').removeClass('menu-open');
                $('.mobile-menu-toggle i').removeClass('fa-times').addClass('fa-bars');
            }
        });
    }

    /**
     * Initialize Carousels
     */
    function initializeCarousels() {
        if (typeof Splide !== 'undefined') {
            // Hero carousel
            const heroCarousel = document.querySelector('.hero-carousel');
            if (heroCarousel) {
                new Splide(heroCarousel, {
                    type: 'loop',
                    autoplay: true,
                    interval: 5000,
                    arrows: false,
                    pagination: true,
                    pauseOnHover: true
                }).mount();
            }

            // Testimonials carousel
            const testimonialsCarousel = document.querySelector('.testimonials-carousel');
            if (testimonialsCarousel) {
                new Splide(testimonialsCarousel, {
                    type: 'loop',
                    autoplay: true,
                    interval: 4000,
                    arrows: true,
                    pagination: false,
                    perPage: 1,
                    gap: '2rem'
                }).mount();
            }

            // Programs carousel
            const programsCarousel = document.querySelector('.programs-carousel');
            if (programsCarousel) {
                new Splide(programsCarousel, {
                    type: 'loop',
                    autoplay: false,
                    arrows: true,
                    pagination: false,
                    perPage: 3,
                    gap: '2rem',
                    breakpoints: {
                        768: {
                            perPage: 1
                        },
                        1024: {
                            perPage: 2
                        }
                    }
                }).mount();
            }
        }
    }

    /**
     * Initialize Forms
     */
    function initializeForms() {
        // Contact form submission
        $(document).on('submit', '.contact-form', function(e) {
            e.preventDefault();
            
            const form = $(this);
            const submitBtn = form.find('button[type="submit"]');
            const originalText = submitBtn.text();
            
            // Show loading state
            submitBtn.prop('disabled', true).text('Sending...');
            
            // Collect form data
            const formData = {
                action: 'ngist_contact_form',
                nonce: ngist_ajax.nonce,
                name: form.find('input[name="name"]').val(),
                email: form.find('input[name="email"]').val(),
                subject: form.find('input[name="subject"]').val(),
                message: form.find('textarea[name="message"]').val()
            };
            
            // Submit via AJAX
            $.post(ngist_ajax.ajax_url, formData)
                .done(function(response) {
                    if (response.success) {
                        showNotification('success', response.data);
                        form[0].reset();
                    } else {
                        showNotification('error', response.data);
                    }
                })
                .fail(function() {
                    showNotification('error', 'An error occurred. Please try again.');
                })
                .always(function() {
                    submitBtn.prop('disabled', false).text(originalText);
                });
        });

        // Multi-step form navigation
        $(document).on('click', '.form-step-next', function() {
            const currentStep = $(this).closest('.form-step');
            const nextStep = currentStep.next('.form-step');
            
            if (validateFormStep(currentStep)) {
                currentStep.removeClass('active');
                nextStep.addClass('active');
                updateProgressBar();
            }
        });

        $(document).on('click', '.form-step-prev', function() {
            const currentStep = $(this).closest('.form-step');
            const prevStep = currentStep.prev('.form-step');
            
            currentStep.removeClass('active');
            prevStep.addClass('active');
            updateProgressBar();
        });

        // Form validation
        function validateFormStep(step) {
            let isValid = true;
            
            step.find('input[required], select[required], textarea[required]').each(function() {
                if (!$(this).val()) {
                    $(this).addClass('error');
                    isValid = false;
                } else {
                    $(this).removeClass('error');
                }
            });
            
            return isValid;
        }

        // Update progress bar
        function updateProgressBar() {
            const totalSteps = $('.form-step').length;
            const currentStepIndex = $('.form-step.active').index() + 1;
            const progress = (currentStepIndex / totalSteps) * 100;
            
            $('.progress-bar').css('width', progress + '%');
            $('.step-counter').text(currentStepIndex + ' of ' + totalSteps);
        }
    }

    /**
     * Initialize Animated Counters
     */
    function initializeCounters() {
        const counters = $('.counter');
        
        if (counters.length && typeof anime !== 'undefined') {
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const counter = $(entry.target);
                        const target = parseInt(counter.data('target'));
                        
                        anime({
                            targets: entry.target,
                            innerHTML: [0, target],
                            easing: 'easeOutExpo',
                            duration: 2000,
                            round: 1
                        });
                        
                        observer.unobserve(entry.target);
                    }
                });
            });
            
            counters.each(function() {
                observer.observe(this);
            });
        }
    }

    /**
     * Initialize Filter System
     */
    function initializeFilterSystem() {
        // Program filters
        $(document).on('click', '.filter-btn', function() {
            const filter = $(this).data('filter');
            const container = $(this).closest('.filter-container');
            const items = container.find('.filter-item');
            
            // Update active button
            container.find('.filter-btn').removeClass('active');
            $(this).addClass('active');
            
            // Filter items
            if (filter === 'all') {
                items.show();
            } else {
                items.hide();
                items.filter('[data-category="' + filter + '"]').show();
            }
        });

        // Search functionality
        $(document).on('input', '.search-input', function() {
            const searchTerm = $(this).val().toLowerCase();
            const container = $(this).closest('.search-container');
            const items = container.find('.search-item');
            
            items.each(function() {
                const text = $(this).text().toLowerCase();
                if (text.includes(searchTerm)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    }

    /**
     * Initialize Smooth Scrolling
     */
    function initializeSmoothScrolling() {
        $(document).on('click', 'a[href^="#"]', function(e) {
            const target = $(this.getAttribute('href'));
            
            if (target.length) {
                e.preventDefault();
                
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'easeInOutCubic');
            }
        });
    }

    /**
     * Initialize Back to Top Button
     */
    function initializeBackToTop() {
        // Create back to top button if it doesn't exist
        if (!$('.back-to-top').length) {
            $('body').append('<button class="back-to-top" aria-label="Back to Top"><i class="fas fa-arrow-up"></i></button>');
        }

        const backToTop = $('.back-to-top');
        
        // Show/hide on scroll
        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 300) {
                backToTop.addClass('visible');
            } else {
                backToTop.removeClass('visible');
            }
        });

        // Scroll to top on click
        backToTop.on('click', function() {
            $('html, body').animate({
                scrollTop: 0
            }, 800, 'easeInOutCubic');
        });
    }

    /**
     * Initialize Search Toggle
     */
    function initializeSearchToggle() {
        $(document).on('click', '.search-toggle', function() {
            $('.search-overlay').addClass('active');
            $('.search-overlay input').focus();
        });

        $(document).on('click', '.search-close, .search-overlay', function(e) {
            if (e.target === this) {
                $('.search-overlay').removeClass('active');
            }
        });

        // Close search on escape key
        $(document).on('keydown', function(e) {
            if (e.keyCode === 27) {
                $('.search-overlay').removeClass('active');
            }
        });
    }

    /**
     * Show Notification
     */
    function showNotification(type, message) {
        const notification = $('<div class="notification notification-' + type + '">' + message + '</div>');
        
        $('body').append(notification);
        
        setTimeout(function() {
            notification.addClass('show');
        }, 100);
        
        setTimeout(function() {
            notification.removeClass('show');
            setTimeout(function() {
                notification.remove();
            }, 300);
        }, 5000);
    }

    /**
     * Lazy Loading Images
     */
    function initializeLazyLoading() {
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(function(img) {
                imageObserver.observe(img);
            });
        }
    }

    /**
     * Initialize Sticky Header
     */
    function initializeStickyHeader() {
        const header = $('.site-header');
        let lastScrollTop = 0;

        $(window).on('scroll', function() {
            const scrollTop = $(this).scrollTop();
            
            if (scrollTop > 100) {
                header.addClass('scrolled');
            } else {
                header.removeClass('scrolled');
            }

            // Hide header on scroll down, show on scroll up
            if (scrollTop > lastScrollTop && scrollTop > 200) {
                header.addClass('hidden');
            } else {
                header.removeClass('hidden');
            }
            
            lastScrollTop = scrollTop;
        });
    }

    /**
     * Initialize Parallax Effects
     */
    function initializeParallax() {
        if ($(window).width() > 768) {
            $(window).on('scroll', function() {
                const scrolled = $(this).scrollTop();
                const parallaxElements = $('.parallax');
                
                parallaxElements.each(function() {
                    const speed = $(this).data('speed') || 0.5;
                    const yPos = -(scrolled * speed);
                    $(this).css('transform', 'translateY(' + yPos + 'px)');
                });
            });
        }
    }

    // Initialize additional features
    $(window).on('load', function() {
        initializeLazyLoading();
        initializeStickyHeader();
        initializeParallax();
    });

    // Custom easing function
    $.easing.easeInOutCubic = function(x, t, b, c, d) {
        if ((t /= d / 2) < 1) return c / 2 * t * t * t + b;
        return c / 2 * ((t -= 2) * t * t + 2) + b;
    };

})(jQuery);

// Additional CSS for JavaScript-dependent styles
document.addEventListener('DOMContentLoaded', function() {
    const style = document.createElement('style');
    style.textContent = `
        /* Mobile Menu Styles */
        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--primary-blue);
            cursor: pointer;
            padding: 0.5rem;
        }

        @media (max-width: 768px) {
            .mobile-menu-toggle {
                display: block;
            }
            
            .main-navigation {
                position: fixed;
                top: 100%;
                left: 0;
                right: 0;
                background: var(--white);
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
                transform: translateY(-100%);
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s ease;
                z-index: 999;
            }
            
            .main-navigation.active {
                transform: translateY(0);
                opacity: 1;
                visibility: visible;
            }
            
            .main-navigation ul {
                flex-direction: column;
                padding: 2rem;
                gap: 1rem;
            }
            
            .main-navigation a {
                display: block;
                padding: 1rem;
                border-bottom: 1px solid var(--gray-200);
            }
        }

        /* Back to Top Button */
        .back-to-top {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 50px;
            height: 50px;
            background: var(--primary-blue);
            color: var(--white);
            border: none;
            border-radius: 50%;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px);
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .back-to-top.visible {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .back-to-top:hover {
            background: var(--accent-teal);
            transform: translateY(-2px);
        }

        /* Notifications */
        .notification {
            position: fixed;
            top: 2rem;
            right: 2rem;
            padding: 1rem 2rem;
            border-radius: 0.5rem;
            color: var(--white);
            font-weight: 500;
            transform: translateX(100%);
            opacity: 0;
            transition: all 0.3s ease;
            z-index: 1001;
        }

        .notification.show {
            transform: translateX(0);
            opacity: 1;
        }

        .notification-success {
            background: #10b981;
        }

        .notification-error {
            background: #ef4444;
        }

        /* Form Errors */
        .form-input.error,
        .form-select.error,
        .form-textarea.error {
            border-color: #ef4444;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
        }

        /* Sticky Header */
        .site-header.scrolled {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }

        .site-header.hidden {
            transform: translateY(-100%);
        }

        /* Loading States */
        .loading {
            opacity: 0.6;
            pointer-events: none;
        }

        .spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 2px solid #f3f3f3;
            border-top: 2px solid var(--primary-blue);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Search Overlay */
        .search-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1002;
        }

        .search-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .search-overlay input {
            width: 90%;
            max-width: 600px;
            padding: 1rem 2rem;
            font-size: 2rem;
            border: none;
            border-radius: 0.5rem;
            background: var(--white);
            color: var(--text-dark);
        }

        .search-close {
            position: absolute;
            top: 2rem;
            right: 2rem;
            background: none;
            border: none;
            color: var(--white);
            font-size: 2rem;
            cursor: pointer;
        }
    `;
    document.head.appendChild(style);
});