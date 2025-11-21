<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    
    <!-- Preconnect to external domains -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php _e('Skip to content', 'ngist-theme'); ?></a>

    <header id="masthead" class="site-header">
        <div class="container">
            <div class="header-content">
                <div class="site-branding">
                    <?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" 
                                 alt="<?php bloginfo('name'); ?>" 
                                 width="200" 
                                 height="60">
                        </a>
                        <?php
                    }
                    ?>
                    
                    <?php if (is_front_page() && is_home()) : ?>
                        <h1 class="site-title screen-reader-text">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                <?php bloginfo('name'); ?>
                            </a>
                        </h1>
                    <?php else : ?>
                        <p class="site-title screen-reader-text">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                <?php bloginfo('name'); ?>
                            </a>
                        </p>
                    <?php endif; ?>

                    <?php
                    $description = get_bloginfo('description', 'display');
                    if ($description || is_customize_preview()) :
                        ?>
                        <p class="site-description screen-reader-text"><?php echo $description; ?></p>
                    <?php endif; ?>
                </div><!-- .site-branding -->

                <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php _e('Primary Menu', 'ngist-theme'); ?>">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'container'      => false,
                        'fallback_cb'    => 'ngist_fallback_menu',
                    ));
                    ?>
                </nav><!-- #site-navigation -->

                <div class="header-actions">
                    <!-- Search Toggle -->
                    <button class="search-toggle" aria-label="<?php _e('Search', 'ngist-theme'); ?>">
                        <i class="fas fa-search"></i>
                    </button>

                    <!-- Contact Info -->
                    <div class="header-contact">
                        <?php
                        $phone = get_theme_mod('contact_phone', '08065758399');
                        $email = get_theme_mod('contact_email', 'ngisatedu@gmail.com');
                        
                        if ($phone) :
                        ?>
                            <a href="tel:<?php echo esc_attr($phone); ?>" class="contact-phone">
                                <i class="fas fa-phone"></i>
                                <span class="screen-reader-text"><?php _e('Call us', 'ngist-theme'); ?></span>
                            </a>
                        <?php endif; ?>

                        <?php if ($email) : ?>
                            <a href="mailto:<?php echo esc_attr($email); ?>" class="contact-email">
                                <i class="fas fa-envelope"></i>
                                <span class="screen-reader-text"><?php _e('Email us', 'ngist-theme'); ?></span>
                            </a>
                        <?php endif; ?>
                    </div>

                    <!-- CTA Button -->
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('admissions'))); ?>" class="btn btn-primary header-cta">
                        <?php _e('Apply Now', 'ngist-theme'); ?>
                    </a>
                </div><!-- .header-actions -->
            </div><!-- .header-content -->
        </div><!-- .container -->
    </header><!-- #masthead -->

    <!-- Search Overlay -->
    <div class="search-overlay">
        <button class="search-close" aria-label="<?php _e('Close Search', 'ngist-theme'); ?>">
            <i class="fas fa-times"></i>
        </button>
        <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
            <input type="search" 
                   class="search-field" 
                   placeholder="<?php _e('Search...', 'ngist-theme'); ?>" 
                   value="<?php echo get_search_query(); ?>" 
                   name="s" 
                   autocomplete="off">
        </form>
    </div><!-- .search-overlay -->

    <div id="content" class="site-content">

<?php
/**
 * Fallback menu function
 */
function ngist_fallback_menu() {
    ?>
    <ul id="primary-menu" class="menu">
        <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Home', 'ngist-theme'); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/about')); ?>"><?php _e('About', 'ngist-theme'); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/programs')); ?>"><?php _e('Programs', 'ngist-theme'); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/admissions')); ?>"><?php _e('Admissions', 'ngist-theme'); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/news-events')); ?>"><?php _e('News & Events', 'ngist-theme'); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/contact')); ?>"><?php _e('Contact', 'ngist-theme'); ?></a></li>
    </ul>
    <?php
}
?>