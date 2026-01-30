/**
 * SEO Agency Theme - Typography Customizer Live Preview
 */

(function($) {
    'use strict';
    
    // Primary Font Family
    wp.customize('primary_font_family', function(value) {
        value.bind(function(to) {
            if (to === 'system-ui') {
                $('body').css('font-family', '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif');
            } else {
                $('body').css('font-family', "'" + to + "', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif");
            }
        });
    });
    
    // Body Font Size
    wp.customize('body_font_size', function(value) {
        value.bind(function(to) {
            $('body').css('font-size', to + 'px');
        });
    });
    
    // Body Font Weight
    wp.customize('body_font_weight', function(value) {
        value.bind(function(to) {
            $('body').css('font-weight', to);
        });
    });
    
    // Body Line Height
    wp.customize('body_line_height', function(value) {
        value.bind(function(to) {
            $('body').css('line-height', to);
        });
    });
    
    // Body Letter Spacing
    wp.customize('body_letter_spacing', function(value) {
        value.bind(function(to) {
            $('body').css('letter-spacing', to + 'px');
        });
    });
    
    // Headings Font Family
    wp.customize('secondary_font_family', function(value) {
        value.bind(function(to) {
            var fontFamily = (to === 'same' || to === 'Montserrat') ? 
                wp.customize('primary_font_family').get() : to;
                
            if (fontFamily === 'system-ui') {
                $('h1, h2, h3, h4, h5, h6').css('font-family', '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif');
            } else {
                $('h1, h2, h3, h4, h5, h6').css('font-family', "'" + fontFamily + "', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif");
            }
        });
    });
    
    // Headings Font Weight
    wp.customize('headings_font_weight', function(value) {
        value.bind(function(to) {
            $('h1, h2, h3, h4, h5, h6').css('font-weight', to);
        });
    });
    
    // Heading Sizes
    wp.customize('h1_font_size', function(value) {
        value.bind(function(to) {
            $('h1').css('font-size', to + 'px');
            // Adjust hero title if it's an h1
            $('.hero-section h1').css('font-size', wp.customize('hero_title_size').get() + 'px');
        });
    });
    
    wp.customize('h2_font_size', function(value) {
        value.bind(function(to) {
            $('h2').css('font-size', to + 'px');
        });
    });
    
    wp.customize('h3_font_size', function(value) {
        value.bind(function(to) {
            $('h3').css('font-size', to + 'px');
        });
    });
    
    wp.customize('h4_font_size', function(value) {
        value.bind(function(to) {
            $('h4').css('font-size', to + 'px');
        });
    });
    
    wp.customize('h5_font_size', function(value) {
        value.bind(function(to) {
            $('h5').css('font-size', to + 'px');
        });
    });
    
    wp.customize('h6_font_size', function(value) {
        value.bind(function(to) {
            $('h6').css('font-size', to + 'px');
        });
    });
    
    // Navigation Typography
    wp.customize('nav_font_size', function(value) {
        value.bind(function(to) {
            $('nav a, .menu-item a').css('font-size', to + 'px');
        });
    });
    
    wp.customize('nav_font_weight', function(value) {
        value.bind(function(to) {
            $('nav a, .menu-item a').css('font-weight', to);
        });
    });
    
    // Button Typography
    wp.customize('button_font_size', function(value) {
        value.bind(function(to) {
            $('button, .button, a.button, input[type="submit"], input[type="button"]').css('font-size', to + 'px');
        });
    });
    
    wp.customize('button_font_weight', function(value) {
        value.bind(function(to) {
            $('button, .button, a.button, input[type="submit"], input[type="button"]').css('font-weight', to);
        });
    });
    
    wp.customize('button_text_transform', function(value) {
        value.bind(function(to) {
            $('button, .button, a.button, input[type="submit"], input[type="button"]').css('text-transform', to);
        });
    });
    
    // Special Sections
    wp.customize('hero_title_size', function(value) {
        value.bind(function(to) {
            $('.hero-section h1').css('font-size', to + 'px');
        });
    });
    
    wp.customize('hero_description_size', function(value) {
        value.bind(function(to) {
            $('.hero-section p').css('font-size', to + 'px');
        });
    });
    
    wp.customize('testimonial_text_size', function(value) {
        value.bind(function(to) {
            $('.testimonial-text').css('font-size', to + 'px');
        });
    });
    
    wp.customize('stat_number_size', function(value) {
        value.bind(function(to) {
            $('.stat-number').css('font-size', to + 'px');
        });
    });
    
    // Advanced Settings
    wp.customize('text_rendering', function(value) {
        value.bind(function(to) {
            $('body').css('text-rendering', to);
        });
    });
    
    wp.customize('font_smoothing', function(value) {
        value.bind(function(to) {
            if (to === 'antialiased') {
                $('body').css({
                    '-webkit-font-smoothing': 'antialiased',
                    '-moz-osx-font-smoothing': 'grayscale'
                });
            } else if (to === 'subpixel-antialiased') {
                $('body').css({
                    '-webkit-font-smoothing': 'subpixel-antialiased',
                    '-moz-osx-font-smoothing': 'auto'
                });
            } else {
                $('body').css({
                    '-webkit-font-smoothing': 'none',
                    '-moz-osx-font-smoothing': 'none'
                });
            }
        });
    });
    
    // Handle responsive preview
    function updateResponsiveSizes() {
        var isMobile = $(window).width() <= 768;
        var isSmallMobile = $(window).width() <= 480;
        
        if (isSmallMobile) {
            // Adjust for very small screens
            $('.hero-section h1').css('font-size', (wp.customize('hero_title_size').get() * 0.6) + 'px');
        } else if (isMobile) {
            // Adjust for mobile
            $('.hero-section h1').css('font-size', (wp.customize('hero_title_size').get() * 0.7) + 'px');
        }
    }
    
    // Update on resize in customizer
    $(window).on('resize', updateResponsiveSizes);
    wp.customize.preview.bind('ready', updateResponsiveSizes);
    
})(jQuery);