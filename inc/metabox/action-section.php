<?php 

function clyde_action_section_metabox($metaboxs){


	$section_id = 0;
	
    if(isset($_REQUEST['post'])|isset($_REQUEST['post_ID'])){
        $section_id = empty($_REQUEST['post_ID'])?$_REQUEST['post']:$_REQUEST['post_ID'];
    }
    if ('section'!=get_post_type( $section_id )) {
		return $metaboxs;
	}

    $section_meta = get_post_meta( $section_id, 'clyde-section-type' , true );
    $section_type = $section_meta['section-type'];


    if ('action' != $section_type) {
        return $metaboxs;
    }

		$metaboxs[] = array(
		'id' => 'clyde-action-section',
		'title' => __('Call To Action Settings','clyde'),
		'post_type' => 'section',
		'context' => 'normal',
		'priority' => 'default',
		'sections' => array(
			array(
				'name'=> 'action-section-meta',
				'icon' => 'fa fa-image',
				'fields' => array(
						array(
							'id' => 'action_picture',
							'title' => __('Action Picture','clyde'),
							'type' => 'image',
						),
						array(
							'id' => 'action_button_title',
							'title' => __('Action Button Title','clyde'),
							'type' => 'text',
						),
						array(
							'id' => 'action_button_target',
							'title' => __('Action Button Target','clyde'),
							'type' => 'text',
						),
					)
				)
			)
		);
	return $metaboxs;
}
add_action( 'cs_metabox_options', 'clyde_action_section_metabox');