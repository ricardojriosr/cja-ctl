var gForm = document.querySelector("#gform_wrapper_1");
var gContainer = document.querySelector("#form-container-inside");
var gContainer2 = document.querySelector("#form-container-inside-2");

if (gForm && gContainer) {
    gContainer.innerHTML += gForm.innerHTML;
    gForm.innerHTML = ""; 
}
if (gForm && gContainer2) {
    gContainer2.innerHTML += gForm.innerHTML;
    gForm.innerHTML = ""; 
}

function faqShowThis(elem) {
    var countElem = elem.dataset.count;    
    var faqToShow = document.querySelector("#faq-caption-" + countElem);    
    var faqLink = document.querySelector("#faq-link-" + countElem);    
    faqToShow.classList.toggle("display-faq");
    faqLink.classList.toggle("reverse");
}

function goToURL(theURL) {
    window.location.href = theURL;
}

function showAllBlogs() {
    var allPosts = document.querySelectorAll(".hide-post");
    var loadMore = document.querySelector(".load-more");
    [].forEach.call(allPosts, function(thePost) {
        thePost.style.display = 'flex';
    });
    loadMore.style.display = 'none';
}

// var allPAItems = document.querySelectorAll(".to-hover");

// if (allPAItems) {
//     console.log('FLAG');
//     [].forEach.call(allPAItems, function(pAitem) {
//         pAitem.addEventListener("mouseover", function(e) {   
//             var prevID = '#' + this.id;            
//             var thisID = document.querySelector(prevID);  
//             console.log(prevID);
//             console.log(thisID);
//             thisID.classList.toggle("hovered");
//             // [].forEach.call(allPAItems, function(pAitem2) {
//             //     if (pAitem2.id != e.target.id) {
//             //         document.querySelector("#" + pAitem2.id).classList.add("no-hovered");
//             //     }
//             // }); 
//             thisID.addEventListener("mouseout", function(e) {  
//                 thisID.classList.remove("hovered");
//                 [].forEach.call(allPAItems, function(pAitem3) {
//                     document.querySelector("#" + pAitem3.id).classList.remove("no-hovered");
//                     document.querySelector("#" + pAitem3.id).classList.remove("hovered");
//                 });
//             });        
            
//         });    
//     });
// }
