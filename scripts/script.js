var $ = jQuery;

// top navigation function
var windowScrolled = () => {
    function checkScroll() {
        if ($(window).scrollTop() >= 50) {
            $(".top-navigation").addClass("scrolled");
        } else {
            $(".top-navigation").removeClass("scrolled");
        }
    }

    $(document).ready(function() {
        checkScroll();
        $(window).scroll(checkScroll);
    });
}
  
// slider function
var customSlider = () => {
    if ($(".custom-slider").length) {
        $('.custom-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            dots: false,
            infinite: true,
            speed: 700,
            dots: false,
            prevArrow: false,
            nextArrow: false,
            swipe: false,
            fade: true,
            // cssEase: 'linear'
        });
    }  
}
  
// main element - auto padding-top
var mainAutoPadding = () => {
    if ($(".top-navigation")) {
        var topNavHeight = $(".top-navigation").height();
    
        $(".top-navigation + main").css("padding-top", topNavHeight+"px");
        
        var footerHeight = $(".footer-section").outerHeight();
        var heroHeight = topNavHeight + footerHeight;
        
        $(".hero").css("height", "calc(100vh - " + heroHeight + "px)");
    
        var contentHeight = $(".hero .wrapper").outerHeight();
        var heroHeight = contentHeight + 200;
        var heroHeightMobile = contentHeight + 100;
    
        if ($(window).width() <= 767) {
            $(".hero").css("min-height", heroHeightMobile);
        }
        else {
            $(".hero").css("min-height", heroHeight);
        }
    }
}

// flavours functions
var flavours = () => {
    if ($(".flavours .flavour-name").length) {
        $(".flavours .flavour-link").each(function() {
            $(this).click(function(e) {
                e.preventDefault();
                $(this).toggleClass("flavour-selected");
            });
        });
    }
}

// about page functions
var pageNav = () => {
    if ($("section.page-navigation").length) {
        $(".page-navigation a").each(function() {
            var pageTitle = $(this).text().toLowerCase();
            var pageTitleFirst = pageTitle.split(" ")[0];
            
            if (window.location.href.indexOf(pageTitleFirst) > -1) {
                $(".top-navigation .navbar-nav a").each(function() {
                    var navTitle = $(this).text();
                    var navTitleFirst = navTitle.split(" ")[0];

                    if (navTitleFirst == "About") {
                        $(this).parent().addClass("active");
                    }
                });
            }
        });
    }
}

// accordion functions
var customAccordion = () => {
    if ($("#accordion_custom").length) {
        $("#accordion_custom .accordion-item:first-child button").removeClass("collapsed").attr("aria-expanded", "true");
        $("#accordion_custom .accordion-item:first-child .accordion-collapse").addClass("show");
    }
}

// stockists function
var stockists = () => {
    if ($(".page-stockists").length) {
        $("#search_input").on("keyup", function() {
            if ($(this).val().length >= 3) {
                $("#search_stockist").removeClass("btn-not-clickable");

                var input, filter, ul, li, span, i, txtValue;
                input = document.getElementById("search_input");
                filter = input.value.toUpperCase();
                ul = document.getElementById("search_results_items");
                li = ul.getElementsByTagName("li");
        
                for (i = 0; i < li.length; i++) {
                    span = li[i].getElementsByTagName("span")[0];
                    txtValue = span.textContent || span.innerText;
        
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        li[i].style.display = "";
                    } else {
                        li[i].style.display = "none";
                    }
                }

                if ($(this).val()) {
                    // $("#search_text").css("display","none");
                    $("#search_results").removeClass("d-none").css("display", "block");

                    if ($("#search_results_items .item").length === $("#search_results_items .item[style='display: none;']").length ) {
                        $("#search_results_items").css("display","none");
                        $("#search_results_none").removeClass("d-none").css("display", "block");
                    }

                    else {
                        $("#search_results_none").css("display","none");
                        $("#search_results_items").removeClass("d-none").css("display", "block");
                    }
                }

                else {
                    $("#search_results_items").css("display","none");
                    $("#search_results_none").css("display","none");
                    // $("#search_text").css("display", "block");

                    if ($(this).val() == "") {
                        $("#search_results_items").css("display","none");
                    }
                }
            }

            else if ($(this).val() === "") {
                $("#search_results").css("display","none");
            }

            else {
                $("#search_stockist").addClass("btn-not-clickable");
            }
        });

        $("#search_results_items .contact .phone").each(function(){
            var formatNumber = $(this).text().replace(/\s/g, '').replace(/[^a-zA-Z0-9]/g, '');
            $(this).attr("href","tel:"+formatNumber);
        });

        $(document).keypress(function(event) {
            if (event.which == '13') {
                event.preventDefault();
            }
        });

        // $("#search_stockist").on('click', function(e) {
        //     e.preventDefault();
        // });
    }
}
  
// initialize the functions
windowScrolled();
  
$(document).ready(function() {
    customSlider();
    // mainAutoPadding();
    flavours();
    pageNav();
    customAccordion();
    stockists();
});
  
$(window).resize(function() {
    // mainAutoPadding();
});

window.onload = function() {
    stockists();
}
  