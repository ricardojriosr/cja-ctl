<?php
if (( is_page_template( array( 'page-overlay.php' ) ) ) || (is_single(  ))) { 
?> 
    <?php if  ((has_post_thumbnail()) || (get_field('banner_mobile_image') != '') || (get_field('banner_desktop_image') != '')) { ?>
        <div class="hero-banner t3">
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
                <?php if (is_page(144)) { ?>
                        <div class="office-info">
                            <a href="tel:(315) 284-6270">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 20 18" fill="none">
                                    <path d="M5.8241 8.02611C6.58608 9.06181 7.48365 9.99263 8.49342 10.7943C9.65904 11.7067 10.9782 12.4091 12.3908 12.8695C12.4413 12.8904 12.4962 12.8987 12.5508 12.8936C12.6053 12.8885 12.6578 12.8702 12.7036 12.8403C12.8495 12.7368 12.9795 12.6127 13.0893 12.4721C13.2097 12.3056 13.316 12.1297 13.4072 11.946C13.8635 11.1205 14.4451 10.1152 15.4999 10.4256C15.5314 10.4363 15.5485 10.4483 15.5628 10.4463L19.1416 11.8621C19.1493 11.8615 19.1569 11.8638 19.163 11.8683C19.1692 11.8729 19.1735 11.8795 19.1751 11.887C19.3978 12.0025 19.5876 12.1714 19.7274 12.3781C19.8672 12.5849 19.9525 12.8231 19.9756 13.0711C20.0409 13.72 19.9199 14.3746 19.6264 14.9598C19.333 15.545 18.879 16.037 18.3166 16.3794C17.725 16.7307 17.0885 17.0017 16.4244 17.1852C15.4384 17.4733 14.3997 17.5341 13.3879 17.363C12.2749 17.1644 11.1922 16.8271 10.1657 16.3591L10.0856 16.3256C9.55423 16.0876 8.97636 15.8418 8.40526 15.5349C6.11993 14.2797 4.11528 12.581 2.51096 10.5399C1.17473 8.93415 0.420362 6.93089 0.367557 4.84801C0.351438 3.79184 0.733087 2.7661 1.43822 1.97042C2.17334 1.23514 3.16967 0.813603 4.21298 0.796447C4.28085 0.790376 4.34909 0.801747 4.4111 0.829459C4.4731 0.857171 4.52676 0.900284 4.56688 0.954622L7.18405 4.20801C7.34988 4.34628 7.47097 4.52973 7.53237 4.7357C7.59378 4.94167 7.5928 5.16115 7.52956 5.36702C7.38774 5.75732 7.15255 6.10814 6.84414 6.38943C6.73178 6.51181 6.61296 6.62822 6.48818 6.73818C6.07725 7.13963 5.58635 7.61175 5.82569 8.02589L5.8241 8.02611Z" fill="#ED0D27"></path>
                                </svg>  
                                <span>(315) 284-6270</span>
                            </a>
                            <a href="mailto:info@catalanolegal.com">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="21" viewBox="0 0 30 21" fill="none">
                                    <g clip-path="url(#clip0_1242_706)">
                                        <path d="M29.4084 0.521835C28.9431 0.880971 28.4934 1.2304 28.0374 1.57336C24.9295 3.94171 21.8246 6.30683 18.7167 8.67194C17.5442 9.56493 16.3687 10.4514 15.1993 11.3477C15.0536 11.4609 14.9574 11.4609 14.8054 11.3477C11.1609 8.57812 7.51013 5.81504 3.86249 3.05196C2.8203 2.26575 1.79052 1.46335 0.742138 0.690079C0.490897 0.502422 0.608763 0.450655 0.78246 0.369769C0.943751 0.295353 1.11435 0.272705 1.29425 0.272705C3.22043 0.272705 5.1466 0.272705 7.06968 0.272705C9.70926 0.272705 12.3488 0.272705 14.9853 0.272705C17.6435 0.272705 20.3017 0.272705 22.9599 0.272705C24.8643 0.272705 26.7719 0.272705 28.6764 0.272705C28.9338 0.272705 29.1727 0.314766 29.4053 0.515364L29.4084 0.521835Z" fill="#ED0D27"></path>
                                        <path d="M0.556985 20.4976C1.6612 19.6532 2.73751 18.8346 3.81381 18.0096C6.57746 15.8936 9.3411 13.7808 12.0985 11.6551C12.294 11.5063 12.418 11.4804 12.6165 11.6422C13.1935 12.1081 13.7921 12.5481 14.3814 12.9979C14.8622 13.3635 15.132 13.3602 15.6221 12.9914C16.1959 12.5578 16.7822 12.134 17.3374 11.6746C17.57 11.4837 17.7127 11.516 17.9298 11.6843C19.5644 12.9493 21.2052 14.2079 22.8461 15.4633C25.0204 17.1263 27.1978 18.7893 29.3752 20.4523C29.3907 20.4653 29.3969 20.4847 29.4186 20.517C29.1984 20.6885 28.9503 20.7338 28.6866 20.7338C27.3591 20.7338 26.0284 20.7338 24.7009 20.7338C22.0613 20.7338 19.4249 20.7338 16.7853 20.7338C14.1271 20.7338 11.4689 20.7338 8.81071 20.7338C6.32932 20.7338 3.84793 20.7338 1.36344 20.7338C1.08738 20.7338 0.817531 20.7144 0.550781 20.5073L0.556985 20.4976Z" fill="#ED0D27"></path>
                                        <path d="M18.9219 10.4741C22.616 7.65929 26.2916 4.86386 29.9982 2.03931V18.951C26.3009 16.12 22.6191 13.3019 18.9219 10.4709V10.4741Z" fill="#ED0D27"></path>
                                        <path d="M0 2.08789C3.70968 4.89627 7.37593 7.67552 11.0732 10.4774C7.38213 13.302 3.70658 16.1168 0 18.9543V2.08789Z" fill="#ED0D27"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_1242_706">
                                        <rect width="30" height="20.4545" fill="white" transform="translate(0 0.272705)"></rect>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <span>info@catalanolegal.com</span>
                            </a>
                        </div>
                <?php } ?>
                <?php if (get_field('banner_subtitle')) { ?>
                    <?php echo get_field('banner_subtitle'); ?>
                <?php } ?>
                <?php if ( is_singular(array( 'practice-areas'))) { ?>
                    <a href="#form-flag" class="btn btn-red f-white center-middle-link show-mobile">Free Consultation</a>
                <?php } ?>
                <?php if (get_field('banner_link') != '') { ?>
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
                    if ( is_singular(array( 'practice-areas'))) {
                        $getTitle1 = strtolower(get_the_title( ));
                        $getTitle2 = explode("lawyers", $getTitle1);
                        $newTitle = '<h1 class="f-red uppercase center f-125">'.$getTitle2[0].'<br><span class="f-white medium-font f-55">Lawyers</span></h1>';
                    }
                    if ( is_singular(array( 'areas-we-serve'))) {
                        $getTitle1 = strtolower(get_the_title( ));
                        $getTitle2 = explode(strtolower("PERSONAL INJURY LAWYER"), $getTitle1);
                        $getTitle3 = explode(strtolower("PERSONAL INJURY ATTORNEY"), $getTitle1);
                        if (count($getTitle2) > 1) {
                            $newTitle = '<h1 class="f-red uppercase center f-125">'.$getTitle2[0].'<br><span class="f-white medium-font f-55">PERSONAL INJURY LAWYER</span></h1>';
                        } else {
                            $newTitle = '<h1 class="f-red uppercase center f-125">'.$getTitle3[0].'<br><span class="f-white medium-font f-55">PERSONAL INJURY ATTORNEY</span></h1>';
                        }                        
                    }
                    $tTitle = trim($newTitle);
                    echo $tTitle; 
                    ?>
                </h1>
                <p class="f-white center">
                    <?php 
                    if ( is_singular(array( 'areas-we-serve'))) {
                        if (isset($themeEmail)) {
                            $theEmail = $themeEmail;
                        }                        
                        if (isset($thePhone)) {
                            $thePhone = $themePhone;
                        }                        
                        if (get_field('email') != '') { $theEmail = get_field('email'); }
                        if (get_field('phone') != '') { $thePhone = get_field('phone'); }
                        $thePhone = hueman_phone_format($thePhone, $numberFormat);
                        ?>
                        <div class="office-info">
                            <a href="tel:<?php echo trim($thePhone); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 20 18" fill="none">
                                    <path d="M5.8241 8.02611C6.58608 9.06181 7.48365 9.99263 8.49342 10.7943C9.65904 11.7067 10.9782 12.4091 12.3908 12.8695C12.4413 12.8904 12.4962 12.8987 12.5508 12.8936C12.6053 12.8885 12.6578 12.8702 12.7036 12.8403C12.8495 12.7368 12.9795 12.6127 13.0893 12.4721C13.2097 12.3056 13.316 12.1297 13.4072 11.946C13.8635 11.1205 14.4451 10.1152 15.4999 10.4256C15.5314 10.4363 15.5485 10.4483 15.5628 10.4463L19.1416 11.8621C19.1493 11.8615 19.1569 11.8638 19.163 11.8683C19.1692 11.8729 19.1735 11.8795 19.1751 11.887C19.3978 12.0025 19.5876 12.1714 19.7274 12.3781C19.8672 12.5849 19.9525 12.8231 19.9756 13.0711C20.0409 13.72 19.9199 14.3746 19.6264 14.9598C19.333 15.545 18.879 16.037 18.3166 16.3794C17.725 16.7307 17.0885 17.0017 16.4244 17.1852C15.4384 17.4733 14.3997 17.5341 13.3879 17.363C12.2749 17.1644 11.1922 16.8271 10.1657 16.3591L10.0856 16.3256C9.55423 16.0876 8.97636 15.8418 8.40526 15.5349C6.11993 14.2797 4.11528 12.581 2.51096 10.5399C1.17473 8.93415 0.420362 6.93089 0.367557 4.84801C0.351438 3.79184 0.733087 2.7661 1.43822 1.97042C2.17334 1.23514 3.16967 0.813603 4.21298 0.796447C4.28085 0.790376 4.34909 0.801747 4.4111 0.829459C4.4731 0.857171 4.52676 0.900284 4.56688 0.954622L7.18405 4.20801C7.34988 4.34628 7.47097 4.52973 7.53237 4.7357C7.59378 4.94167 7.5928 5.16115 7.52956 5.36702C7.38774 5.75732 7.15255 6.10814 6.84414 6.38943C6.73178 6.51181 6.61296 6.62822 6.48818 6.73818C6.07725 7.13963 5.58635 7.61175 5.82569 8.02589L5.8241 8.02611Z" fill="#ED0D27"/>
                                </svg>  
                                <span><?php echo trim($thePhone); ?></span>
                            </a>
                            <a href="mailto:<?php echo trim($theEmail); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="21" viewBox="0 0 30 21" fill="none">
                                    <g clip-path="url(#clip0_1242_706)">
                                        <path d="M29.4084 0.521835C28.9431 0.880971 28.4934 1.2304 28.0374 1.57336C24.9295 3.94171 21.8246 6.30683 18.7167 8.67194C17.5442 9.56493 16.3687 10.4514 15.1993 11.3477C15.0536 11.4609 14.9574 11.4609 14.8054 11.3477C11.1609 8.57812 7.51013 5.81504 3.86249 3.05196C2.8203 2.26575 1.79052 1.46335 0.742138 0.690079C0.490897 0.502422 0.608763 0.450655 0.78246 0.369769C0.943751 0.295353 1.11435 0.272705 1.29425 0.272705C3.22043 0.272705 5.1466 0.272705 7.06968 0.272705C9.70926 0.272705 12.3488 0.272705 14.9853 0.272705C17.6435 0.272705 20.3017 0.272705 22.9599 0.272705C24.8643 0.272705 26.7719 0.272705 28.6764 0.272705C28.9338 0.272705 29.1727 0.314766 29.4053 0.515364L29.4084 0.521835Z" fill="#ED0D27"/>
                                        <path d="M0.556985 20.4976C1.6612 19.6532 2.73751 18.8346 3.81381 18.0096C6.57746 15.8936 9.3411 13.7808 12.0985 11.6551C12.294 11.5063 12.418 11.4804 12.6165 11.6422C13.1935 12.1081 13.7921 12.5481 14.3814 12.9979C14.8622 13.3635 15.132 13.3602 15.6221 12.9914C16.1959 12.5578 16.7822 12.134 17.3374 11.6746C17.57 11.4837 17.7127 11.516 17.9298 11.6843C19.5644 12.9493 21.2052 14.2079 22.8461 15.4633C25.0204 17.1263 27.1978 18.7893 29.3752 20.4523C29.3907 20.4653 29.3969 20.4847 29.4186 20.517C29.1984 20.6885 28.9503 20.7338 28.6866 20.7338C27.3591 20.7338 26.0284 20.7338 24.7009 20.7338C22.0613 20.7338 19.4249 20.7338 16.7853 20.7338C14.1271 20.7338 11.4689 20.7338 8.81071 20.7338C6.32932 20.7338 3.84793 20.7338 1.36344 20.7338C1.08738 20.7338 0.817531 20.7144 0.550781 20.5073L0.556985 20.4976Z" fill="#ED0D27"/>
                                        <path d="M18.9219 10.4741C22.616 7.65929 26.2916 4.86386 29.9982 2.03931V18.951C26.3009 16.12 22.6191 13.3019 18.9219 10.4709V10.4741Z" fill="#ED0D27"/>
                                        <path d="M0 2.08789C3.70968 4.89627 7.37593 7.67552 11.0732 10.4774C7.38213 13.302 3.70658 16.1168 0 18.9543V2.08789Z" fill="#ED0D27"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_1242_706">
                                        <rect width="30" height="20.4545" fill="white" transform="translate(0 0.272705)"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <span><?php echo trim($theEmail); ?></span>
                            </a>
                        </div>
                        <?php
                    } else {
                        if ( is_singular(array( 'practice-areas'))) {
                            $theExcerpt = get_the_excerpt(); 
                            // if ($theExcerpt == '.') {
                            //     $theExcerpt = get_two_sentences(strip_tags(get_the_content())); 
                            // }
                            // $theExcerpt = $theExcerpt ;
                            echo $theExcerpt;
                        } else {
                            $theDate = get_the_date();
                            $theAuthor = get_the_author();
                            echo $theDate;
                            echo " <span class='text-red red-text'>//</span> ";
                            $fname = get_the_author_meta('first_name');
                            $lname = get_the_author_meta('last_name');
                            $full_name = '';

                            if( empty($fname)){
                                $full_name = $lname;
                            } elseif( empty( $lname )){
                                $full_name = $fname;
                            } else {
                                //both first name and last name are present
                                $full_name = $lname .", ".$fname;
                            }
                            if ($full_name == '') {
                                $full_name = $theAuthor;
                            }
                            
                            echo $full_name;
                        }
                                                
                    }
                    ?>

                </p>
                <?php if ( is_singular(array( 'practice-areas'))) { ?>
                    <a href="#form-flag" class="btn btn-red f-white center-middle-link show-mobile">Free Consultation</a>
                <?php } ?>
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
            background: url('<?php echo $mobileImg; ?>');
        }
        @media screen and (min-width: 1200px) {
            .hero-banner-bg {
                background: url('<?php echo $desktopImg; ?>');
            }   
        }
    </style>
    <div class="hero-banner hero-banner-bg t2">
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
            <div class="caption-hero-bg t1">
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