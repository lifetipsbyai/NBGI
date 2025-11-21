<?php
/**
 * Template Name: Programs Page
 *
 * @package NGIST_Theme
 */

get_header();
?>

<main id="primary" class="site-main programs-page">
    <?php while (have_posts()) : the_post(); ?>
        
        <!-- Hero Section -->
        <section class="programs-hero section">
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

        <!-- Filter Section -->
        <section class="programs-filter section bg-light" data-aos="fade-up">
            <div class="container">
                <div class="filter-container">
                    <div class="filter-controls">
                        <h3><?php _e('Filter Programs', 'ngist-theme'); ?></h3>
                        <div class="filter-buttons">
                            <button class="filter-btn active" data-filter="all">
                                <?php _e('All Programs', 'ngist-theme'); ?>
                            </button>
                            <button class="filter-btn" data-filter="ND">
                                <?php _e('National Diploma (ND)', 'ngist-theme'); ?>
                            </button>
                            <button class="filter-btn" data-filter="HND">
                                <?php _e('Higher National Diploma (HND)', 'ngist-theme'); ?>
                            </button>
                            <button class="filter-btn" data-filter="Certificate">
                                <?php _e('Certificate Programs', 'ngist-theme'); ?>
                            </button>
                            <button class="filter-btn" data-filter="Professional">
                                <?php _e('Professional Training', 'ngist-theme'); ?>
                            </button>
                        </div>
                    </div>
                    
                    <div class="search-container">
                        <div class="search-box">
                            <input type="text" class="search-input" placeholder="<?php _e('Search programs...', 'ngist-theme'); ?>">
                            <i class="fas fa-search search-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Programs Grid Section -->
        <section class="programs-grid-section section" data-aos="fade-up">
            <div class="container">
                <div class="programs-grid grid grid-3">
                    <?php
                    $programs = get_posts(array(
                        'post_type' => 'program',
                        'numberposts' => -1,
                        'post_status' => 'publish',
                        'orderby' => 'title',
                        'order' => 'ASC'
                    ));

                    if ($programs) :
                        foreach ($programs as $program) :
                            $duration = get_post_meta($program->ID, '_program_duration', true);
                            $level = get_post_meta($program->ID, '_program_level', true);
                            $requirements = get_post_meta($program->ID, '_program_requirements', true);
                            $career_prospects = get_post_meta($program->ID, '_program_career_prospects', true);
                            $categories = get_the_terms($program->ID, 'program_category');
                    ?>
                        <div class="program-card card filter-item search-item" 
                             data-category="<?php echo esc_attr($level); ?>" 
                             data-aos="fade-up" 
                             data-aos-delay="<?php echo 100 * ($loop_index ?? 1); ?>">
                            
                            <?php if (has_post_thumbnail($program->ID)) : ?>
                                <div class="card-image-wrapper">
                                    <img src="<?php echo get_the_post_thumbnail_url($program->ID, 'program-image'); ?>" 
                                         alt="<?php echo get_the_title($program->ID); ?>" 
                                         class="card-image">
                                    <?php if ($level) : ?>
                                        <span class="program-level-badge"><?php echo esc_html($level); ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            
                            <div class="card-content">
                                <h3 class="card-title">
                                    <a href="<?php echo get_permalink($program->ID); ?>">
                                        <?php echo get_the_title($program->ID); ?>
                                    </a>
                                </h3>
                                
                                <?php if ($categories && !is_wp_error($categories)) : ?>
                                    <div class="program-categories">
                                        <?php foreach ($categories as $category) : ?>
                                            <span class="category-tag"><?php echo esc_html($category->name); ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                
                                <p class="card-excerpt"><?php echo get_the_excerpt($program->ID); ?></p>
                                
                                <div class="program-meta">
                                    <?php if ($duration) : ?>
                                        <div class="meta-item">
                                            <i class="fas fa-clock"></i>
                                            <span><?php echo esc_html($duration); ?></span>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if ($level) : ?>
                                        <div class="meta-item">
                                            <i class="fas fa-graduation-cap"></i>
                                            <span><?php echo esc_html($level); ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                
                                <?php if ($requirements) : ?>
                                    <div class="program-requirements">
                                        <h4><?php _e('Entry Requirements:', 'ngist-theme'); ?></h4>
                                        <p><?php echo wp_trim_words($requirements, 15); ?></p>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="card-actions">
                                    <a href="<?php echo get_permalink($program->ID); ?>" class="btn btn-primary">
                                        <?php _e('Learn More', 'ngist-theme'); ?>
                                    </a>
                                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('admissions'))); ?>" class="btn btn-secondary">
                                        <?php _e('Apply Now', 'ngist-theme'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php 
                        endforeach;
                    else :
                        // Fallback programs if none exist
                        $fallback_programs = array(
                            array(
                                'title' => 'Computer Science',
                                'level' => 'ND',
                                'duration' => '2 Years',
                                'excerpt' => 'Comprehensive program covering programming, software development, and computer systems.',
                                'requirements' => 'SSCE with credits in Mathematics, English, and Physics',
                                'image' => 'tech_background.jpg'
                            ),
                            array(
                                'title' => 'Computer Science',
                                'level' => 'HND',
                                'duration' => '2 Years',
                                'excerpt' => 'Advanced program building on ND foundation with specialized tracks.',
                                'requirements' => 'ND in Computer Science or related field',
                                'image' => 'tech_background.jpg'
                            ),
                            array(
                                'title' => 'Engineering Technology',
                                'level' => 'ND',
                                'duration' => '2 Years',
                                'excerpt' => 'Practical engineering program focusing on applied technology solutions.',
                                'requirements' => 'SSCE with credits in Mathematics, English, and Physics',
                                'image' => 'lab_image.jpg'
                            ),
                            array(
                                'title' => 'Engineering Technology',
                                'level' => 'HND',
                                'duration' => '2 Years',
                                'excerpt' => 'Advanced engineering program with specialization options.',
                                'requirements' => 'ND in Engineering Technology or related field',
                                'image' => 'lab_image.jpg'
                            ),
                            array(
                                'title' => 'Information Technology',
                                'level' => 'ND',
                                'duration' => '2 Years',
                                'excerpt' => 'IT program covering networks, databases, and system administration.',
                                'requirements' => 'SSCE with credits in Mathematics and English',
                                'image' => 'tech_background.jpg'
                            ),
                            array(
                                'title' => 'Information Technology',
                                'level' => 'HND',
                                'duration' => '2 Years',
                                'excerpt' => 'Advanced IT program with cybersecurity and cloud computing tracks.',
                                'requirements' => 'ND in Information Technology or related field',
                                'image' => 'tech_background.jpg'
                            ),
                            array(
                                'title' => 'Data Science Certificate',
                                'level' => 'Certificate',
                                'duration' => '6 Months',
                                'excerpt' => 'Intensive program covering data analysis, machine learning, and visualization.',
                                'requirements' => 'Basic mathematics and computer literacy',
                                'image' => 'tech_background.jpg'
                            ),
                            array(
                                'title' => 'Cybersecurity Professional',
                                'level' => 'Professional',
                                'duration' => '3 Months',
                                'excerpt' => 'Professional certification in cybersecurity and ethical hacking.',
                                'requirements' => 'IT background or relevant experience',
                                'image' => 'tech_background.jpg'
                            ),
                            array(
                                'title' => 'Web Development Bootcamp',
                                'level' => 'Certificate',
                                'duration' => '4 Months',
                                'excerpt' => 'Full-stack web development program with modern frameworks.',
                                'requirements' => 'Basic computer skills and logical thinking',
                                'image' => 'tech_background.jpg'
                            )
                        );
                        
                        foreach ($fallback_programs as $index => $program) :
                    ?>
                        <div class="program-card card filter-item search-item" 
                             data-category="<?php echo esc_attr($program['level']); ?>" 
                             data-aos="fade-up" 
                             data-aos-delay="<?php echo 100 * ($index + 1); ?>">
                            
                            <div class="card-image-wrapper">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo esc_attr($program['image']); ?>" 
                                     alt="<?php echo esc_attr($program['title']); ?>" 
                                     class="card-image">
                                <span class="program-level-badge"><?php echo esc_html($program['level']); ?></span>
                            </div>
                            
                            <div class="card-content">
                                <h3 class="card-title"><?php echo esc_html($program['title']); ?></h3>
                                
                                <p class="card-excerpt"><?php echo esc_html($program['excerpt']); ?></p>
                                
                                <div class="program-meta">
                                    <div class="meta-item">
                                        <i class="fas fa-clock"></i>
                                        <span><?php echo esc_html($program['duration']); ?></span>
                                    </div>
                                    <div class="meta-item">
                                        <i class="fas fa-graduation-cap"></i>
                                        <span><?php echo esc_html($program['level']); ?></span>
                                    </div>
                                </div>
                                
                                <div class="program-requirements">
                                    <h4><?php _e('Entry Requirements:', 'ngist-theme'); ?></h4>
                                    <p><?php echo esc_html($program['requirements']); ?></p>
                                </div>
                                
                                <div class="card-actions">
                                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary">
                                        <?php _e('Learn More', 'ngist-theme'); ?>
                                    </a>
                                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('admissions'))); ?>" class="btn btn-secondary">
                                        <?php _e('Apply Now', 'ngist-theme'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; endif; ?>
                </div>
                
                <!-- No Results Message -->
                <div class="no-results" style="display: none;">
                    <div class="no-results-content text-center">
                        <i class="fas fa-search fa-3x"></i>
                        <h3><?php _e('No Programs Found', 'ngist-theme'); ?></h3>
                        <p><?php _e('Try adjusting your search criteria or browse all programs.', 'ngist-theme'); ?></p>
                        <button class="btn btn-primary" onclick="resetFilters()">
                            <?php _e('Show All Programs', 'ngist-theme'); ?>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Additional Content -->
        <section class="programs-info section bg-light" data-aos="fade-up">
            <div class="container">
                <div class="info-content">
                    <?php the_content(); ?>
                </div>
                
                <div class="info-grid grid grid-3">
                    <div class="info-card card" data-aos="fade-up" data-aos-delay="100">
                        <div class="info-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h3><?php _e('Accredited Programs', 'ngist-theme'); ?></h3>
                        <p><?php _e('All our programs are accredited by relevant professional bodies and meet international standards.', 'ngist-theme'); ?></p>
                    </div>
                    
                    <div class="info-card card" data-aos="fade-up" data-aos-delay="200">
                        <div class="info-icon">
                            <i class="fas fa-users-cog"></i>
                        </div>
                        <h3><?php _e('Industry Partnerships', 'ngist-theme'); ?></h3>
                        <p><?php _e('Strong partnerships with leading technology companies provide internship and job opportunities.', 'ngist-theme'); ?></p>
                    </div>
                    
                    <div class="info-card card" data-aos="fade-up" data-aos-delay="300">
                        <div class="info-icon">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <h3><?php _e('Modern Facilities', 'ngist-theme'); ?></h3>
                        <p><?php _e('State-of-the-art laboratories and equipment ensure hands-on learning experiences.', 'ngist-theme'); ?></p>
                    </div>
                </div>
            </div>
        </section>

    <?php endwhile; ?>
</main>

<style>
.programs-page .section {
    padding: 4rem 0;
}

.programs-hero {
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

.filter-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 2rem;
}

.filter-controls h3 {
    margin-bottom: 1rem;
    color: var(--text-dark);
}

.filter-buttons {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.filter-btn {
    padding: 0.75rem 1.5rem;
    border: 2px solid var(--gray-300);
    background: var(--white);
    color: var(--text-dark);
    border-radius: 2rem;
    cursor: pointer;
    transition: all 0.3s ease;
    font-weight: 500;
}

.filter-btn:hover,
.filter-btn.active {
    background: var(--primary-blue);
    color: var(--white);
    border-color: var(--primary-blue);
}

.search-box {
    position: relative;
    width: 300px;
}

.search-input {
    width: 100%;
    padding: 0.75rem 1rem 0.75rem 3rem;
    border: 2px solid var(--gray-300);
    border-radius: 2rem;
    font-size: 1rem;
    transition: border-color 0.3s ease;
}

.search-input:focus {
    outline: none;
    border-color: var(--primary-blue);
}

.search-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--text-light);
}

