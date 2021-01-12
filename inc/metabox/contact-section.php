<?php 

function clyde_contact_section_metabox($metaboxs){


	$section_id = 0;
	
    if(isset($_REQUEST['post'])|isset($_REQUEST['post_ID'])){
        $section_id = empty($_REQUEST['post_ID'])?$_REQUEST['post']:$_REQUEST['post_ID'];
    }
    if ('section'!=get_post_type( $section_id )) {
		return $metaboxs;
	}

    $section_meta = get_post_meta( $section_id, 'clyde-section-type' , true );
    $section_type = $section_meta['section-type'];


    if ('contact' != $section_type) {
        return $metaboxs;
    }

		$metaboxs[] = array(
		'id' => 'clyde-contact-section',
		'title' => __('Contact Settings','clyde'),
		'post_type' => 'section',
		'context' => 'normal',
		'priority' => 'default',
		'sections' => array(
			array(
				'name'=> 'contact-section-meta',
				'icon' => 'fa fa-image',
				'fields' => array(
						array(
							'id' => 'contact_top_title',
							'title' => __('Contact Top Title','clyde'),
							'type' => 'text',
						),
						array(
							'id' => 'contact_form_shortcode',
							'title' => __('Contact Shortcode','clyde'),
							'type' => 'text',
						),
						array(
							'id' => 'contact_address',
							'title' => __('Contact Address','clyde'),
							'type' => 'text',
						),array(
							'id' => 'contact_phone',
							'title' => __('Contact Phone','clyde'),
							'type' => 'text',
						),array(
							'id' => 'contact_email',
							'title' => __('Contact email','clyde'),
							'type' => 'text',
						),array(
							'id' => 'contact_website',
							'title' => __('Contact website','clyde'),
							'type' => 'text',
						),
					)
				)
			)
		);
	return $metaboxs;
}
add_action( 'cs_metabox_options', 'clyde_contact_section_metabox');