//////////////////////////////////////////
//// Notey-Fi - A Small Simple Notification Plugin
//// Created by Jordan Sayner
//// http://notey-fi.jordansayner.co.uk/
//// Version 1.0
//////////////////////////////////////////

/*global jQuery */
jQuery(function ($) {
    "use strict";

    $.fn.noteyfi = function (Type, Duration, Text, ID, options) {
        var cachedThis = this;

        ////////
        // Default Options
        ////////
        var settings = $.extend({
            ItemClass: "notey-fi",
            closeButtonClass: "notey-fi__close"
        }, options);

        ////////
        // Notification Template
        ////////
        var notificationTemplate = "<div id='" + settings.ItemClass + "--" + ID + "--" + Math.floor((Math.random() * 10000) + 1) + "' class='" + settings.ItemClass + " " + settings.ItemClass + "__" + Type + "'>" + Text + "<div class='" + settings.closeButtonClass + "'></div></div>";

        ////////
        // Added notification
        ////////
        $(cachedThis).prepend(notificationTemplate);

        ////////
        // Set timeout to close notification
        ////////
        setTimeout(function () {
            $("#" + settings.ItemClass + "--" + ID).fadeOut(300, function() { $(this).remove(); });
        }, Duration);

        ////////
        // Close notification on click
        ////////
        $("." + settings.closeButtonClass).on('click', function (e) {
            $(this).parent("." + settings.ItemClass).fadeOut(300, function() { $(this).remove(); });
        });
    };

}(jQuery));