<?php get_header(); ?>
<?php
$mImage = '';
$dImage = '';
$imgClass = '';
if (get_field('banner_mobile_image') != '') {
    $mImage = get_field('banner_mobile_image');
}
if (get_field('banner_desktop_image') != '') {
    $dImage = get_field('banner_desktop_image');
}
if (($dImage != '') || ($mImage != '')) {
    $imgClass = 'new-pa-has-img';
}
$categories = get_the_category(); 
?>
<div class="container-site">
    <?php require_once('banner.php'); ?>
    <div class="page-content <?php echo $imgClass; ?>">
        <div class="two-columns">
            <div class="left-part">
                <?php if ($imgClass == 'new-pa-has-img') { ?>
                <div class="image-part">
                    <img src="<?php if ($mImage != '') { echo $mImage ; } elseif ($dImage != '') { echo $dImage; } ?>" alt="<?php echo get_the_title(); ?>" class="pa-img-sub-banner">
                </div>
                <?php } ?>
                <div class="caption2">
                    <?php the_content( ); ?>  
                </div>
            </div>
            <div class="right-part" id="right-part-id">
            <div id="form-flag" style="position: absolute; top: -120px; width: 100%; height: 0px;"></div>
                <div class="form-part">
                    <div id="form-container-bg" class="no-home">
                        <div id="form-container">
                        <h2 class="uppercase f-white">Request Free <span class="f-red">Consultation</span></h2>
                        <div class="form-caption"><p class="text-white">To get answers to questions about your injury, contact Catalano Law for a FREE case evaluation. We’ll assess your case, explain your legal options, and recommend the next steps at no cost. We’re here when you need us.</p></div>
                            <div id="form-container-inside"></div>
                        </div>
                    </div>
                    <?php echo do_shortcode('[gravityform id="1"]'); ?>
                </div>
                <div class="results-part-new-pa">
                    <?php if ( ! empty( $categories ) ) { ?>
                        <?php echo do_shortcode('[results-ctl related_category="'.$categories[0]->term_id.'"]'); ?>            
                    <?php } ?>  
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>