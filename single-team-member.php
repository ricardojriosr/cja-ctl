<?php get_header(); ?>
<?php 
$fImage = '';
if (has_post_thumbnail(  )) {
    $fImage = get_the_post_thumbnail_url();
}
?>
<div class="spacing-for-menu"></div>
<div class="container-site">
    <div class="left-side">
        <?php if ($fImage != '') { ?>
            <div class="profile-image show-desktop">
                <img src="<?php echo $fImage; ?>" alt="<?php echo get_the_title(); ?>">
            </div>
        <?php } ?>
        <?php if (get_field('education') != '') { ?>
            <div class="team-extract education">
                <div class="title">
                    Education
                </div>
                <div class="caption">
                    <?php echo get_field('education'); ?>
                </div>
            </div>
        <?php } ?>
        <?php if (get_field('community_involvement') != '') { ?>
            <div class="team-extract community_involvement">
                <div class="title">
                    community involvement
                </div>
                <div class="caption">
                    <?php echo get_field('community_involvement'); ?>
                </div>
            </div>
        <?php } ?>
        <?php if (get_field('publications_and_speaking') != '') { ?>
            <div class="team-extract publications_and_speaking">
                <div class="title">
                    Publications & Speaking
                </div>
                <div class="caption">
                    <?php echo get_field('publications_and_speaking'); ?>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="right-side">
        <?php if ($fImage != '') { ?>
            <div class="profile-image show-mobile ">
                <img src="<?php echo $fImage; ?>" alt="<?php echo get_the_title(); ?>">
            </div>
        <?php } ?>
        <h1 class="f-black uppercase"><?php echo get_the_title(); ?></h1>
        <h2 class="f-red uppercase">
            <?php
            $titleArray = get_field('team_title');
            if (count($titleArray) == 2) {
                $teamTitle = implode(" & ",$titleArray);
            } elseif (count($titleArray) == 1) {
                $teamTitle = $titleArray[0];
            } else {
                $teamTitle = implode(", ",$titleArray);
            }
            echo $teamTitle;
            ?>
        </h2>
        <p class="f-black">
            <?php
            $pNumber = get_field('phone');
            if ($pNumber != '') {
            ?>
                <a class="f-black f-phone" href="<?php echo $pNumber; ?>">
                    <?php echo hueman_phone_format($pNumber, $numberFormat); ?>
                </a>
            <?php
            }
            ?>            
        </p>
        <?php require_once('content.php'); ?>
    </div>
</div>
<?php get_footer(); ?>