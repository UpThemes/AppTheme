<?php
/*  Array Options:
   
   name (string)
   desc (string)
   id (string)
   type (string) - text, color, image, select, multiple, textarea, page, pages, category, categories
   value (string) - default value - replaced when custom value is entered - (text, color, select, textarea, page, category)
   options (array)
   attr (array) - any form field attributes
   url (string) - for image type only - defines the default image
    
*/

$options = array (
    
    array(  "name" => "Feedburner",
            "desc" => "Add your username to redirect RSS feeds to Feedburner",
            "id" => "feedburner",
            "type" => "text"),
            
	array(	"name" => "Demo Video URL",
			"desc" => "Please enter the URL of your demo video (Needs to be sized to 230x346).",
			"id" => "video",
			"type" => "text"),
            
	array(	"name" => "App Name",
			"desc" => "Please enter the name of your app.",
			"id" => "app_name",
			"value" => "AppTheme",
			"type" => "text"),
	
	array(	"name" => "App Price",
			"desc" => "Enter the price of your app.",
			"id" => "app_price",
			"value" => "FREE",
			"type" => "text"),
	
	array(	"name" => "App Short Description",
			"desc" => "Enter a short description of your application.",
			"id" => "short_descr",
			"value" => "This is the section where you enter a short description of your application. This content makes up the first paragraph your users will see so be sure to make it descriptive.",
			"type" => "textarea"),
	
	array(	"name" => "App Additional Description",
			"desc" => "Enter a longer description of your application.",
			"id" => "addl_descr",
			"value" => "This is the section where you enter some more detailed information about your application. This content makes up the second paragraph your users will see so be sure to make it descriptive. ",
			"type" => "textarea"),

	array(	"name" => "App Available in App Store",
			"desc" => "Is your app currently available?",
			"id" => "availability",
			"type" => "select",
			"default_text" => "No",
			"options" => array(
				"Yes" => "1"
			)),

	array(	"name" => "App Link",
			"desc" => "Enter the link to your app in the App Store.",
			"id" => "applink",
			"type" => "text"),

	array(	"name" => "Disable App Info on Pages",
			"desc" => "Do you want to disable the app icon, name and price on all pages?",
			"id" => "disable_app_info_pages",
			"type" => "select",
			"default_text" => "No",
			"options" => array(
				"Yes" => "1"
			)),

	array(	"name" => "Disable App Info on Posts",
			"desc" => "Do you want to disable the app icon, name and price on all posts?",
			"id" => "disable_app_info_posts",
			"type" => "select",
			"default_text" => "No",
			"options" => array(
				"Yes" => "1"
			)),

	array(	"name" => "Footer Text",
			"desc" => "Enter the text you'd like to have in the footer.",
			"id" => "footertext",
			"value" => "<a href='http://upthemes.com/themes/apptheme/'>AppTheme WordPress Theme</a> by <a href='http://upthemes.com'>UpThemes</a>. All rights reserved.",
			"type" => "text")
            
);

/* ------------ Do not edit below this line ----------- */

//Check if theme options set
global $default_check;
global $default_options;

if(!$default_check):
    foreach($options as $option):
        if($option['type'] != 'image'):
            $default_options[$option['id']] = $option['value'];
        else:
            $default_options[$option['id']] = $option['url'];
        endif;
    endforeach;
    $update_option = get_option('up_themes_'.UPTHEMES_SHORT_NAME);
    if(is_array($update_option)):
        $update_option = array_merge($update_option, $default_options);
        update_option('up_themes_'.UPTHEMES_SHORT_NAME, $update_option);
    else:
        update_option('up_themes_'.UPTHEMES_SHORT_NAME, $default_options);
    endif;
endif;

render_options($options);

?>