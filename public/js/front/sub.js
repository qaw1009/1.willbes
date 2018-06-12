// 교재정보 전체보기 버튼 Script
$(function() {
    $('.willbes-Lec-Subject .MoreBtn a').click(function() {
        if( $(".willbes-Lec-Table").is(":hidden") ) {
            $(".willbes-Lec-Table").css("display","block");
            $(".willbes-Lec-Subject .MoreBtn a").text("교재정보 전체닫기 ▲");
        }
        else
        {
            $(".willbes-Lec-Table").css("display","none");
            $(".willbes-Lec-Subject .MoreBtn a").text("교재정보 전체보기 ▼");
        }
    });
});

// 교재정보 보기 버튼 Script
$(function() {
    $('.willbes-Lec-Table .w-notice .MoreBtn a').click(function() {
        if( $("table.lecInfoTable").is(":hidden") ) {
            $("table.lecInfoTable").css("display","block");
            $(".willbes-Lec-Table .w-notice .MoreBtn a").text("교재정보 닫기 ▲");
        }
        else
        {
            $("table.lecInfoTable").css("display","none");
            $(".willbes-Lec-Table .w-notice .MoreBtn a").text("교재정보 보기 ▼");
        }
    });
});

// checkbox 결제 버튼 Script
$(function() {
    $('.chk.buybtn input:checkbox').change(function(){
        if($(this).is(":checked")) {
            $('.willbes-Lec-buyBtn-sm').addClass("active");
        } else {
            $('.willbes-Lec-buyBtn-sm').removeClass("active");
        }
    });
});

// scroll top fixed Script
window.onscroll = function() {myFunction()};

var header = document.getElementById("sticky");
var sticky = header.offsetTop;

function myFunction() {
    if (window.pageYOffset >= sticky) {
        header.classList.add("fixed");
    } else {
        header.classList.remove("fixed");
    }
}
