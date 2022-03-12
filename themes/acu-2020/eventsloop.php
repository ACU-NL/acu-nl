<ul id="Agenda">
    <?php
    $todays_date = current_time('Ymd'); 
        $args = array(
            'post_status'	=>		'publish',
            'post_type'     =>      'event',
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
        $loop = new WP_Query( $args );
		while ( $loop->have_posts() ) : $loop->the_post(); 
		 
		$terms = get_the_terms( $post->ID, 'event-categories' );
		if ( $terms && ! is_wp_error( $terms ) ) : 
		
		$links = array();
		
		foreach ( $terms as $term ) {
			$links[] = $term->name;
		}
		
		$tax_links = join( " ", str_replace(' ', '-', $links));          
		$tax = strtolower($tax_links);
		else :	
		$tax = '';					
		endif;
    ?>
        <li class="AgendaEntry <?php echo $tax; ?>">
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
    <?php endwhile; wp_reset_query(); ?>
</ul>