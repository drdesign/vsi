<?php

// if uninstall not called from WordPress exit
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) )
    exit();

delete_option( '_gambit_vc_prlx_bg_compat_mode' );