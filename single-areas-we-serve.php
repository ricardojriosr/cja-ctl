<?php get_header(); ?>
<div class="container-site">
    <?php require_once('banner.php'); ?>
    <div class="page-content">
        <div class="post-content">
            <div class="the-content">   
                <div class="caption">
                        <div class="caption2">
                            <?php the_content( ); ?>            
                        </div>
                </div>
            </div>    
        </div>    
    </div>
</div>
<?php get_footer(); ?>
