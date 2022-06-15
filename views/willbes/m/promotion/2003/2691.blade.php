@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->

<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
    .evtCtnsBox img {width:100%; max-width:720px;}
    /*.evtCtnsBox a {border:1px solid #000}*/


    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px)  {   

    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 375px) and (max-width: 640px) {       

    }
    
    /* 태블릿 가로, PC */
    @@media only screen and (min-width: 641px) {
        
    }
</style>

<div id="Container" class="Container NSK c_both">  
    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2691m_top.jpg" alt="4월 신규가입 이벤트" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2691m_01.jpg" alt="경찰전문강의 20년" >
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2691m_02.jpg" alt="웰컴팩" >
        <a href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2001" target="_blank" title="웰컴팩 모두 받기" style="position: absolute; left: 7.5%; top: 82.5%; width: 85%; height: 8.71%; z-index: 2;"></a>
    </div> 

    <div class="evtCtnsBox" data-aos="fade-up">
        <img src="https://static.willbes.net/public/images/promotion/2022/06/2691m_03.jpg" alt="" >
    </div> 
    <div class="evtCtnsBox" data-aos="fade-up">
        <div class="wrap">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2691m_04.jpg" alt="" >
            <a href="https://cafe.naver.com/theprosecution" title="네이버카페" target="_blank" style="position: absolute;  left: 14.17%; top: 58.91%; width: 13.06%; height: 19.96%;  z-index: 2;"></a>
            <a href="https://www.youtube.com/channel/UC2J41ggwL4CTIJfoVBXsWkg" title="유튜브" target="_blank" style="position: absolute;  left: 35%; top: 58.91%; width: 13.06%; height: 19.96%;  z-index: 2;"></a>
            <a href="https://open.kakao.com/o/sm2o7cVd" title="카카오톡" target="_blank" style="position: absolute;  left: 53.31%; top: 58.91%; width: 13.06%; height: 19.96%; z-index: 2;"></a>
            <a href="https://www.instagram.com/willbes_prosecution_team/?r=nametag" title="인스타" target="_blank" style="position: absolute; left: 74.31%; top: 58.91%; width: 13.06%; height: 19.96%;  z-index: 2;"></a>   
        </div>  
    </div> 
</div>

<!-- End Container -->

<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );
</script>


@stop