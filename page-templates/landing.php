<?php 
/*
* Template Name: landing page template;
*/
get_header(); ?>
	
	<?php  
	
        $clyde_current_page_id = get_the_ID();
        $clyde_page_meta = get_post_meta( $clyde_current_page_id, 'section_picker_metabox',true);
        foreach ($clyde_page_meta['section-1'] as $clyde_page_section):
            $clyde_section_id = $clyde_page_section['section'];

            $clyde_section_meta = get_post_meta(  $clyde_section_id,'clyde-section-type',true );
            $clyde_section_type = $clyde_section_meta['section-type'];

            get_template_part( "section-templates/{$clyde_section_type}" );
        endforeach;
    ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	
<?php get_footer(); ?>