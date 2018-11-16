var js = {};
! function ($) {
    $.fn.exists = function () {
        return $(this).length > 0
    }, js.model = {
        events: {},
        extend: function (e) {
            var t = $.extend({}, this, e);
            return $.each(t.events, function (e, i) {
                t._add_event(e, i)
            }), t
        },
        _add_event: function (e, t) {
            var i = this,
                s = e,
                o = "",
                n = document;
            e.indexOf(" ") > 0 && (s = e.substr(0, e.indexOf(" ")), o = e.substr(e.indexOf(" ") + 1)), "resize" != s && "scroll" != s || (n = window), $(n).on(s, o, function (e) {
                e.$el = $(this), "function" == typeof i.event && (e = i.event(e)), i[t].apply(i, [e])
            })
        }
    }, js.global = js.model.extend({
        events: {
            ready: "ready"
        },
        ready: function () {
            $("#content iframe").each(function () {
                $(this).wrap('<div class="embed-container post-content-embed"></div>')
            })
        }
    }), js.mobile = js.model.extend({
        events: {
            "click #mobile-nav-toggle": "toggle_mobile_nav"
        },
        toggle_mobile_nav: function (e) {
            e.preventDefault(), $("#header").toggleClass("-open")
        }
    }), js.prism = js.model.extend({
        events: {
            ready: "ready",
            "click .pre-title": "toggle"
        },
        toggle: function (e) {
            $code = e.$el.parent(), $code.hasClass("closed") ? $code.removeClass("closed") : $code.addClass("closed")
        },
        ready: function () {
            $("pre code").each(function () {
                var e = "default",
                    t = $(this).html();
                t = t.trim(), $(this).html(t), t.indexOf("php") !== !1 && (e = "php"), $(this).addClass("language-" + e)
            })
        }
    }), js.header = js.model.extend({
        $header: null,
        $sub_header: null,
        active: 0,
        hover: 0,
        show: 0,
        y: 0,
        opacity: 1,
        direction: "down",
        events: {
            ready: "ready",
            scroll: "scroll",
            "mouseenter #header": "mouseenter",
            "mouseleave #header": "mouseleave"
        },
        ready: function () {
            this.$header = $("#header"), this.$sub_header = $("#sub-header"), this.active = 1
        },
        mouseenter: function () {
            var e = $(window).scrollTop();
            this.hover = 1, this.opacity = 1, this.show = e, this.$header.stop().animate({
                opacity: 1
            }, 250)
        },
        mouseleave: function () {
            this.hover = 0
        },
        scroll: function () {
            if (this.active) {
                var e = $(window).scrollTop(),
                    t = e >= this.y ? "down" : "up",
                    i = t !== this.direction,
                    s = e - this.y,
                    o = this.$sub_header.outerHeight();
                clearTimeout(this.t), e < 70 && this.$header.removeClass("-white"), i && (0 == this.opacity && "up" == t ? (this.show = e, e < o ? this.show = 0 : this.show -= 70) : 1 == this.opacity && "down" == t && (this.show = e), this.show = Math.max(0, this.show)), this.$header.hasClass("-open") && (this.show = e), this.hover && (this.show = e);
                var n = e - this.show;
                n = Math.max(0, n), n = Math.min(n, 70);
                var a = (70 - n) / 70;
                this.$header.css("opacity", a), e > o ? this.$header.addClass("-white") : 0 == a && this.$header.removeClass("-white"), this.y = e, this.direction = t, this.opacity = a
            }
        }
    }), js.tooltip = js.model.extend({
        $el: null,
        events: {
            "mouseenter [title]": "mouseenter",
            "mouseleave [title]": "mouseleave"
        },
        mouseenter: function (e) {
            var t = e.$el.attr("title");
            t && (this.$el = $('<div class="tooltip">' + t + "</div>"), $("body").append(this.$el), this.$el.css({
                top: e.$el.offset().top - this.$el.outerHeight() - 6,
                left: e.$el.offset().left + e.$el.outerWidth() / 2 - this.$el.outerWidth() / 2
            }), e.$el.data("title", t), e.$el.attr("title", ""))
        },
        mouseleave: function (e) {
            this.$el && (e.$el.attr("title", e.$el.data("title")), this.$el.remove())
        }
    }), js.zoomable = js.model.extend({
        $a: null,
        $img: null,
        active: !1,
        busy: !1,
        y: 0,
        events: {
            ready: "ready",
            scroll: "scroll",
            "click .zoomable": "_click"
        },
        ready: function () {
            $('a[href$=".jpg"], a[href$=".png"], a[href$=".gif"]').addClass("zoomable")
        },
        scroll: function () {
            if (this.active) {
                var e = $(window).scrollTop(),
                    t = 100;
                (e > this.y + t || e < this.y - t) && this.close()
            }
        },
        _click: function (e) {
            if (e.preventDefault(), !this.busy) {
                var t = this;
                this.$a = e.$el, this.$img = this.$a.children("img"), this.active ? this.close() : this.open(), this.busy = !0, setTimeout(function () {
                    t.busy = !1
                }, 310)
            }
        },

    })
}(jQuery);
