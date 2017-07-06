<?php

namespace PETRICA;

class MyServer {

    function __construct() {
        add_action('admin_menu', array( $this, 'addMenu' ));

        add_action( 'admin_enqueue_scripts', array(&$this, 'petrica_custom_wp_admin_style_and_js_scripts'));

    }

    function addMenu() {
        add_menu_page('My Server Info', 'My Server Info', 'manage_options', 'my-top-level-handle', array( $this, 'settingsPage' ));
    }

    function  settingsPage() {
        echo '<div class="wrap"><h2>My Server Information</h2></div>';

        $info = $this->getInfo();
        $this->renderItems($info);
    }

    /**
     * Load custom styles & JS
     */
    function petrica_custom_wp_admin_style_and_js_scripts() {
        wp_register_style( 'custom_wp_admin_css', plugin_dir_url(dirname( __FILE__ )) . 'css/style.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
        wp_enqueue_script( 'script-name', plugin_dir_url(dirname( __FILE__ )) . '/js/petrica-plugin.js', array(), '1.0.0', true );
    }


    function getInfo()
    {
        global $wp_version;
        global $wpdb;

        $info = [
            'PHP Version' => array ( [ 'name' => 'PHP Version'],
                             [ 'suggestion' => '>= 5.2'],
                             [ 'value' => phpversion()]),
            'PHP max_execution_time' => array ( [ 'name' => 'PHP max_execution_time'],
                             [ 'suggestion' => '>= 30 (seconds)'],
                             [ 'value' => ini_get( 'max_execution_time' ) ]),
            'Wordpress Version' => array ( [ 'name' => 'Wordpress Version'],
                             [ 'suggestion' => '>= 2.9.0'],
                             [ 'value' => $wp_version ]),
            'MySQL Version' => array ( [ 'name' => 'MySQL Version'],
                             [ 'suggestion' => '>= 5.0.15'],
                             [ 'value' => $wpdb->db_version() ]),



        ];
        
        return $info;
    }


    /**
     * Render Items Function
     * param $items array
     */
    function renderItems($items) 
    {
        echo '<table class="widefat distance">
              <thead>
                     <tr class="thead">
                         <th style="width: 15px;">&nbsp;</th>
                         <th>Parameter</th>
                         <th>Suggestion</th>
                         <th>Value</th>
                     </tr>
              </thead>
              <tfoot>
                     <tr class="thead">
                         <th style="width: 15px;">&nbsp;</th>
                         <th>Parameter</th>
                         <th>Suggestion</th>
                         <th>Value</th>
                     </tr>
              </tfoot>
              <tbody>';

	
        foreach ( $items as $key => $item) {

             echo '<tr class="entry-row alternate">' . 
                 '<td>&nbsp;</td>' .
                 '<td><a class="bolded" href="#" onClick="details(\''. $item[0]['name'] .'\');">' . $item[0]['name'] . '</a></td>' . 
                 '<td>' . $item[1]['suggestion'] . '</td>' .
                 '<td class="valueBolded">' . $item[2]['value'] . '</td>' .
 
                 '</tr>';	
        }
        
        echo '</tbody></table>';
    }
}
