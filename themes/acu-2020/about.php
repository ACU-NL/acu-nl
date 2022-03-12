<?php /* Template Name: About */ ?>

<?php get_header(); ?>
<main>
    <div id="AboutWrap">
        <section id="AboutIntro" <?php if( have_rows('page_top_settings') ): while( have_rows('page_top_settings') ) : the_row(); ?>style="background-image:url('<?php the_sub_field('about_intro_background'); ?>');"<?php endwhile; endif; ?>>
            <?php if( have_rows('page_top_settings') ): while( have_rows('page_top_settings') ) : the_row(); ?>
                <?php $values = get_sub_field('show_about_page_navigation'); if(in_array("show", $values )){ ?>
                    <ul id="PageNavigation">
                        <?php wp_nav_menu(
							array(
									'theme_location' => 'aboutnav',
                                    'container' => false,
                                    'items_wrap'    => '%3$s'
								)
							);
                        ?>
                    </ul>
                <?php } ?>
            <?php endwhile; endif; ?>
            <div id="AboutIntroHeader">
            </div>
            <div id="AboutIntroContent">
                <h1><?php the_title(); ?></h1>
                <?php if( have_rows('page_top_settings') ): while( have_rows('page_top_settings') ) : the_row(); ?>
                    <?php the_sub_field('about_intro_text'); ?>
                <?php endwhile; endif; ?>
            </div>
        </section>
        <?php $values = get_field('show_house_rules'); if(in_array("show", $values )){ ?>
            <section id="AboutHouseRules">
                <h2>House rules</h2>
                <?php if( have_rows('house_rules_settings') ): while( have_rows('house_rules_settings') ) : the_row(); ?>
                    <?php the_sub_field('house_rules_introduction'); ?>
                    <ul>
                        <?php if( have_rows('rules') ): while( have_rows('rules') ) : the_row(); ?>
                            <?php if( get_sub_field('rule_1')): ?>
                                <li><h3><?php the_sub_field('rule_1'); ?></h3><?php if( get_sub_field('rule_1_explanation')): ?><p><?php the_sub_field('rule_1_explanation'); ?></p><?php endif; ?></li>
                            <?php endif; ?>
                            <?php if( get_sub_field('rule_2')): ?>
                                <li><h3><?php the_sub_field('rule_2'); ?></h3><?php if( get_sub_field('rule_2_explanation')): ?><p><?php the_sub_field('rule_2_explanation'); ?></p><?php endif; ?></li>
                            <?php endif; ?>
                            <?php if( get_sub_field('rule_3')): ?>
                                <li><h3><?php the_sub_field('rule_3'); ?></h3><?php if( get_sub_field('rule_3_explanation')): ?><p><?php the_sub_field('rule_3_explanation'); ?></p><?php endif; ?></li>
                            <?php endif; ?>
                            <?php if( get_sub_field('rule_4')): ?>
                                <li><h3><?php the_sub_field('rule_4'); ?></h3><?php if( get_sub_field('rule_4_explanation')): ?><p><?php the_sub_field('rule_4_explanation'); ?></p><?php endif; ?></li>
                            <?php endif; ?>
                            <?php if( get_sub_field('rule_5')): ?>
                                <li><h3><?php the_sub_field('rule_5'); ?></h3><?php if( get_sub_field('rule_5_explanation')): ?><p><?php the_sub_field('rule_5_explanation'); ?></p><?php endif; ?></li>
                            <?php endif; ?>
                            <?php if( get_sub_field('rule_6')): ?>
                                <li><h3><?php the_sub_field('rule_6'); ?></h3><?php if( get_sub_field('rule_6_explanation')): ?><p><?php the_sub_field('rule_6_explanation'); ?></p><?php endif; ?></li>
                            <?php endif; ?>
                            <?php if( get_sub_field('rule_7')): ?>
                                <li><h3><?php the_sub_field('rule_7'); ?></h3><?php if( get_sub_field('rule_7_explanation')): ?><p><?php the_sub_field('rule_7_explanation'); ?></p><?php endif; ?></li>
                            <?php endif; ?>
                            <?php if( get_sub_field('rule_8')): ?>
                                <li><h3><?php the_sub_field('rule_8'); ?></h3><?php if( get_sub_field('rule_8_explanation')): ?><p><?php the_sub_field('rule_8_explanation'); ?></p><?php endif; ?></li>
                            <?php endif; ?>
                            <?php if( get_sub_field('rule_9')): ?>
                                <li><h3><?php the_sub_field('rule_9'); ?></h3><?php if( get_sub_field('rule_9_explanation')): ?><p><?php the_sub_field('rule_9_explanation'); ?></p><?php endif; ?></li>
                            <?php endif; ?>
                            <?php if( get_sub_field('rule_10')): ?>
                                <li><h3><?php the_sub_field('rule_10'); ?></h3><?php if( get_sub_field('rule_10_explanation')): ?><p><?php the_sub_field('rule_10_explanation'); ?></p><?php endif; ?></li>
                            <?php endif; ?>
                            <?php if( get_sub_field('rule_11')): ?>
                                <li><h3><?php the_sub_field('rule_11'); ?></h3><?php if( get_sub_field('rule_11_explanation')): ?><p><?php the_sub_field('rule_11_explanation'); ?></p><?php endif; ?></li>
                            <?php endif; ?>
                            <?php if( get_sub_field('rule_12')): ?>
                                <li><h3><?php the_sub_field('rule_12'); ?></h3><?php if( get_sub_field('rule_12_explanation')): ?><p><?php the_sub_field('rule_12_explanation'); ?></p><?php endif; ?></li>
                            <?php endif; ?>
                            <?php if( get_sub_field('rule_13')): ?>
                                <li><h3><?php the_sub_field('rule_13'); ?></h3><?php if( get_sub_field('rule_13_explanation')): ?><p><?php the_sub_field('rule_13_explanation'); ?></p><?php endif; ?></li>
                            <?php endif; ?>
                            <?php if( get_sub_field('rule_14')): ?>
                                <li><h3><?php the_sub_field('rule_14'); ?></h3><?php if( get_sub_field('rule_14_explanation')): ?><p><?php the_sub_field('rule_14_explanation'); ?></p><?php endif; ?></li>
                            <?php endif; ?>
                            <?php if( get_sub_field('rule_15')): ?>
                                <li><h3><?php the_sub_field('rule_15'); ?></h3><?php if( get_sub_field('rule_15_explanation')): ?><p><?php the_sub_field('rule_15_explanation'); ?></p><?php endif; ?></li>
                            <?php endif; ?>
                            <?php if( get_sub_field('rule_16')): ?>
                                <li><h3><?php the_sub_field('rule_16'); ?></h3><?php if( get_sub_field('rule_16_explanation')): ?><p><?php the_sub_field('rule_16_explanation'); ?></p><?php endif; ?></li>
                            <?php endif; ?>
                            <?php if( get_sub_field('rule_17')): ?>
                                <li><h3><?php the_sub_field('rule_17'); ?></h3><?php if( get_sub_field('rule_17_explanation')): ?><p><?php the_sub_field('rule_17_explanation'); ?></p><?php endif; ?></li>
                            <?php endif; ?>
                            <?php if( get_sub_field('rule_18')): ?>
                                <li><h3><?php the_sub_field('rule_18'); ?></h3><?php if( get_sub_field('rule_18_explanation')): ?><p><?php the_sub_field('rule_18_explanation'); ?></p><?php endif; ?></li>
                            <?php endif; ?>
                            <?php if( get_sub_field('rule_19')): ?>
                                <li><h3><?php the_sub_field('rule_19'); ?></h3><?php if( get_sub_field('rule_19_explanation')): ?><p><?php the_sub_field('rule_19_explanation'); ?></p><?php endif; ?></li>
                            <?php endif; ?>
                            <?php if( get_sub_field('rule_20')): ?>
                                <li><h3><?php the_sub_field('rule_20'); ?></h3><?php if( get_sub_field('rule_20_explanation')): ?><p><?php the_sub_field('rule_20_explanation'); ?></p><?php endif; ?></li>
                            <?php endif; ?>
                        <?php endwhile; endif; ?>
                    </ul>
                    <?php the_sub_field('house_rules_footer'); ?>
                <?php endwhile; endif; ?>
            </section>
        <?php } ?>
        <?php $values = get_field('show_story'); if(in_array("show", $values )){ ?>
        <section id="StoryIntro">
            <h2>Our story</h2>
            <?php if( have_rows('story_settings') ): while( have_rows('story_settings') ) : the_row(); ?>
                <?php the_sub_field('story_intro_text'); ?>
            <?php endwhile; endif; ?>
        </section>
        <ul id="StoryEntries">
        <?php 
            $args = array(
                'post_type'		=>		'storyentry',
                'post_status'	=>		'publish',
                'posts_per_page'         => 999,
                'orderby' 		=>		'menu_order', 'order' => 'ASC'
            );
            $notice_query = new WP_Query( $args );
            if( $notice_query->have_posts() ):
            while( $notice_query->have_posts() ): $notice_query->the_post(); ?>            
            <li class="StoryEntry">
                <div class="StoryEntryImage">
                    <?php if( get_field('story_entry_media') == 'image' ): ?>
                        <img src="<?php the_field('story_entry_image'); ?>" />
                    <?php endif; ?>
                    <?php if( get_field('story_entry_media') == 'embed' ): ?>
                        <?php the_field('story_entry_embed'); ?>
                    <?php endif; ?>
                    <?php if( get_field('story_entry_media_description') ): ?><p><?php the_field('story_entry_media_description'); ?></p><?php endif; ?>
                </div>
                <div class="StoryEntryContent">
                    <h3><?php the_title(); ?></h3>
                    <?php the_field('story_entry_text'); ?>
                </div>
            </li>
            <?php endwhile; wp_reset_postdata(); ?>
            <li class="StoryEntry">
                <div class="StoryEntryImage">
                </div>
                <div class="StoryEntryContent">
                    <h3>The future...</h3>
                </div>
            </li>
            <?php else: ?>
            <li class="StoryEntry">
                <div class="StoryEntryImage">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/it-fire.gif" />
                </div>
                <div class="StoryEntryContent">
                    <h3>Hey, that’s weird!</h3>
                    <p>You should be seeing story items here...</p>
                    <p>Maybe there are no story entries? But you know, we exist since 1976, so there must be!</p>
                </div>
            </li>
            <li class="StoryEntry">
                <div class="StoryEntryImage">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/it-reboot.gif" />
                </div>
                <div class="StoryEntryContent">
                    <h3>So what else can it be?</h3>
                    <p>Bad coding? No, a professional made this. And we didn’t even pay him! (Do you think that has something to do with it?)</p>
                    <p>Maybe just try refreshing the page?</p>
                </div>
            </li>
            <li class="StoryEntry">
                <div class="StoryEntryImage">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/it-server.gif" />
                </div>
                <div class="StoryEntryContent">
                    <h3>Maybe it’s the server?</h3>
                    <p>Yeah could be. Maybe its broken and not loading the story properly?</p>
                    <p>But then you should probably not be able to see this either...</p>
                </div>
            </li> 
            <li class="StoryEntry">
                <div class="StoryEntryImage">
                </div>
                <div class="StoryEntryContent">
                    <h3><em>Get me IT!</em></h3>
                </div>
            </li>
		    <?php endif; ?>
        </ul>
        </section>
        <?php } ?>
        <div id="AboutFooterContent">
            <?php the_field('after_story_content'); ?>
        </div>
        <?php $values = get_field('show_opening_times_and_volunteering_banner'); if(in_array("show", $values )){ ?>
        <section id="AboutMain">
            <section id="GeneralInfo">
                    <?php get_template_part( 'openingtimes', 'page' ); ?>
                </section>
            <section id="AboutVolunteering">
            <?php if( have_rows('volunteering_banner_settings') ): while( have_rows('volunteering_banner_settings') ) : the_row(); ?>
                <div id="AboutVolunteeringHeader">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/volunteeringlogo.svg" />
                    <h2><?php the_sub_field('volunteering_banner_headline'); ?></h2>
                </div>
                <div id="AboutVolunteeringContent">
                <?php the_sub_field('volunteering_banner_text'); ?>
                </div>
                <a href="/volunteering/" class="Button AboutVolunteeringButton"><?php the_sub_field('volunteering_banner_button'); ?></a>
            <?php endwhile; endif; ?>
            </section>
        </section>
        <?php } ?>
    </div>
</main>
<?php get_footer(); ?>