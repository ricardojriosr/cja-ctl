<nav id="menu-nav-b">
        <div class="call d-flex f-row f-center">
            <a href="tel:<?php echo $themePhone; ?>" class="call">
                <img src="/wp-content/themes/cja-ctl/assets/img/phone-icon.svg" alt="Call Catalano" class="call-icon call-mobile-icon"> 
                <img src="/wp-content/themes/cja-ctl/assets/img/phone-call-iconwhite.png" alt="Call Catalano" class="call-icon call-desktop-icon"> 
                <?php echo hueman_phone_format($themePhone, $numberFormat); ?>
                <div class="espanol">Se habla<br>Espa&ntilde;ol</div>
            </a>            
        </div>
        <div class="menu-container">
            <div class="logo-icon">
                <a href="/" class="logo-link" aria-label="Home"></a>
            </div>
            <div class="hamburguer" id="mobile-burguer">
                <i class="fa fa-bars fa-2x" aria-hidden="true" id="toggle-burguer"></i>
            </div>
        </div>
        <div class="menu-items">
            <div class="main-menu">
                <?php
                wp_nav_menu([            
                'theme_location'    => 'menu-1',
                'container'         => 'div',
                'container_id'      => 'main-menu-container',          
                'menu_id'           => 'main-menu',
                'menu_class'        => 'main-menu-class',    
                'walker'            => new CJ_Walker_Nav_Menu()      
                ]);
                ?>
            </div>
            <div class="social-items">
                <h4>Follow Us On Social</h4>
                <div class="icons">
                    <a href="<?php echo $facebookLink; ?>" target="_blank" nofollow>
                        <i class="fa-brands fa-square-facebook"></i>
                    </a>
                    <a href="<?php echo $instagramLink; ?>"  target="_blank" nofollow>
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="<?php echo $youtubeLink; ?>"  target="_blank" nofollow>
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                    <a href="<?php echo $twitterLink; ?>"  target="_blank" nofollow>
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                </div>
            </div>
            <div class="utility-items">
                <?php
                    wp_nav_menu([            
                    'theme_location'  => 'utility-nav',
                    'container'       => 'div',
                    'container_id'    => 'util-main-menu-container',          
                    'menu_id'         => 'util-main-menu',
                    'menu_class'      => 'util-main-menu-class',          
                    ]);
                ?>
            </div>
        </div>
        <div class="logo-icon-desktop">
            <a href="/" class="logo-link" aria-label="Home"></a>
        </div>
    </nav>