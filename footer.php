    <footer class="bg-black text-white py-24">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-5xl font-bold mb-6">Ready to scale?</h2>
            <p class="text-slate-400 mb-10 max-w-lg mx-auto">Join 120+ agencies using Done Ventures to execute their fulfillment seamlessly.</p>

            <!-- Newsletter Form -->
            <div class="max-w-md mx-auto relative mb-20">
                <form action="#" method="post" class="newsletter-form">
                    <input type="email" name="email" placeholder="Enter your email" required
                        class="w-full bg-slate-900 border border-slate-800 rounded-full py-4 pl-6 pr-32 text-white focus:outline-none focus:border-brand-orange transition-colors duration-300">
                    <button type="submit"
                        class="absolute right-2 top-2 bottom-2 bg-white text-black font-bold px-6 rounded-full hover:bg-slate-200 transition-colors duration-300">
                        Get Started
                    </button>
                </form>
            </div>

            <!-- Footer Bottom -->
            <div class="flex flex-col md:flex-row justify-between items-center text-xs text-slate-600 pt-8 border-t border-slate-900">
                <div class="flex items-center gap-2 mb-4 md:mb-0">
                    <?php if (has_custom_logo()) : ?>
                        <div class="custom-logo-footer">
                            <?php the_custom_logo(); ?>
                        </div>
                    <?php else : ?>
                        <div class="w-5 h-5 bg-brand-orange rounded flex items-center justify-center text-white font-bold text-[10px]">
                            <?php echo substr(get_bloginfo('name'), 0, 1); ?>
                        </div>
                        <span class="text-slate-500"><?php bloginfo('name'); ?></span>
                    <?php endif; ?>
                </div>
                
                <!-- Footer Menu -->
                <div class="flex gap-6 mb-4 md:mb-0">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'footer',
                        'container' => false,
                        'menu_class' => 'flex gap-6',
                        'fallback_cb' => 'seo_agency_footer_menu_fallback',
                        'walker' => new SEO_Agency_Walker_Nav_Footer(),
                    ]);
                    ?>
                </div>
                
                <div class="mt-4 md:mt-0">
                    <?php echo get_theme_mod('footer_copyright', '© 2024 ' . get_bloginfo('name') . '. All rights reserved.'); ?>
                </div>
            </div>
        </div>
    </footer>

    <!-- Footer Menu Walker -->
    <?php
    class SEO_Agency_Walker_Nav_Footer extends Walker_Nav_Menu {
        public function start_el(&$output, $item, $depth = 0, $args = [], $id = 0) {
            $output .= '<a href="' . esc_url($item->url) . '" class="hover:text-slate-400 transition-colors duration-300">' . esc_html($item->title) . '</a>';
        }
    }

    function seo_agency_footer_menu_fallback() {
        echo '<a href="' . admin_url('nav-menus.php') . '" class="hover:text-slate-400">Privacy</a>';
        echo '<a href="' . admin_url('nav-menus.php') . '" class="hover:text-slate-400">Terms of Use</a>';
        echo '<a href="' . admin_url('nav-menus.php') . '" class="hover:text-slate-400">Login</a>';
    }
    ?>
    
    <!-- Mobile Menu JavaScript -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (mobileMenuToggle && mobileMenu) {
            mobileMenuToggle.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
                mobileMenu.classList.toggle('block');
            });
            
            // Close mobile menu when clicking outside
            document.addEventListener('click', function(event) {
                if (!mobileMenu.contains(event.target) && !mobileMenuToggle.contains(event.target)) {
                    mobileMenu.classList.add('hidden');
                    mobileMenu.classList.remove('block');
                }
            });
        }
        
        // Newsletter form submission
        const newsletterForm = document.querySelector('.newsletter-form');
        if (newsletterForm) {
            newsletterForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const email = this.querySelector('input[name="email"]').value;
                // Add your form submission logic here
                console.log('Newsletter subscription:', email);
                alert('Thank you for subscribing!');
                this.reset();
            });
        }
    });
    </script>
    
    <?php wp_footer(); ?>
</body>
</html>