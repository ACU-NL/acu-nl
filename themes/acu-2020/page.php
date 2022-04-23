<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <main>
        <div id="PageWrap">
            <section id="PageIntro" <?php if( get_field('page_header_image') ): ?>style="background-image:url('<?php the_field('page_header_image'); ?>');"<?php endif; ?>>
                <div id="PageIntroContent">
                    <h1><?php the_title(); ?></h1>
                    <?php the_field('page_intro_text'); ?>
                </div>
            </section>
            <section id="PageMain">
                <div id="PageMainContent">
                    <?php the_content(); ?>
                </div>
				<?php if( get_field ('add_form') ) : ?>
					<?php echo do_shortcode( get_field('add_form') ); ?>
				<?php endif; ?>
            </section>
        </div>
    </main>
<?php endwhile; else : ?>
    <main>
        <div id="PageWrap">
            <section id="PageIntro">
                <div id="PageIntroHeader">
                </div>
                <div id="PageIntroContent">
                    <h1>Something is not right...</h1>
                    <p>Somehow, the thing you were looking for got lost.</p>
                    <p>This is not the regular 404 page either, so it must be something in the system. Probably. Heck, I don’t know, I’m just an error message!</p>
                </div>
            </section>
            <section id="PageMain">
                <div id="PageMainContent">
                    <p>So, yeah. I kind of don’t know what else to tell you.</p>
                    <p>Oh, pressing the back button is always a good idea! Or pressing refresh. Or going back to the <a href="/">home page</a>.</p>
                    <p>By the way, if you also feel like you shouldn’t be seeing this, because there definitely should be something here, drop us a line on the <a href="/">contact page</a>.</p>
                </div>
            </section>
        </div>
    </main>
<?php endif; ?>
<?php get_footer(); ?>