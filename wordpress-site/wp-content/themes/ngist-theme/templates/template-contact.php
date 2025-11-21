<?php
/**
 * Template Name: Contact Page
 *
 * @package NGIST_Theme
 */

get_header();
?>

<main id="primary" class="site-main contact-page">
    <?php while (have_posts()) : the_post(); ?>
        
        <!-- Hero Section -->
        <section class="contact-hero section">
            <div class="container">
                <div class="hero-content text-center">
                    <h1 class="hero-title font-display" data-aos="fade-up">
                        <?php the_title(); ?>
                    </h1>
                    <?php if (has_excerpt()) : ?>
                        <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="200">
                            <?php the_excerpt(); ?>
                        </p>
                    <?php else : ?>
                        <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="200">
                            <?php _e('Get in touch with us. We\'re here to help you start your journey in STEM education.', 'ngist-theme'); ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- Contact Information Section -->
        <section class="contact-info section" data-aos="fade-up">
            <div class="container">
                <div class="contact-info-grid grid grid-3">
                    <div class="contact-card card" data-aos="fade-up" data-aos-delay="100">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h3><?php _e('Visit Us', 'ngist-theme'); ?></h3>
                        <div class="contact-details">
                            <?php
                            $address = get_theme_mod('contact_address', '');
                            if ($address) :
                                echo '<p>' . esc_html($address) . '</p>';
                            else :
                            ?>
                                <p><?php _e('Noble Genius Institute Campus', 'ngist-theme'); ?><br>
                                <?php _e('Science & Technology Complex', 'ngist-theme'); ?><br>
                                <?php _e('Nigeria', 'ngist-theme'); ?></p>
                            <?php endif; ?>
                            <p class="contact-hours">
                                <strong><?php _e('Office Hours:', 'ngist-theme'); ?></strong><br>
                                <?php _e('Monday - Friday: 8:00 AM - 5:00 PM', 'ngist-theme'); ?><br>
                                <?php _e('Saturday: 9:00 AM - 2:00 PM', 'ngist-theme'); ?>
                            </p>
                        </div>
                    </div>

                    <div class="contact-card card" data-aos="fade-up" data-aos-delay="200">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h3><?php _e('Call Us', 'ngist-theme'); ?></h3>
                        <div class="contact-details">
                            <?php
                            $phone = get_theme_mod('contact_phone', '08065758399');
                            if ($phone) :
                            ?>
                                <p><a href="tel:<?php echo esc_attr($phone); ?>"><?php echo esc_html($phone); ?></a></p>
                            <?php endif; ?>
                            <p><?php _e('Admissions Hotline:', 'ngist-theme'); ?><br>
                            <a href="tel:+2348065758399">+234 806 575 8399</a></p>
                            <p><?php _e('General Inquiries:', 'ngist-theme'); ?><br>
                            <a href="tel:+2348065758399">+234 806 575 8399</a></p>
                        </div>
                    </div>

                    <div class="contact-card card" data-aos="fade-up" data-aos-delay="300">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h3><?php _e('Email Us', 'ngist-theme'); ?></h3>
                        <div class="contact-details">
                            <?php
                            $email = get_theme_mod('contact_email', 'ngisatedu@gmail.com');
                            if ($email) :
                            ?>
                                <p><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></p>
                            <?php endif; ?>
                            <p><?php _e('Admissions:', 'ngist-theme'); ?><br>
                            <a href="mailto:admissions@ngisatedu.com">admissions@ngisatedu.com</a></p>
                            <p><?php _e('Academic Affairs:', 'ngist-theme'); ?><br>
                            <a href="mailto:academic@ngisatedu.com">academic@ngisatedu.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Form Section -->
        <section class="contact-form-section section bg-light" data-aos="fade-up">
            <div class="container">
                <div class="form-container">
                    <div class="form-header text-center">
                        <h2 class="section-title font-display"><?php _e('Send Us a Message', 'ngist-theme'); ?></h2>
                        <p class="section-subtitle"><?php _e('Have a question or need more information? Fill out the form below and we\'ll get back to you soon.', 'ngist-theme'); ?></p>
                    </div>

                    <form class="contact-form" method="post" data-aos="fade-up" data-aos-delay="200">
                        <div class="form-grid grid grid-2">
                            <div class="form-group">
                                <label for="contact_name" class="form-label"><?php _e('Full Name', 'ngist-theme'); ?> <span class="required">*</span></label>
                                <input type="text" id="contact_name" name="name" class="form-input" required>
                            </div>

                            <div class="form-group">
                                <label for="contact_email" class="form-label"><?php _e('Email Address', 'ngist-theme'); ?> <span class="required">*</span></label>
                                <input type="email" id="contact_email" name="email" class="form-input" required>
                            </div>

                            <div class="form-group">
                                <label for="contact_phone" class="form-label"><?php _e('Phone Number', 'ngist-theme'); ?></label>
                                <input type="tel" id="contact_phone" name="phone" class="form-input">
                            </div>

                            <div class="form-group">
                                <label for="contact_subject" class="form-label"><?php _e('Subject', 'ngist-theme'); ?> <span class="required">*</span></label>
                                <select id="contact_subject" name="subject" class="form-select" required>
                                    <option value=""><?php _e('Select a subject', 'ngist-theme'); ?></option>
                                    <option value="General Inquiry"><?php _e('General Inquiry', 'ngist-theme'); ?></option>
                                    <option value="Admissions"><?php _e('Admissions', 'ngist-theme'); ?></option>
                                    <option value="Academic Programs"><?php _e('Academic Programs', 'ngist-theme'); ?></option>
                                    <option value="Student Services"><?php _e('Student Services', 'ngist-theme'); ?></option>
                                    <option value="Technical Support"><?php _e('Technical Support', 'ngist-theme'); ?></option>
                                    <option value="Partnership"><?php _e('Partnership Opportunities', 'ngist-theme'); ?></option>
                                    <option value="Other"><?php _e('Other', 'ngist-theme'); ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="contact_message" class="form-label"><?php _e('Message', 'ngist-theme'); ?> <span class="required">*</span></label>
                            <textarea id="contact_message" name="message" class="form-textarea" rows="6" placeholder="<?php _e('Please provide details about your inquiry...', 'ngist-theme'); ?>" required></textarea>
                        </div>

                        <div class="form-group">
                            <label class="checkbox-label">
                                <input type="checkbox" name="newsletter" value="1">
                                <span class="checkmark"></span>
                                <?php _e('I would like to receive updates about programs and events', 'ngist-theme'); ?>
                            </label>
                        </div>

                        <div class="form-actions text-center">
                            <button type="submit" class="btn btn-primary btn-large">
                                <i class="fas fa-paper-plane"></i>
                                <?php _e('Send Message', 'ngist-theme'); ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="faq-section section" data-aos="fade-up">
            <div class="container">
                <div class="section-header text-center">
                    <h2 class="section-title font-display"><?php _e('Frequently Asked Questions', 'ngist-theme'); ?></h2>
                    <p class="section-subtitle"><?php _e('Quick answers to common questions', 'ngist-theme'); ?></p>
                </div>

                <div class="faq-container">
                    <div class="faq-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="faq-question">
                            <h3><?php _e('What programs do you offer?', 'ngist-theme'); ?></h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p><?php _e('We offer National Diploma (ND) and Higher National Diploma (HND) programs in Computer Science, Engineering Technology, and Information Technology. We also provide certificate programs and professional training courses in various STEM fields.', 'ngist-theme'); ?></p>
                        </div>
                    </div>

                    <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="faq-question">
                            <h3><?php _e('What are the admission requirements?', 'ngist-theme'); ?></h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p><?php _e('For ND programs, you need SSCE/WAEC/NECO with at least 5 credits including Mathematics and English. For HND programs, you need a relevant ND certificate with good grades. Specific requirements vary by program.', 'ngist-theme'); ?></p>
                        </div>
                    </div>

                    <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="faq-question">
                            <h3><?php _e('How do I apply for admission?', 'ngist-theme'); ?></h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p><?php _e('You can apply online through our admissions portal or visit our campus to complete the application process. Required documents include academic transcripts, identification, and passport photographs.', 'ngist-theme'); ?></p>
                        </div>
                    </div>

                    <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                        <div class="faq-question">
                            <h3><?php _e('Do you offer scholarships or financial aid?', 'ngist-theme'); ?></h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p><?php _e('Yes, we offer merit-based scholarships and need-based financial aid programs. We also have partnerships with organizations that provide funding for deserving students. Contact our financial aid office for more information.', 'ngist-theme'); ?></p>
                        </div>
                    </div>

                    <div class="faq-item" data-aos="fade-up" data-aos-delay="500">
                        <div class="faq-question">
                            <h3><?php _e('What career opportunities are available after graduation?', 'ngist-theme'); ?></h3>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="faq-answer">
                            <p><?php _e('Our graduates work in various sectors including technology companies, engineering firms, government agencies, and research institutions. We have a strong career services department that helps students with job placement and internship opportunities.', 'ngist-theme'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Additional Content -->
        <section class="additional-content section bg-light" data-aos="fade-up">
            <div class="container">
                <?php the_content(); ?>
            </div>
        </section>

    <?php endwhile; ?>
</main>

<style>
.contact-page .section {
    padding: 4rem 0;
}

.contact-hero {
    background: linear-gradient(135deg, var(--primary-blue) 0%, var(--accent-teal) 100%);
    color: var(--white);
    text-align: center;
    padding: 6rem 0;
}

.hero-title {
    font-size: 3.5rem;
    margin-bottom: 1.5rem;
}

.hero-subtitle {
    font-size: 1.25rem;
    max-width: 800px;
    margin: 0 auto;
    opacity: 0.9;
}

.contact-info-grid {
    margin-top: 2rem;
}

.contact-card {
    text-align: center;
    padding: 3rem 2rem;
    transition: transform 0.3s ease;
}

.contact-card:hover {
    transform: translateY(-5px);
}

.contact-icon {
    font-size: 3rem;
    color: var(--accent-teal);
    margin-bottom: 1.5rem;
}

.contact-card h3 {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
    color: var(--text-dark);
}

.contact-details p {
    margin-bottom: 1rem;
    color: var(--text-light);
}

.contact-details a {
    color: var(--primary-blue);
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
}

.contact-details a:hover {
    color: var(--accent-teal);
}

.contact-hours {
    background: var(--bg-light);
    padding: 1rem;
    border-radius: 0.5rem;
    margin-top: 1rem;
}

.form-container {
    max-width: 800px;
    margin: 0 auto;
}

.form-header {
    margin-bottom: 3rem;
}

.section-title {
    font-size: 2.5rem;
    margin-bottom: 1rem;
    color: var(--text-dark);
}

.section-subtitle {
    font-size: 1.125rem;
    color: var(--text-light);
    max-width: 600px;
    margin: 0 auto;
}

.contact-form {
    background: var(--white);
    padding: 3rem;
    border-radius: 1rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.form-grid {
    margin-bottom: 2rem;
}

.form-group {
    margin-bottom: 2rem;
}

.form-label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 500;
    color: var(--text-dark);
}

.required {
    color: #ef4444;
}

.form-input,
.form-select,
.form-textarea {
    width: 100%;
    padding: 1rem;
    border: 2px solid var(--gray-300);
    border-radius: 0.5rem;
    font-size: 1rem;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    background: var(--white);
}

.form-input:focus,
.form-select:focus,
.form-textarea:focus {
    outline: none;
    border-color: var(--primary-blue);
    box-shadow: 0 0 0 3px rgba(30, 64, 175, 0.1);
}

.form-textarea {
    resize: vertical;
    min-height: 120px;
}

.checkbox-label {
    display: flex;
    align-items: center;
    cursor: pointer;
    font-size: 0.875rem;
    color: var(--text-light);
}

.checkbox-label input[type="checkbox"] {
    margin-right: 0.75rem;
    width: auto;
}

.btn-large {
    padding: 1rem 2rem;
    font-size: 1.125rem;
}

.btn-large i {
    margin-right: 0.5rem;
}

.faq-container {
    max-width: 800px;
    margin: 3rem auto 0;
}

.faq-item {
    background: var(--white);
    border-radius: 0.5rem;
    margin-bottom: 1rem;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.faq-question {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.5rem 2rem;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.faq-question:hover {
    background: var(--bg-light);
}

.faq-question h3 {
    font-size: 1.125rem;
    font-weight: 600;
    color: var(--text-dark);
    margin: 0;
}

.faq-question i {
    color: var(--primary-blue);
    transition: transform 0.3s ease;
}

.faq-item.active .faq-question i {
    transform: rotate(180deg);
}

.faq-answer {
    padding: 0 2rem;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease, padding 0.3s ease;
}

.faq-item.active .faq-answer {
    padding: 0 2rem 1.5rem;
    max-height: 200px;
}

.faq-answer p {
    color: var(--text-light);
    line-height: 1.6;
    margin: 0;
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .hero-subtitle {
        font-size: 1.125rem;
    }
    
    .contact-info-grid {
        grid-template-columns: 1fr;
    }
    
    .form-grid {
        grid-template-columns: 1fr;
    }
    
    .contact-form {
        padding: 2rem 1.5rem;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .faq-question {
        padding: 1rem 1.5rem;
    }
    
    .faq-answer {
        padding: 0 1.5rem;
    }
    
    .faq-item.active .faq-answer {
        padding: 0 1.5rem 1rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // FAQ Toggle
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        
        question.addEventListener('click', () => {
            const isActive = item.classList.contains('active');
            
            // Close all FAQ items
            faqItems.forEach(faq => faq.classList.remove('active'));
            
            // Open clicked item if it wasn't active
            if (!isActive) {
                item.classList.add('active');
            }
        });
    });
});
</script>

<?php
get_footer();
?>