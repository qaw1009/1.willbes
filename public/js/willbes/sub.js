// 교수 페이지 nth-child(4n)
$(function() {
    $('ul li.profList:nth-child(4n)').addClass('nth');
});

// 교수 선택 페이지 nth-child(8n+1)
$(function() {
    $('ul.sbjProf li:nth-child(5n+1)').addClass('nth');
});

// 교재정보 전체보기 버튼 Script
$(function() {
    $('.willbes-Lec-Subject .MoreBtn a').click(function() {
        var $lec_info_table = $('.willbes-Lec-Table .lecInfoTable');
        var $lec_into_btn = $('.willbes-Lec-Table .w-notice .MoreBtn a');
        var $lec_into_btn_txt = $('.willbes-Lec-Subject .MoreBtn a span');
        
        if ($(this).hasClass('on')) {
            $lec_info_table.hide().css('display','none');
            $lec_into_btn_txt.text('전체보기 ▼');
            $(this).removeClass('on');
            $lec_into_btn.text('교재정보 보기 ▼');
            $('.willbes-Lec-Table').removeClass('active');
        } else {
            $lec_info_table.show().css('display','block');
            $lec_into_btn_txt.text('전체닫기 ▲');
            $(this).addClass('on');
            $('.willbes-Lec-Table').addClass('active');
            $lec_into_btn.text('교재정보 닫기 ▲');
        }
    });
});

// 교재정보 보기 버튼 Script
$(function() {
    $('.willbes-Lec-Table .w-notice .MoreBtn a').click(function() {
        var $lec_info_table = $(this).parents('.willbes-Lec-Table').find('.lecInfoTable');

        if ($lec_info_table.is(':hidden')) {
            $lec_info_table.show().css('display','block');
            $(this).text('교재정보 닫기 ▲');
        } else {
            $lec_info_table.hide().css('display','none');
            $(this).text('교재정보 보기 ▼');
        }
    });
});

// 교재정보 보기(학원) 버튼 Script
$(function() {
    $('.willbes-Lec-Table .w-info.acad a').click(function() {
        var $lec_info_table = $(this).parents('.willbes-Lec-Table').find('.lecInfoTable');
        var $lec_info = $(this).parents('.willbes-Lec-Table');

        if ($lec_info_table.is(':hidden')) {
            $lec_info_table.show().css('display','block');
            $lec_info.addClass('active');
        } else {
            $lec_info_table.hide().css('display','none');
            $lec_info.removeClass('active');
        }
    });
});


// 강의 > 온라인 수강신청, 학원강좌 수강신청 안내 버튼 Script
$(function() {    
    $('#requestInfo a').click(function() {
        $('.InfoBtn a').removeClass('on').attr("onclick","openWin('requestInfo')");
    });
});

// 유의사항안내보기 버튼 Script
$(function() {
    $('.willbes-Cart-Txt .MoreBtn a').click(function() {
        var $lec_info_table = $(this).parents('.willbes-Cart-Txt').find('table.txtTable');
        var $lec_info_table_tr = $(this).parents('.willbes-Cart-Txt').find('table.txtTable tr');

        if( $lec_info_table_tr.is(':visible')) {
            $lec_info_table_tr.attr('style', 'display: none; !important');
            $lec_info_table.addClass('off');
            $(this).text('유의사항안내 보기 ▼');
            $.cookie('moreInfo', 'off', { expires: 7 });
        } else {
            $lec_info_table_tr.attr('style', 'display: block; !important');
            $lec_info_table.removeClass('off');
            $(this).text('유의사항안내 닫기 ▲');
            $.cookie('moreInfo', 'on', { expires: 7 });
        }
    });
});

// 즐찾과목/교수전체보기 버튼 Script
$(function() {
    $('.CurriBox .MoreBtn a').click(function() {
        var $lec_info_table = $(this).parents('.tabLink').find('table.curriTable');

        if ($lec_info_table.is(':hidden')) {
            $lec_info_table.show().css('display','block');
            $(this).text('즐찾과목/교수전체보기 ▲');
        } else {
            $lec_info_table.hide().css('display','none');
            $(this).text('즐찾과목/교수전체보기 ▼');
        }
    });
});

