<?php
$porftolio_single_template = get_post_meta(get_the_ID(), "qode_choose-portfolio-single-view", true);

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

$lightbox_single_project = "no";
if (isset($qode_options_stardust['lightbox_single_project'])) 
	$lightbox_single_project = $qode_options_stardust['lightbox_single_project'];

$columns_number = "v4";
if(get_post_meta(get_the_ID(), "qode_choose-number-of-portfolio-columns", true) != ""){
	if(get_post_meta(get_the_ID(), "qode_choose-number-of-portfolio-columns", true) == 2){
		$columns_number = "v2";
	} else if(get_post_meta(get_the_ID(), "qode_choose-number-of-portfolio-columns", true) == 3){
		$columns_number = "v3";
	} else if(get_post_meta(get_the_ID(), "qode_choose-number-of-portfolio-columns", true) == 4){
		$columns_number = "v4";
	}
}else{
	if(isset($qode_options_stardust['portfolio_columns_number'])){
		if($qode_options_stardust['portfolio_columns_number'] == 2){
			$columns_number = "v2";
		} else if($qode_options_stardust['portfolio_columns_number'] == 3) {
			$columns_number = "v3";
		} else if($qode_options_stardust['portfolio_columns_number'] == 4) {
			$columns_number = "v4";
		}
	}
}

if(get_post_meta(get_the_ID(), "qode_title-height", true) != ""){
 $title_height = get_post_meta(get_the_ID(), "qode_title-height", true);
}else{
	$title_height = $qode_options_stardust['title_height'];
}

if(get_post_meta(get_the_ID(), "qode_portfolio-background-color", true) != ""){
	$background_color = get_post_meta(get_the_ID(), "qode_portfolio-background-color", true);
}else if(isset($qode_options_stardust['portfolio_background_color']) && $qode_options_stardust['portfolio_background_color'] != ""){
	$background_color = $qode_options_stardust['portfolio_background_color'];
}else{
	$background_color = "";
}

$title_in_grid = false;
if(isset($qode_options_stardust['title_in_grid'])){
if ($qode_options_stardust['title_in_grid'] == "yes") $title_in_grid = true;
}

$color_variant_class = "";
if(get_post_meta(get_the_ID(), "qode_portfolio-single-color-variant", true) == "light" ) { 
	$color_variant_class = "color_variant_light_class";
} elseif(get_post_meta(get_the_ID(), "qode_portfolio-single-color-variant", true) == "dark" ) {
	$color_variant_class = "color_variant_dark_class";
} else {
	$color_variant_class = "color_variant_default_class";
}

?>

