<?php

function homePageBanner($attributes) {
    $output = '<!-- First Block -->
    <div class="hero-banner hero-home">
        <div class="caption-banner-att">
            <span class="m-title-home-banner"><h3 class="fm-28">Peter Catalano</h3><span class="LMobile">Attorney &amp; Founder</span></span>
            <div class="slogan-mobile">
            <h1 class="uppercase f-white fm-35">
            <span class="move-left fm-35">we’ve won</span>
            <span class="f-red fm-70">millions</span>
            <span class="move-right fm-35">for our clients</span>
            </h1>
                <img src="/wp-content/themes/cja-ctl/assets/img/catalano-wins.png" alt="Catalano Wins" class="ctlwinsimg"/>
                <a href="/contact" class="contactus btn red-btn text-white">Contact Us</a><img src="/wp-content/themes/cja-ctl/assets/img/no-fee.png" alt="No Fee" class="ctlwinsimg"/>
            </div>
            <div class="slogan-desktop">
                <h1>We`ve won
                <span class="red show-desktop-important fw-800">Millions</span>
                <span class="move show-desktop-important">for our clients</span></h1>
                <div class="icons">
                    <img src="/wp-content/themes/cja-ctl/assets/img/no-fee.png" alt="No Fee" class="ctlwinsimg"/>
                    <a href="/contact" class="contactus btn red-btn">Contact Us</a>
                </div>
            </div>
        </div>
        <div class="caption-banner-att-desktop"><h3>Peter Catalano</h3>Attorney &amp; Founder</div>
    </div>';
    return $output;
}

add_shortcode('homebanner','homePageBanner');

function caseResultsHome($attributes) {
    $output = '<!-- Second Block -->
    <div class="case-results">
        <div class="left-part">
            <div class="overlay">
                <img src="/wp-content/themes/cja-ctl/assets/img/catalano-wins.png" alt="Catalano Wins" class="ctlwinsimg"/>
                <h2>$2.3 <span>Million</span></h2>
                <div class="flex flex-row flex-middle">
                    <div class="line-red"></div><h6 class="f-32 Light">Car Accident Settlement</h6>
                </div>
                <div class="diagonal-box"></div>
            </div>            
        </div>
        <div class="right-part">
            <div class="case-1">
                <h2 class="f-case-results">$1.9 <span>Million</span></h2>
                <div class="flex flex-row flex-middle">
                    <div class="line-red"></div><h6 class="Light h6-20">Worksite Accident &amp; Injuries</h6>
                </div>
            </div>
            <div class="case-2">
                <h2 class="f-case-results">$950 <span>Thousand</span></h2>
                <div class="flex flex-row flex-middle">
                    <div class="line-red"></div><h6 class="Light h6-20">Car Accident Settlement</h6>
                </div>
            </div>
            <div class="case-3">
                <h2 class="f-case-results">$325 <span>Thousand</span></h2>
                <div class="flex flex-row flex-middle">
                    <div class="line-red"></div><h6 class="Light h6-20">Motorcycle Accident Settlement</h6>
                </div>
            </div>
            <div class="link">
                <a href="/results/" class="btn btn-red text-white">See Our Victories</a>
            </div>
        </div>
    </div>';
    return $output;
}

add_shortcode('homecaseresults','caseResultsHome');

function wereInjuredHome($attributes) {
    $output = '<!-- Third Block -->
    <div class="were-you-injured">
        <div class="image"></div>
        <div class="r-caption">
            <div class="title"><h2 class="f-100 h2-injured">WERE YOU<br><span class="f-red">INJURED</span></h2></div>
            <div class="caption">
                <p class="big">When someone is injured, they feel scared, uncertain, and vulnerable. The Syracuse personal injury lawyers at Catalano Law offer stability, personal care, and protection so that the injured’s damages are fully restored and get the justice they deserve.</p>
                <a href="/contact" class="btn btn-red f-black">Free Consultation</a>
            </div>
        </div>
    </div>';
    return $output;
}

add_shortcode('injuredhome','wereInjuredHome');

function getFAQList($attributes) {
    $counter = 0;
    $showCats = false;
    $atts = shortcode_atts(array(
        // default values
        'is_home' => '', // Empty = No homepage
        'id_cat' => '' , // All Categories if not Set
        'show_link' => '' , // Target Link if defined
    ), $attributes);
    $linkFAQ = "";
    $args = array(  
        'post_type' => 'faq-answers',
        'post_status' => 'publish',
        'posts_per_page' => -1,         
    );

    if (isset($atts['is_home']) && ($atts['is_home'] != '')) {
        $args['meta_key'] = 'in_front_page';
        $args['meta_value'] = true;   
        $args['orderby'] = 'meta_value';
    }
    if (isset($atts['id_cat']) && ($atts['id_cat'] != '')) {
        $showCats = true;
    }
    if (isset($atts['show_link']) && ($atts['show_link'] != '')) {
        $linkFAQ = "<a href='".$atts['show_link']."' class='btn btn-red f-black faq-link'>More FAQ`s</a>";
    }

    // echo "<pre>",print_r($atts),"</pre>";
    // echo "<pre>",print_r($args),"</pre>";

    
    $output = '<div class="faq-container">';
    if ($showCats) {
        $args = array(
            'type' => 'faq-answers',
            'orderby' => 'name',
            'order'   => 'ASC'
        );
        $cats = get_categories($args);
        foreach($cats as $cat) {            
            $args2 = array(  
                'post_type' => 'faq-answers',
                'post_status' => 'publish',
                'posts_per_page' => -1,         
                'category__in' => $cat->term_id,
            );
            $loop = new WP_Query( $args2 );
            if ( $loop->have_posts() ) {
                $output .= '<div class="caption">
                            <h2 class="f-black uppercase">'.$cat->name.'</h2>
                            <div class="faq-list">
                                <ul>';
                                
                                while ( $loop->have_posts() ) : $loop->the_post(); 
        $output .=                  "<li id='faq-".$counter."'>
                                        <div class='title f-32'>
                                            " . get_the_title() . "<a href='javascript:void(0)' data-count='".$counter."' onclick='faqShowThis(this);' class='faq-link-arrow' id='faq-link-".$counter."'><img src='/wp-content/themes/cja-ctl/assets/img/faq-icon.png' alt='FAQ icon' class='faq-icon-arrow'></a>
                                        </div>
                                        <div class='faq-caption-hide' id='faq-caption-".$counter."'>
                                        ".get_the_content()."
                                        </div>
                                    </li>";
                                    $counter++;
                                endwhile;
                                wp_reset_postdata(); 
        $output .=              '</ul>
                                <br> ' . $linkFAQ . '
                            </div>
                        </div>';
            }
        }
        $output .= '';
    } else {
        $loop = new WP_Query( $args );
        $output .= '<div class="caption">
                            <h2 class="f-black uppercase f-64">FREQUENTLY ASKED QUESTIONS</h2>
                            <div class="faq-list">
                                <ul>';
                                
                                while ( $loop->have_posts() ) : $loop->the_post(); 
        $output .=                  "<li id='faq-".$counter."'>
                                        <div class='title f-32'>
                                            " . get_the_title() . "<a href='javascript:void(0)' data-count='".$counter."' onclick='faqShowThis(this);' class='faq-link-arrow' id='faq-link-".$counter."'><img src='/wp-content/themes/cja-ctl/assets/img/faq-icon.png' alt='FAQ icon'></a>
                                        </div>
                                        <div class='faq-caption-hide' id='faq-caption-".$counter."'>
                                        ".get_the_content()."
                                        </div>
                                    </li>";
                                    $counter++;
                                endwhile;
                                wp_reset_postdata(); 
        $output .=              '</ul>
                                <br> ' . $linkFAQ . '
                            </div>
                        </div>';
    }
    $output .= '</div>';
    return $output;
    
}

