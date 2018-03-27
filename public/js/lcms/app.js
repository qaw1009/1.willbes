/**
 * Resize function without multiple trigger
 *
 * Usage:
 * $(window).smartresize(function(){
 *     // code here
 * });
 */
(function($, sr) {
    // debouncing function from John Hann
    // http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
    var debounce = function(func, threshold, execAsap) {
        var timeout;

        return function debounced() {
            var obj = this, args = arguments;

            function delayed() {
                if (!execAsap)
                    func.apply(obj, args);
                timeout = null;
            }

            if (timeout)
                clearTimeout(timeout);
            else if (execAsap)
                func.apply(obj, args);

            timeout = setTimeout(delayed, threshold || 100);
        };
    };

    // smartresize
    jQuery.fn[sr] = function(fn) {
        return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr);
    };

})(jQuery, 'smartresize');
/**
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var CURRENT_URL = window.location.href.split('#')[0].split('?')[0],
    $BODY = $('body'),
    $MENU_TOGGLE = $('.menu-toggle'),
    $SIDEBAR_MENU = $('#sidebar-menu'),
    $SIDEBAR_FOOTER = $('.sidebar-footer'),
    $TOP_COL = $('.top_col'),
    $LEFT_COL = $('.left_col'),
    $RIGHT_COL = $('.right_col'),
    $NAV_MENU = $('.nav_menu'),
    $FOOTER = $('footer');

// TODO: This is some kind of easy fix, maybe we can improve this
var setContentHeight = function() {
    // reset height
    $RIGHT_COL.css('min-height', $(window).height());

    var bodyHeight = $BODY.outerHeight(),
        footerHeight = $BODY.hasClass('footer_fixed') ? -10 : $FOOTER.height(),
        leftColHeight = $LEFT_COL.eq(1).height() + $SIDEBAR_FOOTER.height(),
        contentHeight = bodyHeight < leftColHeight ? leftColHeight : bodyHeight;

    // normalize content => topnav compute add
    contentHeight -= $NAV_MENU.height() + footerHeight;

    $RIGHT_COL.css('min-height', contentHeight);
};

// Sidebar
function init_sidebar() {
    $SIDEBAR_MENU.find('a').on('click', function(ev) {
        //console.log('clicked - sidebar_menu');
        var $li = $(this).parent();

        if ($li.is('.active')) {
            $li.removeClass('active active-sm');
            $('ul:first', $li).slideUp(function() {
                setContentHeight();
            });
        } else {
            // prevent closing menu if we are on child menu
            if (!$li.parent().is('.child_menu')) {
                $SIDEBAR_MENU.find('li').removeClass('active active-sm');
                $SIDEBAR_MENU.find('li ul').slideUp();
            } else {
                if ($BODY.is(".nav-sm")) {
                    $SIDEBAR_MENU.find("li").removeClass("active active-sm");
                    $SIDEBAR_MENU.find("li ul").slideUp();
                }
            }
            $li.addClass('active');

            $('ul:first', $li).slideDown(function() {
                setContentHeight();
            });
        }
    });

    // toggle small or large menu
    $MENU_TOGGLE.on('click', function() {
        //console.log('clicked - menu toggle');

        if ($BODY.hasClass('nav-md')) {
            $SIDEBAR_MENU.find('li.active ul').hide();
            $SIDEBAR_MENU.find('li.active').addClass('active-sm').removeClass('active');
        } else {
            $SIDEBAR_MENU.find('li.active-sm ul').show();
            $SIDEBAR_MENU.find('li.active-sm').addClass('active').removeClass('active-sm');
        }

        $BODY.toggleClass('nav-md nav-sm');

        setContentHeight();

        /*// datatable redraw disabled
        $('.dataTable').each(function() {
            $(this).dataTable().fnDraw();
        });*/
    });

    // check active menu
    //$SIDEBAR_MENU.find('a[href="' + CURRENT_URL + '"]').parent('li').addClass('current-page');

    $SIDEBAR_MENU.find('a').filter(function() {
        //return this.href == CURRENT_URL;
        // 서브 디렉토리 > 컨트롤러명 또는 컨트롤러명 > 메소드명까지의 메뉴 URL을 현재 URL과 비교하여 active 처리
        var PRE_MENU_URL = this.href.substr(0, this.href.split('/', 5).join('/').length);
        //console.log(CURRENT_URL + ' ====> ' + PRE_MENU_URL + ' ====> ' + this.href + ' ====> ' + (new RegExp('^' + PRE_MENU_URL, 'gi').test(CURRENT_URL) && this.href != ''));
        return new RegExp('^' + PRE_MENU_URL, 'gi').test(CURRENT_URL) && this.href != '';
    }).parent('li').addClass('current-page').parents('ul').slideDown(function() {
        setContentHeight();
    }).parent().addClass('active');

    // recompute content when resizing
    $(window).smartresize(function() {
        setContentHeight();
    });

    setContentHeight();

    // fixed sidebar
    if ($.fn.mCustomScrollbar) {
        $('.menu_fixed').mCustomScrollbar({
            autoHideScrollbar: true,
            theme: 'minimal',
            mouseWheel: {preventDefault: true}
        });
    }
}
// /Sidebar

