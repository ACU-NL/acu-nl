<?php get_header(); ?>

<main>
        <div id="PageWrap">
            <section id="PageIntro" style="">
                <div id="PageIntroContent">
                    <h1>News</h1>
                </div>
            </section>
            <section id="PageMain">
                <div id="Articles">
                    <?php

                        global $post;
                        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    
                        $args = array(
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'paged' => $paged
                        );
                        $custom_query = new WP_Query( $args );

                        $temp_query = $wp_query;
                        $wp_query = null;
                        $wp_query = $custom_query;

                        if ( $custom_query->have_posts() ):
                            while ( $custom_query->have_posts() ):
                                $custom_query->the_post();
                    ?>

                                <article id="post-<?php the_ID(); ?>">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                        <h2><?php the_title(); ?></h2>
                                        <p class="SinglePostDetails">Published on <?php echo get_the_date('F jS, Y'); ?></p>
                                        <?php the_field('page_intro_text'); ?>
                                    </a>
                                </article>

                            <?php endwhile; ?>
                            <?php endif; ?>
                            
                            <?php wp_reset_postdata(); ?>
                            <div id="ArticleNavigation">
                                <?php previous_posts_link('&#9664; Newer posts'); ?>
                                <div id="ArticleNavigationPrev"><?php next_posts_link('Older posts &#9654;', $custom_query->max_num_pages); ?></div>
                            </div>

                            <?php
                                $wp_query = NULL;
                                $wp_query = $temp_query;
                            ?>
                    
                </div>
            </section>
        </div>
    </main>

<?php get_footer(); ?>