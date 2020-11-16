/*
 Template Name: RunY Shop Admin Dashboard
 Author: Amin Ferasat
 File: Main js
 */



!function($) {
    "use strict";

    var MainApp = function() {};

    MainApp.prototype.initNavbar = function () {

        $('.navbar-toggle').on('click', function (event) {
            $(this).toggleClass('open');
            $('#navigation').slideToggle(400);
        });

        $('.navigation-menu>li').slice(-1).addClass('last-elements');

        $('.navigation-menu li.has-submenu a[href="#"]').on('click', function (e) {
            if ($(window).width() < 992) {
                e.preventDefault();
                $(this).parent('li').toggleClass('open').find('.submenu:first').toggleClass('open');
            }
        });
    },
    MainApp.prototype.initLoader = function () {
        $(window).on('load', function() {
            $('#status').fadeOut();
            $('#preloader').delay(350).fadeOut('slow');
            $('body').delay(350).css({
                'overflow': 'visible'
            });
        });
    },
    MainApp.prototype.initScrollbar = function () {
        $('.slimscroll-noti').slimScroll({
            height: '208px',
            position: 'left',
            size: "5px",
            color: '#98a6ad',
            wheelStep: 10
        });
    }
    // === fo,llowing js will activate the menu in left side bar based on url ====
    MainApp.prototype.initMenuItem = function () {
        $(".navigation-menu a").each(function () {
            var pageUrl = window.location.href.split(/[?#]/)[0];
            if (this.href == pageUrl) {
                $(this).parent().addClass("active"); // add active to li of the current link
                $(this).parent().parent().parent().addClass("active"); // add active class to an anchor
                $(this).parent().parent().parent().parent().parent().addClass("active"); // add active class to an anchor
            }
        });
    },
    MainApp.prototype.initComponents = function () {
        $('[data-toggle="tooltip"]').tooltip();
        $('[data-toggle="popover"]').popover();
    },
    MainApp.prototype.initToggleSearch = function () {
        $('.toggle-search').on('click', function () {
            var targetId = $(this).data('target');
            var $searchBar;
            if (targetId) {
                $searchBar = $(targetId);
                $searchBar.toggleClass('open');
            }
        });
    },

    MainApp.prototype.init = function () {
        this.initNavbar();
        this.initLoader();
        this.initScrollbar();
        this.initMenuItem();
        this.initComponents();
        this.initToggleSearch();
    },

    //init
    $.MainApp = new MainApp, $.MainApp.Constructor = MainApp
}(window.jQuery),

//initializing
function ($) {
    "use strict";
    $.MainApp.init();
}(window.jQuery);

/********/

$.ready=function(){
    slidJs.Addslid();
}

var slidJs = {
    Addslid: function () {

        //rooms count
        var slid_count=$('.div_slid').length;

        var slid_id="room_"+slid_count;

        var str_html = '';

        str_html += '<div id="'+slid_id+'" class="form-row items div_slid" data-group="slid">';

        str_html += '<div class="form-group col-md-12">';
        str_html += '<label for="text'+slid_count+'">متن اسلایدشو :</label>';
        str_html += '<input id="text'+slid_count+'" name="text_'+slid_count+'" type="text" class="form-control" data-name="name" >';
        str_html += '</div>';

        str_html += '<div class="form-group col-md-11"><input type="file" name="file_'+slid_count+'" class="custom-file-input" id="file'+slid_count+'" required><label class="custom-file-label" for="slideFile">انتخاب عکس...</label><div class="invalid-feedback">اشتباه آپلود کردید</div></div>';

        str_html += '<div class="form-group col-md-1">';
        str_html += '<label for="remove-btn"></label>';
        str_html += '<button id="remove-btn" class="btn btn-danger" onclick="$(this).parents(\'.items\').remove()"> حذف </button>';
        str_html += '</div>';





        str_html += '</div>';

        $('.div_slids_host').append(str_html);
        $('.div_slids_host').find('div.div_slid').last().find('div.div_adult div.div_input input').focus();
    },


    RemoveRoom: function (_p) {
        var div_room = $(_p).closest('div.div_slid');
        div_room.remove();
    }
};

