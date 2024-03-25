<?php global $qode_options_stardust; ?>
				
		</div>
	</div>
		<footer>
			<div class="footer_holder clearfix">
				
					
						<?php	
						$display_footer_widget = false;
						if ($qode_options_stardust['footer_widget_area'] == "yes") $display_footer_widget = true;
						if($display_footer_widget): ?> 
						<div class="footer_top_holder">
							<div class="footer_top">
								
								<?php
									$header_in_grid = false;
									if ($qode_options_stardust['header_in_grid'] == "yes") $header_in_grid = true;

								?>
								
								<?php if($header_in_grid){ ?>
									<div class="container">
										<div class="container_inner clearfix">
								<?php } ?>
							
								<div class="four_columns clearfix">
									<div class="column1">
										<div class="column_inner">
											<?php dynamic_sidebar( 'footer_column_1' ); ?>
										</div>
									</div>
									<div class="column2">
										<div class="column_inner">
											<?php dynamic_sidebar( 'footer_column_2' ); ?>
										</div>
									</div>
									<div class="column3">
										<div class="column_inner">
											<?php dynamic_sidebar( 'footer_column_3' ); ?>
										</div>
									</div>
									<div class="column4">
										<div class="column_inner">
											<?php dynamic_sidebar( 'footer_column_4' ); ?>
										</div>
									</div>
								</div>
								
								<?php if($header_in_grid){ ?>
									</div>
								</div>
							<?php } ?>
								
							</div>
						</div>
						<?php endif; ?>
						
						<?php
						$display_footer_text = false;
						if (isset($qode_options_stardust['footer_text'])) {
							if ($qode_options_stardust['footer_text'] == "yes") $display_footer_text = true;
						}
						if($display_footer_text): ?>
						<div class="footer_bottom_holder">
							<div class="footer_bottom">
								<?php dynamic_sidebar( 'footer_text' ); ?>
							</div>
						</div>
						<?php endif; ?>
			</div>
		</footer>
</div>
	<?php wp_footer(); ?>
</body>
</html>