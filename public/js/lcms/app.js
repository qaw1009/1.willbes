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
    $SIDEBAR_MENU.find('a').on('click', function() {
        //console.log('clicked - sidebar_menu');
        var $li = $(this).parent();

        if ($li.is('.active')) {
            $li.removeClass('active active-sm');
            $li.find('ul:first').slideUp(function() {
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

            $li.find('ul:first').slideDown(function() {
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
        // 서브 디렉토리 > 컨트롤러명까지의 메뉴 URL을 현재 URL과 비교하여 active 처리, 파라미터가 있을 경우 파라미터가 존재하는지 여부 확인
        var PRE_MENU_URL = (this.href.charAt(this.href.length - 1) !== '/' && this.href.indexOf('?') === -1) ? this.href + '/' : this.href;
        PRE_MENU_URL = (PRE_MENU_URL.indexOf('?') > -1) ? PRE_MENU_URL.substr(0, PRE_MENU_URL.indexOf('?')) : PRE_MENU_URL;

        // 메뉴 URL에서 지정된 파라미터 추출
        var MENU_URL_PARAM = (this.href.indexOf('?') > -1) ? this.href.substr(this.href.indexOf('?') + 1) : '';

        return this.href !== '' && new RegExp('^' + PRE_MENU_URL, 'gi').test(CURRENT_URL)
            && (MENU_URL_PARAM === '' || (MENU_URL_PARAM !== '' && location.search.indexOf(MENU_URL_PARAM) > -1));
    }).parent('li').addClass('current-page').parents('ul').slideDown(function() {
        setContentHeight();
    }).parent().addClass('active');

    // recompute content when resizing
    $(window).smartresize(function() {
        setContentHeight();
    });

    setContentHeight();

    /* 사용안함
    // fixed sidebar
    if ($.fn.mCustomScrollbar) {
        $('.menu_fixed').mCustomScrollbar({
            autoHideScrollbar: true,
            theme: 'minimal',
            mouseWheel: {preventDefault: true}
        });
    }*/
}

// Panel toolbox
$(document).ready(function() {
    $(document).on('click', '.collapse-link', function() {
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

    $(document).on('click', '.close-link', function() {
        var $BOX_PANEL = $(this).closest('.x_panel');

        $BOX_PANEL.remove();
    });
});

// Tooltip
$(document).ready(function() {
    $(document).tooltip({
        selector : '[data-toggle="tooltip"]',
        container: 'body'
    });
});

/* 사용안함
// Progressbar
if (typeof $.fn.progressbar !== 'undefined') {
    var $progress_bar = $('.progress .progress-bar');
    if ($progress_bar[0]) {
        $progress_bar.progressbar();
    }
}*/

// Accordion
$(document).ready(function() {
    $(document).on('click', '.expand', function() {
        $(this).next().slideToggle(200);
        $expand = $(this).find('>:first-child');

        if ($expand.text() === "+") {
            $expand.text("-");
        } else {
            $expand.text("+");
        }
    });
});

/* 사용안함
// NProgress
if (typeof NProgress !== 'undefined') {
    $(document).ready(function() {
        NProgress.start();
    });
    $(window).load(function() {
        NProgress.done();
    });
}*/

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

$(document).ready(function() {
    $(document).popover({
        selector: '[data-toggle="popover"]',
        trigger: 'click hover',
        delay: {
            show: 50,
            hide: 50
        }
    });
});

/* 사용안함
// AUTOSIZE
function init_autosize() {
    if (typeof $.fn.autosize !== 'undefined') {
        autosize($('.resizable_textarea'));
    }
}
*/

/* INPUT MASK */
function init_InputMask() {
    if (typeof ($.fn.inputmask) === 'undefined') {
        return;
    }
    //console.log('init_InputMask');

    $(':input').inputmask();
}

/* 사용안함
// SMART WIZARD
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
}*/

/* COMPOSE */
function init_compose() {
    if (typeof ($.fn.slideToggle) === 'undefined') {
        return;
    }
    //console.log('init_compose');

    $(document).on('click', '#compose, .compose-close', function() {
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

    $(document).on('focus', '.datepicker', function() {
        $(this).datetimepicker({
            locale : 'ko',
            format: 'YYYY-MM-DD',
            ignoreReadonly: true,
            allowInputToggle: true
        });
    });
}

/**
 * init iCheck
 */
function init_iCheck() {
    if (typeof ($.fn.iCheck) === 'undefined') {
        return;
    }
    //console.log('init_iCheck');

    // iCheck
    $('input[type="checkbox"].flat, input[type="radio"].flat').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });
}

/**
 * init iCheck datatable
 */
function init_iCheck_datatable() {
    if (typeof ($.fn.iCheck) === 'undefined') {
        return;
    }
    //console.log('init_iCheck_datatable');

    $(document).on('draw.dt column-reorder.dt', '.dataTables_wrapper', function() {
        $('input[type="checkbox"].flat, input[type="radio"].flat').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
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
            type: 'image'
        }).magnificPopup('open');
    });
}

/**
 * init Datatable
 */
function init_datatable() {
    // datatable search_form submit
    if(typeof $search_form !== 'undefined') {
        $search_form.off('submit');
        $search_form.submit(function(e) {
            e.preventDefault();
            if ($(this).hasClass('searching') === true) {
                datatableSearching();
            } else {
                $datatable.draw();
            }
        });

        // searching: true 옵션일 경우 검색
        $search_form.filter('.searching').off('keyup change ifChanged', 'input, select, input.flat');
        $search_form.filter('.searching').on('keyup change ifChanged', 'input, select, input.flat', function() {
            datatableSearching();
        });

        // 사이트 탭 클릭
        $search_form.find('.tabs-site-code').off('click', 'li > a');
        $search_form.find('.tabs-site-code').on('click', 'li > a', function() {
            if (typeof $site_code !== 'undefined') {
                $site_code = $(this).data('site-code');
            }

            var $search_site_code = $search_form.find('[name="search_site_code"]');
            $search_site_code.val($(this).data('site-code'));
            if ($search_site_code.prop('tagName') === 'SELECT') {
                $search_form.find('[name="search_site_code"]').change();
            }

            $search_form.submit();
        });

        // 초기화 버튼 클릭
        $search_form.off('click', '#btn_reset, #_btn_reset');
        $search_form.on('click', '#btn_reset, #_btn_reset', function() {
            $search_form[0].reset();
            //기본화면셋팅 정보가 있을 경우
            if(typeof arr_search_data != 'undefined' && arr_search_data != null && typeof $search_form != 'undefined' && $search_form != null){
                $.each(arr_search_data,function(key,value) {
                    $search_form.find('input[name="'+key+'"]').val(value);
                    $search_form.find('select[name="'+key+'"]').val(value);
                    $search_form.find('input[name="'+key+'"]').attr('checked', true);
                });
            }
            $datatable.draw();
        });

        // 초기화 버튼 클릭 (날짜 설정 버튼이 있는 경우, 당월, 1주일 ...)
        $search_form.off('click', '#btn_reset_in_set_search_date, #_btn_reset_in_set_search_date');
        $search_form.on('click', '#btn_reset_in_set_search_date, #_btn_reset_in_set_search_date', function() {
            $search_form[0].reset();
            $search_form.find('.btn-set-search-date:eq(0)').trigger('click');
            $datatable.draw();
        });
    }

    //modal search submit
    if (typeof $search_form_modal !== 'undefined') {
        $search_form_modal.off('submit');
        $search_form_modal.submit(function(e) {
            e.preventDefault();
            if ($(this).hasClass('searching') === true) {
                datatableSearchingModal();
            } else {
                $datatable_modal.draw();
            }
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
        $(this).find('.dropdown-menu').stop(true, true).delay(0).fadeOut(0);
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
    $(document).on('click', '#btn_favorite', function() {
        var is_regist = $(this).children('i').prop('class').indexOf('red') < 0;
        var msg = (is_regist === true) ? '즐겨찾기에 추가하시겠습니까?' : '즐겨찾기를 삭제하시겠습니까?';

        if (!confirm(msg)) return;

        var data = {};
        data[$__global.csrf_token_name] = $__global.csrf_token;
        data['menu_idx'] = $__global.menu_current_idx;
        sendAjax('/sys/adminSettings/favorite', data, function(ret) {
            if (ret.ret_cd) {
                notifyAlert('success', '알림', ret.ret_msg);
                location.reload();
            }
        }, showError, false, 'POST');
    });

    // 기간설정 버튼 클릭
    $(document).on('click', '.btn-set-search-date', function() {
        var period = $(this).data('period');
        var periods = period.split('-');
        var default_date = $(this).data('default-date');

        // 날짜 설정
        setDefaultDatepicker(-periods[0], periods[1], 'search_start_date', 'search_end_date', default_date);

        // set active class
        $('.btn-set-search-date').removeClass('active');
        $(this).addClass('active');
    });

    // 자동로그인 버튼 클릭
    $('.btn-auto-login').on('click', function() {
        var target_idx = $(this).data('mem-idx');

        if (typeof (target_idx) === 'undefined' || target_idx === '') {
            alert('회원 정보가 없습니다.');
            return;
        }

        if (confirm('해당 회원님 계정으로 자동로그인하시겠습니까?')) {
            window.open('/member/manage/setMemberLogin/' + target_idx, '_blank');
        }
    });

    // 쪽지, SMS, 메일발송 버튼 클릭
    $('.btn-message, .btn-sms, .btn-mail').on('click', function() {
        var evt_type = '', evt_name = '';
        var target_idx = $(this).data('mem-idx');

        if ($(this).prop('class').indexOf('btn-message') > -1) {
            evt_type = 'message';
            evt_name = '쪽지';
        } else if ($(this).prop('class').indexOf('btn-sms') > -1) {
            evt_type = 'sms';
            evt_name = 'SMS';
        } else {
            evt_type = 'mail';
            evt_name = '메일';
        }

        if (typeof (target_idx) === 'undefined') {
            target_idx = [];
            $('.target-crm-member:checked').each(function() {
                if ($.inArray($(this).data('mem-idx'), target_idx) === -1) {
                    target_idx.push($(this).data('mem-idx'));
                }
            });
            target_idx = target_idx.join(',');
        }

        if (target_idx === '') {
            alert(evt_name + '를 발송하실 회원을 선택해 주세요.');
            return false;
        }

        if (confirm('선택한 대상자에게 ' + evt_name + '를 발송하시겠습니까?')) {
            if (evt_type === 'mail') {
                window.open('/crm/mail/createSend/?target_idx='+target_idx, '_blank');
            } else {
                $('.btn-' + evt_type).setLayer({
                    url: '/crm/' + evt_type + '/createSendModal?target_idx=' + target_idx,
                    width: 1200,
                    modal_id: 'message_modal'
                });
            }
        } else {
            return false;
        }
    });
}

function init_board() {
    // 기본 검색 값 셋팅
    $(document).on('click', '#btn_search_setting', function() {
        var _url = '/sys/adminSettings/searchSetting';

        if (!confirm('현재의 검색 상태로 저장하시겠습니까?')) {
            return;
        }

        ajaxSubmit($search_form, _url, function(ret) {
            if(ret.ret_cd) {
                notifyAlert('success', '알림', ret.ret_msg);
                location.reload();
            }
        }, showValidateError, null, false, 'alert');
    });
}

// 첨부파일 찾아보기 버튼 Script
function init_file() {
    var $fileBox = $('.filetype');

    $fileBox.each(function() {
        var $fileUpload = $(this).find('.input-file'),
            $fileText = $(this).find('.file-text').attr('disabled', 'disabled'),
            $fileReset = $(this).find('.file-reset');

        $fileUpload.on('change', function() {
            var fileName = $(this).val();
            $fileText.attr('disabled', 'disabled').val(fileName);
        });

        $fileReset.click(function() {
            $(this).parents($fileBox).find($fileText).val('');
            $(this).parents($fileBox).find($fileUpload).val('');
        });
    });
}

/**
 * onload event
 */
$(document).ready(function() {
    init_sidebar();
    init_InputMask();
    init_datetimepicker();
    init_compose();
    init_iCheck();
    init_iCheck_datatable();
    init_magnificPopup();
    init_datatable();
    init_base();
    init_board();
    init_file();
});


function fnViewMember($MemIdx)
{
    popupOpen('/member/manage/detail_popup/'+$MemIdx, 'MemberInfo',
        1200, 800,
        null, null,
        'yes', 'no');
}