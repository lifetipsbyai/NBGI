<?php
/**
 * The main template file
 *
 * @package NGIST_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
    
    <?php if (is_home() && is_front_page()) : ?>
        <!-- Hero Section -->
        <section class="hero-section" data-aos="fade-in">
            <div class="hero-bg" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/hero_campus.jpg');">
                <div class="container">
                    <div class="hero-content">
                        <h1 class="hero-title font-display" data-aos="fade-up" data-aos-delay="200">
                            <?php echo get_theme_mod('hero_title', 'Noble Genius Institute of Science and Technology'); ?>
                        </h1>
                        <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="400">
                            <?php echo get_theme_mod('hero_subtitle', 'Innovating Science and Technology Education for Tomorrow\'s Leaders'); ?>
                        </p>
                        <div class="hero-actions" data-aos="fade-up" data-aos-delay="600">
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('admissions'))); ?>" class="btn btn-primary">
                                <?php _e('Apply Now', 'ngist-theme'); ?>
                            </a>
                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('programs'))); ?>" class="btn btn-secondary">
                                <?php _e('Explore Programs', 'ngist-theme'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Statistics Section -->
        <section class="stats-section section" data-aos="fade-up">
            <div class="container">
                <div class="stats-grid grid grid-4">
                    <div class="stat-item" data-aos="zoom-in" data-aos-delay="100">
                        <div class="stat-number counter" data-target="500">0</div>
                        <div class="stat-label"><?php _e('Students Enrolled', 'ngist-theme'); ?></div>
                    </div>
                    <div class="stat-item" data-aos="zoom-in" data-aos-delay="200">
                        <div class="stat-number counter" data-target="25">0</div>
                        <div class="stat-label"><?php _e('Expert Faculty', 'ngist-theme'); ?></div>
                    </div>
                    <div class="stat-item" data-aos="zoom-in" data-aos-delay="300">
                        <div class="stat-number counter" data-target="15">0</div>
                        <div class="stat-label"><?php _e('Programs Offered', 'ngist-theme'); ?></div>
                    </div>
                    <div class="stat-item" data-aos="zoom-in" data-aos-delay="400">
                        <div class="stat-number counter" data-target="95">0</div>
                        <div class="stat-label"><?php _e('Graduate Success Rate', 'ngist-theme'); ?></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Programs Overview Section -->
        <section class="programs-overview section" data-aos="fade-up">
            <div class="container">
                <div class="section-header text-center">
                    <h2 class="section-title font-display"><?php _e('Our Programs', 'ngist-theme'); ?></h2>
                    <p class="section-subtitle"><?php _e('Discover world-class STEM education programs designed for your success', 'ngist-theme'); ?></p>
                </div>

                <div class="programs-grid grid grid-3">
                    <?php
                    $programs = get_posts(array(
                        'post_type' => 'program',
                        'numberposts' => 6,
                        'post_status' => 'publish'
                    ));

                    if ($programs) :
                        foreach ($programs as $program) :
                            $duration = get_post_meta($program->ID, '_program_duration', true);
                            $level = get_post_meta($program->ID, '_program_level', true);
                    ?>
                        <div class="program-card card" data-aos="fade-up" data-aos-delay="<?php echo 100 * ($loop_index ?? 1); ?>">
                            <?php if (has_post_thumbnail($program->ID)) : ?>
                                <img src="<?php echo get_the_post_thumbnail_url($program->ID, 'card-image'); ?>" 
                                     alt="<?php echo get_the_title($program->ID); ?>" 
                                     class="card-image">
                            <?php endif; ?>
                            
                            <div class="card-content">
                                <?php if ($level) : ?>
                                    <span class="program-level"><?php echo esc_html($level); ?></span>
                                <?php endif; ?>
                                
                                <h3 class="card-title">
                                    <a href="<?php echo get_permalink($program->ID); ?>">
                                        <?php echo get_the_title($program->ID); ?>
                                    </a>
                                </h3>
                                
                                <p class="card-excerpt"><?php echo get_the_excerpt($program->ID); ?></p>
                                
                                <?php if ($duration) : ?>
                                    <div class="program-meta">
                                        <span class="duration">
                                            <i class="fas fa-clock"></i>
                                            <?php echo esc_html($duration); ?>
                                        </span>
                                    </div>
                                <?php endif; ?>
                                
                                <a href="<?php echo get_permalink($program->ID); ?>" class="btn btn-primary">
                                    <?php _e('Learn More', 'ngist-theme'); ?>
                                </a>
                            </div>
                        </div>
                    <?php 
                        endforeach;
                    else :
                        // Fallback content if no programs exist
                        $fallback_programs = array(
                            array('title' => 'Computer Science', 'level' => 'ND/HND', 'duration' => '2-3 Years'),
                            array('title' => 'Engineering Technology', 'level' => 'ND/HND', 'duration' => '2-3 Years'),
                            array('title' => 'Information Technology', 'level' => 'ND/HND', 'duration' => '2-3 Years'),
                        );
                        
                        foreach ($fallback_programs as $index => $program) :
                    ?>
                        <div class="program-card card" data-aos="fade-up" data-aos-delay="<?php echo 100 * ($index + 1); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tech_background.jpg" 
                                 alt="<?php echo esc_attr($program['title']); ?>" 
                                 class="card-image">
                            
                            <div class="card-content">
                                <span class="program-level"><?php echo esc_html($program['level']); ?></span>
                                <h3 class="card-title"><?php echo esc_html($program['title']); ?></h3>
                                <p class="card-excerpt"><?php _e('Comprehensive program designed to prepare students for successful careers in technology and innovation.', 'ngist-theme'); ?></p>
                                
                                <div class="program-meta">
                                    <span class="duration">
                                        <i class="fas fa-clock"></i>
                                        <?php echo esc_html($program['duration']); ?>
                                    </span>
                                </div>
                                
                                <a href="<?php echo esc_url(home_url('/programs')); ?>" class="btn btn-primary">
                                    <?php _e('Learn More', 'ngist-theme'); ?>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; endif; ?>
                </div>

                <div class="text-center" data-aos="fade-up">
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('programs'))); ?>" class="btn btn-secondary">
                        <?php _e('View All Programs', 'ngist-theme'); ?>
                    </a>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section class="about-section section bg-light" data-aos="fade-up">
            <div class="container">
                <div class="about-content grid grid-2">
                    <div class="about-text" data-aos="fade-right">
                        <h2 class="section-title font-display"><?php _e('About Noble Genius Institute', 'ngist-theme'); ?></h2>
                        <p class="lead"><?php _e('Leading the way in STEM education with innovative programs, world-class faculty, and state-of-the-art facilities.', 'ngist-theme'); ?></p>
                        <p><?php _e('Our institute is committed to providing exceptional education in science and technology, preparing students for successful careers in the rapidly evolving tech industry. With a focus on practical learning, research, and innovation, we ensure our graduates are ready to meet the challenges of tomorrow.', 'ngist-theme'); ?></p>
                        
                        <div class="about-features">
                            <div class="feature-item">
                                <i class="fas fa-graduation-cap"></i>
                                <div>
                                    <h4><?php _e('Quality Education', 'ngist-theme'); ?></h4>
                                    <p><?php _e('Accredited programs with industry-relevant curriculum', 'ngist-theme'); ?></p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-microscope"></i>
                                <div>
                                    <h4><?php _e('Research Excellence', 'ngist-theme'); ?></h4>
                                    <p><?php _e('Cutting-edge research facilities and opportunities', 'ngist-theme'); ?></p>
                                </div>
                            </div>
                            <div class="feature-item">
                                <i class="fas fa-users"></i>
                                <div>
                                    <h4><?php _e('Expert Faculty', 'ngist-theme'); ?></h4>
                                    <p><?php _e('Experienced professionals and academic leaders', 'ngist-theme'); ?></p>
                                </div>
                            </div>
                        </div>
                        
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('about'))); ?>" class="btn btn-primary">
                            <?php _e('Learn More About Us', 'ngist-theme'); ?>
                        </a>
                    </div>
                    
                    <div class="about-image" data-aos="fade-left">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/lab_image.jpg" 
                             alt="<?php _e('Students in laboratory', 'ngist-theme'); ?>" 
                             class="rounded-lg">
                    </div>
                </div>
            </div>
        </section>

        <!-- News & Events Section -->
        <section class="news-events-section section" data-aos="fade-up">
            <div class="container">
                <div class="section-header text-center">
                    <h2 class="section-title font-display"><?php _e('Latest News & Events', 'ngist-theme'); ?></h2>
                    <p class="section-subtitle"><?php _e('Stay updated with the latest happenings at our institute', 'ngist-theme'); ?></p>
                </div>

                <div class="news-events-grid grid grid-2">
                    <!-- Latest News -->
                    <div class="news-section" data-aos="fade-right">
                        <h3 class="subsection-title"><?php _e('Recent News', 'ngist-theme'); ?></h3>
                        
                        <?php
                        $recent_posts = get_posts(array(
                            'numberposts' => 3,
                            'post_status' => 'publish'
                        ));

                        if ($recent_posts) :
                            foreach ($recent_posts as $post) :
                                setup_postdata($post);
                        ?>
                            <article class="news-item">
                                <div class="news-meta">
                                    <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                                </div>
                                <h4 class="news-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h4>
                                <p class="news-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            </article>
                        <?php 
                            endforeach;
                            wp_reset_postdata();
                        else :
                            // Fallback news items
                            $fallback_news = array(
                                array('title' => 'New Laboratory Equipment Installed', 'date' => date('F j, Y'), 'excerpt' => 'State-of-the-art equipment enhances our research capabilities and student learning experience.'),
                                array('title' => 'Student Research Project Wins National Award', 'date' => date('F j, Y', strtotime('-1 week')), 'excerpt' => 'Our students continue to excel in national competitions and research initiatives.'),
                                array('title' => 'Industry Partnership Announcement', 'date' => date('F j, Y', strtotime('-2 weeks')), 'excerpt' => 'New partnerships provide enhanced internship and career opportunities for our students.'),
                            );
                            
                            foreach ($fallback_news as $news) :
                        ?>
                            <article class="news-item">
                                <div class="news-meta">
                                    <time><?php echo esc_html($news['date']); ?></time>
                                </div>
                                <h4 class="news-title"><?php echo esc_html($news['title']); ?></h4>
                                <p class="news-excerpt"><?php echo esc_html($news['excerpt']); ?></p>
                            </article>
                        <?php endforeach; endif; ?>
                        
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('news-events'))); ?>" class="btn btn-secondary">
                            <?php _e('View All News', 'ngist-theme'); ?>
                        </a>
                    </div>

                    <!-- Upcoming Events -->
                    <div class="events-section" data-aos="fade-left">
                        <h3 class="subsection-title"><?php _e('Upcoming Events', 'ngist-theme'); ?></h3>
                        
                        <?php
                        $events = get_posts(array(
                            'post_type' => 'event',
                            'numberposts' => 3,
                            'post_status' => 'publish',
                            'meta_key' => '_event_date',
                            'orderby' => 'meta_value',
                            'order' => 'ASC'
                        ));

                        if ($events) :
                            foreach ($events as $event) :
                                $event_date = get_post_meta($event->ID, '_event_date', true);
                                $event_time = get_post_meta($event->ID, '_event_time', true);
                                $event_location = get_post_meta($event->ID, '_event_location', true);
                        ?>
                            <article class="event-item">
                                <div class="event-date">
                                    <?php if ($event_date) : ?>
                                        <div class="date-day"><?php echo date('d', strtotime($event_date)); ?></div>
                                        <div class="date-month"><?php echo date('M', strtotime($event_date)); ?></div>
                                    <?php endif; ?>
                                </div>
                                <div class="event-details">
                                    <h4 class="event-title">
                                        <a href="<?php echo get_permalink($event->ID); ?>">
                                            <?php echo get_the_title($event->ID); ?>
                                        </a>
                                    </h4>
                                    <?php if ($event_time) : ?>
                                        <div class="event-time">
                                            <i class="fas fa-clock"></i>
                                            <?php echo esc_html($event_time); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($event_location) : ?>
                                        <div class="event-location">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <?php echo esc_html($event_location); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </article>
                        <?php 
                            endforeach;
                        else :
                            // Fallback events
                            $fallback_events = array(
                                array('title' => 'Open House Day', 'date' => date('Y-m-d', strtotime('+1 week')), 'time' => '10:00 AM', 'location' => 'Main Campus'),
                                array('title' => 'Science Fair 2024', 'date' => date('Y-m-d', strtotime('+2 weeks')), 'time' => '9:00 AM', 'location' => 'Exhibition Hall'),
                                array('title' => 'Career Development Workshop', 'date' => date('Y-m-d', strtotime('+3 weeks')), 'time' => '2:00 PM', 'location' => 'Conference Room'),
                            );
                            
                            foreach ($fallback_events as $event) :
                        ?>
                            <article class="event-item">
                                <div class="event-date">
                                    <div class="date-day"><?php echo date('d', strtotime($event['date'])); ?></div>
                                    <div class="date-month"><?php echo date('M', strtotime($event['date'])); ?></div>
                                </div>
                                <div class="event-details">
                                    <h4 class="event-title"><?php echo esc_html($event['title']); ?></h4>
                                    <div class="event-time">
                                        <i class="fas fa-clock"></i>
                                        <?php echo esc_html($event['time']); ?>
                                    </div>
                                    <div class="event-location">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <?php echo esc_html($event['location']); ?>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; endif; ?>
                        
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('news-events'))); ?>" class="btn btn-secondary">
                            <?php _e('View All Events', 'ngist-theme'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section section bg-primary text-center" data-aos="fade-up">
            <div class="container">
                <h2 class="cta-title font-display text-white"><?php _e('Ready to Start Your Journey?', 'ngist-theme'); ?></h2>
                <p class="cta-subtitle text-white"><?php _e('Join thousands of students who have transformed their careers through our world-class STEM education programs.', 'ngist-theme'); ?></p>
                <div class="cta-actions">
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('admissions'))); ?>" class="btn btn-secondary">
                        <?php _e('Apply Now', 'ngist-theme'); ?>
                    </a>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-outline-white">
                        <?php _e('Contact Us', 'ngist-theme'); ?>
                    </a>
                </div>
            </div>
        </section>

    <?php else : ?>
        <!-- Blog/Archive Content -->
        <div class="container">
            <div class="content-area">
                <?php if (have_posts()) : ?>
                    <header class="page-header">
                        <?php
                        the_archive_title('<h1 class="page-title">', '</h1>');
                        the_archive_description('<div class="archive-description">', '</div>');
                        ?>
                    </header>

                    <div class="posts-grid grid grid-2">
                        <?php while (have_posts()) : the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class('post-card card'); ?>>
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('card-image', array('class' => 'card-image')); ?>
                                    </a>
                                <?php endif; ?>
                                
                                <div class="card-content">
                                    <div class="post-meta">
                                        <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                                        <span class="post-author"><?php _e('by', 'ngist-theme'); ?> <?php the_author(); ?></span>
                                    </div>
                                    
                                    <h2 class="card-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                    
                                    <div class="card-excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>
                                    
                                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">
                                        <?php _e('Read More', 'ngist-theme'); ?>
                                    </a>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    </div>

                    <?php the_posts_navigation(); ?>

                <?php else : ?>
                    <div class="no-posts">
                        <h1><?php _e('Nothing here', 'ngist-theme'); ?></h1>
                        <p><?php _e('It looks like nothing was found at this location. Maybe try a search?', 'ngist-theme'); ?></p>
                        <?php get_search_form(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

</main>

<?php
get_footer();
?>