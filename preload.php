<?php
/* DEBUG OPTION */
$debugOption = 0;

/* STYLING OPTION */
$menuOption = 1;
$footerOption = 1;
/*
1 - Style A
2 - Style B
3 - Style C
*/


/* PHONE NUMBER */
$themePhone = "3159042449";
$numberFormat = "0";

/* EMAIL */
$themeEmail = 'info@catalanolegal.com';

/*
0 = (123) 456-7890
1 = 123.456.7890
2 = 123-456-7890
*/
if ((isset($_GET['header'])) && ($_GET['header'] != '')) {
    $menuOption = $_GET['header'];
}
if ((isset($_GET['footer'])) && ($_GET['footer'] != '')) {
    $footerOption = $_GET['footer'];
}


$defaultLogo = 'logo-placeholder.png';
$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
if ( has_custom_logo() ) {
	$defaultLogo = $logo[0];
}

$buttonColor1 = '#7d0614';
$buttonColor2 = '#4d030b';
$hoverButtonColor1 = 'rgba(45, 130, 149, 1)';
$hoverButtonColor2 = 'rgba(45, 130, 149, 1)';
$colorOverlay = '0,0,0';
$factorOverlay = '0.7';
$colorButtonText = '#fff';
$colorBannerText = '#fff';
$colorDefaultText = 'rgba(63, 63, 63, 1)';
$colorDefaultForm = 'rgba(63, 63, 63, 1)';
$testBackground = 'blue';
$defaultLinkColor = 'rgba(2, 152, 196, 1)';
$bannerOverlay = 'linear-gradient(rgba(0,0,0, 0.7),rgba(0,0,0, 0.7))';
$white = "#fff";
$fontFamily = 'Arial';
$timeTransition = '0.5s';
$cMenu = '0,0,0';
$cSubMenu = '0,0,0';
$aMenu = '0.95';
$aSubMenu = '0.85';

