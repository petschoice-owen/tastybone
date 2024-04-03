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