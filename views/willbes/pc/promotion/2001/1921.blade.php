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
    .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
    /*****************************************************************/ 
    .skybanner {position:fixed; top:225px; width:170px; right:10px;z-index:1;}
    .skybanner a {display:block; margin-bottom:10px}

    .evt00 {background:#0a0a0a}
    .evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/11/1921_top_bg.jpg) no-repeat center top;}   
    .evt01 {background:#272a39}    
    .evt02 {background:#555; padding-bottom:150px}

    .youtube {width:980px; margin:0 auto}
    .youtube iframe {width:980px; height:550px;}
    </style>

    <div class="evtContent NGR" id="evtContainer"> 
        <div class="skybanner">
            <a href="#evt02"><img src="https://static.willbes.net/public/images/promotion/2020/11/1921_sky.png" alt="신광은 형법 심화이론"/></a>
            <a href="#evt03"><img src="https://static.willbes.net/public/images/promotion/2020/11/1921_sky2.png" alt="형사법 1일 1제 소문내기"/></a>
        </div>

        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div> 

        <div class="evtCtnsBox evt_top">  
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1921_top.jpg" alt="신광은 형사법 1일 1제" usemap="#Map1921_01" border="0">
            <map name="Map1921_01">
                <area shape="rect" coords="248,1445,874,1506" href="https://www.youtube.com/channel/UCz_3g63yWTYjg6_Ko5QRK1g?view_as=subscriber" target="_blank" alt="형사법 해설 보기">
            </map>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1921_01_01.jpg" alt="형사법을 정의하다.">
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/hwTmR3domFU?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1921_01_02.jpg" alt="형사법의 새로운 기준">
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/CsreKYYznO4?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1921_01_03.jpg" alt="유튜브 댓글">
        </div>

        <div class="evtCtnsBox evt02" id="evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1921_02.jpg" alt="형법 심화이론 온라인 강의">
            {{--프로모션 동영상 단과 불러오기--}}
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif
        </div>

        <div class="evtCtnsBox evt03" id="evt03">
            <img src="https://static.willbes.net/public/images/promotion/2020/11/1921_03.jpg" alt="참여이벤트" usemap="#Map1921" border="0">
            <map name="Map1921">
              <area shape="rect" coords="276,1325,844,1402" href="@if($file_yn[1] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" alt="이미지 다운받기">
            </map>
        </div>  

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial')
        @endif               
    </div>
    <!-- End Container --> 
@stop