@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; word-break: keep-all;}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .title {font-size:30px;  margin:20px 10px; text-align:left; color:#65069b}

    .evtTop a {position:absolute; left: 25.56%; top: 84.9%; width: 45.83%; height: 7.42%; z-index: 2;}

    .video-container-box {padding:20px}
    .video-container {position:relative; padding-bottom:56.25%; padding-top:30px; height:0; overflow: hidden;}
    .video-container iframe,
    .video-container object,
    .video-container embed {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}

    .evtFooter {margin:0 auto; padding:30px 20px; text-align:left;background:#555; color:#fff; font-size:0.875rem; line-height:1.4 }
    .evtFooter h3 {font-size:1.5rem; margin-bottom:30px; color:#fff}
    .evtFooter p {margin-bottom:10px; color:#fff; font-size:1.2rem;}
    .evtFooter div,
    .evtFooter ul {margin-bottom:30px; padding-left:10px}
    .evtFooter li {margin-left:20px; list-style-type: decimal;}

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
    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/12/1967_mpolice.jpg" alt="신광은 경찰학원" >
    </div> 

    <div class="evtCtnsBox evtTop">
        <img src="https://static.willbes.net/public/images/promotion/2021/02/2092_mtop.jpg" alt="기본 완성반" >
    </div> 
    
    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2021/02/2092_m01.jpg" alt="신광은 영상" >
        <div class="video-container-box">
            <div class="video-container">
                <iframe src="https://www.youtube.com/embed/40LDBoOoD_k?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <img src="https://static.willbes.net/public/images/promotion/2021/02/2092_m02.jpg" alt="장정훈 영상" >
        <div class="video-container-box">
            <div class="video-container">
                <iframe src="https://www.youtube.com/embed/VHTrL5w2IF4?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <img src="https://static.willbes.net/public/images/promotion/2021/02/2092_m03.jpg" alt="김원욱 영상" >
        <div class="video-container-box">
            <div class="video-container">
                <iframe src="https://www.youtube.com/embed/KkESWQLjtq8?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2021/02/2092_m04.jpg" alt="경찰과목 개편 내용" >
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2021/02/2092_m05.jpg" alt="3법과목" >
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2021/02/2092_m06.jpg" alt="과목비중 및 출제비율" >
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2021/02/2092_m07.jpg" alt="개편과목 스케줄" >
    </div> 

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2021/02/2092_m08.jpg" alt="온라인 단과" >
    </div>       
    @if(empty($arr_base['display_product_data']) === false)
        @include('willbes.m.promotion.display_product_partial',array('group_num'=>1))
    @endif

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2021/02/2092_m09.jpg" alt="온라인 종합반" >
    </div>  
    @if(empty($arr_base['display_product_data']) === false)
        @include('willbes.m.promotion.display_product_partial',array('group_num'=>2))
    @endif
<!-- End Container -->
@stop 