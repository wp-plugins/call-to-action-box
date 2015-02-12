<?php

class CallToActionBoxSettings{

    private $plugin_path;
    private $plugin_url;
    private $l10n;
    private $pluginTemplate;
    private $namespace = '_call_to_action_box';
    private $settingName = 'Call To Action Box';

    function __construct() 
    {	
        $this->plugin_path = plugin_dir_path( __FILE__ );
        $this->plugin_url = plugin_dir_url( __FILE__ );
        $this->l10n = 'wp-settings-framework';
        add_action( 'admin_menu', array(&$this, 'admin_menu'), 99 );
        
        // Include and create a new WordPressSettingsFramework
        require_once( $this->plugin_path .'wp-settings-framework.php' );  
        $settings_file = '';      
        $this->pluginTemplate = new WordPressSettingsFramework( $settings_file, $this->namespace, $this->get_settings() );
             
    }
    
    function admin_menu()
    {
        $page_hook = add_menu_page( __( $this->settingName, $this->l10n ), __( $this->settingName, $this->l10n ), 'update_core', $this->settingName, array(&$this, 'settings_page') );
        add_submenu_page( $this->settingName, __( 'Settings', $this->l10n ), __( 'Settings', $this->l10n ), 'update_core', $this->settingName, array(&$this, 'settings_page') );
    }
    
    function settings_page()
	{
	    // Your settings page
	    
	    ?>
		<div class="wrap">
			<div id="icon-options-general" class="icon32"></div>
			<h2><?php $this->settingName ?></h2>
			
			<h3>How to use Call To Action Box</h3>
			<p>Create a call to action by clicking on Call To Action Box>Add New on the main admin menu.
			<p>Put a call to action in your post or page by placing the shortcode tag <code>[cta_box id="%postid%"]</code> on your page or post</p>				
			
			<?php 
			$this->pluginTemplate->settings(); 
			?>
			
		</div>
		<?php
		
	}
	
	function validate_settings( $input )
	{
	    // Do your settings validation here
	    // Same as $sanitize_callback from http://codex.wordpress.org/Function_Reference/register_setting
    	return $input;
	}
	
	
        
        function get_settings(){
        	$wpsf_settings[] = array(
		    'section_id' => 'general',
		    'section_title' => $this->settingName.' Settings',
		    //'section_description' => 'Some intro description about this section.',
		    'section_order' => 5,
		    'fields' => array(
		    /*
		      		 array(
			            'id' => 'to_email',
			            'title' => 'To Email',
			            'desc' => 'Set the email address you want your forms submitted to.',
			            'type' => 'text',
			            'std' => '',
			        ),   
		*/     
		        )
		        
        
    );
    return $wpsf_settings;
        }


}
new CallToActionBoxSettings();

?>