<?php
/**
 * Advanced Ads Content Ad Type
 *
 * @package   Advanced_Ads
 * @author    Thomas Maier <thomas.maier@webgilde.com>
 * @license   GPL-2.0+
 * @link      http://webgilde.com
 * @copyright 2014 Thomas Maier, webgilde GmbH
 *
 * Class containing information about the content ad type
 * this should also work as an example for other ad types
 *
 * see also includes/ad-type-abstract.php for basic object
 *
 */
class Advanced_Ads_Ad_Type_Content extends Advanced_Ads_Ad_Type_Abstract{

	/**
	 * ID - internal type of the ad type
	 *
	 * must be static so set your own ad type ID here
	 * use slug like format, only lower case, underscores and hyphens
	 *
	 * @since 1.0.0
	 */
	public $ID = 'content';

	/**
	 * set basic attributes
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		$this->title = __( 'Rich Content', 'advanced-ads' );
		$this->description = __( 'The full content editor from WordPress with all features like shortcodes, image upload or styling, but also simple text/html mode for scripts and code.', 'advanced-ads' );
		$this->parameters = array(
			'content' => ''
		);

		add_filter( 'advanced-ads-save-options', array( $this, 'save_ad_options' ), 10, 2);
	}


	/**
	 * output for the ad parameters metabox
	 *
	 * this will be loaded using ajax when changing the ad type radio buttons
	 * echo the output right away here
	 * name parameters must be in the "advanced_ads" array
	 *
	 * @param obj $ad ad object
	 * @since 1.0.0
	 */
	public function render_parameters($ad){
		// load tinymc content exitor
		$content = (isset($ad->content)) ? $ad->content : '';

		/**
		 * build the tinymc editor
		 * @link http://codex.wordpress.org/Function_Reference/wp_editor
		 *
		 * don’t build it when ajax is used; display message and buttons instead
		 */
		if ( defined( 'DOING_AJAX' ) ){ ?>
			<textarea id="advads-ad-content-plain" style="display:none;" cols="40" rows="10" name="advanced_ad[content]"><?php echo esc_textarea( $content ); ?></textarea>
		<?php
		} else {
			if ( ! user_can_richedit() ) {
				$content = esc_textarea( $content );
			}
			$args = array(
				'textarea_name' => 'advanced_ad[content]',
				'textarea_rows' => 10,
				'drag_drop_upload' => true
			);
			wp_editor( $content, 'advanced-ad-parameters-content', $args );
		} ?><br class="clear"/><?php
		include ADVADS_BASE_PATH . 'admin/views/ad-info-after-textarea.php';
	}

	/**
	 * sanitize content field on save
	 *
	 * @param str $content ad content
	 * @return str $content sanitized ad content
	 * @since 1.0.0
	 */
	public function sanitize_content($content = ''){
		// use WordPress core content filter
		$content = apply_filters( 'content_save_pre', $content );
		
		// remove slashes from content
		$content = wp_unslash( $content );
		return $content;
	}

	/**
	 * prepare the ads frontend output
	 *
	 * @param obj $ad ad object
	 * @return str $content ad content prepared for frontend output
	 * @since 1.0.0
	 */
	public function prepare_output($ad){

		// apply functions normally running through the_content filter
		// the_content filter is not used here because it created an infinite loop (ads within ads for "before content" and other auto injections)
		// maybe the danger is not here yet, but changing it to use the_content filter changes a lot

		$output = $ad->content;

		if ( isset( $GLOBALS['wp_embed'] ) ) {
			// temporarily replace the global $post variable with the current ad (post)
			$old_post = $GLOBALS['post'];
			$GLOBALS['post'] = $ad->id;

			// get the [embed] shortcode to run before wpautop()
			$output = $GLOBALS['wp_embed']->run_shortcode( $output );
			// attempts to embed all URLs in a post
			$output = $GLOBALS['wp_embed']->autoembed( $output );

			$GLOBALS['post'] = $old_post;
		}

		$output = wptexturize( $output );
		$output = convert_smilies( $output );
		$output = convert_chars( $output );
		$output = wpautop( $output );
		$output = shortcode_unautop( $output );
		$output = $this->do_shortcode( $output, $ad );
		$output = prepend_attachment( $output );
		// make included images responsive, since WordPress 4.4
		if( ! defined( 'ADVADS_DISABLE_RESPONSIVE_IMAGES' ) && function_exists( 'wp_make_content_images_responsive' ) ){
			$output = wp_make_content_images_responsive( $output );
		}

		return $output;
	}

	/**
	 * Add ad options.
	 *
	 * @param array $options Ad options.
	 * @param obj $ad Advanced_Ads_Ad.
	 * @retutn array $options Ad options.
	 */
	public function save_ad_options( $options, $ad ) {
		if ( $ad->type === $this->ID ) {
			$pattern = get_shortcode_regex( array( 'the_ad', 'the_ad_group', 'the_ad_placement' ) );
			if ( preg_match( '/' . $pattern . '/s', $ad->content, $matches ) ) {
				$options['output']['has_shortcode'] = true;
			};
		}
		return $options;
	}

	/**
	 * Process shortcodes.
	 *
	 * @param str $output Ad content.
	 * @return obj Advanced_Ads_Ad
	 */
	private function do_shortcode( $output, Advanced_Ads_Ad $ad ) {
		$ad_options = $ad->options();

		if ( ! empty( $ad_options['output']['has_shortcode'] ) ) {
			// Store arguments so that shortcode hooks can access it.
			$ad_args = $ad->args;
			$ad_args['shortcode_ad_id'] = $ad->id;
			$output = preg_replace( '/\[(the_ad_group|the_ad_placement|the_ad)/', '[$1 ad_args="' . urlencode( json_encode( $ad_args ) )  . '"', $output );
		}

		$output = do_shortcode( $output );
		return $output;
	}

}
