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

$design_tab = array(
	"name" => "design",
	"title" => __("Design","apptheme"),
	'sections' => array(
		'general' => array(
			'name' => 'design',
			'title' => __( 'Design', 'apptheme' ),
			'description' => __( 'Design settings that affect the entire theme.','apptheme' )
		)
	)
);

$options = array(

	'display_logo' => array(
		'tab' => "design",
		"name" => "display_logo",
		"title" => "Display Logo",
		'description' => __( 'Do you want to show your company logo in the header?', 'apptheme' ),
		'section' => 'design',
		'since' => '1.0',
	    "id" => "design",
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
		'tab' => "design",
		"name" => "logo",
		"title" => "Logo",
		'description' => __( 'Upload your logo or select from the gallery. (240px x 75px)', 'apptheme' ),
		'section' => 'design',
		'since' => '1.0',
	    "id" => "design",
	    "type" => "image",
	    "default" => get_template_directory_uri()."/images/essentials/header/title/logo.png"
	),
	'mirror' => array(
		'tab' => "design",
		"name" => "mirror",
		"title" => "Default Layout",
		'description' => __( 'Do you want your site to have the iPhone container on the left or right side.', 'apptheme' ),
		'section' => 'design',
		'since' => '1.0',
	    "id" => "design",
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
	'video' => array(
		'tab' => "general",
		"name" => "video",
		"title" => "Demo Video URL",
		'description' => __( 'Please enter the URL of your demo video (Needs to be sized to 230x346).', 'apptheme' ),
		'section' => 'general',
		'since' => '1.0',
	    "id" => "general",
	    "type" => "text",
	    "default" => get_template_directory_uri()."/media/example.mov"
	),
	'app_name' => array(
		'tab' => "general",
		"name" => "app_name",
		"title" => "App Name",
		'description' => __( 'Please enter the name of your app.', 'apptheme' ),
		'section' => 'general',
		'since' => '1.0',
	    "id" => "general",
	    "type" => "text",
	    "default" => "AppTheme"
	),
	'app_price' => array(
		'tab' => "general",
		"name" => "app_price",
		"title" => "App Price",
		'description' => __( 'Enter the price of your app.', 'apptheme' ),
		'section' => 'general',
		'since' => '1.0',
	    "id" => "general",
	    "type" => "text",
	    "default" => "FREE"
	),
	'short_descr' => array(
		'tab' => "general",
		"name" => "short_descr",
		"title" => "App Short Description",
		'description' => __( 'Enter a short description of your app.', 'apptheme' ),
		'section' => 'general',
		'since' => '1.0',
	    "id" => "general",
	    "type" => "textarea",
	    "default" => "This is the section where you enter a short description of your application. This content makes up the first paragraph your users will see so be sure to make it descriptive."
	),
	'addl_descr' => array(
		'tab' => "general",
		"name" => "addl_descr",
		"title" => "App Additional Description",
		'description' => __( 'Enter a longer description of your app.', 'apptheme' ),
		'section' => 'general',
		'since' => '1.0',
	    "id" => "general",
	    "type" => "textarea",
	    "default" => "This is the section where you enter some more detailed information about your application. This content makes up the second paragraph your users will see so be sure to make it descriptive."
	),
	'availability' => array(
		'tab' => "general",
		"name" => "availability",
		"title" => "App Available in App Store?",
		'description' => __( 'Is your app currently available for sale in the app store (if not, there will be a "coming soon" graphic)?', 'apptheme' ),
		'section' => 'general',
		'since' => '1.0',
	    "id" => "general",
	    "type" => "select",
	    "default" => "1",
	    "valid_options" => array(
	    	'0' => array(
	    		"name" => "0",
	    		"title" => __( 'No', 'apptheme' )
	    	),
	    	'1' => array(
	    		"name" => "1",
	    		"title" => __( 'Yes', 'apptheme' )
	    	)
	    )
	),
	'applink' => array(
		'tab' => "general",
		"name" => "applink",
		"title" => "App Link",
		'description' => __( 'Enter the link to your app in the App Store.', 'apptheme' ),
		'section' => 'general',
		'since' => '1.0',
	    "id" => "general",
	    "type" => "text",
	    "default" => "http://itunes.apple.com/app/outside-visual-weather-forecast/id333195276?affId=1657461&mt=8"
	),
	'disable_app_info_pages' => array(
		'tab' => "general",
		"name" => "disable_app_info_pages",
		"title" => "Disable App Info on Pages",
		'description' => __( 'Do you want to disable the app icon, name and price on all pages?', 'apptheme' ),
		'section' => 'general',
		'since' => '1.0',
	    "id" => "general",
	    "type" => "select",
	    "default" => "1",
	    "valid_options" => array(
	    	'0' => array(
	    		"name" => "0",
	    		"title" => __( 'No', 'apptheme' )
	    	),
	    	'1' => array(
	    		"name" => "1",
	    		"title" => __( 'Yes', 'apptheme' )
	    	)
	    )
	),
	'disable_app_info_posts' => array(
		'tab' => "general",
		"name" => "disable_app_info_posts",
		"title" => "Disable App Info on Posts",
		'description' => __( 'Do you want to disable the app icon, name and price on all posts?', 'apptheme' ),
		'section' => 'general',
		'since' => '1.0',
	    "id" => "general",
	    "type" => "select",
	    "default" => "1",
	    "valid_options" => array(
	    	'0' => array(
	    		"name" => "0",
	    		"title" => __( 'No', 'apptheme' )
	    	),
	    	'1' => array(
	    		"name" => "1",
	    		"title" => __( 'Yes', 'apptheme' )
	    	)
			)
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

register_theme_option_tab($design_tab);
register_theme_option_tab($general_tab);
register_theme_options($options);

?>