add_shortcode('faqcode','getFAQList');




function gavelBannerHome() {
    $output = '<div class="flex-responsive flex-middle success">
    <div class="item">
        <div class="icon">
            <img src="/wp-content/themes/cja-ctl/assets/img/svg/gavel-solid.svg" alt="50 Years Experience">
        </div>
        <div class="caption">
            <h2>50+ Years</h2>
            <span class="d-font">Combined Experience</span>
        </div>
    </div>
    <div class="item">
        <div class="icon">
            <img src="/wp-content/themes/cja-ctl/assets/img/svg/scales-solid.svg" alt="12000+ Cases Handled">
        </div>
        <div class="caption">
            <h2>12,000+</h2>
            <span class="d-font">Cases Handled</span>
        </div>
    </div>
    <div class="item">
        <div class="icon">
            <img src="/wp-content/themes/cja-ctl/assets/img/svg/awards-solid.svg" alt="95% Success">
        </div>
        <div class="caption">
            <h2>95% Success</h2>
            <span class="d-font">Won or Settled</span>
        </div>
    </div>
</div>';
    return $output;
}

add_shortcode('gavelhome','gavelBannerHome');

function getTheBadges() {
    $output = '<div class="flex flex-resonpsive-wrap badges-container">
    <div class="badges">
        <img src="/wp-content/themes/cja-ctl/assets/img/badge1.png" alt="Badge">
    </div>
    <div class="badges">
        <img src="/wp-content/themes/cja-ctl/assets/img/badge2.png" alt="Badge">
    </div>
    <div class="badges">
        <img src="/wp-content/themes/cja-ctl/assets/img/badge3.png" alt="Badge">
    </div>
    <div class="badges">
        <img src="/wp-content/themes/cja-ctl/assets/img/badge5.png" alt="Badge">
    </div>
    <div class="badges">
        <img src="/wp-content/themes/cja-ctl/assets/img/badge4.png" alt="Badge">
    </div>
    </div>';
    return $output;
}

