<?php

$general_tab = array(
	"name" => "general",
	"title" => __("General","apptheme"),
	'sections' => array(
		'general' => array(
			'name' => 'general',
			'title' => __( 'General', 'apptheme' ),
			'description' => __( 'Settings that affect the entire theme.','apptheme' )
		)
	)
);

$options = array(

	'display_logo' => array(
		'tab' => "general",
		"name" => "display_logo",
		"title" => "Display Logo",
		'description' => __( 'Do you want to show your company logo in the header?', 'apptheme' ),
		'section' => 'general',
		'since' => '1.0',
	    "id" => "general",
	    "type" => "select",
	    "default" => "yes",
	    "valid_options" => array(
	    	'no' => array(
	    		"name" => "no",
	    		"title" => __( 'No', 'apptheme' )
	    	),
	    	'yes' => array(
	    		"name" => "yes",
	    		"title" => __( 'Yes', 'apptheme' )
	    	)
	    )
	),
	'logo' => array(
		'tab' => "general",
		"name" => "logo",
		"title" => "Logo",
		'description' => __( 'Upload your logo or select from the gallery. (240px x 75px)', 'apptheme' ),
		'section' => 'general',
		'since' => '1.0',
	    "id" => "general",
	    "type" => "image",
	    "default" => get_template_directory_uri()."/images/essentials/header/title/logo.png"
	),
	'mirror' => array(
		'tab' => "general",
		"name" => "mirror",
		"title" => "Default Layout",
		'description' => __( 'Do you want your site to have the iPhone container on the left or right side.', 'apptheme' ),
		'section' => 'general',
		'since' => '1.0',
	    "id" => "general",
	    "type" => "select",
	    "default" => "left",
	    "valid_options" => array(
	    	'left' => array(
	    		"name" => "left",
	    		"title" => __( 'iPhone on Left', 'apptheme' )
	    	),
	    	'right' => array(
	    		"name" => "right",
	    		"title" => __( 'iPhone on Right', 'apptheme' )
	    	)
	    )
	),
'default_video' => array(
	'tab' => "general",
	"name" => "default_video",
	"title" => "Default Demo Video URL",
	'description' => __( 'Please enter the URL of a default demo video that will be displayed on every page that is not an app showcase page (Needs to be sized to 230x346).', 'apptheme' ),
	'section' => 'general',
	'since' => '1.0',
    "id" => "general",
    "type" => "text",
    "default" => get_template_directory_uri()."/media/example.mov"
),
'default_image' => array(
	'tab' => "general",
	"name" => "default_image",
	"title" => "Default Demo Video URL",
	'description' => __( 'Please enter the URL of a default demo image that will be displayed on every page that is not an app showcase page (Needs to be sized to 230x346).', 'apptheme' ),
	'section' => 'general',
	'since' => '1.0',
    "id" => "general",
    "type" => "text",
    "default" => get_template_directory_uri()."/images/screenshot-1.png"
),
	'footer_text' => array(
		'tab' => "general",
		"name" => "footer_text",
		"title" => "Footer Text",
		'description' => __( 'Enter the text you\'d like to have in the footer.', 'apptheme' ),
		'section' => 'general',
		'since' => '1.0',
	    "id" => "general",
	    "type" => "text",
	    "default" => "Copyright " . date('Y') . " UpThemes.com. All Rights Reserved."
	)

);

register_theme_option_tab($general_tab);
register_theme_options($options);

?>