(function(jQuery) {
    jQuery.widget("custom.combobox", {
        _create: function() {
            this.wrapper = jQuery("<div>").addClass("ui-combobox").insertAfter(this.element);
            this.element.hide();
            this._createAutocomplete();
            this._createShowAllButton();
        },
        _createAutocomplete: function() {
            var selected = this.element.children(":selected"),
                value = selected.val() ? selected.text() : "";
            this.input = jQuery("<input>").appendTo(this.wrapper).val(value).attr({
                placeholder: this.options.placeholder
            }).autocomplete({
                delay: 0,
                minLength: 0,
                position: {
                    my: "left bottom",
                    at: "left-15 top",
                    collision: "flip"
                },
                source: jQuery.proxy(this, "_source")
            });
            this._on(this.input, {
                focus: function() {
                    this.input.autocomplete("search", "");
                },
                autocompleteselect: function(event, ui) {
                    ui.item.option.selected = true;
                    this._trigger("select", event, {
                        item: ui.item.option
                    });
                },
                autocompletechange: "_removeIfInvalid"
            });
        },
        _createShowAllButton: function() {
            var input = this.input,
                wasOpen = false;
            jQuery("<a>").attr("tabIndex", -1).appendTo(this.wrapper).button({
                icons: {
                    primary: "icon-pixel-diamond"
                },
                text: false
            }).addClass("ui-combobox-toggle").mousedown(function() {
                wasOpen = input.autocomplete("widget").is(":visible");
            }).click(function() {
                if (wasOpen) {
                    return;
                }
                input.focus();
                input.autocomplete("search", "");
            });
        },
        _source: function(request, response) {
            var matcher = new RegExp(jQuery.ui.autocomplete.escapeRegex(request.term), "i");
            response(this.element.children("option").map(function() {
                var text = jQuery(this).text();
                if (this.value && (!request.term || matcher.test(text)))
                    return {
                        label: text,
                        value: text,
                        option: this
                    };
            }));
        },
        _removeIfInvalid: function(event, ui) {
            if (ui.item) {
                return;
            }
            var value = this.input.val(),
                valueLowerCase = value.toLowerCase(),
                valid = false;
            this.element.children("option").each(function() {
                if (jQuery(this).text().toLowerCase() === valueLowerCase) {
                    this.selected = valid = true;
                    return false;
                }
            });
            if (valid) {
                return;
            }
            this.input.val("");
            this.input.autocomplete("instance").term = "";
        },
        _destroy: function() {
            this.wrapper.remove();
            this.element.show();
        }
    });
})(jQuery);