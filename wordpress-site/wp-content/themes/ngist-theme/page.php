<?php
/**
 * The template for displaying all pages
 *
 * @package NGIST_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('page-content'); ?>>
                <header class="page-header">
                    <h1 class="page-title font-display"><?php the_title(); ?></h1>
                    <?php if (has_excerpt()) : ?>
                        <div class="page-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    <?php endif; ?>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="page-featured-image">
                        <?php the_post_thumbnail('large', array('class' => 'featured-image')); ?>
                    </div>
                <?php endif; ?>

                <div class="page-content-wrapper">
                    <div class="page-main-content">
                        <?php the_content(); ?>
                        
                        <?php
                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'ngist-theme'),
                            'after'  => '</div>',
                        ));
                        ?>
                    </div>

                    <?php if (is_active_sidebar('sidebar-1')) : ?>
                        <aside class="page-sidebar">
                            <?php dynamic_sidebar('sidebar-1'); ?>
                        </aside>
                    <?php endif; ?>
                </div>

                <?php if (comments_open() || get_comments_number()) : ?>
                    <div class="page-comments">
                        <?php comments_template(); ?>
                    </div>
                <?php endif; ?>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<style>
.page-content {
    padding: 2rem 0;
}

.page-header {
    text-align: center;
    margin-bottom: 3rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid var(--gray-200);
}

.page-title {
    font-size: 3rem;
    color: var(--text-dark);
    margin-bottom: 1rem;
}

.page-excerpt {
    font-size: 1.25rem;
    color: var(--text-light);
    max-width: 800px;
    margin: 0 auto;
    line-height: 1.6;
}

.page-featured-image {
    margin-bottom: 3rem;
    text-align: center;
}

.featured-image {
    max-width: 100%;
    height: auto;
    border-radius: 1rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.page-content-wrapper {
    display: grid;
    grid-template-columns: 1fr 300px;
    gap: 3rem;
    align-items: start;
}

.page-main-content {
    font-size: 1.125rem;
    line-height: 1.8;
    color: var(--text-dark);
}

.page-main-content h2,
.page-main-content h3,
.page-main-content h4 {
    color: var(--text-dark);
    margin-top: 2rem;
    margin-bottom: 1rem;
}

.page-main-content p {
    margin-bottom: 1.5rem;
}

.page-main-content ul,
.page-main-content ol {
    margin-bottom: 1.5rem;
    padding-left: 2rem;
}

.page-main-content li {
    margin-bottom: 0.5rem;
}

.page-main-content blockquote {
    border-left: 4px solid var(--primary-blue);
    padding-left: 2rem;
    margin: 2rem 0;
    font-style: italic;
    font-size: 1.25rem;
    color: var(--text-light);
}

.page-sidebar {
    background: var(--bg-light);
    padding: 2rem;
    border-radius: 1rem;
    height: fit-content;
    position: sticky;
    top: 100px;
}

.page-sidebar .widget {
    margin-bottom: 2rem;
}

.page-sidebar .widget:last-child {
    margin-bottom: 0;
}

.page-sidebar .widget-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--text-dark);
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid var(--primary-blue);
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

.page-comments {
    margin-top: 3rem;
    padding-top: 3rem;
    border-top: 1px solid var(--gray-200);
}

@media (max-width: 768px) {
    .page-title {
        font-size: 2rem;
    }
    
    .page-excerpt {
        font-size: 1.125rem;
    }
    
    .page-content-wrapper {
        grid-template-columns: 1fr;
        gap: 2rem;
    }
    
    .page-sidebar {
        position: static;
    }
    
    .page-main-content {
        font-size: 1rem;
    }
}
</style>

<?php
get_footer();
?>