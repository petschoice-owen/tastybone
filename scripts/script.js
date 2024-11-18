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
            autoplaySpeed: 2000,
            dots: false,
            infinite: true,
            speed: 500,
            dots: false,
            prevArrow: false,
            nextArrow: false,
            swipe: false,
            fade: true,
            pauseOnHover: false,
            // cssEase: 'linear'
        });
    }

    if ($(".hero-home-slider").length) {
        $('.hero-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 5000,
            dots: false,
            infinite: true,
            speed: 500,
            dots: false,
            prevArrow: false,
            nextArrow: false,
            swipe: true,
            fade: true,
            pauseOnHover: false,
        });

        // var colors = ["#000000","#000000","#1c1c1b"];
        // var currentIndex = 0;

        // $(".hero-slider").on("beforeChange", function (){
        //     $(".hero-home-slider").css("background-color", colors[currentIndex++%colors.length]);
        // });
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

// filter function - select/unselect function
var filterProducts = () => {
    if ($(".flavours .flavour-name").length) {
        var accordionMain = $('#accordionFlavour');
        accordionMain.on('show.bs.collapse','.collapse', function() {
            accordionMain.find('.collapse.in').collapse('hide');
        });

        // check url if flavour is selected and no size selected
        if ( (window.location.href.indexOf("filter_flavour") > -1) && (!(window.location.href.indexOf("filter_size") > -1)) ) {
            var pathArray = window.location.href.split("/").pop();
            var originUrlArray = [];
            var pathUrlArray = [];
            var originUrl = window.location.origin;
            originUrlArray.push(originUrl);
            var pathUrl = window.location.pathname.substring(1);
            var pathUrlFormatted = pathUrl.split("/").pop();
            pathUrlArray.push(pathUrlFormatted);
            var removeFirstLast = pathArray.replace(pathUrlFormatted+'?filter_flavour=','').replace('&query_type_flavour=or','');
            var arrayFilterFlavour = removeFirstLast.split('%2C'); // array of selected flavours
            var filterSelected = removeFirstLast.split('%2C'); // array of selected flavours
            var arrayFilterSize = [];
            
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
        // check url if size is selected and no flavour selected
        else if ( (window.location.href.indexOf("filter_size") > -1) && (!(window.location.href.indexOf("filter_flavour") > -1)) ) {
            var pathArray = window.location.href.split("/").pop();
            var originUrlArray = [];
            var pathUrlArray = [];
            var originUrl = window.location.origin;
            originUrlArray.push(originUrl);
            var pathUrl = window.location.pathname.substring(1);
            var pathUrlFormatted = pathUrl.split("/").pop();
            pathUrlArray.push(pathUrlFormatted);
            var removeFirstLast = pathArray.replace(pathUrlFormatted+'?filter_size=','').replace('&query_type_size=or','');
            var arrayFilterSize = removeFirstLast.split('%2C'); // array of selected sizes
            var filterSelected = removeFirstLast.split('%2C'); // array of selected sizes
            var arrayFilterFlavour = [];
            
            $(".sizes .size-link").each(function() {
                sizeFilter = $(this).data('size');
                if (filterSelected.indexOf(sizeFilter) !== -1) {
                    $(this).addClass('size-selected');
                }
                else {
                    $(this).removeClass('size-selected');
                }
            });
        }
        // check url if flavour and size are selected 
        else if ( (window.location.href.indexOf("filter_flavour") > -1) && (window.location.href.indexOf("filter_size") > -1) ) {
            // for flavours
            var pathArrayFlavour = window.location.href.split("/").pop();
            var originUrlArrayFlavour = [];
            var pathUrlArrayFlavour = [];
            var originUrlFlavour = window.location.origin;
            originUrlArrayFlavour.push(originUrlFlavour);
            var pathUrlFlavour = window.location.pathname.substring(1);
            var pathUrlFormattedFlavour = pathUrlFlavour.split("/").pop();
            pathUrlArrayFlavour.push(pathUrlFormattedFlavour);
            var removeFirstLastFlavour = pathArrayFlavour.replace(pathUrlFormattedFlavour+'?filter_flavour=','').replace('&query_type_flavour=or','');
            var splitFlavour = removeFirstLastFlavour.split("&filter_size=")[0];
            var arrayFilterFlavour = splitFlavour.split('%2C'); // array of selected flavours
            var filterSelectedFlavour = splitFlavour.split('%2C'); // array of selected flavours
            $(".flavours .flavour-link").each(function() {
                flavourFilter = $(this).data('filter');
                if (filterSelectedFlavour.indexOf(flavourFilter) !== -1) {
                    $(this).addClass('flavour-selected');
                }
                else {
                    $(this).removeClass('flavour-selected');
                }
            });

            // for sizes
            var pathArraySize = window.location.href.split("/").pop();
            var originUrlArraySize = [];
            var pathUrlArraySize = [];
            var originUrlSize = window.location.origin;
            originUrlArraySize.push(originUrlSize);
            var pathUrlSize = window.location.pathname.substring(1);
            var pathUrlFormattedSize = pathUrlSize.split("/").pop();
            pathUrlArraySize.push(pathUrlFormattedSize);
            var removeFirstLastSize = pathArraySize.replace(pathUrlFormattedSize+'?filter_size=','').replace('&query_type_size=or','');
            var splitSize = removeFirstLastSize.replace(/^.*filter_size=/, '');
            var arrayFilterSize = splitSize.split('%2C'); // array of selected sizes
            var filterSelectedSize = splitSize.split('%2C'); // array of selected sizes
            $(".sizes .size-link").each(function() {
                sizeFilter = $(this).data('size');
                if (filterSelectedSize.indexOf(sizeFilter) !== -1) {
                    $(this).addClass('size-selected');
                }
                else {
                    $(this).removeClass('size-selected');
                }
            });
        }

        // check url if no filter
        else {
            var arrayFilter = [];
            var arrayFilterFlavour = [];
            var arrayFilterSize = [];
        }

        $(".flavours .flavour-link").each(function() {
            $(this).click(function(e) {
                e.preventDefault();
                $(this).toggleClass("flavour-selected");

                var dataFilterFlavour = $(this).data("filter");
                var idx = $.inArray(dataFilterFlavour, arrayFilterFlavour);
                if (idx == -1) {
                    arrayFilterFlavour.push(dataFilterFlavour);
                } else {
                    arrayFilterFlavour.splice(idx, 1);
                }
            });
        });

        $(".sizes .size-link").each(function() {
            $(this).click(function(e) {
                e.preventDefault();
                $(this).toggleClass("size-selected");

                var dataFilterSize = $(this).data("size");
                var idx = $.inArray(dataFilterSize, arrayFilterSize);
                if (idx == -1) {
                    arrayFilterSize.push(dataFilterSize);
                } else {
                    arrayFilterSize.splice(idx, 1);
                }
            });
        });

        // Shop Page and Category Pages filter button to self
        $("#product_filter_trigger").click(function(e) {
            e.preventDefault();
            
            if ( ($(".flavour-selected").length == 0) && ($(".size-selected").length == 0) ) {
                // window.location = window.location.origin+"/shop";
                window.location = window.location.pathname;
            }
            else if ( ($(".flavour-selected").length > 0) && ($(".size-selected").length == 0) ) {
                $("#product_filter_trigger").removeClass("disabled");
                var originUrlArray = [];
                var pathUrlArray = [];

                var originUrl = window.location.origin;
                originUrlArray.push(originUrl);

                var pathUrl = window.location.pathname;
                pathUrlArray.push(pathUrl);

                if ( $(".flavour-selected").length == 1 ) {
                    var newUrl = originUrlArray[0] + pathUrlArray[0] +'?filter_flavour='+$(".flavour-selected").data("filter");
                    window.location = newUrl;
                    // console.log('newUrl: ' + newUrl);
                }
                else { // more than 1 flavour selected
                    var selectedFilter = arrayFilterFlavour.sort().join('%2C');
                    var newUrl = originUrlArray[0] + pathUrlArray[0] +'?filter_flavour='+selectedFilter+'&query_type_flavour=or';
                    window.location = newUrl;
                    // console.log('newUrl: ' + newUrl);
                }
            }
            else if ( ($(".flavour-selected").length == 0) && ($(".size-selected").length > 0) ) {
                $("#product_filter_trigger").removeClass("disabled");

                var originUrlArray = [];
                var pathUrlArray = [];

                var originUrl = window.location.origin;
                originUrlArray.push(originUrl);

                var pathUrl = window.location.pathname;
                pathUrlArray.push(pathUrl);

                if ( $(".size-selected").length == 1 ) {
                    var newUrl = originUrlArray[0] + pathUrlArray[0] +'?filter_size='+$(".size-selected").data("size");
                    window.location = newUrl;
                    // console.log('newUrl: ' + newUrl);
                }
                else { // more than 1 size selected
                    var selectedFilter = arrayFilterSize.sort().join('%2C');
                    var newUrl = originUrlArray[0] + pathUrlArray[0] +'?filter_size='+selectedFilter+'&query_type_size=or';
                    window.location = newUrl;
                    // console.log('newUrl: ' + newUrl);
                }
            }
            else if ( ($(".flavour-selected").length > 0) && ($(".size-selected").length > 0) ) {
                $("#product_filter_trigger").removeClass("disabled");

                var originUrlArray = [];
                var pathUrlArray = [];

                var originUrl = window.location.origin;
                originUrlArray.push(originUrl);

                var pathUrl = window.location.pathname;
                pathUrlArray.push(pathUrl);

                if ( ($(".flavour-selected").length == 1) && ($(".size-selected").length == 1) ) {
                    var urlFlavour = originUrlArray[0] + pathUrlArray[0] +'?filter_flavour='+$(".flavour-selected").data("filter");
                    var urlSize = '&filter_size='+$(".size-selected").data("size");
                    var newUrl = urlFlavour + urlSize;
                    window.location = newUrl;
                    // console.log('newUrl: ' + newUrl);
                }
                else if ( ($(".flavour-selected").length > 1) && ($(".size-selected").length == 1) ) {
                    var selectedFilterFlavour = arrayFilterFlavour.sort().join('%2C');
                    var urlFlavour = originUrlArray[0] + pathUrlArray[0] +'?filter_flavour='+selectedFilterFlavour+'&query_type_flavour=or';
                    var urlSize = '&filter_size='+$(".size-selected").data("size");
                    var newUrl = urlFlavour + urlSize;
                    window.location = newUrl;
                    // console.log('newUrl: ' + newUrl);
                }
                else if ( ($(".flavour-selected").length == 1) && ($(".size-selected").length > 1) ) {
                    var urlFlavour = originUrlArray[0] + pathUrlArray[0] +'?filter_flavour='+$(".flavour-selected").data("filter");
                    var selectedFilterSize = arrayFilterSize.sort().join('%2C');
                    var urlSize = '&filter_size='+selectedFilterSize+'&query_type_size=or';
                    var newUrl = urlFlavour + urlSize;
                    window.location = newUrl;
                    // console.log('newUrl: ' + newUrl);
                }
                else if ( ($(".flavour-selected").length > 1) && ($(".size-selected").length > 1) ) {
                    var selectedFilterFlavour = arrayFilterFlavour.sort().join('%2C');
                    var urlFlavour = originUrlArray[0] + pathUrlArray[0] +'?filter_flavour='+selectedFilterFlavour+'&query_type_flavour=or';
                    var selectedFilterSize = arrayFilterSize.sort().join('%2C');
                    var urlSize = '&filter_size='+selectedFilterSize+'&query_type_size=or';
                    var newUrl = urlFlavour + urlSize;
                    window.location = newUrl;
                    // console.log('newUrl: ' + newUrl);
                }
            }
            else {
                var originUrlArray = [];
                var pathUrlArray = [];

                var originUrl = window.location.origin;
                originUrlArray.push(originUrl);

                var pathUrl = window.location.pathname;
                pathUrlArray.push(pathUrl);

                var selectedFilterFlavour = arrayFilterFlavour.sort().join('%2C');
                var urlFlavour = originUrlArray[0] + pathUrlArray[0] +'?filter_flavour='+selectedFilterFlavour+'&query_type_flavour=or';
                var selectedFilterSize = arrayFilterSize.sort().join('%2C');
                var urlSize = '&filter_size='+selectedFilterSize+'&query_type_size=or';
                var newUrl = urlFlavour + urlSize;
                window.location = newUrl;
                // console.log('newUrl: ' + newUrl);
            }
        });

        // Home Page filter button to Shop Page
        $("#product_filter_trigger_home").click(function(e) {
            e.preventDefault();
            
            if ($(".flavour-selected").length == 0) {
                window.location = $("#product_filter_trigger_home").attr("href");
            }
            else if ($(".flavour-selected").length == 1) {
                $("#product_filter_trigger_home").removeClass("disabled");

                var originUrlArray = [];
                var pathUrlArray = [];

                var originUrl = window.location.origin;
                originUrlArray.push(originUrl);

                var pathUrl = window.location.pathname;
                pathUrlArray.push(pathUrl);

                var newUrl = "/shop" +'?filter_flavour='+$(".flavour-selected").data("filter");
                window.location = newUrl;
            }
            else {
                $("#product_filter_trigger_home").removeClass("disabled");

                var originUrlArray = [];
                var pathUrlArray = [];

                var originUrl = window.location.origin;
                originUrlArray.push(originUrl);

                var pathUrl = window.location.pathname;
                pathUrlArray.push(pathUrl);

                var selectedFilter = arrayFilterFlavour.sort().join('%2C');
                var newUrl = "/shop" +'?filter_flavour='+selectedFilter+'&query_type_flavour=or';
                window.location = newUrl;
            }
        });
    }
}

// auto select filter size
var autoSelectFilteredSize = () => {
    // auto select filtered size function
    if ( $('.archive .product-filter').length ) {
        if (window.location.href.indexOf("filter_size") > -1) {
            if ( $(".size-selected").length == 1 ) { 
                var pathArray = window.location.href.split("/").pop();
                var originUrlArray = [];
                var pathUrlArray = [];
                var originUrl = window.location.origin;
                originUrlArray.push(originUrl);
                var pathUrl = window.location.pathname.substring(1);
                var pathUrlFormatted = pathUrl.split("/").pop();
                pathUrlArray.push(pathUrlFormatted);
                var removeFirstLast = pathArray.replace(pathUrlFormatted+'?filter_size=','').replace('&query_type_size=or','');
                const filterSizeParam = new URLSearchParams(removeFirstLast).get('filter_size');
                const arrayFilter = filterSizeParam ? filterSizeParam.split(',') : [];

                $('.product-items .product').each(function() {
                    let selectElement = $(this).find('#pa_size');
                    let valueToMatch = arrayFilter[0];
                    
                    selectElement.find('option').each(function() {
                        if ($(this).val() === valueToMatch) {
                            $(this).prop('selected', true);
                            selectElement.trigger('change');
                            return false;
                        }
                    });
                });
            }
            else { // more than 1 size selected
                const startIndex = window.location.href.indexOf('filter_size=') + 'filter_size='.length;
                const endIndex = window.location.href.indexOf('&', startIndex);
                const filterSizeParam = window.location.href.substring(startIndex, endIndex !== -1 ? endIndex : window.location.href.length);
                const arrayFilter = filterSizeParam.split('%2C').map(value => decodeURIComponent(value));
                
                $('.product-items .product').each(function() {
                    let selectElement = $(this).find('#pa_size');

                    for (let i = arrayFilter.length - 1; i >= 0; i--) {
                        let valueToMatch = arrayFilter[i];

                        selectElement.find('option').each(function() {
                            if ($(this).val() === valueToMatch) {
                                $(this).prop('selected', true);
                                selectElement.trigger('change');
                                return false;
                            }
                        });
                    }
                });
            }
        }
    }

    // remove disabled dropdown options
    // $('.archive .product-items .product').each(function() {
    //     var selectElement = $(this).find('#pa_size');
    //     var options = selectElement.find('option');
    
    //     setTimeout(() => {
    //         for (var i = options.length - 1; i >= 0; i--) {
    //             if (!$(options[i]).hasClass('enabled')) {
    //                 $(options[i]).remove();
    //             }
    //         }
    //     }, 100);
    // });
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
    if ($("body").hasClass("woocommerce-shop") || $("body").hasClass("tax-product_cat")) {
        $("body main").addClass("page-shop");
    }
    setTimeout(() => {
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
    
                // $(".products .product-items .product-item").each(function() {
                //     productFlavour = $(this).data('flavour');
                //     if (flavourSelected.indexOf(productFlavour) !== -1) {
                //         $(this).addClass('selected');
                //     }
                //     else {
                //         $(this).addClass('not-selected');
                //     }
                // });
    
                var numberOfProducts = $(".products .product-items .product-item").length;
                var numberOfProductsHidden = $(".products .product-items .product-item.not-selected").length;
    
                if (numberOfProducts == numberOfProductsHidden) {
                    $(".products .product-items .no-product").removeClass("d-none");
                }
            }
    
            $(".products .product-items").removeClass("opacity-hide");
            $(".products .product-items").addClass("opacity-show");

            setTimeout(() => {
                if ($(".products").hasClass("opacity-0")) {
                    $(".products").removeClass("opacity-0"); 
                } 
            }, 300);           
        }
    }, 100);
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
    else if ($("body").hasClass("single-product")) {
        // var productCategory = $(".hero-inner-product").data("category");
        // var primaryProductCategory = $("#product_breadcrumbs .breadcrumb_last").parent().find("a").text().toLowerCase();

        var urlProduct = window.location.pathname;
        var shopAndCategory = urlProduct.substring(0, urlProduct.lastIndexOf('/'));
        var mainCategory = shopAndCategory.split("/");
        var primaryProductCategory = mainCategory[mainCategory.length - 1];

        $(".hero-inner-product").attr("data-primarycategory",primaryProductCategory);

        $(".top-navigation .navbar-nav li a").each(function() {
            var menuText = $(this).text().toLowerCase();

            if (menuText == "shop") {
                $(this).parent().addClass("current-menu-item");
            }
        });

        $(".product-categories .categories li a").each(function() {
            var categoryName = $(this).text().toLowerCase();
            $(this).attr("data-category",categoryName);

            // if ($(this).data("category") == productCategory) {
            //     $(this).addClass("active");
            // }
            if ($(this).data("category") == primaryProductCategory) {
                $(this).addClass("active");
            }
        });
    }
}

