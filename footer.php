    
<?php
$showForm = true;
if (isset(get_field('show_form')[0])) {
    if (get_field('show_form')[0] == 'Yes') {
        $showForm = true;
    } else {
        $showForm = false;
    }
}
if ( is_singular(array( 'practice-areas'))) {
    $showForm = false;    
}

if (is_single(  )) {
    $showForm = false;
}
if ( is_singular(array( 'team-member'))) {
    $showForm = true;
}

if ( is_singular(array( 'areas-we-serve'))) {
    $showForm = true;    
}
if ((!is_front_page(  )) && ($showForm)) { 
    if (is_page( array(144) )) {
?>
<div class="contact-form-container">
    <div id="google-maps">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d754501.658071377!2d-75.67438275345958!3d42.379349611686216!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d9f3842beff2a1%3A0x6d809f893f412a57!2sCatalano%20Law!5e0!3m2!1sen!2sus!4v1714695373858!5m2!1sen!2sus" width="500" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>   
    </div>
<div id="form-container-bg" class="no-home is-desktop">
    <div id="form-container">
        <h2 class="uppercase f-white">How <span class="f-red-gradient">Can We Help?</span></h2>        
        <div id="form-container-inside"></div>
    </div>
</div>
</div>
<?php
    } else {
?>
<div id="form-container-bg" class="no-home is-desktop desktop-footer-padding">
    <div id="form-container">
        <h2 class="uppercase f-white">Request Free <span class="f-red">Consultation</span></h2>
        <div class="form-caption"><p class="text-white">To get answers to questions about your injury, contact Catalano Law for a FREE case evaluation. We’ll assess your case, explain your legal options, and recommend the next steps at no cost. We’re here when you need us.</p></div>
        <div id="form-container-inside"></div>
    </div>
</div>
<?php
    }
    echo do_shortcode('[gravityform id="1"]');
}
?>
    <div class="footer">
        <div class="desktop-container">
            <div class="desktop-container-reverse">
                <div class="logo">
                    <a href="/">
                        <img src="/wp-content/themes/cja-ctl/assets/img/logo-main.png" alt="Catalano Home">
                    </a>
                </div>            
                <div class="location">
                    <span class="f-red Bold">Office Location</span><span class="f-white">2401 Burnet Ave.<br>Syracuse, NY 13206</span>
                </div>
            </div>
            <div class="social">
                <a href="#">
                    <i class="fa-brands fa-square-facebook"></i>
                </a>
                <a href="#">
                    <i class="fa-brands fa-youtube"></i>
                </a>
                <a href="#">
                    <i class="fa-brands fa-linkedin"></i>
                </a>
            </div>
        </div>
        <div class="areas">
            <h4 class="f-red">Areas Served</h4>
            <div class="areas-desktop">
                <?php
                $args = array(  
                    'post_type' => 'areas-we-serve',
                    'post_status' => 'publish',
                    'posts_per_page' => -1, 
                    'orderby' => 'title', 
                    'order' => 'ASC', 
                );
            
                $loop = new WP_Query( $args ); 
                    
                while ( $loop->have_posts() ) : $loop->the_post(); 
                    $title = "";
                    $originalTitle = strtolower(get_the_title( ));
                    $theAreaTitle = explode(",",$originalTitle);
                    $theAreaTitle2 = explode("injury lawyer",$theAreaTitle[0]);
                    $theAreaTitle3 = explode("personal",$theAreaTitle2[0]);
                    $theAreaTitle4 = explode("injury attorney",$theAreaTitle3[0]);
                    $title = $theAreaTitle4[0];
                    $areaServed = '<a class="area-we-serve f-white" href="'.get_the_permalink( ).'">'.$title.'</a>';                
                    echo $areaServed;


                endwhile;
            
                wp_reset_postdata(); 
                ?>
            </div>
        </div>
        <div class="menu-footer">
            <?php
                wp_nav_menu([            
                'theme_location'    => 'utility-nav',
                'container'         => 'div',
                'container_id'      => 'footer-menu-container',          
                'menu_id'           => 'footer-menu',
                'menu_class'        => 'footer-menu-class',                
                ]);
            ?>
        </div>
        <div class="copyright f-white">
            Copyright &copy; Catalano Law
            <h5 class="f-white">Law Firm Marketing by <a class="f-red" href="https://cjadvertising.com" target="_blank">cj Advertising</a></h5>
        </div>
    </div>

    <?php wp_footer(); ?>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/menu.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/scripts.js"></script>
</body>
</html>