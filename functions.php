<?php
// ============================================
// THEME SETUP
// ============================================

function seo_agency_setup()
{
    // Add theme supports
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', [
        'height' => 100,
        'width' => 400,
        'flex-height' => true,
        'flex-width' => true,
    ]);

    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ]);

    // Register navigation menus
    register_nav_menus([
        'primary' => __('Primary Menu', 'seo-agency'),
        'footer' => __('Footer Menu', 'seo-agency'),
    ]);
}
add_action('after_setup_theme', 'seo_agency_setup');

// ============================================
// ENQUEUE SCRIPTS & STYLES
// ============================================

function seo_agency_scripts()
{
    // Remove default WordPress jQuery
    wp_deregister_script('jquery');

    // Enqueue Tailwind CSS via CDN
    wp_enqueue_script('tailwind-cdn', 'https://cdn.tailwindcss.com', [], '3.3.0', false);

    // Add Tailwind config inline
    $tailwind_config = "
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Montserrat', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            dark: '#0B1120',
                            blue: '#1E293B',
                            orange: '#F97316',
                            orangeHover: '#EA580C',
                        }
                    }
                }
            }
        }
    ";
    wp_add_inline_script('tailwind-cdn', $tailwind_config);

    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap', [], null);

    // Custom scrollbar CSS
    $custom_css = "
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #0B1120;
        }
        ::-webkit-scrollbar-thumb {
            background: #334155;
            border-radius: 4px;
        }
        
        /* Hide scrollbar for Chrome, Safari and Opera */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        
        /* Hide scrollbar for IE, Edge and Firefox */
        .no-scrollbar {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
    ";
    wp_add_inline_style('google-fonts', $custom_css);

    // Custom JavaScript
    wp_enqueue_script('seo-agency-custom', get_template_directory_uri() . '/assets/js/custom.js', [], '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'seo_agency_scripts');

// ============================================
// CUSTOM POST TYPES
// ============================================

function seo_agency_register_custom_post_types()
{
    // Services Post Type
    $service_labels = [
        'name' => 'Services',
        'singular_name' => 'Service',
        'menu_name' => 'Services',
        'add_new' => 'Add New Service',
        'add_new_item' => 'Add New Service',
        'edit_item' => 'Edit Service',
        'new_item' => 'New Service',
        'view_item' => 'View Service',
        'search_items' => 'Search Services',
        'not_found' => 'No services found',
        'not_found_in_trash' => 'No services found in Trash',
    ];

    $service_args = [
        'labels' => $service_labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'services'],
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-admin-tools',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'show_in_rest' => true,
    ];
    register_post_type('service', $service_args);

    // Case Studies Post Type
    $case_study_labels = [
        'name' => 'Case Studies',
        'singular_name' => 'Case Study',
        'menu_name' => 'Case Studies',
        'add_new' => 'Add New Case Study',
        'add_new_item' => 'Add New Case Study',
        'edit_item' => 'Edit Case Study',
        'new_item' => 'New Case Study',
        'view_item' => 'View Case Study',
        'search_items' => 'Search Case Studies',
        'not_found' => 'No case studies found',
        'not_found_in_trash' => 'No case studies found in Trash',
    ];

    $case_study_args = [
        'labels' => $case_study_labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'case-studies'],
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 21,
        'menu_icon' => 'dashicons-chart-area',
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'show_in_rest' => true,
    ];
    register_post_type('case_study', $case_study_args);

    // Testimonials Post Type
    $testimonial_labels = [
        'name' => 'Testimonials',
        'singular_name' => 'Testimonial',
        'menu_name' => 'Testimonials',
        'add_new' => 'Add New Testimonial',
        'add_new_item' => 'Add New Testimonial',
        'edit_item' => 'Edit Testimonial',
        'new_item' => 'New Testimonial',
        'view_item' => 'View Testimonial',
        'search_items' => 'Search Testimonials',
        'not_found' => 'No testimonials found',
        'not_found_in_trash' => 'No testimonials found in Trash',
    ];

    $testimonial_args = [
        'labels' => $testimonial_labels,
        'public' => true,
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'testimonials'],
        'capability_type' => 'post',
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => 22,
        'menu_icon' => 'dashicons-testimonial',
        'supports' => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true,
    ];
    register_post_type('testimonial', $testimonial_args);
}
add_action('init', 'seo_agency_register_custom_post_types');
// Client Logos Post Type
function register_client_logos_cpt()
{
    $labels = [
        'name'               => _x('Client Logos', 'post type general name', 'seo-agency'),
        'singular_name'      => _x('Client Logo', 'post type singular name', 'seo-agency'),
        'menu_name'          => _x('Client Logos', 'admin menu', 'seo-agency'),
        'name_admin_bar'     => _x('Client Logo', 'add new on admin bar', 'seo-agency'),
        'add_new'            => _x('Add New', 'client logo', 'seo-agency'),
        'add_new_item'       => __('Add New Client Logo', 'seo-agency'),
        'new_item'           => __('New Client Logo', 'seo-agency'),
        'edit_item'          => __('Edit Client Logo', 'seo-agency'),
        'view_item'          => __('View Client Logo', 'seo-agency'),
        'all_items'          => __('All Client Logos', 'seo-agency'),
        'search_items'       => __('Search Client Logos', 'seo-agency'),
        'parent_item_colon'  => __('Parent Client Logos:', 'seo-agency'),
        'not_found'          => __('No client logos found.', 'seo-agency'),
        'not_found_in_trash' => __('No client logos found in Trash.', 'seo-agency')
    ];

    $args = [
        'labels'             => $labels,
        'description'        => __('Client logos for display in the hero section', 'seo-agency'),
        'public'             => false, // Not publicly accessible
        'publicly_queryable' => false, // Don't allow public queries
        'show_ui'            => true, // Show in admin
        'show_in_menu'       => true, // Show in admin menu
        'query_var'          => false,
        'rewrite'            => false, // No rewrite rules needed
        'capability_type'    => 'post',
        'has_archive'        => false, // No archive page
        'hierarchical'       => false,
        'menu_position'      => 23,
        'menu_icon'          => 'dashicons-images-alt2',
        'supports'           => ['title', 'thumbnail'],
        'show_in_rest'       => false, // Don't use Gutenberg
        'exclude_from_search' => true, // Exclude from search results
    ];

    register_post_type('client_logo', $args);
}
add_action('init', 'register_client_logos_cpt');
// Add thumbnail column to admin list
function seo_agency_client_logo_columns($columns)
{
    $new_columns = [];

    // Reorder columns
    $new_columns['cb'] = $columns['cb'];
    $new_columns['thumbnail'] = __('Logo', 'seo-agency');
    $new_columns['title'] = $columns['title'];
    $new_columns['logo_url'] = __('Website URL', 'seo-agency');
    $new_columns['date'] = $columns['date'];

    return $new_columns;
}
add_filter('manage_client_logo_posts_columns', 'seo_agency_client_logo_columns');
// Display thumbnail in admin list
function seo_agency_client_logo_custom_column($column, $post_id)
{
    switch ($column) {
        case 'thumbnail':
            if (has_post_thumbnail($post_id)) {
                echo get_the_post_thumbnail($post_id, [50, 50], ['style' => 'max-height: 50px; width: auto;']);
            } else {
                echo '<span style="color: #999;">No image</span>';
            }
            break;

        case 'logo_url':
            $url = get_post_meta($post_id, '_client_logo_url', true);
            if ($url) {
                echo '<a href="' . esc_url($url) . '" target="_blank" rel="noopener">' . esc_url($url) . '</a>';
            } else {
                echo '<span style="color: #999;">No URL</span>';
            }
            break;
    }
}
add_action('manage_client_logo_posts_custom_column', 'seo_agency_client_logo_custom_column', 10, 2);

// Make thumbnail column sortable
function seo_agency_client_logo_sortable_columns($columns)
{
    $columns['thumbnail'] = 'thumbnail';
    return $columns;
}
add_filter('manage_edit-client_logo_sortable_columns', 'seo_agency_client_logo_sortable_columns');
// ============================================
// CUSTOM TAXONOMIES
// ============================================

