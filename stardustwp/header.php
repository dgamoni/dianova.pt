<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php 
global $qode_options_stardust;
global $wp_query;
$disable_qode_seo = "";
$seo_title = "";
if (isset($qode_options_stardust['disable_qode_seo'])) $disable_qode_seo = $qode_options_stardust['disable_qode_seo'];
if ($disable_qode_seo != "yes") {
	$seo_title = get_post_meta($wp_query->get_queried_object_id(), "qode_seo_title", true);
	$seo_description = get_post_meta($wp_query->get_queried_object_id(), "qode_seo_description", true);
	$seo_keywords = get_post_meta($wp_query->get_queried_object_id(), "qode_seo_keywords", true);
}
?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<?php
	$responsiveness = "yes";
	if (isset($qode_options_stardust['responsiveness'])) $responsiveness = $qode_options_stardust['responsiveness'];
	if($responsiveness != "no"):
	?>
	<meta name=viewport content="width=device-width,initial-scale=1">
	<?php 
	endif;
	?>
	<title><?php if($seo_title) { ?><?php bloginfo('name'); ?> | <?php echo $seo_title; ?><?php } else {?><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?><?php } ?></title>
	<?php if ($disable_qode_seo != "yes") { ?>
	<?php if($seo_description) { ?>
	<meta name="description" content="<?php echo $seo_description; ?>">
	<?php } else if($qode_options_stardust['meta_description']){ ?>
	<meta name="description" content="<?php echo $qode_options_stardust['meta_description'] ?>">
	<?php } ?>
	<?php if($seo_keywords) { ?>
	<meta name="keywords" content="<?php echo $seo_keywords; ?>">
	<?php } else if($qode_options_stardust['meta_keywords']){ ?>
	<meta name="keywords" content="<?php echo $qode_options_stardust['meta_keywords'] ?>">
	<?php } ?>
	<?php } ?>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $qode_options_stardust['favicon_image']; ?>">
	<?php wp_head(); ?>
	

<meta name="google-site-verification" content="jT1pLqVn8FuHT9l0YubPCgBz_kzsGt0nTTXhJHIar_8" />
</head>

<body <?php body_class(); ?>>
	<?php wl_gear(); ?>
	<!-- Google Analytics start -->
	<?php if (isset($qode_options_stardust['google_analytics_code'])){
				if($qode_options_stardust['google_analytics_code'] != "") { 
	?>
		<script>
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', '<?php echo $qode_options_stardust['google_analytics_code']; ?>']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		</script>
	<?php }
		}
	?>
	<!-- Google Analytics end -->

<?php
	$header_in_grid = false;
	if ($qode_options_stardust['header_in_grid'] == "yes") $header_in_grid = true;

	$centered_logo = false;
	if (isset($qode_options_stardust['center_logo_image'])){ if($qode_options_stardust['center_logo_image'] == "yes") { $centered_logo = true; }};
?>
<div class="wrapper">
<header class="transition hide_background <?php if(isset($qode_options_stardust['header_fixed']) && $qode_options_stardust['header_fixed'] == "no"){ echo "no_fixed"; } ?><?php if($centered_logo){ echo " centered_logo"; } ?>">
	<div class="header_inner clearfix">
			
			<?php if($header_in_grid){ ?>
				<div class="container">
					<div class="container_inner clearfix">
			<?php } ?>
	
			<div class="logo"><a href="<?php echo home_url(); ?>/"><img src="<?php echo $qode_options_stardust['logo_image']; ?>" alt="Logo"/></a></div>
			<div class="header_inner_right">
				<?php
				$menu_type = $qode_options_stardust['top_menu'];
				
				?>
				<nav class="main_menu <?php  if($menu_type == "drop_down") { echo "drop_down"; } elseif($menu_type == "drop_down2") { echo "drop_down2"; } else { echo "drop_down"; } ?>">
				<?php
					
					if($menu_type == "drop_down") :
						wp_nav_menu( array( 'theme_location' => 'top-navigation' , 
																'container'  => '', 
																'container_class' => '', 
																'menu_class' => '',
																'link_before' => '<span>',
																'link_after' => '</span>',
																'menu_id' => '',
																'fallback_cb' => 'top_navigation_fallback',
																'walker' => new qode_type1_walker_nav_menu()
					 ));
					
					elseif($menu_type == "drop_down2"):
						wp_nav_menu( array( 'theme_location' => 'top-navigation' , 
																'container'  => '', 
																'container_class' => '', 
																'menu_class' => '',
																'link_before' => '<span>',
																'link_after' => '</span>',
																'menu_id' => '',
																'fallback_cb' => 'top_navigation_fallback',
																'walker' => new qode_type2_walker_nav_menu()
						 ));
					
					
					else :
						wp_nav_menu( array( 'theme_location' => 'top-navigation' , 
																'container'  => '', 
																'container_class' => '', 
																'menu_class' => '',
																'link_before' => '<span>',
																'link_after' => '</span>',
																'menu_id' => '',
																'fallback_cb' => 'top_navigation_fallback',
																'walker' => new qode_type1_walker_nav_menu()
						 ));
					endif;
				?>
				<span id="magic"></span>
				</nav>
				
				<div class='selectnav_button'><span>&nbsp;</span></div>
				
				<?php	
				$display_header_widget = $qode_options_stardust['header_widget_area'];
				if($display_header_widget == "yes"){ ?> 
					<div class="header_right_widget">
						<?php dynamic_sidebar('header_right'); ?>
					</div>
				<?php } ?>
				
			</div>

			<nav class="selectnav"></nav>
			
			<?php if($header_in_grid){ ?>
					</div>
				</div>
			<?php } ?>
	</div>
</header>
	<div class="content<?php if($centered_logo){ echo " centered_logo"; } ?>">
		<?php 
global $wp_query;
$id = $wp_query->get_queried_object_id();
$animation = get_post_meta($id, "qode_show-animation", true);

?>
			<?php if($qode_options_stardust['page_transitions'] == "1" || $qode_options_stardust['page_transitions'] == "2" || $qode_options_stardust['page_transitions'] == "3" || $qode_options_stardust['page_transitions'] == "4" || ($animation == "updown") || ($animation == "fade") || ($animation == "updown_fade") || ($animation == "leftright")){ ?>
				<div class="meta">				
					<?php if($seo_title){ ?>
						<div class="seo_title"><?php bloginfo('name'); ?> | <?php echo $seo_title; ?></div>
					<?php } else{ ?>
						<div class="seo_title"><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></div>
					<?php } ?>
					<?php if($seo_description){ ?>
						<div class="seo_description"><?php echo $seo_description; ?></div>
					<?php } else if($qode_options_stardust['meta_description']){?>
						<div class="seo_description"><?php echo $qode_options_stardust['meta_description']; ?></div>
					<?php } ?>
					<?php if($seo_keywords){ ?>
						<div class="seo_keywords"><?php echo $seo_keywords; ?></div>
					<?php }else if($qode_options_stardust['meta_keywords']){?>
						<div class="seo_keywords"><?php echo $qode_options_stardust['meta_keywords']; ?></div>
					<?php }?>
					<span id="qode_page_id"><?php echo $wp_query->get_queried_object_id(); ?></span>
					<div class="body_classes"><?php echo implode( ',', get_body_class()); ?></div>
				</div>
			<?php } ?>
			<div class="content_inner <?php echo $animation;?> ">
				
			