// Panel toolbox
$(document).ready(function() {
    $('.collapse-link').on('click', function() {
        var $BOX_PANEL = $(this).closest('.x_panel'),
            $ICON = $(this).find('i'),
            $BOX_CONTENT = $BOX_PANEL.find('.x_content');

        // fix for some div with hardcoded fix class
        if ($BOX_PANEL.attr('style')) {
            $BOX_CONTENT.slideToggle(200, function() {
                $BOX_PANEL.removeAttr('style');
            });
        } else {
            $BOX_CONTENT.slideToggle(200);
            $BOX_PANEL.css('height', 'auto');
        }

        $ICON.toggleClass('fa-chevron-up fa-chevron-down');
    });

    $('.close-link').click(function() {
        var $BOX_PANEL = $(this).closest('.x_panel');

        $BOX_PANEL.remove();
    });
});
// /Panel toolbox

// Tooltip
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip({
        container: 'body'
    });
});
// /Tooltip

// Progressbar
if ($(".progress .progress-bar")[0]) {
    $('.progress .progress-bar').progressbar();
}
// /Progressbar

// Accordion
$(document).ready(function() {
    $(".expand").on("click", function() {
        $(this).next().slideToggle(200);
        $expand = $(this).find(">:first-child");

        if ($expand.text() == "+") {
            $expand.text("-");
        } else {
            $expand.text("+");
        }
    });
});

// NProgress
if (typeof NProgress != 'undefined') {
    /* 사용안함
    $(document).ready(function() {
        NProgress.start();
    });
    $(window).load(function() {
        NProgress.done();
    });*/
}

//hover and retain popover when on popover content
var originalLeave = $.fn.popover.Constructor.prototype.leave;
$.fn.popover.Constructor.prototype.leave = function(obj) {
    var self = obj instanceof this.constructor ?
        obj : $(obj.currentTarget)[this.type](this.getDelegateOptions()).data('bs.' + this.type);
    var container, timeout;

    originalLeave.call(this, obj);

    if (obj.currentTarget) {
        container = $(obj.currentTarget).siblings('.popover');
        timeout = self.timeout;
        container.one('mouseenter', function() {
            //We entered the actual popover – call off the dogs
            clearTimeout(timeout);
            //Let's monitor popover content instead
            container.one('mouseleave', function() {
                $.fn.popover.Constructor.prototype.leave.call(self, self);
            });
        });
    }
};

$('body').popover({
    selector: '[data-popover]',
    trigger: 'click hover',
    delay: {
        show: 50,
        hide: 400
    }
});

/* AUTOSIZE */
function init_autosize() {
    if (typeof $.fn.autosize !== 'undefined') {
        autosize($('.resizable_textarea'));
    }
}

/* INPUT MASK */
function init_InputMask() {
    if (typeof ($.fn.inputmask) === 'undefined') {
        return;
    }
    //console.log('init_InputMask');

    $(":input").inputmask();
}

/* SMART WIZARD */
function init_SmartWizard() {
    if (typeof ($.fn.smartWizard) === 'undefined') {
        return;
    }
    //console.log('init_SmartWizard');

    $('#wizard').smartWizard();

    $('#wizard_verticle').smartWizard({
        transitionEffect: 'slide'
    });

    $('.buttonNext').addClass('btn btn-success');
    $('.buttonPrevious').addClass('btn btn-primary');
    $('.buttonFinish').addClass('btn btn-default');
}

/* COMPOSE */
function init_compose() {
    if (typeof ($.fn.slideToggle) === 'undefined') {
        return;
    }
    //console.log('init_compose');

    $('#compose, .compose-close').click(function() {
        $('.compose').slideToggle();
    });
}

/**
 * init Datetimepicker
 */
function init_datetimepicker() {
    if (typeof ($.fn.datetimepicker) === 'undefined') {
        return;
    }
    //console.log('init_datetimepicker');

    $('.datepicker').datetimepicker({
        locale : 'ko',
        format: 'YYYY-MM-DD',
        ignoreReadonly: true,
        allowInputToggle: true,
    });
}

/**
 * init iCheck
 */
function init_iCheck() {
    if (typeof ($.fn.iCheck) === 'undefined') {
        return;
    }

    // iCheck
    $('input[type="checkbox"].flat, input[type="radio"].flat').iCheck({
        checkboxClass: 'icheckbox_flat-blue',
        radioClass: 'iradio_flat-blue'
    });

    // iCheck - Datatable
    $('.dataTables_wrapper').on('draw.dt', function() {
        $('input[type="checkbox"].flat, input[type="radio"].flat').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            radioClass: 'iradio_flat-blue'
        });
    });
}

/**
 * init magnific-popup
 */
