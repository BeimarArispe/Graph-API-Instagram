<?php
    include 'defines.php';

    // load graph-sdk files
    require_once __DIR__ . '/vendor/autoload.php';

    // facebook credentials array
    $creds = array(
        'app_id' => INSTAGRAM_APP_ID,
        'app_secret' => INSTAGRAM_APP_SECRET,
        'default_graph_version' => 'v19.0',
        'persistent_data_handler' => 'session'
    );

    // create facebook object
    $facebook = new Facebook\Facebook( $creds );

    // helper
    $helper = $facebook->getRedirectLoginHelper();

    // oauth object
    $oAuth2Client = $facebook->getOAuth2Client();

    if ( isset( $_GET['code'] ) ) { // get access token

    } else { // display login url
        $permissions = [
            'public_profile', 
            'instagram_basic', 
            'pages_show_list'
        ];
        $loginUrl = $helper->getLoginUrl( INSTAGRAM_APP_REDIRECT_URI, $permissions );
    
        
        echo '<a href="' . $loginUrl . '">
            Login With Facebook
        </a>';
    }