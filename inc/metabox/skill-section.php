<?php 

function clyde_skill_section_metabox($metaboxs){


	$section_id = 0;
	
    if(isset($_REQUEST['post'])|isset($_REQUEST['post_ID'])){
        $section_id = empty($_REQUEST['post_ID'])?$_REQUEST['post']:$_REQUEST['post_ID'];
    }
    if ('section'!=get_post_type( $section_id )) {
		return $metaboxs;
	}

    $section_meta = get_post_meta( $section_id, 'clyde-section-type' , true );
    $section_type = $section_meta['section-type'];


    if ('skill' != $section_type) {
        return $metaboxs;
    }

		$metaboxs[] = array(
		'id' => 'clyde-skill-section',
		'title' => __('Skill Settings','clyde'),
		'post_type' => 'section',
		'context' => 'normal',
		'priority' => 'default',
		'sections' => array(
			array(
				'name'=> 'skill-section-meta',
				'icon' => 'fa fa-image',
				'fields' => array(
						
						array(
							'id' => 'skill_top_title',
							'title' => __('Skill Top Title','clyde'),
							'type' => 'text',
						),

						array(
						'id' => 'skill-items',
						'title' => __('My Skills','clyde'),
						'type' => 'group',
						'button_title' => __('New Skill','clyde'),
						'accordion_title' => __('Add New Skill','clyde'),
						'fields' => array(
							array(
							'id' => 'skill_items_title',
							'title' => __('Skill Item Title','clyde'),
							'type' => 'text',
							),
							array(
							'id' => 'skill_percent',
							'title' => __('Skill Percent Number','clyde'),
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
add_action( 'cs_metabox_options', 'clyde_skill_section_metabox');