function init_magnificPopup() {
    if (typeof ($.fn.magnificPopup) === 'undefined') {
        return;
    }

    $(document).on('click', '[rel^="popup-image"]', function(e) {
        e.preventDefault();
        $(this).magnificPopup({
            type: 'image',
        }).magnificPopup('open');
    });
}

/**
 * init Datatable
 */
function init_datatable() {
    // datatable search_form submit
    if(typeof $search_form !== 'undefined') {
        $search_form.submit(function(e) {
            e.preventDefault();
            $datatable.draw();
        });
    }
}

/**
 * 공통적으로 적용되는 스크립트
 */
function init_base() {
    // top_col dropdown menu mouseover show, hidden
    $TOP_COL.find('.nav-tabs li.dropdown').hover(function() {
        $(this).find('.dropdown-menu').not('.dropdown-submenu > .dropdown-menu').stop(true, true).delay(100).fadeIn(500);
    }, function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(100).fadeOut(500);
    });

    // 관리자 정보수정 모달창 오픈
    $('.btn-admin-modify').setLayer({
        "url" : "/lcms/auth/regist/edit",
        'width' : 900
    });

    // 환경설정 모달창 오픈
    $('.btn-cog').setLayer({
        "url" : "/sys/adminSettings/create"
    });

    // 즐겨찾기 버튼 클릭
    $('#btn_favorite').on('click', function() {
        var is_regist = $(this).children('i').prop('class').indexOf('red') < 0;
        var msg = (is_regist === true) ? '즐겨찾기에 추가하시겠습니까?' : '즐겨찾기를 삭제하시겠습니까?';

        if (!confirm(msg)) return;

        var data = {};
        data[$__csrf_token_name] = $__csrf_token;
        data['menu_idx'] = $__menu_current_idx;
        sendAjax('/sys/adminSettings/favorite', data, function(ret) {
            if (ret.ret_cd) {
                notifyAlert('success', '알림', ret.ret_msg);
                location.reload();
            }
        }, showError, false, 'POST');
    });

    // LMS 사이트 탭 HTML 설정
    $tab_site_codes = $('.tabs-site-codes');
    if ($tab_site_codes.length > 0) {
        $tab_site_codes.each(function(idx, ele) {
            $('#' + ele.id).html(getSiteTabsHtml($(this).data('tab-type'), $(this).data('is-all-tab'), $(this).data('tab-data')));
        });
    }
}

/**
 * onload event
 */
$(document).ready(function() {
    init_sidebar();
    init_InputMask();
    init_SmartWizard();
    init_datetimepicker();
    init_compose();
    init_autosize();
    init_iCheck();
    init_magnificPopup();
    init_datatable();
    init_base();
});

/**
 * 사이트 탭 HTML 리턴
 * param {string} tab_type [탭 구분, tab|self]
 * param {string} is_all_tab [전체 탭 존재 여부, 1|0]
 * param {JSON} tab_data [탭 이름 우측 노출 데이터, { all : value, site_code : value ... }]
 * returns {string} HTML
 */
function getSiteTabsHtml(tab_type, is_all_tab, tab_data) {
    var $json = $__site_codes;
    var $qs = queryStringToJson();

    var tab_attr, tab_txt, tab_active, tab_base_url = '#none';
    tab_data = typeof tab_data === 'undefined' ? {} : JSON.parse(JSON.stringify(tab_data));

    if (tab_type !== 'tab') {
        tab_base_url = location.search.replace(/[\&|\?]site_code=(.)*/gi, '');
        if (tab_base_url.indexOf('?') === -1) {
            tab_base_url = './?site_code=';
        } else {
            tab_base_url = './' + tab_base_url + '&site_code=';
        }
    } else {
        tab_attr = 'role="tab" data-toggle="tab"';
    }

    var tab_html = '<ul class="nav nav-tabs bar_tabs mt-30" role="tablist">\n';
    if (is_all_tab == '1') {
        tab_active = typeof $qs.site_code === 'undefined' || $qs.site_code === '' ? 'active' : '';
        tab_txt = typeof tab_data.all === 'undefined' ? '' : ' <span class="red">(' + tab_data.all + ')</span>';
        tab_html += '<li role="presentation" class="' + tab_active + '"><a href="' + tab_base_url + '" ' + tab_attr + ' data-site-code=""><strong>전체</strong>' + tab_txt + '</a></li>\n';
    }

    $.each($json, function(site_code, site_name) {
        var tab_url = tab_base_url;
        if (tab_type !== 'tab') {
            tab_url = tab_base_url + site_code;
        }
        tab_active = ($qs.site_code === site_code) ? 'active' : '';
        tab_txt = typeof tab_data[site_code] === 'undefined' ? '' : ' <span class="red">(' + tab_data[site_code] + ')</span>';

        tab_html += '<li role="presentation" class="' + tab_active + '"><a href="' + tab_url + '" ' + tab_attr + ' data-site-code="' + site_code + '"><strong>' + site_name + '</strong>' + tab_txt + '</a></li>\n';
    });

    return tab_html + '</ul>\n';
}
