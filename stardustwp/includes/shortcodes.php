<?php

if (!function_exists('register_button')) {
function register_button( $buttons ) {
   array_push( $buttons, "|", "qode_shortcodes" );
   return $buttons;
}
}

if (!function_exists('add_plugin')) {
function add_plugin( $plugin_array ) {
   $plugin_array['qode_shortcodes'] = get_template_directory_uri() . '/includes/qode_shortcodes.js';
   return $plugin_array;
}
}

if (!function_exists('qode_shortcodes_button')) {
function qode_shortcodes_button() {

   if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
      return;
   }

   if ( get_user_option('rich_editing') == 'true' ) {
      add_filter( 'mce_external_plugins', 'add_plugin' );
      add_filter( 'mce_buttons', 'register_button' );
   }

}
}

add_action('init', 'qode_shortcodes_button');


if (!function_exists('no_wpautop')) {
function no_wpautop($content) 
{ 
        $content = do_shortcode( shortcode_unautop($content) ); 
        $content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content );
        return $content;
}
}
if (!function_exists('num_shortcodes')) {
function num_shortcodes($content) 
{ 
        $columns = substr_count( $content, '[pricing_cell' );
		return $columns;
}
}

/* Accordion shortcode */

if (!function_exists('accordion')) {
function accordion($atts, $content = null) {
	extract(shortcode_atts(array("accordion_type" => ""), $atts));
	return "<div class='accordion_holder $accordion_type'>" . no_wpautop($content) . "</div>";
}
}
add_shortcode('accordion', 'accordion');

/* Accordion item shortcode */

if (!function_exists('accordion_item')) {
function accordion_item($atts, $content = null) {

	extract(shortcode_atts(array("caption" => "", "title_color" => "", "background_color"  => ""), $atts));
	return "<div class='accordion_item'><h5 style='background-color: ".$background_color."; color: ".$title_color.";'><span class='control-pm'></span>".$caption."</h5><div class='accordion_content' style='background-color: ".$background_color.";'><div class='accordion_content_inner'>" . no_wpautop($content) . "</div></div></div>";
}
}
add_shortcode('accordion_item', 'accordion_item');

/* Accordion Full Width shortcode */

if (!function_exists('accordion_full_width')) {
function accordion_full_width($atts, $content = null) {
	extract(shortcode_atts(array("title" => "", "title_color" => "", "subtitle" => "", "subtitle_color" => "", "full_width" => "", "background_color" => ""), $atts));
	return "<div class='accordion full_screen $full_width' style='background-color: $background_color;'><div class='accordion_inner'><h2 style='color: ".$title_color.";'><span class='accordion_title'>$title</span> <span class='accordion_subtitle' style='color: ".$subtitle_color.";'>".$subtitle."</span><span class='arrow'></span></h2><div class='accordion_content'>" . no_wpautop($content) . "</div></div></div>";
}
}
add_shortcode('accordion_full_width', 'accordion_full_width');

/* Action shortcode */

if (!function_exists('action')) {
function action($atts, $content = null) {
	extract(shortcode_atts(array("background_color" => "", "border" => "", "border_color" => ""), $atts));
	$html =  "<div class='call_to_action";
	if($border == "yes"){
		$html .= " with_border' style='background-color: ".$background_color."; border-color: ".$border_color.";'>" . no_wpautop($content) . "</div>";
	} else {
		$html .= "' style='background-color: ".$background_color."'>" . no_wpautop($content) . "</div>";
	}

    return $html;
}
}
add_shortcode('action', 'action');

/* Blockquote shortcode */

if (!function_exists('blockquote')) {
function blockquote($atts, $content = null) {
	$html = ""; 
  extract(shortcode_atts(array("width" => ""), $atts));
	$html .= "<blockquote"; 
	if($width > 0){
		$html .= " style=width:$width%;";
	}
	$html .= ">" . no_wpautop($content) . "</blockquote>";
  return $html;
}
}
add_shortcode('blockquote', 'blockquote');

/* Buttons shortcode */

if (!function_exists('button')) {
function button($atts, $content = null) {
	global $qode_options_stardust;
	$html = "";
	extract(shortcode_atts(array("size" => "", "color"=> "", "background_color"=>"", "font_size"=>"", "line_height"=>"", "font_style"=>"", "font_weight"=>"", "text"=> "Button", "link"=> "http://qodeinteractive.com/", "target"=> "_self"), $atts));
    $html .=  '<a href="'.$link.'" target="'.$target.'" class="button '.$size.'" style="';
		if($color != ""){
			$html .= 'color: '.$color.'; ';
		}
		if($background_color != ""){
			$html .= 'background-color: '.$background_color.'; ';
		}
		if($font_size != ""){
			$html .= 'font-size: '.$font_size.'px; ';
		}
		if($line_height != ""){
			$html .= 'line-height: '.$line_height.'px; ';
		}
		if($font_style != ""){
			$html .= 'font-style: '.$font_style.'; ';
		}
		if($font_weight != ""){
			$html .= 'font-weight: '.$font_weight.'; ';
		}
		$html .= '">' . $text . '</a>';  
    return $html;
}
}
add_shortcode('button', 'button');

/* Three columns wrap shortcode */

if (!function_exists('three_col_col1')) {
function three_col_col1($atts, $content = null) {
    return '<div class="three_columns clearfix"><div class="column1"><div class="column_inner">' . do_shortcode($content) . '</div></div>';
}
}
add_shortcode('three_col_col1', 'three_col_col1');

if (!function_exists('three_col_col2')) {
function three_col_col2($atts, $content = null) {
    return '<div class="column2"><div class="column_inner">' . do_shortcode($content) . '</div></div>';
}
}
add_shortcode('three_col_col2', 'three_col_col2');

if (!function_exists('three_col_col3')) {
function three_col_col3($atts, $content = null) {
    return '<div class="column3"><div class="column_inner">' . do_shortcode($content) . '</div></div></div>';
}
}
add_shortcode('three_col_col3', 'three_col_col3');

/* Four columns wrap shortcode */

if (!function_exists('four_col_col1')) {
function four_col_col1($atts, $content = null) {
    return '<div class="four_columns clearfix"><div class="column1"><div class="column_inner">' . do_shortcode($content) . '</div></div>';
}
}
add_shortcode('four_col_col1', 'four_col_col1');