add_shortcode('badges','getTheBadges');

function getTheReviews() {
    $whichOption = 2;
    $output1 = '<div class="client-block">
    <div class="left-part red-gradient">
        <h2>4.9</h2>
        <img src="/wp-content/themes/cja-ctl/assets/img/stars-review.png" alt="Users Review">
        <p>Average Google<br>User Review</p>
        <a href="/reviews" class="btn btn-white f-white uppercase">View All Our Reviews</a>
    </div>
    <div class="right-part dark-red-gradient">
        <h2 class="uppercase">What Our Clients are Saying</h2>
        <div class="testimonial-container">
            <div class="testimonial">
                <div class="star-container">
                    <img src="/wp-content/themes/cja-ctl/assets/img/Star.png" alt="Star Score">
                    <img src="/wp-content/themes/cja-ctl/assets/img/Star.png" alt="Star Score">
                    <img src="/wp-content/themes/cja-ctl/assets/img/Star.png" alt="Star Score">
                    <img src="/wp-content/themes/cja-ctl/assets/img/Star.png" alt="Star Score">
                    <img src="/wp-content/themes/cja-ctl/assets/img/Star.png" alt="Star Score">
                </div>
                <div class="caption"><p>Professional, honest. They educate you so you can make an informed decision. They put people first and their well being. Their words and actions match up.</p>
                    <span class="google">
                        <img src="/wp-content/themes/cja-ctl/assets/img/Google__G__logo.png" alt="Google Score">
                        <p>Hallie Kowalsky</p>
                    </span>
                </div>
            </div>
            <div class="testimonial">
                <div class="star-container">
                    <img src="/wp-content/themes/cja-ctl/assets/img/Star.png" alt="Star Score">
                    <img src="/wp-content/themes/cja-ctl/assets/img/Star.png" alt="Star Score">
                    <img src="/wp-content/themes/cja-ctl/assets/img/Star.png" alt="Star Score">
                    <img src="/wp-content/themes/cja-ctl/assets/img/Star.png" alt="Star Score">
                    <img src="/wp-content/themes/cja-ctl/assets/img/Star.png" alt="Star Score">
                </div>
                <div class="caption"><p>I was in a serious accident in February of 2023 and needed major surgery and PT. I’m still healing but Peter and Dominic worked hard to get me the settlement that I deserved.They were always available to answer any questions and explain things to me numerous times that I just didn’t understand.</p>
                    <span class="google">
                        <img src="/wp-content/themes/cja-ctl/assets/img/Google__G__logo.png" alt="Google Score">
                        <p>Gerald Dorrian</p>
                    </span>
                </div>
            </div>
            <div class="testimonial">
                <div class="star-container">
                    <img src="/wp-content/themes/cja-ctl/assets/img/Star.png" alt="Star Score">
                    <img src="/wp-content/themes/cja-ctl/assets/img/Star.png" alt="Star Score">
                    <img src="/wp-content/themes/cja-ctl/assets/img/Star.png" alt="Star Score">
                    <img src="/wp-content/themes/cja-ctl/assets/img/Star.png" alt="Star Score">
                    <img src="/wp-content/themes/cja-ctl/assets/img/Star.png" alt="Star Score">
                </div>
                <div class="caption"><p>These guys are the best. I called them 2 days after my accident, Jamie was here within the week, to talk and get info. Great communication, when ever I called, he called me back as soon as he could. Kept me updated on all the different aspects of my case.</p>
                    <span class="google">
                        <img src="/wp-content/themes/cja-ctl/assets/img/Google__G__logo.png" alt="Google Score">
                        <p>Linda Grieves</p>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>';

    $googleReviews = [
        [
            'score' => 5,
            'reviewer' => 'Hallie Kowalsky',
            'the_review' => 'Professional, honest. They educate you so you can make an informed decision. They put people first and their well being. Their words and actions match up.',
        ],
        [
            'score' => 5,
            'reviewer' => 'Gerald Dorrian',
            'the_review' => 'I was in a serious accident in February of 2023 and needed major surgery and PT. I’m still healing but Peter and Dominic worked hard to get me the settlement that I deserved.They were always available to answer any questions and explain things to me numerous times that I just didn’t understand.',
        ],
        [
            'score' => 5,
            'reviewer' => 'Linda Grieves',
            'the_review' => 'These guys are the best. I called them 2 days after my accident, Jamie was here within the week, to talk and get info. Great communication, when ever I called, he called me back as soon as he could. Kept me updated on all the different aspects of my case.',
        ],
        [
            'score' => 5,
            'reviewer' => 'Hallie Kowalsky',
            'the_review' => 'Professional, honest. They educate you so you can make an informed decision. They put people first and their well being. Their words and actions match up.',
        ],
        [
            'score' => 5,
            'reviewer' => 'Gerald Dorrian',
            'the_review' => 'I was in a serious accident in February of 2023 and needed major surgery and PT. I’m still healing but Peter and Dominic worked hard to get me the settlement that I deserved.They were always available to answer any questions and explain things to me numerous times that I just didn’t understand.',
        ],
        [
            'score' => 5,
            'reviewer' => 'Linda Grieves',
            'the_review' => 'These guys are the best. I called them 2 days after my accident, Jamie was here within the week, to talk and get info. Great communication, when ever I called, he called me back as soon as he could. Kept me updated on all the different aspects of my case.',
        ],
    ];

    $output2 = 
    '<div class="client-block">
        <div class="left-part red-gradient">
            <h2>4.9</h2>
            <img src="/wp-content/themes/cja-ctl/assets/img/stars-review.png" alt="Users Review">
            <p>Average Google<br>User Review</p>            
        </div>';
        if (1 == 2) {
        $output2 .= '<div class="right-part dark-red-gradient show-mobile">
            <h2 class="uppercase">What Our Clients are Saying</h2>
            <div class="testimonial-container">';
            foreach($googleReviews as $index => $value) {
                $theStars = '';
                for ($i = 0; $i < $value['score']; $i++) {
                    $theStars .= '<img src="/wp-content/themes/cja-ctl/assets/img/Star.png" alt="Star Score">';
                }
                $output2 .= '<div class="testimonial">
                <div class="star-container">
                '.$theStars.'
                </div>
                <div class="caption"><p>'.$value['the_review'].'</p>
                        <span class="google">
                            <img src="/wp-content/themes/cja-ctl/assets/img/Google__G__logo.png" alt="Google Score">
                            <p>'.$value['reviewer'].'</p>
                        </span>
                    </div>
                </div>';
            }
            $output2 .= '</div></div>';
        }
            $output2 .= '
        <div class="right-part dark-red-gradient">
            <h2 class="uppercase">What Our Clients are Saying</h2>
            <div class="testimonial-container">
                <section class="splide" aria-label="Reviews">
                    <div class="splide__track">
                        <ul class="splide__list">';
                            foreach($googleReviews as $index => $value) {
                                $theStars = '';
                                for ($i = 0; $i < $value['score']; $i++) {
                                    $theStars .= '<img src="/wp-content/themes/cja-ctl/assets/img/Star.png" alt="Star Score">';
                                }
                                $output2 .= '<li class="splide__slide">
                                <div class="testimonial">
                                    <div class="star-container">
                                        '.$theStars.'
                                    </div>
                                    <div class="caption"><p>'.$value['the_review'].'</p>
                                        <span class="google">
                                            <img src="/wp-content/themes/cja-ctl/assets/img/Google__G__logo.png" alt="Google Score">
                                            <p>'.$value['reviewer'].'</p>
                                        </span>
                                    </div>
                                </div>';
                            }
                            $output2 .= '</li>                           
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </div>';

    $output = $output1;
    if ($whichOption == 2) {
        $output = $output2;
    }
    return $output;
}