.programs-grid {
    margin-top: 2rem;
}

.program-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    overflow: hidden;
}

.program-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}

.card-image-wrapper {
    position: relative;
    overflow: hidden;
}

.card-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.program-card:hover .card-image {
    transform: scale(1.05);
}

.program-level-badge {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: var(--primary-blue);
    color: var(--white);
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.875rem;
    font-weight: 500;
}

.card-content {
    padding: 2rem;
}

.card-title {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 1rem;
    color: var(--text-dark);
}

.card-title a {
    color: inherit;
    text-decoration: none;
    transition: color 0.3s ease;
}

.card-title a:hover {
    color: var(--primary-blue);
}

.program-categories {
    margin-bottom: 1rem;
}

.category-tag {
    display: inline-block;
    background: var(--bg-light);
    color: var(--text-dark);
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.875rem;
    margin-right: 0.5rem;
    margin-bottom: 0.5rem;
}

.card-excerpt {
    color: var(--text-light);
    margin-bottom: 1.5rem;
    line-height: 1.6;
}

.program-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.meta-item {
    display: flex;
    align-items: center;
    color: var(--text-light);
    font-size: 0.875rem;
}

.meta-item i {
    margin-right: 0.5rem;
    color: var(--accent-teal);
}

.program-requirements {
    background: var(--bg-light);
    padding: 1rem;
    border-radius: 0.5rem;
    margin-bottom: 1.5rem;
}

