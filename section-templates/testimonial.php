<?php
	global $clyde_section_id;
	$clyde_section_meta = get_post_meta( $clyde_section_id,'clyde-testimonial-section',true ); 
	
		$clyde_section = get_post($clyde_section_id);
		$clyde_section_title = $clyde_section->post_title;
		$clyde_section_desc = $clyde_section->post_content;


?>
<section class="ftco-section testimony-section bg-primary" id="<?php echo esc_attr( $clyde_section->post_name ); ?>">
	<div class="container">
		<div class="row justify-content-center pb-5">
			<div class="col-md-12 heading-section heading-section-white text-center ftco-animate">
				<span class="subheading">
					<?php echo  esc_html( $clyde_section_meta['testimonial_top_title'] ); ?>
				</span>
				<h2 class="mb-4">
					<?php echo  esc_html( $clyde_section_title ); ?>
				</h2>
				<p><?php echo  apply_filters( 'the_content', $clyde_section_desc ); ?></p>
			</div>
		</div>
		<div class="row ftco-animate">
			<div class="col-md-12">
				<?php  
					$clyde_section_meta = $clyde_section_meta['testimonials'];
					if (isset($clyde_section_meta)):
				?>
				<div class="carousel-testimony owl-carousel">
					<?php  
						foreach ($clyde_section_meta as $csm):
							$testimonial_image = wp_get_attachment_image_src( $csm['testimonial_image'], 'medium');
					?>
					<div class="item">
						<div class="testimony-wrap py-4">
							<div class="text">
								<span class="fa fa-quote-left"></span>
								<p class="mb-4 pl-5">
									<?php echo esc_html( $csm['testimonial_description'] );  ?>
								</p>
								<div class="d-flex align-items-center">
									<div class="user-img" style="background-image: url(<?php echo esc_url($testimonial_image['0']); ?>"></div>
									<div class="pl-3">
										<p class="name"><?php echo esc_html( $csm['testimonial_name'] ); ?></p>
										<span class="position"><?php echo esc_html( $csm['testimonial_title'] ); ?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php  
						endforeach;
					?>
				</div>
				<?php  
					endif;
				?>
			</div>
		</div>
	</div>
</section>