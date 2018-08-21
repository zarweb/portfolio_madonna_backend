<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div class="loading">
        <svg version="1.1" id="L6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
           <rect fill="none" stroke="#000" stroke-width="4" x="25" y="25" width="50" height="50">
               <animateTransform attributeName="transform" dur="0.5s" from="0 50 50" to="180 50 50" type="rotate" id="strokeBox" attributeType="XML" begin="rectBox.end"/>
           </rect>
            <rect x="27" y="27" fill="#000" width="46" height="50">
                <animate attributeName="height" dur="1.3s" attributeType="XML" from="50" to="0" id="rectBox" fill="freeze" begin="0s;strokeBox.end"/>
            </rect>
        </svg>
    </div>

    <div class="mobile-burger">
        <img src="<?php bloginfo('template_url');?>/img/menu.svg" alt="img">
    </div>


