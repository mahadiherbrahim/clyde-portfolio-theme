<?php
	global $clyde_section_id;
	$clyde_section_meta = get_post_meta( $clyde_section_id,'clyde-about-section',true ); 
	
		$clyde_section = get_post($clyde_section_id);
		$clyde_section_title = $clyde_section->post_title;
		$clyde_section_desc = $clyde_section->post_content;

		$about_image = wp_get_attachment_image_src( $clyde_section_meta['about_image'],'full');

?>
<section class="ftco-about ftco-section ftco-no-pt ftco-no-pb" id="<?php echo esc_attr( $clyde_section->post_name ); ?>">
	<div class="container">
		<div class="row d-flex no-gutters">
			<div class="col-md-6 col-lg-5 d-flex">
				<div class="img-about img d-flex align-items-stretch">
					<div class="overlay"></div>
					<div class="img d-flex align-self-stretch align-items-center" style="background-image:url(<?php echo esc_url($about_image[0] ); ?> ">
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-7 pl-md-4 pl-lg-5 py-5">
				<div class="py-md-5">
					<div class="row justify-content-start pb-3">
						<div class="col-md-12 heading-section ftco-animate">
							<span class="subheading"><?php echo esc_html( $clyde_section_meta['about_top_title'] ); ?></span>
							<h2 class="mb-4" style="font-size: 34px; text-transform: capitalize;">
								<?php echo esc_html( $clyde_section_title ); ?>
							</h2>
							<p><?php echo apply_filters('the_content', $clyde_section_desc ); ?></p>

							<ul class="about-info mt-4 px-md-0 px-2">
								<li class="d-flex"><span><?php _e('Name: ','clyde') ?></span> <span><?php echo esc_html( $clyde_section_meta['about_name'] ); ?></span></li>
								<li class="d-flex"><span><?php _e('Date of birth: ','clyde') ?></span> <span><?php echo esc_html( $clyde_section_meta['about_date_of_birth'] ); ?></span></li>
								<li class="d-flex"><span><?php _e('Address: ','clyde') ?></span> <span><?php echo esc_html( $clyde_section_meta['about_address'] ); ?></span></li>
								<li class="d-flex"><span><?php _e('Zip code: ','clyde') ?></span> <span><?php echo esc_html( $clyde_section_meta['about_zipcode'] ); ?></span></li>
								<li class="d-flex"><span><?php _e('Email: ','clyde') ?></span> <span><?php echo esc_html( $clyde_section_meta['about_email'] ); ?></span></li>
								<li class="d-flex"><span><?php _e('Phone:  ','clyde') ?></span> <span><?php echo esc_html( $clyde_section_meta['about_phone'] ); ?></span></li>
							</ul>
						</div>
						<div class="col-md-12">
							<?php  
								$clyde_section_meta = $clyde_section_meta['about-hobbies'];
								if(isset($clyde_section_meta)):
							?>
								<div class="my-interest d-lg-flex w-100">
								<?php  
									foreach ($clyde_section_meta as $csm):
								?>
									<div class="interest-wrap d-flex align-items-center">
										<div class="icon d-flex align-items-center justify-content-center">
											<span class="<?php echo esc_attr( $csm['about_hobbies_icon'] ); ?>"></span>
										</div>
										<div class="text"><?php echo esc_html( $csm['about_hobbies_title'] ); ?></div>
									</div>
								<?php  
									endforeach;
								?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>