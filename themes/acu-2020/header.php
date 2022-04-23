<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title(' | ', 'echo', 'right'); ?><?php bloginfo('name'); ?></title>
	<meta name="author" content="Stichting Kraakhelder En Toch Niet Fris">
	<meta name="description" content="The website of the former squat “ACU” at Voorstraat 71 in Utrecht.">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
	<link rel="icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico"/>
    <?php wp_head(); ?>
</head>

<body>
	<section id="Notices">
	<?php 
		$args = array(
			'post_type'		=>		'notice',
			'post_status'	=>		'publish',
			'posts_per_page'         => 5,
			'orderby' 		=>		'menu_order', 'order' => 'ASC'
		);
		$notice_query = new WP_Query( $args );
		if( $notice_query->have_posts() ):
			while( $notice_query->have_posts() ): $notice_query->the_post(); ?>
			<div class="Notice <?php the_field('notice_kind'); ?>">
				<?php the_field('notice_text'); ?>
				<?php if( get_field('allow_closing') == 'allow' ) {?><span class="CloseNotice"></span><?php }?>
			</div>  
			<?php endwhile; wp_reset_postdata(); ?>
		<?php endif; ?>
	</section>
	<header>
        <nav>
            <div id="Header">
                <a href="/">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/acu-logo.svg" />
                </a>
                <span id="AccessMobileMenu">Menu&nbsp;&#8801;</span>
                <div id="MainNavigationWrap">
                    <ul>				
						<?php wp_nav_menu(
							array(
									'theme_location' => 'main',
									'container' => false,
									'items_wrap'    => '%3$s'
								)
							);
						?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>