add_shortcode('reviews-ctl','getTheReviews');

function getAllAttorneys($attributes) {
    $atts = shortcode_atts(array(
        // default values
        'is_home' => '', // Empty = No homepage
        'add_staff' => '' , // Add Staff if = 1
        'show_all_attorneys' => '' , // Show all Attorneys if they are not in Frontpage if this = 1
    ), $attributes);
    $args = array(  
        'post_type' => 'team-member',
        'post_status' => 'publish',
        'posts_per_page' => -1,         
        'meta_key' => 'order',
        'orderby' => 'meta_value',
        'order' => 'ASC',
    );
     
    $loop = new WP_Query( $args );
    $mainAttorney = '';
    $secondaryAttorney = '';
    $otherStaff = '';
    $counter = 0;
    $counter2 = 0;
    while ( $loop->have_posts() ) : $loop->the_post();         
        $firstName = explode(" ", get_the_title())[0];
        $titlesArray = get_field('team_title');  
        $newClass = "move-left";
        if (!even($counter)) { $newClass = "move-right"; }
        if (in_array('Attorney', $titlesArray)) {
            if (get_field('in_front_page')) {
                if (get_field('order') == 1) {            
                    $mainAttorney = '<div class="main-attorney">
                        <picture>
                            <source media="(max-width:1199px)" srcset="'.get_field('mobile_image').'">
                            <source media="(min-width:1200px)" srcset="'.get_field('desktop_image').'">
                            <img src="'.get_field('mobile_image').'" class="att-img" alt="'.get_the_title().'" style="width:auto;">
                        </picture>
                        <div class="caption f-white">
                            <div class="d-flex flex-column">
                                <h2  class="attorney-title move-left">'.get_the_title().'</h2>
                                <span class="uppercase occupation">'.implode(" & ",$titlesArray).'</span>                                
                            </div>
                            <a href="'.get_the_permalink().'" class="btn btn-red f-white">Meet '.$firstName.'</a>
                        </div>
                    </div>';
                } else {
                    
                    $secondaryAttorney .= '<div class="secondary-attorney">
                        <picture>
                            <source media="(max-width:1199px)" srcset="'.get_field('mobile_image').'">
                            <source media="(min-width:1200px)" srcset="'.get_field('desktop_image').'">
                            <img src="'.get_field('mobile_image').'" class="att-img" alt="'.get_the_title().'" style="width:auto;">
                        </picture>
                        <div class="caption f-white">
                            <div class="reverse-desktop">
                                <span class="uppercase occupation">'.implode(" & ",$titlesArray).'</span>
                                <h2  class="attorney-title '.$newClass.'">'.get_the_title().'</h2>
                            </div>
                            <a href="'.get_the_permalink().'" class="btn btn-red f-white">Meet '.$firstName.'</a>
                        </div>
                    </div>';
                }
            }   
            $counter++;            
        } else {
            $newClass = "move-left";
            $newClassBtn = "move-left-btn";
            if (even($counter2)) { 
                $newClass = "move-right"; 
                $newClassBtn = "move-right-btn";
            }
            if (isset($atts['add_staff']) && ($atts['add_staff'] == '1')) {
                $otherStaff .= '<div class="team-staff">
                                    <source media="(max-width:1199px)" srcset="'.get_field('mobile_image').'">
                                    <source media="(min-width:1200px)" srcset="'.get_field('desktop_image').'">
                                    <img src="'.get_field('mobile_image').'" class="att-img" alt="'.get_the_title().'" style="width:auto;">
                                    <div class="caption f-white">
                                        <div class="reverse-desktop '.$newClass.'">
                                            <span class="uppercase Bold">'.implode(" & ",$titlesArray).'</span>
                                            <h2 class="attorney-title '.$newClass.'">'.get_the_title().'</h2>
                                        </div>
                                        <a href="'.get_the_permalink().'" class="btn btn-red f-white '.$newClassBtn.'">Meet '.$firstName.'</a>
                                    </div>
                                </div>';
            }
            $counter2++;
        }
        
    endwhile;
    wp_reset_postdata(); 

    $staffToAdd = '';

    if ($otherStaff != '') {
        $staffToAdd = '<h2 class="uppercase legal-staff-title"><img src="/wp-content/themes/cja-ctl/assets/img/fill.png" alt="Our Attorneys"> Our<br><span class="f-red">Legal Staff</span></h2>' . $otherStaff;
    }
    
    $output = '<div class="attorney-block">
        <div class="container-attorneys">
            <h2 class="uppercase h2-attorney"><img src="/wp-content/themes/cja-ctl/assets/img/fill.png" alt="Our Attorneys"> Our<br><span class="f-red">Attorneys</span></h2>
            '.$mainAttorney.'
            '.$secondaryAttorney.'
            '.$staffToAdd.'
        </div>
    </div>';
    return $output;
}
add_shortcode('attorneys','getAllAttorneys');

