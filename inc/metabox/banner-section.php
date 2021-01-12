<?php 

function clyde_banner_section_metabox($metaboxs){


	$section_id = 0;
	
    if(isset($_REQUEST['post'])|isset($_REQUEST['post_ID'])){
        $section_id = empty($_REQUEST['post_ID'])?$_REQUEST['post']:$_REQUEST['post_ID'];
    }
    if ('section'!=get_post_type( $section_id )) {
		return $metaboxs;
	}

    $section_meta = get_post_meta( $section_id, 'clyde-section-type' , true );
    $section_type = $section_meta['section-type'];


    if ('banner' != $section_type) {
        return $metaboxs;
    }

		$metaboxs[] = array(
		'id' => 'clyde-banner-section',
		'title' => __('Banner Settings','clyde'),
		'post_type' => 'section',
		'context' => 'normal',
		'priority' => 'default',
		'sections' => array(
			array(
				'name'=> 'banner-section-meta',
				'icon' => 'fa fa-image',
				'fields' => array(
					array(
						'id' => 'banner-items',
						'title' => __('My Banner','clyde'),
						'type' => 'group',
						'button_title' => __('New Banner','clyde'),
						'accordion_title' => __('Add New  Banner','clyde'),
						'fields' =>array(
						array(
							'id' => 'banner_title',
							'title' => __('Banner Title','clyde'),
							'type' => 'text',
						),array(
							'id' => 'banner_subtitle',
							'title' => __('Banner Subtitle','clyde'),
							'type' => 'text',
						),array(
							'id' => 'banner_image',
							'title' => __('Banner Image','clyde'),
							'type' => 'image',
						),
						array(
							'id' => 'button_target',
							'title' => __('Button target','clyde'),
							'type' => 'text',
						),
						array(
							'id' => 'button_title',
							'title' => __('Button Title','clyde'),
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
add_action( 'cs_metabox_options', 'clyde_banner_section_metabox');