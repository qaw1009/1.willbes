@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; font-size:14px; line-height:1.5;}
    .evtCtnsBox img {width:100%; max-width:720px;}

    .evtTop {}
    .evt01 {}
    .evt03 {background:#ebebeb}  
    .evt03 div {padding:0 20px 80px}
    .evt03 div a {display:block; border-radius:30px; height:50px; line-height:50px; font-size:140%; font-weight:bold; color:#fff; background:#e72152}
    

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
        <a href="https://njob.willbes.net/promotion/index/cate/3114/code/1698" target="_blank" >
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1698m_top.jpg" alt="룰렛 이벤트" >
        </a> 
    </div>  
   
    <div class="evtCtnsBox evt01">
        <a href="https://www.willbes.net/member/join/?ismobile=1&sitecode=2014" target="_blank" >
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1698m_01.jpg" alt="참여 방법" >
        </a><br>
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1698m_01_01.jpg" alt="참여 방법" >
    </div>

    <div class="evtCtnsBox evt02">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1698m_02.jpg" alt="금손을 찾아라" >
    </div>

    <div class="evtCtnsBox evt03">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1698m_04.jpg" alt="" >
        <div><a href="https://njob.willbes.net/promotion/index/cate/3114/code/1698" target="_blank" >이벤트 참여하기 ></a></div>
    </div>
</div>
<!-- End Container -->
@stop