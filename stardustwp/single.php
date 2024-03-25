<?php

if(get_post_meta(get_the_ID(), "qode_show-sidebar", true) != ""){
	$sidebar = get_post_meta(get_the_ID(), "qode_show-sidebar", true);
}else{
	$sidebar = $qode_options_stardust['blog_single_sidebar'];
}

$blog_hide_comments = "";
if (isset($qode_options_stardust['blog_hide_comments'])) 
	$blog_hide_comments = $qode_options_stardust['blog_hide_comments'];
	
if(get_post_meta(get_the_ID(), "qode_responsive-title-image", true) != ""){
 $responsive_title_image = get_post_meta(get_the_ID(), "qode_responsive-title-image", true);
}else{
	$responsive_title_image = $qode_options_stardust['responsive_title_image'];
}

if(get_post_meta(get_the_ID(), "qode_fixed-title-image", true) != ""){
 $fixed_title_image = get_post_meta(get_the_ID(), "qode_fixed-title-image", true);
}else{
	$fixed_title_image = $qode_options_stardust['fixed_title_image'];
}

if(get_post_meta(get_the_ID(), "qode_title-image", true) != ""){
 $title_image = get_post_meta(get_the_ID(), "qode_title-image", true);
}else{
	$title_image = $qode_options_stardust['title_image'];
}

if(get_post_meta(get_the_ID(), "qode_title-height", true) != ""){
 $title_height = get_post_meta(get_the_ID(), "qode_title-height", true);
}else{
	$title_height = $qode_options_stardust['title_height'];
}

$title_in_grid = false;
if(isset($qode_options_stardust['title_in_grid'])){
if ($qode_options_stardust['title_in_grid'] == "yes") $title_in_grid = true;
}

if(isset($qode_options_stardust['twitter_via']) && !empty($qode_options_stardust['twitter_via'])) {
	$twitter_via = " via " . $qode_options_stardust['twitter_via'];
} else {
	$twitter_via = 	"";
}

