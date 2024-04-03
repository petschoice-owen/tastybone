// filter function - select/unselect function
var filterProducts = () => {
    if ($(".flavours .flavour-name").length) {
        var accordionMain = $('#accordionFlavour');
        accordionMain.on('show.bs.collapse','.collapse', function() {
            accordionMain.find('.collapse.in').collapse('hide');
        });

        if (window.location.href.indexOf("filter_flavour") > -1) {
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

        // Shop Page and Category Pages filter button to self
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