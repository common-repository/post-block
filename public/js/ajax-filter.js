jQuery(document).ready(function ($) {

    // Handle category checkbox changes
    $("#frhd_post_filter input[type='checkbox']").on('change', function() {

        // When selected any category, All button will be lose the color.
        $('span.form-check.form-checked').removeClass('form-checked');

        // Get selected categories.
        var selectedCategories = $("#frhd_post_filter input[type='checkbox']:checked").map(function(){
            return $(this).val();
        }).get();
        
        // Use the existing pagination mechanism or reset to page 1
        var pageNumber = $('#frhd_pagin_ajax a.current').length ? $('#frhd_pagin_ajax a.current').text() : 1;

        var ajax_url = ajax_object.ajax_url;

        jQuery.ajax({
            type: "POST",
            url: ajax_url,
            data: {
                action: 'filter_posts_by_pagination',
                paged: pageNumber,
                categories: selectedCategories
            },
            success: function (response) {
                jQuery(".col-md-9 .row").html(response);
                // Optionally reset/update pagination here if needed
            },
        });
    });

    // Update existing pagination click handler to include selected categories
    jQuery("body").delegate("#frhd_pagination_ajax_filter a", "click", function(event) {
        event.preventDefault();
        var pageNumber = jQuery(this).attr("href").split("/page/")[1].replace("/", "");
        var selectedCategories = $("#frhd_post_filter input[type='checkbox']:checked").map(function(){
            return $(this).val();
        }).get();

        var ajax_url = ajax_object.ajax_url;

        jQuery.ajax({
            type: "POST",
            url: ajax_url,
            data: {
                action: 'filter_posts_by_pagination',
                paged: pageNumber,
                categories: selectedCategories
            },
            success: function (response) {
                jQuery(".col-md-9 .row").html(response);
            },
        });
    });

    // Pagination.
    $('#frhd-query-handler').on('click', '#frhd_pagin_ajax a', function(e) {
        e.preventDefault();
        var link = $(this).attr('href');
        $('#frhd-query-handler').fadeOut(100, function() {
            $(this).load(link + ' #frhd-query-handler', function() {
                $(this).fadeIn(100, function() {});
            });
        });
    });

    /**
     * Reset the Query, if clicked ALL button.
     */
    $(".form-check.form-checked").on('click', function() {
        // When selected All button, get back the color.
        $('span.form-check').addClass('form-checked');

        // Deselect all checkboxes within the #frhd_post_filter form
        $("#frhd_post_filter .form-check-input").prop('checked', false);
        
        // Reset selectedCategories to an empty array
        var selectedCategories = [];
        
        // Assuming you want to reset to the first page as well
        var pageNumber = 1;

        var ajax_url = ajax_object.ajax_url;

        // Make AJAX call to reset the filter
        jQuery.ajax({
            type: "POST",
            url: ajax_url,
            data: {
                action: 'filter_posts_by_pagination',
                paged: pageNumber,
                categories: selectedCategories // This is now an empty array
            },
            success: function (response) {
                jQuery(".col-md-9 .row").html(response);
                // Optionally reset/update pagination here if needed
            },
        });
    });
});