<?php get_header(); ?>
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		<?php if(isset($qode_options_stardust['portfolio_open_single_on_portfolio_page']) && $qode_options_stardust['portfolio_open_single_on_portfolio_page'] != "no"){ ?>
			<div class="container close_single_portfolio_holder"><div class="container_inner clearfix position_relative"><span class="close_single_portfolio <?php echo $color_variant_class;?>"></span></div></div>
		<?php } ?>
			<?php if(!get_post_meta(get_the_ID(), "qode_show-page-title", true)) { ?>
				<div class="title <?php echo $color_variant_class; ?> <?php if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "yes"){ echo 'has_fixed_background '; } if($responsive_title_image == 'no' && $title_image != "" && $fixed_title_image == "no"){ echo 'has_background'; } if($responsive_title_image == 'yes'){ echo 'with_image'; } ?>" style="<?php if($responsive_title_image == 'no' && $title_image != ""){ echo 'background-image:url('.$title_image.'); height:'.$title_height.'px;'; }?><?php if($background_color != "") { echo "background-color:". $background_color .";";} ?>">
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
							<?php the_title(); ?>

							<span class="portfolio_subtitle">
							 <!-- <?php _e('Category: ','qode'); ?>
							 <span class="category">
							 <?php
								$terms = wp_get_post_terms(get_the_ID(),'portfolio_category');
								$counter = 0;
								$all = count($terms);
								foreach($terms as $term) {
									$counter++;
									if($counter < $all){ $after = ', ';}
									else{ $after = ''; }
									echo $term->name.$after;
								}
								?> -->
							</span>
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
			<div class="container <?php echo $color_variant_class; ?>" <?php if($background_color != "") { echo "style='background-color:". $background_color ."'";} ?>>
				<div class="container_inner clearfix">
				<div class="portfolio_single">
				<?php
				if($porftolio_single_template == '') :
				?>
					<?php switch ($qode_options_stardust['portfolio_style']) {
					case 1: ?>
					<div class="two_columns_75_25 clearfix portfolio_container">
						<div class="column1">
							<div class="column_inner">
								<div class="portfolio_images test">
								<?php
								$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);
								if ($portfolio_images){
									usort($portfolio_images, "comparePortfolioImages");
									foreach($portfolio_images as $portfolio_image){	
									?>

										<?php if($portfolio_image['portfolioimg'] != ""){ ?>

											<?php if($lightbox_single_project == "yes"){ ?>

											<?php 
												global $wpdb;
												$image_src = $portfolio_image['portfolioimg'];
												$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
												$id = $wpdb->get_var($query);
												$title = get_the_title($id);
											?>
												<a class="lightbox_single_portfolio" title="<?php echo $title; ?>" href="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" data-rel="prettyPhoto[single_pretty_photo]">
													<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="" />
												</a>
											<?php } else { ?>
												<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="" />
											<?php } ?>

										<?php }else{ ?>
											
											<?php
											$portfoliovideotype = "";
											if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];
											switch ($portfoliovideotype){
												case "youtube": ?>
													<?php if($lightbox_single_project == "yes"){ ?>
														<?php
															$vidID = $portfolio_image['portfoliovideoid'];  
														    $url = "http://gdata.youtube.com/feeds/api/videos/".$vidID;
														    $doc = new DOMDocument;
														    $doc->load($url);
														    $title = $doc->getElementsByTagName("title")->item(0)->nodeValue;
														?>
														<a class="lightbox_single_portfolio" title="<?php echo $title; ?>" href="http://www.youtube.com/watch?feature=player_embedded&v=<?php echo $portfolio_image['portfoliovideoid']; ?>" rel="prettyPhoto[single_pretty_photo]">
															<img width="100%" src="http://img.youtube.com/vi/<?php echo $portfolio_image['portfoliovideoid'];  ?>/maxresdefault.jpg"></img>
														</a>
													<?php } else { ?>	
														<iframe width="100%" src="http://www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
													<?php } ?>
												<?php	break;
												case "vimeo": ?>
													<?php if($lightbox_single_project == "yes"){ ?>
														<?php
															$vidID = $portfolio_image['portfoliovideoid'];
														    $xml = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$vidID.php"));
														    $thumbnail = $xml[0]['thumbnail_large'];  
														    $title = $xml[0]['title'];
														?>
														<a class="lightbox_single_portfolio" title="<?php echo $title; ?>" href="http://vimeo.com/<?php echo $portfolio_image['portfoliovideoid']; ?>" rel="prettyPhoto[single_pretty_photo]">
															<img width="100%" src="<?php echo $thumbnail; ?>"></img>
														</a>
													<?php } else { ?>	
														<iframe src="http://player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
													<?php } ?>

											<?php break;	
											} ?>
											
										<?php } ?>
										
									<?php						
									}
								}
								?>
								</div>
							</div>
						</div>
						<div class="column2">
							<div class="column_inner">
								<div class="portfolio_detail portfolio_single_follow">
								<?php
								$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);
								if ($portfolios){
									usort($portfolios, "comparePortfolioOptions");
									foreach($portfolios as $portfolio){	
									?>
										<div class="info">
										<?php if($portfolio['optionLabel'] != ""): ?>
										<h5><?php echo stripslashes($portfolio['optionLabel']); ?></h5>
										<?php endif; ?>
										<span>
											<?php if($portfolio['optionUrl'] != ""): ?>
												<a href="<?php echo $portfolio['optionUrl']; ?>" target="_blank">
												<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
												</a>
											<?php else:?>
												<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
											<?php endif; ?>
										</span>
										</div>
									<?php						
									}
								}
								?>
								<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>
									<div class="info">
										<h5><?php _e('Date','qode'); ?></h5>
										<span><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?></span>
									</div>
								<?php endif; ?>
									<h5><?php echo _e('About','qode'); ?></h5>
									<?php the_content(); ?>
									<?php echo do_shortcode('[social_share]'); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="portfolio_navigation">
						<div class="portfolio_prev"><?php previous_post_link('%link', __('Previous Project','qode')); ?></div>
						<?php if(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true) != ""){ ?>
							<div class="portfolio_button"><a href="<?php echo get_permalink(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true)); ?>"></a></div>
						<?php } ?>
						<div class="portfolio_next"><?php next_post_link('%link', __('Next Project','qode')); ?></div>
					</div>
					
					<?php	break;
					case 2: ?>
					<div class="two_columns_66_33 clearfix portfolio_container">
						<div class="column1">
							<div class="column_inner">
								<div class="flexslider">
									<ul class="slides">
										<?php
										$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);
										if ($portfolio_images){
											usort($portfolio_images, "comparePortfolioImages");
											foreach($portfolio_images as $portfolio_image){	
											?>

												<?php if($portfolio_image['portfolioimg'] != ""){ ?>
													<li class="slide">
														<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="" />
													</li>	
												<?php }else{ ?>
													
													<?php
													$portfoliovideotype = "";
													if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];
													switch ($portfoliovideotype){
														case "youtube": ?>
															<li class="slide">
																<iframe width="100%" src="http://www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
															</li>	
														<?php	break;
														case "vimeo": ?>
															<li class="slide">
																<iframe src="http://player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
															</li>

													<?php break;	
													} ?>
													
												<?php } ?>

											<?php						
											}
										}
										?>
									</ul>
								</div>
							</div>
						</div>
						<div class="column2">
							<div class="column_inner">
								<div class="portfolio_detail">
									<?php
									$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);
									if ($portfolios){
										usort($portfolios, "comparePortfolioOptions");
										foreach($portfolios as $portfolio){	
										
										?>
											<div class="info">
											<?php if($portfolio['optionLabel'] != ""): ?>
											<h5><?php echo stripslashes($portfolio['optionLabel']); ?></h5>
											<?php endif; ?>
											<span>
												<?php if($portfolio['optionUrl'] != ""): ?>
													<a href="<?php echo $portfolio['optionUrl']; ?>" target="_blank">
													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
													</a>
												<?php else:?>
													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
												<?php endif; ?>
											</span>
											</div>
										<?php						
										}
									}
									?>
									<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>
									<div class="info">
										<h5><?php _e('Date','qode'); ?></h5>
										<span><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?></span>
									</div>
									<?php endif; ?>
									<h5><?php echo _e('About','qode'); ?></h5>
									<?php the_content(); ?>
									<?php echo do_shortcode('[social_share]'); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="portfolio_navigation">
						<div class="portfolio_prev"><?php previous_post_link('%link', __('Previous Project','qode')); ?></div>
						<?php if(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true) != ""){ ?>
							<div class="portfolio_button"><a href="<?php echo get_permalink(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true)); ?>"></a></div>
						<?php } ?>
						<div class="portfolio_next"><?php next_post_link('%link', __('Next Project','qode')); ?></div>
					</div>
					
					<?php	break;
					case 3: ?>
					<div class="flexslider">
						<ul class="slides">
							<?php
							$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);
							if ($portfolio_images){
								foreach($portfolio_images as $portfolio_image){
								usort($portfolio_images, "comparePortfolioImages");
								?>

									<?php if($portfolio_image['portfolioimg'] != ""){ ?>
										<li class="slide">
											<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="" />
										</li>	
									<?php }else{ ?>
										
										<?php
										$portfoliovideotype = "";
										if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];
										switch ($portfoliovideotype){
											case "youtube": ?>
												<li class="slide">
													<iframe width="100%" src="http://www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
												</li>	
											<?php	break;
											case "vimeo": ?>
												<li class="slide">
													<iframe src="http://player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
												</li>
										<?php break;	
										} ?>
										
									<?php } ?>

								<?php						
								}
							}
							?>
						</ul>
					</div>
					<div class="two_columns_33_66 clearfix portfolio_container">
						<div class="column1">
							<div class="column_inner">
								<div class="portfolio_detail portfolio_single_follow">
									<?php
									$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);
									if ($portfolios){
										usort($portfolios, "comparePortfolioOptions");
										foreach($portfolios as $portfolio){	
										?>
											<div class="info">
											<?php if($portfolio['optionLabel'] != ""): ?>
											<h5><?php echo stripslashes($portfolio['optionLabel']); ?></h5>
											<?php endif; ?>
											<span>
												<?php if($portfolio['optionUrl'] != ""): ?>
													<a href="<?php echo $portfolio['optionUrl']; ?>" target="_blank">
													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
													</a>
												<?php else:?>
													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
												<?php endif; ?>
											</span>
											</div>
										<?php						
										}
									}
									?>
									<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>
									<div class="info">
										<h5><?php _e('Date','qode'); ?></h5>
										<span><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?></span>
									</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<div class="column2">
							<div class="column_inner">
								<div class="portfolio_single_text_holder">
									<h5><?php echo _e('About','qode'); ?></h5>
									<?php the_content(); ?>
									<?php echo do_shortcode('[social_share]'); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="portfolio_navigation">
						<div class="portfolio_prev"><?php previous_post_link('%link', __('Previous Project','qode')); ?></div>
						<?php if(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true) != ""){ ?>
							<div class="portfolio_button"><a href="<?php echo get_permalink(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true)); ?>"></a></div>
						<?php } ?>
						<div class="portfolio_next"><?php next_post_link('%link', __('Next Project','qode')); ?></div>
					</div>
					
					<?php	break;
					case 4: ?>
						<?php the_content(); ?>
						<?php echo do_shortcode('[social_share]'); ?>
						<div class="portfolio_navigation">
							<div class="portfolio_prev"><?php previous_post_link('%link', __('Previous Project','qode')); ?></div>
							<?php if(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true) != ""){ ?>
								<div class="portfolio_button"><a href="<?php echo get_permalink(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true)); ?>"></a></div>
							<?php } ?>
							<div class="portfolio_next"><?php next_post_link('%link', __('Next Project','qode')); ?></div>
						</div>
					<?php	break;
					case 5: ?>
						<div class="portfolio_images">
							<?php
							$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);
							if ($portfolio_images){
								usort($portfolio_images, "comparePortfolioImages");
								foreach($portfolio_images as $portfolio_image){	
								?>

									<?php if($portfolio_image['portfolioimg'] != ""){ ?>

										<?php if($lightbox_single_project == "yes"){ ?>

										<?php 
											global $wpdb;
											$image_src = $portfolio_image['portfolioimg'];
											$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
											$id = $wpdb->get_var($query);
											$title = get_the_title($id);
										?>
											<a class="lightbox_single_portfolio" title="<?php echo $title; ?>" href="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" data-rel="prettyPhoto[single_pretty_photo]">
												<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="" />
											</a>
										<?php } else { ?>
											<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="" />	
										<?php } ?>

									<?php }else{ ?>
										
										<?php
										$portfoliovideotype = "";
										if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];
										switch ($portfoliovideotype){
											case "youtube": ?>
												<?php if($lightbox_single_project == "yes"){ ?>
													<?php
														$vidID = $portfolio_image['portfoliovideoid'];  
													    $url = "http://gdata.youtube.com/feeds/api/videos/".$vidID;
													    $doc = new DOMDocument;
													    $doc->load($url);
													    $title = $doc->getElementsByTagName("title")->item(0)->nodeValue;
													?>
													<a class="lightbox_single_portfolio" title="<?php echo $title; ?>" href="http://www.youtube.com/watch?feature=player_embedded&v=<?php echo $portfolio_image['portfoliovideoid']; ?>" rel="prettyPhoto[single_pretty_photo]">
														<img width="100%" src="http://img.youtube.com/vi/<?php echo $portfolio_image['portfoliovideoid'];  ?>/maxresdefault.jpg"></img>
													</a>
												<?php } else { ?>	
													<iframe width="100%" src="http://www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>	
												<?php } ?>
											<?php	break;
											case "vimeo": ?>
												<?php if($lightbox_single_project == "yes"){ ?>
													<?php
														$vidID = $portfolio_image['portfoliovideoid'];
													    $xml = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$vidID.php"));
													    $thumbnail = $xml[0]['thumbnail_large'];  
													    $title = $xml[0]['title'];
													?>
													<a class="lightbox_single_portfolio" title="<?php echo $title; ?>" href="http://vimeo.com/<?php echo $portfolio_image['portfoliovideoid']; ?>" rel="prettyPhoto[single_pretty_photo]">
														<img width="100%" src="<?php echo $thumbnail; ?>"></img>
													</a>
												<?php } else { ?>	
													<iframe src="http://player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
												<?php } ?>

										<?php break;	
										} ?>
										
									<?php } ?>
									
								<?php						
								}
							}
							?>
							</div>
							<div class="two_columns_33_66 clearfix portfolio_container">
								<div class="column1">
									<div class="column_inner">
										<div class="portfolio_detail portfolio_single_follow">
											<?php
											$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);
											if ($portfolios){
												usort($portfolios, "comparePortfolioOptions");
												foreach($portfolios as $portfolio){	
												?>
													<div class="info">
													<?php if($portfolio['optionLabel'] != ""): ?>
													<h5><?php echo stripslashes($portfolio['optionLabel']); ?></h5>
													<?php endif; ?>
													<span>
														<?php if($portfolio['optionUrl'] != ""): ?>
															<a href="<?php echo $portfolio['optionUrl']; ?>" target="_blank">
															<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
															</a>
														<?php else:?>
															<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
														<?php endif; ?>
													</span>
													</div>
												<?php						
												}
											}
											?>
											<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>
											<div class="info">
												<h5><?php _e('Date','qode'); ?></h5>
												<span><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?></span>
											</div>
											<?php endif; ?>
										</div>
									</div>
								</div>
								<div class="column2">
									<div class="column_inner">
										<div class="portfolio_single_text_holder">
											<h5><?php echo _e('About','qode'); ?></h5>
											<?php the_content(); ?>
											<?php echo do_shortcode('[social_share]'); ?>
										</div>
									</div>
								</div>
							</div>
							<div class="portfolio_navigation">
								<div class="portfolio_prev"><?php previous_post_link('%link', __('Previous Project','qode')); ?></div>
								<?php if(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true) != ""){ ?>
									<div class="portfolio_button"><a href="<?php echo get_permalink(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true)); ?>"></a></div>
								<?php } ?>
								<div class="portfolio_next"><?php next_post_link('%link', __('Next Project','qode')); ?></div>
							</div>
					<?php	break;
					case 6: ?>
						<div class="portfolio_gallery">
							<?php
							$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);
							if ($portfolio_images){
								usort($portfolio_images, "comparePortfolioImages");
								foreach($portfolio_images as $portfolio_image){	
								?>

									<?php if($portfolio_image['portfolioimg'] != ""){ ?>
										<?php 
											global $wpdb;
											$image_src = $portfolio_image['portfolioimg'];
											$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
											$id = $wpdb->get_var($query);
											$alt = get_post_meta($id, '_wp_attachment_image_alt', true);
										?>	
										<?php if($lightbox_single_project == "yes"){ ?>
											<a class="lightbox_single_portfolio <?php echo $columns_number; ?>" title="<?php echo $portfolio_image['portfoliotitle'];  ?>" href="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" data-rel="prettyPhoto[single_pretty_photo]">
												<span class="image_hover"></span><span class="text_holder"><span><h3><?php echo $portfolio_image['portfoliotitle'];  ?></h3></span></span>
												<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="<?php echo $alt; ?>" />
											</a>
										<?php } else { ?>
											<a class="lightbox_single_portfolio <?php echo $columns_number; ?>">
												<span class="image_hover"></span><span class="text_holder"><span><h3><?php echo $portfolio_image['portfoliotitle'];  ?></h3></span></span>
												<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="<?php echo $alt; ?>" />
											</a>
										<?php } ?>

									<?php }else{ ?>
										
										<?php
										$portfoliovideotype = "";
										if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];
										switch ($portfoliovideotype){
											case "youtube": ?>
												<?php if($lightbox_single_project == "yes"){ ?>
													<a class="lightbox_single_portfolio <?php echo $columns_number; ?>" title="<?php echo $portfolio_image['portfoliotitle'];  ?>" href="http://www.youtube.com/watch?feature=player_embedded&v=<?php echo $portfolio_image['portfoliovideoid']; ?>" rel="prettyPhoto[single_pretty_photo]">
														<span class="image_hover"></span><span class="text_holder"><span><h3><?php echo $portfolio_image['portfoliotitle'];  ?></h3></span></span>
														<img width="100%" src="http://img.youtube.com/vi/<?php echo $portfolio_image['portfoliovideoid'];  ?>/maxresdefault.jpg" />
													</a>
												<?php } else { ?>
													<a class="lightbox_single_portfolio <?php echo $columns_number; ?>">
														<iframe width="100%" src="http://www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>	
													</a>
												<?php } ?>
											<?php	break;
											case "vimeo": ?>
												<?php if($lightbox_single_project == "yes"){ 
													$videoid = $portfolio_image['portfoliovideoid'];
													$xml = simplexml_load_file("http://vimeo.com/api/v2/video/".$videoid.".xml");
													$xml = $xml->video;
													$xml_pic = $xml->thumbnail_large; ?>
													<a class="lightbox_single_portfolio <?php echo $columns_number; ?>" title="<?php echo $portfolio_image['portfoliotitle'];  ?>" href="http://vimeo.com/<?php echo $portfolio_image['portfoliovideoid']; ?>" rel="prettyPhoto[single_pretty_photo]">
														<span class="image_hover"></span><span class="text_holder"><span><h3><?php echo $portfolio_image['portfoliotitle'];  ?></h3></span></span>
														<img width="100%" src="<?php echo $xml_pic;  ?>" />
													</a>	
												<?php } else { ?>
													<a class="lightbox_single_portfolio <?php echo $columns_number; ?>">
														<iframe src="http://player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
													</a>
												<?php } ?>

										<?php break;	
										} ?>
										
									<?php } ?>
									
								<?php						
								}
							}
							?>
						</div>
						<div class="two_columns_33_66 clearfix portfolio_container">
							<div class="column1">
								<div class="column_inner">
									<div class="portfolio_detail portfolio_single_follow">
										<?php
										$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);
										if ($portfolios){
											usort($portfolios, "comparePortfolioOptions");
											foreach($portfolios as $portfolio){	
											?>
												<div class="info">
												<?php if($portfolio['optionLabel'] != ""): ?>
												<h5><?php echo stripslashes($portfolio['optionLabel']); ?></h5>
												<?php endif; ?>
												<span>
													<?php if($portfolio['optionUrl'] != ""): ?>
														<a href="<?php echo $portfolio['optionUrl']; ?>" target="_blank">
														<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
														</a>
													<?php else:?>
														<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
													<?php endif; ?>
												</span>
												</div>
											<?php						
											}
										}
										?>
										<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>
										<div class="info">
											<h5><?php _e('Date','qode'); ?></h5>
											<span><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?></span>
										</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
							<div class="column2">
								<div class="column_inner">
									<div class="portfolio_single_text_holder">
										<h5><?php echo _e('About','qode'); ?></h5>
										<?php the_content(); ?>
										<?php echo do_shortcode('[social_share]'); ?>
									</div>
								</div>
							</div>
						</div>
						<div class="portfolio_navigation">
							<div class="portfolio_prev"><?php previous_post_link('%link', __('Previous Project','qode')); ?></div>
							<?php if(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true) != ""){ ?>
								<div class="portfolio_button"><a href="<?php echo get_permalink(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true)); ?>"></a></div>
							<?php } ?>
							<div class="portfolio_next"><?php next_post_link('%link', __('Next Project','qode')); ?></div>
						</div>
					<?php	break;
					}			
					?>
				<?php elseif($porftolio_single_template == "1"): ?>
					<div class="two_columns_75_25 clearfix portfolio_container">
						<div class="column1">
							<div class="column_inner">
								<div class="portfolio_images">
								<?php
								$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);
								if ($portfolio_images){
									usort($portfolio_images, "comparePortfolioImages");
									foreach($portfolio_images as $portfolio_image){	
									?>
										
										<?php if($portfolio_image['portfolioimg'] != ""){ ?>

											<?php if($lightbox_single_project == "yes"){ ?>

											<?php 
												global $wpdb;
												$image_src = $portfolio_image['portfolioimg'];
												$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
												$id = $wpdb->get_var($query);
												$title = get_the_title($id);
											?>
												<a class="lightbox_single_portfolio" title="<?php echo $title; ?>" href="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" data-rel="prettyPhoto[single_pretty_photo]">
													<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="" />
												</a>	
											<?php } else { ?>
												<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="" />
											<?php } ?>

										<?php }else{ ?>
											
											<?php
											$portfoliovideotype = "";
											if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];
											switch ($portfoliovideotype){
												case "youtube": ?>
													<?php if($lightbox_single_project == "yes"){ ?>
														<?php
															$vidID = $portfolio_image['portfoliovideoid'];  
														    $url = "http://gdata.youtube.com/feeds/api/videos/".$vidID;
														    $doc = new DOMDocument;
														    $doc->load($url);
														    $title = $doc->getElementsByTagName("title")->item(0)->nodeValue;
														?>
														<a class="lightbox_single_portfolio" title="<?php echo $title; ?>" href="http://www.youtube.com/watch?feature=player_embedded&v=<?php echo $portfolio_image['portfoliovideoid']; ?>" rel="prettyPhoto[single_pretty_photo]">
															<img width="100%" src="http://img.youtube.com/vi/<?php echo $portfolio_image['portfoliovideoid'];  ?>/maxresdefault.jpg"></img>
														</a>
													<?php } else { ?>	
														<iframe width="100%" src="http://www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>	
													<?php } ?>
												<?php	break;
												case "vimeo": ?>
													<?php if($lightbox_single_project == "yes"){ ?>
														<?php
															$vidID = $portfolio_image['portfoliovideoid'];
														    $xml = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$vidID.php"));
														    $thumbnail = $xml[0]['thumbnail_large'];  
														    $title = $xml[0]['title'];
														?>
														<a class="lightbox_single_portfolio" title="<?php echo $title; ?>" href="http://vimeo.com/<?php echo $portfolio_image['portfoliovideoid']; ?>" rel="prettyPhoto[single_pretty_photo]">
															<img width="100%" src="<?php echo $thumbnail; ?>"></img>
														</a>	
													<?php } else { ?>	
														<iframe src="http://player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
													<?php } ?>

											<?php break;	
											} ?>
											
										<?php } ?>
										
									<?php						
									}
								}
								?>
								</div>
							</div>
						</div>
						<div class="column2">
							<div class="column_inner">
								<div class="portfolio_detail portfolio_single_follow">
								<?php
								$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);
								if ($portfolios){
									usort($portfolios, "comparePortfolioOptions");
									foreach($portfolios as $portfolio){	
									?>
										<div class="info">
										<?php if($portfolio['optionLabel'] != ""): ?>
										<h5><?php echo stripslashes($portfolio['optionLabel']); ?></h5>
										<?php endif; ?>
										<span>
											<?php if($portfolio['optionUrl'] != ""): ?>
												<a href="<?php echo $portfolio['optionUrl']; ?>" target="_blank">
												<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
												</a>
											<?php else:?>
												<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
											<?php endif; ?>
										</span>
										</div>
									<?php						
									}
								}
								?>
								<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>
									<div class="info">
										<h5><?php _e('Date','qode'); ?></h5>
										<span><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?></span>
									</div>
								<?php endif; ?>
									<h5><?php echo _e('About','qode'); ?></h5>
									<?php the_content(); ?>
									<?php echo do_shortcode('[social_share]'); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="portfolio_navigation">
						<div class="portfolio_prev"><?php previous_post_link('%link', __('Previous Project','qode')); ?></div>
						<?php if(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true) != ""){ ?>
							<div class="portfolio_button"><a href="<?php echo get_permalink(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true)); ?>"></a></div>
						<?php } ?>
						<div class="portfolio_next"><?php next_post_link('%link', __('Next Project','qode')); ?></div>
					</div>
					
				<?php elseif($porftolio_single_template == "2"): ?>
					<div class="two_columns_66_33 clearfix portfolio_container">
						<div class="column1">
							<div class="column_inner">
								<div class="flexslider">
									<ul class="slides">
										<?php
										$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);
										if ($portfolio_images){
											usort($portfolio_images, "comparePortfolioImages");
											foreach($portfolio_images as $portfolio_image){	
											?>

												<?php if($portfolio_image['portfolioimg'] != ""){ ?>
													<li class="slide">
														<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="" />
													</li>	
												<?php }else{ ?>
													
													<?php
													$portfoliovideotype = "";
													if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];
													switch ($portfoliovideotype){
														case "youtube": ?>
															<li class="slide">
																<iframe width="100%" src="http://www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
															</li>	
														<?php	break;
														case "vimeo": ?>
															<li class="slide">
																<iframe src="http://player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
															</li>
													<?php break;	
													} ?>
													
												<?php } ?>

											<?php						
											}
										}
										?>
									</ul>
								</div>
								
							</div>
						</div>
						<div class="column2">
							<div class="column_inner">
								<div class="portfolio_detail">
									<?php
									$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);
									if ($portfolios){
										usort($portfolios, "comparePortfolioOptions");
										foreach($portfolios as $portfolio){	
										?>
											<div class="info">
											<?php if($portfolio['optionLabel'] != ""): ?>
											<h5><?php echo stripslashes($portfolio['optionLabel']); ?></h5>
											<?php endif; ?>
											<span>
												<?php if($portfolio['optionUrl'] != ""): ?>
													<a href="<?php echo $portfolio['optionUrl']; ?>" target="_blank">
													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
													</a>
												<?php else:?>
													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
												<?php endif; ?>
											</span>
											</div>
										<?php						
										}
									}
									?>
									<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>
									<div class="info">
										<h5 class="label"><?php _e('Date','qode'); ?></h5>
										<span><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?></span>
									</div>
									<?php endif; ?>
									<h5><?php echo _e('About','qode'); ?></h5>
									<?php the_content(); ?>
									<?php echo do_shortcode('[social_share]'); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="portfolio_navigation">
						<div class="portfolio_prev"><?php previous_post_link('%link', __('Previous Project','qode')); ?></div>
						<?php if(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true) != ""){ ?>
							<div class="portfolio_button"><a href="<?php echo get_permalink(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true)); ?>"></a></div>
						<?php } ?>
						<div class="portfolio_next"><?php next_post_link('%link', __('Next Project','qode')); ?></div>
					</div>
					
				<?php elseif($porftolio_single_template == "3"): ?>
					<div class="flexslider">
						<ul class="slides">
							<?php
							$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);
							if ($portfolio_images){
								usort($portfolio_images, "comparePortfolioImages");
								foreach($portfolio_images as $portfolio_image){	
								?>
									<?php if($portfolio_image['portfolioimg'] != ""){ ?>
										<li class="slide">
											<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="" />
										</li>	
									<?php }else{ ?>
										
										<?php
										$portfoliovideotype = "";
										if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];
										switch ($portfoliovideotype){
											case "youtube": ?>	
												<li class="slide">
													<iframe width="100%" src="http://www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>
												</li>	
											<?php	break;
											case "vimeo": ?>
												<li class="slide">
													<iframe src="http://player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
												</li>
										<?php break;	
										} ?>
										
									<?php } ?>

								<?php						
								}
							}
							?>
						</ul>
					</div>
					<div class="two_columns_33_66 clearfix portfolio_container">
						<div class="column1">
							<div class="column_inner">
								<div class="portfolio_detail">
									<?php
									$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);
									if ($portfolios){
										usort($portfolios, "comparePortfolioOptions");
										foreach($portfolios as $portfolio){	
										?>
											<div class="info">
											<?php if($portfolio['optionLabel'] != ""): ?>
											<h5><?php echo stripslashes($portfolio['optionLabel']); ?></h5>
											<?php endif; ?>
											<span>
												<?php if($portfolio['optionUrl'] != ""): ?>
													<a href="<?php echo $portfolio['optionUrl']; ?>" target="_blank">
													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
													</a>
												<?php else:?>
													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
												<?php endif; ?>
											</span>
											</div>
										<?php						
										}
									}
									?>
									<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>
									<div class="info">
										<h5><?php _e('Date','qode'); ?></h5>
										<span><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?></span>
									</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<div class="column2">
							<div class="column_inner">
								<div class="portfolio_single_text_holder">
									<!--<h5><?php echo _e('About','qode'); ?></h5>-->
									<?php the_content(); ?>
									<?php echo do_shortcode('[social_share]'); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="portfolio_navigation">
						<div class="portfolio_prev"><?php previous_post_link('%link', __('Previous Project','qode')); ?></div>
						<?php if(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true) != ""){ ?>
							<div class="portfolio_button"><a href="<?php echo get_permalink(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true)); ?>"></a></div>
						<?php } ?>
						<div class="portfolio_next"><?php next_post_link('%link', __('Next Project','qode')); ?></div>
					</div>

				<?php elseif($porftolio_single_template == "4"): ?>
					<?php the_content(); ?>
					<?php echo do_shortcode('[social_share]'); ?>
					<div class="portfolio_navigation">
						<div class="portfolio_prev"><?php previous_post_link('%link', __('Previous Project','qode')); ?></div>
						<?php if(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true) != ""){ ?>
							<div class="portfolio_button"><a href="<?php echo get_permalink(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true)); ?>"></a></div>
						<?php } ?>
						<div class="portfolio_next"><?php next_post_link('%link', __('Next Project','qode')); ?></div>
					</div>
					
				<?php elseif($porftolio_single_template == "5"): ?>
					<div class="portfolio_images">
					<?php
					$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);
					if ($portfolio_images){
						usort($portfolio_images, "comparePortfolioImages");
						foreach($portfolio_images as $portfolio_image){	
						?>
							
							<?php if($portfolio_image['portfolioimg'] != ""){ ?>

								<?php if($lightbox_single_project == "yes"){ ?>

								<?php 
									global $wpdb;
									$image_src = $portfolio_image['portfolioimg'];
									$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
									$id = $wpdb->get_var($query);
									$title = get_the_title($id);
								?>
									<a class="lightbox_single_portfolio" title="<?php echo $title; ?>" href="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" data-rel="prettyPhoto[single_pretty_photo]">
										<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="" />
									</a>
								<?php } else { ?>
									<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="" />
								<?php } ?>

							<?php }else{ ?>
								
								<?php
								$portfoliovideotype = "";
								if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];
								switch ($portfoliovideotype){
									case "youtube": ?>
										<?php if($lightbox_single_project == "yes"){ ?>
											<?php
												$vidID = $portfolio_image['portfoliovideoid'];  
											    $url = "http://gdata.youtube.com/feeds/api/videos/".$vidID;
											    $doc = new DOMDocument;
											    $doc->load($url);
											    $title = $doc->getElementsByTagName("title")->item(0)->nodeValue;
											?>
											<a class="lightbox_single_portfolio" title="<?php echo $title; ?>" href="http://www.youtube.com/watch?feature=player_embedded&v=<?php echo $portfolio_image['portfoliovideoid']; ?>" rel="prettyPhoto[single_pretty_photo]">
												<img width="100%" src="http://img.youtube.com/vi/<?php echo $portfolio_image['portfoliovideoid'];  ?>/maxresdefault.jpg"></img>
											</a>
										<?php } else { ?>	
											<iframe width="100%" src="http://www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>	
										<?php } ?>
									<?php	break;
									case "vimeo": ?>
										<?php if($lightbox_single_project == "yes"){ ?>
											<?php
												$vidID = $portfolio_image['portfoliovideoid'];
											    $xml = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$vidID.php"));
											    $thumbnail = $xml[0]['thumbnail_large'];  
											    $title = $xml[0]['title'];
											?>
											<a class="lightbox_single_portfolio" title="<?php echo $title; ?>" href="http://vimeo.com/<?php echo $portfolio_image['portfoliovideoid']; ?>" rel="prettyPhoto[single_pretty_photo]">
												<img width="100%" src="<?php echo $thumbnail; ?>"></img>
											</a>	
										<?php } else { ?>	
											<iframe src="http://player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
										<?php } ?>

								<?php break;	
								} ?>
								
							<?php } ?>
							
						<?php						
						}
					}
					?>
					</div>
					<div class="two_columns_33_66 clearfix portfolio_container">
						<div class="column1">
							<div class="column_inner">
								<div class="portfolio_detail">
									<?php
									$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);
									if ($portfolios){
										usort($portfolios, "comparePortfolioOptions");
										foreach($portfolios as $portfolio){	
										?>
											<div class="info">
											<?php if($portfolio['optionLabel'] != ""): ?>
											<h5><?php echo stripslashes($portfolio['optionLabel']); ?></h5>
											<?php endif; ?>
											<span>
												<?php if($portfolio['optionUrl'] != ""): ?>
													<a href="<?php echo $portfolio['optionUrl']; ?>" target="_blank">
													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
													</a>
												<?php else:?>
													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
												<?php endif; ?>
											</span>
											</div>
										<?php						
										}
									}
									?>
									<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>
									<div class="info">
										<h5><?php _e('Date','qode'); ?></h5>
										<span><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?></span>
									</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<div class="column2">
							<div class="column_inner">
								<div class="portfolio_single_text_holder">
									<h5><?php echo _e('About','qode'); ?></h5>
									<?php the_content(); ?>
									<?php echo do_shortcode('[social_share]'); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="portfolio_navigation">
						<div class="portfolio_prev"><?php previous_post_link('%link', __('Previous Project','qode')); ?></div>
						<?php if(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true) != ""){ ?>
							<div class="portfolio_button"><a href="<?php echo get_permalink(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true)); ?>"></a></div>
						<?php } ?>
						<div class="portfolio_next"><?php next_post_link('%link', __('Next Project','qode')); ?></div>
					</div>

				<?php elseif($porftolio_single_template == "6"): ?>
					<div class="portfolio_gallery">
						<?php
						$portfolio_images = get_post_meta(get_the_ID(), "qode_portfolio_images", true);
						if ($portfolio_images){
							usort($portfolio_images, "comparePortfolioImages");
							foreach($portfolio_images as $portfolio_image){	
							?>

								<?php if($portfolio_image['portfolioimg'] != ""){ ?>
									<?php 
										global $wpdb;
										$image_src = $portfolio_image['portfolioimg'];
										$query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
										$id = $wpdb->get_var($query);
										$alt = get_post_meta($id, '_wp_attachment_image_alt', true);
									?>	
									<?php if($lightbox_single_project == "yes"){ ?>
										<a class="lightbox_single_portfolio <?php echo $columns_number; ?>" title="<?php echo $portfolio_image['portfoliotitle'];  ?>" href="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" data-rel="prettyPhoto[single_pretty_photo]">
											<span class="image_hover"></span><span class="text_holder"><span><h3><?php echo $portfolio_image['portfoliotitle'];  ?></h3></span></span>
											<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="<?php echo $alt; ?>" />
										</a>
									<?php } else { ?>
										<a class="lightbox_single_portfolio <?php echo $columns_number; ?>">
											<span class="image_hover"></span><span class="text_holder"><span><h3><?php echo $portfolio_image['portfoliotitle'];  ?></h3></span></span>
											<img src="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" alt="<?php echo $alt; ?>" />
										</a>
									<?php } ?>

								<?php }else{ ?>
									
									<?php
									$portfoliovideotype = "";
									if (isset($portfolio_image['portfoliovideotype'])) $portfoliovideotype = $portfolio_image['portfoliovideotype'];
									switch ($portfoliovideotype){
										case "youtube": ?>
											<?php if($lightbox_single_project == "yes"){ ?>
												<a class="lightbox_single_portfolio <?php echo $columns_number; ?>" title="<?php echo $portfolio_image['portfoliotitle'];  ?>" href="http://www.youtube.com/watch?feature=player_embedded&v=<?php echo $portfolio_image['portfoliovideoid']; ?>" rel="prettyPhoto[single_pretty_photo]">
													<span class="image_hover"></span><span class="text_holder"><span><h3><?php echo $portfolio_image['portfoliotitle'];  ?></h3></span></span>
													<img width="100%" src="http://img.youtube.com/vi/<?php echo $portfolio_image['portfoliovideoid'];  ?>/maxresdefault.jpg" />
											<?php } else { ?>
												<a class="lightbox_single_portfolio <?php echo $columns_number; ?>">
													<iframe width="100%" src="http://www.youtube.com/embed/<?php echo $portfolio_image['portfoliovideoid'];  ?>?wmode=transparent" wmode="Opaque" frameborder="0" allowfullscreen></iframe>	
												</a>
											<?php } ?>
										<?php	break;
										case "vimeo": ?>
											<?php if($lightbox_single_project == "yes"){ 
												$videoid = $portfolio_image['portfoliovideoid'];
												$xml = simplexml_load_file("http://vimeo.com/api/v2/video/".$videoid.".xml");
												$xml = $xml->video;
												$xml_pic = $xml->thumbnail_large; ?>
												<a class="lightbox_single_portfolio <?php echo $columns_number; ?>" title="<?php echo $portfolio_image['portfoliotitle'];  ?>" href="http://vimeo.com/<?php echo $portfolio_image['portfoliovideoid']; ?>" rel="prettyPhoto[single_pretty_photo]">
													<span class="image_hover"></span><span class="text_holder"><span><h3><?php echo $portfolio_image['portfoliotitle'];  ?></h3></span></span>
													<img width="100%" src="<?php echo $xml_pic;  ?>" />
												</a>	
											<?php } else { ?>
												<a class="lightbox_single_portfolio <?php echo $columns_number; ?>">
													<iframe src="http://player.vimeo.com/video/<?php echo $portfolio_image['portfoliovideoid'];  ?>?title=0&amp;byline=0&amp;portrait=0" width="100%" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
												</a>
											<?php } ?>

									<?php break;	
									} ?>
									
								<?php } ?>
								
							<?php						
							}
						}
						?>
					</div>
					<div class="two_columns_33_66 clearfix portfolio_container">
						<div class="column1">
							<div class="column_inner">
								<div class="portfolio_detail portfolio_single_follow">
									<?php
									$portfolios = get_post_meta(get_the_ID(), "qode_portfolios", true);
									if ($portfolios){
										usort($portfolios, "comparePortfolioOptions");
										foreach($portfolios as $portfolio){	
										?>
											<div class="info">
											<?php if($portfolio['optionLabel'] != ""): ?>
											<h5><?php echo stripslashes($portfolio['optionLabel']); ?></h5>
											<?php endif; ?>
											<span>
												<?php if($portfolio['optionUrl'] != ""): ?>
													<a href="<?php echo $portfolio['optionUrl']; ?>" target="_blank">
													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
													</a>
												<?php else:?>
													<?php echo do_shortcode(stripslashes($portfolio['optionValue'])); ?>
												<?php endif; ?>
											</span>
											</div>
										<?php						
										}
									}
									?>
									<?php if(get_post_meta(get_the_ID(), "qode_portfolio_date", true)) : ?>
									<div class="info">
										<h5><?php _e('Date','qode'); ?></h5>
										<span><?php echo get_post_meta(get_the_ID(), "qode_portfolio_date", true); ?></span>
									</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<div class="column2">
							<div class="column_inner">
								<div class="portfolio_single_text_holder">
									<h5><?php echo _e('About','qode'); ?></h5>
									<?php the_content(); ?>
									<?php echo do_shortcode('[social_share]'); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="portfolio_navigation">
						<div class="portfolio_prev"><?php previous_post_link('%link', __('Previous Project','qode')); ?></div>
						<?php if(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true) != ""){ ?>
							<div class="portfolio_button"><a href="<?php echo get_permalink(get_post_meta(get_the_ID(), "qode_choose-portfolio-list-page", true)); ?>"></a></div>
						<?php } ?>
						<div class="portfolio_next"><?php next_post_link('%link', __('Next Project','qode')); ?></div>
					</div>
				<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>	
		</div>
	</div>
</div>
<?php get_footer(); ?>	