// 내강의실 온라인강좌 버튼 Script
$(function() {
    $('.willbes-Package-Table .MoreBtn a').click(function() {
        var $lec_info_table = $(this).parents('.willbes-Package-Table').find('.packInfoTable');

        if ($lec_info_table.is(':hidden')) {
            $lec_info_table.show().css('display','block');
            $(this).text('강좌 닫기 ▲');
        } else {
            $lec_info_table.hide().css('display','none');
            $(this).text('강좌 열기 ▼');
        }
    });
});

// 즐겨찾는 고객센터 버튼 Script
$(function() {
    $('.ActIndex1 .center-Btn a').click(function() {
        if ($(this).hasClass('on')) {
            $(this).removeClass('on').text('서비스별 고객센터 전체보기 ▼').attr("onclick","openWin('CScenter')");
        } else {
            $(this).addClass('on').text('서비스별 고객센터 전체보기 ▲').attr("onclick","closeWin('CScenter')");
        }
    });
    $('#CScenter.willbes-Layer-CScenterBox a').click(function() {
        $('.ActIndex1 .center-Btn a').removeClass('on').text('서비스별 고객센터 전체보기 ▼').attr("onclick","openWin('CScenter')");

    });
});

// 나의 예약현황 버튼 Script
$(function() {
    $('.reserveTable .MoreBtn a').click(function() {
        var $lec_info_table = $(this).parents('.reserveTableList').find('.reserveTable');
        var $lec_info_btn = $(this).parents('.PASSZONE-Lec-Section').find('.MoreBtn a');

        if ($lec_info_table.hasClass('on')) {
            $('.reserveTable').addClass('on');
            $lec_info_btn.text('보기 ▼');
            $lec_info_table.removeClass('on');
            $(this).text('닫기 ▲');
        } else {
            $lec_info_table.addClass('on');
            $(this).text('보기 ▼');
        }
    });
});

// 첨삭강좌 채점결과 모달팝업 Script
function markInfoModal(ele_id, tabId) {
    $('#' + ele_id).show().css('display', 'block').trigger('create');
    $('ul.tabWrap').find('#' + tabId).click(); 
}

// 나의 과제제출 버튼 Script
$(function() {
    $('.editTable .MoreBtn a').click(function() {
        var $lec_info_table = $(this).parents('.PASSZONE-Lec-Section').find('.editTableList');

        if ($lec_info_table.hasClass('hover')) {
            $lec_info_table.removeClass('hover');
            $('.editTable .MoreBtn a .txt').text('열기');
            $('.editTableList tr.editCont').css('display','none');
            
        } else {
            $lec_info_table.addClass('hover');
            $('.editTable .MoreBtn a .txt').text('닫기');
            $('.editTableList.hover tr.editCont').css('display','');
        }
    });
});

// 장바구니 상품정보 Script
$(function() {
    $('td.w-list a').click(function(){
        if($('.willbes-Layer-Box-sm').is(':hidden')) {
            $('td.w-list a img.dot').css('display','none');
        } else {
            $('td.w-list a img.dot').css('display','inline');
        }
    });
});

// 수강후기 리스트 Script
$(function() {
    $('tr.replyList').click(function() {
        $('tr.replyList').removeClass('hover');

        if ($(this).next().is(':visible')) {
            $(this).next().hide();
            $(this).removeClass('hover');
        } else {
            $('tr.replyTxt').hide();
            $(this).next().show();
            $(this).addClass('hover');
        }   
    });
});

// 약관동의 리스트 Script
$(function() {
    $('.Member .agree-Chk .agree-Tit').click(function() {

        $('.Member .agree-Chk .agree-Tit').removeClass('hover');
        $('.arrow').text('▼');
        
        $btn_arrow = $(this).parents('.chk').find('.arrow');

        if ($(this).next().is(':visible')) {
            $(this).next().hide();
            $btn_arrow.text('▼');
            $(this).removeClass('hover');
        } else {
            $('.Member .agree-Chk .agree-Txt').hide();
            $(this).next().show();
            $btn_arrow.text('▲');
            $(this).addClass('hover');
        }   
    });
});

