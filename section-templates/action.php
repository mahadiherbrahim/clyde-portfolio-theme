<?php
	global $clyde_section_id;
	$clyde_section_meta = get_post_meta( $clyde_section_id,'clyde-action-section',true ); 
	
		$clyde_section = get_post($clyde_section_id);
		$clyde_section_title = $clyde_section->post_title;
		$clyde_section_desc = $clyde_section->post_content;

		$action_image = wp_get_attachment_image_src( $clyde_section_meta['action_picture'] , 'full' );
?>
<section class="ftco-hireme" id="<?php echo esc_attr( $clyde_section->post_name ); ?>">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-md-8 col-lg-8 d-flex align-items-center">
				<div class="w-100 py-4">
					<h2>
						<?php  
							echo esc_html( $clyde_section_title );
						?>
					</h2>
					<p>
						<?php  
							echo apply_filters( 'the_content', $clyde_section_desc );
						?>
					</p>
					<p class="mb-0"><a href="<?php echo esc_attr( $clyde_section_meta['action_button_target'] ); ?>" class="btn btn-white py-3 px-4" blank="">
						<?php echo esc_html( $clyde_section_meta['action_button_title'] ); ?>
					</a></p>
				</div>
			</div>
			<div class="col-md-4 col-lg-4 d-flex align-items-end">
				<img src="<?php echo esc_url($action_image[0]); ?>" class="img-fluid" alt="<?php echo esc_attr($clyde_section_title); ?>">
			</div>
		</div>
	</div>
</section>