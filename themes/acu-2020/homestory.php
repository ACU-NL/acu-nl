<?php $values = get_field('show_story_area'); if(in_array("show", $values )){ ?>
    <?php if( have_rows('story_area_settings') ): while( have_rows('story_area_settings') ) : the_row(); ?>
        <section id="HomeStory">
            <div id="HomeStoryImage">
                <img src="<?php the_sub_field('story_image'); ?>" />
            </div>
            <div id="HomeStoryContent">
                <div id="HomeStoryText">
                    <h2>Our story</h2>
                    <?php the_sub_field('story_text'); ?>
                </div>
                <a href="/about#StoryIntro" class="Button HomeStoryButton">Read the story of ACU</a>
            </div>
        </section>
    <?php endwhile; endif; ?>
<?php } ?>