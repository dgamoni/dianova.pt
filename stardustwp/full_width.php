<?php 
/*
Template Name: Full Width
*/ 
?>

<?php 
global $wp_query;
$id = $wp_query->get_queried_object_id();
$sidebar = get_post_meta($id, "qode_show-sidebar", true);  

if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
else { $paged = 1; }

if(get_post_meta($id, "qode_responsive-title-image", true) != ""){
 $responsive_title_image = get_post_meta($id, "qode_responsive-title-image", true);
}else{
	$responsive_title_image = $qode_options_stardust['responsive_title_image'];
}

if(get_post_meta($id, "qode_fixed-title-image", true) != ""){
 $fixed_title_image = get_post_meta($id, "qode_fixed-title-image", true);
}else{
	$fixed_title_image = $qode_options_stardust['fixed_title_image'];
}

if(get_post_meta($id, "qode_title-image", true) != ""){
 $title_image = get_post_meta($id, "qode_title-image", true);
}else{
	$title_image = $qode_options_stardust['title_image'];
}

if(get_post_meta($id, "qode_title-height", true) != ""){
 $title_height = get_post_meta($id, "qode_title-height", true);
}else{
	$title_height = $qode_options_stardust['title_height'];
}

$title_in_grid = false;
if(isset($qode_options_stardust['title_in_grid'])){
if ($qode_options_stardust['title_in_grid'] == "yes") $title_in_grid = true;
}


?>
	<?php get_header(); ?>
		<?php if(!get_post_meta($id, "qode_show-page-title", true)) { ?>
			<div class="title <?php if(get_post_meta($id, "qode_page-subtitle-text", true) == "") {echo 'no_subtitle ';} if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "yes"){ echo 'has_fixed_background '; } if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "no"){ echo 'has_background'; } if($responsive_title_image == 'yes'){ echo 'with_image'; } ?>" <?php if($responsive_title_image == 'no' && $title_image != ""){ echo 'style="background-image:url('.$title_image.'); height:'.$title_height.'px;"'; }?>>
				<?php if($responsive_title_image == 'yes' && $title_image != ""){ echo '<img src="'.$title_image.'" alt="title" />'; } ?>
				<?php if($title_in_grid){ ?>
				<div class="container">
					<div class="container_inner clearfix">
				<?php } ?>
				<?php if(get_post_meta($id, "qode_color-title", true) == "light" ) { ?>
					<h1 class="title_light">
				<?php } elseif(get_post_meta($id, "qode_color-title", true) == "dark" ) {?>
					<h1 class="title_dark">
				<?php } else {?>
					<h1>
				<?php } ?>
				<?php if(get_post_meta(get_the_ID(), "qode_page-title-text", true) != ""){ ?>
					<?php echo get_post_meta(get_the_ID(), "qode_page-title-text", true) ?>
				<?php } else { ?>
					<?php the_title(); ?>
				<?php } ?>
				<span class="page_subtitle">
					<?php if(get_post_meta($id, "qode_page-subtitle-text", true) != "") { ?>
						<?php echo get_post_meta($id, "qode_page-subtitle-text", true); ?>
					<?php } ?>
				</span>
				</h1>
				<?php if($title_in_grid){ ?>
					</div>
				</div>
				<?php } ?>
			</div>
		<?php } ?>

		<?php if($qode_options_stardust['show_back_button'] == "yes") { ?>
			<a id='back_to_top' href='#'>
				<span class='back_to_top_inner'>
					<span>&nbsp;</span>
				</span>
			</a>
		<?php } ?>
		
		<?php
		$revslider = get_post_meta($id, "qode_revolution-slider", true);
		if (!empty($revslider)){
			echo do_shortcode($revslider);
		}
		?>
	<div class="full_width <?php if(get_post_meta($id, "qode_full-width-padding", true) == "yes") {echo ' no_padding';} ?>">
		<?php if(($sidebar == "default")||($sidebar == "")) : ?>
			<?php if (have_posts()) : 
					while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
					<?php wp_link_pages(); ?>					
					<?php endwhile; ?>
				<?php endif; ?>
		<?php elseif($sidebar == "1" || $sidebar == "2"): ?>		
			
			<?php if($sidebar == "1") : ?>	
				<div class="two_columns_66_33 clearfix">
					<div class="column1">
			<?php elseif($sidebar == "2") : ?>	
				<div class="two_columns_75_25 clearfix">
					<div class="column1">
			<?php endif; ?>
					<?php if (have_posts()) : 
						while (have_posts()) : the_post(); ?>
						<div class="column_inner">
						
						<?php the_content(); ?>
						<?php wp_link_pages(); ?>
						</div>
				<?php endwhile; ?>
				<?php endif; ?>
			
							
					</div>
					<div class="column2"><?php get_sidebar();?></div>
				</div>
			<?php elseif($sidebar == "3" || $sidebar == "4"): ?>
				<?php if($sidebar == "3") : ?>	
					<div class="two_columns_33_66 clearfix">
						<div class="column1"><?php get_sidebar();?></div>
						<div class="column2">
				<?php elseif($sidebar == "4") : ?>	
					<div class="two_columns_25_75 clearfix">
						<div class="column1"><?php get_sidebar();?></div>
						<div class="column2">
				<?php endif; ?>
						<?php if (have_posts()) : 
							while (have_posts()) : the_post(); ?>
							<div class="column_inner">
							<?php the_content(); ?>
							<?php wp_link_pages(); ?>
							
							</div>
					<?php endwhile; ?>
					<?php endif; ?>
				
								
						</div>
						
					</div>
			<?php endif; ?>
	</div>
	<?php get_footer(); ?>			