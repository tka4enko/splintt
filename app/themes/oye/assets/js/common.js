var Common = {
    pageLoader: function () {
        var self = this;

        jQuery('<div></div>').appendTo('body').addClass('loader');
        jQuery('<div></div>').appendTo('body').addClass('overlay-cover');

        this.el = jQuery('.loader');
        this.overlayEl = jQuery('.overlay-cover');

        this.overlayEl.show(function () {
            jQuery("html").css({
                "opacity": 1,
                "background": ""
            });
        });

        this.el.show();

        //// IE9  jQuery(window).load was not working so changed it like this
        window.onload = function () {
            self.overlayEl.fadeOut("slow").remove();
            self.el.hide().remove();

        }
    },
    circleLoader: function (action) {
        var self = this;
        switch (action) {
            case "show":
                jQuery('<div></div>').appendTo('body').addClass('loader');
                this.el = jQuery('.loader');
                return this.el.show();
                break;
            case "hide":
                this.el = jQuery('.loader');
                return  this.el.hide().remove();
                break;
        }
    },
    isEmail: function (email) {
        return /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i.test(email);
    },
    loaderAjax: function () {
        jQuery(document)
                .ajaxStart(function () {
                    Common.circleLoader('show');
                })
                .ajaxStop(function () {
                    Common.circleLoader('hide');
                    jQuery(this).unbind("ajaxStart");
                });
    },
    oldBrowser: function () {
        // Require Jquery.browser.js library
        var browser = jQuery.browser;
        var isOldBrowser = false;

        if (browser.desktop) {
            //console.log("Desktop")
            if (browser.chrome && browser.versionNumber < 31 || browser.mozilla && browser.versionNumber < 34 || browser.msie && browser.versionNumber < 9 || browser.safari && browser.versionNumber < 7 || browser.opera && browser.versionNumber < 26) {
                isOldBrowser = true;
            }
        }

        if (browser.mobile) {
            //console.log("Mobile");
            // jQuery("body").html(JSON.stringify(browser));
            if (browser.iphone && browser.versionNumber < 7 || browser.ipad && browser.versionNumber < 7 || browser.msie && browser.versionNumber < 9 || browser.android && browser.chrome && browser.webkit && browser.versionNumber < 27 // Chrome for Android
                    || browser.android && browser.safari && browser.versionNumber < 4.4 // Native Browser in Android
                    ) {
                isOldBrowser = true;
            }

        }



        if (isOldBrowser) {
            window.location.href = base_url + "/oldbrowser"
        }
        // return isOldBrowser;
    },
    queryStringToJSON: function (url) {
        if (url === '')
            return '';
        var pairs = (url || location.search).slice(0).split('&');
        // var pairs = url;
        var result = {};
        for (var idx in pairs) {
            var pair = pairs[idx].split('=');
            if (!!pair[0])
                result[pair[0].toLowerCase()] = decodeURIComponent(pair[1] || '');
        }
        return result;
    },
    redirectPost: function (location, args) {
        var form = '';
        jQuery.each(args, function (key, value) {
            form += '<input type="hidden" name="' + key + '" value="' + value + '">';
        });
        jQuery('<form action="' + location + '" method="POST">' + form + '</form>').appendTo('body').submit();
    }
}
