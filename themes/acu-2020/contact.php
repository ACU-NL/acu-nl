<?php /* Template Name: Contact */ ?>

<?php get_header(); ?>
<main>
        <div id="ContactWrap">
            <section id="ContactIntro" <?php if( get_field('contact_intro_background') ): ?>style="background-image:url('<?php the_field('contact_intro_background'); ?>');"<?php endif; ?>>
                <?php $values = get_field('show_contact_navigation'); if(in_array("show", $values )){ ?>
                    <ul id="PageNavigation">
                        <?php wp_nav_menu(
							array(
									'theme_location' => 'contactnav',
                                    'container' => false,
                                    'items_wrap'    => '%3$s'
								)
							);
                        ?>
                    </ul>
                <?php } ?>
                <div id="ContactIntroHeader">
                </div>
                <div id="ContactIntroContent">
                    <h1>Contact</h1>
                    <?php the_field('contact_intro'); ?>
                </div>
            </section>
            <section id="ContactMain">
                <section id="ContactMainContent">
                    <h2>Location</h2>
                    <?php the_field('location'); ?>
                    <div id="ContactAddresses">
                        <div>
                            <h2>Address</h2>
                            <p>Voorstraat 71
                            <br>3512 AK&emsp;Utrecht
                            <br>The Netherlands</p>
                            <p>Phone: +31 (0)30 - 231 45 90</p>
                        </div>
                        <div>
                            <h2>Email addresses</h2>
                            <p>General email address: <a href="mailto:info@acu.nl">info@acu.nl</a><br>
                                Volunteers: <a href="mailto:help@acu.nl">help@acu.nl</a><br>
                                Bookings: <a href="mailto:bookings@acu.nl">bookings@acu.nl</a><br>
                                Kitchen: <a href="mailto:kitchen@acu.nl">kitchen@acu.nl</a></p>
                        </div>
                    </div>
                </section>
                <section id="GeneralInfo">
                    <?php get_template_part( 'openingtimes', 'page' ); ?>
                </section>
                <section id="ContactMap">
                    <?php echo do_shortcode( '[wp_mapbox_gl_js map_id="1776" height="500px"]' ); ?>
                </section>
                
                <?php $values = get_field('show_contact_form'); if(in_array("show", $values )){ ?>
                    <section id="ContactForm">
                        <?php echo do_shortcode( '[contact-form-7 id="396" title="Contact Form"]' ); ?>
                    </section>
                <?php } ?>
            </section>
        </div>
    </main>
<?php get_footer(); ?>