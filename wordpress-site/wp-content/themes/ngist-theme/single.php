<?php
/**
 * The template for displaying all single posts
 *
 * @package NGIST_Theme
 */

get_header();
?>

<main id="primary" class="site-main single-post">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('post-content'); ?>>
                <header class="post-header">
                    <div class="post-meta">
                        <time datetime="<?php echo get_the_date('c'); ?>" class="post-date">
                            <i class="fas fa-calendar"></i>
                            <?php echo get_the_date(); ?>
                        </time>
                        <span class="post-author">
                            <i class="fas fa-user"></i>
                            <?php _e('by', 'ngist-theme'); ?> <?php the_author(); ?>
                        </span>
                        <?php if (has_category()) : ?>
                            <span class="post-categories">
                                <i class="fas fa-folder"></i>
                                <?php the_category(', '); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                    
                    <h1 class="post-title font-display"><?php the_title(); ?></h1>
                    
                    <?php if (has_excerpt()) : ?>
                        <div class="post-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    <?php endif; ?>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-featured-image">
                        <?php the_post_thumbnail('large', array('class' => 'featured-image')); ?>
                    </div>
                <?php endif; ?>

                <div class="post-content-wrapper">
                    <div class="post-main-content">
                        <?php the_content(); ?>
                        
                        <?php
                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'ngist-theme'),
                            'after'  => '</div>',
                        ));
                        ?>
                        
                        <?php if (has_tag()) : ?>
                            <div class="post-tags">
                                <h4><?php _e('Tags:', 'ngist-theme'); ?></h4>
                                <?php the_tags('<span class="tag">', '</span><span class="tag">', '</span>'); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if (is_active_sidebar('sidebar-1')) : ?>
                        <aside class="post-sidebar">
                            <?php dynamic_sidebar('sidebar-1'); ?>
                        </aside>
                    <?php endif; ?>
                </div>

                <footer class="post-footer">
                    <div class="post-navigation">
                        <?php
                        $prev_post = get_previous_post();
                        $next_post = get_next_post();
                        ?>
                        
                        <?php if ($prev_post) : ?>
                            <div class="nav-previous">
                                <a href="<?php echo get_permalink($prev_post->ID); ?>" class="nav-link">
                                    <i class="fas fa-arrow-left"></i>
                                    <div class="nav-content">
                                        <span class="nav-label"><?php _e('Previous Post', 'ngist-theme'); ?></span>
                                        <span class="nav-title"><?php echo get_the_title($prev_post->ID); ?></span>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($next_post) : ?>
                            <div class="nav-next">
                                <a href="<?php echo get_permalink($next_post->ID); ?>" class="nav-link">
                                    <div class="nav-content">
                                        <span class="nav-label"><?php _e('Next Post', 'ngist-theme'); ?></span>
                                        <span class="nav-title"><?php echo get_the_title($next_post->ID); ?></span>
                                    </div>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </footer>

                <?php if (comments_open() || get_comments_number()) : ?>
                    <div class="post-comments">
                        <?php comments_template(); ?>
                    </div>
                <?php endif; ?>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<style>
.single-post {
    padding: 2rem 0;
}

.post-content {
    max-width: 1000px;
    margin: 0 auto;
}

.post-header {
    text-align: center;
    margin-bottom: 3rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid var(--gray-200);
}

.post-meta {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 2rem;
    margin-bottom: 2rem;
    font-size: 0.875rem;
    color: var(--text-light);
}

