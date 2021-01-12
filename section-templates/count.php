<?php
	global $clyde_section_id;
	$clyde_section_meta = get_post_meta( $clyde_section_id,'clyde-count-section',true ); 

		$clyde_section = get_post($clyde_section_id);
		$clyde_section_title = $clyde_section->post_title;
		$clyde_section_desc = $clyde_section->post_content;

?>
<section class="ftco-counter img bg-light"id="<?php echo esc_attr( $clyde_section->post_name ); ?>">
		<div class="container">
			<?php  
				$clye_count_meta = $clyde_section_meta['count-meta'];
			if(isset($clye_count_meta)):
			?>
			<div class="row">
				<?php  
					foreach ($clye_count_meta as $ccm):
					
				?>
				<div class="col-md-3 justify-content-center counter-wrap ftco-animate">
					<div class="block-18 d-flex">
						<div class="icon d-flex justify-content-center align-items-center">
							<span class="<?php echo esc_attr( $ccm['count_icon'] ); ?>"></span>
						</div>
						<div class="text">
							<strong class="number" data-number="<?php echo esc_attr( $ccm['count_number'] ); ?>">0</strong>
							<span>
								<?php  
									echo esc_html($ccm['count_title']);
								?>
							</span>
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