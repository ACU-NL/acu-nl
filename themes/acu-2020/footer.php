<footer id="Footer">
        <h5>Political Cultural Center ACU</h5>
        <section id="FooterInfo">
            <ul id="FooterAddress">
                <li>Voorstraat 71</li>
                <li>3512 AK&emsp;Utrecht</li>
                <li><a href="tel:+31302314590" title="Call ACU at: +31 (0)30 - 231 45 90">+31 (0)30 - 231 45 90</a></li>
            </ul>
            <ul id="FooterSocial">                
                <?php
                    $menu_name = 'footersocial';
                    $locations = get_nav_menu_locations();
                    $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
                    $menuitems = wp_get_nav_menu_items( $menu->term_id, array () );
                ?>
                <?php
                    $count = 0;
                    $submenu = false;
                    foreach( $menuitems as $item ):
                        $title = $item->title;
                        $link = $item->url;
                        $icon = $item->image;
                        if ( !$item->menu_item_parent ):
                        $parent_id = $item->ID;
                ?>
                <li><a href="<?php echo $link; ?>" title="<?php echo $title; ?>" class="SocialButton" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/<?php echo $icon; ?>.svg" /></a></li>
                <?php endif; ?>
                <?php $count++; endforeach; ?>
            </ul>
        </section>
    </footer>   
    <script type="text/javascript">
        $j=jQuery.noConflict();
        $j(window).bind("resize", function () {
            if ($j(this).width() < 899) {
                $j('#MainNavigationWrap').addClass('MobileMenuCollapsed')
            } else {
                $j('#MainNavigationWrap').removeClass('MobileMenuCollapsed')
            }
        }).trigger('resize');
        $j('.CloseNotice').on("click", function () {
            $j(this).parents('div').slideUp('slow');
        });
        $j('#AccessMobileMenu').on("click", function () {
            $j('#MainNavigationWrap').toggleClass('MobileMenuCollapsed',300);
        });
        $j('#AccessFilters').on("click", function () {
            $j('#AgendaFiltersWrap').toggleClass('AgendaFiltersCollapsed',300);
        });
    </script>
    <script type="text/javascript">
        $j=jQuery.noConflict();
        function getHashFilter() {
            var hash = location.hash;
            var matches = location.hash.match( /filter=([^&]+)/i );
            var hashFilter = matches && matches[1];
            return hashFilter && decodeURIComponent( hashFilter );
        }

        var $container = $j('#Agenda');
            var $filters = $j('#AgendaFilters');
            var isIsotopeInit = false;
            var $item = $j(".AgendaEntry");
                
		function onHashchange() {
			var hashFilter = getHashFilter();
			if ( !hashFilter && isIsotopeInit ) {
				return;
			}
			if(!hashFilter) {
				$container.isotope({
					itemSelector: '.AgendaEntry',
					filter: '*'
				});
				
				$filters.find('a[href="#filter=*"]').addClass('UnFilter');
			}
			isIsotopeInit = true;
			// filter isotope
			$container.isotope({
				itemSelector: '.AgendaEntry',
				filter: hashFilter
			});
			
			// set selected class on button
			if ( hashFilter ) {
				$filters.find('.UnFilter').removeClass('UnFilter');
				$filters.find('a[href="#filter=' + hashFilter + '"]').addClass('UnFilter');
			}
			
			$j(window).resize();
		}
		
		$j(window).on( 'hashchange', onHashchange );
    </script>
<?php wp_footer(); ?>
</body>

</html>