// Category Banners
var categoryBanner = () => {
    // if Category Page
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

    // if Single Product Page
    if ($(".single-product .category-banners .banner-detail").length) {
        $(".banner-detail").each(function() {
            if ($(this).data("identifier") == $(".hero-inner-product").data("primarycategory")) {
                var categoryName = $(this).data("name");
                var categoryBanner = $(this).data("banner");

                $(".hero-inner-product").css("background-image","url("+categoryBanner+")");
                $(".page-title-product").text(categoryName);
            }
        })
    }
}

// Show Product Filter and Product Category section
var sectionCategoryFilter = () => {
    if ($(".product-categories").length) {
        $(".product-categories").removeClass("d-none");
    }

    if ($(".product-filter").length) {
        $(".product-filter").removeClass("d-none");
    }
}

// product quantity function
var productQuantity = () => {
    if ($(".qty-input").length) {
        $('.increment-btn').click(function (e) {
            e.preventDefault();
        
            var inc_value = $(this).closest('.product-quantity').find('.qty-input').val();
            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;
            
            if (value < 99) {
                value++;
                $(this).closest('.product-quantity').find('.qty-input').val(value);

                // var newQuantity = $("#qty_display").val();                
                var newQuantity = $(this).closest('.product-quantity').find('.qty-input').val();

                $(this).closest(".variation-quantity").find(".woocommerce-quantity .quantity .input-text.qty.text").val(newQuantity);
            }
        });
        
        $('.decrement-btn').click(function (e) {
            e.preventDefault();
        
            var dec_value = $(this).closest('.product-quantity').find('.qty-input').val();
            var value = parseInt(dec_value, 10);
            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                value--;
                $(this).closest('.product-quantity').find('.qty-input').val(value);

                // var newQuantity = $("#qty_display").val();                
                var newQuantity = $(this).closest('.product-quantity').find('.qty-input').val();

                // $(this).closest(".variation-quantity")(".quantity .input-text.qty.text").val(newQuantity);
                $(this).closest(".variation-quantity").find(".woocommerce-quantity .quantity .input-text.qty.text").val(newQuantity);
            }
        });
    }
}