function getTheFormForHome() {
    $output = '<div id="form-container-bg" class="is-desktop">
    <div id="form-container">
        <h2 class="uppercase f-white">Request Free <span class="f-red">Consultation</span></h2>
        <div class="form-caption"><p class="text-white">To get answers to questions about your injury, contact Catalano Law for a FREE case evaluation. We’ll assess your case, explain your legal options, and recommend the next steps at no cost. We’re here when you need us.</p></div>
        <div id="form-container-inside"></div>
    </div>
</div>';
    return $output;
}
add_shortcode('contact-ctl','getTheFormForHome');

function getPracticeAreasHome() {
    $output = '';
        $useOld = false;
        
        $output1 = '<div class="practice-areas">
        <div class="bg-pa">
            <div class="caption">
                <h2 class="f-red uppercase f-150 f-red-gradient-m">Practice Areas</h2>
                <p class="f-white uppercase f-64 fw-700">Here to Help</p>
                <p class="f-white p-f-36">Catalano Law has a strong record of helping victims in all kinds of personal injury and accident cases. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <a href="/practice-areas" class="btn btn-red f-white mt-40">All Practice Areas</a>
            </div>
        </div>
        <div class="practice-areas-list">
            <a class="pa-item car " href="/practice-areas/car-accidents/" id="pa-1">
                <div class="caption">
                    <div class="line-red"></div>
                    <p class="f-white">Car<br>Accident</p>
                    <div class="line-red2"></div>
                </div>
                <div class="caption2">
                    <h2>Car Accident</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus suscipit rutrum libero. In hac habitasse platea dictumst. </p>
                    <span>Learn More <img src="/wp-content/themes/cja-ctl/assets/img/faq-icon.png" alt="Learn More" class="pa-more"></span>
                </div>
            </a>
            <a class="pa-item motorcycle " href="/practice-areas/motorcycle-accidents/"  id="pa-2">
                <div class="caption">   
                    <div class="line-red"></div>
                    <p class="f-white">Motorcycle<br>Accident</p>
                    <div class="line-red2"></div>
                </div>
                <div class="caption2">
                    <h2>Motorcycle Accident</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus suscipit rutrum libero. In hac habitasse platea dictumst. </p>
                    <span>Learn More <img src="/wp-content/themes/cja-ctl/assets/img/faq-icon.png" alt="Learn More" class="pa-more"></span>
                </div>
            </a>
            <a class="pa-item truck " href="/practice-areas/truck-accidents/"  id="pa-3">
                <div class="caption">
                    <div class="line-red"></div>
                    <p class="f-white">Truck<br>Accident</p>
                    <div class="line-red2"></div>
                </div>
                <div class="caption2">
                    <h2>Truck Accident</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus suscipit rutrum libero. In hac habitasse platea dictumst. </p>
                    <span>Learn More <img src="/wp-content/themes/cja-ctl/assets/img/faq-icon.png" alt="Learn More" class="pa-more"></span>
                </div>
            </a>
            <a class="pa-item slip " href="/practice-areas/slip-and-fall-injuries/"  id="pa-4">
                <div class="caption">
                    <div class="line-red"></div>
                    <p class="f-white">Slip<br>and Fall</p>
                    <div class="line-red2"></div>
                </div>
                <div class="caption2">
                    <h2>Slip and Fall</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus suscipit rutrum libero. In hac habitasse platea dictumst.</p>
                    <span>Learn More <img src="/wp-content/themes/cja-ctl/assets/img/faq-icon.png" alt="Learn More" class="pa-more"></span>
                </div>
            </a>
        </div>
    </div>';

    

    $output2 = '
    <div class="practice-areas2">
        <div class="pa2-bg">
            <div class="caption">
                <h2 class="f-red uppercase f-150 f-red-gradient-m">Practice Areas</h2>
                <p class="f-white uppercase f-64 fw-700">Here to Help</p>
                <p class="f-white p-f-36">Catalano Law has a strong record of helping victims in all kinds of personal injury and accident cases. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <a href="/practice-areas" class="btn btn-red f-white mt-40">All Practice Areas</a>
            </div>
            <div class="practice-areas2-list show-mobile">
                <a class="pa-item car " href="/practice-areas/car-accidents/" id="pa-1">
                    <div class="caption">
                        <div class="line-red"></div>
                        <p class="f-white">Car<br>Accident</p>
                        <div class="line-red2"></div>
                    </div>
                    <div class="caption2">
                        <h2>Car Accident</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus suscipit rutrum libero. In hac habitasse platea dictumst. </p>
                        <span>Learn More <img src="/wp-content/themes/cja-ctl/assets/img/faq-icon.png" alt="Learn More" class="pa-more"></span>
                    </div>
                </a>
                <a class="pa-item motorcycle " href="/practice-areas/motorcycle-accidents/"  id="pa-2">
                    <div class="caption">   
                        <div class="line-red"></div>
                        <p class="f-white">Motorcycle<br>Accident</p>
                        <div class="line-red2"></div>
                    </div>
                    <div class="caption2">
                        <h2>Motorcycle Accident</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus suscipit rutrum libero. In hac habitasse platea dictumst. </p>
                        <span>Learn More <img src="/wp-content/themes/cja-ctl/assets/img/faq-icon.png" alt="Learn More" class="pa-more"></span>
                    </div>
                </a>
                <a class="pa-item truck " href="/practice-areas/truck-accidents/"  id="pa-3">
                    <div class="caption">
                        <div class="line-red"></div>
                        <p class="f-white">Truck<br>Accident</p>
                        <div class="line-red2"></div>
                    </div>
                    <div class="caption2">
                        <h2>Truck Accident</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus suscipit rutrum libero. In hac habitasse platea dictumst. </p>
                        <span>Learn More <img src="/wp-content/themes/cja-ctl/assets/img/faq-icon.png" alt="Learn More" class="pa-more"></span>
                    </div>
                </a>
                <a class="pa-item slip " href="/practice-areas/slip-and-fall-injuries/"  id="pa-4">
                    <div class="caption">
                        <div class="line-red"></div>
                        <p class="f-white">Slip<br>and Fall</p>
                        <div class="line-red2"></div>
                    </div>
                    <div class="caption2">
                        <h2>Slip and Fall</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus suscipit rutrum libero. In hac habitasse platea dictumst.</p>
                        <span>Learn More <img src="/wp-content/themes/cja-ctl/assets/img/faq-icon.png" alt="Learn More" class="pa-more"></span>
                    </div>
                </a>
            </div>
            <div class="practice-areas3-list show-desktop">
                <a class="pa-item car to-hover hovered" href="/practice-areas/car-accidents/" id="pa-1">
                    <div class="caption">
                        <div class="line-red"></div>
                        <p class="f-white">Car<br>Accident</p>
                        <div class="line-red2"></div>
                    </div>
                    <div class="caption2">
                        <h2>Car Accident</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus suscipit rutrum libero. In hac habitasse platea dictumst. </p>
                        <span>Learn More <img src="/wp-content/themes/cja-ctl/assets/img/faq-icon.png" alt="Learn More" class="pa-more"></span>
                    </div>
                </a>
                <a class="pa-item motorcycle to-hover no-hovered" href="/practice-areas/motorcycle-accidents/"  id="pa-2">
                    <div class="caption">   
                        <div class="line-red"></div>
                        <p class="f-white">Motorcycle<br>Accident</p>
                        <div class="line-red2"></div>
                    </div>
                    <div class="caption2">
                        <h2>Motorcycle Accident</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus suscipit rutrum libero. In hac habitasse platea dictumst. </p>
                        <span>Learn More <img src="/wp-content/themes/cja-ctl/assets/img/faq-icon.png" alt="Learn More" class="pa-more"></span>
                    </div>
                </a>
                <a class="pa-item truck to-hover no-hovered" href="/practice-areas/truck-accidents/"  id="pa-3">
                    <div class="caption">
                        <div class="line-red"></div>
                        <p class="f-white">Truck<br>Accident</p>
                        <div class="line-red2"></div>
                    </div>
                    <div class="caption2">
                        <h2>Truck Accident</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus suscipit rutrum libero. In hac habitasse platea dictumst. </p>
                        <span>Learn More <img src="/wp-content/themes/cja-ctl/assets/img/faq-icon.png" alt="Learn More" class="pa-more"></span>
                    </div>
                </a>
                <a class="pa-item slip to-hover no-hovered" href="/practice-areas/slip-and-fall-injuries/"  id="pa-4">
                    <div class="caption">
                        <div class="line-red"></div>
                        <p class="f-white">Slip<br>and Fall</p>
                        <div class="line-red2"></div>
                    </div>
                    <div class="caption2">
                        <h2>Slip and Fall</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus suscipit rutrum libero. In hac habitasse platea dictumst.</p>
                        <span>Learn More <img src="/wp-content/themes/cja-ctl/assets/img/faq-icon.png" alt="Learn More" class="pa-more"></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    ';
    
    if ($useOld) { $output = $output1; }
    if (!$useOld) { $output = $output2; }
    return $output;
}
add_shortcode('practice-areas-ctl','getPracticeAreasHome');

