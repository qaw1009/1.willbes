//GNB 버튼 Script
$(function() {
    $('.toggle-Btn a').click(function() {
        if( $("#Gnb").hasClass("Gnb-md") ) {
            $(".NSK.Gnb-md").attr('class','NSK Gnb-sm');
            $(".toggle-Btn").attr('class','toggle-Btn gnb-Open');
            $(".toggle-Btn .Txt").text('열기');
            $("#Gnb .logo img").attr('src','/public/img/willbes/gnb/logo_sm.gif')
            $("#Gnb .setting img").attr('src','/public/img/willbes/gnb/icon_setting_sm.gif');
            $("#Gnb .intro img").attr('src','/public/img/willbes/gnb/icon_intro_sm.gif');
        }
        else
        {
            $(".NSK.Gnb-sm").attr('class','NSK Gnb-md');
            $(".toggle-Btn").attr('class','toggle-Btn gnb-Close');
            $(".toggle-Btn .Txt").text('숨김');
            $("#Gnb .logo img").attr('src','/public/img/willbes/gnb/logo.gif');
            $("#Gnb .setting img").attr('src','/public/img/willbes/gnb/icon_setting.gif');
            $("#Gnb .intro img").attr('src','/public/img/willbes/gnb/icon_intro.gif');
        }
    });
});

// Slider Script
$(function() {
    $('.slider').bxSlider({
        auto: true,
        controls: false,
        pause: 3000,
    });
});

// Slider Number Script
$(function() {
    $('.sliderNum').bxSlider({
        auto: true,
        controls: true,
        pause: 3000,
        pager: true,
        pagerType: 'short',
        moveSlides:1,
    });
});

// Slider Number Script (수동)
$(function() {
    $('.sliderNumTM').bxSlider({
        auto: false,
        controls: true,
        pause: 3000,
        pager: true,
        pagerType: 'short',
        moveSlides:1,
    });
});

// Slider Controls Script
$(function() {
    $('.sliderControls').bxSlider({
        auto: true,
        controls: true,
        pause: 3000,
        pager: false,
    });
});

// Slider Vertical Script
$(function() {
    $('.sliderVertical').bxSlider({
        mode: 'vertical', 
        auto: true,
        controls: false,
        infiniteLoop: true,
        slideWidth: 370,
        minSlides: 1,
        pause: 3000,
        pager: false,
    });
});

// Slider Main Script
$(function(){ 
    $(".MaintabSlider").bxSlider({
        mode:'fade',
        speed:400,
        pause:2000,
        auto : true,	
        autoHover: true,						
        pagerCustom: '#MainRollingDiv',
        controls:false, 
        onSliderLoad: function(){
            $("#MainRollingSlider").css("visibility", "visible").animate({opacity:1}); 
        }
    });
});
                

/**
 * slider util
 * @param ele_id
 * @param type
 * @param pause_sec
 */
function slider(ele_id, type, pause_sec) {
    var pasue_msec = pause_sec * 1000;
    // slider option
    var option = { auto: true, controls: false, pause: pasue_msec };
    switch (type) {
        case 'cSlider' :
                option = { auto: true, controls: true, pause: pasue_msec, pager: false };
            break;
        case 'nSlider' :
                option = { auto: true, controls: true, pause: pasue_msec, pager: true, pagerType: 'short', moveSlides: 1 };
            break;
        case 'vSlider' :
                option = { mode: 'vertical', auto: true, controls: false, pause: pasue_msec, pager: false, minSlides: 1 };
            break;
        case 'nSliderTM' :
            option = { mode: 'vertical', auto: false, controls: false, pause: pasue_msec, pager: false, minSlides: 1 };
        break;
    }

    $('#' + ele_id).bxSlider(option);
}

// GNB 아코디언 메뉴 Script
$(function() {
    $('div.gnb-List-Tit').hover(function() {

        $(this).siblings('hover').removeClass('hover')

        if ($(this).next().is(':visible')) {
            $(this).removeClass('hover');

        } else {
            $('div.gnb-List-Depth').slideUp('normal');
            $(this).next().slideDown('normal');
            $(this).addClass('hover');

        }    
    });
});

// LNB 아코디언 메뉴 Script
$(function() {
    $('div.lnb-List-Tit').click(function() {

        $('div.lnb-List-Tit').removeClass('hover')

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
    $('.AllchkBox .chkBox-Agree input:checkbox').change(function(){
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
    $('.chkBox-Agree input').click(function() {
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

        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd'
        });
    }
});
