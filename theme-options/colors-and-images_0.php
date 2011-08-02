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


	array(	"name" => "Display Logo",
			"desc" => "Do you want to show your company logo in the header?",
			"id" => "display_logo",
			"type" => "select",
			"default_text" => "No",
			"options" => array(
				"Yes" => "yes"
			)),
			
    array(  "name" => "Logo Image",
            "desc" => "Upload your logo or select from the gallery. (240px x 75px)",
            "id" => "logo",
            "type" => "image",
            "value" => "Upload Logo",
            "url" => get_bloginfo('template_directory')."/images/essentials/header/title/logo.png"
    ),
    
    array(  "name" => "App Icon",
            "desc" => "Upload your app icon or select from the gallery. (61px x 65px)",
            "id" => "app_icon",
            "type" => "image",
            "value" => "Upload App Icon",
            "url" => get_bloginfo('template_directory')."/images/essentials/header/title/icon.png"
    ),
    
    array(  "name" => "Homepage Video Player Screenshot",
            "desc" => "Upload your your image or select from the gallery. (230px x 345px)",
            "id" => "homepage_player_screenshot",
            "type" => "image",
            "value" => "Upload Image",
            "url" => get_bloginfo('template_directory')."/images/screenshot-2.png"
    ),

    array(  "name" => "Thumbnail Image #1 - Homepage",
            "desc" => "Upload your your image or select from the gallery. (95px x 94px)",
            "id" => "screenshot_1_thumb",
            "type" => "image",
            "value" => "Upload Thumbnail",
            "url" => get_bloginfo('template_directory')."/images/screenshot-1-thumb.png"
    ),
    
    array(  "name" => "App Screenshot #1 - Homepage",
            "desc" => "Upload your your image or select from the gallery. (230px x 345px)",
            "id" => "screenshot_1",
            "type" => "image",
            "value" => "Upload Screenshot",
            "url" => get_bloginfo('template_directory')."/images/screenshot-1.png"
    ),
    
    array(  "name" => "App Screenshot #1 Caption",
            "desc" => "Enter the caption for screenshot #1",
            "id" => "screenshot_1_caption",
            "type" => "text",
            "value" => "Awesome App"
    ),

    array(  "name" => "Thumbnail Image #2 - Homepage",
            "desc" => "Upload your your image or select from the gallery. (95px x 94px)",
            "id" => "screenshot_2_thumb",
            "type" => "image",
            "value" => "Upload Thumbnail",
            "url" => get_bloginfo('template_directory')."/images/screenshot-2-thumb.png"
    ),
    
    array(  "name" => "App Screenshot #2 - Homepage",
            "desc" => "Upload your your image or select from the gallery. (230px x 345px)",
            "id" => "screenshot_2",
            "type" => "image",
            "value" => "Upload Screenshot",
            "url" => get_bloginfo('template_directory')."/images/screenshot-2.png"
    ),

    array(  "name" => "App Screenshot #2 Caption",
            "desc" => "Enter the caption for screenshot #2",
            "id" => "screenshot_2_caption",
            "type" => "text",
            "value" => "Awesome App"
    )
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