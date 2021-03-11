@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .sky {position:fixed; top:250px;right:25px;z-index:10;}
        .sky a { display:block; padding-bottom:15px;}

        .wb_top {background:#f5efe1;}

        .wb_01 {background:#f5efe1;}

        .wb_02 {position:relative;background:#414141}
        .wb_02 .circle01{position:absolute;left:39%;top:35%;margin-left:-100px;}
        .wb_02 .circle02{position:absolute;left:61%;top:37%;margin-left:-100px;}
        .wb_02 .circle03{position:absolute;left:38%;top:64%;margin-left:-100px;}
        .wb_02 .circle04{position:absolute;left:59%;top:64%;margin-left:-100px;}

        .wb_02 div a img.on {display:none;position:absolute;z-index:1;text-align:center;}
        .wb_02 div a img.off {display:block}
        .wb_02 div a.active img.on,
        .wb_02 div a:hover img.on {display:block;text-align:center;}
        .wb_02 div a.active img.off,
        .wb_02 div a:hover img.off {display:none}
        .wb_02 div:after {content:""; display:block; clear:both}

        .wb_03 {background:#439900;} 

        .wb_04 {background:#439900;} 

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="sky">
             <a href="#evt_01">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_sky.jpg" title="웰컴 키드 받기">
            </a>       
            <a href="#evt_02">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_sky2.jpg" title="추가 이벤트">
            </a>        
            <a href="#evt_03">
                <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_sky3.jpg" title="보너스 선물">
            </a>              
        </div>

        <div class="evtCtnsBox wb_top">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_top.jpg" usemap="#Map2102a" title="3월 첼린지" border="0" />
            <map name="Map2102a" id="Map2102a">
                <area shape="rect" coords="2,509,252,898" href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2001" target="_blank" />
                <area shape="rect" coords="867,508,1120,906" href="javascript:certOpen();" alt="응시반허 인증하기">
            </map>
        </div>  

        <div class="evtCtnsBox wb_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_01.jpg" usemap="#Map2102b" title="3월 월컴키트" border="0" />
            <map name="Map2102b" id="Map2102b">
                <area shape="rect" coords="317,817,803,906" href="https://www.willbes.net/member/join/?ismobile=0&sitecode=2001" target="_blank" />
            </map>
        </div>  

        <div class="evtCtnsBox wb_02" id="evt_01">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_02.jpg" title="월컴키트" />
            <div class="circle01">
                <a href="#none;">
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_02_01.png" alt="" class="off">
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_02_01h.png" alt="" class="on">
                </a>    
            </div> 
            <div class="circle02">
                <a href="#none;">
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_02_02.png" alt="" class="off">
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_02_02h.png" alt="" class="on">
                </a>    
            </div>  
            <div class="circle03">
                <a href="#none;">                                 
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_02_03.png" alt="" class="off">
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_02_03h.png" alt="" class="on">
                </a>    
            </div>  
            <div class="circle04">
                <a href="#none;">
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_02_04.png" alt="" class="off">
                    <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_02_04h.png" alt="" class="on">
                </a>
            </div>  
        </div>  

        <div class="evtCtnsBox wb_03" id="evt_02">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_03.jpg" usemap="#Map2102c" title="추가 이벤트" border="0" />
            <map name="Map2102c" id="Map2102c">
                <area shape="rect" coords="210,852,512,903" href="javascript:void(0)" />
                <area shape="rect" coords="617,862,750,904" href="https://www.willbes.net/classroom/qna/index" target="_blank" />
                <area shape="rect" coords="764,861,897,904" href="https://police.willbes.net/promotion/index/cate/3001/code/1139" target="_blank" />
            </map>
        </div>

        <div class="evtCtnsBox wb_04" id="evt_03">
            <img src="https://static.willbes.net/public/images/promotion/2021/03/2102_04.jpg" usemap="#Map2102d" title="스마트폰 배경화면 다운받기" border="0" />
            <map name="Map2102d" id="Map2102d">
                <area shape="rect" coords="269,1017,369,1047" href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" />
                <area shape="rect" coords="509,1017,609,1048" href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[1]) }} @else {{ $file_link[1] }} @endif" />
                <area shape="rect" coords="749,1016,849,1047" href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[2]) }} @else {{ $file_link[2] }} @endif" />
                <area shape="rect" coords="388,1500,489,1530" href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[3]) }} @else {{ $file_link[3] }} @endif" />
                <area shape="rect" coords="629,1500,728,1530" href="@if(empty($file_yn) === false && $file_yn[0] == 'Y') {{ front_url($file_link[4]) }} @else {{ $file_link[4] }} @endif" />
            </map>
        </div>

    </div>
    <!-- End Container -->

    <script>

        $(function(e){
            var targetOffset= $("#evtContainer").offset().top;
            $('html, body').animate({scrollTop: targetOffset}, 700);
            /*e.preventDefault(); */
        });

        function certOpen(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            @if(empty($arr_promotion_params) === false)
            var url = '/certApply/index/page/{{$arr_promotion_params["page"]}}/cert/{{$arr_promotion_params["cert"]}}' ;
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=740,height=700');
            @endif
        }

    </script>
@stop