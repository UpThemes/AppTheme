<?php 

global $up_options;
	
get_header()

?>

            <div id="content">	
                <div class="row">
                    <div class="column six">
                        <?php if($up_options->short_descr){ ?><p><?php echo $up_options->short_descr; ?></p><?php } ?>
                        <?php if($up_options->addl_descr){ ?><p><?php echo $up_options->addl_descr; ?></p><?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="column oneandahalf">
                        <p><a href="<?php if($up_options->screenshot_1) {echo $up_options->screenshot_1;} else { echo get_bloginfo('template_url') . "/uploads/screenshot-1.png"; } ?>" class="link" rel="group2" title="<?php echo $up_options->screenshot_1_caption; ?>"><img src="<?php if($up_options->screenshot_1_thumb) {echo $up_options->screenshot_1_thumb;} else { echo get_bloginfo('template_url') . "/uploads/screenshot-1-thumb.png"; } ?>" alt="" /><span class="img">open image</span></a></p>
                    </div>
                    <div class="column oneandahalf">
                        <p><a href="<?php if($up_options->screenshot_2) {echo $up_options->screenshot_2;} else { echo get_bloginfo('template_url') . "/uploads/screenshot-2.png"; } ?>" class="link" rel="group2" title="<?php echo $up_options->screenshot_2_caption; ?>"><img src="<?php if($up_options->screenshot_2_thumb) {echo $up_options->screenshot_2_thumb;} else { echo get_bloginfo('template_url') . "/uploads/screenshot-2-thumb.png"; } ?>" alt="" /><span class="img">open image</span></a></p>
                    </div>
                    <div class="column three">
                        <?php if($up_options->availability == 1 && $up_options->applink){ ?>
                        	<p><a href="<?php echo $up_options->applink; ?>" class="appstore"><?php _e('Available in the app store'); ?></a></p>
                        <?php } else { ?>
                        	<p><a class="appstore-soon"><?php _e('Soon available in the apple store'); ?></a></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="column three">
                        <?php get_sidebar('homepage-leftbottom'); ?>
                    </div>
                    <div class="column three">
                        <?php get_sidebar('homepage-rightbottom'); ?>
                    </div>
                </div>
            </div>      
        
<?php get_footer() ?>