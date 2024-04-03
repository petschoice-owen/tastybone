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
            var arrayFilter = removeFirstLast.split('%2C'); // array of selected sizes
            var filterSelected = removeFirstLast.split('%2C'); // array of selected sizes
            
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

        // $(".flavours .flavour-link").each(function() {
        //     $(this).click(function(e) {
        //         e.preventDefault();
        //         $(this).toggleClass("flavour-selected");

        //         var dataFilter = $(this).data("filter");
        //         var idx = $.inArray(dataFilter, arrayFilter);
        //         if (idx == -1) {
        //             arrayFilter.push(dataFilter);
        //         } else {
        //             arrayFilter.splice(idx, 1);
        //         }
        //     });
        // });

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
            
            // if ($(".flavour-selected").length == 0) {
            if ( ($(".flavour-selected").length == 0) && ($(".size-selected").length == 0) ) {
                // window.location = window.location.origin+"/shop";
                // uncomment function below to redirect
                // window.location = window.location.pathname;
                console.log("1. if = no selected flavour and size");
            }
            // else if ($(".flavour-selected").length == 1) {
            else if ( ($(".flavour-selected").length > 0) && ($(".size-selected").length == 0) ) {
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

                if ( $(".flavour-selected").length == 1 ) {
                    var newUrl = originUrlArray[0] + pathUrlArray[0] +'?filter_flavour='+$(".flavour-selected").data("filter")+'&query_type_flavour=or';
                    // uncomment function below to redirect
                    // window.location = newUrl;
                    console.log(newUrl);
                    console.log("2. else if = selected flavour (1) but no selected size");
                }
                else { // more than 1 flavour selected
                    var selectedFilter = arrayFilter.sort().join('%2C');
                    var newUrl = originUrlArray[0] + pathUrlArray[0] +'?filter_flavour='+selectedFilter+'&query_type_flavour=or';
                    // uncomment function below to redirect
                    // window.location = newUrl;
                    console.log(newUrl);
                    console.log("2. else if = selected flavour (2+) but no selected size");
                }
            }
            else if ( ($(".size-selected").length > 0) && ($(".flavour-selected").length == 0) ) {
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

                if ( $(".size-selected").length == 1 ) {
                    // var newUrl = originUrlArray[0] + pathUrlArray[0] +'?filter_flavour='+$(".flavour-selected").data("filter")+'&query_type_flavour=or';
                    var newUrl = originUrlArray[0] + pathUrlArray[0] +'?filter_size='+$(".size-selected").data("size")+'&query_type_size=or';
                    // uncomment function below to redirect
                    // window.location = newUrl;
                    console.log(newUrl);
                    console.log("3. else if = selected size (1) but no selected flavour");
                }
                else { // more than 1 size selected
                    var selectedFilter = arrayFilter.sort().join('%2C');
                    var newUrl = originUrlArray[0] + pathUrlArray[0] +'?filter_size='+selectedFilter+'&query_type_size=or';
                    // uncomment function below to redirect
                    // window.location = newUrl;
                    console.log(newUrl);
                    console.log("3. else if = selected size (2+) but no selected flavour");
                }
            }
            else if ( ($(".flavour-selected").length > 0) && ($(".size-selected").length > 0) ) {
                $("#product_filter_trigger").removeClass("disabled");

                if ( ($(".flavour-selected").length == 1) && ($(".size-selected").length == 1) ) {
                
                    console.log("4. else if = selected flavour (1) and size (1)");
                }
                else if ( ($(".flavour-selected").length > 1) && ($(".size-selected").length == 1) ) {
                    
                    console.log("4. else if = selected flavour (2+) and size (1)");
                }
                else if ( ($(".flavour-selected").length == 1) && ($(".size-selected").length > 1) ) {

                    console.log("4. else if = selected flavour (1) and size (2+)");
                }
                else if ( ($(".flavour-selected").length > 1) && ($(".size-selected").length > 1) ) {
                    
                    console.log("4. else if = selected flavour (2+) and size (2+)");
                }
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
                // uncomment function below to redirect
                // window.location = newUrl;
                console.log(newUrl);
                console.log("5. else");
            }
        });

        // Home Page filter button to Shop Page
        $("#product_filter_trigger_home").click(function(e) {
            e.preventDefault();
            
            if ($(".flavour-selected").length == 0) {
                // window.location = window.location.origin+"/shop";
                // window.location = window.location.pathname;
                // $("#product_filter_trigger_home").addClass("disabled");
                window.location = $("#product_filter_trigger_home").attr("href");
            }
            else if ($(".flavour-selected").length == 1) {
                $("#product_filter_trigger_home").removeClass("disabled");

                var originUrlArray = [];
                var pathUrlArray = [];

                var originUrl = window.location.origin;
                originUrlArray.push(originUrl);
                console.log(originUrlArray[0]);

                var pathUrl = window.location.pathname;
                pathUrlArray.push(pathUrl);
                console.log(pathUrlArray[0]);

                var newUrl = "/shop" +'?filter_flavour='+$(".flavour-selected").data("filter")+'&query_type_flavour=or';
                window.location = newUrl;
            }
            else {
                var originUrlArray = [];
                var pathUrlArray = [];

                var originUrl = window.location.origin;
                originUrlArray.push(originUrl);

                var pathUrl = window.location.pathname;
                pathUrlArray.push(pathUrl);

                var selectedFilter = arrayFilter.sort().join('%2C');
                var newUrl = "/shop" +'?filter_flavour='+selectedFilter+'&query_type_flavour=or';
                window.location = newUrl;
            }
        });
    }
}