if (!function_exists('four_col_col2')) {
function four_col_col2($atts, $content = null) {
    return '<div class="column2"><div class="column_inner">' . do_shortcode($content) . '</div></div>';
}
}
add_shortcode('four_col_col2', 'four_col_col2');

if (!function_exists('four_col_col3')) {
function four_col_col3($atts, $content = null) {
    return '<div class="column3"><div class="column_inner">' . do_shortcode($content) . '</div></div>';
}
}
add_shortcode('four_col_col3', 'four_col_col3');

if (!function_exists('four_col_col4')) {
function four_col_col4($atts, $content = null) {
    return '<div class="column4"><div class="column_inner">' . do_shortcode($content) . '</div></div></div>';
}
}
add_shortcode('four_col_col4', 'four_col_col4');

/* Two columns wrap shortcode */

if (!function_exists('two_col_50_50_col1')) {
function two_col_50_50_col1($atts, $content = null) {
    return '<div class="two_columns_50_50 clearfix"><div class="column1"><div class="column_inner">' . do_shortcode($content) . '</div></div>';
}
}
add_shortcode('two_col_50_50_col1', 'two_col_50_50_col1');

if (!function_exists('two_col_50_50_col2')) {
function two_col_50_50_col2($atts, $content = null) {
    return '<div class="column2"><div class="column_inner">' . do_shortcode($content) . '</div></div></div>';
}
}
add_shortcode('two_col_50_50_col2', 'two_col_50_50_col2');

/* Two columns nested wrap shortcode */

if (!function_exists('two_col_50_50_nested_col1')) {
function two_col_50_50_nested_col1($atts, $content = null) {
    return '<div class="two_columns_50_50 clearfix"><div class="column1"><div class="column_inner">' . do_shortcode($content) . '</div></div>';
}
}
add_shortcode('two_col_50_50_nested_col1', 'two_col_50_50_nested_col1');

if (!function_exists('two_col_50_50_nested_col2')) {
function two_col_50_50_nested_col2($atts, $content = null) {
    return '<div class="column2"><div class="column_inner">' . do_shortcode($content) . '</div></div></div>';
}
}
add_shortcode('two_col_50_50_nested_col2', 'two_col_50_50_nested_col2');

/* Two columns 66_33 wrap shortcode */

if (!function_exists('two_col_66_33_col1')) {
function two_col_66_33_col1($atts, $content = null) {
    return '<div class="two_columns_66_33 clearfix"><div class="column1"><div class="column_inner">' . do_shortcode($content) . '</div></div>';
}
}
add_shortcode('two_col_66_33_col1', 'two_col_66_33_col1');

if (!function_exists('two_col_66_33_col2')) {
function two_col_66_33_col2($atts, $content = null) {
    return '<div class="column2"><div class="column_inner">' . do_shortcode($content) . '</div></div></div>';
}
}
add_shortcode('two_col_66_33_col2', 'two_col_66_33_col2');

/* Two columns 33_66 wrap shortcode */

if (!function_exists('two_col_33_66_col1')) {
function two_col_33_66_col1($atts, $content = null) {
    return '<div class="two_columns_33_66 clearfix"><div class="column1"><div class="column_inner">' . do_shortcode($content) . '</div></div>';
}
}
add_shortcode('two_col_33_66_col1', 'two_col_33_66_col1');

if (!function_exists('two_col_33_66_col2')) {
function two_col_33_66_col2($atts, $content = null) {
    return '<div class="column2"><div class="column_inner">' . do_shortcode($content) . '</div></div></div>';
}
}
add_shortcode('two_col_33_66_col2', 'two_col_33_66_col2');

/* Two columns 75_25 wrap shortcode */

if (!function_exists('two_col_75_25_col1')) {
function two_col_75_25_col1($atts, $content = null) {
    return '<div class="two_columns_75_25 clearfix"><div class="column1"><div class="column_inner">' . do_shortcode($content) . '</div></div>';
}
}
add_shortcode('two_col_75_25_col1', 'two_col_75_25_col1');

if (!function_exists('two_col_75_25_col2')) {
function two_col_75_25_col2($atts, $content = null) {
    return '<div class="column2"><div class="column_inner">' . do_shortcode($content) . '</div></div></div>';
}
}
add_shortcode('two_col_75_25_col2', 'two_col_75_25_col2');

/* Two columns 25_75 wrap shortcode */

if (!function_exists('two_col_25_75_col1')) {
function two_col_25_75_col1($atts, $content = null) {
    return '<div class="two_columns_25_75 clearfix"><div class="column1"><div class="column_inner">' . do_shortcode($content) . '</div></div>';
}
}
add_shortcode('two_col_25_75_col1', 'two_col_25_75_col1');

if (!function_exists('two_col_25_75_col2')) {
function two_col_25_75_col2($atts, $content = null) {
    return '<div class="column2"><div class="column_inner">' . do_shortcode($content) . '</div></div></div>';
}
}
add_shortcode('two_col_25_75_col2', 'two_col_25_75_col2');

/* Counter shortcode */

if (!function_exists('counter')) {
function counter($atts, $content = null) {
		extract(shortcode_atts(array("type" => "", "position" => "", "digit" => "", "font_size" => "", "font_color" => ""), $atts));
    $html = "";  
		$html .=  '<div class="counter_holder '.$position.'"';
		$html .= '><span class="counter '.$type.'"';
		if($font_color != "" || $font_size != ""){
			$html .= 'style="color:'.$font_color.'; font-size:'.$font_size.'px; height:'.$font_size.'px; line-height:'.$font_size.'px;"';
		} 
		$html .= '>'.$digit.'</span>'.no_wpautop($content).'</div>';

    return $html;
}
}
add_shortcode('counter', 'counter');

/* Dropcaps shortcode */

if (!function_exists('dropcaps')) {
function dropcaps($atts, $content = null) {
	extract(shortcode_atts(array("style" => "", "background_color" => "", "border" => "", "border_color" => ""), $atts));
	$html = "";
	$html .= "<span class='dropcap ".$style." ".$border."' style='background-color: $background_color; border-color: ".$border_color.";'>" . no_wpautop($content)  . "</span>";

	return $html;
}
}
add_shortcode('dropcaps', 'dropcaps');

