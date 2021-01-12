<?php 

function clyde_section_picker_metabox($metaboxs){


	$page_id = 0;
    if(isset($_REQUEST['post'])|isset($_REQUEST['post_ID'])){
        $page_id = empty($_REQUEST['post_ID'])?$_REQUEST['post']:$_REQUEST['post_ID'];
    }

    $current_page_template = get_post_meta( $page_id, '_wp_page_template' , true );


    if (!in_array($current_page_template, array('page-templates/landing.php'))) {
        return $metaboxs;
    }

	$metaboxs[] = array(
		'id' => 'section_picker_metabox',
		'title' => __('Section Picker Metabox','clyde'),
		'post_type' => 'page',
		'context' => 'normal',
		'priority' => 'default',
		'sections' => array(
			array(
				'name'=> 'section_picker_metabox_one',
				'title' => __('Manage Sections','clyde'),
				'icon' => 'fa fa-image',
				'fields' => array(
					array(
						'id' => 'section-1',
						'title' => __('Select Section','clyde'),
						'type' => 'group',
						'button_title' => __('New Section','clyde'),
						'accordion_title' => __('Add New Section','clyde'),
						'fields' => array(
							array(
								'id' => 'section',
								'title' => __('Select Sections','clyde'),
								'type' => 'select',
								'options' => 'post',
								'query_args' => array(
									'post_type' => 'section',
									'posts_per_page' =>-1,
								),
							),
						),
					)
				)
			)
		)
	);
	return $metaboxs;
}
add_action( 'cs_metabox_options', 'clyde_section_picker_metabox');