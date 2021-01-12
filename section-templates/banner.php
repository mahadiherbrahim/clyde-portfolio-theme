<?php
	global $clyde_section_id;
	$clyde_section_meta = get_post_meta( $clyde_section_id,'clyde-banner-section',true ); 
	
		$clyde_section = get_post($clyde_section_id);
		/*$clyde_section_title = $clyde_section->post_title;
		$clyde_section_desc = $clyde_section->post_content;*/

		$clyde_section_meta = $clyde_section_meta['banner-items'];

		if(isset($clyde_section_meta)):

		
		

?>

	<section class="hero" id="<?php echo esc_attr( $clyde_section->post_name ); ?>" >
		<div class="home-slider owl-carousel">

	<?php  
		foreach ($clyde_section_meta as $csm ):
				$banner_image = wp_get_attachment_image_src( $csm['banner_image'],'full');
				$banner_title = $csm['banner_title'];
				$banner_subtitle = $csm['banner_subtitle'];
				$button_title = $csm['button_title'];
				$button_target = $csm['button_target'];
	?>

			<div class="slider-item">
				<div class="overlay"></div>
				<div class="container-fluid px-md-0">
					<div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
						<div class="one-third order-md-last img" style="background-image:url(<?php echo esc_url($banner_image[0]); ?>">
							<div class="overlay"></div>
							<div class="overlay-1"></div>
						</div>
						<div class="one-forth d-flex  align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
							<div class="text">
								<span class="subheading">
									<?php  
										echo esc_html($banner_subtitle);
									?>
								</span>
								<h1 class="mb-4 mt-3">
									<?php  
										echo esc_html($banner_title);
									?>
								</h1>
								<p><a href="<?php echo esc_url($button_target); ?>" class="btn btn-primary">
									<?php  
										echo esc_html($button_title);
									?>
								</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php  
			endforeach; 
		?>
		</div>
	</section>

<?php 
 endif;
?>