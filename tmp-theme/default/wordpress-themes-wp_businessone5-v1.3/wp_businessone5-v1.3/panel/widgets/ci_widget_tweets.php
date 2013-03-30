<?php 
if( !class_exists('CI_Tweets') ):
class CI_Tweets extends WP_Widget {

 function CI_Tweets(){
	$widget_ops = array('description' => 'Display your latest tweets');
	$control_ops = array('width' => 200, 'height' => 400);
	parent::WP_Widget('ci_twitter_widget', $name='-= CI Tweets =-', $widget_ops, $control_ops);
}

// display in frontend
function widget($args, $instance) {

	extract($args);
	$ci_title = $instance['ci_title'];
	$ci_username = $instance['ci_username'];
	$ci_number   = $instance['ci_number'];
	$callback = str_replace('ci_twitter_widget-', '', $args['widget_id']);

	$widget_class = preg_replace('/[^a-zA-Z0-9]/','', $args['widget_id']);

	echo $before_widget;
	if ($ci_title) echo $before_title . $ci_title . $after_title;
	echo '<div class="' . $widget_class . '  tul"></div>';
	
	$functionname = $ci_username.$ci_number;
	$functionname = preg_replace('/[^a-zA-Z0-9]/','', $functionname);
	
	wp_enqueue_script('wp_twitter', get_template_directory_uri().'/panel/widgets/scripts/twitter_script.js');
	wp_enqueue_script('wp_twitter_'.$widget_class, get_template_directory_uri().'/panel/widgets/scripts/twitter_script.php?func='.urlencode($functionname).'&amp;widget_id='.urlencode($widget_class));
	wp_enqueue_script('wp_twitter_request_'.$widget_class, 'http://api.twitter.com/1/statuses/user_timeline.json?screen_name='.$ci_username.'&amp;callback='.$functionname.'&amp;count='.$ci_number, array('wp_twitter_'.$widget_class));
	
	echo $after_widget;
}

// update widget
function update($new_instance, $old_instance){
	$instance = $old_instance;
	$instance['ci_title'] = stripslashes($new_instance['ci_title']);
	$instance['ci_username'] = stripslashes($new_instance['ci_username']);
	$instance['ci_number'] = stripslashes($new_instance['ci_number']);
	return $instance;
}

// widget form
function form($instance){
	$instance = wp_parse_args( (array) $instance, array('ci_title' => '', 'ci_username'=>'', 'ci_number'=>'') );
	$ci_title = htmlspecialchars($instance['ci_title']);
	$ci_username = htmlspecialchars($instance['ci_username']);
	$ci_number = htmlspecialchars($instance['ci_number']);
	echo '<p><label>' . 'Title:' . '</label><input id="' . $this->get_field_id('ci_title') . '" name="' . $this->get_field_name('ci_title') . '" type="text" value="' . $ci_title . '" class="widefat" /></p>';
	echo '<p><label>' . 'Username:' . '</label><input id="' . $this->get_field_id('ci_username') . '" name="' . $this->get_field_name('ci_username') . '" type="text" value="' . $ci_username . '" class="widefat" /></p>';
	echo '<p><label>' . 'Number of tweets:' . '</label><input id="' . $this->get_field_id('ci_number') . '" name="' . $this->get_field_name('ci_number') . '" type="text" value="' . $ci_number . '" class="widefat" /></p>';

} // form

} // class


function CI_DisplayTweets() {  
	register_widget('CI_Tweets'); 
}
add_action('widgets_init', 'CI_DisplayTweets');

endif; // !class_exists
?>
