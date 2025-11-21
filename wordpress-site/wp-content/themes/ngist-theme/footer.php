    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="container">
            <div class="footer-content">
                <!-- About Section -->
                <div class="footer-section footer-about">
                    <h3><?php bloginfo('name'); ?></h3>
                    <p><?php _e('Leading STEM education institute offering National Diploma (ND), Higher National Diploma (HND), and certificate programs in science and technology. Innovating education for tomorrow\'s leaders.', 'ngist-theme'); ?></p>
                    
                    <!-- Social Media Links -->
                    <div class="social-links">
                        <a href="#" class="social-link" aria-label="<?php _e('Facebook', 'ngist-theme'); ?>">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-link" aria-label="<?php _e('Twitter', 'ngist-theme'); ?>">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-link" aria-label="<?php _e('LinkedIn', 'ngist-theme'); ?>">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="social-link" aria-label="<?php _e('Instagram', 'ngist-theme'); ?>">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-link" aria-label="<?php _e('YouTube', 'ngist-theme'); ?>">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="footer-section footer-links">
                    <h3><?php _e('Quick Links', 'ngist-theme'); ?></h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'container'      => false,
                        'menu_class'     => 'footer-menu',
                        'fallback_cb'    => 'ngist_footer_fallback_menu',
                    ));
                    ?>
                </div>

                <!-- Programs -->
                <div class="footer-section footer-programs">
                    <h3><?php _e('Programs', 'ngist-theme'); ?></h3>
                    <ul class="footer-menu">
                        <?php
                        $programs = get_posts(array(
                            'post_type' => 'program',
                            'numberposts' => 5,
                            'post_status' => 'publish'
                        ));
                        
                        if ($programs) :
                            foreach ($programs as $program) :
                        ?>
                            <li>
                                <a href="<?php echo get_permalink($program->ID); ?>">
                                    <?php echo get_the_title($program->ID); ?>
                                </a>
                            </li>
                        <?php 
                            endforeach;
                        else :
                        ?>
                            <li><a href="#"><?php _e('Computer Science', 'ngist-theme'); ?></a></li>
                            <li><a href="#"><?php _e('Engineering Technology', 'ngist-theme'); ?></a></li>
                            <li><a href="#"><?php _e('Information Technology', 'ngist-theme'); ?></a></li>
                            <li><a href="#"><?php _e('Applied Sciences', 'ngist-theme'); ?></a></li>
                            <li><a href="#"><?php _e('Professional Certificates', 'ngist-theme'); ?></a></li>
                        <?php endif; ?>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="footer-section footer-contact">
                    <h3><?php _e('Contact Info', 'ngist-theme'); ?></h3>
                    <div class="contact-info">
                        <?php
                        $phone = get_theme_mod('contact_phone', '08065758399');
                        $email = get_theme_mod('contact_email', 'ngisatedu@gmail.com');
                        $address = get_theme_mod('contact_address', '');
                        ?>
                        
                        <?php if ($address) : ?>
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span><?php echo esc_html($address); ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if ($phone) : ?>
                            <div class="contact-item">
                                <i class="fas fa-phone"></i>
                                <a href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_html($phone); ?></a>
                            </div>
                        <?php endif; ?>

                        <?php if ($email) : ?>
                            <div class="contact-item">
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                            </div>
                        <?php endif; ?>

                        <div class="contact-item">
                            <i class="fas fa-clock"></i>
                            <span><?php _e('Mon - Fri: 8:00 AM - 5:00 PM', 'ngist-theme'); ?></span>
                        </div>
                    </div>

                    <!-- Newsletter Signup -->
                    <div class="newsletter-signup">
                        <h4><?php _e('Stay Updated', 'ngist-theme'); ?></h4>
                        <form class="newsletter-form" method="post">
                            <div class="form-group">
                                <input type="email" 
                                       name="newsletter_email" 
                                       placeholder="<?php _e('Your email address', 'ngist-theme'); ?>" 
                                       required>
                                <button type="submit" class="btn btn-primary">
                                    <?php _e('Subscribe', 'ngist-theme'); ?>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Widget Areas -->
                <?php if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3')) : ?>
                    <?php if (is_active_sidebar('footer-1')) : ?>
                        <div class="footer-section footer-widget-1">
                            <?php dynamic_sidebar('footer-1'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (is_active_sidebar('footer-2')) : ?>
                        <div class="footer-section footer-widget-2">
                            <?php dynamic_sidebar('footer-2'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (is_active_sidebar('footer-3')) : ?>
                        <div class="footer-section footer-widget-3">
                            <?php dynamic_sidebar('footer-3'); ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div><!-- .footer-content -->

            <div class="footer-bottom">
                <div class="footer-bottom-content">
                    <div class="copyright">
                        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('All rights reserved.', 'ngist-theme'); ?></p>
                    </div>
                    
                    <div class="footer-bottom-links">
                        <a href="<?php echo esc_url(home_url('/privacy-policy')); ?>"><?php _e('Privacy Policy', 'ngist-theme'); ?></a>
                        <a href="<?php echo esc_url(home_url('/terms-of-service')); ?>"><?php _e('Terms of Service', 'ngist-theme'); ?></a>
                        <a href="<?php echo esc_url(home_url('/accessibility')); ?>"><?php _e('Accessibility', 'ngist-theme'); ?></a>
                    </div>

                    <div class="footer-credits">
                        <p><?php _e('Designed with', 'ngist-theme'); ?> <i class="fas fa-heart" style="color: #ef4444;"></i> <?php _e('for STEM Education Excellence', 'ngist-theme'); ?></p>
                    </div>
                </div>
            </div><!-- .footer-bottom -->
        </div><!-- .container -->
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<!-- Additional Footer Styles -->
<style>
.site-footer {
    background: linear-gradient(135deg, var(--gray-900) 0%, var(--gray-800) 100%);
    color: var(--white);
    padding: 4rem 0 1rem;
    margin-top: 4rem;
}

.footer-content {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 3rem;
    margin-bottom: 3rem;
}

.footer-section h3 {
    color: var(--white);
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
    position: relative;
}

.footer-section h3::after {
    content: '';
    position: absolute;
    bottom: -0.5rem;
    left: 0;
    width: 3rem;
    height: 2px;
    background: var(--accent-teal);
}

.footer-section p {
    color: var(--gray-300);
    line-height: 1.6;
    margin-bottom: 1.5rem;
}

.footer-menu {
    list-style: none;
    padding: 0;
}

.footer-menu li {
    margin-bottom: 0.75rem;
}

.footer-menu a {
    color: var(--gray-300);
    text-decoration: none;
    transition: color 0.3s ease;
    display: flex;
    align-items: center;
}

.footer-menu a:hover {
    color: var(--white);
    padding-left: 0.5rem;
}

.footer-menu a::before {
    content: '→';
    margin-right: 0.5rem;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.footer-menu a:hover::before {
    opacity: 1;
}

.social-links {
    display: flex;
    gap: 1rem;
    margin-top: 1.5rem;
}

.social-link {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: var(--gray-700);
    color: var(--white);
    border-radius: 50%;
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-link:hover {
    background: var(--accent-teal);
    transform: translateY(-2px);
}

.contact-info {
    margin-bottom: 2rem;
}

.contact-item {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
    color: var(--gray-300);
}

.contact-item i {
    width: 20px;
    margin-right: 1rem;
    color: var(--accent-teal);
}

.contact-item a {
    color: var(--gray-300);
    text-decoration: none;
    transition: color 0.3s ease;
}

.contact-item a:hover {
    color: var(--white);
}

.newsletter-signup {
    margin-top: 2rem;
}

.newsletter-signup h4 {
    color: var(--white);
    font-size: 1.125rem;
    margin-bottom: 1rem;
}

.newsletter-form .form-group {
    display: flex;
    gap: 0.5rem;
    margin-bottom: 0;
}

.newsletter-form input {
    flex: 1;
    padding: 0.75rem;
    border: 1px solid var(--gray-600);
    border-radius: 0.375rem;
    background: var(--gray-800);
    color: var(--white);
    font-size: 0.875rem;
}

.newsletter-form input::placeholder {
    color: var(--gray-400);
}

.newsletter-form input:focus {
    outline: none;
    border-color: var(--accent-teal);
}

.newsletter-form .btn {
    padding: 0.75rem 1.5rem;
    font-size: 0.875rem;
    white-space: nowrap;
}

.footer-bottom {
    border-top: 1px solid var(--gray-700);
    padding-top: 2rem;
}

.footer-bottom-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.footer-bottom-links {
    display: flex;
    gap: 2rem;
}

.footer-bottom-links a {
    color: var(--gray-400);
    text-decoration: none;
    font-size: 0.875rem;
    transition: color 0.3s ease;
}

.footer-bottom-links a:hover {
    color: var(--white);
}

.footer-credits {
    color: var(--gray-400);
    font-size: 0.875rem;
}

.copyright {
    color: var(--gray-400);
    font-size: 0.875rem;
}

@media (max-width: 768px) {
    .footer-content {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .footer-bottom-content {
        flex-direction: column;
        text-align: center;
        gap: 1.5rem;
    }
    
    .footer-bottom-links {
        flex-direction: column;
        gap: 1rem;
    }
    
    .newsletter-form .form-group {
        flex-direction: column;
    }
    
    .social-links {
        justify-content: center;
    }
}
</style>

</body>
</html>

<?php
/**
 * Footer fallback menu function
 */
function ngist_footer_fallback_menu() {
    ?>
    <ul class="footer-menu">
        <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Home', 'ngist-theme'); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/about')); ?>"><?php _e('About Us', 'ngist-theme'); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/programs')); ?>"><?php _e('Academic Programs', 'ngist-theme'); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/admissions')); ?>"><?php _e('Admissions', 'ngist-theme'); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/faculty')); ?>"><?php _e('Faculty', 'ngist-theme'); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/research')); ?>"><?php _e('Research', 'ngist-theme'); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/news-events')); ?>"><?php _e('News & Events', 'ngist-theme'); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/contact')); ?>"><?php _e('Contact Us', 'ngist-theme'); ?></a></li>
    </ul>
    <?php
}
?>