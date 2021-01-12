<?php 

function clyde_about_section_metabox($metaboxs){


	$section_id = 0;
	
    if(isset($_REQUEST['post'])|isset($_REQUEST['post_ID'])){
        $section_id = empty($_REQUEST['post_ID'])?$_REQUEST['post']:$_REQUEST['post_ID'];
    }
    if ('section'!=get_post_type( $section_id )) {
		return $metaboxs;
	}

    $section_meta = get_post_meta( $section_id, 'clyde-section-type' , true );
    $section_type = $section_meta['section-type'];


    if ('about' != $section_type) {
        return $metaboxs;
    }

		$metaboxs[] = array(
		'id' => 'clyde-about-section',
		'title' => __('About Settings','clyde'),
		'post_type' => 'section',
		'context' => 'normal',
		'priority' => 'default',
		'sections' => array(
			array(
				'name'=> 'about-section-meta',
				'icon' => 'fa fa-image',
				'fields' => array(
						array(
							'id' => 'about_image',
							'title' => __('About Intro Image','clyde'),
							'type' => 'image',
						),
						array(
							'id' => 'about_top_title',
							'title' => __('About Top Title','clyde'),
							'type' => 'text',
						),
						array(
							'id' => 'about_name',
							'title' => __('Name','clyde'),
							'type' => 'text',
						),
						array(
							'id' => 'about_date_of_birth',
							'title' => __('Date Off Birth','clyde'),
							'type' => 'text',
						),
						array(
							'id' => 'about_address',
							'title' => __('Address','clyde'),
							'type' => 'text',
						),
						array(
							'id' => 'about_zipcode',
							'title' => __('Zipcode','clyde'),
							'type' => 'text',
						),
						array(
							'id' => 'about_email',
							'title' => __('Email','clyde'),
							'type' => 'text',
						),
						array(
							'id' => 'about_phone',
							'title' => __('Phone','clyde'),
							'type' => 'text',
						),
						array(
						'id' => 'about-hobbies',
						'title' => __('About Hobbies','clyde'),
						'type' => 'group',
						'button_title' => __('New Hobbies','clyde'),
						'accordion_title' => __('Add New Hobbies','clyde'),
						'fields' => array(
							array(
							'id' => 'about_hobbies_icon',
							'title' => __('Hobbies Icon','clyde'),
							'type' => 'text',
							),
							array(
							'id' => 'about_hobbies_title',
							'title' => __('Hobbies Title','clyde'),
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
add_action( 'cs_metabox_options', 'clyde_about_section_metabox');