// Single Product Page functions 
var singleProduct = () => {
    // identify flavour
    if ( $(".available-flavours").length ) {
        var availableFlavours = [];

        if ($(".related-wrapper .available-flavours li").length) {
            $(".related-wrapper .available-flavours li").each(function() {
                var dataFlavour = $(this).data("flavour");
                availableFlavours.push(dataFlavour);
            })
        }

        $(".related-wrapper .flavours .flavour-item a").each(function() {
            var dataFilter = $(this).data("filter");

            if ( availableFlavours.includes(dataFilter) ) {
                $(this).parent().removeClass("d-none");
            }
        })

        if ( $(".related-wrapper .flavours .flavour-item").length ) {
            $(".related-wrapper .flavours .flavour-item a").each(function() {
                var slug = $(this).data("filter");
                var newUrl = "/shop?filter_flavour=" + slug + "&query_type_flavour=or";

                $(this).attr("href", newUrl);
                $(this).click(function() {
                    $(this).removeClass("flavour-selected");
                    window.location = newUrl;
                });
            })
        }
    }
    
    // if ($(".woocommerce-product-attributes-item__label").length) {
    //     var relatedFlavours = [];

    //     if ($(".related-wrapper .product-item").length) {
    //         $(".related-wrapper .product-item").each(function() {
    //             var dataFlavour = $(this).data("flavour");
    //             relatedFlavours.push(dataFlavour);
    //         })
    //     }

    //     $(".woocommerce-product-attributes-item__label").each(function() {
    //         var flavourAttr = $(this).text().toLowerCase();
    //         if (flavourAttr == "flavour") {
    //             var flavourName = $(this).closest(".woocommerce-product-attributes-item").find(".woocommerce-product-attributes-item__value p").text();
    //             var flavourNoSpecial = flavourName.replace(/[^a-zA-Z ]/g, " ");
    //             var flavourSmallCaps = flavourNoSpecial.replace(/\s\s+/g, " ");
    //             var flavour = flavourSmallCaps.replace(/\s/g , "-").toLowerCase();
                
    //             relatedFlavours.push(flavour);

    //             if ($(".single-product-flavour").length) {
    //                 $(".single-product-flavour").attr("data-flavour", flavour);

    //                 $(".related-wrapper .flavours .flavour-item a").each(function() {
    //                     var dataFilter = $(this).data("filter");

    //                     if ( relatedFlavours.includes(dataFilter) ) {
    //                         $(this).parent().removeClass("d-none");
    //                     }
    //                 })
    //             }
    //         }
    //     })

    //     if ( $(".related-wrapper .flavours .flavour-item").length ) {
    //         $(".related-wrapper .flavours .flavour-item a").each(function() {
    //             var slug = $(this).data("filter");
    //             var newUrl = "/shop?filter_flavour=" + slug + "&query_type_flavour=or";

    //             $(this).attr("href", newUrl);
    //             $(this).click(function() {
    //                 $(this).removeClass("flavour-selected");
    //                 window.location = newUrl;
    //             });
    //         })
    //     }
    // }

    // identify sizes
    /*
        if ($(".heading-thumbnail-size").length) {
            if ($(".summary.entry-summary th.label label").text() === "Size") {
                $(".summary.entry-summary td.value #pa_size option").each(function() {
                    var sizeContainer = $(".heading-product-sizes .heading-thumbnail-size");

                    if ($(this).val() === "toy-dog") {
                        sizeContainer.find(".size-detail[data-size=toy]").removeClass("d-none");
                    }
                    if ($(this).val() === "small-dog") {
                        sizeContainer.find(".size-detail[data-size=small]").removeClass("d-none");
                    }
                    if ($(this).val() === "large-dog") {
                        sizeContainer.find(".size-detail[data-size=large]").removeClass("d-none");
                    }
                    if ($(this).val() === "giant-dog") {
                        sizeContainer.find(".size-detail[data-size=giant]").removeClass("d-none");
                    }
                });
            }
        }
    */


    // Single Product - hide Price range if Single Variation only
    setTimeout(() => {
        if ( $(".products .product-item .single_variation_wrap .woocommerce-variation-price").length ) {
            $(".products .product-item .single_variation_wrap .woocommerce-variation-price").each(function() {
                if ( !$(this).find(".price").length ) {
                    $(this).closest(".product-item").addClass("product-type-custom");
                    $(this).closest(".product-item").find(".woocommerce-loop-product__link .price").addClass("d-block");
                }
            })
        }
    }, 100);

    if ( $(".single-product .product-type-variable .woocommerce-variation-price").length ) {
        if ( !$(".single-product .product-type-variable .woocommerce-variation-price .price").length ) {
            $(".single-product .product-type-variable").addClass("product-type-custom");
        }
    }
}

