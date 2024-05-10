<?php
if (( is_page_template( array( 'page-overlay.php' ) ) ) || (is_single(  ))) { 
?> 
    <?php if  ((has_post_thumbnail()) || (get_field('banner_mobile_image') != '') || (get_field('banner_desktop_image') != '')) { ?>
        <div class="hero-banner">
            <picture>
                <?php if (get_field('banner_mobile_image') != '') { ?>
                    <source media="(max-width:1199px)" srcset="<?php echo get_field('banner_mobile_image'); ?>">
                    <?php if (get_field('banner_mobile_image') != '') { ?>
                        <source media="(min-width:1200px)" srcset="<?php echo get_field('banner_desktop_image'); ?>">
                    <?php } ?>
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_field('banner_mobile_image'); ?>" class="f-image">
                <?php } else { ?>
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>" class="f-image">
                <?php } ?>
            </picture>
            <div class="caption-hero">
            <?php if (get_field('banner_title')) { ?>
            
                <?php if (get_field('banner_image')) { ?>
                    <img src="<?php echo get_field('banner_image'); ?>" alt="<?php echo get_field('banner_title'); ?>" >
                <?php } ?>
                <?php if (get_field('banner_title')) { ?>
                    <?php echo get_field('banner_title'); ?>
                <?php } ?>
                <?php if (get_field('banner_subtitle')) { ?>
                    <?php echo get_field('banner_subtitle'); ?>
                <?php } ?>
                <?php if (get_field('banner_link')) { ?>
                    <a href="<?php echo get_field('banner_link'); ?>" class="btn btn-red f-white">
                        <?php if (get_field('banner_link_text')) { ?>
                            <?php echo get_field('banner_link_text'); ?>
                        <?php } else { ?>
                            Learn More
                        <?php } ?>
                    </a>
                <?php } ?>            
            <?php } else { ?>
                <h1 class="uppercase <?php if (is_single(  )) { ?> f-white <?php } else { ?> f-red <?php } ?> center">
                    <?php 
                    $getTitle = strtolower(get_the_title()); 
                    $removeStrings = str_replace(strtolower("SYRACUSE"),"",$getTitle);
                    $theNewTitle = trim($removeStrings);
                    $loopTitle = explode(" ",$theNewTitle);
                    $newTitle = '';
                    foreach ($loopTitle as $index => $value) {
                        if ($index == 2) {
                            $newTitle .= "<br><span class='f-white medium-font'>" . $value . " ";
                        } else {
                            $newTitle .= $value . " ";
                        }
                    }
                    $newTitle .= "</span>";
                    if (is_single(  )) {
                        $newTitle = get_the_title( );
                    }
                    $tTitle = trim($newTitle);
                    echo $tTitle; 
                    ?>
                </h1>
                <p class="f-white center">
                    <?php 
                    $theExcerpt = substr(get_the_excerpt(),0,120).'...';; 
                    echo $theExcerpt;
                    ?>
                </p>
            <?php } ?>
            </div>
        </div>    
    <?php } else { ?>
        <div class="spacing-for-menu"></div>
    <?php } ?>
<?php } else { ?>
    <?php
    $desktopImg = '/wp-content/themes/cja-ctl/assets/img/home-mobile-bg-form.png';
    $mobileImg  = '/wp-content/themes/cja-ctl/assets/img/home-mobile-bg-form.png';
    if (has_post_thumbnail(  )) {
        $desktopImg = get_the_post_thumbnail_url();
        $mobileImg  = get_the_post_thumbnail_url();
    }
    if (get_field('banner_mobile_image') != '') {
        $mobileImg  = get_field('banner_mobile_image');
    }
    if (get_field('banner_desktop_image') != '') {
        $desktopImg = get_field('banner_desktop_image');
    }
    ?>
    <style>
        .hero-banner-bg {
            background-image: url('<?php echo $mobileImg; ?>');
        }
        @media screen and (min-width: 1200px) {
            .hero-banner-bg {
                background-image: url('<?php echo $desktopImg; ?>');
            }   
        }
    </style>
    <div class="hero-banner hero-banner-bg">
    <?php if ( isset($_GET['s']) ) { ?>
        <div class="caption-hero-bg">
            <h1 class="f-white uppercase">SEARCH <span class="f-red">RESULTS</span></h1>
            <div class="search-container">
                <form role="search" method="get" class="search-form" id="searchform" action="<?php echo home_url( '/' ); ?>">
                <div class="input-group">
                    <div class="input-icons">
                    <i class="fa fa-search icon" aria-hidden="true"></i>
                    <input type="search" id="s" class="input-field form-control search-field"
                            placeholder="<?php echo esc_attr_x( 'Search…', 'placeholder' ) ?>"
                            value="<?php echo get_search_query() ?>" name="s"
                            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
                    </div>
                    <div class="input-group-append">
                    <span class="input-group-text"><button type="submit" class="search-button"><i class="fa fa-search"></i></button></span>
                    </div>
                </div>

                </form>
                </div>
        </div>
    <?php } ?>
        <?php if (get_field('banner_title')) { ?>
            <div class="caption-hero-bg">
                <?php if (get_field('banner_image')) { ?>
                    <img src="<?php echo get_field('banner_image'); ?>" alt="<?php echo get_field('banner_title'); ?>" >
                <?php } ?>
                <?php if (get_field('banner_title')) { ?>
                    <?php echo get_field('banner_title'); ?>
                <?php } ?>
                <?php if (get_field('banner_subtitle')) { ?>
                    <?php echo get_field('banner_subtitle'); ?>
                <?php } ?>
                <?php if (get_field('banner_link')) { ?>
                    <a href="<?php echo get_field('banner_link'); ?>" class="btn btn-red f-white">
                        <?php if (get_field('banner_link_text')) { ?>
                            <?php echo get_field('banner_link_text'); ?>
                        <?php } else { ?>
                            Learn More
                        <?php } ?>
                    </a>
                <?php } ?>
                <?php if ( is_page_template( array( 'page-blog.php','search.php' ) ) || (isset($_GET['s']) )) { ?>
                <div class="search-container">
                <form role="search" method="get" class="search-form" id="searchform" action="<?php echo home_url( '/' ); ?>">
                <div class="input-group">
                    <div class="input-icons">
                    <i class="fa fa-search icon" aria-hidden="true"></i>
                    <input type="search" id="s" class="input-field form-control search-field"
                            placeholder="<?php echo esc_attr_x( 'Search…', 'placeholder' ) ?>"
                            value="<?php echo get_search_query() ?>" name="s"
                            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
                    </div>
                    <div class="input-group-append">
                    <span class="input-group-text"><button type="submit" class="search-button"><i class="fa fa-search"></i></button></span>
                    </div>
                </div>

                </form>
                </div>
            <?php } ?>
            </div>
        <?php } ?>
    </div>
<?php } ?>