/* Elegant title shortcode */

if (!function_exists('elegant_title')) {
function elegant_title($atts, $content = null) {
	extract(shortcode_atts(array("title" => "", "title_color" => "", "content" => "", "content_color" => "", "position" => "", "border_line" => "", "border_color" => ""), $atts));
	$html = ""; 
	$html .= "<div class='elegant_title_holder'";
	if($position != ""){
		$html .= " style='text-align: ".$position.";'";
	}
	$html .= "><span class='elegant_title'";
	if($title_color != ""){
		$html .= " style='color: ".$title_color.";'";
	}
	$html .= ">".$title."</span>";
	if($border_line == "yes"){
		$html .= "<span class='elegant_separator' style='background-color: ".$border_color.";'></span>";
	}
	$html .= "<h6 class='elegant_content' style='color: ".$content_color.";'>".$content."</h6></div>";

	return $html;
}
}
add_shortcode('elegant_title', 'elegant_title');

/* Elements Animation shortcode */

if (!function_exists('elements_animation')) {
function elements_animation($atts, $content = null) {
	extract(shortcode_atts(array("animation_type" => ""), $atts));
	return "<div class='$animation_type'><div>" . no_wpautop($content) . "</div></div>";
}
}
add_shortcode('elements_animation', 'elements_animation');

/* Full Width Holder shortcode */

if (!function_exists('full_width_holder')) {
function full_width_holder($atts, $content = null) {
	extract(shortcode_atts(array("full_width" => "", "padding" => "", "background_color" => ""), $atts));
	$html = ""; 
	$html .= "<div class='full_width_holder $full_width' style='background-color: $background_color;'><div class='full_width_content'><div class='full_width_text_holder'";
	if($padding != ""){
		$html .= " style='padding: 0px ".$padding."px;'";
	}
	$html .= ">" . no_wpautop($content) . "</div></div></div>";

	return $html;
}
}
add_shortcode('full_width_holder', 'full_width_holder');

/* H3 With Line shortcode */

if (!function_exists('h3_with_line')) {
function h3_with_line($atts, $content = null) {
	$html =  "<h3 class='title_with_line'>" . $content . "</h3><div class='title_with_line_separator'></div>";  
    return $html;
}
}
add_shortcode('h3_with_line', 'h3_with_line');

/* Highlights shortcode */

if (!function_exists('highlight')) {
function highlight($atts, $content = null) {
	$html =  "<span class='highlight'>" . $content . "</span>";  
    return $html;
}
}
add_shortcode('highlight', 'highlight');

/* Icons shortcode */

if (!function_exists('icon')) {
function icon($atts, $content = null) {
    extract(shortcode_atts(array("type" => "", "icon" => ""), $atts));
    $html = "";  
	$html .=  '<div class="icon retina '.$type.' '.$icon.'"></div>';

    return $html;
}
}
add_shortcode('icon', 'icon');

/* Icons With Title shortcode */

if (!function_exists('icon_with_title')) {
function icon_with_title($atts, $content = null) {
    extract(shortcode_atts(array("type" => "", "icon" => "", "position" => "", "background_color" => "", "title" => "", "title_color" => "", "text" => "", "text_color" => ""), $atts));
    $html = "";  
	$html .=  '<div class="icon_with_title '.$position.'"><div class="icons_outer"><div class="icons_holder"';
		if($background_color){
			$html .= 'style="background-color: '.$background_color.';">';
		} else {
			$html .= '>';
		}
	$html .= '<div class="icon retina '.$type.' '.$icon.'"></div></div></div><div class="icon_text_holder"><h5 style="color: '.$title_color.';">'.$title.'</h5><p style="color: '.$text_color.';">'.$text.'</p></div></div>';

    return $html;
}
}
add_shortcode('icon_with_title', 'icon_with_title');

/* Image with text shortcode */

if (!function_exists('image_with_text')) {
function image_with_text($atts, $content = null) {
	extract(shortcode_atts(array("background_color" => "", "image_link" => "", "image_title" => "", "lightbox" => "", "link" => "", "target" => ""), $atts));
	$html =  "<div class='image_with_text'";
	if($background_color != ""){
		$html .=  " style='background-color: ".$background_color.";'>";
	} else {
		$html .=  ">";
	}

	if ($lightbox == "yes"){
		$html .= "<a href='".$image_link."' title='".$image_title."' data-rel='prettyPhoto[lightbox]'><img src='".$image_link."' alt=''></a><div class='image_with_text_content'>".no_wpautop($content)."</div></div>";
	} else if($link != ""){
		$html .= "<a href='".$link."' target='".$target."' title='".$image_title."'><img src='".$image_link."' alt=''></a><div class='image_with_text_content'>".no_wpautop($content)."</div></div>";
	} else {
		$html .= "<img src='".$image_link."' alt=''><div class='image_with_text_content'>".no_wpautop($content)."</div></div>";
	}
	
	return $html;
}
}
add_shortcode('image_with_text', 'image_with_text');

/* Image with text over shortcode */

if (!function_exists('image_with_text_over')) {
function image_with_text_over($atts, $content = null) {
	extract(shortcode_atts(array("background_color" => "", "image_link" => "", "title" => "", "title_color" => "", "text" => "", "text_color" => "", "link" => "", "target" => ""), $atts));
	$html =  "<div class='image_with_text_over'>";
	if($link != ""){
		$html .= "<a href='".$link."' target='".$target."'><img src='".$image_link."' alt=''><span class='image_hover' style='background-color: ".$background_color.";'></span><span class='text_holder'><span class='text_inner'><span><h5 style='color: ".$title_color.";'>".$title."</h5><p style='color: ".$text_color.";'>".$text."</p></span></span></span></a></div>";
	} else {
		$html .= "<img src='".$image_link."' alt=''><span class='image_hover' style='background-color: ".$background_color.";'></span><span class='text_holder'><span class='text_inner'><span><h5 style='color: ".$title_color.";'>".$title."</h5><p style='color: ".$text_color.";'>".$text."</p></span></span></span></div>";
	}

	return $html;
}
}
add_shortcode('image_with_text_over', 'image_with_text_over');