.post-meta span {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.post-meta i {
    color: var(--accent-teal);
}

.post-meta a {
    color: var(--text-light);
    text-decoration: none;
    transition: color 0.3s ease;
}

.post-meta a:hover {
    color: var(--primary-blue);
}

.post-title {
    font-size: 3rem;
    color: var(--text-dark);
    margin-bottom: 1rem;
    line-height: 1.2;
}

.post-excerpt {
    font-size: 1.25rem;
    color: var(--text-light);
    max-width: 800px;
    margin: 0 auto;
    line-height: 1.6;
}

.post-featured-image {
    margin-bottom: 3rem;
    text-align: center;
}

.featured-image {
    max-width: 100%;
    height: auto;
    border-radius: 1rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.post-content-wrapper {
    display: grid;
    grid-template-columns: 1fr 300px;
    gap: 3rem;
    align-items: start;
}

.post-main-content {
    font-size: 1.125rem;
    line-height: 1.8;
    color: var(--text-dark);
}

.post-main-content h2,
.post-main-content h3,
.post-main-content h4 {
    color: var(--text-dark);
    margin-top: 2rem;
    margin-bottom: 1rem;
}

.post-main-content p {
    margin-bottom: 1.5rem;
}

.post-main-content ul,
.post-main-content ol {
    margin-bottom: 1.5rem;
    padding-left: 2rem;
}

.post-main-content li {
    margin-bottom: 0.5rem;
}

.post-main-content blockquote {
    border-left: 4px solid var(--primary-blue);
    padding-left: 2rem;
    margin: 2rem 0;
    font-style: italic;
    font-size: 1.25rem;
    color: var(--text-light);
}

.post-main-content img {
    max-width: 100%;
    height: auto;
    border-radius: 0.5rem;
    margin: 1rem 0;
}

.post-sidebar {
    background: var(--bg-light);
    padding: 2rem;
    border-radius: 1rem;
    height: fit-content;
    position: sticky;
    top: 100px;
}

.post-sidebar .widget {
    margin-bottom: 2rem;
}

.post-sidebar .widget:last-child {
    margin-bottom: 0;
}

.post-sidebar .widget-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid var(--primary-blue);
}

.post-tags {
    margin-top: 2rem;
    padding-top: 2rem;
    border-top: 1px solid var(--gray-200);
}

.post-tags h4 {
    font-size: 1rem;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 1rem;
}

.post-tags .tag {
    display: inline-block;
    background: var(--primary-blue);
    color: var(--white);
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.875rem;
    margin-right: 0.5rem;
    margin-bottom: 0.5rem;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.post-tags .tag:hover {
    background: var(--accent-teal);
}

.page-links {
    margin-top: 2rem;
    padding-top: 2rem;
    border-top: 1px solid var(--gray-200);
    text-align: center;
}

.page-links a {
    display: inline-block;
    padding: 0.5rem 1rem;
    margin: 0 0.25rem;
    background: var(--primary-blue);
    color: var(--white);
    text-decoration: none;
    border-radius: 0.375rem;
    transition: background-color 0.3s ease;
}

.page-links a:hover {
    background: var(--accent-teal);
}

.post-footer {
    margin-top: 3rem;
    padding-top: 3rem;
    border-top: 1px solid var(--gray-200);
}

.post-navigation {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2rem;
}

.nav-previous {
    text-align: left;
}

.nav-next {
    text-align: right;
}

.nav-link {
    display: flex;
    align-items: center;
    padding: 1.5rem;
    background: var(--bg-light);
    border-radius: 0.5rem;
    text-decoration: none;
    transition: all 0.3s ease;
    color: var(--text-dark);
}

.nav-link:hover {
    background: var(--primary-blue);
    color: var(--white);
    transform: translateY(-2px);
}

.nav-link i {
    font-size: 1.5rem;
    color: var(--accent-teal);
    transition: color 0.3s ease;
}

.nav-link:hover i {
    color: var(--white);
}

.nav-content {
    margin: 0 1rem;
}

.nav-label {
    display: block;
    font-size: 0.875rem;
    color: var(--text-light);
    margin-bottom: 0.25rem;
}

.nav-link:hover .nav-label {
    color: rgba(255, 255, 255, 0.8);
}

.nav-title {
    display: block;
    font-weight: 600;
    font-size: 1rem;
}

.post-comments {
    margin-top: 3rem;
    padding-top: 3rem;
    border-top: 1px solid var(--gray-200);
}

@media (max-width: 768px) {
    .post-title {
        font-size: 2rem;
    }
    
    .post-excerpt {
        font-size: 1.125rem;
    }
    
    .post-content-wrapper {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .post-sidebar {
        position: static;
    }
    
    .post-main-content {
        font-size: 1rem;
    }
    
    .post-meta {
        flex-direction: column;
        gap: 1rem;
    }
    
    .post-navigation {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .nav-next {
        text-align: left;
    }
    
    .nav-link {
        flex-direction: column;
        text-align: center;
    }
    
    .nav-content {
        margin: 1rem 0 0;
    }
}
</style>

<?php
get_footer();
?>