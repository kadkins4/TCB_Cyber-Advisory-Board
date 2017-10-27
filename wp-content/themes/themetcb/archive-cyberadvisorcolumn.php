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
$my_sidebar = getMySideBar('wpcf-show_dead_drop','wpcf-show_dead_drop');
get_header();
the_custom_above_banner();
?>
    <div class="site-content-contain post_content not_top_border">
        <div class="post_article content-inner inner column center border_bottom">
            <div class="view-header">
                <div class="breadcrumb"><a style="display: none;" href="/cyberadvisorcolumn">Cyber Advisor Columns</a></div>
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
            <div class="cab">
            <?php
            if ( $wp_query->have_posts() ) {
                while (have_posts()) {
                    the_post();
                    ?>
                    <div class="brief-info">
                      <?php $posttime = timeLink(); ?>
                      <div class='timestamp'<?php echo $posttime ?></div>
                    </div>
                    <?php $alt_link = wp_get_post_terms($post->ID, 'alt_links'); ?>
                    <?php $author = wp_get_post_terms($post->ID, 'authors'); ?>
                    <?php if ( $alt_link[0] ) : ?>
                    <a href="<?php echo $alt_link[0]->name; ?>">
                    <?php else : ?>
                        <a href="/cyberadvisorcolumn/<?php echo $post->post_name;?>/">
                    <?php endif; ?>
                    <div class="brief-contain">
                      <div class="cab-arc-img">
                    <?php the_post_thumbnail('thecipherbrief-featured-image'); ?>
                  </div>
                    <div class="brief-content">
                          <h2><?php the_title(); ?></h2>
                          <?php if ( $author[0] ) : ?>
                          <h3> By <?php echo $author[0]->name;?></h3>
                          <?php endif; ?>
                          <?php if ( ! $alt_link[0] ) : ?>
                      <p><?php the_truncated_post(200) ?></p>
                          <?php endif; ?>
                    </div>
                    </div>
                        </a>

                    <?php
                }
                ?>  </div>
                <?php
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