$options = get_option('cja_bs5_theme_options');
$addressTheme = "USA";
if (is_array($options) && $options['cja_bs5_location'] != '') {
    $addressTheme = $options['cja_bs5_location'];
}
if (is_array($options) && $options['cja_bs5_phone'] != '') {
    $themePhone = $options['cja_bs5_phone'];
}
if (is_array($options) && $options['cja_bs5_phone_format'] != '') {
    $numberFormat = $options['cja_bs5_phone_format'];
}
if (is_array($options) && $options['cja_bs5_color_1'] != '') {
    $buttonColor1 = $options['cja_bs5_color_1'];
}
if (is_array($options) && $options['cja_bs5_color_2'] != '') {
    $buttonColor2 = $options['cja_bs5_color_2'];
}
if (is_array($options) && $options['cja_bs5_color_3'] != '') {
    $hoverButtonColor1 = $options['cja_bs5_color_3'];
}
if (is_array($options) && $options['cja_bs5_color_4'] != '') {
    $hoverButtonColor2 = $options['cja_bs5_color_4'];
}
if (is_array($options) && $options['cja_bs5_color_5'] != '') {
    $colorOverlay = hex2rgba($options['cja_bs5_color_5']);
}
if (is_array($options) && $options['cja_bs5_color_6'] != '') {
    $factorOverlay = $options['cja_bs5_color_6'];
}
if (is_array($options) && $options['cja_bs5_color_7'] != '') {
    $colorButtonText = $options['cja_bs5_color_7'];
}
if (is_array($options) && $options['cja_bs5_color_8'] != '') {
    $colorBannerText = $options['cja_bs5_color_8'];
}
if (is_array($options) && $options['cja_bs5_color_9'] != '') {
    $colorDefaultText = $options['cja_bs5_color_9'];
}
if (is_array($options) && $options['cja_bs5_color_10'] != '') {
    $colorDefaultForm = $options['cja_bs5_color_10'];
}
if (is_array($options) && $options['cja_bs5_color_11'] != '') {
    $defaultLinkColor = $options['cja_bs5_color_11'];
}
if (is_array($options) && $options['cja_bs5_color_12'] != '') {
    $white = $options['cja_bs5_color_12'];
}
if (is_array($options) && $options['cja_bs5_color_13'] != '') {
    $cMenu = hex2rgba($options['cja_bs5_color_13']);
}
if (is_array($options) && $options['cja_bs5_color_13_1'] != '') {
    $aMenu = $options['cja_bs5_color_13_1'];
}
if (is_array($options) && $options['cja_bs5_color_14'] != '') {
    $cSubMenu = hex2rgba($options['cja_bs5_color_14']);
}
if (is_array($options) && $options['cja_bs5_color_14_1'] != '') {
    $aSubMenu = $options['cja_bs5_color_14_1'];
}
if (is_array($options) && $options['cja_bs5_color_15'] != '') {
    $timeTransition = $options['cja_bs5_color_15'];
}
if (is_array($options) && $options['cja_bs5_color_16'] != '') {
    $fontFamily = $options['cja_bs5_color_16'];
}
if (((isset($_GET['style'])) && ($_GET['style'] == '3')) || ($debugOption == 1)) {
    $buttonColor1 = 'rgba(8, 189, 113, 1)';
    $buttonColor2 = 'rgba(8, 189, 113, 1)';
    $hoverButtonColor1 = 'rgba(20, 120, 115, 1)';
    $hoverButtonColor2 = 'rgba(20, 120, 115, 1)';
    $colorOverlay = '0,0,0';
    $factorOverlay = '0.7';
    $colorButtonText = '#fff';
    $colorBannerText = '#fff';
    $colorDefaultText = 'rgba(63, 63, 63, 1)';
    $colorDefaultForm = 'rgba(63, 63, 63, 1)';
    $testBackground = 'blue';
    $defaultLinkColor = 'rgba(8, 189, 113, 1)';
    $bannerOverlay = 'linear-gradient(rgba(0,0,0, 0.7),rgba(0,0,0, 0.7))';
    $white = "#fff";
    $fontFamily = 'Arial';
    $timeTransition = '0.5s';
    $cMenu = '0,0,0';
    $cSubMenu = '0,0,0';
    $aMenu = '0.95';
    $aSubMenu = '0.85';
}

$backgroundMenu = "rgba($cMenu, $aMenu)";
$backgroundMenu2 = "rgba($cSubMenu, $aSubMenu)";
$darkOverlay = "rgba($colorOverlay,$factorOverlay)";
$bannerOverlay = $darkOverlay;

$facebookLink = "#";
if (is_array($options) && $options['cja_bs5_facebook'] != '') {
    $facebookLink = $options['cja_bs5_facebook'];
}
$instagramLink = '#';
if (is_array($options) && $options['cja_bs5_instagram'] != '') {
    $instagramLink = $options['cja_bs5_instagram'];
}
$twitterLink = '#';
if (is_array($options) && $options['cja_bs5_twitter'] != '') {
    $twitterLink = $options['cja_bs5_twitter'];
}
$youtubeLink = '#';
if (is_array($options) && $options['cja_bs5_youtube'] != '') {
    $youtubeLink = $options['cja_bs5_youtube'];
}

$GLOBALS['menuOption'] = $menuOption;
$GLOBALS['footerOption'] = $footerOption;
$GLOBALS['themePhone'] = $themePhone;
$GLOBALS['numberFormat'] = $numberFormat;
$GLOBALS['defaultLogo'] = $defaultLogo;
$GLOBALS['addressTheme'] = $addressTheme;
$GLOBALS['facebookLink'] = $facebookLink;
$GLOBALS['instagramLink'] = $instagramLink;
$GLOBALS['twitterLink'] = $twitterLink;
$GLOBALS['youtubeLink'] = $youtubeLink;


if ((isset($_GET['debug'])) && ($_GET['debug'] == 'variables')) {

    echo "Dark Overlay: " . $darkOverlay ."<br>";
    exit();
}
?>