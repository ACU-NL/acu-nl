<?php $values = get_field('show_food_and_art_area'); if(in_array("show", $values )){ ?>
    <?php if( have_rows('food_area_settings') ): while( have_rows('food_area_settings') ) : the_row(); ?>
    <section id="HomeFood">
        <div id="HomeFoodHeader">
            <h2><?php the_sub_field('food_headline'); ?></h2>
            <div id="HomeFoodHeaderImage">
                <img src="<?php the_sub_field('food_area_background'); ?>" />
            </div>
        </div>
        <div id="HomeFoodContent">
            <?php the_sub_field('food_text'); ?>
        </div>
        <div id="HomeFoodButtons">
            <?php if( get_sub_field('food_button_settings') == 'foodregular' ): ?><a href="/food/#FoodAgendaWrap" class="Button HomeFoodButton"><span>View our delicious events</span></a><?php endif; ?><?php if( get_sub_field('food_button_settings') == 'nobutton' ): ?><?php endif; ?>
            <a href="/food/" class="SecondaryButton HomeFoodButton"><span><span class="NoMobile">Find out </span>more about food in ACU</span></a>
        </div>
    </section>
    <?php endwhile; endif; ?>
    <?php if( have_rows('art_area_settings') ): while( have_rows('art_area_settings') ) : the_row(); ?>
        <section id="HomeArt">
            <div id="HomeArtBackgroundImage">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/art.jpg" />
            </div>
            <div id="HomeArtHeader">
                <h2><?php the_sub_field('art_headline'); ?></h2>
            </div>
            <div id="HomeArtContent">
                <?php the_sub_field('art_text'); ?>
                <?php if( get_sub_field('artist_name') ): ?>
                    <p class="HomeArtArtist">This month’s artist is:</p>
                    <h4 class="HomeArtArtist"><?php the_sub_field('artist_name'); ?></h4>
                <?php endif; ?>
            </div>
            <div id="HomeArtButtons">
                <?php if( get_sub_field('artist_name') ): ?>
                    <?php if( get_sub_field('artist_site') ): ?>
                        <a href="<?php the_sub_field('artist_site'); ?>" class="Button HomeArtButton" target="_blank" title="Go to <?php the_sub_field('artist_name'); ?>’s personal site"><span>View this artist’s <span class="NoMobile">personal </span>site</span></a>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if( get_sub_field('art_button_settings') == 'show' ): ?><a href="/about/art/" class="SecondaryButton HomeArtButton"><span><span class="NoMobile">Read </span>more about art in ACU</span></a><?php endif; ?>
            </div>
            <div id="HomeArtFooterImage">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/brushes.png" />
            </div>
        </section>
    <?php endwhile; endif; ?>
<?php } ?>