/**
 * Hamburger Menu Toggle
 * Handles mobile menu open/close functionality
 *
 * @package purple-surgical
 */

(function($) {
    'use strict';

    $(document).ready(function() {

        // Open menu - Menu trigger click
        $('.menu-trigger').on('click', function(e) {
            e.preventDefault();
            $('.hamburger-menu').addClass('isOpen');
            $('body').addClass('no-scroll');
        });

        // Close menu - Close icon click
        $('.close-icon').on('click', function(e) {
            e.preventDefault();
            $('.hamburger-menu').removeClass('isOpen');
            $('body').removeClass('no-scroll');
        });

        // Close menu when clicking outside (on overlay)
        $('.hamburger-menu').on('click', function(e) {
            if ($(e.target).hasClass('hamburger-menu')) {
                $('.hamburger-menu').removeClass('isOpen');
                $('body').removeClass('no-scroll');
            }
        });

        // Handle submenu toggle for mobile menu - using the button
        $('.mobile-menu .submenu-toggle').on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();

            var $button = $(this);
            var $parentLi = $button.parent();
            var $submenu = $parentLi.find('> .sub-menu');

            // Toggle current submenu
            $parentLi.toggleClass('submenu-open');
            $submenu.slideToggle(300);

            // Close other submenus at the same level
            $parentLi.siblings('.menu-item-has-children').removeClass('submenu-open')
                .find('> .sub-menu').slideUp(300);
        });

        // Close menu on ESC key press
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape' && $('.hamburger-menu').hasClass('isOpen')) {
                $('.hamburger-menu').removeClass('isOpen');
                $('body').removeClass('no-scroll');
            }
        });

        // Close menu on window resize if open (when switching to desktop)
        var resizeTimer;
        $(window).on('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                if ($(window).width() > 991 && $('.hamburger-menu').hasClass('isOpen')) {
                    $('.hamburger-menu').removeClass('isOpen');
                    $('body').removeClass('no-scroll');
                    $('.mobile-menu .submenu-open').removeClass('submenu-open')
                        .find('.sub-menu').removeAttr('style');
                }
            }, 250);
        });

    });

})(jQuery);
