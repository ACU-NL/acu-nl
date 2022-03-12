<?php /* Template Name: Food */ ?>

<?php get_header(); ?>
    <main>
        <div id="FoodWrap">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <section id="FoodIntro" style="background-image:url('<?php the_field('food_intro_background'); ?>');">
                <div id="FoodIntroHeader">
                    <h1><?php the_field('food_headline'); ?></h1>
                </div>
                <div id="FoodIntroContent">
                    <?php the_field('food_intro_text'); ?>
                </div>
            </section>
            <section id="FoodEntries">
            <?php if( get_field('projects_number')  == '1' || get_field('projects_number') == '2' || get_field('projects_number') == '3' || get_field('projects_number') == '4' || get_field('projects_number') == '5' ): ?>
                <?php if( have_rows('food_project_1') ): while( have_rows('food_project_1') ) : the_row(); ?>
                    <section class="FoodEntry">
                        <div class="FoodEntryImage">
                            <img src="<?php the_sub_field('food_project_1_image'); ?>" />
                        </div>
                        <div class="FoodEntryContent">
                            <h2><?php the_sub_field('food_project_1_headline'); ?></h2>
                            <?php the_sub_field('food_project_1_text'); ?>
                            <?php if( get_sub_field('food_project_1_link_url')): ?>
                                <a href="<?php the_sub_field('food_project_1_link_url'); ?>" target="_blank" title="<?php the_sub_field('food_project_1_link_title'); ?>"><?php the_sub_field('food_project_1_link_title'); ?></a>
                            <?php endif; ?>
                        </div>
                    </section>
                <?php endwhile; endif; ?>
            <?php endif; ?>
            <?php if( get_field('projects_number') == '2' || get_field('projects_number') == '3' || get_field('projects_number') == '4' || get_field('projects_number') == '5' ): ?>
                <?php if( have_rows('food_project_2') ): while( have_rows('food_project_2') ) : the_row(); ?>
                    <section class="FoodEntry">
                        <div class="FoodEntryImage">
                            <img src="<?php the_sub_field('food_project_2_image'); ?>" />
                        </div>
                        <div class="FoodEntryContent">
                            <h2><?php the_sub_field('food_project_2_headline'); ?></h2>
                            <?php the_sub_field('food_project_2_text'); ?>
                            <?php if( get_sub_field('food_project_2_link_url')): ?>
                                <a href="<?php the_sub_field('food_project_2_link_url'); ?>" target="_blank" title="<?php the_sub_field('food_project_2_link_title'); ?>"><?php the_sub_field('food_project_2_link_title'); ?></a>
                            <?php endif; ?>
                        </div>
                    </section>
                <?php endwhile; endif; ?>
            <?php endif; ?>
            <?php if( get_field('projects_number') == '3' || get_field('projects_number') == '4' || get_field('projects_number') == '5' ): ?>
                <?php if( have_rows('food_project_3') ): while( have_rows('food_project_3') ) : the_row(); ?>
                    <section class="FoodEntry">
                        <div class="FoodEntryImage">
                            <img src="<?php the_sub_field('food_project_3_image'); ?>" />
                        </div>
                        <div class="FoodEntryContent">
                            <h2><?php the_sub_field('food_project_3_headline'); ?></h2>
                            <?php the_sub_field('food_project_3_text'); ?>
                            <?php if( get_sub_field('food_project_3_link_url')): ?>
                                <a href="<?php the_sub_field('food_project_3_link_url'); ?>" target="_blank" title="<?php the_sub_field('food_project_3_link_title'); ?>"><?php the_sub_field('food_project_3_link_title'); ?></a>
                            <?php endif; ?>
                        </div>
                    </section>
                <?php endwhile; endif; ?>
            <?php endif; ?>
            <?php if( get_field('projects_number') == '4' || get_field('projects_number') == '5' ): ?>
                <?php if( have_rows('food_project_4') ): while( have_rows('food_project_4') ) : the_row(); ?>
                    <section class="FoodEntry">
                        <div class="FoodEntryImage">
                            <img src="<?php the_sub_field('food_project_4_image'); ?>" />
                        </div>
                        <div class="FoodEntryContent">
                            <h2><?php the_sub_field('food_project_4_headline'); ?></h2>
                            <?php the_sub_field('food_project_4_text'); ?>
                            <?php if( get_sub_field('food_project_4_link_url')): ?>
                                <a href="<?php the_sub_field('food_project_4_link_url'); ?>" target="_blank" title="<?php the_sub_field('food_project_4_link_title'); ?>"><?php the_sub_field('food_project_4_link_title'); ?></a>
                            <?php endif; ?>
                        </div>
                    </section>
                <?php endwhile; endif; ?>
            <?php endif; ?>
            <?php if( get_field('projects_number') == '5' ): ?>
                <?php if( have_rows('food_project_5') ): while( have_rows('food_project_5') ) : the_row(); ?>
                    <section class="FoodEntry">
                        <div class="FoodEntryImage">
                            <img src="<?php the_sub_field('food_project_5_image'); ?>" />
                        </div>
                        <div class="FoodEntryContent">
                            <h2><?php the_sub_field('food_project_5_headline'); ?></h2>
                            <?php the_sub_field('food_project_5_text'); ?>
                            <?php if( get_sub_field('food_project_5_link_url')): ?>
                                <a href="<?php the_sub_field('food_project_5_link_url'); ?>" target="_blank" title="<?php the_sub_field('food_project_5_link_title'); ?>"><?php the_sub_field('food_project_5_link_title'); ?></a>
                            <?php endif; ?>
                        </div>
                    </section>
                <?php endwhile; endif; ?>
            <?php endif; ?>
            </section>
        <?php endwhile; else : ?>
        <?php endif; ?>
            <section id="FoodMain">
                <section id="GeneralInfo">
                    <?php get_template_part( 'openingtimes', 'page' ); ?>
                </section>
                <section id="FoodAgendaWrap">
                    <h3>Our delicious events</h3>
                    <ul id="Agenda">
                    <?php
                    $todays_date = current_time('Ymd'); 
                    $args = array(
                        'post_status'	=>		'publish',
                        'post_type'     =>      'event',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'event-categories',
                                'field' => 'name',
                                'terms' => 'Food',
                            )
                        ),
                        'posts_per_page' => 100,
                        'meta_query' => array(
                            'relation' => 'AND',
                            'date_clause' => array(
                                'key' => 'event_date',
                                'compare' => '>=',
                                'value' => $todays_date,
                            ),
                            'time_clause' => array(
                                'key' => 'starting_time',
                                'compare' => 'EXISTS',
                            ),
                        ),
                        'orderby' => array(
                            'date_clause' => 'ASC',
                            'main_clause' => 'DESC',
                            'time_clause' => 'ASC',
                        )
                    );
                    $agenda_query = new WP_Query( $args ); ?>
                    <?php if ( $agenda_query->have_posts() ) : while ( $agenda_query->have_posts() ) : $agenda_query->the_post(); ?>
                        <li class="AgendaEntry">
                            <a href="<?php the_permalink(); ?>" title="Check the details of: “<?php the_title(); ?>”">
                                <div class="AgendaDate">
                                    <span class="AgendaWeekday"><?php $date = get_field('event_date', false, false); $date = new DateTime($date); ?><?php echo $date->format('l'); ?></span>
                                    <span class="AgendaMonth"><?php $date = get_field('event_date', false, false); $date = new DateTime($date); ?><?php echo $date->format('F'); ?></span>
                                    <span class="AgendaDay"><?php $date = get_field('event_date', false, false); $date = new DateTime($date); ?><?php echo $date->format('jS'); ?></span>
                                </div>
                                <div class="AgendaTitle">
                                    <h2 class="overflowing"><?php the_title(); ?></h2>
                                    <h3 class="overflowing"><?php the_field('subtitle'); ?></h3>
                                </div>
                                <ul class="AgendaDetails">
                                    <?php if( get_field('time_door_opens') ): ?><li><span>Door:</span><span class="AgendaDetail"><?php the_field('time_door_opens'); ?></span></li><?php endif; ?>
                                    <li><span>Start:</span><span class="AgendaDetail"><?php the_field('starting_time'); ?></span></li>
                                    <?php if( get_field('price') == 'free' ): ?><li><span class="AgendaDetail">It’s Free!</span></li><?php endif; ?><?php if( get_field('price') == 'donation' ): ?><li><span class="AgendaDetail">Donation based</span></li><?php endif; ?><?php if( get_field('price') == 'menuprice' ): ?><li><span class="AgendaDetail"><?php if( have_rows('menu_entries') ): while( have_rows('menu_entries') ) : the_row(); ?><?php if( get_sub_field('course_6_title') ): ?>Six courses<?php elseif( get_sub_field('course_5_title') ): ?>Five courses<?php elseif( get_sub_field('course_4_title') ): ?>Four courses<?php elseif( get_sub_field('course_3_title') ): ?>Three courses<?php elseif( get_sub_field('course_2_title') ): ?>Two courses<?php else: ?>One course<?php endif; ?> for &euro; <?php the_field('price_for_full_menu'); ?><?php endwhile; endif; ?></span></li><?php endif; ?><?php if( get_field('price') == 'entrancefee' ): ?><li><span>Entry:</span><span class="AgendaDetail">&euro; <?php the_field('entrance_fee'); ?></span></li><?php endif; ?><?php if( get_field('price') == 'variablefee' ): ?><?php if( have_rows('variable_entrance_fee') ): while( have_rows('variable_entrance_fee') ) : the_row(); ?><li><span>Entry:</span><span class="AgendaDetail">&euro; <?php the_sub_field('from_fee'); ?> / <?php the_sub_field('to_fee'); ?></span></li><?php endwhile; endif; ?><?php if( get_field('price') == 'variablefee' ): ?><?php if( have_rows('variable_price') ): while( have_rows('variable_price') ) : the_row(); ?><li><span>From:</span><span class="AgendaDetail">&euro; <?php the_sub_field('from_fee'); ?></span></li><?php endwhile; endif; ?><?php endif; ?><?php endif; ?><?php if( get_field('price') == 'omit' ): ?><?php endif; ?>
                                </ul>
                                <?php if( get_field('event_is_cancelled') ): ?><div class="CancelledEvent"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cancelled-1.svg" /><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cancelled-2.svg" /><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cancelled-3.svg" class="NoMobileSmall" /></div><?php endif; ?>
                            </a>
                        </li>
                        <?php endwhile; wp_reset_postdata(); ?>
                        <?php else: ?>
                            <li class="AgendaEntry">
                                <p>&nbsp;</p>
                                <h2>There’s nothing here!</h2>
                                <p>Somebody should probably check that out I guess...</p>
                                <p>This can only happen when there’s <em>literally</em> nothing on the program.
                                <br>Or when somebody f*cked shit up big time!</p>
                                <p>Anyway, you could try using that button down here, but if you don’t see anything here, that probably won’t work either.</p>
                                <p><em><small>Such a shame that that weird blond guy spend so much time on building this website and now it’s broken. Or not in use.</small></em></p>
                                <p>&nbsp;</p>
                            </li>
                        <?php endif; ?>
                        </ul>
                </section>
            </section>
        </div>
    </main>
<?php get_footer(); ?>