/* Latest post shortcode */

if (!function_exists('latest_post')) {
function latest_post($atts, $content = null) {
	global $qode_options_stardust;
  	$html = ""; 
		extract(shortcode_atts(array("type" => "","post_number"=>"", "order_by"=>"", "order"=>"", "category" => "", "text_length"=>""), $atts));
		
		$q = new WP_Query( 
		   array( 'orderby' => $order_by, 'order' => $order, 'posts_per_page' => $post_number, 'category_name' => $category) 
		);		

		$html .= "<div class='latest_post_holder $type'><ul>";

			while($q->have_posts()) : $q->the_post();
			
				$html .= '<li class="';
				if($post_number == 2){
					$html .= 'two';
				} else if($post_number == 3){
					$html .= 'three';
				} else if($post_number == 4){
					$html .= 'four';
				} else if($post_number == 5){
					$html .= 'five';
				}

				if($text_length > 0){
					$html .= '"><div class="latest_post"><a href="'. get_permalink() .'">' . get_the_post_thumbnail(get_the_id(),'full') . '</a><div class="latest_post_text"><span>'. get_post_time('d M Y') .'</span><h5><a href="' . get_permalink() . '">' . get_the_title() . '</a></h5>' . '<p>' . substr(get_the_excerpt(), 0, intval($text_length)) . '</p></div></div></li>';
				} else {
					$html .= '"><div class="latest_post"><a href="'. get_permalink() .'">' . get_the_post_thumbnail(get_the_id(),'full') . '</a><div class="latest_post_text"><span>'. get_post_time('d M Y') .'</span><h5><a href="' . get_permalink() . '">' . get_the_title() . '</a></h5></div></div></li>';
				}
			
			endwhile;

			wp_reset_query();

		$html .= "</ul></div>";
	return $html;	
}
}
add_shortcode('latest_post', 'latest_post');

/* Message shortcode */

if (!function_exists('message')) {
function message($atts, $content = null) {
	global $qode_options_stardust;
  $html = ""; 
	extract(shortcode_atts(array("background_color"=>"", "border" => "", "border_color" => ""), $atts));
	$html .= "<div class='message";
	if($border == "yes"){
		$html .= ' with_border';
	}
	$html .= "' style='";
	if($background_color != "" || $border_color != ""){
		$html .= 'background-color: '.$background_color.'; border-color: '.$border_color.';';
	}
	
	$html .= "'><a href='#' class='close'></a>" .no_wpautop($content) . "</div>";
	
	return $html;
}
}
add_shortcode('message', 'message');

/* Ordered List shortcode */

if (!function_exists('ordered_list')) {
function ordered_list($atts, $content = null) {
    $html =  "<div class=ordered>" . $content . "</div>";  
    return $html;
}
}
add_shortcode('ordered_list', 'ordered_list');

/* Paralax shortcode */

if (!function_exists('parallax')) {
function parallax($atts, $content = null) {
	extract(shortcode_atts(array("pager" => "no",), $atts));
	$html = "";
	$html .= "<section class='parallax'>";
	if($pager == "yes"){
		$html .= '<div class="link_holder_parallax"></div>';
	}
	$html .= no_wpautop($content);
	$html .= "</section>";
	return $html;
}
}
add_shortcode('parallax', 'parallax');

if (!function_exists('parallax_section')) {
function parallax_section($atts, $content = null) {
	extract(shortcode_atts(array("id" => "", "height"=>"300", "title" => "..."), $atts));
	$parallaxes = get_post_meta(get_the_ID(), "qode_parallaxes", true);
	$html = "";
	
	foreach($parallaxes as $parallax) 
	{	
		if($parallax['imageid'] == $id) 
			{
			$html .= '<section id="'.$parallax['imageid'].'" style="background-image:url('. $parallax['parimg'] .'); background-color:'. $parallax['parcolor'] .';" data-height="' . $height . '" data-title="' . $title . '">';
			$html .= '<div class="parallax_content">';
			$html .= no_wpautop($content);
			$html .= '</div>';
			$html .= '</section>';
		}			
	}
	
	return $html;
}
}
add_shortcode('parallax_section', 'parallax_section');

/* Pie Chart shortcode */

if (!function_exists('pie_chart')) {
function pie_chart($atts, $content = null) {
	extract(shortcode_atts(array("type" => "", "title" => "", "title_color" => "", "percent"=> "100", "percentage_color" => "", "active_color" => "", "noactive_color" => "", "line_width" => ""), $atts));
    $html =  "<div class='pie_chart_holder ".$type."'><div class='percentage' data-percent='".$percent."' data-linewidth='".$line_width."' data-active='".$active_color."' data-noactive='".$noactive_color."' style='color: ".$percentage_color.";'><span class='tocounter'>".$percent."</span>%</div>";

    if(empty($title) && (empty($content) || $content == null || $content == "")){
    	$html .= "</div>"; 
    } else {
    	$html .= "<div class='pie_chart_text'><h5 style='color: ".$title_color.";' >".$title."</h5>" . no_wpautop($content) . "</div></div>";
    } 

    return $html;
}
}
add_shortcode('pie_chart', 'pie_chart');

/* Portfolio shortcode */

