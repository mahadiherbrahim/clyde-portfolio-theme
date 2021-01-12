<?php
	global $clyde_section_id;
	$clyde_section_meta = get_post_meta( $clyde_section_id,'clyde-skill-section',true ); 
	
		$clyde_section = get_post($clyde_section_id);
		$clyde_section_title = $clyde_section->post_title;
		$clyde_section_desc = $clyde_section->post_content;

?>
<section class="ftco-section bg-light" id="<?php echo esc_attr( $clyde_section->post_name ); ?>">
	<div class="container">
		<div class="row justify-content-center pb-5">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<span class="subheading">
					<?php  
						echo esc_html( $clyde_section_meta['skill_top_title'] );
					?>
				</span>
				<h2 class="mb-4">
					<?php  
						echo esc_html( $clyde_section_title );
					?>
				</h2>
				<p><?php echo apply_filters( 'the_content', $clyde_section_desc ); ?></p>
			</div>
		</div>
		<?php  
				$clyde_section_meta = $clyde_section_meta['skill-items'];
				if (isset($clyde_section_meta)):
		?>
		<div class="row progress-circle mb-5">
			<?php  
				foreach ($clyde_section_meta as $csm):
			?>
				<div class="col-lg-4 mb-4">
					<div class="bg-white rounded-lg shadow p-4">
						<h2 class="h5 font-weight-bold text-center mb-4">
							<?php echo esc_html( $csm['skill_items_title'] ); ?>
						</h2>

						<!-- Progress bar 1 -->
						<div class="progress mx-auto" data-value="<?php echo  esc_attr( $csm['skill_percent'] ); ?>">
							<span class="progress-left">
								<span class="progress-bar border-primary" style="transform: rotate(162deg);"></span>
							</span>
							<span class="progress-right">
								<span class="progress-bar border-primary" style="transform: rotate(180deg);"></span>
							</span>
							<div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
								<div class="h2 font-weight-bold"><?php echo esc_html( $csm['skill_percent'] ); ?><sup class="small"><?php _e('%','clyde'); ?></sup></div>
							</div>
						</div>
						<!-- END -->
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