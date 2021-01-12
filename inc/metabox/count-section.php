<?php 

function clyde_count_section_metabox($metaboxs){

	$section_id = 0;
	
    if(isset($_REQUEST['post'])|isset($_REQUEST['post_ID'])){
        $section_id = empty($_REQUEST['post_ID'])?$_REQUEST['post']:$_REQUEST['post_ID'];
    }
    if ('section'!=get_post_type( $section_id )) {
		return $metaboxs;
	}

    $section_meta = get_post_meta( $section_id, 'clyde-section-type' , true );
    $section_type = $section_meta['section-type'];


    if ('count' != $section_type) {
        return $metaboxs;
    }

		$metaboxs[] = array(
		'id' => 'clyde-count-section',
		'title' => __('Count Settings','clyde'),
		'post_type' => 'section',
		'context' => 'normal',
		'priority' => 'default',
		'sections' => array(
				array(
					'name'=> 'count-section-meta',
					'icon' => 'fa fa-image',
					'fields' => array(
						array(
							'id' => 'count-meta',
							'title' => __('Count Settings','clyde'),
							'type' => 'group',
							'button_title' => __('New Count Box','clyde'),
							'accordion_title' => __('Add New Count Box','clyde'),
							'fields' => array(
								array(
								'id' => 'count_icon',
								'title' => __('Count Icon','clyde'),
								'type' => 'text',
								),
								array(
									'id' => 'count_title',
									'title' => __('Count Title','clyde'),
									'type' => 'text',
								),
								array(
									'id' => 'count_number',
									'title' => __('Count Number','clyde'),
									'type' => 'text',
								),
							),
						)
					)
				)
			)
		);
	return $metaboxs;
}
add_action( 'cs_metabox_options', 'clyde_count_section_metabox');