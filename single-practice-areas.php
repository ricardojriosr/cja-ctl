<?php get_header(); ?>
<div class="container-site">
    <?php require_once('banner.php'); ?>
    <div class="page-content">
    <?php 
    $categories = get_the_category();  
    $desktopImg = '';
    $mobileImg  = '';
    $imageClass = '';
    if (get_field('banner_mobile_image') != '') { $mobileImg = get_field('banner_mobile_image');  $imageClass = ' has-image';}
    if (get_field('banner_desktop_image') != '') { $desktopImg = get_field('banner_desktop_image'); $imageClass = ' has-image'; }  
    if (($imageClass == '') && (has_post_thumbnail())) {
        $imageClass = ' has-image';
        $mobileImg = get_the_post_thumbnail_url();
        $desktopImg = get_the_post_thumbnail_url();
    }
?>
<div class="post-content<?php echo $imageClass; ?>">
            <div class="image-part show-mobile">
                <?php
                if ($mobileImg != '' && $desktopImg == '') {
                ?>
                <picture>
                    <source media="(max-width:1199px)" srcset="<?php echo $mobileImg; ?>">
                    <img src="<?php echo $mobileImg; ?>" alt="<?php echo get_the_title( ); ?>">
                </picture>
                <?php
                } elseif ($mobileImg != '' && $desktopImg != '') {
                ?>
                <picture>
                    <source media="(max-width:1199px)" srcset="<?php echo $mobileImg; ?>">
                    <source media="(min-width:1200px)" srcset="<?php echo $desktopImg; ?>">
                    <img src="<?php echo $mobileImg; ?>" alt="<?php echo get_the_title( ); ?>">
                </picture>
                <?php
                } elseif ($mobileImg == '' && $desktopImg != '') {
                ?>
                <picture>
                    <source media="(min-width:1200px)" srcset="<?php echo $desktopImg; ?>">
                    <img src="<?php echo $desktopImg; ?>" alt="<?php echo get_the_title( ); ?>">
                </picture>
                <?php
                } else {
                ?>
                    <!-- No Image Added -->
                <?php
                }
                ?>
            </div>
    <div class="the-content">
        <?php if (!catalanowins_detect_is_mobile()) {  ?>
        <div class="form-part show-desktop">
            <div id="form-container-bg" class="no-home">
                <div id="form-container">
                <h2 class="uppercase f-white">Request Free <span class="f-red">Consultation</span></h2>
                <div class="form-caption"><p class="text-white">To get answers to questions about your injury, contact Catalano Law for a FREE case evaluation. We’ll assess your case, explain your legal options, and recommend the next steps at no cost. We’re here when you need us.</p></div>
                <div id="form-container-inside"></div>
            </div>
        </div>
        <?php } ?>
        <?php echo do_shortcode('[gravityform id="1"]'); ?>
    </div>
        <div class="caption">
            
            <div class="image-part show-desktop">
                <?php
                if ($mobileImg != '' && $desktopImg == '') {
                ?>
                <picture>
                    <source media="(max-width:1199px)" srcset="<?php echo $mobileImg; ?>">
                    <img src="<?php echo $mobileImg; ?>" alt="<?php echo get_the_title( ); ?>">
                </picture>
                <?php
                } elseif ($mobileImg != '' && $desktopImg != '') {
                ?>
                <picture>
                    <source media="(max-width:1199px)" srcset="<?php echo $mobileImg; ?>">
                    <source media="(min-width:1200px)" srcset="<?php echo $desktopImg; ?>">
                    <img src="<?php echo $mobileImg; ?>" alt="<?php echo get_the_title( ); ?>">
                </picture>
                <?php
                } elseif ($mobileImg == '' && $desktopImg != '') {
                ?>
                <picture>
                    <source media="(min-width:1200px)" srcset="<?php echo $desktopImg; ?>">
                    <img src="<?php echo $desktopImg; ?>" alt="<?php echo get_the_title( ); ?>">
                </picture>
                <?php
                } else {
                ?>
                    <!-- No Image Added -->
                <?php
                }
                ?>
            </div>            
    </div>
            <div class="caption2">
                <?php the_content( ); ?>  
            </div>       
            <?php if ( ! empty( $categories ) ) { ?>
            <div class="results-part show-mobile">
                <?php echo do_shortcode('[results-ctl related_category="'.$categories[0]->term_id.'"]'); ?>
            </div>
            <?php } ?>   
        </div>
        
    </div>    
    
    
</div>
    <?php if ( ! empty( $categories ) ) { ?>
        <div class="results-part show-desktop">
            <?php echo do_shortcode('[results-ctl related_category="'.$categories[0]->term_id.'"]'); ?>
        </div>
        <?php } ?>
    </div>
</div>
<?php get_footer(); ?>
