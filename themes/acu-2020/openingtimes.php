<section id="OpeningHours">
    <h2>Opening hours</h2>
    <?php
        $args = array(
            'post_type' => 'openingtime',
            'post_status' => 'publish',
            'orderby' 		=>		'menu_order', 'order' => 'ASC',
            'posts_per_page' => 7,
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();      
                ?>
                <li><span><?php the_title(); ?></span><?php $values = get_field('closed'); if(in_array("closed", $values )){ ?><span class="OpeningHoursDetail">Closed</span><?php } else { ?><?php if( get_field('opening_hours_settings') == 'one' ): ?><span class="OpeningHoursDetail"><?php the_field('opening_hour_one'); ?> – <?php elseif( get_field('opening_hours_settings') == 'two' ): ?><span class="OpeningHoursDetail"><?php the_field('opening_hour_one'); ?> / <?php the_field('opening_hour_two'); ?> – <?php endif; ?><?php if( get_field('closing_hours_settings') == 'one' ): ?><?php the_field('closing_hour_one'); ?><?php elseif( get_field('closing_hours_settings') == 'two' ): ?><?php the_field('closing_hour_one'); ?> / <?php the_field('closing_hour_two'); ?><?php endif; } ?></span></li>
        <?php
            }
        }
        wp_reset_postdata();
        ?>
</section>
<section id="CashWarning">
    <h2>ACU = CASH PLEASE</h2>
    <p>Hit the ATM in time, because we prefer cash payments.</p>
</section>