// 자주하는 질문 메뉴 Script
$(function() {
    $('.tabcsDepth2 li a.qBox').click(function() {
        $('.tabcsDepth2 li .subBox').removeClass('on');

        if ($(this).hasClass('on')) {
            $(this).next().removeClass('on');
        } else {
            $(this).next().addClass('on');
        }   
    });
});

// 레이어 팝업 위치 Script
$(function() {
    $('.w-info dt strong, .open-info-modal').click(function() {
        var $target_layer = $('.willbes-Layer-Box');

        if($target_layer.css('display','')) {
            var left = 0;
            var top = $(this).parents('.willbes-Lec-Table').position().top + 120;

            $target_layer.css({
                'top': top,
                'left': left,
                'position': 'absolute'
            });
        } else {
            $(this).parents('.willbes-Lec-Table').find('.willbes-Layer-Box').css('display','none').hide();
        }
    });
});

// 첨부파일 찾아보기 버튼 Script
$(function() {
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
});

// 동영상 플레이어 버튼 Script
$(function() {
    $('.videoPopup .btnList a.iconBtn').click(function() {
        var $btn_icon = $(this).parents('li').find('a.iconBtn');

        if ($(this).hasClass('on')) {
            $btn_icon.removeClass('on');
        } else {
            $btn_icon.addClass('on');
        }   
    });
});

// 썸네일 더보기 Script
$(function() {
    $('.w-thumb a.thumb_num').mouseover(function(){
        $('.thumb_slide_wrap').css('display','none');

        var $thumb_table = $(this).parents('.w-thumb').find('.thumb_slide_wrap');
        var n = $(this).parents('.w-thumb').find('.thumb_slide_wrap ul li').length;
        var width = parseInt(n)* 170 + 6;

        $thumb_table.addClass('rollover').css('width', width).show();
    });
    $('.thumb_slide_wrap').mouseleave(function(){
        var $thumb_table = $(this).parents('.w-thumb').find('.thumb_slide_wrap');
        $thumb_table.removeClass('rollover').hide();
    });
});

// 가이드 Script
$(function() {
    $('.toggleCont .toggleContList:last-child').addClass('last');
    $('.toggleCont .toggleContList.last .inner_txt:last-child').addClass('last_txt');
    $('.tTitle').click(function() {
        var $cont = $(this).parents('.toggleContList').find('.tContWp');

        if ($(this).parents('.toggleContList').hasClass('show')) {
            $(this).parents('.toggleContList').removeClass('show');
            $cont.hide();
        } else {
            $(this).parents('.toggleContList').addClass('show');
            $cont.show();
        }   
    });
});

// star rating Script //
$(document).ready(function(){
    /* 1. Visualizing things on Hover - See next part for action on click */
    $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
        if (e < onStar) {
        $(this).addClass('hover').removeClass('none');
        }
        else {
        $(this).removeClass('hover').addClass('none');
        }
    });

    }).on('mouseout', function(){
        $(this).parent().children('li.star').each(function(e){
            $(this).removeClass('hover').removeClass('none');
        });
    });

    /* 2. Action to perform on click */
    $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');

    for (i = 0; i < stars.length; i++) {
        $(stars[i]).removeClass('selected');
    }

    for (i = 0; i < onStar; i++) {
        $(stars[i]).addClass('selected');
    }

    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    var msg = "";
    if (ratingValue > 1) {
        msg = ratingValue;
    }
    else {
        msg = ratingValue;
    }
    responseMessage(msg);
    });
});

function responseMessage(msg) {
    $('.success-box').fadeIn(200);  
    $('.success-box div.text-message').html(msg);
}

// scroll position Script
function fnMove(seq){
    var offset = $("#pos" + seq).offset();
    $('html, body').animate({scrollTop : offset.top}, 0);
}

// scroll top fixed Script
function movePos(divId){
    var hrefTop = $(divId).offset().top;
    var hrefTopPos = hrefTop - 45;

    $('html, body').animate({
        scrollTop: hrefTopPos
    }, 200);
}

