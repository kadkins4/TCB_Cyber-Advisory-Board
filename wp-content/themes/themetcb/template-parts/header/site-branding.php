<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */
?>
<div class="site-branding">
	<div class="wrap">
		<?php
        the_custom_logo();
        the_custom_header_banner();
		?>
        <div id="top">
            <div class="topNewsletter">
                <a href="https://www.tcbconference.com/cyber-advisory-board">Become a Subscriber</a>
            </div>
						<div id="block-menu-menu-social-media-menu" class="soc_seti">
						    <ul>
						        <li><a href="https://twitter.com/thecipherbrief" class="twitter-link" target="_blank"><i class="fa fa-twitter"></i><span>Twitter</span></a></li>
						        <li><a href="https://www.linkedin.com/company/thecipherbrief" class="linkedin-link" target="_blank"><i class="fa fa-linkedin"></i><span>Linkedin</span></a></li>
						        <li><a href="http://www.facebook.com/thecipherbrief" class="facebook-link" target="_blank"><i class="fa fa-facebook"></i><span>Facebook</span></a></li>
						        <li><a href="https://www.instagram.com/thecipherbrief/" class="instagram-link" target="_blank"><i class="fa fa-instagram"></i><span>Instagram</span></a></li>
						    </ul>
						</div>
	    </div><!-- #top -->
	</div><!-- .wrap -->
</div><!-- .site-branding -->
