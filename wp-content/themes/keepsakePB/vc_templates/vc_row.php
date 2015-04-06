<?php
$output = $el_class = $bg_image = $bg_color = $bg_image_repeat = $font_color = $padding = $margin_bottom = $css = '';
extract(shortcode_atts(array(
    'el_class'        => '',
    'bg_image'        => '',
    'bg_color'        => '',
    'bg_image_repeat' => '',
    'font_color'      => '',
    'padding'         => '',
    'margin_bottom'   => '',
    'css' => '',
    'background_style' => ''
), $atts));

wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass($el_class);

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'vc_row wpb_row '. ( $this->settings('base')==='vc_row_inner' ? 'vc_inner ' : '' ) . get_row_css_class() . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

$style = $this->buildStyle($bg_image, $bg_color, $bg_image_repeat, $font_color, $padding, $margin_bottom);

if( 'dark' == $background_style )
	$output .= '<div class="dark-wrapper">';

if(!( 'full' == $background_style ))
	$output .= '<div class="standard-wrapper container inner">';
	
	if( 'thin' == $background_style )
		$output .= '<div class="thin">';
	
		$output .= '<div class="'.$css_class.'"'.$style.'>';
		$output .= wpb_js_remove_wpautop($content);
		$output .= '</div>'.$this->endBlockComment('row');
		
	if( 'thin' == $background_style )
		$output .= '</div>';

if(!( 'full' == $background_style ))
	$output .= '</div>';
	
if( 'dark' == $background_style )
	$output .= '</div>';

echo $output;