// Single Product - Variation - disabled products
var disableProduct = () => {
    if ($(".woocommerce .container .variations_form select").length) {
        $(".woocommerce .container .product").each(function() {
            $(this).find(".variations_form .value select").click(function() {
                $(this).find("option").each(function() {
                   if (!$(this).hasClass("enabled")) {
                       $(this).attr("disabled", "disabled");
                   }
                });
            })
        })
    }
}

// Recycling Info Page - number of items (How to recycle sections)
var numberOfItems = () => {
    if ( $('.recycling-plastic .items').length ) {
        var items = $('.recycling-plastic .items .item').length

        $('.recycling-plastic .items').addClass('items-'+items);
    }
    
    if ( $('.recycling-cardboard .items').length ) {
        var items = $('.recycling-cardboard .items .item').length

        $('.recycling-cardboard .items').addClass('items-'+items);
    }
}

// Offers Product Category - highlight
var productCategoryOffers = () => {
    if ( $('.product-categories .categories').length ) {
        var searchText = "Offers";
        var result = $("ul li:contains('" + searchText + "')"); // Use :contains selector to find the li with specific text
        
        if (result.length > 0) {       
            result.addClass('offers');
        }
    }
}

// Size Guide - Size Column
var sizeGuideColumns = () => {
    if ( $('.chew-size .bone-sizes .size-item').length ) {
        var columns = $('.chew-size .bone-sizes .size-item').length;
        var columnClass = 'column-' + columns;

        $('.chew-size .bone-sizes').addClass(columnClass);
    }
}

