<?php $values = get_field('show_free_space_and_new_volunteering_area'); if(in_array("show", $values )){ ?>
    <?php if( have_rows('home_free_space') ): while( have_rows('home_free_space') ) : the_row(); ?>
    <section id="HomeFreeSpace">
        <div id="HomeFreeSpaceHeader">
            <h2><?php the_sub_field('free_space_headline'); ?></h2>
            <?php the_sub_field('free_space_text'); ?>
        </div>
        <div id="HomeFreeSpaceFooter">
            <div id="HomeFreeSpaceFooterLeft">
                <img src="<?php the_sub_field('free_space_image'); ?>" id="HomeFreeSpaceSlantedImage" />
            </div>
            <div id="HomeFreeSpaceFooterRight">
            <?php if( get_sub_field('free_space_pointer') ): ?>
                <div id="HomeFreeSpacePointer">
                    <span><?php the_sub_field('free_space_pointer'); ?></span>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/freespacearrow.svg" id="HomeFreeSpaceArrow" />
                </div>
                <?php endif; ?>
                <a href="<?php the_sub_field('free_space_button_link'); ?>" title="<?php the_sub_field('free_space_button_text'); ?>" target="_blank" class="Button HomeFreeSpaceButton"><?php the_sub_field('free_space_button_text'); ?></a>
            </div>
        </div>
    </section>
    <?php endwhile; endif; ?>
    <?php if( have_rows('new_volunteers_cta') ): while( have_rows('new_volunteers_cta') ) : the_row(); ?>
    <section id="HomeVolunteering">
        <div id="HomeVolunteeringHeader">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/volunteeringlogo.svg" />
            <h2><?php the_sub_field('new_volunteers_headline'); ?></h2>
        </div>
        <div id="HomeVolunteeringContent">
            <?php the_sub_field('new_volunteers_text'); ?>
        </div>
        <a href="/volunteering/" class="Button HomeVolunteeringButton"><?php the_sub_field('new_volunteers_button'); ?></a>
    </section>
    <?php endwhile; endif; ?>
<?php } ?>