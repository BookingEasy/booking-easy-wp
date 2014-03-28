<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}
require_once plugins_url('', __FILE__) . '/classes/UnInstallPlugin.php';
UnInstallPlugin::init();
?>