?>
<?php get_header(); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
				<?php if(!get_post_meta(get_the_ID(), "qode_show-page-title", true)) { ?>
					<div class="title <?php if(get_post_meta($id, "qode_page-subtitle-text", true) == "") {echo 'no_subtitle ';} if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "yes"){ echo ' has_fixed_background '; } if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "no"){ echo 'has_background'; } if($responsive_title_image == 'yes'){ echo 'with_image'; } ?>" <?php if($responsive_title_image == 'no' && $title_image != ""){ echo 'style="background-image:url('.$title_image.'); height:'.$title_height.'px;"'; }?>>
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
								<?php _e('Blog','qode'); ?>
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
					$revslider = get_post_meta(get_the_ID(), "qode_revolution-slider", true);
					if (!empty($revslider)){
						echo do_shortcode($revslider);
					}
				?>
				<div class="container">
					<div class="container_inner clearfix">
					<?php if(($sidebar == "default")||($sidebar == "")) : ?>
						<div class="blog_single_holder">	
							<article>
								<div class="blog_title_holder">
									 <h2><span class="date"><?php the_time('d M'); ?> / </span><?php the_title(); ?></h2>
								</div>
								<?php 
									if(get_post_meta(get_the_ID(), "qode_hide-featured-image", true) != "yes") {
										if ( has_post_thumbnail()) { ?>
											<div class="image">		
											<?php the_post_thumbnail('full'); ?>
											</div>
									<?php }
									}
									?>
								<div class="blog_single_text_holder">
									<div class="text">
												<?php the_content(); ?>

												<?php wp_link_pages(); ?>
									</div>
									<div class="info">
										<span class="left"><?php _e('By','qode'); ?> <span class="blog_author"><?php the_author(); ?></span> <?php _e('in','qode'); ?> <?php the_category(', '); ?>
										<?php echo do_shortcode('[social_share]'); ?>
										</span>	
										<?php if( has_tag()) { ?>
											<span class="right"><?php the_tags(__('Tags > ','qode')); ?></span>
										<?php } ?>
									 </div>
								</div>
							</article>
						</div>
						
						<?php
							if($blog_hide_comments != "yes"){
								comments_template('', true); 
							}else{
								echo "<br/><br/>";
							}
						?> 
						
					<?php elseif($sidebar == "1" || $sidebar == "2"): ?>
						<?php if($sidebar == "1") : ?>	
							<div class="two_columns_66_33 background_color_sidebar grid2 clearfix">
							<div class="column1">
						<?php elseif($sidebar == "2") : ?>	
							<div class="two_columns_75_25 background_color_sidebar grid2 clearfix">
								<div class="column1">
						<?php endif; ?>
					
									<div class="column_inner">
										<div class="blog_single_holder">	
											<article>
												<div class="blog_title_holder">
													 <h2><span class="date"><?php the_time('d M'); ?> / </span><?php the_title(); ?></h2>
												</div>
												<?php 
													if(get_post_meta(get_the_ID(), "qode_hide-featured-image", true) != "yes") {
														if ( has_post_thumbnail()) { ?>
															<div class="image">		
															<?php the_post_thumbnail('full'); ?>
															</div>
													<?php }
													}
													?>
												<div class="blog_single_text_holder">
													<div class="text">
																<?php the_content(); ?>

																<?php wp_link_pages(); ?>
													</div>
													<div class="info">
														<span class="left"><?php _e('By','qode'); ?> <span class="blog_author"><?php the_author(); ?></span> <?php _e('in','qode'); ?> <?php the_category(', '); ?>
														<?php echo do_shortcode('[social_share]'); ?>
														</span>	
														<?php if( has_tag()) { ?>
															<span class="right"><?php the_tags(__('Tags > ','qode')); ?></span>
														<?php } ?>
													 </div>
												</div>
											</article>
										</div>
										
										<?php
											if($blog_hide_comments != "yes"){
												comments_template('', true); 
											}else{
												echo "<br/><br/>";
											}
										?> 
									</div>
								</div>	
								<div class="column2"> 
									<?php get_sidebar(); ?>
								</div>
							</div>
						<?php elseif($sidebar == "3" || $sidebar == "4"): ?>
							<?php if($sidebar == "3") : ?>	
								<div class="two_columns_33_66 background_color_sidebar grid2 clearfix">
								<div class="column1"> 
									<?php get_sidebar(); ?>
								</div>
								<div class="column2">
							<?php elseif($sidebar == "4") : ?>	
								<div class="two_columns_25_75 background_color_sidebar grid2 clearfix">
									<div class="column1"> 
										<?php get_sidebar(); ?>
									</div>
									<div class="column2">
							<?php endif; ?>
							
										<div class="column_inner">
											<div class="blog_single_holder">	
												<article>
													<div class="blog_title_holder">
														 <h2><span class="date"><?php the_time('d M'); ?> / </span><?php the_title(); ?></h2>
													</div>
													<?php 
														if(get_post_meta(get_the_ID(), "qode_hide-featured-image", true) != "yes") {
															if ( has_post_thumbnail()) { ?>
																<div class="image">		
																<?php the_post_thumbnail('full'); ?>
																</div>
														<?php }
														}
														?>
													<div class="blog_single_text_holder">
														<div class="text">
																	<?php the_content(); ?>

																	<?php wp_link_pages(); ?>
														</div>
														<div class="info">
															<span class="left"><?php _e('By','qode'); ?> <span class="blog_author"><?php the_author(); ?></span> <?php _e('in','qode'); ?> <?php the_category(', '); ?>
															<?php echo do_shortcode('[social_share]'); ?>
															</span>	
															<?php if( has_tag()) { ?>
																<span class="right"><?php the_tags(__('Tags > ','qode')); ?></span>
															<?php } ?>
														 </div>
													</div>
												</article>
											</div>
											
											<?php
												if($blog_hide_comments != "yes"){
													comments_template('', true); 
												}else{
													echo "<br/><br/>";
												}
											?> 
										</div>
									</div>	
									
								</div>
						<?php endif; ?>
				</div>
			</div>						
<?php endwhile; ?>
<?php endif; ?>	


<?php get_footer(); ?>	