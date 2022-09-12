<?php 
    add_action('wp_enqueue_scripts', 'cks_script_load');
    function cks_script_load(){
        wp_register_script(
            'cks_script_load_id',
            get_template_directory_uri(). '/js/manage.js',
            array(), false, false
        );

        wp_enqueue_script('cks_script_load_id');
    }
    
      