function seo_agency_register_taxonomies()
{
    // Service Categories
    $service_cat_labels = [
        'name' => 'Service Categories',
        'singular_name' => 'Service Category',
        'search_items' => 'Search Service Categories',
        'all_items' => 'All Service Categories',
        'parent_item' => 'Parent Service Category',
        'parent_item_colon' => 'Parent Service Category:',
        'edit_item' => 'Edit Service Category',
        'update_item' => 'Update Service Category',
        'add_new_item' => 'Add New Service Category',
        'new_item_name' => 'New Service Category Name',
        'menu_name' => 'Service Categories',
    ];

    $service_cat_args = [
        'labels' => $service_cat_labels,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'service-category'],
    ];
    register_taxonomy('service_category', ['service'], $service_cat_args);
}
add_action('init', 'seo_agency_register_taxonomies');
// ============================================
// META BOXES FOR CASE STUDIES
// ============================================

function seo_agency_add_case_study_meta_boxes()
{
    add_meta_box(
        'case_study_details',
        'Case Study Details',
        'seo_agency_render_case_study_meta_box',
        'case_study',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'seo_agency_add_case_study_meta_boxes');

function seo_agency_render_case_study_meta_box($post)
{
    wp_nonce_field('case_study_meta_box', 'case_study_meta_box_nonce');

    $percentage = get_post_meta($post->ID, '_case_study_percentage', true);
    $subtitle = get_post_meta($post->ID, '_case_study_subtitle', true);
    $category = get_post_meta($post->ID, '_case_study_category', true);

?>
    <div style="margin: 20px 0;">
        <label for="case_study_percentage" style="display: block; margin-bottom: 8px; font-weight: bold;">
            Growth Percentage
        </label>
        <input type="text" id="case_study_percentage" name="case_study_percentage"
            value="<?php echo esc_attr($percentage); ?>" style="width: 100%; padding: 8px;">
        <p class="description">e.g., "340%", "600%", "105%"</p>
    </div>

    <div style="margin: 20px 0;">
        <label for="case_study_subtitle" style="display: block; margin-bottom: 8px; font-weight: bold;">
            Subtitle/Description
        </label>
        <input type="text" id="case_study_subtitle" name="case_study_subtitle"
            value="<?php echo esc_attr($subtitle); ?>" style="width: 100%; padding: 8px;">
        <p class="description">Short description shown below the title</p>
    </div>

    <div style="margin: 20px 0;">
        <label for="case_study_category" style="display: block; margin-bottom: 8px; font-weight: bold;">
            Category Badge
        </label>
        <select id="case_study_category" name="case_study_category" style="width: 100%; padding: 8px;">
            <option value="">Select Category</option>
            <option value="E-commerce" <?php selected($category, 'E-commerce'); ?>>E-commerce</option>
            <option value="SaaS" <?php selected($category, 'SaaS'); ?>>SaaS</option>
            <option value="Local Business" <?php selected($category, 'Local Business'); ?>>Local Business</option>
            <option value="Enterprise" <?php selected($category, 'Enterprise'); ?>>Enterprise</option>
            <option value="Startup" <?php selected($category, 'Startup'); ?>>Startup</option>
            <option value="Agency" <?php selected($category, 'Agency'); ?>>Agency</option>
        </select>
        <p class="description">Shows as a badge in the top-left corner</p>
    </div>
<?php
}

function seo_agency_save_case_study_meta_box($post_id)
{
    if (!isset($_POST['case_study_meta_box_nonce'])) {
        return;
    }

    if (!wp_verify_nonce($_POST['case_study_meta_box_nonce'], 'case_study_meta_box')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['case_study_percentage'])) {
        update_post_meta($post_id, '_case_study_percentage', sanitize_text_field($_POST['case_study_percentage']));
    }

    if (isset($_POST['case_study_subtitle'])) {
        update_post_meta($post_id, '_case_study_subtitle', sanitize_text_field($_POST['case_study_subtitle']));
    }

    if (isset($_POST['case_study_category'])) {
        update_post_meta($post_id, '_case_study_category', sanitize_text_field($_POST['case_study_category']));
    }
}
add_action('save_post_case_study', 'seo_agency_save_case_study_meta_box');
// ============================================
// META BOXES FOR TESTIMONIALS
// ============================================

function seo_agency_add_testimonial_meta_boxes()
{
    add_meta_box(
        'testimonial_details',
        'Testimonial Details',
        'seo_agency_render_testimonial_meta_box',
        'testimonial',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'seo_agency_add_testimonial_meta_boxes');

function seo_agency_render_testimonial_meta_box($post)
{
    wp_nonce_field('testimonial_meta_box', 'testimonial_meta_box_nonce');

    $rating = get_post_meta($post->ID, '_testimonial_rating', true);
    $position = get_post_meta($post->ID, '_testimonial_position', true);

?>
    <div style="margin: 20px 0;">
        <label for="testimonial_rating" style="display: block; margin-bottom: 8px; font-weight: bold;">
            Rating (1-5)
        </label>
        <select id="testimonial_rating" name="testimonial_rating" style="width: 100%; padding: 8px;">
            <option value="5" <?php selected($rating, '5'); ?>>★★★★★ (5 Stars)</option>
            <option value="4" <?php selected($rating, '4'); ?>>★★★★☆ (4 Stars)</option>
            <option value="3" <?php selected($rating, '3'); ?>>★★★☆☆ (3 Stars)</option>
            <option value="2" <?php selected($rating, '2'); ?>>★★☆☆☆ (2 Stars)</option>
            <option value="1" <?php selected($rating, '1'); ?>>★☆☆☆☆ (1 Star)</option>
        </select>
    </div>

    <div style="margin: 20px 0;">
        <label for="testimonial_position" style="display: block; margin-bottom: 8px; font-weight: bold;">
            Client Position/Company
        </label>
        <input type="text" id="testimonial_position" name="testimonial_position"
            value="<?php echo esc_attr($position); ?>" style="width: 100%; padding: 8px;">
        <p class="description">e.g., "Founder, SEO Elite" or "CEO, Tech Market Care"</p>
    </div>
<?php
}

function seo_agency_save_testimonial_meta_box($post_id)
{
    if (!isset($_POST['testimonial_meta_box_nonce'])) {
        return;
    }

    if (!wp_verify_nonce($_POST['testimonial_meta_box_nonce'], 'testimonial_meta_box')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['testimonial_rating'])) {
        update_post_meta($post_id, '_testimonial_rating', sanitize_text_field($_POST['testimonial_rating']));
    }

    if (isset($_POST['testimonial_position'])) {
        update_post_meta($post_id, '_testimonial_position', sanitize_text_field($_POST['testimonial_position']));
    }
}
add_action('save_post_testimonial', 'seo_agency_save_testimonial_meta_box');
// ============================================
// CUSTOM WALKER FOR NAVIGATION
// ============================================

