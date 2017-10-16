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
        'posts_per_page' => 5,
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
            <a style="border: 2px solid black;" href="<?php the_permalink(); ?>"> <?php the_post_thumbnail( 'thecipherbrief-thumbnail-cab' ); ?> </a>
          </div>
          <?php $postID = get_the_ID() ?>
          <h3 style="text-transform: capitalize; line-height: 1.2;"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a> </h3>
          <?php $author = wp_get_post_terms($post->ID, 'authors'); ?>
          <h5 class="author_name">
            <?=$author[0]->name?>
          </h5>
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
    'posts_per_page'=> 10
  ));
    ?>

  <?php if ( $wpb_all_query->have_posts() ) : ?>



      <!-- the loop -->
      <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
        <div class="threat-report-entry">
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <h5><a class="author_name" href="<?php the_permalink(); ?>">
              <?=$author[0]->name?>
          </a></h5>
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
        <div class="ciphertake-entry">
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <p class="cab-hide"><?php echo wp_trim_words( get_the_content(), 85, '...' );?> </p>
        </div>
      <?php endwhile; ?>
      <!-- end of the loop -->

      <?php wp_reset_postdata(); ?>

  <?php else : ?>
      <p><?php _e( 'Cipher Take posts coming soon!' ); ?></p>
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
          <h3 style="font-weight: bold; text-align: center; line-height: 1.2; font-family: 'replica-pro';"><a href="https://www.thecipherbrief.com/cyber-advisory-board">Meet Our Board</a></h3>
          <div class="meet_content" style='padding: 4px 4px 0 4px;'>
            <img class="board_img" src="https://thecipherbriefcyber.com/wp-content/uploads/2017/10/Robert-Work-bw.jpg" alt="Robert Work">
            <p class="board_text">Mr. Robert Work was the 31st Deputy Secretary of Defense, serving under three different Secretaries across two administrations. Previously, he served as chief executive officer of the Center for a New American Security. From 2009 to 2013, he served as the Under Secretary of the Navy. Mr. Work served on active duty in the U.S. Marine Corps for 27 years, retiring as a Colonel in 2001. He joined the Center for Strategic and Budgetary Assessments in 2002, where he wrote and spoke extensively on defense strategy and programs, revolutions in war, Department of Defense transformation, and maritime affairs. He also was an adjunct professor at The George Washington University.</p>
          </div>
              <a class='board_link' href="https://www.thecipherbrief.com/cyber-advisory-board" style=" display: block; text-align: center; color: #d52340;">view the rest of the Cyber Advisory Board</a>

        </div>

      </div>
      <div class="holder-container">
      </div>
    </div>

  </div>

  <!-- extraneous blocks -->
  <div class="holder-container">
    <div class="promo_blocks">
      <h3>How to Subscribe</h3>
      <p>The Cipher Brief adds a layer of analysis to our reporting by identifying areas of agreement and disagreement by Cyber Advisory Board members and producing a White Paper that is available to subscribers. For more information about a Cyber Advisory Board subscription, click <a href="https://www.thecipherbrief.com/subscribe">here.</a></p>
    </div>
    <div class="promo_blocks">
      <h3>Annual Corporate Sponsorship</h3>
      <p>Companies with a dedicated commitment to thought leadership in the cyber realm are welcome to become Cyber Advisory Board sponsors. For more information on sponsorship, please contact <a href="https://www.thecipherbrief.com/subscribe">Brad Christian.</a></p>
    </div>
    <div class="promo_blocks">
      <h3>Tell Us Your Thoughts</h3>
      <p>Do you agree with the Board's findings? Disagree? Let us know your point of view and be a part of the conversation. We'll publish the most relevant subscriber contributions in the next issue. Subscribers can email us at <a href="mailto:cyberadvisoryboard@thecipherbrief.com">cyberadvisoryboard@thecipherbrief.com</a>.</p>
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