if (!function_exists('portfolio_list')) {
function portfolio_list($atts, $content = null) {
	global $qode_options_stardust;
	global $wp_query;
	$html = "";
	extract(shortcode_atts(array("type" => "normal", "columns" => "3", "order_by" => "menu_order" , "order" => "ASC" , "number"=>"-1", "filter"=>'no', "lightbox"=>'yes', "category"=>"", "selected_projects"=>"", "show_load_more" => "yes"), $atts));
	
	if($filter == "yes"){
		$html .= "<div class='filter_holder_outer'><div class='filter_holder'>
						<ul>
						<li class='label'><span data-label='". __('Filter Work','qode') ."'>". __('Filter Work','qode') ."</span>
						<div class='arrow'></div>
						</li>
						<li class='filter' data-filter='all'><span>". __('All','qode') ."</span></li>";
				if ($category == "") {
					$args = array(
						'parent'  => 0
					);
					$portfolio_categories = get_terms( 'portfolio_category',$args);
				} else {
					$top_category = get_term_by('slug',$category,'portfolio_category');
					$term_id = '';
					if (isset($top_category->term_id)) $term_id = $top_category->term_id;
					$args = array(
						'parent'  => $term_id
					);
					$portfolio_categories = get_terms( 'portfolio_category',$args);
				}
				foreach($portfolio_categories as $portfolio_category) {
					$html .=	"<li class='filter' data-filter='$portfolio_category->slug'><span>$portfolio_category->name</span>";
					$args = array(
						'child_of' => $portfolio_category->term_id
					);
					// $portfolio_categories2 = get_terms( 'portfolio_category',$args);
					
					// if(count($portfolio_categories2) > 0){
						// $html .= '<ul>';
						// foreach($portfolio_categories2 as $portfolio_category2) {
							// $html .=	"<li class='filter' data-filter='.$portfolio_category2->slug'><span>$portfolio_category2->name</span></li>";
						// }
						// $html .= '</ul>';
					// }
					
					$html .= '</li>';
				}
		$html .= "</ul></div></div>";
	}
	

	
	$portfoli_single_class = "portfolio_view_single";
	if(isset($qode_options_stardust['portfolio_open_single_on_portfolio_page'])){
		if($qode_options_stardust['portfolio_open_single_on_portfolio_page'] == "no") {
			$portfoli_single_class = "no_portfolio_view_single";			
		} else {
			$portfoli_single_class = "portfolio_view_single";
		}
	}

	
	$html .= "<div class='projects_holder_outer'>";

	if($type == "normal"){
		$html .= "<div class='projects_holder portfolio_hover $type v$columns'>\n";
	} else if ($type == "with_text"){
		$html .= "<div class='projects_holder $type v$columns'>\n";
	} else if ($type == "big_space"){
		$html .= "<div class='projects_holder with_text $type v$columns'>\n";
	} else if ($type == "no_space"){
		$html .= "<div class='projects_holder portfolio_hover $type v$columns'>\n";
	}

	if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
	elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
	else { $paged = 1; }
	if ($category == "") {
		$args = array(
			'post_type'=> 'portfolio_page',
			'orderby' => $order_by,
			'order' => $order,
			'posts_per_page' => $number,
			'paged' => $paged
		);
	} else {
		$args = array(
			'post_type'=> 'portfolio_page',
			'portfolio_category' => $category,
			'orderby' => $order_by,
			'order' => $order,
			'posts_per_page' => $number,
			'paged' => $paged
		);
	}
	$project_ids = null;
	if ($selected_projects != "") {
		$project_ids = explode(",",$selected_projects);
		$args['post__in'] = $project_ids;
	}
	query_posts( $args );
	if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	
	$portfoli_single_class = "portfolio_view_single";
	if(isset($qode_options_stardust['portfolio_open_single_on_portfolio_page'])){
		if($qode_options_stardust['portfolio_open_single_on_portfolio_page'] == "no") {
			$portfoli_single_class = "no_portfolio_view_single";			
		} else {
			$portfoli_single_class = "portfolio_view_single";
		}
	}
	
	if(get_post_meta(get_the_ID(), "qode_open-single-on-portfolio", true) == "no") {
		$portfoli_single_class = "no_portfolio_view_single";
	}
	if(get_post_meta(get_the_ID(), "qode_open-single-on-portfolio", true) == "yes") {
		$portfoli_single_class = "portfolio_view_single";
	}
	$terms = wp_get_post_terms(get_the_ID(),'portfolio_category');
	$html .= "<article class='mix ";
	foreach($terms as $term) {
		$html .= "$term->slug ";
	}

    $title = get_the_title();
    $featured_image_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' ); //original size  
    $large_image = $featured_image_array[0];
    $slug_list_ = "pretty_photo_gallery";
	

	$html .="'";
	$html .=">";
	if($type == "normal" || $type == "no_space") {
		$html .= "<div class='image'><a class='" . $portfoli_single_class . "' href='". get_permalink() ."'>".get_the_post_thumbnail()."</a></div>";

			$html .= "<div class='image_hover'><a href='". get_permalink() ."' class='" . $portfoli_single_class . "'>";
			if(get_post_meta(get_the_ID(), "qode_portfolio-image-hover", true) != ""){
				$html .= "<img src='".get_post_meta(get_the_ID(), "qode_portfolio-image-hover", true)."' alt='' />";
			} else {
				$html .=  get_the_post_thumbnail();
			}
			
			$html .= '<div class="text_holder"><div class="text_holder_inner"><h3 class="portfolio_title">'. get_the_title() .'</h3><p class="category">';
				$k=1;
				foreach($terms as $term) {
					$html .= "$term->name";
					if(count($terms) != $k){
						$html .= ', ';
					}
				$k++;
				}
			$html .= '</p></div></div></a>';
				
			if($lightbox == "yes"){
				$html .= "<a class='lightbox' title='" . $title . "' href='" . $large_image . "' data-rel='prettyPhoto[".$slug_list_."]'></a></div>";
			} else {
				$html .= "</div>";
			}
	}

	if($type == "with_text" || $type == "big_space") {
		$html .= "<div class='image'><a href='". get_permalink() ."' class='" . $portfoli_single_class . "'>".get_the_post_thumbnail()."<div class='image_hover'></div></a>";

		if($lightbox == "yes"){
			$html .= "<a class='lightbox' title='" . $title . "' href='" . $large_image . "' data-rel='prettyPhoto[".$slug_list_."]'></a></div>";
		} else {
			$html .= "</div>";
		}
				
		
		$html .= "<div class='text_holder'><div class='text_holder_inner'>";
		$html .= "<h4 class='portfolio_title'><a href='". get_permalink() ."' class='" . $portfoli_single_class . "'>" . get_the_title() . "</a></h4>";
		$html .= '<p class="category">';
			$k=1;
			foreach($terms as $term) {
				$html .= "$term->name";
				if(count($terms) != $k){
					$html .= ', ';
				}
			$k++;
			}
		$html .= '</p></div></div>';
		
	}
	
	$html .= "</article><div class='article_big_content";
	if($type != "no_space") {
		$html .= " margin_on_portfolio_open";
	}
	
	$html .= "'><div class='article_big_content_inner'></div></div>\n";						
	endwhile; 
	
	$i = 1;
	while ($i <= $columns) {
		$i++;
		$html .= "<div class='filler'></div>\n";
	}
	
	else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.','qode'); ?></p>
	<?php endif; 	
	
	
	$html .= "</div>";
	if(get_next_posts_link()) {
		if($show_load_more == "yes" || $show_load_more == ""){
			$html .= '<div class="portfolio_paging"><span rel="'. $wp_query->max_num_pages .'" class="load_more">'. get_next_posts_link(__('Load More','qode')) . '</span></div>';
		}
	}
	$html .= "</div>";
	wp_reset_query();	
    return $html;
}
}
add_shortcode('portfolio_list', 'portfolio_list');

