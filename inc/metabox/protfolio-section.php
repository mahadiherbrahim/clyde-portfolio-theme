<?php 

function clyde_protfolio_section_metabox($metaboxs){


	$section_id = 0;
	
    if(isset($_REQUEST['post'])|isset($_REQUEST['post_ID'])){
        $section_id = empty($_REQUEST['post_ID'])?$_REQUEST['post']:$_REQUEST['post_ID'];
    }
    if ('section'!=get_post_type( $section_id )) {
		return $metaboxs;
	}

    $section_meta = get_post_meta( $section_id, 'clyde-section-type' , true );
    $section_type = $section_meta['section-type'];


    if ('protfolio' != $section_type) {
        return $metaboxs;
    }

		$metaboxs[] = array(
		'id' => 'clyde-protfolio-section',
		'title' => __('Protfolio Settings','clyde'),
		'post_type' => 'section',
		'context' => 'normal',
		'priority' => 'default',
		'sections' => array(
			array(
				'name'=> 'protfolio-section-meta',
				'icon' => 'fa fa-image',
				'fields' => array(
						
						array(
							'id' => 'protfolio_top_title',
							'title' => __('Protfolio Top Title','clyde'),
							'type' => 'text',
						),

						array(
						'id' => 'protfolio-items',
						'title' => __('My Protfolio','clyde'),
						'type' => 'group',
						'button_title' => __('New Protfolio','clyde'),
						'accordion_title' => __('Add New Protfolio','clyde'),
						'fields' => array(
							array(
							'id' => 'protfolio_image',
							'title' => __('Protfolio Image','clyde'),
							'type' => 'image',
							),
							array(
							'id' => 'protfolio_url',
							'title' => __('Protfolio URL','clyde'),
							'type' => 'text',
							),
							array(
							'id' => 'protfolio_name',
							'title' => __('Protfolio Name','clyde'),
							'type' => 'text',
							),
							array(
							'id' => 'protfolio_category',
							'title' => __('Protfolio Category','clyde'),
							'type' => 'text',
							),
					)
				)
			)
		)
	)
);
	return $metaboxs;
}
add_action( 'cs_metabox_options', 'clyde_protfolio_section_metabox');