<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
$my_sidebar = getMySideBar('wpcf-show_whitepapers','wpcf-show_whitepapers');
get_header();
the_custom_above_banner();
?>
    <div class="site-content-contain post_content not_top_border">
        <div class="post_article content-inner inner column center border_bottom">
            <div class="view-header">
                <div class="breadcrumb"><a href="/whitepapers">Whitepapers</a></div>
                <h1 style="text-align:left; font-weight:100;padding-top: 0px;text-transform: none">
                <?php
                    if(IsSet($wp_query->query['year']) && IsSet($wp_query->query['monthnum']) && $wp_query->query['year'] && $wp_query->query['monthnum']){
                        echo date('F Y',strtotime($wp_query->query['year'].'-'.$wp_query->query['monthnum']));
                    } else {
                        echo post_type_archive_title( '', false );
                    }
                ?>
                </h1>
            </div>
            <div style="width: 35vw; margin: 0 auto;">
    <?php if( ! is_user_logged_in() ) : ?>
      <?php echo do_shortcode("[login_form]"); ?>
    <?php else : ?>
      <div class="rcp_logged_in"><a href="<?php echo wp_logout_url( home_url() ); ?>"><?php _e( 'Log out', 'rcp' ); ?></a></div>
    <?php endif; ?>
  </div>
            <?php
            if ( $wp_query->have_posts() ) {
                while (have_posts()) {
                    the_post();
                    ?>
                    <div class="views-row dead-drop-line">
                        <a href="/whitepaper/<?php echo $post->post_name;?>/"><h2><?php echo $post->post_title ?></h2></a>
                    </div>
                    <?php
                }
                if (function_exists(custom_pagination)) {
                    custom_pagination($custom_query->max_num_pages,"",$paged);
                }
            }
            ?>
        </div>
        <?php echo ($my_sidebar ? $my_sidebar : '');?>
    </div>
<?php
get_footer();
