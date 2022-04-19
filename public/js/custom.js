(function ($) {
    "use strict";
    $(document).ready(function () {
        $('#bar1').barfiller({
            barColor: '#089bab',
            duration: 3000
        });
        $('#bar2').barfiller({
            barColor: '#28a745 ',
            duration: 3000
        });
        $('#bar3').barfiller({
            barColor: '#ffc107 ',
            duration: 3000
        });
        $('#bar4').barfiller({
            barColor: '#dc3545 ',
            duration: 3000
        });
    });
    $(".close_icon").click(function () {
        $(this).parents(".hide_content").slideToggle("0");
    });
    var count = $('.counter');
    if (count.length) {
        count.counterUp({
            delay: 100,
            time: 5000
        });
    }
    $('.nice_Select').niceSelect();
    $('.nice_Select2').niceSelect();
    $('.default_sel').niceSelect();
    $(document).ready(function () {
        $('#start_datepicker').datepicker();
        $('#end_datepicker').datepicker();
    });
    var delay = 500;
    $(".progress-bar").each(function (i) {
        $(this).delay(delay * i).animate({
            width: $(this).attr('aria-valuenow') + '%'
        }, delay);
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: delay,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now) + '%');
            }
        });
    });
    $('.sidebar_icon').on('click', function () {
        $('.sidebar').toggleClass('active_sidebar');
    });
    $('.sidebar_close_icon i').on('click', function () {
        $('.sidebar').removeClass('active_sidebar');
    });
    $('.troggle_icon').on('click', function () {
        $('.setting_navbar_bar').toggleClass('active_menu');
    });
    $('.custom_select').click(function () {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
        } else {
            $('.custom_select.active').removeClass('active');
            $(this).addClass('active');
        }
    });
    $(document).click(function (event) {
        if (!$(event.target).closest(".custom_select").length) {
            $("body").find(".custom_select").removeClass("active");
        }
    });
    $(document).click(function (event) {
        if (!$(event.target).closest(".sidebar_icon, .sidebar").length) {
            $("body").find(".sidebar").removeClass("active_sidebar");
        }
    });
    $("#checkAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
    $('#summernote').summernote({
        placeholder: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        tabsize: 2,
        height: 195
    });
    $('.lms_summernote').summernote({
        placeholder: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        tabsize: 2,
        height: 188
    });
    $('.input-file').each(function () {
        var $input = $(this),
            $label = $input.next('.js-labelFile'),
            labelVal = $label.html();
        $input.on('change', function (element) {
            var fileName = '';
            if (element.target.value) fileName = element.target.value.split('\\').pop();
            fileName ? $label.addClass('has-file').find('.js-fileName').html(fileName) : $label.removeClass('has-file').html(labelVal);
        });
    });
    $('.input-file2').each(function () {
        var $input = $(this),
            $label = $input.next('.js-labelFile1'),
            labelVal = $label.html();
        $input.on('change', function (element) {
            var fileName = '';
            if (element.target.value) fileName = element.target.value.split('\\').pop();
            fileName ? $label.addClass('has-file').find('.js-fileName1').html(fileName) : $label.removeClass('has-file').html(labelVal);
        });
    });
    $("#meta_keywords").tagsinput();
    $('.sraf_active').owlCarousel({
        loop: true,
        margin: 30,
        items: 1,
        autoplay: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        nav: true,
        dots: true,
        autoplayHoverPause: true,
        autoplaySpeed: 800,
        responsive: {
            0: {
                items: 2
            },
            767: {
                items: 3
            },
            992: {
                items: 3
            },
            1200: {
                items: 4
            },
            1600: {
                items: 5
            }
        }
    });
    if ($('.lms_table_active').length) {
        $('.lms_table_active').DataTable({
            bLengthChange: false,
            "bDestroy": true,
            language: {
                search: "<i class='ti-search'></i>",
                searchPlaceholder: 'Quick Search',
                paginate: {
                    next: "<i class='ti-arrow-right'></i>",
                    previous: "<i class='ti-arrow-left'></i>"
                }
            },
            columnDefs: [{
                visible: false
            }],
            responsive: true,
            searching: false,
        });
    }
    if ($('.lms_table_active2').length) {
        $('.lms_table_active2').DataTable({
            bLengthChange: false,
            "bDestroy": false,
            language: {
                search: "<i class='ti-search'></i>",
                searchPlaceholder: 'Quick Search',
                paginate: {
                    next: "<i class='ti-arrow-right'></i>",
                    previous: "<i class='ti-arrow-left'></i>"
                }
            },
            columnDefs: [{
                visible: false
            }],
            responsive: true,
            searching: false,
            info: false,
            paging: false
        });
    }
    $('.layout_style').click(function () {
        if ($(this).hasClass('layout_style_selected')) {
            $(this).removeClass('layout_style_selected');
        } else {
            $('.layout_style.layout_style_selected').removeClass('layout_style_selected');
            $(this).addClass('layout_style_selected');
        }
    });
    $("#sidebar_menu").metisMenu();
    $("#admin_profile_active").metisMenu();
    $('.switcher_wrap li.Horizontal').click(function () {
        $('.sidebar').addClass('hide_vertical_menu');
        $('.main_content ').addClass('main_content_padding_hide');
        $('.horizontal_menu').addClass('horizontal_menu_active');
        $('.main_content_iner').addClass('main_content_iner_padding');
        $('.footer_part').addClass('pl-0');
    });
    $('.switcher_wrap li.vertical').click(function () {
        $('.sidebar').removeClass('hide_vertical_menu');
        $('.main_content ').removeClass('main_content_padding_hide');
        $('.horizontal_menu').removeClass('horizontal_menu_active');
        $('.main_content_iner').removeClass('main_content_iner_padding');
        $('.footer_part').removeClass('pl-0');
    });
    $('.switcher_wrap li').click(function () {
        $('li').removeClass("active");
        $(this).addClass("active");
    });
    $('.custom_lms_choose li').click(function () {
        $('li').removeClass("selected_lang");
        $(this).addClass("selected_lang");
    });
    $('.spin_icon_clicker').on('click', function (e) {
        $('.switcher_slide_wrapper').toggleClass("swith_show");
        e.preventDefault();
    });
    $(document).ready(function () {
        $(function () {
            "use strict";
            $(".pCard_add").click(function () {
                $(".pCard_card").toggleClass("pCard_on");
                $(".pCard_add i").toggleClass("fa-minus");
            });
        });
    });
}(jQuery));