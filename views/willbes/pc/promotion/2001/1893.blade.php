@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">     
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; margin:0 auto; position:relative}

        /************************************************************/
        .skybanner {position:fixed; top:225px; width:170px; right:10px;z-index:1;}
        .skybanner a {display:block; margin-bottom:10px}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2020/10/1893_top_bg.jpg) no-repeat center top;}
        .wb_01 {background:#dad8a7}
        .wb_03 {background:#030130}

    </style> 

    <div class="evtContent NGR" id="evtContainer">
        <div class="skybanner">
            <a href="#evt01"><img src="https://static.willbes.net/public/images/promotion/2020/10/1893_sky.png" alt="한능검&지텔프"/></a>
            <a href="#evt02"><img src="https://static.willbes.net/public/images/promotion/2020/10/1893_sky2.png" alt="한능검&지텔프"/></a>
        </div>
        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1893_top.jpg" alt="개정과목시험"/>            
        </div>

        <div class="evtCtnsBox wb_01" id="evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1893_01.jpg" alt="한능검,지텔프"/>          
        </div>

        <div class="evtCtnsBox wb_02" id="evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1893_02.jpg" alt="소문내기 이벤트" usemap="#Map1893_01" border="0"/><br>
            <map name="Map1893_01">
                <area shape="rect" coords="405,1200,742,1265" href="@if($file_yn[1] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" alt="이미지 다운받기">
            </map>    
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1893_sns.jpg" alt="소문내기" usemap="#Mapsns" border="0"/>
            <map name="Mapsns">
                <area shape="rect" coords="99,37,260,133" href="http://cafe.daum.net/policeacademy" target="_blank" alt="경시모">
                <area shape="rect" coords="276,44,448,132" href="https://cafe.naver.com/polstudy" target="_blank" alt="경꿈사">
                <area shape="rect" coords="469,45,636,134" href="https://cafe.naver.com/kts9719" target="_blank" alt="닥공사">
                <area shape="rect" coords="662,43,828,137" href="https://cafe.naver.com/dokchi" target="_blank" alt="독취사">
                <area shape="rect" coords="852,45,1018,136" href="https://cafe.naver.com/specup" target="_blank" alt="스펙업">
            </map>        
        </div> 

        {{--홍보url--}}
        @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
            @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N'))
        @endif   
        
        <div class="evtCtnsBox wb_03">
            <img src="https://static.willbes.net/public/images/promotion/2020/10/1893_03.jpg" alt="강의신청" usemap="#Map1893_02" border="0"/>
            <map name="Map1893_02">
                <area shape="rect" coords="146,358,551,446" href="https://police.willbes.net/promotion/index/cate/3001/code/1886" target="_blank" alt="신규가입">
                <area shape="rect" coords="574,358,978,441" href="https://police.willbes.net/promotion/index/cate/3001/code/1864" target="_blank" alt="0원프리패스">
                <area shape="rect" coords="355,791,988,904" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/171830" target="_blank" alt="한능검 벼락치기">
                <area shape="rect" coords="355,933,988,1040" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/171829" target="_blank" alt="한능검 기본과정">
                <area shape="rect" coords="419,1436,992,1558" href="https://police.willbes.net/lecture/show/cate/3001/pattern/only/prod-code/171375" target="_blank" alt="G텔프">
            </map>            
        </div>  
    </div>
    <!-- End Container -->
@stop