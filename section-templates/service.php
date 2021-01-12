<?php
	global $clyde_section_id;
	$clyde_section_meta = get_post_meta( $clyde_section_id,'clyde-service-section',true ); 
	
		$clyde_section = get_post($clyde_section_id);
		$clyde_section_title = $clyde_section->post_title;
		$clyde_section_desc = $clyde_section->post_content;

?>
<section class="ftco-section" id="<?php echo esc_attr( $clyde_section->post_name ); ?>">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 heading-section text-center ftco-animate mb-5">
				<span class="subheading">
					<?php  
						echo esc_html( $clyde_section_meta['service_top_title'] );
					?>
				</span>
				<h2 class="mb-4">
					<?php  
						echo esc_html( $clyde_section_title );
					?>
				</h2>
				<p>
					<?php  
						echo apply_filters( 'the_content', $clyde_section_desc );
					?>
				</p>
			</div>
		</div>
		<?php  
			$clyde_section_meta = $clyde_section_meta['service-items'];
			if ( isset($clyde_section_meta) ):
		?>
		<div class="row">
			<?php 
				foreach ($clyde_section_meta as $csm):
			?>
			<div class="col-md-6 col-lg-4">
				<div class="media block-6 services d-block bg-white rounded-lg shadow ftco-animate">
					<div class="icon d-flex align-items-center justify-content-center"><span class="<?php echo esc_attr( $csm['service_items_icon'] ); ?>"></span></div>
					<div class="media-body">
						<h3 class="heading mb-3">
							<?php echo esc_html( $csm['service_items_title'] ); ?>
						</h3>
						<p>
							<?php echo apply_filters( 'the_content', $csm['service_items_descrption'] ); ?>
						</p>
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
</section>