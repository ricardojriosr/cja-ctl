<?php 
/* 
Template Name: Blog Page
*/
?>
<?php get_header(); ?>
<div class="container-site">
    <?php require_once('banner.php'); ?>
    <div class="page-content">
        <div class="blog-container">
            <?php
            // $args = array(  
            //     'post_type' => 'post',
            //     'post_status' => 'publish',
            //     'posts_per_page' => -1,         
            // );
            // $loop = new WP_Query( $args );
            $counterPosts = 0;
            if (have_posts()) {
                while ( have_posts() ) : the_post(); 
                    $postImage = '/wp-content/themes/cja-ctl/assets/img/blog-block-bg.jpeg';
                    if (has_post_thumbnail()) {
                        $postImage = get_the_post_thumbnail_url( );
                    }
                    $title = str_replace('<strong>','',str_replace('</strong>','',get_the_title(  )) );
                    $link = get_the_permalink( );
                    $excerpt = get_the_excerpt(  );
                    $date = get_the_date( );
                ?>
                    <div class="post-item <?php if ($counterPosts >= 9) { echo ''; } ?>">
                        <div class="image" style="background-image: url('<?php echo $postImage; ?>');"></div>
                        <div class="caption">
                            <h4 class="f-black">
                                <?php echo $title; ?>
                            </h4>
                            <p class="Light">
                                <?php echo $date; ?>
                            </p>
                            <p class="excerpt">
                                <?php echo $excerpt; ?>
                            </p>
                            <a href="<?php echo $link; ?>" class="btn btn-red f-black">Read More</a>
                        </div>
                    </div>
                <?php
                $counterPosts++;
                endwhile;
                wp_reset_postdata();
            }  else {
            ?>  
                <br><h2 class="center">NO RESULTS</h2><br>
            <?php
            }        
            ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>