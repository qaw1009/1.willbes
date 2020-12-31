@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .evtCtnsBox ul:after {content:""; display:block; clear:both}

    .evtTop {position:relative}

    .evtMenu {width:100%; border-bottom:2px solid #d9d9d9; border-top:1px solid #d9d9d9}
    .tabs {width:100%; max-width:720px; margin:0 auto;}
    .tabs li {display:inline; float:left; width:33.3333%}
    .tabs li a {display:block; text-align:center; font-size:16px; line-height:1.5; padding:15px 0; color:#000; font-weight:bold; letter-spacing:-1px;}
    .tabs li a.active {box-shadow:inset 0 -5px 0 rgba(0,0,0,1); color:#000}
    .tabs:after {content:""; display:block; clear:both}

    .embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } 
    .embed-container iframe, 
    .embed-container object, 
    .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
    
    .fixed {position:fixed; width:100%; left:0; z-index:10; border:0; opacity: .95;} 
    .fixed ul {width:100%; max-width:720px; margin:0 auto; background:rgba(255,255,255,0.5); background:#f3f3f3; box-shadow:0 10px 10px rgba(102,102,102,0.2);}    

    .evt02 a {position: absolute; width:20.14%; height:2.07%; z-index: 2;}
    .evt02 a.a01 {left: 15%; top: 21.31%;}
    .evt02 a.a02 {left: 40.28%; top: 21.35%;}
    .evt02 a.a03 {left: 65%; top: 21.16%;}
    .evt02 a.a04 {left: 23.75%; top: 32.67%;}
    .evt02 a.a05 {left: 57.5%; top: 32.79%;}
    .evt02 a.a06 {left: 22.92%; top: 39.12%;}
    .evt02 a.a07 {left: 57.08%; top: 39.16%;}
    .evt02 a.a08 {left: 24.58%; top: 50.56%;}
    .evt02 a.a09 {left: 57.08%; top: 50.56;}
    .evt02 a.a10 {left: 24.58%; top: 64.82%;}
    .evt02 a.a11 {left: 68.89%; top: 64.9%;}
    .evt02 a.a12 {left: 24.71%; top: 70.6%;}
    .evt02 a.a13 {left: 68.75%; top: 70.48%;}
    .evt02 a.a14 {left: 24.72%; top: 75.86%;}
    .evt02 a.a15 {left: 68.06%; top: 75.98%;}
    .evt02 a.a16 {left: 12.22%; top: 89.08%;}
    .evt02 a.a17 {left: 40.97%; top: 89.36%;}
    .evt02 a.a18 {left: 69.58%; top: 89.24%;}

    /* 폰 가로, 태블릿 세로*/
    @@media only all and (min-width: 408px)  {
   
    }

    /* 태블릿 세로 */
    @@media only all and (min-width: 768px) {
 
    }

    /* 태블릿 가로, PC */
    @@media only all and (min-width: 1024px) {
        
    }
</style>

<div id="Container" class="Container NSK c_both">       

    <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1971m_top.jpg" alt="대방고시" > 
    </div>  

    <div class="evtMenu">
        <ul class="tabs">
            <li><a href="#none;">기술직</a></li>
            <li><a href="/m/promotion/index/cate/3028/code/1999">세무직</a></li>
            <li><a href="/m/promotion/index/cate/3028/code/2003">조경직</a></li>
        </ul>
    </div> 
    
    <div class="evtCtnsBox evt01" >
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1971m_01.jpg" alt="라인업" >
    </div>

    <div class="evtCtnsBox evt02" >
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1971m_02.jpg" alt="수강신청"  >
        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/176362" target="_blank" alt="곽후근 기초" class="a01">
        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/176364" target="_blank" alt="곽후근 기본" class="a02">
        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/176366" target="_blank" alt="곽후근 심화" class="a03">
        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/176388" target="_blank" alt="기초 신송" class="a04">
        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/176390" target="_blank" alt="기초 신김" class="a05">
        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/176391" target="_blank" alt="심화 신송" class="a06">
        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/176393" target="_blank" alt="특채" class="a07">
        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/176367" target="_blank" alt="장재영 기초" class="a08">
        <a href="https://pass.willbes.net/m/package/show/cate/3028/pack/648001/prod-code/176370" target="_blank" alt="장재영 기본" class="a09">
        <a href="https://pass.willbes.net/m/professor/show/cate/3028/prof-idx/51162?subject_idx=1169" target="_blank" alt="곽후근" class="a10">
        <a href="https://pass.willbes.net/m/professor/show/cate/3028/prof-idx/51163?subject_idx=2129" target="_blank" alt="신영조" class="a11">
        <a href="https://pass.willbes.net/m/professor/show/cate/3028/prof-idx/51165?subject_idx=1182" target="_blank" alt="송연욱" class="a12">
        <a href="https://pass.willbes.net/m/professor/show/cate/3028/prof-idx/51164?subject_idx=1182" target="_blank" alt="김병일" class="a13">
        <a href="https://pass.willbes.net/m/professor/show/cate/3028/prof-idx/50395?subject_idx=2130" target="_blank" alt="하재남" class="a14">
        <a href="https://pass.willbes.net/m/professor/show/cate/3028/prof-idx/50541?subject_idx=1223" target="_blank" alt="장재영" class="a15">
        <a href="https://pass.willbes.net/promotion/index/cate/3028/code/1982" target="_blank" alt="전산직 패스" class="a16">
        <a href="https://pass.willbes.net/promotion/index/cate/3028/code/1982" target="_blank" alt="환경직 패스" class="a17">
        <a href="https://pass.willbes.net/promotion/index/cate/3028/code/1982" target="_blank" alt="산림자원직 패스" class="a18">
    </div>

</div>
<!-- End Container -->

<script type="text/javascript">
    /*스크롤고정*/
    $(function() {
        var nav = $('.evtMenu');
        var navTop = nav.offset().top+100;
        var navHeight = nav.height()+10;
        var showFlag = false;
        nav.css('top', -navHeight+'px');
        $(window).scroll(function () {
            var winTop = $(this).scrollTop();
            if (winTop >= navTop) {
                if (showFlag == false) {
                    showFlag = true;
                    nav
                        .addClass('fixed')
                        .stop().animate({'top' : '0px'}, 100);
                }
            } else if (winTop <= navTop) {
                if (showFlag) {
                    showFlag = false;
                    nav.stop().animate({'top' : -navHeight+'px'}, 100, function(){
                        nav.removeClass('fixed');
                    });
                }
            }
        });
    });

    $(window).on('scroll', function() {
        $('.top-tab').each(function() {
            if($(window).scrollTop() >= $('#'+$(this).data('tab')).offset().top) {
                $('.top-tab').removeClass('active')
                $(this).addClass('active');
            }
        });
    });

</script>

@stop