//GNB 버튼 Script
$(function() {
    $('.toggle-Btn a').click(function() {
        if( $("#Gnb").hasClass("Gnb-md") ) {
            $(".NSK.Gnb-md").attr('class','NSK Gnb-sm');
            $(".toggle-Btn").attr('class','toggle-Btn gnb-Open');
            $(".toggle-Btn .Txt").text('열기');
            $("#Gnb .logo img").attr('src','/public/img/front/gnb/logo_sm.gif')
            $("#Gnb .setting img").attr('src','/public/img/front/gnb/icon_setting_sm.gif');
            $("#Gnb .intro img").attr('src','/public/img/front/gnb/icon_intro_sm.gif');
        }
        else
        {
            $(".NSK.Gnb-sm").attr('class','NSK Gnb-md');
            $(".toggle-Btn").attr('class','toggle-Btn gnb-Close');
            $(".toggle-Btn .Txt").text('숨김');
            $("#Gnb .logo img").attr('src','/public/img/front/gnb/logo.gif');
            $("#Gnb .setting img").attr('src','/public/img/front/gnb/icon_setting.gif');
            $("#Gnb .intro img").attr('src','/public/img/front/gnb/icon_intro.gif');
        }
    });
});

// 로그인폼 Depth Script
$(function() {
    $('.loginDepth .myLog .joinUs').hover(function() {
        if( $(".joinUs-Box").is(":hidden") ) {
            $(".joinUs-Box").fadeIn(200);
        }
        else
        {
            $(".joinUs-Box").fadeOut(200);
        }
    });
});
$(function() {
    $('.loginDepth .myLog .myPage').hover(function() {
        if( $(".myPage-Box").is(":hidden") ) {
            $(".myPage-Box").fadeIn(200);
        }
        else
        {
            $(".myPage-Box").fadeOut(200);
        }
    });
});

// GNB 아코디언 메뉴 Script
$(function() {
    $('div.gnb-List-Tit').click(function() {
        
        $(this).siblings('.active')
            .removeClass('active')

        if($(this).next().is(':visible')) {
            $('div.gnb-List-Depth').slideUp('normal');
            $(this).removeClass("active");

        } else {
            $('div.gnb-List-Depth').slideUp('normal');    
            $(this).next().slideDown('normal');
            $(this).addClass("active"); 

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
