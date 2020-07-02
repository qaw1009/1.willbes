@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; font-size:14px; line-height:1.5;}
    .evtCtnsBox img {width:100%; max-width:720px;}

    .evtTop {position:relative;}
    .roulette_start img{width:125px;height:125px;position:absolute;left:50%;top:66%;margin-left:-63px;}

    .evt01 {position:relative;}
    .roulette_join img{width:90px;height:39px;position:absolute;left:50%;top:41%;margin-left:-45px;}
    .roulette_finger img {width:60px;height:80px;position:absolute;left:50%;top:41%;margin-left:25px;}

    .evt02 {}

    .evt03 {position:relative;}  
    .roulette_reservation img{width:173px;height:35px;position:absolute;left:50%;top:88.5%;margin-left:-10px;}
    

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
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1698m_top.jpg" alt="룰렛 이벤트" >
        <div class="roulette_start">
            <a href="https://njob.willbes.net/promotion/index/cate/3114/code/1698" target="_blank" >
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1698m_start.png" alt="룰렛 스타드">
            </a>
        </div> 
    </div>  
   
    <div class="evtCtnsBox evt01">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1698m_01.jpg" alt="참여 방법" >
        <div class="roulette_join">
            <a href="https://www.willbes.net/member/join/?ismobile=1&sitecode=2014" target="_blank" >
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1698m_join.png" alt="룰렛 신규가입하기">
            </a>
        </div> 
        <div class="roulette_finger">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1698m_finger.png" alt="손가락">           
        </div> 
    </div>

    <div class="evtCtnsBox evt02">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1698m_02.jpg" alt="금손을 찾아라" >
    </div>

    <div class="evtCtnsBox evt03">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1698m_03.jpg" alt="사전 예약하기" >
        <div class="roulette_reservation">
            <a href="https://njob.willbes.net/m/promotion/index/cate/3114/code/1664" target="_blank" >
                <img src="https://static.willbes.net/public/images/promotion/2020/07/1698m_reservation.png" alt="서전예약하기">
            </a>
        </div> 
    </div>
</div>
<!-- End Container -->
@stop