$('*[id*=Sticky]:visible').ready(function() {
    var stickyOffset = $('.sticky-Grid').offset();

    if (typeof stickyOffset !== 'undefined') {
        $(window).scroll(function () {
            if ($(document).scrollTop() > stickyOffset.top) {
                $('.sticky-Grid').addClass('fixed');
            } else {
                $('.sticky-Grid').removeClass('fixed');
            }
        });
    }
});



// 사이트 메인 퀵 배너 스크롤 이벤트
$('*[id*=QuickMenu]:visible').ready(function() {
    var stickyOffset = $('#QuickMenu').offset();

    if (typeof stickyOffset !== 'undefined') {
        $(window).scroll(function () {
            if ($(document).scrollTop() > stickyOffset.top) {
                $('#QuickMenu').css('top', '20px');
            } else {
                $('#QuickMenu').css('top', '180px');
            }
        });
    }
});

/*
// 타이머 이벤트 페이지와 겹쳐서 주석처리
var DdayDiff = { //타이머를 설정합니다.
    inDays: function(dd1, dd2) {
        var tt2 = dd2.getTime();
        var tt1 = dd1.getTime();

        return Math.floor((tt2-tt1) / (1000 * 60 * 60 * 24));
    },

    inWeeks: function(dd1, dd2) {
        var tt2 = dd2.getTime();
        var tt1 = dd1.getTime();

        return parseInt((tt2-tt1)/(24*3600*1000*7));
    },

    inMonths: function(dd1, dd2) {
        var dd1Y = dd1.getFullYear();
        var dd2Y = dd2.getFullYear();
        var dd1M = dd1.getMonth();
        var dd2M = dd2.getMonth();

        return (dd2M+12*dd2Y)-(dd1M+12*dd1Y);
    },

    inYears: function(dd1, dd2) {
        return dd2.getFullYear()-dd1.getFullYear();
    }
}

function daycountDown() {
    //event_day = new Date(2016,4,6,23,59,59);
    // 한달 전 날짜로 셋팅 
    event_day = new Date(2019,2,15,16,59,59);
    now = new Date();
    var timeGap = new Date(0, 0, 0, 0, 0, 0, (event_day - now)); 
    
    var Monthleft = event_day.getMonth() - now.getMonth();
    var Dateleft = DdayDiff.inDays(now, event_day);
    var Hourleft = timeGap.getHours();
    var Minuteleft = timeGap.getMinutes(); 
    var Secondleft = timeGap.getSeconds();

    //alert(Monthleft+"-"+Dateleft+"-"+Hourleft+"-"+Minuteleft+"-"+Secondleft)

    if((event_day.getTime() - now.getTime()) > 0) {
        $("#dd1").attr("src", "/public/img/willbes/cop/number/" + parseInt(Dateleft/10) + ".png");
        $("#dd2").attr("src", "/public/img/willbes/cop/number/" + parseInt(Dateleft%10) + ".png");

        $("#hh1").attr("src", "/public/img/willbes/cop/number/" + parseInt(Hourleft/10) + ".png");
        $("#hh2").attr("src", "/public/img/willbes/cop/number/" + parseInt(Hourleft%10) + ".png");

        $("#mm1").attr("src", "/public/img/willbes/cop/number/" + parseInt(Minuteleft/10) + ".png");
        $("#mm2").attr("src", "/public/img/willbes/cop/number/" + parseInt(Minuteleft%10) + ".png");

        $("#ss1").attr("src", "/public/img/willbes/cop/number/" + parseInt(Secondleft/10) + ".png");
        $("#ss2").attr("src", "/public/img/willbes/cop/number/" + parseInt(Secondleft%10) + ".png");
        setTimeout(daycountDown, 1000);
    }
    else{
        $("#newTopDday").hide();
    }

}
daycountDown();
// End 타이머
*/

// image flipped
$(document).ready(function(){
    $(".Flipped ul li a").mouseenter(function(){
        var $img_hover = $(this).parents('li');

        setTimeout(function(){
            $img_hover.addClass("flipped");
        }, 150);
    });
    $(".Flipped ul li a").mouseleave(function(){
        var $img_hover = $(this).parents('li');

        setTimeout(function(){
            $img_hover.removeClass("flipped");
        }, 150);
    });
});
