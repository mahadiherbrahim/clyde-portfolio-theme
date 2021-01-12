<?php
	global $clyde_section_id;
	$clyde_section_meta = get_post_meta( $clyde_section_id,'clyde-protfolio-section',true ); 
	
		$clyde_section = get_post($clyde_section_id);
		$clyde_section_title = $clyde_section->post_title;
		$clyde_section_desc = $clyde_section->post_content;


?>
<section class="ftco-section ftco-project" id="protfolio <?php echo esc_attr( $clyde_section->post_name ); ?>">
		<div class="container-fluid px-md-4">
			<div class="row justify-content-center pb-5">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<span class="subheading">
						<?php echo esc_html( $clyde_section_meta['protfolio_top_title'] ); ?>
					</span>
					<h2 class="mb-4">
						<?php echo esc_html( $clyde_section_title ); ?>
					</h2>
					<?php echo apply_filters( 'the_content', $clyde_section_desc ); ?>
				</div>
			</div>
			<?php  
				$clyde_section_meta = $clyde_section_meta['protfolio-items'];
				if (isset($clyde_section_meta)):
					
			?>
				<div class="row">
					<?php  
						foreach ($clyde_section_meta as $csm):
						$protfolio_image = wp_get_attachment_image_src($csm['protfolio_image'],'clyde-protfolio-size');	
					?>
						<div class="col-md-3">
							<a href="<?php echo esc_url($csm['protfolio_url']); ?>" target="_blank">
								<div class="project img shadow ftco-animate d-flex justify-content-center align-items-center" style="background-image: url(<?php echo esc_url($protfolio_image[0]); ?>">
									<div class="overlay"></div>
									<div class="text text-center p-4">
										<h3>
											<?php echo esc_html($csm['protfolio_name']); ?>
										</h3>
										<span><?php echo esc_html($csm['protfolio_category']); ?></span>
									</div>
								</div>
							</a>
						</div>
					<?php  
						endforeach;
					?>
				</div>
			<?php  
				endif;
			?>
		</div>
	</section>





