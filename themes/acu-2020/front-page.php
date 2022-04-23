<?php get_header(); ?>
<?php $values = get_field('set_panic_mode');
    if(in_array("panic", $values )){
        if( have_rows('panic_mode_settings') ): while( have_rows('panic_mode_settings') ) : the_row();
            echo "<div style='width:100%;max-width:960px;margin:0 auto;box-sizing:border-box;padding:30px;'>" . the_sub_field('panic_content') . "</div>";
        endwhile;
    endif; 
    }
    ?>
    <main <?php $values = get_field('set_panic_mode'); if(in_array("panic", $values )){
        if( have_rows('panic_mode_settings') ): while( have_rows('panic_mode_settings') ) : the_row(); ?> style="display:none;"<?php endwhile; endif; } ?>>
        <div id="HomeWrap">
            <?php
                $todays_date = current_time('Ymd'); 
                $args = array(
                    'post_status'	=>		'publish',
                    'post_type'     =>      'event',
                    'posts_per_page' => 1,
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
                        'main_clause' => array(
                            'key' => 'is_main_event',
                            'compare' => '>=',
                        ),
                    ),
                    'orderby' => array(
                        'date_clause' => 'ASC',
                        'main_clause' => 'DESC',
                        'time_clause' => 'ASC',
                    )
                );
                $nextup_query = new WP_Query( $args ); ?>
                <?php if ( $nextup_query->have_posts() ) : while ( $nextup_query->have_posts() ) : $nextup_query->the_post(); ?>
                <section id="NextUp">
                    <div id="NextUpImage">
                        <?php if( get_field('event_picture') ): ?><img src="<?php the_field('event_picture'); ?>" /><?php endif; ?>
                    </div>
                    <div id="NextUpContent">
                        <div id="NextUpContentWrapper">
                            <h6><time datetime="<?php $date = get_field('event_date', false, false); $date = new DateTime($date); ?><?php echo $date->format('l, F jS'); ?> <?php the_field('starting_time'); ?>"><?php $date = get_field('event_date', false, false); $date = new DateTime($date); ?><?php echo $date->format('l, F jS'); ?></h6>
                            <h2><?php the_title(); ?></h2>
                            <h3><?php the_field('subtitle'); ?></h3>
                            <?php the_excerpt(); ?>
                        </div>
                        <div id="Dissolve"></div>
                        <div id="NextUpDetails">
                            <ul>
                                <?php if( get_field('time_door_opens') ): ?><li><span>Door:</span><span class="NextUpDetail"><?php the_field('time_door_opens'); ?></span></li><?php endif; ?>
                                <li><span>Start:</span><span class="NextUpDetail"><?php the_field('starting_time'); ?></span></li>
                                <?php if( get_field('price') == 'free' ): ?><li><span class="NextUpDetail">Free entry</span></li><?php endif; ?><?php if( get_field('price') == 'donation' ): ?><li><span class="NextUpDetail">Donation based</span></li><?php endif; ?><?php if( get_field('price') == 'menuprice' ): ?><li><span class="NextUpDetail"><?php if( have_rows('menu_entries') ): while( have_rows('menu_entries') ) : the_row(); ?><?php if( get_sub_field('course_6_title') ): ?>Six courses<?php elseif( get_sub_field('course_5_title') ): ?>Five courses<?php elseif( get_sub_field('course_4_title') ): ?>Four courses<?php elseif( get_sub_field('course_3_title') ): ?>Three courses<?php elseif( get_sub_field('course_2_title') ): ?>Two courses<?php else: ?>One course<?php endif; ?> for &euro; <?php the_field('price_for_full_menu'); ?><?php endwhile; endif; ?></span></li><?php endif; ?><?php if( get_field('price') == 'entrancefee' ): ?><li><span>Entry:</span><span class="NextUpDetail">&euro; <?php the_field('entrance_fee'); ?></span></li><?php endif; ?><?php if( get_field('price') == 'variablefee' ): ?><?php if( have_rows('variable_entrance_fee') ): while( have_rows('variable_entrance_fee') ) : the_row(); ?><li><span>Entry:</span><span class="NextUpDetail">&euro; <?php the_sub_field('from_fee'); ?>/<?php the_sub_field('to_fee'); ?></span></li><?php endwhile; endif; ?><?php if( get_field('price') == 'variablefee' ): ?><?php if( have_rows('variable_price') ): while( have_rows('variable_price') ) : the_row(); ?><li><span>From:</span><span class="NextUpDetail">&euro; <?php the_sub_field('from_fee'); ?></span></li><?php endwhile; endif; ?><?php endif; ?><?php endif; ?><?php if( get_field('price') == 'omit' ): ?><?php endif; ?>
                            </ul>
                            <a href="<?php the_permalink(); ?>" title="Check the details of: “<?php the_title(); ?>”" class="Button NextUpButton">More info</a>
                        </div>
                    </div>
                    <?php if( get_field('event_is_cancelled') ): ?><div class="CancelledEvent"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cancelled-1.svg" /><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cancelled-2.svg" /><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cancelled-3.svg" class="NoMobileSmall" /></div><?php endif; ?>
                </section>                  
                <?php endwhile; wp_reset_postdata(); ?>
            <?php else: ?>  
            <?php endif; ?>
            <section id="HomeMain">
                <section id="GeneralInfo">
                    <?php get_template_part( 'openingtimes', 'page' ); ?>
                </section>
                <section id="HomeAgendaWrap">
                    <h3>Next on the agenda</h3>
                    <ul id="Agenda">
                    <?php
                    $todays_date = current_time('Ymd'); 
                    $args = array(
                        'post_status'	=>		'publish',
                        'post_type'     =>      'event',
                        'posts_per_page' => 4,
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
                                    <?php if( get_field('price') == 'free' ): ?><li><span class="AgendaDetail">It’s Free!</span></li><?php endif; ?><?php if( get_field('price') == 'donation' ): ?><li><span class="AgendaDetail">Donation based</span></li><?php endif; ?><?php if( get_field('price') == 'menuprice' ): ?><li><span class="AgendaDetail"><?php if( have_rows('menu_entries') ): while( have_rows('menu_entries') ) : the_row(); ?><?php if( get_sub_field('course_6_title') ): ?>Six courses<?php elseif( get_sub_field('course_5_title') ): ?>Five courses<?php elseif( get_sub_field('course_4_title') ): ?>Four courses<?php elseif( get_sub_field('course_3_title') ): ?>Three courses<?php elseif( get_sub_field('course_2_title') ): ?>Two courses<?php else: ?>One course<?php endif; ?> for &euro; <?php the_field('price_for_full_menu'); ?><?php endwhile; endif; ?></span></li><?php endif; ?><?php if( get_field('price') == 'entrancefee' ): ?><li><span>Entry:</span><span class="AgendaDetail">&euro; <?php the_field('entrance_fee'); ?></span></li><?php endif; ?><?php if( get_field('price') == 'variablefee' ): ?><?php if( have_rows('variable_entrance_fee') ): while( have_rows('variable_entrance_fee') ) : the_row(); ?><li><span>Entry:</span><span class="AgendaDetail">&euro; <?php the_sub_field('from_fee'); ?>/<?php the_sub_field('to_fee'); ?></span></li><?php endwhile; endif; ?><?php if( get_field('price') == 'variablefee' ): ?><?php if( have_rows('variable_price') ): while( have_rows('variable_price') ) : the_row(); ?><li><span>From:</span><span class="AgendaDetail">&euro; <?php the_sub_field('from_fee'); ?></span></li><?php endwhile; endif; ?><?php endif; ?><?php endif; ?><?php if( get_field('price') == 'omit' ): ?><?php endif; ?>
                                </ul>
                                <?php if( get_field('event_is_cancelled') ): ?><div class="CancelledEvent"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cancelled-1.svg" /><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cancelled-2.svg" /><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cancelled-3.svg" class="NoMobileSmall" /></div><?php endif; ?>
                            </a>
                        </li>
                        <?php endwhile; wp_reset_postdata(); ?>
                        <?php else: ?>
                            <p>&nbsp;</p>
                            <h2>There’s nothing here!</h2>
                            <p>It appears that the Agenda is empty.</p>
                            <p>You can check out the Agenda page to see if there’s something there, but that one will probably be empty as well...</p>
                            <p><em>Sorry!</em></p>
                        <?php endif; ?>
                        <a href="/agenda/" class="Button HomeAgendaFull">View full agenda</a>
                    </ul>
                </section>
                <?php get_template_part( 'homefreespace', 'page' ); ?>
                <?php get_template_part( 'homefoodart', 'page' ); ?>
                <?php get_template_part( 'homestory', 'page' ); ?>
            </section>
        </div>
    </main>
<?php get_footer(); ?>