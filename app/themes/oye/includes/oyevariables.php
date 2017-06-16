<?php
/*
    Variables are basically Options which we using on various function so it is Global Variable which contains all configurations options
    We have 2 types of variables PUBLIC and PRIVATE because there are some options which we do not want to reveal to Public 
    as we adding variables as JSON in head so we can use it in javascript so we will be adding only Public Variables in order to ensure security.
    For e.g. API Keys should always be private

    How to use:
    Just call function OyeVariables::init(); before and then you can access variables like below
    OyeVariables::init();
    global $variables;
    var_dump($variables);
*/

class OyeVariables {
    // public $variables = [];
    public function __construct ( ) {
    }

    public static function init() {
        $oyevariables = new OyeVariables;
        $oyevariables->initVariables();
    }
    
    function initVariables() {
        global $variables;
        global $theme_opt;
        
        $variables['private']['theme_opt'] = $theme_opt;
        $variables['public']['theme_opt'] = $this->_processPublicThemeOptions();

        add_action( 'wp_head', array( $this, '_scriptCode'),0);
    }

    /*
        Some Fields i do not want to appear as Json because it can be vulnerable to security 
        for e.g. if we are savign API Keys in theme options so i am removing those keys from theme options and then add to json
        so i created custom variable in redux-config 'public' => 1 so just add to each fields array in redux-config.php file in order show that field on Frontend
        NOTE: By default all the Key will be PRIVATE
    */
    function _processPublicThemeOptions(){
        if ( ! class_exists("Redux") ) { return; }
        global $theme_opt;
        $theme_opt_new = $theme_opt;
        $fields = Redux::$fields;

        foreach ($fields["theme_opt"] as $key => $value) {
            if($value['public']) {
                continue;
            }
            unset($theme_opt_new[$key]);
        }
        return $theme_opt_new;
        // $this->variables['public']['theme_opt'] = $theme_opt_new;
    }

    /*
        Add Public Variables as JSON to HEAD on Frontend
    */
    function _scriptCode(){
        global $variables;
        $json = json_encode($variables['public']);

        $output = "<script>";
        $output .= "var variables = $json;";
        $output .= "</script>";
        echo $output;
    }
}