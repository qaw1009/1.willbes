// GNB 버튼 Script
$(function() {
    if (typeof ($.fn.bxSlider) === 'undefined') {
        return;
    }

    var gnb_sub_silder = $('#Gnb .sliderViewWrap .sliderView > div').bxSlider({
        auto: true,
        controls: false,
        pause: 3000
    });

    $('.toggle-Btn a').click(function() {
        if($('#Gnb').hasClass('Gnb-md')) {
            $('.NGR.Gnb-md').attr('class','NGR Gnb-sm');
            $('.toggle-Btn').attr('class','toggle-Btn gnb-Open');
            $('.toggle-Btn .Txt').text('열기');
            $('#Gnb .logo img').attr('src','/public/img/willbes/gnb/logo_sm.gif');
            $('#Gnb .setting img').attr('src','/public/img/willbes/gnb/icon_setting_sm.gif');
            $('#Gnb .intro img').attr('src','/public/img/willbes/gnb/icon_intro_sm.gif');
        } else {
            $('.NGR.Gnb-sm').attr('class','NGR Gnb-md');
            $('.toggle-Btn').attr('class','toggle-Btn gnb-Close');
            $('.toggle-Btn .Txt').text('숨김');
            $('#Gnb .logo img').attr('src','/public/img/willbes/gnb/logo.gif');
            $('#Gnb .setting img').attr('src','/public/img/willbes/gnb/icon_setting.gif');
            $('#Gnb .intro img').attr('src','/public/img/willbes/gnb/icon_intro.gif');

            // slider redraw
            if (typeof gnb_sub_silder != 'undefined') {
                gnb_sub_silder.redrawSlider();
            }
        }
    });
});

// GNB dropdown Script
$(function() {
    $('.topView ul li.dropdown').mouseover(function(){
        $(this).addClass('active');
    });
    $('.topView ul li.dropdown').mouseleave(function(){
        $(this).removeClass('active');
    });
});

// GNB 아코디언 메뉴 Script
/*
$(function() {
    $('div.gnb-List-Tit').hover(function() {
        $(this).siblings('hover').removeClass('hover');

        if ($(this).next().is(':visible')) {
            $(this).removeClass('hover');

        } else {
            $('div.gnb-List-Depth').slideUp('normal');
            $(this).next().slideDown('normal');
            $(this).addClass('hover');

        }
    });
});
*/

// GNB 사이트 메뉴 클릭 이벤트로 변경
$(function() {
    $('div.gnb-List-Tit').click(function() {
        $(this).siblings('hover').removeClass('hover');

        if ($(this).next().is(':visible')) {
            $(this).removeClass('hover');
            $('div.gnb-List-Depth').slideUp('normal');
        } else {
            $('div.gnb-List-Depth').slideUp('normal');
            $(this).next().slideDown('normal');
            $(this).addClass('hover');
        }
    });
});

// GNB 영역 마우스 벗어날 경우 메뉴 접기
$(function() {
    $('#Gnb').mouseleave(function() {
        $('div.gnb-List-Tit').siblings('hover').removeClass('hover');
        $('div.gnb-List-Tit').removeClass('hover');
        $('div.gnb-List-Depth').slideUp('normal');
    });
});

// LNB 아코디언 메뉴 Script
$(function() {
    $('div.lnb-List-Tit').click(function() {
        $('div.lnb-List-Tit').removeClass('hover');

        if ($(this).next().is(':visible')) {
            $(this).next().slideUp('normal');
            $(this).removeClass('hover');

        } else {
            $('div.lnb-List-Depth').slideUp('normal');
            $(this).next().slideDown('normal');
            $(this).addClass('hover');

        }   
    });
});

// checkbox 필수체크버튼(전체동의) Script
$(function() {
    $('.AllchkBox .chkBox-Agree input:checkbox').change(function() {
        if($(this).is(":checked")) {
            $('.chkBox-Agree').addClass("checked");
            $('.chkBox-Agree input').prop('checked', true);
        } else {
            $('.chkBox-Agree').removeClass("checked");
            $('.chkBox-Agree input').prop('checked', false);
        }
    });
});

// checkbox 필수체크버튼(개별동의) Script
$(function() {
    $('.chkBox-Agree input:checkbox').click(function() {
        var $chk_box = $(this).parents('.chk').find('input:checked');

        if ($chk_box.is(':checked')) {
            $(this).parents('.chkBox-Agree').addClass("checked");
        } else {
            $(this).parents('.chkBox-Agree').removeClass("checked");
        }
    });
});

// 닫기 Script
function closeWin(divID) {
    document.getElementById(divID).style.display = "none";
}

// 열기 Script
function openWin(divID) {
    document.getElementById(divID).style.display = "block";  
}

// Top Script
function goTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

// 멤버십 페이지 Body Class 추가
$('*[class*=memContainer]:visible').ready(function() {
    if ($('#Container').hasClass('memContainer')) {
        $('body').addClass('memBody');
    } else {
        $('body').removeClass('memBody');
    }
});

