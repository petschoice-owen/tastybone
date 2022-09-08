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

// flavours - select/unselect function
var flavours = () => {
    if ($(".flavours .flavour-name").length) {
        // check url if has filter
        // if (window.location.href.indexOf("filter_flavour") > -1) {
        //     var pathArray = window.location.href.split("/").pop();
        //     var removeFirstLast = pathArray.replace('shop?filter_flavour=','').replace('&query_type_flavour=or','');
        //     var arrayFilter = removeFirstLast.split('%2C'); // array of selected flavours
        //     var filterSelected = removeFirstLast.split('%2C'); // array of selected flavours
        //     $(".flavours .flavour-link").each(function() {
        //         flavourFilter = $(this).data('filter');
        //         if (filterSelected.indexOf(flavourFilter) !== -1) {
        //             $(this).addClass('flavour-selected');
        //         }
        //         else {
        //             $(this).removeClass('flavour-selected');
        //         }
        //     });
        // }
        if (window.location.href.indexOf("filter_flavour") > -1) {
            // var pathArray = window.location.href.split("/").pop();
            // var removeFirstLast = pathArray.replace('shop?filter_flavour=','').replace('&query_type_flavour=or','');
            // var arrayFilter = removeFirstLast.split('%2C'); // array of selected flavours
            // var filterSelected = removeFirstLast.split('%2C'); // array of selected flavours

            var pathArray = window.location.href.split("/").pop();
            var originUrlArray = [];
            var pathUrlArray = [];
            var originUrl = window.location.origin;
            originUrlArray.push(originUrl);
            var pathUrl = window.location.pathname.substring(1);
            var pathUrlFormatted = pathUrl.split("/").pop();
            pathUrlArray.push(pathUrlFormatted);
            var removeFirstLast = pathArray.replace(pathUrlFormatted+'?filter_flavour=','').replace('&query_type_flavour=or','');
            
            var arrayFilter = removeFirstLast.split('%2C'); // array of selected flavours
            var filterSelected = removeFirstLast.split('%2C'); // array of selected flavours
            
            $(".flavours .flavour-link").each(function() {
                flavourFilter = $(this).data('filter');
                if (filterSelected.indexOf(flavourFilter) !== -1) {
                    $(this).addClass('flavour-selected');
                }
                else {
                    $(this).removeClass('flavour-selected');
                }
            });
        }
        // check url if no filter
        else {
            var arrayFilter = [];
        }

        $(".flavours .flavour-link").each(function() {
            $(this).click(function(e) {
                e.preventDefault();
                $(this).toggleClass("flavour-selected");

                var dataFilter = $(this).data("filter");
                var idx = $.inArray(dataFilter, arrayFilter);
                if (idx == -1) {
                    arrayFilter.push(dataFilter);
                } else {
                    arrayFilter.splice(idx, 1);
                }
            });
        });

        $("#product_filter_trigger").click(function(e) {
            e.preventDefault();
            
            if ($(".flavour-selected").length == 0) {
                // window.location = window.location.origin+"/shop";
                window.location = window.location.pathname;
            }
            else if ($(".flavour-selected").length == 1) {
                $("#product_filter_trigger").removeClass("disabled");
                // var currentUrl = window.location.href;
                // var updatedUrl = currentUrl.substring(0,currentUrl.lastIndexOf("/"));
                // var newUrl = updatedUrl+'/shop?filter_flavour='+$(".flavour-selected").data("filter")+'&query_type_flavour=or';

                var originUrlArray = [];
                var pathUrlArray = [];

                var originUrl = window.location.origin;
                originUrlArray.push(originUrl);
                console.log(originUrlArray[0]);

                var pathUrl = window.location.pathname;
                pathUrlArray.push(pathUrl);
                console.log(pathUrlArray[0]);

                var newUrl = originUrlArray[0] + pathUrlArray[0] +'?filter_flavour='+$(".flavour-selected").data("filter")+'&query_type_flavour=or';
                window.location = newUrl;
                // console.log(newUrl);
            }
            else {
                // var currentUrl = window.location.href;
                // var updatedUrl = currentUrl.substring(0,currentUrl.lastIndexOf("/"));

                var originUrlArray = [];
                var pathUrlArray = [];

                var originUrl = window.location.origin;
                originUrlArray.push(originUrl);

                var pathUrl = window.location.pathname;
                pathUrlArray.push(pathUrl);

                var selectedFilter = arrayFilter.sort().join('%2C');
                var newUrl = originUrlArray[0] + pathUrlArray[0] +'?filter_flavour='+selectedFilter+'&query_type_flavour=or';
                window.location = newUrl;
                // console.log(newUrl);
            }
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

// display products depending on the url
var filterShop = () => {
    // if ($("body").hasClass("woocommerce-shop")) {
    if ($("main").hasClass("page-shop")) {
        $(".top-navigation .navbar-nav li a").each(function() {
            var menuText = $(this).text().toLowerCase();

            if (menuText == "shop") {
                $(this).parent().addClass("current-menu-item");
            }
        });

        if (window.location.href.indexOf("?filter_flavour") > -1) {
            // var pathArray = window.location.href.split("/").pop();
            // var removeFirstLast = pathArray.replace('shop?filter_flavour=','').replace('&query_type_flavour=or','');

            var pathArray = window.location.href.split("/").pop();
            var originUrlArray = [];
            var pathUrlArray = [];
            var originUrl = window.location.origin;
            originUrlArray.push(originUrl);
            var pathUrl = window.location.pathname.substring(1);
            var pathUrlFormatted = pathUrl.split("/").pop();
            pathUrlArray.push(pathUrlFormatted);
            var removeFirstLast = pathArray.replace(pathUrlFormatted+'?filter_flavour=','').replace('&query_type_flavour=or','');
            var flavourSelected = removeFirstLast.split('%2C'); // array of selected flavours

            $(".products .product-items .product-item").each(function() {
                productFlavour = $(this).data('flavour');
                if (flavourSelected.indexOf(productFlavour) !== -1) {
                    $(this).addClass('selected');
                }
                else {
                    $(this).addClass('not-selected');
                }
            });

            var numberOfProducts = $(".products .product-items .product-item").length;
            var numberOfProductsHidden = $(".products .product-items .product-item.not-selected").length;

            if (numberOfProducts == numberOfProductsHidden) {
                $(".products .product-items .no-product").removeClass("d-none");
            }
        }

        $(".products .product-items").removeClass("opacity-hide");
        $(".products .product-items").addClass("opacity-show");   
    }
}

// active category - highlight
var activeCategory = () => {
    if ($("body").hasClass("woocommerce-shop")) {
        $(".product-categories .categories li:first-child a").addClass("active");
    }
    else if ($("body").hasClass("tax-product_cat")) {
        // var pageCategory = $(".product-categories").data("category").toLowerCase();
        var pageArchiveCategory = $(".product-categories").data("archive");
        // $(".product-categories").attr("data-category",pageArchiveCategory);

        $(".product-categories .categories li a").each(function() {
            var categoryName = $(this).text().toLowerCase();
            $(this).attr("data-category",categoryName);

            if ($(this).data("category") == pageArchiveCategory) {
                $(this).addClass("active");
            }
        });
    }
}

// Category Banners
var categoryBanner = () => {
    if ($(".tax-product_cat .category-banners .banner-detail").length) {
        $(".banner-detail").each(function() {
            if ($(this).data("identifier") == $(".product-categories").data("archive")) {
                var categoryName = $(this).data("name");
                var categoryBanner = $(this).data("banner");

                $(".hero-inner-category").css("background-image","url("+categoryBanner+")");
                $(".page-title-category").text(categoryName);
            }
        })
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
    // stockists();
    filterShop();
    activeCategory();
    categoryBanner();
});
  
$(window).resize(function() {
    // mainAutoPadding();
});

window.onload = function() {
    // stockists();
}
  