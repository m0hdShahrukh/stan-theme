<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>

<body <?php body_class('font-sans text-slate-600 antialiased'); ?>>
<?php wp_body_open(); ?>

<!-- Main Container -->
<div class="bg-[#1a2b47] text-white relative overflow-hidden">

    <!-- Navigation -->
    <nav class="container mx-auto px-4 py-5 flex justify-between relative z-[99] items-center bg-[#1a2942] max-w-[1040px] px-[40px] rounded-[102px] mt-8">
        
        <!-- Logo -->
        <div class="flex items-center gap-2">
            <?php if (has_custom_logo()) : ?>
                <div class="custom-logo">
                    <?php the_custom_logo(); ?>
                </div>
            <?php else : ?>
                <div class="w-8 h-8 bg-brand-orange rounded-lg flex items-center justify-center font-bold text-white">
                    <?php echo substr(get_bloginfo('name'), 0, 1); ?>
                </div>
                <span class="font-bold text-xl tracking-tight"><?php bloginfo('name'); ?></span>
            <?php endif; ?>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden md:flex gap-10 text-sm font-medium text-slate-300">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'gap-[40px] flex',
                'fallback_cb' => 'seo_agency_primary_menu_fallback',
                'walker' => new SEO_Agency_Walker_Nav_Menu(),
            ]);
            ?>
        </div>

        <!-- Mobile Menu Toggle -->
        <button class="md:hidden text-slate-300 hover:text-white focus:outline-none" id="mobile-menu-toggle">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <!-- CTA Button -->
        <a href="/contact" class="hidden md:inline-block bg-brand-orange hover:bg-brand-orangeHover text-white px-6 py-2.5 rounded-full text-sm font-semibold transition-all duration-300 group">
            Get a Proposal <span class="inline-block transition-transform duration-300 group-hover:translate-x-2">→</span>
        </a>
    </nav>

    <!-- Mobile Menu -->
    <div class="md:hidden bg-[#1a2942] px-4 py-3 hidden" id="mobile-menu">
        <?php
        wp_nav_menu([
            'theme_location' => 'primary',
            'container' => false,
            'menu_class' => 'flex flex-col gap-3',
            'fallback_cb' => 'seo_agency_primary_menu_fallback',
            'walker' => new SEO_Agency_Walker_Nav_Mobile(),
        ]);
        ?>
        <a href="/contact" class="mt-4 bg-brand-orange hover:bg-brand-orangeHover text-white px-6 py-3 rounded-full text-sm font-semibold text-center block transition-colors duration-300">
            Get a Proposal
        </a>
    </div>
</div>

<!-- Mobile Menu Walker -->
<?php
class SEO_Agency_Walker_Nav_Mobile extends Walker_Nav_Menu {
    public function start_el(&$output, $item, $depth = 0, $args = [], $id = 0) {
        $output .= '<a href="' . esc_url($item->url) . '" class="text-slate-300 hover:text-white py-2 block transition-colors duration-300">' . esc_html($item->title) . '</a>';
    }
}

// Fallback Menu
function seo_agency_primary_menu_fallback() {
    echo '<a href="' . admin_url('nav-menus.php') . '" class="hover:text-white transition">Add a Menu</a>';
}
?>