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

// GNB Menu Script
//$(function() {
    //var sBtn = $(".gnb-List > .gnb-List-Tit");    //  ul > li 이를 sBtn으로 칭한다. (클릭이벤트는 li에 적용 된다.)
        //sBtn.find("a").click(function(){   // sBtn에 속해 있는  a 찾아 클릭 하면.
        //sBtn.removeClass("active");     // sBtn 속에 (active) 클래스를 삭제 한다.
        //$(this).parent().addClass("active"); // 클릭한 a에 (active)클래스를 넣는다.
    //})
//})

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

// checkbox 필수체크버튼 Script
$(function() {
    $('.chkBox-Agree input:checkbox').change(function(){
        if($(this).is(":checked")) {
            $('.chkBox-Agree').addClass("checked");
        } else {
            $('.chkBox-Agree').removeClass("checked");
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