/* Portfolio slider */

if (!function_exists('portfolio_slider')) {
function portfolio_slider($atts, $content = null) {
	global $wp_query; 
	$html = "";
	extract(shortcode_atts(array("order_by" => "", "order" => "", "number"=>"-1", "category"=>"", "selected_projects"=>""), $atts));
	
		if ($category == "") {
		$args = array(
			'post_type'=> 'portfolio_page',
			'orderby' => $order_by,
			'order' => $order,
			'posts_per_page' => $number
		);
	} else {
		$args = array(
			'post_type'=> 'portfolio_page',
			'portfolio_category' => $category,
			'orderby' => $order_by,
			'order' => $order,
			'posts_per_page' => $number
		);
	}
	$project_ids = null;
	if ($selected_projects != "") {
		$project_ids = explode(",",$selected_projects);
		$args['post__in'] = $project_ids;
	}
	
	query_posts( $args );
	
	
	$html .= '<div class="slider_small';
	if($wp_query->post_count < 5) {
		$html .= ' hide_arrows turn_off';
	} else {
		$html .= ' turn_on';
	}
	
	$html .= '"><div class="slider_small_holder"><div class="slider_small_holder_inner"><ul class="slider">';

	if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	$html .= '<li><div class="slide_item">';
	$html .= "<div class='image'>";
	$html .= "<div class='slider_small_hover'><div class='slider_small_hover_overlay'></div>";
	$html .= "<a href='". get_permalink() ."' class='more'><span class='slider_small_text_holder'>";
	$html .= "<span class='slider_small_title'>" . get_the_title() . "</span>";
	$html .= '<p>';
		$k=1;
		$terms = wp_get_post_terms(get_the_ID(),'portfolio_category');
		foreach($terms as $term) {
			$html .= "$term->name";
			if(count($terms) != $k){
				$html .= ', ';
			}
		$k++;
		}
	$html .= '</p></span></a></div>';
	$html .= "<a href='". get_permalink() ."'>".get_the_post_thumbnail()."</a></div></div></li>";
	
	endwhile;
		$html .= "</ul>";
	else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.','qode'); ?></p>
	<?php endif; 	
	wp_reset_query();	
	
	$html .= "</div></div></div>";
    return $html;
}
}
add_shortcode('portfolio_slider', 'portfolio_slider');

/* Pricing table shortcode */

if (!function_exists('pricing_table')) {
function pricing_table($atts, $content = null) {
  $html = ""; 
	extract(shortcode_atts(array(), $atts));
    	$html .=  "<div class='price_tables clearfix";
		$html .= "'>" . no_wpautop($content) . "</div>";  
    return $html;
}
}
add_shortcode('pricing_table', 'pricing_table');

/* Pricing table column shortcode */

if (!function_exists('pricing_column')) {
function pricing_column($atts, $content = null) {
  $html = ""; 
	extract(shortcode_atts(array("type" => "","title" => '', "price" => "0", "currency" => "$", "price_period" => "/mo", "link" => "", "button_text" => "Buy Now", "active"=>""), $atts));
	$html .=  "<div class='price_table ".$type."'><div class='price_table_inner";
	if($active == "yes"){
		$html .= " active'>";
	} else {
		$html .= "'>";
	}
	$html .= "<ul><li class='prices'><div class='price_in_table'><sup class='value'>".$currency."</sup><span class='price'>".$price."</span><sub class='mark'>".$price_period."</sub></div></li><li class='cell table_title'>$title</li>" . no_wpautop($content) . "<li class='price_button'><a class='button tiny' href='$link'>".$button_text."</a></li></ul></div></div>";
	
    return $html;
}
}
add_shortcode('pricing_column', 'pricing_column');

/* Pricing table cell shortcode */

if (!function_exists('pricing_cell')) {
function pricing_cell($atts, $content = null) {
	extract(shortcode_atts(array(), $atts));
    $html =  "<li class='cell'>" . no_wpautop($content) . "</li>"; 
	return $html;
}
}
add_shortcode('pricing_cell', 'pricing_cell');

/* Progress bars horizontal shortcode */

if (!function_exists('progress_bars')) {
function progress_bars($atts, $content = null) {
	extract(shortcode_atts(array(), $atts));
    $html =  "<div class='progress_bars'>" . no_wpautop($content) . "</div>";  
    return $html;
}
}
add_shortcode('progress_bars', 'progress_bars');

/* Progress bar horizontal shortcode */

if (!function_exists('progress_bar')) {
function progress_bar($atts, $content = null) {
	extract(shortcode_atts(array("title" => "", "percent"=> "100", "color" => "", "percent_color" => "", "active_background_color" => "", "noactive_background_color" => "", "height" => ""), $atts));
	$html =  "<div class='progress_bar'><span class='progress_title'><h5 style='color: ".$color.";'>$title</h5></span><span class='progress_number' style='color: ".$percent_color.";'><span>".$percent."</span>%</span> <div class='progress_content_outer' style='height: ".$height."px; background-color: ".$noactive_background_color.";'><div data-percentage='$percent' class='progress_content' style='height: ".$height."px; background: ".$active_background_color.";'></div></div></div>"; 

    return $html;
}
}
add_shortcode('progress_bar', 'progress_bar');

/* Progress bars vertical shortcode */