.program-requirements h4 {
    font-size: 0.875rem;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 0.5rem;
}

.program-requirements p {
    font-size: 0.875rem;
    color: var(--text-light);
    margin: 0;
}

.card-actions {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.card-actions .btn {
    flex: 1;
    text-align: center;
    min-width: 120px;
}

.no-results {
    text-align: center;
    padding: 4rem 2rem;
}

.no-results-content i {
    color: var(--text-light);
    margin-bottom: 2rem;
}

.no-results-content h3 {
    color: var(--text-dark);
    margin-bottom: 1rem;
}

.no-results-content p {
    color: var(--text-light);
    margin-bottom: 2rem;
}

.info-grid {
    margin-top: 3rem;
}

.info-card {
    text-align: center;
    padding: 2rem;
}

.info-icon {
    font-size: 2.5rem;
    color: var(--accent-teal);
    margin-bottom: 1rem;
}

.info-card h3 {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 1rem;
    color: var(--text-dark);
}

.info-card p {
    color: var(--text-light);
    line-height: 1.6;
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .hero-subtitle {
        font-size: 1.125rem;
    }
    
    .filter-container {
        flex-direction: column;
        align-items: stretch;
    }
    
    .search-box {
        width: 100%;
    }
    
    .filter-buttons {
        justify-content: center;
    }
    
    .programs-grid {
        grid-template-columns: 1fr;
    }
    
    .card-actions {
        flex-direction: column;
    }
    
    .info-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<script>
function resetFilters() {
    // Reset filter buttons
    document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
    document.querySelector('.filter-btn[data-filter="all"]').classList.add('active');
    
    // Clear search input
    document.querySelector('.search-input').value = '';
    
    // Show all items
    document.querySelectorAll('.filter-item').forEach(item => item.style.display = 'block');
    
    // Hide no results message
    document.querySelector('.no-results').style.display = 'none';
}
</script>

<?php
get_footer();
?>