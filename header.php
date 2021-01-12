<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php wp_head(); ?>
</head>
 <?php wp_body_open(); ?>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300" class="<?php body_class(); ?>">
	
	
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
		<div class="container">
			<?php  
                    if(has_custom_logo()){
                        echo get_custom_logo();
                    }else{
                ?>
                    <a href="<?php echo site_url(); ?>" class="site-logo navbar-brand"><?php echo get_bloginfo('name'); ?></a>
                <?php
                    }
                ?>
			<button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>
				
			
			
					<?php
                        echo    wp_nav_menu( array(
                              'theme_location'  => 'mainmenu',
                              'depth'           => 1, // 1 = no dropdowns, 2 = with dropdowns.
                              'container'       => 'div',
                              'container_class' => 'collapse navbar-collapse',
                              'container_id'    => 'ftco-nav',
                              'menu_class'      => 'navbar-nav nav ml-auto',
                              'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                              'walker'          => new WP_Bootstrap_Navwalker(),
                          ) );
                    ?>
                    
		</div>
	</nav>