function showTheResults($attributes) { 
    $atts = shortcode_atts(array(
        'related_category' => '' , 
    ), $attributes);

    $args = array(  
        'post_type' => 'case-results',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'meta_key' => 'order',
        'orderby' => 'meta_value',
        'order' => 'ASC',                       
    );
     
    if ($atts['related_category'] != '') {
        $args ['category__in'] = $atts['related_category'];
    }

    $loop = new WP_Query( $args ); 
    $output = '';
    if ($loop->have_posts()) {
        $output .= '
        <div class="results-container">
        <h2 class="uppercase f-black">Recent Results</h2>
        <div class="results-list">';     
        while ( $loop->have_posts() ) : $loop->the_post(); 
        $addClass = '';
            if (get_field('case_quantity') == 'Million') {
                $addClass = 'million';
            }
            $output .= '<div class="result-item '.$addClass.'">';
            $output .= '<h2 class="f-black uppercase">';
            if (get_field('case_money')) {
                $output .= '$' . get_field('case_money');
            }
            if (get_field('case_quantity')) {
                $output .= ' <span class="f-red">' . get_field('case_quantity') . '</span>';
            }
            $output .= '</h2>';
            $output .= '<p>'.get_the_title().'</p>';
            // $output .= '<a href="'.get_the_permalink().'">Read More</a>';
            $output .= '</div>';
        endwhile;
        wp_reset_postdata(); 
        $output .= '</div>
        </div>';
    }
    if (is_page( array(1434) )) {
        $output .= '<div class="icons">
        <img src="/wp-content/themes/cja-ctl/assets/img/no-fee.png" alt="No Fee" class="ctlwinsimg"/>
        <a href="/contact" class="contactus btn red-btn f-black">Free Consultation</a>
        </div>';
    }
    return $output;
}

