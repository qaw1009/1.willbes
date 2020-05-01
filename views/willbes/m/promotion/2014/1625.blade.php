@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .Container {max-width:100%; }
    .evtCtnsBox {width:100%; text-align:center; position:relative; font-size:0.867rem}
    .evtCtnsBox > img {width:100%; max-width:720px; }
    .evtTop {background:#067ae7}
    .evt01 {background:#067ae7}
    .evtBtn a {display:inline-block; color:#fff; background:#000; width:80%; max-width:500px; border-radius:50px; font-size:200%; font-weight:bold; padding:20px 0}
    .evt02 {background:#067ae7}



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

<div id="Container" class="Container NG c_both">            
    <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2020/05/1625m_top.jpg" alt="슬기로운 리뷰생활" >  
    </div>
    
    <div class="evtCtnsBox evt01">
        <img src="https://static.willbes.net/public/images/promotion/2020/05/1625m_01.jpg" alt="슬기로운 리뷰생활" > 
        <div class="evtBtn NSK-Black">
            <a href="https://www.willbes.net/m/classroom/on/list/ongoing" target="_blank">이벤트 신청하기 ></a>
        </div>       
    </div>

    <div class="evtCtnsBox evt02">
        <img src="https://static.willbes.net/public/images/promotion/2020/05/1625m_02.jpg" alt="슬기로운 리뷰생활" >        
    </div>
</div>
<!-- End Container -->
@stop