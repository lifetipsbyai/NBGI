<?php
/**
 * Template Name: About Page
 *
 * @package NGIST_Theme
 */

get_header();
?>

<main id="primary" class="site-main about-page">
    <?php while (have_posts()) : the_post(); ?>
        
        <!-- Hero Section -->
        <section class="about-hero section">
            <div class="container">
                <div class="hero-content text-center">
                    <h1 class="hero-title font-display" data-aos="fade-up">
                        <?php the_title(); ?>
                    </h1>
                    <?php if (has_excerpt()) : ?>
                        <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="200">
                            <?php the_excerpt(); ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <!-- Mission & Vision Section -->
        <section class="mission-vision section" data-aos="fade-up">
            <div class="container">
                <div class="mission-vision-grid grid grid-2">
                    <div class="mission-card card" data-aos="fade-right">
                        <div class="card-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h3 class="card-title"><?php _e('Our Mission', 'ngist-theme'); ?></h3>
                        <p class="card-content">
                            <?php _e('To provide world-class STEM education that empowers students with the knowledge, skills, and innovation mindset needed to excel in the rapidly evolving technology landscape and contribute meaningfully to society.', 'ngist-theme'); ?>
                        </p>
                    </div>
                    
                    <div class="vision-card card" data-aos="fade-left">
                        <div class="card-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h3 class="card-title"><?php _e('Our Vision', 'ngist-theme'); ?></h3>
                        <p class="card-content">
                            <?php _e('To be the leading institute of science and technology education in Africa, recognized globally for academic excellence, innovative research, and producing graduates who drive technological advancement and economic development.', 'ngist-theme'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Content -->
        <section class="about-content section bg-light" data-aos="fade-up">
            <div class="container">
                <div class="content-grid grid grid-2">
                    <div class="content-text" data-aos="fade-right">
                        <?php the_content(); ?>
                    </div>
                    
                    <div class="content-image" data-aos="fade-left">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large', array('class' => 'about-image rounded-lg')); ?>
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/graduation.jpg" 
                                 alt="<?php _e('Graduation ceremony', 'ngist-theme'); ?>" 
                                 class="about-image rounded-lg">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- Core Values Section -->
        <section class="core-values section" data-aos="fade-up">
            <div class="container">
                <div class="section-header text-center">
                    <h2 class="section-title font-display"><?php _e('Our Core Values', 'ngist-theme'); ?></h2>
                    <p class="section-subtitle"><?php _e('The principles that guide everything we do', 'ngist-theme'); ?></p>
                </div>

                <div class="values-grid grid grid-3">
                    <div class="value-item" data-aos="zoom-in" data-aos-delay="100">
                        <div class="value-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <h3 class="value-title"><?php _e('Excellence', 'ngist-theme'); ?></h3>
                        <p class="value-description">
                            <?php _e('We strive for the highest standards in education, research, and service delivery.', 'ngist-theme'); ?>
                        </p>
                    </div>
                    
                    <div class="value-item" data-aos="zoom-in" data-aos-delay="200">
                        <div class="value-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h3 class="value-title"><?php _e('Innovation', 'ngist-theme'); ?></h3>
                        <p class="value-description">
                            <?php _e('We embrace creativity and cutting-edge approaches to solve complex challenges.', 'ngist-theme'); ?>
                        </p>
                    </div>
                    
                    <div class="value-item" data-aos="zoom-in" data-aos-delay="300">
                        <div class="value-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h3 class="value-title"><?php _e('Integrity', 'ngist-theme'); ?></h3>
                        <p class="value-description">
                            <?php _e('We maintain the highest ethical standards in all our interactions and decisions.', 'ngist-theme'); ?>
                        </p>
                    </div>
                    
                    <div class="value-item" data-aos="zoom-in" data-aos-delay="400">
                        <div class="value-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="value-title"><?php _e('Collaboration', 'ngist-theme'); ?></h3>
                        <p class="value-description">
                            <?php _e('We believe in the power of teamwork and partnerships to achieve greater impact.', 'ngist-theme'); ?>
                        </p>
                    </div>
                    
                    <div class="value-item" data-aos="zoom-in" data-aos-delay="500">
                        <div class="value-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <h3 class="value-title"><?php _e('Global Perspective', 'ngist-theme'); ?></h3>
                        <p class="value-description">
                            <?php _e('We prepare students for success in an interconnected, globalized world.', 'ngist-theme'); ?>
                        </p>
                    </div>
                    
                    <div class="value-item" data-aos="zoom-in" data-aos-delay="600">
                        <div class="value-icon">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <h3 class="value-title"><?php _e('Sustainability', 'ngist-theme'); ?></h3>
                        <p class="value-description">
                            <?php _e('We are committed to environmental responsibility and sustainable practices.', 'ngist-theme'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Leadership Team Section -->
        <section class="leadership-team section bg-light" data-aos="fade-up">
            <div class="container">
                <div class="section-header text-center">
                    <h2 class="section-title font-display"><?php _e('Leadership Team', 'ngist-theme'); ?></h2>
                    <p class="section-subtitle"><?php _e('Meet the visionary leaders driving our mission forward', 'ngist-theme'); ?></p>
                </div>

                <div class="leadership-grid grid grid-3">
                    <?php
                    // Get faculty members with leadership roles
                    $leaders = get_posts(array(
                        'post_type' => 'faculty',
                        'numberposts' => 6,
                        'post_status' => 'publish',
                        'meta_query' => array(
                            array(
                                'key' => '_faculty_position',
                                'value' => array('Director', 'Dean', 'Head', 'Principal', 'Vice'),
                                'compare' => 'REGEXP'
                            )
                        )
                    ));

                    if ($leaders) :
                        foreach ($leaders as $leader) :
                            $position = get_post_meta($leader->ID, '_faculty_position', true);
                            $qualifications = get_post_meta($leader->ID, '_faculty_qualifications', true);
                    ?>
                        <div class="leader-card card" data-aos="fade-up" data-aos-delay="<?php echo 100 * ($loop_index ?? 1); ?>">
                            <?php if (has_post_thumbnail($leader->ID)) : ?>
                                <img src="<?php echo get_the_post_thumbnail_url($leader->ID, 'faculty-photo'); ?>" 
                                     alt="<?php echo get_the_title($leader->ID); ?>" 
                                     class="leader-photo">
                            <?php endif; ?>
                            
                            <div class="leader-info">
                                <h3 class="leader-name"><?php echo get_the_title($leader->ID); ?></h3>
                                <?php if ($position) : ?>
                                    <p class="leader-position"><?php echo esc_html($position); ?></p>
                                <?php endif; ?>
                                <?php if ($qualifications) : ?>
                                    <p class="leader-qualifications"><?php echo esc_html($qualifications); ?></p>
                                <?php endif; ?>
                                <p class="leader-bio"><?php echo wp_trim_words(get_the_content($leader->ID), 25); ?></p>
                            </div>
                        </div>
                    <?php 
                        endforeach;
                    else :
                        // Fallback leadership team
                        $fallback_leaders = array(
                            array('name' => 'Gilbert Chidiebere Nnamdi', 'position' => 'Founder & Director', 'qualifications' => 'Ph.D. Computer Science'),
                            array('name' => 'Dr. Sarah Johnson', 'position' => 'Academic Dean', 'qualifications' => 'Ph.D. Engineering'),
                            array('name' => 'Prof. Michael Chen', 'position' => 'Research Director', 'qualifications' => 'Ph.D. Applied Sciences'),
                        );
                        
                        foreach ($fallback_leaders as $index => $leader) :
                    ?>
                        <div class="leader-card card" data-aos="fade-up" data-aos-delay="<?php echo 100 * ($index + 1); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" 
                                 alt="<?php echo esc_attr($leader['name']); ?>" 
                                 class="leader-photo">
                            
                            <div class="leader-info">
                                <h3 class="leader-name"><?php echo esc_html($leader['name']); ?></h3>
                                <p class="leader-position"><?php echo esc_html($leader['position']); ?></p>
                                <p class="leader-qualifications"><?php echo esc_html($leader['qualifications']); ?></p>
                                <p class="leader-bio"><?php _e('Dedicated to advancing STEM education and fostering innovation in technology and science.', 'ngist-theme'); ?></p>
                            </div>
                        </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
        </section>

        <!-- Accreditation & Recognition Section -->
        <section class="accreditation section" data-aos="fade-up">
            <div class="container">
                <div class="section-header text-center">
                    <h2 class="section-title font-display"><?php _e('Accreditation & Recognition', 'ngist-theme'); ?></h2>
                    <p class="section-subtitle"><?php _e('Our commitment to quality is recognized by leading educational bodies', 'ngist-theme'); ?></p>
                </div>

                <div class="accreditation-grid grid grid-2">
                    <div class="accreditation-content" data-aos="fade-right">
                        <h3><?php _e('Quality Assurance', 'ngist-theme'); ?></h3>
                        <p><?php _e('Noble Genius Institute of Science and Technology is committed to maintaining the highest standards of educational quality. Our programs are designed to meet international standards and are regularly reviewed to ensure relevance and excellence.', 'ngist-theme'); ?></p>
                        
                        <ul class="accreditation-list">
                            <li><i class="fas fa-check-circle"></i> <?php _e('National Board for Technical Education (NBTE) Accredited', 'ngist-theme'); ?></li>
                            <li><i class="fas fa-check-circle"></i> <?php _e('ISO 9001:2015 Quality Management System', 'ngist-theme'); ?></li>
                            <li><i class="fas fa-check-circle"></i> <?php _e('Member of Association of African Universities (AAU)', 'ngist-theme'); ?></li>
                            <li><i class="fas fa-check-circle"></i> <?php _e('Recognized by Professional Bodies', 'ngist-theme'); ?></li>
                        </ul>
                    </div>
                    
                    <div class="recognition-content" data-aos="fade-left">
                        <h3><?php _e('Awards & Recognition', 'ngist-theme'); ?></h3>
                        <div class="awards-list">
                            <div class="award-item">
                                <div class="award-year">2023</div>
                                <div class="award-details">
                                    <h4><?php _e('Excellence in STEM Education Award', 'ngist-theme'); ?></h4>
                                    <p><?php _e('National Education Excellence Awards', 'ngist-theme'); ?></p>
                                </div>
                            </div>
                            
                            <div class="award-item">
                                <div class="award-year">2022</div>
                                <div class="award-details">
                                    <h4><?php _e('Innovation in Technology Education', 'ngist-theme'); ?></h4>
                                    <p><?php _e('African Technology Education Council', 'ngist-theme'); ?></p>
                                </div>
                            </div>
                            
                            <div class="award-item">
                                <div class="award-year">2021</div>
                                <div class="award-details">
                                    <h4><?php _e('Best Emerging Institute', 'ngist-theme'); ?></h4>
                                    <p><?php _e('West African Education Summit', 'ngist-theme'); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php endwhile; ?>
</main>

<style>
.about-page .section {
    padding: 4rem 0;
}

.about-hero {
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

.mission-vision-grid .card {
    text-align: center;
    padding: 3rem 2rem;
}

.card-icon {
    font-size: 3rem;
    color: var(--primary-blue);
    margin-bottom: 1.5rem;
}

.content-grid {
    align-items: center;
    gap: 4rem;
}

.content-text {
    font-size: 1.125rem;
    line-height: 1.8;
}

.about-image {
    width: 100%;
    height: auto;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

.values-grid {
    margin-top: 3rem;
}

.value-item {
    text-align: center;
    padding: 2rem;
}

.value-icon {
    font-size: 2.5rem;
    color: var(--accent-teal);
    margin-bottom: 1rem;
}

.value-title {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 1rem;
    color: var(--text-dark);
}

.value-description {
    color: var(--text-light);
    line-height: 1.6;
}

.leadership-grid {
    margin-top: 3rem;
}

.leader-card {
    text-align: center;
    padding: 2rem;
}

.leader-photo {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    margin: 0 auto 1.5rem;
    border: 4px solid var(--primary-blue);
}

.leader-name {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: var(--text-dark);
}

.leader-position {
    color: var(--primary-blue);
    font-weight: 500;
    margin-bottom: 0.5rem;
}

.leader-qualifications {
    color: var(--text-light);
    font-size: 0.875rem;
    margin-bottom: 1rem;
}

.leader-bio {
    color: var(--text-light);
    line-height: 1.6;
}

.accreditation-grid {
    align-items: start;
    gap: 4rem;
}

.accreditation-list {
    list-style: none;
    padding: 0;
    margin-top: 2rem;
}

.accreditation-list li {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
    color: var(--text-dark);
}

.accreditation-list i {
    color: var(--accent-teal);
    margin-right: 1rem;
}

.awards-list {
    margin-top: 2rem;
}

.award-item {
    display: flex;
    align-items: start;
    margin-bottom: 2rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid var(--gray-200);
}

.award-item:last-child {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}

.award-year {
    background: var(--primary-blue);
    color: var(--white);
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
    font-weight: 600;
    margin-right: 1.5rem;
    min-width: 60px;
    text-align: center;
}

.award-details h4 {
    font-size: 1.125rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: var(--text-dark);
}

.award-details p {
    color: var(--text-light);
    margin: 0;
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .hero-subtitle {
        font-size: 1.125rem;
    }
    
    .content-grid,
    .accreditation-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .values-grid,
    .leadership-grid {
        grid-template-columns: 1fr;
    }
    
    .award-item {
        flex-direction: column;
        text-align: center;
    }
    
    .award-year {
        margin-right: 0;
        margin-bottom: 1rem;
    }
}
</style>

<?php
get_footer();
?>