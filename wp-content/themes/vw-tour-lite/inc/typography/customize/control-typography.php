<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class VW_Tour_Lite_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'vw-tour-lite' ),
				'family'      => esc_html__( 'Font Family', 'vw-tour-lite' ),
				'size'        => esc_html__( 'Font Size',   'vw-tour-lite' ),
				'weight'      => esc_html__( 'Font Weight', 'vw-tour-lite' ),
				'style'       => esc_html__( 'Font Style',  'vw-tour-lite' ),
				'line_height' => esc_html__( 'Line Height', 'vw-tour-lite' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'vw-tour-lite' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'vw-tour-lite-ctypo-customize-controls' );
		wp_enqueue_style(  'vw-tour-lite-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'vw-tour-lite' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-tour-lite' ),
        'Acme' => __( 'Acme', 'vw-tour-lite' ),
        'Anton' => __( 'Anton', 'vw-tour-lite' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-tour-lite' ),
        'Arimo' => __( 'Arimo', 'vw-tour-lite' ),
        'Arsenal' => __( 'Arsenal', 'vw-tour-lite' ),
        'Arvo' => __( 'Arvo', 'vw-tour-lite' ),
        'Alegreya' => __( 'Alegreya', 'vw-tour-lite' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-tour-lite' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-tour-lite' ),
        'Bangers' => __( 'Bangers', 'vw-tour-lite' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-tour-lite' ),
        'Bad Script' => __( 'Bad Script', 'vw-tour-lite' ),
        'Bitter' => __( 'Bitter', 'vw-tour-lite' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-tour-lite' ),
        'BenchNine' => __( 'BenchNine', 'vw-tour-lite' ),
        'Cabin' => __( 'Cabin', 'vw-tour-lite' ),
        'Cardo' => __( 'Cardo', 'vw-tour-lite' ),
        'Courgette' => __( 'Courgette', 'vw-tour-lite' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-tour-lite' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-tour-lite' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-tour-lite' ),
        'Cuprum' => __( 'Cuprum', 'vw-tour-lite' ),
        'Cookie' => __( 'Cookie', 'vw-tour-lite' ),
        'Chewy' => __( 'Chewy', 'vw-tour-lite' ),
        'Days One' => __( 'Days One', 'vw-tour-lite' ),
        'Dosis' => __( 'Dosis', 'vw-tour-lite' ),
        'Droid Sans' => __( 'Droid Sans', 'vw-tour-lite' ),
        'Economica' => __( 'Economica', 'vw-tour-lite' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-tour-lite' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-tour-lite' ),
        'Francois One' => __( 'Francois One', 'vw-tour-lite' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-tour-lite' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-tour-lite' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-tour-lite' ),
        'Handlee' => __( 'Handlee', 'vw-tour-lite' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-tour-lite' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-tour-lite' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-tour-lite' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-tour-lite' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-tour-lite' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-tour-lite' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-tour-lite' ),
        'Kanit' => __( 'Kanit', 'vw-tour-lite' ),
        'Lobster' => __( 'Lobster', 'vw-tour-lite' ),
        'Lato' => __( 'Lato', 'vw-tour-lite' ),
        'Lora' => __( 'Lora', 'vw-tour-lite' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-tour-lite' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-tour-lite' ),
        'Merriweather' => __( 'Merriweather', 'vw-tour-lite' ),
        'Monda' => __( 'Monda', 'vw-tour-lite' ),
        'Montserrat' => __( 'Montserrat', 'vw-tour-lite' ),
        'Muli' => __( 'Muli', 'vw-tour-lite' ),
        'Marck Script' => __( 'Marck Script', 'vw-tour-lite' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-tour-lite' ),
        'Open Sans' => __( 'Open Sans', 'vw-tour-lite' ),
        'Overpass' => __( 'Overpass', 'vw-tour-lite' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-tour-lite' ),
        'Oxygen' => __( 'Oxygen', 'vw-tour-lite' ),
        'Orbitron' => __( 'Orbitron', 'vw-tour-lite' ),
        'Patua One' => __( 'Patua One', 'vw-tour-lite' ),
        'Pacifico' => __( 'Pacifico', 'vw-tour-lite' ),
        'Padauk' => __( 'Padauk', 'vw-tour-lite' ),
        'Playball' => __( 'Playball', 'vw-tour-lite' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-tour-lite' ),
        'PT Sans' => __( 'PT Sans', 'vw-tour-lite' ),
        'Philosopher' => __( 'Philosopher', 'vw-tour-lite' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-tour-lite' ),
        'Poiret One' => __( 'Poiret One', 'vw-tour-lite' ),
        'Quicksand' => __( 'Quicksand', 'vw-tour-lite' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-tour-lite' ),
        'Raleway' => __( 'Raleway', 'vw-tour-lite' ),
        'Rubik' => __( 'Rubik', 'vw-tour-lite' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-tour-lite' ),
        'Russo One' => __( 'Russo One', 'vw-tour-lite' ),
        'Righteous' => __( 'Righteous', 'vw-tour-lite' ),
        'Slabo' => __( 'Slabo', 'vw-tour-lite' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-tour-lite' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-tour-lite'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-tour-lite' ),
        'Sacramento' => __( 'Sacramento', 'vw-tour-lite' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-tour-lite' ),
        'Tangerine' => __( 'Tangerine', 'vw-tour-lite' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-tour-lite' ),
        'VT323' => __( 'VT323', 'vw-tour-lite' ),
        'Varela Round' => __( 'Varela Round', 'vw-tour-lite' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-tour-lite' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-tour-lite' ),
        'Volkhov' => __( 'Volkhov', 'vw-tour-lite' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-tour-lite' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'vw-tour-lite' ),
			'100' => esc_html__( 'Thin',       'vw-tour-lite' ),
			'300' => esc_html__( 'Light',      'vw-tour-lite' ),
			'400' => esc_html__( 'Normal',     'vw-tour-lite' ),
			'500' => esc_html__( 'Medium',     'vw-tour-lite' ),
			'700' => esc_html__( 'Bold',       'vw-tour-lite' ),
			'900' => esc_html__( 'Ultra Bold', 'vw-tour-lite' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'' => esc_html__( 'No Fonts Style', 'vw-tour-lite' ),
			'normal'  => esc_html__( 'Normal', 'vw-tour-lite' ),
			'italic'  => esc_html__( 'Italic', 'vw-tour-lite' ),
			'oblique' => esc_html__( 'Oblique', 'vw-tour-lite' )
		);
	}
}
