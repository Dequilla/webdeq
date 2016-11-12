<?php

    /*
     * Settings
     */

    $_DEQ_SETTINGS_ = [
        // General settings
        'DEFAULT_TIMEZONE' => 'Europe/Stockholm',

        // Directories
        'LOG_DIR' => '../saved/logs/',
        'GENERATED_LOCATION' => '../saved/page/generated/',
        'PAGES_LOCATION' => '../saved/page/pages/',
        'TEMPLATE_LOCATION' => '../saved/page/templates/',

        // Developer settings
        'CACHING_ENABLED' => FALSE,
        'LOGGING_ENABLED' => FALSE,
        'SHOW_BACKEND_ERRORS' => FALSE, // When this is disabled webdeq SHOULD not send any php or other backend errors to the user
        'INCLUDE_OPERATOR' => '\<\+', // TODO: Figure out why one of these has to be escaped
        'VARIABLE_OPERATOR' => '<@' // TODO: And why this one has to not be escaped also test the crap outa this feature probably SUPER unstable
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