// var headerBones = () => {
//     if ($('.navbar-nav .nav-item-bones').length) {
//         $('<div class="bones-wrapper"><div class="bones bones-top-right"><img src="/wp-content/uploads/2024/08/bone-blue.png" alt="bone"></div><div class="bones bones-bottom-left"><img src="/wp-content/uploads/2024/08/bone-red.png" alt="bone"></div></div>').insertAfter('.nav-item-bones a');
//     }
// }

var ajaxAddToCart = () => {
    $('.products .js-shop-atc, .single-product .product-type-simple form.cart').on('submit', function(e) {
        e.preventDefault();
        
        var form = $(this);
        var productName = form.closest('.product').find('.woocommerce-loop-product__title').text();
        var quantity = form.find('input[name="quantity"]').val();
        var product_id = form.find('input[name="product_id"]').val();
        var button = form.find('button[type="submit"]');
        if($('.single-product .product-type-simple').length > 0) {
            productName = form.closest('.product').find('.product_title').text();
            product_id = form.find('button[name="add-to-cart"]').attr('value');
        }
        button.addClass('loading');
        // Make AJAX request to add to cart
        $.ajax({
            url: wc_add_to_cart_params.ajax_url,
            type: 'POST',
            data: {
                action: 'woocommerce_add_to_cart',
                product_id: product_id,
                quantity: quantity
            },
            success: function(response) {
                button.removeClass('loading');
                $('.popup-atc-message .js-product-name').text(productName);
                $('.popup-atc-message').fadeIn('slow');
                setTimeout(function() { 
                    $('.popup-atc-message').fadeOut('slow');
                }, 3000);
                if (response.error && response.product_url) {
                    window.location = response.product_url;
                } else {
                    $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, button]);
                }
            }
        });
    });

    $('.products .js-shop-atc-variable, .single-product .variations_form').on('submit', function(e) {
        e.preventDefault();
        
        var form = $(this);
        var productName = form.closest('.product').find('.woocommerce-loop-product__title').text();
        var quantity = form.find('input[name="quantity"]').val();
        var product_id = form.find('input[name="product_id"]').val();
        var variation_id = form.find('input[name="variation_id"]').val();
        var button = form.find('button[type="submit"]');
        if($('.single-product .variations_form').length > 0) {
            productName = form.closest('.product').find('.product_title').text();
        }
        button.addClass('loading');
        // Make AJAX request to add to cart
        $.ajax({
            url: wc_atc_params.wc_ajax_url,
            type: 'POST',
            data: {
                action: 'tb_ajax_add_to_cart',
                product_id: product_id,
                variation_id: variation_id,
                quantity: quantity,
                nonce: wc_atc_params.wc_add_to_cart_nonce
            },
            success: function(response) {
                button.removeClass('loading');
                $('.popup-atc-message .js-product-name').text(productName);
                $('.popup-atc-message').fadeIn('slow');
                setTimeout(function() { 
                    $('.popup-atc-message').fadeOut('slow');
                }, 3000);
                if (response.success) {
                    $(document.body).trigger('added_to_cart', [response.data.fragments, response.data.cart_hash, button]);
                } else {
                   
                }
            }
        });
    });
}

  
// initialize the functions
windowScrolled();
  
$(document).ready(function() {
    customSlider();
    filterProducts();
    pageNav();
    customAccordion();
    filterShop();
    activeCategory();
    categoryBanner();
    productQuantity();
    numberOfItems();
    productCategoryOffers();
    sizeGuideColumns();
    ajaxAddToCart();
});
  
// $(window).resize(function() { });

window.onload = function() {
    sectionCategoryFilter();
    singleProduct();
    disableProduct();
    autoSelectFilteredSize();
    // headerBones();
}
  