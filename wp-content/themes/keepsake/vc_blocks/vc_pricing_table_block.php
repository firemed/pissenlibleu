<?php 

/**
 * The Shortcode
 */
function ebor_pricing_table_shortcode( $atts, $content = null ) {
	extract( 
		shortcode_atts( 
			array(
				'title' => '',
				'text' => '',
				'currency' => '$',
				'amount' => '3',
				'button_text' => 'Select Plan',
				'button_url' => ''
			), $atts 
		) 
	);
	
	$lines = explode( ',', $text );
	
	$output = '<div class="pricing plan">
	<h3>'. htmlspecialchars_decode($title) .'</h3>
	<h4><span class="amount"><span>'. htmlspecialchars_decode($currency) .'</span>'. htmlspecialchars_decode($amount) .'</span></h4>
	<div class="features">
	<ul>';
	
	if( is_array($lines) ){
		foreach($lines as $line){
			$output .= '<li>'. htmlspecialchars_decode($line) .'</li>';
		}
	}
	
	$output .= '</ul>
				</div>
				<div class="select">
					<div> 
						<a href="'. esc_url($button_url) .'" class="btn inverse">'. htmlspecialchars_decode($button_text) .'</a> 
					</div>
				</div>
				</div>';

	return $output;
}
add_shortcode( 'keepsake_pricing_table', 'ebor_pricing_table_shortcode' );

/**
 * The VC Functions
 */
function ebor_pricing_table_shortcode_vc() {
	vc_map( 
		array(
			"icon" => 'keepsake-vc-block',
			"name" => __("Pricing Table", 'keepsake'),
			"base" => "keepsake_pricing_table",
			"category" => __('Keepsake WP Theme', 'keepsake'),
			'description' => 'Add a pricing table to the page.',
			"params" => array(
				array(
					"type" => "textfield",
					"heading" => __("Title", 'keepsake'),
					"param_name" => "title",
					"value" => '',
				),
				array(
					"type" => "textfield",
					"heading" => __("Currency", 'keepsake'),
					"param_name" => "currency",
					"value" => '$',
				),
				array(
					"type" => "textfield",
					"heading" => __("Amount", 'keepsake'),
					"param_name" => "amount",
					"value" => '3',
				),
				array(
					"type" => "textfield",
					"heading" => __("Button Text", 'keepsake'),
					"param_name" => "button_text",
					"value" => 'Select Plan',
				),
				array(
					"type" => "textfield",
					"heading" => __("Button URL", 'keepsake'),
					"param_name" => "button_url",
					"value" => '',
				),
				array(
					"type" => "exploded_textarea",
					"heading" => __("Pricing details, one per line", 'keepsake'),
					"param_name" => "text",
					"value" => '',
				),
			)
		) 
	);
}
add_action( 'vc_before_init', 'ebor_pricing_table_shortcode_vc' );