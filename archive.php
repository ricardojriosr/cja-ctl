<?php     
$urlPetition = $_SERVER['REQUEST_URI'];     
$urlPetition = strtolower(trim(str_replace('/','',$urlPetition)));
?>
<?php get_header(); ?>

<div class="container-site">
    <?php if ($urlPetition == 'practice-areas') { ?>
        <?php 
            require_once(get_template_directory() . '/assets/templates/practice-areas.php');             
        ?>
    <?php } ?>
</div>
<?php get_footer(); ?>