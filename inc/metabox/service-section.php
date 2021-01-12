<?php 

function clyde_service_section_metabox($metaboxs){


	$section_id = 0;
	
    if(isset($_REQUEST['post'])|isset($_REQUEST['post_ID'])){
        $section_id = empty($_REQUEST['post_ID'])?$_REQUEST['post']:$_REQUEST['post_ID'];
    }
    if ('section'!=get_post_type( $section_id )) {
		return $metaboxs;
	}

    $section_meta = get_post_meta( $section_id, 'clyde-section-type' , true );
    $section_type = $section_meta['section-type'];


    if ('service' != $section_type) {
        return $metaboxs;
    }

		$metaboxs[] = array(
		'id' => 'clyde-service-section',
		'title' => __('Service Settings','clyde'),
		'post_type' => 'section',
		'context' => 'normal',
		'priority' => 'default',
		'sections' => array(
			array(
				'name'=> 'service-section-meta',
				'icon' => 'fa fa-image',
				'fields' => array(
						
						array(
							'id' => 'service_top_title',
							'title' => __('Service Top Title','clyde'),
							'type' => 'text',
						),

						array(
						'id' => 'service-items',
						'title' => __('My Services','clyde'),
						'type' => 'group',
						'button_title' => __('New Service','clyde'),
						'accordion_title' => __('Add New Services','clyde'),
						'fields' => array(
							array(
							'id' => 'service_items_title',
							'title' => __('Service Item Title','clyde'),
							'type' => 'text',
							),array(
							'id' => 'service_items_icon',
							'title' => __('Service Item Icon','clyde'),
							'type' => 'text',
							),array(
							'id' => 'service_items_descrption',
							'title' => __('Service Item Descrption','clyde'),
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
add_action( 'cs_metabox_options', 'clyde_service_section_metabox');