add_shortcode('results-ctl','showTheResults');

function practiceAreasList() {
    $practiceAreasList = [
        0 => [
            'title' => 'Auto Accident',
            'img' => '/wp-content/themes/cja-ctl/assets/img/practiceareas/car-accident.jpg',
            'link' => '/practice-areas/car-accidents/',
        ],
        1 => [
            'title' => 'Motorcycle Accident',
            'img' => '/wp-content/themes/cja-ctl/assets/img/practiceareas/motorcycle-accident.jpg',
            'link' => '/practice-areas/motorcycle-accidents/',
        ],
        2 => [
            'title' => 'Truck Accident',
            'img' => '/wp-content/themes/cja-ctl/assets/img/practiceareas/truck-accident.jpg',
            'link' => '/practice-areas/truck-accidents/',
        ],
        3 => [
            'title' => 'Slip and Fall Injuries',
            'img' => '/wp-content/themes/cja-ctl/assets/img/practiceareas/truck-accident.jpg',
            'link' => '/practice-areas/slip-and-fall-injuries/',
        ],
        4 => [
            'title' => 'Worksite Accident',
            'img' => '/wp-content/themes/cja-ctl/assets/img/practiceareas/work-accident.jpg',
            'link' => '/practice-areas/worksite-accidents-and-injuries/',
        ],
        5 => [
            'title' => 'Wrongful Death',
            'img' => '/wp-content/themes/cja-ctl/assets/img/practiceareas/wrong-death.jpg',
            'link' => '/practice-areas/wrongful-death/',
        ],
        6 => [
            'title' => 'Catastrophic Injury',
            'img' => '/wp-content/themes/cja-ctl/assets/img/practiceareas/catastrophic-injury.jpg',
            'link' => '/practice-areas/catastrophic-injury/',
        ],
        7 => [
            'title' => 'Bycicle Accident',
            'img' => '/wp-content/themes/cja-ctl/assets/img/practiceareas/bycicle-accident.jpg',
            'link' => '/practice-areas/bicycle-accidents/',
        ],
        8 => [
            'title' => 'Prescription Drug Case',
            'img' => '/wp-content/themes/cja-ctl/assets/img/practiceareas/drug-case.jpg',
            'link' => '/practice-areas/prescription-drug-case/',
        ],
        9 => [
            'title' => 'Injuries to Children',
            'img' => '/wp-content/themes/cja-ctl/assets/img/practiceareas/children-injuries.jpg',
            'link' => '/practice-areas/injuries-to-children/',
        ],
        10 => [
            'title' => 'Animal Bite',
            'img' => '/wp-content/themes/cja-ctl/assets/img/practiceareas/dog-bite.jpg',
            'link' => '/practice-areas/animal-bites/',
        ],
    ];
    $output = '';
    
    $output .= '<div class="practice-areas-list-block">';
    foreach($practiceAreasList as $index => $value) { 
        $theExplodedTitle = explode(" ", $value['title']);
        $theTitle = "<span class='f-white'>".$theExplodedTitle[0]."</span><br>";
        foreach ($theExplodedTitle as $ind => $val) {
            if ($ind != 0) {
                $theTitle .= $val . " ";
            }
        }
        if (strtolower($theExplodedTitle[0]) == 'slip') {
            $theTitle = "<span class='f-white'>Slip and Fall</span><br>Injuries";
        }
        if (strtolower($theExplodedTitle[0]) == 'injuries') {
            $theTitle = "<span class='f-white'>Injuries To</span><br>Children";
        }
        $output .= '<div class="practice-areas-item" style="background-image: url(\''.$value['img'].'\')" onclick="goToURL(\''.$value['link'].'\')">';
        $output .= '<h2 class="f-red uppercase">'.$theTitle.'</h2>';            
        $output .= '</div>';
    }
    $output .= '</div>';


    
    return $output;
}
add_shortcode('pa-ctl','practiceAreasList');