if (!function_exists('progress_bars_vertical')) {
function progress_bars_vertical($atts, $content = null) {
	extract(shortcode_atts(array(), $atts));
    $html =  "<div class='progress_bars_vertical_holder'>" . no_wpautop($content) . "</div>";  
    return $html;
}
}
add_shortcode('progress_bars_vertical', 'progress_bars_vertical');

/* Progress bar vertical shortcode */

if (!function_exists('progress_bar_vertical')) {
function progress_bar_vertical($atts, $content = null) {
	extract(shortcode_atts(array("title" => "", "percent" => "100", "background_color" => "",  "percentage_color" => "", "text_color" => "", "text_size" => ""), $atts));
    $html =  "<div class='progress_bars_vertical'><div class='progress_content_outer'><div data-percentage='$percent' class='progress_content' style='background-color: $background_color;'></div></div><span class='progress_number' style='color: ".$percentage_color."; font-size: ".$text_size."px;'><span>$percent</span>%</span><span class='progress_title' style='color: ".$text_color."; font-size: ".$text_size."px;'>$title</span><span class='progress_text' style='font-size: ".$text_size."px;'>" . no_wpautop($content) . "</span></div>"; 

    return $html;
}
}
add_shortcode('progress_bar_vertical', 'progress_bar_vertical');

/* Separator shortcode */

if (!function_exists('separator')) {
function separator($atts, $content = null) {
    extract(shortcode_atts(array("type" => "","color" => "", "thickness" => "", "up" => "","down" => ""), $atts));
		$html =  '<div style="';
		if($up != ""){
		$html .= "margin-top:". $up ."px;";
		}
		if($down != ""){
		$html .= "margin-bottom:". $down ."px;"; 
		}
		if($color != ""){
		$html .= "background-color: ". $color .";";
		}
		if($thickness != ""){
		$html .= "height:". $thickness ."px;";
		}
		$html .= '" class="separator '.$type.'"></div>';  
		
    return $html;
}
}
add_shortcode('separator', 'separator');

/* Services shortcode */

if (!function_exists('service')) {
function service($atts, $content = null) {
    $html = ""; 
	extract(shortcode_atts(array("type"=>"top", "title" => "", "color" => "", "border" => "", "border_color" => "", "link" => "", "target" => "") , $atts));	
	$html .= '<div class="circle_item circle_'.$type.'">';
	if ($link == "")
		$html .= '<div class="circle '.$border.'" style="color: '.$color.'; border-color: '.$border_color.';"><div>'.$title.'</div></div><div class="text">';
	else
		$html .= '<div class="circle '.$border.'" style="border-color: '.$border_color.';"><a href="'.$link.'" target="'.$target.'"><div>'.$title.'</div></a></div><div class="text">';
	$html .= no_wpautop($content);
	$html .= '</div></div>';
	
	return $html;
}
}
add_shortcode('service', 'service');

/* Social Icons shortcode */

if (!function_exists('social_icons')) {
function social_icons($atts, $content = null) {
    extract(shortcode_atts(array("style" => ""), $atts));
    $html = ""; 
    $html .=  "       <ul class='social_menu $style'>";  
    $social_icons_array = explode(",", $content);
    for ($i = 0 ; $i < count($social_icons_array) ; $i = $i + 2)
    {
		$html .=  "<li class='" . trim($social_icons_array[$i]) . "'><a href='" . trim($social_icons_array[$i + 1]) . "' target='_blank'><span class='inner'>" . trim($social_icons_array[$i]) . "</span></a></li>";   
    }
     $html .=  "           </ul>";


    return $html;
}
}
add_shortcode('social_icons', 'social_icons');

/* Social Share shortcode */

if (!function_exists('social_share')) {
function social_share($atts, $content = null) {
	global $qode_options_stardust;
	if(isset($qode_options_stardust['twitter_via']) && !empty($qode_options_stardust['twitter_via'])) {
		$twitter_via = " via " . $qode_options_stardust['twitter_via'];
	} else {
		$twitter_via = 	"";
	}
    $html = "";  
	if(isset($qode_options_stardust['enable_social_share']) && $qode_options_stardust['enable_social_share'] == "yes") { 
		$post_type = get_post_type();
		if(isset($qode_options_stardust["post_types_names_$post_type"])) {
			if($qode_options_stardust["post_types_names_$post_type"] == $post_type) {
			if($post_type == "portfolio_page") {
				$html .= '<div class="portfolio_social_share">';
			}
				$html .= '<span class="social_share_holder">';
				$html .= '<span class="social_share_icon"><span></span>' . __('Share','qode') . '</span>';	
					$html .= '<ul class="scoial_share_dropdown">';
					if(isset($qode_options_stardust['enable_facebook_share']) &&  $qode_options_stardust['enable_facebook_share'] == "yes") { 
						$html .= '<li class="facebook_share">';
						$html .= '<a href="#" onclick="window.open(\'http://www.facebook.com/sharer.php?s=100&amp;p[title]=' . get_the_title() . '&amp;p[summary]=' . get_the_excerpt() . '&amp;p[url]=' . urlencode(get_permalink()) . '&amp;&p[images][0]=';
						if(function_exists('the_post_thumbnail')) {
							$html .=  wp_get_attachment_url(get_post_thumbnail_id());
						}
						$html .='\', \'sharer\', \'toolbar=0,status=0,width=620,height=280\');" href="javascript: void(0)">';
						if(!empty($qode_options_stardust['facebook_icon'])) {
							$html .= '<img src="' . $qode_options_stardust["facebook_icon"] . '" />';
						} else { 
							$html .= '<span class="social_image"><span class="social_image_inner"></span></span>';
						} 
						$html .= "<span class='share_text'>" . __('Facebook','qode') . "</span>";
						$html .= "</a>";
						$html .= "</li>";
						} 
						if($qode_options_stardust['enable_twitter_share'] == "yes") { 
							$html .= '<li class="twitter_share">';
							$html .= '<a href="#" onclick="popUp=window.open(\'http://twitter.com/share?url=' . urlencode(get_permalink()) . '&text=' . urlencode(the_excerpt_max_charlength(mb_strlen(get_permalink())) . $twitter_via) . '&count=horiztonal\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;" target="_blank" rel="nofollow">';
									if(!empty($qode_options_stardust['twitter_icon'])) { 
										$html .= '<img src="' . $qode_options_stardust["twitter_icon"] . '" />';
									 } else { 
										$html .= '<span class="social_image"><span class="social_image_inner"></span></span>';
									 }
									$html .= "<span class='share_text'>" . __('Twitter','qode') . "</span>";
								$html .= "</a>";
							$html .= "</li>";
						 } 
						if($qode_options_stardust['enable_google_plus'] == "yes") { 
							$html .= '<li  class="google_share">';
							$html .= '<a href="#" onclick="popUp=window.open(\'https://plus.google.com/share?url=' . urlencode(get_permalink()) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false">';
									if(!empty($qode_options_stardust['google_plus_icon'])) { 
										$html .= '<img src="' . $qode_options_stardust['google_plus_icon'] . '" />';
									} else { 
										$html .= '<span class="social_image"><span class="social_image_inner"></span></span>';
									 } 
									$html .= "<span class='share_text'>" . __('Google +','qode') . "</span>";
								$html .= "</a>";
							$html .= "</li>";
						 }
						$html .= "</ul>";
				$html .= "</span>";
				if($post_type == "portfolio_page") {
					$html .= '</div>';
				}
			} 
		}  
	}
    return $html;
}
}
add_shortcode('social_share', 'social_share');

