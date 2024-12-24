<?php
// Include WordPress' wp-load.php file to access WordPress functions.
require_once('wp-load.php');

// Ensure the user is an administrator (optional but recommended for security).
if (!current_user_can('activate_plugins')) {
    die('You do not have permission to deactivate plugins.');
}

// The plugin's folder and file. Sucuri is typically located at:
// wp-content/plugins/sucuri-security/
$plugin = 'sucuri-security/sucuri.php';

// Check if the plugin is active.
if (is_plugin_active($plugin)) {
    // Deactivate the plugin.
    deactivate_plugins($plugin);
    echo 'Sucuri plugin has been deactivated.';
} else {
    echo 'Sucuri plugin is not active.';
}
?>
