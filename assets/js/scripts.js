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