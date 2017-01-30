<?php
/**
 * The template for displaying the kasuistik quiz
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package KasuistikQuiz
 * @since 1.0
 * @version 1.0
 */
get_header();
?>

<div class="wrap">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php
            /* Start the Loop */
            while (have_posts()) : the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php
                        echo '<div class="entry-meta">';
                        twentyseventeen_posted_on();
                        echo '</div><!-- .entry-meta -->';

                        the_title('<h1 class="entry-title">', '</h1>');
                        ?>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <?php
                        echo get_field("mma_kq_beschreibung")
                        // echo do_shortcode ('[bright course="' . get_field("mma_kq_bright_id") . '" template="mm_full" locale="de-DE" description="' . get_field("mma_kq_kursbeschreibung") . '"][/bright]');
                        ?>
                    </div><!-- .entry-content -->

                    <div class="entry-footer">
                        <div class="column column-span-1 column-push-0 column-first">                        
                            <?php
                            // echo '<img src="' . plugin_dir_url( __FILE__ ) . 'resources/images/produktfortbildung_logo.jpg" alt="Logo Produktfortbildung">';
                            echo '<img src="' . plugin_dir_url('') . 'kasuistik-quiz/resources/images/produktfortbildung_logo.jpg" alt="Logo Produktfortbildung">';
                            ?>
                        </div>
                        <div class="column column-span-1 column-push-0 column-last">
                            <?php
                            $sponsorimgID = get_field("mma_kq_logo_sponsor");
                            echo '<img src="' . wp_get_attachment_image_src($sponsorimgID)[0] . '" srcset="' . wp_get_attachment_image_srcset($sponsorimgID) . '" alt="Logo Sponsor">';
                            ?>
                        </div>
                    </div><!-- .entry-footer -->

                </article><!-- #post-## -->
                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;

                the_post_navigation(array(
                    'prev_text' => '<span class="screen-reader-text">' . __('Previous Post', 'twentyseventeen') . '</span><span aria-hidden="true" class="nav-subtitle">' . __('Previous', 'twentyseventeen') . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg(array('icon' => 'arrow-left')) . '</span>%title</span>',
                    'next_text' => '<span class="screen-reader-text">' . __('Next Post', 'twentyseventeen') . '</span><span aria-hidden="true" class="nav-subtitle">' . __('Next', 'twentyseventeen') . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg(array('icon' => 'arrow-right')) . '</span></span>',
                ));

            endwhile; // End of the loop.
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->
    <?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php
get_footer();
