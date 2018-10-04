// 교수 페이지 nth-child(4n)
$(function() {
    $('ul li.profList:nth-child(4n)').addClass('nth');
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
    $('.w-info dt strong').click(function() {

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
