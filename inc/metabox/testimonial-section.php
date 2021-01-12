<?php 

function clyde_testimonial_section_metabox($metaboxs){


	$section_id = 0;
	
    if(isset($_REQUEST['post'])|isset($_REQUEST['post_ID'])){
        $section_id = empty($_REQUEST['post_ID'])?$_REQUEST['post']:$_REQUEST['post_ID'];
    }
    if ('section'!=get_post_type( $section_id )) {
		return $metaboxs;
	}

    $section_meta = get_post_meta( $section_id, 'clyde-section-type' , true );
    $section_type = $section_meta['section-type'];


    if ('testimonial' != $section_type) {
        return $metaboxs;
    }

		$metaboxs[] = array(
		'id' => 'clyde-testimonial-section',
		'title' => __('Testimonial Settings','clyde'),
		'post_type' => 'section',
		'context' => 'normal',
		'priority' => 'default',
		'sections' => array(
			array(
				'name'=> 'testimonial-section-meta',
				'icon' => 'fa fa-image',
				'fields' => array(
						
						array(
							'id' => 'testimonial_top_title',
							'title' => __('Testmonial Top Title','clyde'),
							'type' => 'text',
						),

						array(
						'id' => 'testimonials',
						'title' => __('Testimonials','clyde'),
						'type' => 'group',
						'button_title' => __('New Testimonial','clyde'),
						'accordion_title' => __('Add New Testimonials','clyde'),
						'fields' => array(
							array(
							'id' => 'testimonial_name',
							'title' => __('Testimonial Name','clyde'),
							'type' => 'text',
							),
							array(
							'id' => 'testimonial_image',
							'title' => __('Testimonial Image','clyde'),
							'type' => 'image',
							),
							array(
							'id' => 'testimonial_title',
							'title' => __('Testimonial title','clyde'),
							'type' => 'text',
							),
							array(
							'id' => 'testimonial_description',
							'title' => __('Testimonial Description','clyde'),
							'type' => 'textarea',
							),
					)
				)
			)
		)
	)
);
	return $metaboxs;
}
add_action( 'cs_metabox_options', 'clyde_testimonial_section_metabox');