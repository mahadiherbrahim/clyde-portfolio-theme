<?php 


function clyde_section_type_metabox($options){

	$options[] = array(
		'id' => 'clyde-section-type',
		'title' => __('Section Type','clyde'),
		'post_type' => 'section',
		'context' => 'normal',
		'priority' => 'default',
		'sections' => array(
				array(
				'name'=> 'clyde-section-type-section-one',
				'title'=> __('Select Section Type','clyde'),
				'icon'=> 'fa fa-image',
				'fields' => array(
					array(
						'id'=> 'section-type',
						'title' => __('Select Section Type','clyde'),
						'type' => 'select',
						'options'=> array(
							'banner'=> __('Banner','clyde'),
							'count'=> __('Count','clyde'),
							'about'=> __('About','clyde'),
							'skill'=> __('Skill','clyde'),
							'service'=> __('Service','clyde'),
							'action'=> __('Call To Action','clyde'),
							'protfolio'=> __('Protfolio','clyde'),
							'testimonial'=> __('Testimonial','clyde'),
							'contact'=> __('Contact','clyde'),
						),
					),
				),
			),
		),  
	);

	return $options;
}
add_action( 'cs_metabox_options', 'clyde_section_type_metabox');