// datepicker 설정
$(function() {
    if (typeof ($.fn.datepicker) !== 'undefined') {
        // datepicker default setting
        $.fn.datepicker.dates['kr'] = {
            days: ["일요일", "월요일", "화요일", "수요일", "목요일", "금요일", "토요일"],
            daysShort: ["일", "월", "화", "수", "목", "금", "토"],
            daysMin: ["일", "월", "화", "수", "목", "금", "토"],
            months: ["1월", "2월", "3월", "4월", "5월", "6월", "7월", "8월", "9월", "10월", "11월", "12월"],
            monthsShort: ["1월", "2월", "3월", "4월", "5월", "6월", "7월", "8월", "9월", "10월", "11월", "12월"],
            today: "오늘",
            clear: "Clear",
            format: "yyyy-mm-dd",
            titleFormat: "yyyy MM", /* Leverages same syntax as 'format' */
            weekStart: 0
        };
        $.fn.datepicker.defaults.language = 'kr';
        $.fn.datepicker.defaults.autoclose = true;
        $.fn.datepicker.defaults.disableTouchKeyboard = true;

        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });
    }

    // 기간설정 버튼 클릭
    $('.btn-set-search-date').click(function() {
        var period = $(this).data('period');
        var periods = period.split('-');
        var default_date = $(this).data('default-date');

        // 날짜 설정
        setDefaultDatepicker(-periods[0], periods[1], 'search_start_date', 'search_end_date', default_date);

        // 설정된 날짜로 업데이트
        $('.datepicker').datepicker('update');

        // set active class
        $('.btn-set-search-date').removeClass('on');
        $(this).addClass('on');
    });
});

// 통합사이트 환경설정 적용 버튼 클릭
$(function() {
    $('#setting_form').on('click', 'button[name="btn_setting_apply"]', function() {
        var $setting_form = $('#setting_form');
        var domains = location.hostname.split('.');
        var domain = '.' + domains[domains.length - 2] + '.' + domains[domains.length - 1];

        // 즐겨찾기 추가
        if ($setting_form.find('input[name="add_favorite"]').is(':checked') === true) {
            addFavorite();
        }

        // 네비게이션 설정
        if ($setting_form.find('input[name="gnb_size"]:checked').length > 0) {
            $.cookie('_wb_client_gnb_size', $setting_form.find('input[name="gnb_size"]:checked').val(), {
                domain: domain,
                path: '/',
                expires: 31
            });

            alert('네비게이션 설정이 적용되었습니다.');
            location.reload();
        }

        closeWin('SettingForm');
    });
});

// 게시판 input enter 기능
$(function() {
    $('.labelSearch').on('keydown', function(e) {
        if(e.keyCode == 13) {
            var param_name = $(this).attr('name');
            goUrl(param_name, this.value);
        }
    });
});

/**
 * 바로가기 이벤트 팝업 [사용처 : 배너]
 * @param url
 */
function event_layer_popup(url) {
    var ele_id = 'APPLYPASS';
    var banner_idx = $(this).data('banner-idx');
    var data = {'ele_id' : ele_id, 'banner_idx' : banner_idx};
    sendAjax(url, data, function(ret) {
        $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
    }, null, false, 'GET', 'html');
}

/**
 * d-day 타이머
 * @param end_date
 * @param end_time
 * @param eleid_day
 * @param eleid_time
 * return 일자, 시:분:초
 */
function dDayTimer(end_date, end_time, eleid_day, eleid_time) {
    if(!end_time) end_time = '00:00';
    var dday = moment(end_date + ' ' + end_time + ':00', 'YYYY-MM-DD HH:mm:ss');
    var now, distance;
    var d, h, m, s, ms, now_ms;
    var dDayCountRepeat = setInterval(function(){
        now = moment().format('YYYY-MM-DD HH:mm:ss');
        distance = dday.diff(now, 'milliseconds');
        now_ms = moment().milliseconds();
        if (distance <= 0) {
            d=0;h=0;m=0;s=0;
            $('#'+eleid_day).html(0);
            $('#'+eleid_time).html('00:00:00 00');
            clearInterval(dDayCountRepeat);
        } else {
            d = Math.floor(distance / (1000 * 60 * 60 * 24));
            h = String(Math.floor((distance / (1000 * 60 * 60)) % 24)).padStart(2, "0");
            m = String(Math.floor((distance / (1000 * 60)) % 60)).padStart(2, "0");
            s = String(Math.floor((distance / 1000) % 60)).padStart(2, "0");
            ms = String(Math.floor((now_ms % 60) % 60)).padStart(2, "0");

            $('#'+eleid_day).html(d);
            $('#'+eleid_time).html(h + ':' + m + ':' + s + ' ' + ms);
        }
    }, 100);
}

// banner 버튼 : 버튼 타입이 youtube인 경우 호출
$(function() {
    $('.btnYoutubeLayerBox').on('click', function(e) {
        var youtube_code = $(this).data("youtube-code");
        var _html = '';
        _html += '<div><div id="hnyoutube" class="Layer-hnyoutube">';
        _html += '<a class="closeBtn" href="javascript:void(0);" onclick="initOpenLayerYoutubeBox()">';
        _html += '<img src="/public/img/willbes/prof/close.png">';
        _html += '</a>';
        _html += '<iframe src="https://www.youtube.com/embed/'+youtube_code+'?rel=0&modestbranding=1&showinfo=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        _html += '</div>';
        _html += '<div id="sec-hnyou-layer" class="willbes-Layer-Black"></div></div>';

        //최상위 DIV기준으로 append
        $("#Container").append(_html);
        openWin('sec-hnyou-layer');openWin('hnyoutube');
    });
});

function initOpenLayerYoutubeBox() {
    $(".Layer-hnyoutube").parent("div").remove();
}