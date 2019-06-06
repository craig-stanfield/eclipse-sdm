// Search & Replace only first occurance also in class sar
jQuery(document).ready(function () {
    console.debug(php_vars);
    var region = jQuery('.sar').html();
    if (typeof region !== "undefined" && region.length) {
        // create array of search and replace items and replace them
        jQuery.each(php_vars, function( search, replace ) {
            inner = region.replace(search, replace);
            jQuery('.sar').html(inner);
        });
    }
});