class SEO_Agency_Walker_Nav_Menu extends Walker_Nav_Menu
{
    public function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
    {
        if (isset($args->item_spacing) && 'discard' === $args->item_spacing) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = ($depth) ? str_repeat($t, $depth) : '';

        $classes = empty($item->classes) ? [] : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<a' . $id . $class_names . ' href="' . esc_url($item->url) . '" class="hover:text-white transition">';

        $title = apply_filters('the_title', $item->title, $item->ID);
        $title = apply_filters('nav_menu_item_title', $title, $item, $args, $depth);

        $item_output = $args->before;
        $item_output .= '<span>' . $title . '</span>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    public function end_el(&$output, $item, $depth = 0, $args = [])
    {
        $output .= '</a>' . "\n";
    }
}

// ============================================
// CUSTOMIZER SETTINGS
// ============================================

function seo_agency_customize_register($wp_customize)
{
    // Hero Section
    $wp_customize->add_section('hero_section', [
        'title' => __('Hero Section', 'seo-agency'),
        'priority' => 30,
    ]);

    $wp_customize->add_setting('hero_badge', [
        'default' => '✨ Scalable Enterprise Solutions',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('hero_badge', [
        'label' => __('Hero Badge Text', 'seo-agency'),
        'section' => 'hero_section',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('hero_title', [
        'default' => 'SEO that scales <br><span class="text-blue-200">on autopilot.</span>',
        'sanitize_callback' => 'wp_kses_post',
    ]);

    $wp_customize->add_control('hero_title', [
        'label' => __('Hero Title', 'seo-agency'),
        'section' => 'hero_section',
        'type' => 'textarea',
    ]);

    $wp_customize->add_setting('hero_description', [
        'default' => 'We help agencies and enterprise brands scale their SEO operations white-labeling, fully managed content strategies without the headache of hiring, training, or managing writers.',
        'sanitize_callback' => 'wp_kses_post',
    ]);

    $wp_customize->add_control('hero_description', [
        'label' => __('Hero Description', 'seo-agency'),
        'section' => 'hero_section',
        'type' => 'textarea',
    ]);

    // Statistics Section
    $wp_customize->add_section('stats_section', [
        'title' => __('Statistics', 'seo-agency'),
        'priority' => 31,
    ]);

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("stat_{$i}_number", [
            'default' => $i == 1 ? '120k+' : ($i == 2 ? '98%' : '3.2M'),
            'sanitize_callback' => 'sanitize_text_field',
        ]);

        $wp_customize->add_control("stat_{$i}_number", [
            'label' => sprintf(__('Stat %d Number', 'seo-agency'), $i),
            'section' => 'stats_section',
            'type' => 'text',
        ]);

        $wp_customize->add_setting("stat_{$i}_label", [
            'default' => $i == 1 ? 'Jobs delivered' : ($i == 2 ? 'Satisfaction' : 'Revenue generated'),
            'sanitize_callback' => 'sanitize_text_field',
        ]);

        $wp_customize->add_control("stat_{$i}_label", [
            'label' => sprintf(__('Stat %d Label', 'seo-agency'), $i),
            'section' => 'stats_section',
            'type' => 'text',
        ]);
    }

    // Footer Section
    $wp_customize->add_section('footer_section', [
        'title' => __('Footer', 'seo-agency'),
        'priority' => 40,
    ]);

    $wp_customize->add_setting('footer_copyright', [
        'default' => '© 2024 Done Ventures. All rights reserved.',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('footer_copyright', [
        'label' => __('Copyright Text', 'seo-agency'),
        'section' => 'footer_section',
        'type' => 'text',
    ]);
}
add_action('customize_register', 'seo_agency_customize_register');

// ============================================
// HELPER FUNCTIONS
// ============================================

function seo_agency_get_logo()
{
    if (has_custom_logo()) {
        return get_custom_logo();
    } else {
        $site_name = get_bloginfo('name');
        $first_letter = substr($site_name, 0, 1);
        return '<div class="w-8 h-8 bg-brand-orange rounded-lg flex items-center justify-center font-bold text-white">' . $first_letter . '</div><span class="font-bold text-xl tracking-tight">' . $site_name . '</span>';
    }
}

// Add body class for the home page
function seo_agency_body_class($classes)
{
    if (is_front_page()) {
        $classes[] = 'front-page';
    }
    return $classes;
}
add_filter('body_class', 'seo_agency_body_class');

// ============================================
// ADDITIONAL CUSTOMIZER SETTINGS
// ============================================

function seo_agency_additional_customizer($wp_customize)
{
    // Services Section
    $wp_customize->add_section('services_section', [
        'title' => __('Services Section', 'seo-agency'),
        'priority' => 32,
    ]);

    $wp_customize->add_setting('services_title', [
        'default' => 'Our SEO Services That <br><span class="text-brand-orange">Drive Scalable Growth</span>',
        'sanitize_callback' => 'wp_kses_post',
    ]);

    $wp_customize->add_control('services_title', [
        'label' => __('Services Title', 'seo-agency'),
        'section' => 'services_section',
        'type' => 'textarea',
    ]);

    $wp_customize->add_setting('services_subtitle', [
        'default' => 'End-to-end solutions for high-growth teams.',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('services_subtitle', [
        'label' => __('Services Subtitle', 'seo-agency'),
        'section' => 'services_section',
        'type' => 'text',
    ]);

    // Process Section
    $wp_customize->add_section('process_section', [
        'title' => __('Process Section', 'seo-agency'),
        'priority' => 33,
    ]);

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("process_step_{$i}_title", [
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ]);

        $wp_customize->add_control("process_step_{$i}_title", [
            'label' => sprintf(__('Step %d Title', 'seo-agency'), $i),
            'section' => 'process_section',
            'type' => 'text',
        ]);

        $wp_customize->add_setting("process_step_{$i}_description", [
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        ]);

        $wp_customize->add_control("process_step_{$i}_description", [
            'label' => sprintf(__('Step %d Description', 'seo-agency'), $i),
            'section' => 'process_section',
            'type' => 'textarea',
        ]);
    }

    // Comparison Section
    $wp_customize->add_section('comparison_section', [
        'title' => __('Comparison Section', 'seo-agency'),
        'priority' => 34,
    ]);

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting("comparison_feature_{$i}", [
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ]);

        $wp_customize->add_control("comparison_feature_{$i}", [
            'label' => sprintf(__('Feature %d', 'seo-agency'), $i),
            'section' => 'comparison_section',
            'type' => 'text',
        ]);
    }

    // Contact/CTA Section
    $wp_customize->add_section('cta_section', [
        'title' => __('Call to Action', 'seo-agency'),
        'priority' => 35,
    ]);

    $wp_customize->add_setting('cta_button_text', [
        'default' => 'Get a Proposal',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('cta_button_text', [
        'label' => __('Button Text', 'seo-agency'),
        'section' => 'cta_section',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('cta_button_url', [
        'default' => '/contact',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control('cta_button_url', [
        'label' => __('Button URL', 'seo-agency'),
        'section' => 'cta_section',
        'type' => 'url',
    ]);

    // Social Media
    $wp_customize->add_section('social_media', [
        'title' => __('Social Media', 'seo-agency'),
        'priority' => 36,
    ]);

    $social_platforms = ['facebook', 'twitter', 'linkedin', 'instagram', 'youtube'];

    foreach ($social_platforms as $platform) {
        $wp_customize->add_setting("social_{$platform}", [
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ]);

        $wp_customize->add_control("social_{$platform}", [
            'label' => ucfirst($platform) . ' URL',
            'section' => 'social_media',
            'type' => 'url',
        ]);
    }
}
add_action('customize_register', 'seo_agency_additional_customizer');

// ============================================
// SOCIAL MEDIA ICONS
// ============================================

function seo_agency_social_icons()
{
    $social_platforms = [
        'facebook' => [
            'url' => get_theme_mod('social_facebook'),
            'icon' => '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>',
        ],
        'twitter' => [
            'url' => get_theme_mod('social_twitter'),
            'icon' => '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.213c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>',
        ],
        'linkedin' => [
            'url' => get_theme_mod('social_linkedin'),
            'icon' => '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>',
        ],
        'instagram' => [
            'url' => get_theme_mod('social_instagram'),
            'icon' => '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>',
        ],
        'youtube' => [
            'url' => get_theme_mod('social_youtube'),
            'icon' => '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>',
        ],
    ];

    $output = '';
    foreach ($social_platforms as $platform => $data) {
        if ($data['url']) {
            $output .= sprintf(
                '<a href="%s" target="_blank" rel="noopener noreferrer" class="text-slate-400 hover:text-brand-orange transition-colors">%s</a>',
                esc_url($data['url']),
                $data['icon']
            );
        }
    }

    return $output;
}

// Add social icons to footer
function seo_agency_footer_social()
{
    $social_icons = seo_agency_social_icons();
    if ($social_icons) {
        echo '<div class="flex gap-4 justify-center mb-4">' . $social_icons . '</div>';
    }
}
add_action('seo_agency_before_footer_copyright', 'seo_agency_footer_social');

// ============================================
// CUSTOM WIDGET AREAS
// ============================================

function seo_agency_widgets_init()
{
    // Footer Widget Area 1
    register_sidebar([
        'name' => __('Footer Column 1', 'seo-agency'),
        'id' => 'footer-1',
        'description' => __('Widgets in this area will be shown in the first footer column.', 'seo-agency'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title font-bold text-white mb-4">',
        'after_title' => '</h4>',
    ]);

    // Footer Widget Area 2
    register_sidebar([
        'name' => __('Footer Column 2', 'seo-agency'),
        'id' => 'footer-2',
        'description' => __('Widgets in this area will be shown in the second footer column.', 'seo-agency'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title font-bold text-white mb-4">',
        'after_title' => '</h4>',
    ]);

    // Footer Widget Area 3
    register_sidebar([
        'name' => __('Footer Column 3', 'seo-agency'),
        'id' => 'footer-3',
        'description' => __('Widgets in this area will be shown in the third footer column.', 'seo-agency'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title font-bold text-white mb-4">',
        'after_title' => '</h4>',
    ]);

    // Sidebar Widget Area
    register_sidebar([
        'name' => __('Blog Sidebar', 'seo-agency'),
        'id' => 'sidebar-1',
        'description' => __('Widgets in this area will be shown on blog posts and archives.', 'seo-agency'),
        'before_widget' => '<div id="%1$s" class="widget %2$s bg-white p-6 rounded-xl shadow-sm mb-6">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title font-bold text-slate-900 mb-4 pb-3 border-b border-slate-100">',
        'after_title' => '</h3>',
    ]);
}
add_action('widgets_init', 'seo_agency_widgets_init');

// Client Logo URL Meta Box
// ============================================
// CLIENT LOGO URL META BOX (UPDATED)
// ============================================

function seo_agency_add_client_logo_meta_box()
{
    add_meta_box(
        'client_logo_url_meta_box',
        __('Logo Details', 'seo-agency'),
        'seo_agency_render_client_logo_meta_box',
        'client_logo',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'seo_agency_add_client_logo_meta_box');

function seo_agency_render_client_logo_meta_box($post)
{
    wp_nonce_field('client_logo_meta_box', 'client_logo_meta_box_nonce');

    $logo_url = get_post_meta($post->ID, '_client_logo_url', true);
    $logo_alt = get_post_meta($post->ID, '_client_logo_alt', true);

?>
    <table class="form-table">
        <tr>
            <th scope="row">
                <label for="client_logo_url"><?php _e('Website URL', 'seo-agency'); ?></label>
            </th>
            <td>
                <input type="url"
                    id="client_logo_url"
                    name="client_logo_url"
                    value="<?php echo esc_url($logo_url); ?>"
                    class="regular-text"
                    placeholder="https://example.com">
                <p class="description">
                    <?php _e('Optional: Link when clicking the logo. Leave empty for no link.', 'seo-agency'); ?>
                </p>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="client_logo_alt"><?php _e('Alt Text', 'seo-agency'); ?></label>
            </th>
            <td>
                <input type="text"
                    id="client_logo_alt"
                    name="client_logo_alt"
                    value="<?php echo esc_attr($logo_alt); ?>"
                    class="regular-text"
                    placeholder="<?php echo esc_attr(get_the_title()); ?> Logo">
                <p class="description">
                    <?php _e('Alt text for accessibility. If empty, post title will be used.', 'seo-agency'); ?>
                </p>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <?php _e('Preview', 'seo-agency'); ?>
            </th>
            <td>
                <?php if (has_post_thumbnail()) : ?>
                    <div style="background: #f5f5f5; padding: 20px; border-radius: 4px; display: inline-block;">
                        <?php the_post_thumbnail('medium', ['style' => 'max-height: 100px; width: auto;']); ?>
                    </div>
                <?php else : ?>
                    <p style="color: #999;">
                        <?php _e('Upload a featured image to see preview.', 'seo-agency'); ?>
                    </p>
                <?php endif; ?>
            </td>
        </tr>
    </table>
    <?php
}

function seo_agency_save_client_logo_meta_box($post_id)
{
    // Check nonce
    if (
        !isset($_POST['client_logo_meta_box_nonce']) ||
        !wp_verify_nonce($_POST['client_logo_meta_box_nonce'], 'client_logo_meta_box')
    ) {
        return;
    }

    // Check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Save URL
    if (isset($_POST['client_logo_url'])) {
        update_post_meta($post_id, '_client_logo_url', esc_url_raw($_POST['client_logo_url']));
    } else {
        delete_post_meta($post_id, '_client_logo_url');
    }

    // Save alt text
    if (isset($_POST['client_logo_alt'])) {
        update_post_meta($post_id, '_client_logo_alt', sanitize_text_field($_POST['client_logo_alt']));
    }
}
add_action('save_post_client_logo', 'seo_agency_save_client_logo_meta_box');
function seo_agency_require_featured_image($post)
{
    if ($post->post_type == 'client_logo' && empty(get_post_thumbnail_id($post->ID))) {
    ?>
        <script>
            jQuery(document).ready(function($) {
                $('#publish').click(function(e) {
                    if ($('#set-post-thumbnail img').length === 0) {
                        e.preventDefault();
                        alert('<?php _e("Please set a featured image (logo) before publishing.", "seo-agency"); ?>');
                        $('html, body').animate({
                            scrollTop: $('#postimagediv').offset().top - 100
                        }, 300);
                    }
                });
            });
        </script>
    <?php
    }
}
add_action('admin_footer-post-new.php', 'seo_agency_require_featured_image');
add_action('admin_footer-post.php', 'seo_agency_require_featured_image');
// Hero Chart Image Customizer Setting
function seo_agency_chart_customizer($wp_customize)
{
    // Add Hero Chart Section
    $wp_customize->add_section('hero_chart_section', [
        'title' => __('Hero Chart', 'seo-agency'),
        'priority' => 31,
    ]);

    // Chart Image
    $wp_customize->add_setting('hero_chart_image', [
        'default' => '',
        'sanitize_callback' => 'absint',
    ]);

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'hero_chart_image', [
        'label' => __('Chart Image', 'seo-agency'),
        'description' => __('Upload a chart/graph image to replace the default chart', 'seo-agency'),
        'section' => 'hero_chart_section',
        'mime_type' => 'image',
    ]));

    // Chart Type (Image or CSS)
    $wp_customize->add_setting('hero_chart_type', [
        'default' => 'css',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('hero_chart_type', [
        'label' => __('Chart Display Type', 'seo-agency'),
        'section' => 'hero_chart_section',
        'type' => 'select',
        'choices' => [
            'css' => 'CSS Chart (Default)',
            'image' => 'Custom Image',
        ],
    ]);

    // // Growth Percentage (shown on chart)
    // $wp_customize->add_setting('hero_growth_percentage', [
    //     'default' => '32.4%',
    //     'sanitize_callback' => 'sanitize_text_field',
    // ]);

    // $wp_customize->add_control('hero_growth_percentage', [
    //     'label' => __('Growth Percentage', 'seo-agency'),
    //     'description' => __('Percentage shown in the chart box (e.g., 32.4%)', 'seo-agency'),
    //     'section' => 'hero_chart_section',
    //     'type' => 'text',
    // ]);
}
add_action('customize_register', 'seo_agency_chart_customizer');

// Client Logos Customizer Settings
function seo_agency_logos_customizer($wp_customize)
{
    // Add Client Logos Section
    $wp_customize->add_section('client_logos_section', [
        'title' => __('Client Logos', 'seo-agency'),
        'priority' => 32,
    ]);

    // Show/Hide Client Logos
    $wp_customize->add_setting('show_client_logos', [
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ]);

    $wp_customize->add_control('show_client_logos', [
        'label' => __('Show Client Logos Section', 'seo-agency'),
        'section' => 'client_logos_section',
        'type' => 'checkbox',
    ]);

    // Logo Opacity
    $wp_customize->add_setting('logos_opacity', [
        'default' => '50',
        'sanitize_callback' => 'absint',
    ]);

    $wp_customize->add_control('logos_opacity', [
        'label' => __('Logos Opacity (%)', 'seo-agency'),
        'section' => 'client_logos_section',
        'type' => 'range',
        'input_attrs' => [
            'min' => 10,
            'max' => 100,
            'step' => 10,
        ],
    ]);

    // Apply Grayscale Filter
    $wp_customize->add_setting('logos_grayscale', [
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ]);

    $wp_customize->add_control('logos_grayscale', [
        'label' => __('Apply Grayscale Filter', 'seo-agency'),
        'section' => 'client_logos_section',
        'type' => 'checkbox',
    ]);
}
add_action('customize_register', 'seo_agency_logos_customizer');

// ============================================
// ADMIN DASHBOARD WIDGETS
// ============================================

function seo_agency_admin_dashboard_widgets()
{
    wp_add_dashboard_widget(
        'seo_agency_quick_links',
        'SEO Agency Theme - Quick Links',
        'seo_agency_render_dashboard_widget'
    );
}
add_action('wp_dashboard_setup', 'seo_agency_admin_dashboard_widgets');

function seo_agency_render_dashboard_widget()
{
    ?>
    <div class="seo-agency-dashboard-widget">
        <style>
            .seo-agency-dashboard-widget .button-grid {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
                margin-bottom: 20px;
            }

            .seo-agency-dashboard-widget .button-grid a {
                display: block;
                padding: 10px;
                background: #f0f0f1;
                border: 1px solid #c3c4c7;
                text-align: center;
                text-decoration: none;
                border-radius: 4px;
                transition: all 0.2s;
            }

            .seo-agency-dashboard-widget .button-grid a:hover {
                background: #2271b1;
                color: white;
                border-color: #2271b1;
            }

            .seo-agency-dashboard-widget .section {
                margin-bottom: 15px;
                padding-bottom: 15px;
                border-bottom: 1px solid #eee;
            }

            .seo-agency-dashboard-widget .section-title {
                font-weight: bold;
                margin-bottom: 10px;
                color: #1d2327;
            }
        </style>

        <div class="section">
            <div class="section-title">Content Management</div>
            <div class="button-grid">
                <a href="<?php echo admin_url('edit.php?post_type=service'); ?>">Manage Services</a>
                <a href="<?php echo admin_url('edit.php?post_type=case_study'); ?>">Manage Case Studies</a>
                <a href="<?php echo admin_url('edit.php?post_type=testimonial'); ?>">Manage Testimonials</a>
                <a href="<?php echo admin_url('edit.php?post_type=client_logo'); ?>">Manage Client Logos</a>
            </div>
        </div>

        <div class="section">
            <div class="section-title">Theme Customization</div>
            <div class="button-grid">
                <a href="<?php echo admin_url('customize.php'); ?>">Customize Theme</a>
                <a href="<?php echo admin_url('nav-menus.php'); ?>">Edit Menus</a>
                <a href="<?php echo admin_url('widgets.php'); ?>">Edit Widgets</a>
                <a href="<?php echo admin_url('options-reading.php'); ?>">Reading Settings</a>
            </div>
        </div>

        <div class="section">
            <div class="section-title">Important Notes</div>
            <ul style="margin-left: 20px; list-style: disc;">
                <li>Testimonials: Set Rating (1-5 stars) and Position in meta box</li>
                <li>Case Studies: Set Percentage, Subtitle, and Category in meta box</li>
                <li>Client Logos: Upload logos as featured images</li>
                <li>Hero Chart: Upload custom chart image in Customizer</li>
            </ul>
        </div>
    </div>
<?php
}
// ============================================
// FLUSH REWRITE RULES ON THEME ACTIVATION
// ============================================

function seo_agency_activate_theme()
{
    // Register custom post types
    seo_agency_register_custom_post_types();

    // Flush rewrite rules
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'seo_agency_activate_theme');

// Also flush when the theme is deactivated
function seo_agency_deactivate_theme()
{
    flush_rewrite_rules();
}
add_action('switch_theme', 'seo_agency_deactivate_theme');

// ============================================
// TYPOGRAPHY CUSTOMIZER SETTINGS
// ============================================

function seo_agency_typography_customizer($wp_customize) {
    
    // Create Typography Panel
    $wp_customize->add_panel('typography_panel', [
        'title' => __('Typography Settings', 'seo-agency'),
        'description' => __('Customize your website typography', 'seo-agency'),
        'priority' => 40,
    ]);
    
    // ============================================
    // GOOGLE FONTS SECTION
    // ============================================
    $wp_customize->add_section('google_fonts_section', [
        'title' => __('Google Fonts', 'seo-agency'),
        'panel' => 'typography_panel',
        'priority' => 10,
    ]);
    
    // Primary Font Family
    $wp_customize->add_setting('primary_font_family', [
        'default' => 'Montserrat',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    
    $wp_customize->add_control('primary_font_family', [
        'label' => __('Primary Font Family', 'seo-agency'),
        'section' => 'google_fonts_section',
        'type' => 'select',
        'choices' => [
            'Montserrat' => 'Montserrat (Default)',
            'Montserrat' => 'Montserrat',
            'Open Sans' => 'Open Sans',
            'Roboto' => 'Roboto',
            'Poppins' => 'Poppins',
            'Nunito' => 'Nunito',
            'Lato' => 'Lato',
            'Raleway' => 'Raleway',
            'Playfair Display' => 'Playfair Display',
            'Source Sans Pro' => 'Source Sans Pro',
            'system-ui' => 'System UI (Browser Default)',
        ],
    ]);
    
    // Primary Font Weights
    $wp_customize->add_setting('primary_font_weights', [
        'default' => '300,400,500,600,700,800',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    
    $wp_customize->add_control('primary_font_weights', [
        'label' => __('Primary Font Weights', 'seo-agency'),
        'description' => __('Comma-separated font weights (e.g., 300,400,500,600,700,800)', 'seo-agency'),
        'section' => 'google_fonts_section',
        'type' => 'text',
    ]);
    
    // Secondary Font Family (for headings)
    $wp_customize->add_setting('secondary_font_family', [
        'default' => 'Montserrat',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    
    $wp_customize->add_control('secondary_font_family', [
        'label' => __('Heading Font Family', 'seo-agency'),
        'description' => __('Font family for headings (H1, H2, H3, etc.)', 'seo-agency'),
        'section' => 'google_fonts_section',
        'type' => 'select',
        'choices' => [
            'same' => 'Same as Primary Font',
            'Montserrat' => 'Montserrat',
            'Montserrat' => 'Montserrat',
            'Open Sans' => 'Open Sans',
            'Roboto' => 'Roboto',
            'Poppins' => 'Poppins',
            'Playfair Display' => 'Playfair Display',
            'Raleway' => 'Raleway',
            'Merriweather' => 'Merriweather',
            'Oswald' => 'Oswald',
            'system-ui' => 'System UI (Browser Default)',
        ],
    ]);
    
    // ============================================
    // BODY TYPOGRAPHY SECTION
    // ============================================
    $wp_customize->add_section('body_typography_section', [
        'title' => __('Body Text', 'seo-agency'),
        'panel' => 'typography_panel',
        'priority' => 20,
    ]);
    
    // Body Font Size
    $wp_customize->add_setting('body_font_size', [
        'default' => '16',
        'sanitize_callback' => 'absint',
    ]);
    
    $wp_customize->add_control('body_font_size', [
        'label' => __('Body Font Size (px)', 'seo-agency'),
        'section' => 'body_typography_section',
        'type' => 'number',
        'input_attrs' => [
            'min' => 12,
            'max' => 24,
            'step' => 1,
        ],
    ]);
    
    // Body Line Height
    $wp_customize->add_setting('body_line_height', [
        'default' => '1.6',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    
    $wp_customize->add_control('body_line_height', [
        'label' => __('Body Line Height', 'seo-agency'),
        'section' => 'body_typography_section',
        'type' => 'number',
        'input_attrs' => [
            'min' => 1.0,
            'max' => 2.5,
            'step' => 0.1,
        ],
    ]);
    
    // Body Font Weight
    $wp_customize->add_setting('body_font_weight', [
        'default' => '400',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    
    $wp_customize->add_control('body_font_weight', [
        'label' => __('Body Font Weight', 'seo-agency'),
        'section' => 'body_typography_section',
        'type' => 'select',
        'choices' => [
            '300' => 'Light (300)',
            '400' => 'Normal (400)',
            '500' => 'Medium (500)',
            '600' => 'Semi-Bold (600)',
            '700' => 'Bold (700)',
        ],
    ]);
    
    // Body Letter Spacing
    $wp_customize->add_setting('body_letter_spacing', [
        'default' => '0',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    
    $wp_customize->add_control('body_letter_spacing', [
        'label' => __('Body Letter Spacing (px)', 'seo-agency'),
        'section' => 'body_typography_section',
        'type' => 'number',
        'input_attrs' => [
            'min' => -2,
            'max' => 5,
            'step' => 0.1,
        ],
    ]);
    
    // ============================================
    // HEADINGS TYPOGRAPHY SECTION
    // ============================================
    $wp_customize->add_section('headings_typography_section', [
        'title' => __('Headings', 'seo-agency'),
        'panel' => 'typography_panel',
        'priority' => 30,
    ]);
    
    // Headings Font Weight
    $wp_customize->add_setting('headings_font_weight', [
        'default' => '700',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    
    $wp_customize->add_control('headings_font_weight', [
        'label' => __('Headings Font Weight', 'seo-agency'),
        'section' => 'headings_typography_section',
        'type' => 'select',
        'choices' => [
            '400' => 'Normal (400)',
            '500' => 'Medium (500)',
            '600' => 'Semi-Bold (600)',
            '700' => 'Bold (700)',
            '800' => 'Extra Bold (800)',
            '900' => 'Black (900)',
        ],
    ]);
    
    // Headings Letter Spacing
    $wp_customize->add_setting('headings_letter_spacing', [
        'default' => '0',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    
    $wp_customize->add_control('headings_letter_spacing', [
        'label' => __('Headings Letter Spacing (px)', 'seo-agency'),
        'section' => 'headings_typography_section',
        'type' => 'number',
        'input_attrs' => [
            'min' => -2,
            'max' => 10,
            'step' => 0.1,
        ],
    ]);
    
    // Headings Line Height
    $wp_customize->add_setting('headings_line_height', [
        'default' => '1.2',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    
    $wp_customize->add_control('headings_line_height', [
        'label' => __('Headings Line Height', 'seo-agency'),
        'section' => 'headings_typography_section',
        'type' => 'number',
        'input_attrs' => [
            'min' => 1.0,
            'max' => 2.0,
            'step' => 0.1,
        ],
    ]);
    
    // Heading H1 Size
    $wp_customize->add_setting('h1_font_size', [
        'default' => '48',
        'sanitize_callback' => 'absint',
    ]);
    
    $wp_customize->add_control('h1_font_size', [
        'label' => __('H1 Font Size (px)', 'seo-agency'),
        'section' => 'headings_typography_section',
        'type' => 'number',
        'input_attrs' => [
            'min' => 24,
            'max' => 120,
            'step' => 1,
        ],
    ]);
    
    // Heading H2 Size
    $wp_customize->add_setting('h2_font_size', [
        'default' => '36',
        'sanitize_callback' => 'absint',
    ]);
    
    $wp_customize->add_control('h2_font_size', [
        'label' => __('H2 Font Size (px)', 'seo-agency'),
        'section' => 'headings_typography_section',
        'type' => 'number',
        'input_attrs' => [
            'min' => 20,
            'max' => 80,
            'step' => 1,
        ],
    ]);
    
    // Heading H3 Size
    $wp_customize->add_setting('h3_font_size', [
        'default' => '30',
        'sanitize_callback' => 'absint',
    ]);
    
    $wp_customize->add_control('h3_font_size', [
        'label' => __('H3 Font Size (px)', 'seo-agency'),
        'section' => 'headings_typography_section',
        'type' => 'number',
        'input_attrs' => [
            'min' => 18,
            'max' => 60,
            'step' => 1,
        ],
    ]);
    
    // Heading H4 Size
    $wp_customize->add_setting('h4_font_size', [
        'default' => '24',
        'sanitize_callback' => 'absint',
    ]);
    
    $wp_customize->add_control('h4_font_size', [
        'label' => __('H4 Font Size (px)', 'seo-agency'),
        'section' => 'headings_typography_section',
        'type' => 'number',
        'input_attrs' => [
            'min' => 16,
            'max' => 48,
            'step' => 1,
        ],
    ]);
    
    // Heading H5 Size
    $wp_customize->add_setting('h5_font_size', [
        'default' => '20',
        'sanitize_callback' => 'absint',
    ]);
    
    $wp_customize->add_control('h5_font_size', [
        'label' => __('H5 Font Size (px)', 'seo-agency'),
        'section' => 'headings_typography_section',
        'type' => 'number',
        'input_attrs' => [
            'min' => 14,
            'max' => 36,
            'step' => 1,
        ],
    ]);
    
    // Heading H6 Size
    $wp_customize->add_setting('h6_font_size', [
        'default' => '16',
        'sanitize_callback' => 'absint',
    ]);
    
    $wp_customize->add_control('h6_font_size', [
        'label' => __('H6 Font Size (px)', 'seo-agency'),
        'section' => 'headings_typography_section',
        'type' => 'number',
        'input_attrs' => [
            'min' => 12,
            'max' => 24,
            'step' => 1,
        ],
    ]);
    
    // ============================================
    // NAVIGATION TYPOGRAPHY SECTION
    // ============================================
    $wp_customize->add_section('navigation_typography_section', [
        'title' => __('Navigation & Buttons', 'seo-agency'),
        'panel' => 'typography_panel',
        'priority' => 40,
    ]);
    
    // Navigation Font Size
    $wp_customize->add_setting('nav_font_size', [
        'default' => '14',
        'sanitize_callback' => 'absint',
    ]);
    
    $wp_customize->add_control('nav_font_size', [
        'label' => __('Navigation Font Size (px)', 'seo-agency'),
        'section' => 'navigation_typography_section',
        'type' => 'number',
        'input_attrs' => [
            'min' => 10,
            'max' => 24,
            'step' => 1,
        ],
    ]);
    
    // Navigation Font Weight
    $wp_customize->add_setting('nav_font_weight', [
        'default' => '500',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    
    $wp_customize->add_control('nav_font_weight', [
        'label' => __('Navigation Font Weight', 'seo-agency'),
        'section' => 'navigation_typography_section',
        'type' => 'select',
        'choices' => [
            '300' => 'Light (300)',
            '400' => 'Normal (400)',
            '500' => 'Medium (500)',
            '600' => 'Semi-Bold (600)',
            '700' => 'Bold (700)',
        ],
    ]);
    
    // Navigation Letter Spacing
    $wp_customize->add_setting('nav_letter_spacing', [
        'default' => '0',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    
    $wp_customize->add_control('nav_letter_spacing', [
        'label' => __('Navigation Letter Spacing (px)', 'seo-agency'),
        'section' => 'navigation_typography_section',
        'type' => 'number',
        'input_attrs' => [
            'min' => -1,
            'max' => 5,
            'step' => 0.1,
        ],
    ]);
    
    // Button Font Size
    $wp_customize->add_setting('button_font_size', [
        'default' => '14',
        'sanitize_callback' => 'absint',
    ]);
    
    $wp_customize->add_control('button_font_size', [
        'label' => __('Button Font Size (px)', 'seo-agency'),
        'section' => 'navigation_typography_section',
        'type' => 'number',
        'input_attrs' => [
            'min' => 10,
            'max' => 24,
            'step' => 1,
        ],
    ]);
    
    // Button Font Weight
    $wp_customize->add_setting('button_font_weight', [
        'default' => '600',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    
    $wp_customize->add_control('button_font_weight', [
        'label' => __('Button Font Weight', 'seo-agency'),
        'section' => 'navigation_typography_section',
        'type' => 'select',
        'choices' => [
            '400' => 'Normal (400)',
            '500' => 'Medium (500)',
            '600' => 'Semi-Bold (600)',
            '700' => 'Bold (700)',
            '800' => 'Extra Bold (800)',
        ],
    ]);
    
    // Button Letter Spacing
    $wp_customize->add_setting('button_letter_spacing', [
        'default' => '0',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    
    $wp_customize->add_control('button_letter_spacing', [
        'label' => __('Button Letter Spacing (px)', 'seo-agency'),
        'section' => 'navigation_typography_section',
        'type' => 'number',
        'input_attrs' => [
            'min' => -1,
            'max' => 5,
            'step' => 0.1,
        ],
    ]);
    
    // Button Text Transform
    $wp_customize->add_setting('button_text_transform', [
        'default' => 'none',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    
    $wp_customize->add_control('button_text_transform', [
        'label' => __('Button Text Transform', 'seo-agency'),
        'section' => 'navigation_typography_section',
        'type' => 'select',
        'choices' => [
            'none' => 'None',
            'uppercase' => 'UPPERCASE',
            'lowercase' => 'lowercase',
            'capitalize' => 'Capitalize',
        ],
    ]);
    
    // ============================================
    // SPECIAL SECTIONS TYPOGRAPHY
    // ============================================
    $wp_customize->add_section('special_typography_section', [
        'title' => __('Special Sections', 'seo-agency'),
        'panel' => 'typography_panel',
        'priority' => 50,
    ]);
    
    // Hero Title Size
    $wp_customize->add_setting('hero_title_size', [
        'default' => '72',
        'sanitize_callback' => 'absint',
    ]);
    
    $wp_customize->add_control('hero_title_size', [
        'label' => __('Hero Title Size (px)', 'seo-agency'),
        'description' => __('For the main hero headline', 'seo-agency'),
        'section' => 'special_typography_section',
        'type' => 'number',
        'input_attrs' => [
            'min' => 32,
            'max' => 120,
            'step' => 1,
        ],
    ]);
    
    // Hero Description Size
    $wp_customize->add_setting('hero_description_size', [
        'default' => '20',
        'sanitize_callback' => 'absint',
    ]);
    
    $wp_customize->add_control('hero_description_size', [
        'label' => __('Hero Description Size (px)', 'seo-agency'),
        'section' => 'special_typography_section',
        'type' => 'number',
        'input_attrs' => [
            'min' => 14,
            'max' => 32,
            'step' => 1,
        ],
    ]);
    
    // Testimonial Text Size
    $wp_customize->add_setting('testimonial_text_size', [
        'default' => '24',
        'sanitize_callback' => 'absint',
    ]);
    
    $wp_customize->add_control('testimonial_text_size', [
        'label' => __('Testimonial Text Size (px)', 'seo-agency'),
        'section' => 'special_typography_section',
        'type' => 'number',
        'input_attrs' => [
            'min' => 16,
            'max' => 36,
            'step' => 1,
        ],
    ]);
    
    // Stat Number Size
    $wp_customize->add_setting('stat_number_size', [
        'default' => '48',
        'sanitize_callback' => 'absint',
    ]);
    
    $wp_customize->add_control('stat_number_size', [
        'label' => __('Statistics Number Size (px)', 'seo-agency'),
        'section' => 'special_typography_section',
        'type' => 'number',
        'input_attrs' => [
            'min' => 24,
            'max' => 96,
            'step' => 1,
        ],
    ]);
    
    // ============================================
    // ADVANCED TYPOGRAPHY SETTINGS
    // ============================================
    $wp_customize->add_section('advanced_typography_section', [
        'title' => __('Advanced Settings', 'seo-agency'),
        'panel' => 'typography_panel',
        'priority' => 60,
    ]);
    
    // Text Rendering
    $wp_customize->add_setting('text_rendering', [
        'default' => 'auto',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    
    $wp_customize->add_control('text_rendering', [
        'label' => __('Text Rendering', 'seo-agency'),
        'description' => __('Optimize text rendering for legibility', 'seo-agency'),
        'section' => 'advanced_typography_section',
        'type' => 'select',
        'choices' => [
            'auto' => 'Auto',
            'optimizeSpeed' => 'Optimize Speed',
            'optimizeLegibility' => 'Optimize Legibility',
            'geometricPrecision' => 'Geometric Precision',
        ],
    ]);
    
    // Font Smoothing
    $wp_customize->add_setting('font_smoothing', [
        'default' => 'antialiased',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    
    $wp_customize->add_control('font_smoothing', [
        'label' => __('Font Smoothing', 'seo-agency'),
        'section' => 'advanced_typography_section',
        'type' => 'select',
        'choices' => [
            'antialiased' => 'Antialiased (Recommended)',
            'subpixel-antialiased' => 'Subpixel Antialiased',
            'none' => 'None',
        ],
    ]);
    
    // Font Feature Settings
    $wp_customize->add_setting('font_features', [
        'default' => 'normal',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    
    $wp_customize->add_control('font_features', [
        'label' => __('Font Feature Settings', 'seo-agency'),
        'description' => __('Advanced OpenType feature settings', 'seo-agency'),
        'section' => 'advanced_typography_section',
        'type' => 'text',
    ]);
    
    // Custom CSS for Typography
    $wp_customize->add_setting('custom_typography_css', [
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
    ]);
    
    $wp_customize->add_control('custom_typography_css', [
        'label' => __('Custom Typography CSS', 'seo-agency'),
        'description' => __('Add custom CSS for typography (will be applied last)', 'seo-agency'),
        'section' => 'advanced_typography_section',
        'type' => 'textarea',
    ]);
}
add_action('customize_register', 'seo_agency_typography_customizer');

// ============================================
// DYNAMIC TYPOGRAPHY CSS OUTPUT
// ============================================

function seo_agency_output_typography_css() {
    // Get all typography settings
    $primary_font = get_theme_mod('primary_font_family', 'Montserrat');
    $font_weights = get_theme_mod('primary_font_weights', '300,400,500,600,700,800');
    $secondary_font = get_theme_mod('secondary_font_family', 'Montserrat');
    
    $body_font_size = get_theme_mod('body_font_size', '16');
    $body_line_height = get_theme_mod('body_line_height', '1.6');
    $body_font_weight = get_theme_mod('body_font_weight', '400');
    $body_letter_spacing = get_theme_mod('body_letter_spacing', '0');
    
    $headings_font_weight = get_theme_mod('headings_font_weight', '700');
    $headings_letter_spacing = get_theme_mod('headings_letter_spacing', '0');
    $headings_line_height = get_theme_mod('headings_line_height', '1.2');
    
    $h1_size = get_theme_mod('h1_font_size', '48');
    $h2_size = get_theme_mod('h2_font_size', '36');
    $h3_size = get_theme_mod('h3_font_size', '30');
    $h4_size = get_theme_mod('h4_font_size', '24');
    $h5_size = get_theme_mod('h5_font_size', '20');
    $h6_size = get_theme_mod('h6_font_size', '16');
    
    $nav_font_size = get_theme_mod('nav_font_size', '14');
    $nav_font_weight = get_theme_mod('nav_font_weight', '500');
    $nav_letter_spacing = get_theme_mod('nav_letter_spacing', '0');
    
    $button_font_size = get_theme_mod('button_font_size', '14');
    $button_font_weight = get_theme_mod('button_font_weight', '600');
    $button_letter_spacing = get_theme_mod('button_letter_spacing', '0');
    $button_text_transform = get_theme_mod('button_text_transform', 'none');
    
    $hero_title_size = get_theme_mod('hero_title_size', '72');
    $hero_description_size = get_theme_mod('hero_description_size', '20');
    $testimonial_text_size = get_theme_mod('testimonial_text_size', '24');
    $stat_number_size = get_theme_mod('stat_number_size', '48');
    
    $text_rendering = get_theme_mod('text_rendering', 'auto');
    $font_smoothing = get_theme_mod('font_smoothing', 'antialiased');
    $font_features = get_theme_mod('font_features', 'normal');
    $custom_css = get_theme_mod('custom_typography_css', '');
    
    // Determine secondary font
    $secondary_font_family = ($secondary_font === 'same' || $secondary_font === 'Montserrat') ? $primary_font : $secondary_font;
    
    // Build the CSS
    $css = "
        /* Typography Settings - SEO Agency Theme */
        :root {
            --font-primary: '{$primary_font}', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            --font-secondary: '{$secondary_font_family}', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            
            --text-body-size: {$body_font_size}px;
            --text-body-line-height: {$body_line_height};
            --text-body-weight: {$body_font_weight};
            --text-body-spacing: {$body_letter_spacing}px;
            
            --text-heading-weight: {$headings_font_weight};
            --text-heading-spacing: {$headings_letter_spacing}px;
            --text-heading-line-height: {$headings_line_height};
            
            --text-h1-size: {$h1_size}px;
            --text-h2-size: {$h2_size}px;
            --text-h3-size: {$h3_size}px;
            --text-h4-size: {$h4_size}px;
            --text-h5-size: {$h5_size}px;
            --text-h6-size: {$h6_size}px;
            
            --text-nav-size: {$nav_font_size}px;
            --text-nav-weight: {$nav_font_weight};
            --text-nav-spacing: {$nav_letter_spacing}px;
            
            --text-button-size: {$button_font_size}px;
            --text-button-weight: {$button_font_weight};
            --text-button-spacing: {$button_letter_spacing}px;
            --text-button-transform: {$button_text_transform};
            
            --text-hero-title-size: {$hero_title_size}px;
            --text-hero-description-size: {$hero_description_size}px;
            --text-testimonial-size: {$testimonial_text_size}px;
            --text-stat-number-size: {$stat_number_size}px;
        }
        
        body {
            font-family: var(--font-primary);
            font-size: var(--text-body-size);
            line-height: var(--text-body-line-height);
            font-weight: var(--text-body-weight);
            letter-spacing: var(--text-body-spacing);
            text-rendering: {$text_rendering};
            -webkit-font-smoothing: {$font_smoothing};
            -moz-osx-font-smoothing: grayscale;
            font-feature-settings: '{$font_features}';
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: var(--font-secondary);
            font-weight: var(--text-heading-weight);
            letter-spacing: var(--text-heading-spacing);
            line-height: var(--text-heading-line-height);
        }
        
        h1 {
            font-size: var(--text-h1-size);
        }
        
        h2 {
            font-size: var(--text-h2-size);
        }
        
        h3 {
            font-size: var(--text-h3-size);
        }
        
        h4 {
            font-size: var(--text-h4-size);
        }
        
        h5 {
            font-size: var(--text-h5-size);
        }
        
        h6 {
            font-size: var(--text-h6-size);
        }
        
        /* Navigation */
        nav a, .menu-item a {
            font-size: var(--text-nav-size);
            font-weight: var(--text-nav-weight);
            letter-spacing: var(--text-nav-spacing);
        }
        
        /* Buttons */
        button, .button, a.button, input[type='submit'], input[type='button'] {
            font-size: var(--text-button-size);
            font-weight: var(--text-button-weight);
            letter-spacing: var(--text-button-spacing);
            text-transform: var(--text-button-transform);
        }
        
        /* Special Sections */
        .hero-section h1 {
            font-size: var(--text-hero-title-size);
        }
        
        .hero-section p {
            font-size: var(--text-hero-description-size);
        }
        
        .testimonial-text {
            font-size: var(--text-testimonial-size);
        }
        
        .stat-number {
            font-size: var(--text-stat-number-size);
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            :root {
                --text-h1-size: calc({$h1_size}px * 0.8);
                --text-h2-size: calc({$h2_size}px * 0.8);
                --text-h3-size: calc({$h3_size}px * 0.8);
                --text-hero-title-size: calc({$hero_title_size}px * 0.7);
                --text-stat-number-size: calc({$stat_number_size}px * 0.8);
            }
        }
        
        @media (max-width: 480px) {
            :root {
                --text-body-size: calc({$body_font_size}px * 0.9);
                --text-hero-title-size: calc({$hero_title_size}px * 0.6);
                --text-hero-description-size: calc({$hero_description_size}px * 0.9);
            }
        }
    ";
    
    // Add custom CSS if provided
    if ($custom_css) {
        $css .= "\n/* Custom Typography CSS */\n" . $custom_css;
    }
    
    // Minify CSS
    $css = preg_replace('/\s+/', ' ', $css);
    $css = preg_replace('/\/\*.*?\*\//', '', $css);
    $css = trim($css);
    
    // Output the CSS
    wp_add_inline_style('google-fonts', $css);
}
add_action('wp_enqueue_scripts', 'seo_agency_output_typography_css', 20);

// ============================================
// DYNAMIC GOOGLE FONTS ENQUEUE
// ============================================

function seo_agency_enqueue_google_fonts() {
    $primary_font = get_theme_mod('primary_font_family', 'Montserrat');
    $font_weights = get_theme_mod('primary_font_weights', '300,400,500,600,700,800');
    $secondary_font = get_theme_mod('secondary_font_family', 'Montserrat');
    
    // Skip if using system font
    if ($primary_font === 'system-ui') {
        return;
    }
    
    // Prepare font families for Google Fonts API
    $font_families = [];
    
    // Add primary font
    if ($primary_font && $primary_font !== 'system-ui') {
        $font_families[] = $primary_font . ':' . $font_weights;
    }
    
    // Add secondary font if different
    if ($secondary_font && $secondary_font !== 'same' && $secondary_font !== $primary_font && $secondary_font !== 'system-ui') {
        $font_families[] = $secondary_font . ':' . $headings_font_weight = get_theme_mod('headings_font_weight', '700');
    }
    
    // If no fonts to load, return
    if (empty($font_families)) {
        return;
    }
    
    // Build Google Fonts URL
    $query_args = [
        'family' => implode('|', $font_families),
        'display' => 'swap',
    ];
    
    $fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css2');
    
    // Enqueue Google Fonts
    wp_enqueue_style('seo-agency-google-fonts', $fonts_url, [], null);
}
add_action('wp_enqueue_scripts', 'seo_agency_enqueue_google_fonts', 10);

// ============================================
// TYPOGRAPHY SANITIZATION FUNCTIONS
// ============================================

function seo_agency_sanitize_font_family($input) {
    $valid_fonts = [
        'Montserrat', 'Montserrat', 'Open Sans', 'Roboto', 'Poppins', 'Nunito', 
        'Lato', 'Raleway', 'Playfair Display', 'Source Sans Pro', 'system-ui'
    ];
    
    if (in_array($input, $valid_fonts)) {
        return $input;
    }
    
    return 'Montserrat';
}

function seo_agency_sanitize_font_weights($input) {
    // Remove spaces and split by comma
    $weights = explode(',', preg_replace('/\s+/', '', $input));
    $valid_weights = ['100', '200', '300', '400', '500', '600', '700', '800', '900'];
    $clean_weights = [];
    
    foreach ($weights as $weight) {
        if (in_array($weight, $valid_weights)) {
            $clean_weights[] = $weight;
        }
    }
    
    // If no valid weights, return default
    if (empty($clean_weights)) {
        return '300,400,500,600,700,800';
    }
    
    // Remove duplicates and sort
    $clean_weights = array_unique($clean_weights);
    sort($clean_weights);
    
    return implode(',', $clean_weights);
}

function seo_agency_sanitize_number_range($input, $setting) {
    $input = absint($input);
    $control = $setting->manager->get_control($setting->id);
    
    if (isset($control->input_attrs['min']) && $input < $control->input_attrs['min']) {
        return $control->input_attrs['min'];
    }
    
    if (isset($control->input_attrs['max']) && $input > $control->input_attrs['max']) {
        return $control->input_attrs['max'];
    }
    
    return $input;
}

function seo_agency_sanitize_line_height($input) {
    $input = floatval($input);
    
    if ($input < 1.0) {
        return 1.0;
    }
    
    if ($input > 2.5) {
        return 2.5;
    }
    
    return $input;
}

// ============================================
// TYPOGRAPHY PREVIEW SCRIPT FOR CUSTOMIZER
// ============================================

function seo_agency_typography_customizer_preview() {
    wp_enqueue_script(
        'seo-agency-typography-customizer',
        get_template_directory_uri() . '/assets/js/typography-customizer.js',
        ['jquery', 'customize-preview'],
        '1.0.0',
        true
    );
}
add_action('customize_preview_init', 'seo_agency_typography_customizer_preview');

// ============================================
// CREATE TYPOGRAPHY CUSTOMIZER PREVIEW JS FILE
// ============================================

// Create the typography-customizer.js file in /assets/js/ directory
// Add this code to a file called typography-customizer.js:

/*
File: /assets/js/typography-customizer.js

(function($) {
    'use strict';

    // Preview typography changes in real-time
    wp.customize('primary_font_family', function(value) {
        value.bind(function(to) {
            $('body').css('font-family', to + ', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif');
        });
    });

    wp.customize('body_font_size', function(value) {
        value.bind(function(to) {
            $('body').css('font-size', to + 'px');
        });
    });

    wp.customize('body_font_weight', function(value) {
        value.bind(function(to) {
            $('body').css('font-weight', to);
        });
    });

    // Add more preview bindings as needed...
    
})(jQuery);
*/

// ============================================
// ADMIN TYPOGRAPHY SETTINGS NOTE
// ============================================

function seo_agency_typography_admin_notice() {
    ?>
    <script>
    jQuery(document).ready(function($) {
        // Add typography settings link to admin bar
        if ($('#wp-admin-bar-customize').length) {
            var typographyUrl = wpAdminBarCustomize.href + '&autofocus[panel]=typography_panel';
            $('#wp-admin-bar-customize').append(
                '<ul class="ab-submenu">' +
                '<li id="wp-admin-bar-customize-typography">' +
                '<a class="ab-item" href="' + typographyUrl + '">Typography Settings</a>' +
                '</li>' +
                '</ul>'
            );
        }
    });
    </script>
    <?php
}
add_action('admin_footer', 'seo_agency_typography_admin_notice');
add_action('wp_footer', 'seo_agency_typography_admin_notice');

// ============================================
// EXPORT/IMPORT TYPOGRAPHY SETTINGS
// ============================================

function seo_agency_typography_export_settings() {
    if (isset($_GET['export_typography']) && current_user_can('manage_options')) {
        $settings = [
            'primary_font_family' => get_theme_mod('primary_font_family', 'Montserrat'),
            'primary_font_weights' => get_theme_mod('primary_font_weights', '300,400,500,600,700,800'),
            'secondary_font_family' => get_theme_mod('secondary_font_family', 'Montserrat'),
            'body_font_size' => get_theme_mod('body_font_size', '16'),
            'body_line_height' => get_theme_mod('body_line_height', '1.6'),
            'body_font_weight' => get_theme_mod('body_font_weight', '400'),
            'body_letter_spacing' => get_theme_mod('body_letter_spacing', '0'),
            // Add all other settings...
        ];
        
        header('Content-Type: application/json');
        header('Content-Disposition: attachment; filename="seo-agency-typography-settings.json"');
        echo json_encode($settings, JSON_PRETTY_PRINT);
        exit;
    }
}
add_action('init', 'seo_agency_typography_export_settings');