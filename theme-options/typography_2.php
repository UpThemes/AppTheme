<?php

$options = array (

    array(
        "name" => "Post Title",
        "desc" => "Select the font and style for post titles.",
        "id" => "posttitle",
        "selector" => ".title",
        "type" => "typography",
        "default" => "buda")

);

/* Add Multple Selector Support */
if(function_exists('upfw_multiple_typography'))
    $options = upfw_multiple_typography($options);


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