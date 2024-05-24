<?php require_once('preload.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        :root {
            --style-option: '<?php echo $menuOption ?>';
            --default-logo: '<?php echo $defaultLogo; ?>';
            --button-color-1: <?php echo $buttonColor1; ?>;
            --button-color-2: <?php echo $buttonColor2; ?>;
            --hover-button-color-1: <?php echo $hoverButtonColor1; ?>;
            --hover-button-color-2: <?php echo $hoverButtonColor2; ?>;
            --dark-overlay-1: <?php echo $darkOverlay; ?>;
            --color-button-text: <?php echo $colorButtonText; ?>;
            --color-banner-text: <?php echo $colorBannerText; ?>;
            --color-default-text: <?php echo $colorDefaultText; ?>;
            --color-default-form: <?php echo $colorDefaultForm; ?>;
            --time-transition: <?php echo $timeTransition; ?>;
            --test-background: blue;
            --default-link-color: <?php echo $defaultLinkColor; ?>;
            --banner-overlay: <?php echo $bannerOverlay; ?>;
            --white: <?php echo $white; ?>;
            --background-menu: <?php echo $backgroundMenu; ?>;
            --background-menu2: <?php echo $backgroundMenu2; ?>;
            --font-family: <?php echo $fontFamily; ?>;
        }
    </style>
    <link rel="stylesheet" href="https://use.typekit.net/yid4mae.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">    
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/splide/splide.min.css"> 
    <?php if ((isset($_GET['debug'])) && ($_GET['debug'] == 'css')) { ?>
      <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/debug.css">   
    <?php } ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> id="the-body">
    <?php require_once('menu.php'); ?>    
    
