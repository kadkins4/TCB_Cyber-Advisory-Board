<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="menu-toggle" id="openm" onclick="menuToggle()" aria-controls="top-menu" aria-expanded="false" value="klic me">
    <svg width="15" class="icon icon-bars" aria-hidden="true" role="img"> <use href="#icon-bars" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-bars"></use> </svg>
    <?php
    _e( 'Menu', 'thecipherbrief' );
    ?>
</div>
<script>
var statm = true;
    function menuToggle(){
        if(statm){
            jQuery("#openm").html('<svg width="15"class="icon icon-close" aria-hidden="true" role="img"> <use href="#icon-close" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-close"></use> </svg>Menu');
        }else{
            jQuery("#openm").html('<svg width="15" class="icon icon-bars" aria-hidden="true" role="img"> <use href="#icon-bars" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-bars"></use> </svg>Menu');
        }
        statm = !statm;
    }
</script>
<div class="search-block">
	<?php get_search_form();?>
</div>
<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php _e( 'Top Menu', 'thecipherbrief' ); ?>">
	<?php wp_nav_menu( array(
		'theme_location' => 'top',
		'menu_id'        => 'top-menu',
	) ); ?>
</nav><!-- #site-navigation -->

<div id="block-superfish-1" class="menu_hide_responsive">
    <div class="content clearfix">
        <?php wp_nav_menu( array(
            'theme_location' => 'top',
            'menu_id'        => 'top-menu',
        ) ); ?>
    </div>
</div>
