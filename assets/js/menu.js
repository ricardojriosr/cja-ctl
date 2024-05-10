// MENUS
var menuA = document.querySelector("#menu-nav-a");
var menuB = document.querySelector("#menu-nav-b");
var menuC = document.querySelector("#menu-nav-c");

// MENU A
if (menuA) {
    var mobileMenuBtn           = document.querySelector("#menu-mobile-burguer");
    var mobileMenu              = document.querySelector("#main-menu-container");
    var mobileIconBurguer       = document.querySelector("#icon-burguer");
    var mobileIconClose         = document.querySelector("#icon-close");
    var menuContainer           = document.querySelector("#menu-nav-a");
    var caretArrows             = document.querySelectorAll(".menu-mobile-option");
    var menuDesktopContainer    = document.querySelector("#menu-nav"); 
    var theBody                 = document.querySelector("#the-body");

    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener("click", function(e) {
            mobileMenu.classList.toggle("is-visible");     
            theBody.classList.toggle("is-fixed");   
            menuContainer.classList.toggle("is-visible-container");
        });
    }

    window.onscroll = function(e) {
        var limitScroll = 50;
        if (document.body.scrollTop > limitScroll || document.documentElement.scrollTop > limitScroll) {
            menuContainer.classList.add('is-scroll');
            menuDesktopContainer.classList.add('is-scroll');
        } else {
            menuContainer.classList.remove('is-scroll');
            menuDesktopContainer.classList.remove('is-scroll');
        }
    };

    if (caretArrows) {
        [].forEach.call(caretArrows, function(caret) {
            caret.addEventListener("click", function(e) {
                if (e.target.parentNode.children[2].style.display == 'flex') {
                    e.target.parentNode.children[2].style.display = 'none';
                } else {
                    e.target.parentNode.children[2].style.display = 'flex';
                }            
                if (caret.classList.contains('fa-caret-down')) {
                    caret.classList.remove('fa-caret-down');
                    caret.classList.add('fa-caret-up');
                } else {
                    caret.classList.add('fa-caret-down');
                    caret.classList.remove('fa-caret-up');
                }            
            });
        });
    }
}
// END MENU A

// MENU B
if (menuB) {
    var menuBtn         = document.querySelector("#mobile-burguer");
    var menuItems       = document.querySelector(".menu-items");
    var toggleBurguer   = document.querySelector("#toggle-burguer");
    var subMenuMobile   = document.querySelectorAll(".menu-mobile-option");
    var theBody         = document.querySelector("#the-body");

    if (menuBtn) {
        menuBtn.addEventListener("click", function(e) {
            menuItems.classList.toggle("is-visible");
            theBody.classList.toggle("is-fixed");
            if (toggleBurguer.classList.contains('fa-bars')) {
                toggleBurguer.classList.remove('fa-bars');
                toggleBurguer.classList.add('fa-close');
            } else {
                toggleBurguer.classList.add('fa-bars');
                toggleBurguer.classList.remove('fa-close');
            }
        })
    }

    if (subMenuMobile) {
        [].forEach.call(subMenuMobile, function(caretOption) {
            caretOption.addEventListener("click", function(e) {
                e.preventDefault();
                var theSubMenu = e.target.parentNode.children[2];
                theSubMenu.classList.toggle("is-visible");
                var caret = caretOption;
                if (caret.classList.contains('fa-caret-down')) {
                    caret.classList.remove('fa-caret-down');
                    caret.classList.add('fa-caret-up');
                } else {
                    caret.classList.add('fa-caret-down');
                    caret.classList.remove('fa-caret-up');
                }
            });
            
        });
    }
}
// END MENU B

// MENU C
if (menuC) {
    var btnMenu = document.querySelector("#burguer-menu-c");
    var theMenu = document.querySelector(".absolute-menu");
    var theBody = document.querySelector("#the-body");
    var subMenuMobile = document.querySelectorAll(".menu-mobile-option")
    var toggleBurguer = document.querySelector("#toggle-burguer");

    btnMenu.addEventListener("click", function(e) {
        theMenu.classList.toggle("is-visible");
        theBody.classList.toggle("is-fixed");
        if (toggleBurguer.classList.contains('fa-bars')) {
            toggleBurguer.classList.remove('fa-bars');
            toggleBurguer.classList.add('fa-close');
        } else {
            toggleBurguer.classList.add('fa-bars');
            toggleBurguer.classList.remove('fa-close');
        }
    });

    if (subMenuMobile) {
        [].forEach.call(subMenuMobile, function(caretOption) {
            caretOption.addEventListener("click", function(e) {
                e.preventDefault();      
                e.target.parentNode.classList.toggle("is-deployed");
                var theSubMenu = e.target.parentNode.children[2];
                theSubMenu.classList.toggle("is-visible");
                var caret = caretOption;
                if (caret.classList.contains('fa-caret-down')) {
                    caret.classList.remove('fa-caret-down');
                    caret.classList.add('fa-caret-up');
                } else {
                    caret.classList.add('fa-caret-down');
                    caret.classList.remove('fa-caret-up');
                }
            });
            
        });
    }
}
// END MENU C


//! Put the class name that you want to use
// Class name that will be added to the navbar element in the "scrolled" state
const SCROLLED_STATE_CLASS = "scrolled"

//! Use your own ID or selector
// The id of navigation bar HTML element
const NAVBAR_ID = "menu-nav-b"

// Get the navigation bar element
const navbar = document.getElementById(NAVBAR_ID)

// OnScroll event handler
const onScroll = () => {

  // Get scroll value
  const scroll = document.documentElement.scrollTop

  // If scroll value is more than 0 - means the page is scrolled, add or remove class based on that
  if (scroll > 0) {
    navbar.classList.add(SCROLLED_STATE_CLASS);
  } else {
    navbar.classList.remove(SCROLLED_STATE_CLASS)
  }
}

// Use the function
window.addEventListener('scroll', onScroll)