<?php require_once('preload.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php wp_title(); ?></title>
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
    <?php
    if ((isset($_GET['debug'])) && ($_GET['debug'] == 'tel')) { 
        function find_tel_links() {
            $args = array(
              'post_type' => 'any', // Change to specific post types if needed
              'numberposts' => -1, // Get all posts
            );
            $posts = get_posts($args);
            $tel_links = array();
            foreach ($posts as $post) {
              $content = $post->post_content;
              if (preg_match_all('/tel:([0-9]+)/', $content, $matches)) {
                $tel_links[] = array(
                  'url' => get_permalink($post->ID),
                  'links' => $matches[0],
                );
              }
            }
            return $tel_links;
          }
          
          $tel_links = find_tel_links();
          
          if ($tel_links) {
            echo "<h2>Found Tel Links:</h2>";
            foreach ($tel_links as $link) {
              echo "<p>Page: <a href='" . $link['url'] . "'>" . $link['url'] . "</a></p>";
              echo "<ul>";
              foreach ($link['links'] as $tel_link) {
                echo "<li>$tel_link</li>";
              }
              echo "</ul>";
            }
          } else {
            echo "No Tel Links Found";
          }
        exit();
    }
    ?>
    <link rel="preconnect" href="https://use.typekit.net/yid4mae.css">
    <link rel="stylesheet" href="https://use.typekit.net/yid4mae.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">    
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/splide/splide.min.css"> 
    <link rel='preload' href='/wp-content/themes/cja-ctl/assets/img/mobile-header-hero.webp' as='image'>
    <?php if ((isset($_GET['debug'])) && ($_GET['debug'] == 'css')) { ?>
      <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/debug.css">   
    <?php } ?>
    <?php wp_head(); ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-248543989-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());



    gtag('config', 'UA-248543989-1');
    </script>
        
        <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P79Q2HW" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
</head>
<body <?php body_class(); ?> id="the-body">
    
    <?php require_once('menu.php'); ?>    
    
