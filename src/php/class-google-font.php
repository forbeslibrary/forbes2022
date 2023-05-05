<?php
/**
 * Defines a class for including Google fonts in a theme efficiently.
 *
 * @package Forbes2022
 */

namespace ForbesLibrary\WordPress\Forbes2022;

/**
 * A simple class for including Google fonts in a theme efficiently.
 *
 * Currently this only allows you to request a single font per Google_Font
 * object, but this could easily be modified to allow additional fonts.
 */
class Google_Font {
	/**
	 * The font family.
	 *
	 * @var string[] $font_family An array of font family.
	 */
	private $font_family;

	/**
	 * A list of font styles and weights expressed as a comma seperated list.
	 *
	 * @see https://developers.google.com/fonts/docs/css2
	 *
	 * @var string[] $font_styles An array of font style lists, one for each font family.
	 */
	private $font_styles;

	/**
	 * Creates a new Google Font object.
	 *
	 * @param string $font_family the name of the font family, for example 'Lato'
	 * or 'Droid Sans'.
	 * @param string $font_styles A comma separated list of styles and weights.
	 */
	public function __construct( string $font_family, $font_styles ) {
		$this->font_family = array( $font_family );
		$this->font_styles = array( $font_styles );
	}

	/**
	 * Adds a new font family to the Google Font object.
	 * 
	 * @param string $font_family the name of the font family, for example 'Lato'
	 * or 'Droid Sans'.
	 * @param string $font_styles A comma separated list of styles and weights.
	 */
	public function add_font_family( string $font_family, $font_styles ) {
		$this->font_family[] = $font_family;
		$this->font_styles[] = $font_styles;
	}

	/**
	 * Registers the neccesary WordPress hooks to add the necesarry tags to our
	 * theme so that we can use this font.
	 */
	public function register_hooks() {
		add_action(
			'wp_head',
			function () {
				echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />';
				echo '<link rel="preload" href="' . esc_url_raw( $this->get_stylesheet_url() ) . '" as="style">';
			},
			0 // 0 is high priority!
		);
		add_action(
			'wp_enqueue_scripts',
			function () {
				// Our font won't change when we update to a new version of the theme, so we
				// pass null instead of the theme version.
				// phpcs:disable WordPress.WP.EnqueuedResourceParameters.MissingVersion
				wp_enqueue_style(
					wp_unique_id( 'google-font-' ),
					$this->get_stylesheet_url(),
					array(),
					null
				);
				// phpcs:enable
			}
		);
	}

	/**
	 * Returns the Google Fonts api url with properly encoded font name and style.
	 *
	 * @return string The Google Fonts api url
	 */
	private function get_stylesheet_url() : string {
		$query_string = '';
		$font_count = count($this->font_family);
		for ($i = 0; $i < $font_count; $i++) {
			$family = $this->font_family[$i];
			$styles = $this->font_styles[$i];
			$query_string .= http_build_query(
				array(
					'family'  => $family . ':' . $styles
				)
			);
			if ($i + 1 < $font_count) {
				$query_string .= '&';
			} else {
				$query_string .= '&display=swap';
			}
		}
		return 'https://fonts.googleapis.com/css2?' . $query_string;
	}
}
