<?php
/**
 * The front page template file
 *
 */
    get_header();
    the_custom_above_banner();
?>
<div class="site-container">

    <div class="holder-container">
    <div class='col' id="recent-news">

      <h1 class="col-title"><a href="/category/our-latest-reporting">OUR LATEST REPORTING</a></h1>
      <?php
  // the query
  $wpb_all_query = new WP_Query(array(
    'post_type' =>'post',
    'category_name' => 'our latest reporting',
    'post_status' =>'publish',
    'posts_per_page' => 4,
    'orderby' => 'date',
    'order' => 'DESC'
    ));
  ?>

  <?php if ( $wpb_all_query->have_posts() ) : ?>
      <!-- the loop -->
      <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
        <div id="our_latest_news">
          <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thecipherbrief-featured-image' ); ?></a>
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <h5><a class="author_name" href="<?php the_permalink(); ?>"> The Cipher Brief Staff </a></h5>
        </div>
      <?php endwhile; ?>
      <!-- end of the loop -->
      <?php wp_reset_postdata(); ?>


  <?php else : ?>
      <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>
  <!-- <a href="/category/our-latest-reporting" class="view_more">VIEW MORE</a> -->
    </div>

    <!-- cyber advisor columns -->
    <div class='col' id="cab">

      <h1 class="col-title"><a href="/cyberadvisorcolumn">CYBER ADVISOR COLUMNS</a></h1>
      <?php $wpb_all_query = new WP_Query(array(
        'post_type' =>'cyberadvisorcolumn',
        'post_status' =>'publish',
        'posts_per_page' => 4,
        'orderby' => 'date',
        'order' => 'DESC'
      ));
    ?>

  <?php if ( $wpb_all_query->have_posts() ) : ?>

      <!-- the loop -->
      <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
        <div id="cyber-advisor-column-entry">
          <div class="cyber-img">
            <!-- apply custom image size made in functions.php setup -->
            <a style="border: 2px solid black;" href="<?php the_permalink(); ?>"> <?php the_post_thumbnail( 'thecipherbrief-thumbnail-avatar' ); ?> </a>
          </div>
          <h3 style="text-transform: capitalize; line-height: 1.2;"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a> </h3>
          <h5 class="author_name">General Michael Hayden</h5>
          <!-- <p><?php echo wp_trim_words( get_the_content(), 24, '...' );?> </p> -->
        </div>
      <?php endwhile; ?>
      <!-- end of the loop -->

      <?php wp_reset_postdata(); ?>

  <?php else : ?>
      <p><?php _e( 'Sorry, no posts of this type have been made yet.' ); ?></p>
  <?php endif; ?>
  <!-- <a href="/category/cyber-advisor-columns" class="view_more">VIEW MORE</a> -->
    </div>


    <!-- Threats -->
    <div class='col' id="threat-report">
      <h1 class="col-title"><a href="/category/threat-report">THREAT Report</a></h1>
      <?php
  // the query
  $wpb_all_query = new WP_Query(array(
    'post_type'=>'post',
    'category_name' => 'threat report',
    'post_status'=>'publish',
    'posts_per_page'=> 8
  ));
    ?>

  <?php if ( $wpb_all_query->have_posts() ) : ?>



      <!-- the loop -->
      <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
        <div class="threat-report-entry">
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <h5><a class="author_name" href="<?php the_permalink(); ?>"> Wesley Morgan </a></h5>
        </div>
      <?php endwhile; ?>
      <!-- end of the loop -->


      <?php wp_reset_postdata(); ?>

  <?php else : ?>
      <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>
  <!-- <a href="/category/threat-report" class="view_more">VIEW MORE</a> -->
    </div>
  </div>

  <!-- Cipher Take -->

  <div class="holder-container">
    <div id="ciphertake">
      <h1 class="col-title"><a href="/category/ciphertake"> the CIPHER TAKE</a></h1>
      <div class="row">

<?php
  $wpb_all_query = new WP_Query(array(
    'post_type'=>'post',
    'category_name' => 'ciphertake',
    'post_status'=>'publish',
    'posts_per_page'=> 2
  ));
    ?>

  <?php if ( $wpb_all_query->have_posts() ) : ?>

      <!-- the loop -->
      <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
        <div id="ciphertake-entry">
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <p><?php echo wp_trim_words( get_the_content(), 85, '...' );?> </p>
        </div>
      <?php endwhile; ?>
      <!-- end of the loop -->

      <?php wp_reset_postdata(); ?>

  <?php else : ?>
      <p><?php _e( 'Sorry, no articles have been posted yet.' ); ?></p>
  <?php endif; ?>
    </div>
  </div>
</div>

  <div class="third-section">
    <!-- The White Papers -->
    <h1 class="col-title"><a href="/whitepaper">WHITE PAPERS</a></h1>
    <div class="vert-container">
      <div class="holder-container">
        <div id="whitepaper">
          <?php
          $wpb_all_query = new WP_Query(array(
            'post_type'=> 'whitepapers',
            'post_status'=> 'publish',
            'posts_per_page'=> 6,
            'orderby' => 'date',
            'order' => 'DESC'
          ));
            ?>

          <?php if ( $wpb_all_query->have_posts() ) : ?>

              <!-- the loop -->
              <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
                <div class="whitepaper-entry">
                  <h3 style="text-transform: capitalize;"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 4, '...'); ?></a></h3>
                  <h5>By The Cipher Brief Staff</h5>
                </div>
              <?php endwhile; ?>
              <!-- end of the loop -->

              <?php wp_reset_postdata(); ?>

          <?php else : ?>
              <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
          <?php endif; ?>
        </div>

        <div class="meet_board">
          <h3 style="font-weight: bold; text-align: center; line-height: 1.2;">Meet Our Board</h3>
          <?php
            $wpb_all_query = new WP_Query(array(
              'post_type'=>'post',
              'category_name' => 'board',
              'post_status'=>'publish',
              'posts_per_page'=> 1
            ));
              ?>

            <?php if ( $wpb_all_query->have_posts() ) : ?>

                <!-- the loop -->
                <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
                  <div style="padding: 2%;">
                    <p style="font-size: 14px">
                      <span style="float: left; width: 80px; height: auto; padding: 1.5% 2%;"> <?php the_post_thumbnail( ' ' ); ?> </span>
                      <?php echo wp_trim_words( get_the_content(), 30, '...' );?> <br>
                      <a href="https://www.thecipherbrief.com/cyber-advisory-board" style=" display: block; text-align: center; color: #d52340;">view the rest of the Cyber Advisory Board</a>
                    </p>
                  </div>
                <?php endwhile; ?>
                <!-- end of the loop -->

                <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>
        </div>

      </div>
      <div class="holder-container">
      </div>
    </div>

  </div>

  <!-- extraneous blocks -->
  <div class="holder-container">
    <div class="">
      <h3>How to Subscribe</h3>
      <p>to subscribe click here <a href="https://www.thecipherbrief.com/subscribe">HERE</a></p>
    </div>
  </div>
</div>
</div>

    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>(adsbygoogle = window.adsbygoogle || []).push({google_ad_client: "ca-pub-7418758779618043",enable_page_level_ads: true});</script>
    <script>
	if(document.getElementById('content-top').offsetWidth > 1125)
    	jQuery("#block-views-home-global_news").css("height", "calc("+ document.getElementById('content-top').offsetHeight + "px - 30px)");
    else
    	jQuery("#block-views-home-global_news").css("height", "auto");
</script>
<?php
    get_footer();
