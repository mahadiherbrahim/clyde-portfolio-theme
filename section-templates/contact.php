<?php
	global $clyde_section_id;
	$clyde_section_meta = get_post_meta( $clyde_section_id,'clyde-contact-section',true ); 
	
		$clyde_section = get_post($clyde_section_id);
		$clyde_section_title = $clyde_section->post_title;
		$clyde_section_desc = $clyde_section->post_content;

?>
<section class="ftco-section contact-section ftco-no-pb" id="<?php echo esc_attr( $clyde_section->post_name ); ?>">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">
					<?php echo esc_html($clyde_section_meta['contact_top_title']); ?>
				</span>
				<h2 class="mb-4">
					<?php echo esc_html( $clyde_section_title ); ?>
				</h2>
				<?php echo apply_filters( 'the_content', $clyde_section_desc ); ?>
			</div>
		</div>

		<div class="row block-9">
			<div class="col-md-8">
				<?php 
					echo do_shortcode($clyde_section_meta['contact_form_shortcode']);
				?>
			</div>

			<div class="col-md-4 d-flex pl-md-5">
				<div class="row">
					<div class="dbox w-100 d-flex">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="fa fa-map-marker"></span>
						</div>
						<div class="text">
							<p><span><?php _e('Address:','clyde') ?></span><?php echo esc_html($clyde_section_meta['contact_address']); ?></p>
						</div>
					</div>
					<div class="dbox w-100 d-flex">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="fa fa-phone"></span>
						</div>
						<div class="text">
							<p><span><?php _e('Phone:','clyde') ?></span> <a href="tel://<?php echo esc_url($clyde_section_meta['contact_phone']); ?>"><?php echo esc_html($clyde_section_meta['contact_phone']); ?></a></p>
						</div>
					</div>
					<div class="dbox w-100 d-flex">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="fa fa-paper-plane"></span>
						</div>
						<div class="text">
							<p><span><?php _e('Email:','clyde') ?></span> <a href="mailto:<?php echo esc_url($clyde_section_meta['contact_email']); ?>"><?php echo esc_html($clyde_section_meta['contact_email']); ?></a></p>
						</div>
					</div>
					<div class="dbox w-100 d-flex">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="fa fa-globe"></span>
						</div>
						<div class="text">
							<p><span><?php _e('Website:','clyde') ?></span> <a href="<?php echo esc_url($clyde_section_meta['contact_website']); ?>"><?php echo esc_html($clyde_section_meta['contact_website']); ?></a></p>
						</div>
					</div>
				</div>
				<!-- <div id="map" class="map"></div> -->
			</div>
		</div>
	</div>
</section>