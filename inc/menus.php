<?php
function cjtemplatetheme_menus() {
    register_nav_menus(array(
        'menu-1' => __( 'Main Menu', 'cja-ctl' )
    ));
    register_nav_menus(array(
        'footer-1' => __( 'Footer Menu', 'cja-ctl' )
    ));
    register_nav_menus(array(
        'utility-nav' => __( 'Utility Nav', 'cja-ctl' )
    ));
    register_nav_menus(array(
        '404-nav' => __( '404 Menu', 'cja-ctl' )
    ));
    register_nav_menus(array(
        'social-nav' => __( 'Social Menu', 'cja-ctl' )
    ));
}
add_action('init', 'cjtemplatetheme_menus'); // Add Menu Functions
?>