/* Tabs shortcode */

if (!function_exists('tabs')) {
function tabs( $atts, $content = null ) {
  $html = ""; 
	extract(shortcode_atts(array("type" => "", "border" => ""), $atts));
	$html .= '<div class="tabs '.$border.' '.(isset($atts['type'])?$atts['type']:'').'">';
	$html .= '<ul class="tabs-nav">';
	$key = array_search((isset($atts['type'])?$atts['type']:''),$atts);
		if($key!==false){
			unset($atts[$key]);
	}
	foreach ($atts as $key => $tab) {
		if(stripos($key, "tabid") !== false){
			$html .= '<li><a href="#' . $key . '">' . $tab . '</a></li>';
		}
	}
	$html .= '</ul>';
	$html .= '<div class="tabs-container">';
	$html .= no_wpautop($content) .'</div></div>';
	return $html;
}
}
add_shortcode('tabs', 'tabs');

/* Tab shortcode */

if (!function_exists('tab')) {
function tab( $atts, $content = null ) {
  $html = ""; 
	extract(shortcode_atts(array(), $atts));
	$html .= '<div id="tabid' . $atts['id'] . '" class="tab-content">' . no_wpautop($content) .'</div>';
	return $html;
}
}
add_shortcode('tab', 'tab');

/* Table shortcode */

if (!function_exists('table')) {
function table($atts, $content = null) {
  $html = ""; 
	extract(shortcode_atts(array(), $atts));
    $html .=  "<table class='standard-table'><tbody>" . no_wpautop($content) . "</tbody></table>";  
    return $html;
}
}
add_shortcode('table', 'table');

/* Table row shortcode */

if (!function_exists('table_row')) {
function table_row($atts, $content = null) {
	extract(shortcode_atts(array(), $atts));
    $html =  "<tr>" . no_wpautop($content) . "</tr>";  
    return $html;
}
}
add_shortcode('table_row', 'table_row');

/* Table head cell shortcode */

if (!function_exists('table_cell_head')) {
function table_cell_head($atts, $content = null) {
	extract(shortcode_atts(array(), $atts));
    $html =  "<th><h5>" . no_wpautop($content) . "</h5></th>";  
    return $html;
}
}
add_shortcode('table_cell_head', 'table_cell_head');

/* Table body cell shortcode */

if (!function_exists('table_cell_body')) {
function table_cell_body($atts, $content = null) {
	extract(shortcode_atts(array(), $atts));
    $html =  "<td>" . no_wpautop($content) . "</td>";  
    return $html;
}
}
add_shortcode('table_cell_body', 'table_cell_body');

/* Testimonial shortcode */

if (!function_exists('testimonial')) {
function testimonial($atts, $content = null) {
	extract(shortcode_atts(array("name_color" => "","background_color" => "", "border" => "", "border_color" => "", "name" => "", "position" => "", "image_link" => ""), $atts));
  	$html = ""; 	
		$html .=  "<div class='testimonial";
		if($border == "yes"){
			$html .= " with_border' style='background-color: $background_color; border-color: ".$border_color.";'><div class='testimonial_inner";
		} else {
			$html .= "' style='background-color: $background_color;'><div class='testimonial_inner";
		}
		if($image_link == ""): $html .= " no_image"."'>"; endif;
		if($image_link !==""): $html .= "'><div class='image'><img src='$image_link' /></div>"; endif;
		$html .= "<div class='text'><span class='name' style='color: ".$name_color.";'>".$name."</span><p>". no_wpautop($content) ."</p></div></div></div>";
										
    	return $html;
}
}
add_shortcode('testimonial', 'testimonial');

/* Unordered List shortcode */

if (!function_exists('unordered_list')) {
function unordered_list($atts, $content = null) {
    extract(shortcode_atts(array("style" => "", "animate" => ""), $atts));
    $html =  "<div class='list $style";
    if($animate == "yes"){
    	$html .= " animate_list'>" . $content . "</div>";	
    } else {
    	$html .= "'>" . $content . "</div>";
   	}
     
    return $html;
}
}
add_shortcode('unordered_list', 'unordered_list');

/* Video shortcode */

if (!function_exists('video')) {
function video($atts, $content = null) {
    $html = ""; 
	extract(shortcode_atts(array("type"=>"youtube", "id"=>"", "height"=>"") , $atts));	
	$html .= "<div class='video_holder'>"; 
	if($type == 'youtube'){
		$html .= '<iframe title="YouTube video player" height="' . $height . '" src="http://www.youtube.com/embed/' . $id . '?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>';
	}elseif($type == 'vimeo'){
		$html .= '<iframe src="http://player.vimeo.com/video/' . $id . '" height="' . $height . '" frameborder="0"></iframe>';
	}
	$html .= "</div>"; 
	return $html;
}
}
add_shortcode('video', 'video');