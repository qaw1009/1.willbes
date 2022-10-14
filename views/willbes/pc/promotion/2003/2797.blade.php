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
    .evtContent span {vertical-align:top}
    .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}        
    .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

    /*****************************************************************/

    .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/10/2797_top_bg.jpg) no-repeat center top;}

    .evt01 {background:url(https://static.willbes.net/public/images/promotion/2022/10/2797_01_bg.jpg) no-repeat center top;}

    .passbuy {padding-bottom:50px;}
    .passbuy a {display:block; width:550px; margin:0 auto; background:#A11C12; color:#fff; font-size:30px; border-radius:50px; padding:20px 0; font-weight:bold}  
    .passbuy a:hover {background:#FFE606; color:#000;}

    .evt03 {background:#1C2022}

    </style>

    <div class="evtContent NSK">

        <div class="evtCtnsBox evt_top" data-aos="fade-down">  
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2797_top.jpg" title="해설강의 제공 공지">
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/10/2797_01.jpg" title="실전 모의고사">
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2797_02.jpg" title="모의고사 접수방법">
                <a href="https://pass.willbes.net/pass/mockTestNew/apply/cate" target="_blank" title="모의고사 접수하기" style="position: absolute;left: 39.99%;top: 39.03%;width: 14.63%;height: 3.79%;z-index: 2;"></a>
                <a href="https://cafe.naver.com/theprosecution" target="_blank" title="네이버 카페" style="position: absolute;left: 21.19%;top: 61.53%;width: 14.63%;height: 3.79%;z-index: 2;"></a>
                <div class="passbuy">
                    <a href="https://pass.willbes.net/lecture/index/cate/3148/pattern/free?search_order=regist&course_idx=1081" target="_blank">해설강의 바로가기 →</a>
                </div>
            </div>
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/10/2797_03.jpg" title="공식계정">
                <a href="https://cafe.naver.com/theprosecution" target="_blank" title="네이버" style="position: absolute;left: 10.99%;top: 45.53%;width: 9.03%;height: 16.79%;z-index: 2;"></a>
                <a href="https://youtube.com/channel/UC2J41ggwL4CTIJfoVBXsWkg" target="_blank" title="유튜브" style="position: absolute;left: 27.69%;top: 45.53%;width: 9.03%;height: 16.79%;z-index: 2;"></a>
                <a href="https://open.kakao.com/o/sm2o7cVd" title="카카오톡" target="_blank" style="position: absolute;left: 42.99%;top: 45.53%;width: 11.53%;height: 16.79%;z-index: 2;"></a>
                <a href="https://instagram.com/willbes_prosecution_team?r=nametag" target="_blank" title="인스타" style="position: absolute;left: 60.99%;top: 45.53%;width: 8.53%;height: 16.79%;z-index: 2;"></a>
                <a href=" http://pass.willbes.net" target="_blank" title="윌비스 공무원" style="position: absolute;left: 76.99%;top: 45.53%;width: 9.03%;height: 16.79%;z-index: 2;"></a>
            </div>
        </div>

    </div>

    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
        $(document).ready( function() {
        AOS.init();
        });
    </script>

@stop