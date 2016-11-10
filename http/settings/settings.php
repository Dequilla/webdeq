<?php

    /*
     * Settings
     */

    $_DEQ_SETTINGS_ = [
        // General settings
        'CACHING_ENABLED' => FALSE,
        'LOGGING_ENABLED' => FALSE,
        'DEFAULT_TIMEZONE' => 'Europe/Stockholm',

        'INCLUDE_OPERATOR' => '\<\+',

        // Directories
        'LOG_DIR' => '../saved/logs/',
        'GENERATED_LOCATION' => '../saved/page/generated/',
        'PAGES_LOCATION' => '../saved/page/pages/',
        'TEMPLATE_LOCATION' => '../saved/page/templates/'
    ];

    /*
    *  Easier way to retrieve settings
    */
    function deq_get_setting($setting_name)
    {
        if(isset($GLOBALS['_DEQ_SETTINGS_'][$setting_name]))
        {
            // Retrieve the global variable
            $settings = $GLOBALS['_DEQ_SETTINGS_'];

            return $settings[$setting_name];
        }
        else
        {
            return 'ERROR';
        }

    }
?>
