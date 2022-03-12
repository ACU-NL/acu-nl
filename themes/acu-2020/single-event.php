<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <main>
        <div id="SingleEventWrap" class="<?php if (has_term('food', 'event-categories')) : ?>FoodEvent<?php endif; ?><?php $values = get_field('event_is_cancelled'); if(in_array("cancelled", $values )){ ?> SingleCancelledEvent<?php } ?>">  
            <section id="SingleEvent">
                <h1><?php the_title(); ?></h1>
                <h2><?php the_field('subtitle'); ?></h2>
                <div id="SingleEventImage">
                    <?php $values = get_field('event_is_cancelled'); if(in_array("cancelled", $values )){ ?><div class="CancelledEvent"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cancelled-1.svg" /><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cancelled-2.svg" /><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cancelled-3.svg" class="NoMobileSmall" /></div><?php } ?>
                    <?php if( get_field('event_picture') ): ?><img src="<?php the_field('event_picture'); ?>" id="SingleEventImageImage" /><?php endif; ?>
                </div>
                <div id="SingleEventContentWrap">
                    <div id="SingleEventDetails">
                        <p><?php $date = get_field('event_date', false, false); $date = new DateTime($date); ?><?php echo $date->format('l'); ?>, <?php $date = get_field('event_date', false, false); $date = new DateTime($date); ?><?php echo $date->format('F'); ?>&nbsp;<?php $date = get_field('event_date', false, false); $date = new DateTime($date); ?><?php echo $date->format('jS'); ?></p>
                        <ul>
                            <?php if( get_field('time_door_opens') ): ?><li><span>Door:</span><span class="SingleEventDetail"><?php the_field('time_door_opens'); ?></span></li><?php endif; ?>
                            <li><span>Start:</span><span class="SingleEventDetail"><?php the_field('starting_time'); ?></span></li>
                            <?php if( get_field('price') == 'free' ): ?><li><span class="SingleEventDetail">Free<?php if (has_term('food', 'event-categories')) : ?><span style="display:none;"><?php endif; ?> entry<?php if (has_term('food', 'event-categories')) : ?></span><?php endif; ?></span></li><?php endif; ?><?php if( get_field('price') == 'donation' ): ?><li><span class="SingleEventDetail">Donation based</span></li><?php endif; ?><?php if( get_field('price') == 'menuprice' ): ?><li><span class="SingleEventDetail"><?php if( have_rows('menu_entries') ): while( have_rows('menu_entries') ) : the_row(); ?><?php if( get_sub_field('course_6_title') ): ?>Six courses<?php elseif( get_sub_field('course_5_title') ): ?>Five courses<?php elseif( get_sub_field('course_4_title') ): ?>Four courses<?php elseif( get_sub_field('course_3_title') ): ?>Three courses<?php elseif( get_sub_field('course_2_title') ): ?>Two courses<?php else: ?>One course<?php endif; ?> for &euro; <?php the_field('price_for_full_menu'); ?><?php endwhile; endif; ?></span></li><?php endif; ?><?php if( get_field('price') == 'entrancefee' ): ?><li><span>Entry:</span><span class="SingleEventDetail">&euro; <?php the_field('entrance_fee'); ?></span></li><?php endif; ?><?php if( get_field('price') == 'variablefee' ): ?><?php if( have_rows('variable_entrance_fee') ): while( have_rows('variable_entrance_fee') ) : the_row(); ?><li><span>Entry:</span><span class="SingleEventDetail">&euro; <?php the_sub_field('from_fee'); ?> / <?php the_sub_field('to_fee'); ?></span></li><?php endwhile; endif; ?><?php if( get_field('price') == 'variablefee' ): ?><?php if( have_rows('variable_price') ): while( have_rows('variable_price') ) : the_row(); ?><li><span>From:</span><span class="SingleEventDetail">&euro; <?php the_sub_field('from_fee'); ?></span></li><?php endwhile; endif; ?><?php endif; ?><?php endif; ?><?php if( get_field('price') == 'omit' ): ?><?php endif; ?>
                        </ul>
                    </div>
                    <div id="SingleEventContent"<?php $values = get_field('event_is_cancelled'); if(in_array("cancelled", $values )){ ?> style="display:none;"<?php } ?>>
                        <?php the_content(); ?>
                    </div>
                    <?php $values = get_field('event_is_cancelled'); if(in_array("cancelled", $values )){ ?>
                        <div id="SingleEventContent">
                            <h3>This event has been cancelled!</h3>
                            <?php the_field('cancellation_notice'); ?>
                            <p><a href="/agenda/" class="Button">View our agenda</a></p>
                        </div>
                    <?php } ?>
                </div>
            </section>
            <section id="SingleEventMain">
                <section id="GeneralInfo">
                    <?php get_template_part( 'openingtimes', 'page' ); ?>
                </section>
                <?php if (has_term('food', 'event-categories')) : ?>
                    <?php if( get_field('food_menu') == 'yes' ): ?>
                        <?php if( have_rows('menu_entries') ): while( have_rows('menu_entries') ) : the_row(); ?>
                        <section id="SingleEventMenuWrap">
                            <h3>—&emsp;Menu&emsp;—</h3>
                            <ul id="SingleEventMenu">
                                
                                <li class="Course">
                                    <div class="CourseName">
                                        <span><?php the_sub_field('course_1_title'); ?></span>
                                    </div>
                                    <div class="CourseDetails">
                                        <p><?php the_sub_field('course_1_entry'); ?></p>
                                    </div>
                                    <div class="CoursePrice">
                                        <span><?php the_sub_field('course_1_price'); ?></span>
                                    </div>
                                </li>
                                <?php if( get_sub_field('course_2_title') ): ?>
                                <li class="Course">
                                    <div class="CourseName">
                                        <span><?php the_sub_field('course_2_title'); ?></span>
                                    </div>
                                    <div class="CourseDetails">
                                        <p><?php the_sub_field('course_2_entry'); ?></p>
                                    </div>
                                    <div class="CoursePrice">
                                        <span><?php the_sub_field('course_2_price'); ?></span>
                                    </div>
                                </li>
                                <?php endif; ?>
                                <?php if( get_sub_field('course_3_title') ): ?>
                                <li class="Course">
                                    <div class="CourseName">
                                        <span><?php the_sub_field('course_3_title'); ?></span>
                                    </div>
                                    <div class="CourseDetails">
                                        <p><?php the_sub_field('course_3_entry'); ?></p>
                                    </div>
                                    <div class="CoursePrice">
                                        <span><?php the_sub_field('course_3_price'); ?></span>
                                    </div>
                                </li>
                                <?php endif; ?>
                                <?php if( get_sub_field('course_4_title') ): ?>
                                <li class="Course">
                                    <div class="CourseName">
                                        <span><?php the_sub_field('course_4_title'); ?></span>
                                    </div>
                                    <div class="CourseDetails">
                                        <p><?php the_sub_field('course_4_entry'); ?></p>
                                    </div>
                                    <div class="CoursePrice">
                                        <span><?php the_sub_field('course_4_price'); ?></span>
                                    </div>
                                </li>
                                <?php endif; ?>
                                <?php if( get_sub_field('course_5_title') ): ?>
                                <li class="Course">
                                    <div class="CourseName">
                                        <span><?php the_sub_field('course_5_title'); ?></span>
                                    </div>
                                    <div class="CourseDetails">
                                        <p><?php the_sub_field('course_5_entry'); ?></p>
                                    </div>
                                    <div class="CoursePrice">
                                        <span><?php the_sub_field('course_5_price'); ?></span>
                                    </div>
                                </li>
                                <?php endif; ?>
                                <?php if( get_sub_field('course_6_title') ): ?>
                                <li class="Course">
                                    <div class="CourseName">
                                        <span><?php the_sub_field('course_6_title'); ?></span>
                                    </div>
                                    <div class="CourseDetails">
                                        <p><?php the_sub_field('course_6_entry'); ?></p>
                                    </div>
                                    <div class="CoursePrice">
                                        <span><?php the_sub_field('course_6_price'); ?></span>
                                    </div>
                                </li>
                                <?php endif; ?>
                                <?php if( get_field('price_for_full_menu') ): ?>
                                <li class="CourseCombo">
                                    <div class="CourseName">
                                    </div>
                                    <div class="CourseDetails">
                                        <p><?php if( get_sub_field('course_6_title') ): ?>Six courses together<?php elseif( get_sub_field('course_5_title') ): ?>Five courses together<?php elseif( get_sub_field('course_4_title') ): ?>Four courses together<?php elseif( get_sub_field('course_3_title') ): ?>Three courses together<?php elseif( get_sub_field('course_2_title') ): ?>Two courses together<?php else: ?>One course<?php endif; ?> for:</p>
                                    </div>
                                    <div class="CoursePrice">
                                        <span>&euro; <?php the_field('price_for_full_menu'); ?></span>
                                    </div>
                                </li>
                                <?php endif; ?>
                            </ul>
                            <p class="MenuEnding">—&emsp;Bon appétit!&emsp;—</p>
                        </section>
                        <?php endwhile; endif; ?>
                    <?php endif; ?>
                    <?php if( get_field('food_menu') == 'no' ): ?>
                    <section id="AgendaAgendaWrap">
                        <h3>Other delicious events</h3>
                        <section id="AgendaFiltersWrap" class="AgendaFiltersCollapsed"></section>
                        <ul id="Agenda">
                        <?php
                        $todays_date = current_time('Ymd');
                        $currentID = get_the_ID();
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
                            'posts_per_page' => 4,
                            'post__not_in' => array($currentID),
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
                                <p>&nbsp;</p>
                                <h2>There’s nothing here!</h2>
                                <p>It appears that there are no other Food Events.</p>
                                <p>You can check out the Agenda on the Food page to see if there’s something there, but I can’t promise you anything...</p>
                                <p><em>Sorry, hope you’re not hungry!</em></p>
                            <?php endif; ?>
                            </ul>
                        <a href="/food/#FoodAgendaWrap" class="Button HomeAgendaFull">View food agenda</a>
                    </section>
                    <?php endif; ?>
                <?php else: ?>
                    <?php if( get_field('event_program') == 'yes' ): ?>
                    <?php if( have_rows('program_entries') ): while( have_rows('program_entries') ) : the_row(); ?>
                    <section id="SingleEventProgramWrap">
                        <h3>Program</h3>
                        <ul id="SingleEventProgram">
                            <?php if( get_sub_field('use_doorstart_time') == 'doorstart' ): ?>
                                <?php if( get_field('time_door_opens') ): ?>
                                <li class="ProgramEntry">
                                    <div class="ProgramEntryTime">
                                        <span><?php the_field('time_door_opens'); ?></span>
                                    </div>
                                    <p>Door opens</p>
                                </li>
                                <?php else: ?>
                                <li class="ProgramEntry">
                                    <div class="ProgramEntryTime">
                                        <span><?php the_field('starting_time'); ?></span>
                                    </div>
                                    <p>Start</p>
                                </li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if( get_sub_field('timeslot_1') ): ?>
                            <li class="ProgramEntry">
                                <div class="ProgramEntryTime">
                                    <span><?php the_sub_field('timeslot_1'); ?></span>
                                </div>
                                <p><?php the_sub_field('timeslot_1_entry'); ?></p>
                            </li>
                            <?php endif; ?>
                            <?php if( get_sub_field('timeslot_2') ): ?>
                            <li class="ProgramEntry">
                                <div class="ProgramEntryTime">
                                    <span><?php the_sub_field('timeslot_2'); ?></span>
                                </div>
                                <p><?php the_sub_field('timeslot_2_entry'); ?></p>
                            </li>
                            <?php endif; ?>
                            <?php if( get_sub_field('timeslot_3') ): ?>
                            <li class="ProgramEntry">
                                <div class="ProgramEntryTime">
                                    <span><?php the_sub_field('timeslot_3'); ?></span>
                                </div>
                                <p><?php the_sub_field('timeslot_3_entry'); ?></p>
                            </li>
                            <?php endif; ?>
                            <?php if( get_sub_field('timeslot_4') ): ?>
                            <li class="ProgramEntry">
                                <div class="ProgramEntryTime">
                                    <span><?php the_sub_field('timeslot_4'); ?></span>
                                </div>
                                <p><?php the_sub_field('timeslot_4_entry'); ?></p>
                            </li>
                            <?php endif; ?>
                            <?php if( get_sub_field('timeslot_5') ): ?>
                            <li class="ProgramEntry">
                                <div class="ProgramEntryTime">
                                    <span><?php the_sub_field('timeslot_5'); ?></span>
                                </div>
                                <p><?php the_sub_field('timeslot_5_entry'); ?></p>
                            </li>
                            <?php endif; ?>
                            <?php if( get_sub_field('timeslot_6') ): ?>
                            <li class="ProgramEntry">
                                <div class="ProgramEntryTime">
                                    <span><?php the_sub_field('timeslot_6'); ?></span>
                                </div>
                                <p><?php the_sub_field('timeslot_6_entry'); ?></p>
                            </li>
                            <?php endif; ?>
                            <?php if( get_sub_field('timeslot_7') ): ?>
                            <li class="ProgramEntry">
                                <div class="ProgramEntryTime">
                                    <span><?php the_sub_field('timeslot_7'); ?></span>
                                </div>
                                <p><?php the_sub_field('timeslot_7_entry'); ?></p>
                            </li>
                            <?php endif; ?>
                            <?php if( get_sub_field('timeslot_8') ): ?>
                            <li class="ProgramEntry">
                                <div class="ProgramEntryTime">
                                    <span><?php the_sub_field('timeslot_8'); ?></span>
                                </div>
                                <p><?php the_sub_field('timeslot_8_entry'); ?></p>
                            </li>
                            <?php endif; ?>
                            <?php if( get_sub_field('timeslot_9') ): ?>
                            <li class="ProgramEntry">
                                <div class="ProgramEntryTime">
                                    <span><?php the_sub_field('timeslot_9'); ?></span>
                                </div>
                                <p><?php the_sub_field('timeslot_9_entry'); ?></p>
                            </li>
                            <?php endif; ?>
                            <?php if( get_sub_field('timeslot_10') ): ?>
                            <li class="ProgramEntry">
                                <div class="ProgramEntryTime">
                                    <span><?php the_sub_field('timeslot_10'); ?></span>
                                </div>
                                <p><?php the_sub_field('timeslot_10_entry'); ?></p>
                            </li>
                            <?php endif; ?>
                            <?php if( get_sub_field('use_end_datetime') == 'endtime' ): ?>
                                <li class="ProgramEntry">
                                    <div class="ProgramEntryTime">
                                        <span><?php $date = date('H:i', strtotime(get_field('end_date_time'))); echo $date; ?></span>
                                    </div>
                                    <p>End</p>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </section>
                    <?php endwhile; endif; ?>
                <?php endif; ?>

                    <?php if( get_field('event_program') == 'no' ): ?>
                    <section id="AgendaAgendaWrap">
                        <h3>Other events coming up</h3>
                        <ul id="Agenda">
                        <?php
                        $todays_date = current_time('Ymd');
                        $currentID = get_the_ID();
                        $args = array(
                            'post_status'	=>		'publish',
                            'post_type'     =>      'event',
                            'posts_per_page' => 4,
                            'post__not_in' => array($currentID),
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
                                        <?php if( get_field('price') == 'free' ): ?><li><span class="AgendaDetail">Free</span></li><?php endif; ?><?php if( get_field('price') == 'donation' ): ?><li><span class="AgendaDetail">Donation based</span></li><?php endif; ?><?php if( get_field('price') == 'menuprice' ): ?><li><span class="AgendaDetail"><?php if( have_rows('menu_entries') ): while( have_rows('menu_entries') ) : the_row(); ?><?php if( get_sub_field('course_6_title') ): ?>Six courses<?php elseif( get_sub_field('course_5_title') ): ?>Five courses<?php elseif( get_sub_field('course_4_title') ): ?>Four courses<?php elseif( get_sub_field('course_3_title') ): ?>Three courses<?php elseif( get_sub_field('course_2_title') ): ?>Two courses<?php else: ?>One course<?php endif; ?> for &euro; <?php the_field('price_for_full_menu'); ?><?php endwhile; endif; ?></span></li><?php endif; ?><?php if( get_field('price') == 'entrancefee' ): ?><li><span>Entry:</span><span class="AgendaDetail">&euro; <?php the_field('entrance_fee'); ?></span></li><?php endif; ?><?php if( get_field('price') == 'variablefee' ): ?><?php if( have_rows('variable_entrance_fee') ): while( have_rows('variable_entrance_fee') ) : the_row(); ?><li><span>Entry:</span><span class="AgendaDetail">&euro; <?php the_sub_field('from_fee'); ?> / <?php the_sub_field('to_fee'); ?></span></li><?php endwhile; endif; ?><?php if( get_field('price') == 'variablefee' ): ?><?php if( have_rows('variable_price') ): while( have_rows('variable_price') ) : the_row(); ?><li><span>From:</span><span class="AgendaDetail">&euro; <?php the_sub_field('from_fee'); ?></span></li><?php endwhile; endif; ?><?php endif; ?><?php endif; ?><?php if( get_field('price') == 'omit' ): ?><?php endif; ?>
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
                            </ul>
                        <a href="/agenda/" class="Button HomeAgendaFull">View full agenda</a>
                    </section>
                    <?php endif; ?>
                <?php endif;?>
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
                    <p>Oh, pressing the back button is always a good idea! Or pressing refresh. Or going back to the <a href="/">Home page</a>.</p>
                    <p>By the way, if you also feel like you shouldn’t be seeing this, because there definitely should be something here, drop us a line on the <a href="/contact/">Contact page</a>.</p>
                </div>
            </section>
        </div>
    </main>
<?php endif; ?>
<?php get_footer(); ?>