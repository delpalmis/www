<?php global $ci, $ci_defaults, $load_defaults, $content_width; ?>
<?php if ($load_defaults===TRUE): ?>
<?php
	
	if( !function_exists('ci_the_post_thumbnail_full')):
	function ci_the_post_thumbnail_full($attr = '' ) 
	{
		if(ci_setting('featured_full_use_full')=='full')
		{
			the_post_thumbnail('ci_featured_full', $attr);
		}
		if(ci_setting('featured_full_use_full')=='single')
		{
			if(isset($attr['class']))
				$attr['class'] = $attr['class'].' '.ci_setting('featured_single_align').' ';
			else
				$attr['class'] = ci_setting('featured_single_align');
			
			the_post_thumbnail('ci_featured_single', $attr);
		}
		if(ci_setting('featured_full_use_full')=='disabled')
		{
			// Do nothing
		}
	}
	endif;


	$fullwidth_width = intval(apply_filters('ci_full_template_width', 960));

	$ci_defaults['featured_full_height']	= intval($fullwidth_width/3);
	$ci_defaults['featured_full_use_full']	= 'single';

	if(ci_setting('featured_full_use_full')=='full') {
		add_image_size( 'ci_featured_full', $fullwidth_width, intval(ci_setting('featured_full_height')), true);
	}

?>
<?php else: ?>

	<fieldset class="set">
		<p class="guide"><?php _e('You can select whether the full width page template (if applicable) will use it\'s own image size, or the same configuration as normal posts and pages. If you select its own size, you can only configure the height of the image, as the width will fill match the width of the page by default. Please note that if you choose the full width and/or change its height, you will need to regenerate your thumbnails.', 'ci_theme'); ?></p>
		<?php 
			$fullwidth_options = array(
				'full' => __('Full width image', 'ci_theme'),
				'single' => __('The same as posts/pages', 'ci_theme'),
				'disabled' => _x('Disabled', 'featured image is disabled', 'ci_theme')
			);
			ci_panel_dropdown('featured_full_use_full', $fullwidth_options, __('Featured image for Full Width template is', 'ci_theme')); 
			ci_panel_input('featured_full_height', __('Full Width featured image height', 'ci_theme'));
		?>
	</fieldset>
			
<?php endif; ?>
