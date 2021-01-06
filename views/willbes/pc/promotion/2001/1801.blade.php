@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
    .evtContent { 
        position:relative;            
        width:100% !important;
        margin-top:20px !important;
        padding:0 !important;
        background:#fff;
    }	
    .evtContent span {vertical-align:auto}
    .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

    /*****************************************************************/ 

    .skybanner {position:fixed; top:225px; right:10px; width:155px; z-index:2;}
    .skybanner a{display:block; margin-bottom:10px;}

    .evt00 {background:#0a0a0a}

    .evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/09/1801_top_bg.jpg) no-repeat center top;}    
    .evt01 {background:#fff; padding-bottom:120px}    
    .evt01 a {display:block; height:64px; line-height:64px; color:#fff; font-size:28px; font-weight:bold; text-align:center; border-radius:10px; 
        background:#000; width:720px; margin:30px auto 0}
    .evt01 a:hover {background:#1a80cb}
    .youtube {width:720px; margin:0 auto}
    .youtube iframe {width:720px; height:405px}

    .evt02 {background:#f6f6f6;}

    .evt03 {padding-bottom:50px;}
    </style>

    <div class="evtContent NSK" id="evtContainer">  
        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>

        <div class="evtCtnsBox evt_top">  
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1801_top.jpg" alt="형법 무료특강">            
        </div>

        <div class="evtCtnsBox evt01" id="evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1801_01.jpg" alt="형법">
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/bPPX2qZgSBg?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <a href="https://police.willbes.net/lecture/index/cate/3001/pattern/free?search_order=course&subject_idx=1003&course_idx=1072&prof_idx=51135" target="_blank">형법 무료특강 온라인강의 바로가기  ></a>
        </div>  

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1801_02.jpg" alt="형법 무료특강" usemap="#Map1801_01">
            <map name="Map1801_01">
              <area shape="rect" coords="130,403,245,443" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/167023" target="_blank">
              <area shape="rect" coords="379,405,495,442" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/167489" target="_blank">
              <area shape="rect" coords="632,404,741,442" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/168022" target="_blank">
              <area shape="rect" coords="878,403,989,443" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/168198" target="_blank">
              <area shape="rect" coords="132,594,246,626" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/169145" target="_blank">
              <area shape="rect" coords="381,594,493,627" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/170566" target="_blank">
              <area shape="rect" coords="629,594,741,627" href="https://police.willbes.net/lecture/show/cate/3001/pattern/free/prod-code/172060" target="_blank">
            </map>            
        </div>  
        
        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1801_03.jpg" alt="형법 질문하기">            
        </div>

    </div>
    <!-- End Container --> 
@stop