function relatedPosts($attributes) { 

    $atts = shortcode_atts(array(
        'related_category' => '' , 
    ), $attributes);

    $args = array(  
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 3,                     
    );
     
    if ($atts['related_category'] != '') {
        $args ['category__in'] = $atts['related_category'];
    }

    
    $output = '';
    $output .= '<div class="related-posts">';
    $output .= '<h2 class="uppercase">Relevant <span class="f-red">Posts</span></h2>';
    $loop = new WP_Query( $args );
    if ($loop->have_posts()) {
        $output .= '<div class="post-item-list">';
        while ( $loop->have_posts() ) : $loop->the_post(); 
            $postImage = '/wp-content/themes/cja-ctl/assets/img/blog-block-bg.jpeg';
            if (has_post_thumbnail()) {
                $postImage = get_the_post_thumbnail_url( );
            }
            $title = str_replace('<strong>','',str_replace('</strong>','',get_the_title(  )) );
            $link = get_the_permalink( );
            $excerpt = get_the_excerpt(  );
            $date = get_the_date( );
            $output .= '<div class="post-item">';
            $output .= '<div class="image" style="background-image: url(\''.$postImage.'\');"></div>';
            $output .= '<div class="caption"><h4 class="f-black">'.$title.'</h4><p class="Light">'.$date.'</p><p class="excerpt">'.$excerpt.'</p><a href="'.$link.'" class="btn btn-red f-black">Read More</a></div>';
            $output .= '</div>';
        endwhile;
        wp_reset_postdata();
        $output .= '</div>';
    }         
    $output .= '</div>';
    return $output;
}

add_shortcode('rel-posts','relatedPosts');


?>