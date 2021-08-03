@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .subContainer {
            min-height: auto !important;
            margin-bottom:0 !important;
        }
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            background:#ccc;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/

        .sky {position:fixed;top:225px;right:15px;z-index:200;}
        .sky a {display:block;margin-top:10px;}

        /*상단 애니메이션*/
        .wb_cts_top{position: relative;height: 899px;padding-top: 101px;background:url('https://static.willbes.net/public/images/promotion/2021/07/2282_after.jpg') 50% 0 repeat-x;}
        .wb_cts_top h2{margin-top: 48px;}
        .wb_cts_top h2 img{transform: scale(0.6);animation: scaleUp 0.4s 3.9s cubic-bezier(0.165, 0.840, 0.440, 1.000) both;}
        .wb_cts_top .top_ani{position: absolute;top: 0;right: 0;left: 0;bottom: 0;}
        .top_ani .open_ani{position: relative; padding-top: 121px; width: 50%;height: 100%;background:url('https://static.willbes.net/public/images/promotion/2021/07/2282_before.jpg') 50% 0 repeat-x;z-index: 10;}
        .top_ani .open_ani img{position: absolute;top: 121px;opacity: 0;animation: fadein 0.5s ease-in-out both;}
        .top_ani .left{float: left;animation: moveOutLeft 1s 3.6s ease-in-out both;}
        .top_ani .left img{right: 169px;}
        .top_ani .right{float: right;animation: moveOutRight 1s 3.6s ease-in-out both;}
        .top_ani .right img{left: 137px; animation-delay: 1s;}
        @@keyframes scaleUp {
            100%{transform: scale(1);}
        }
        @@keyframes fadeOut {
            100%{opacity: 0;}
        }
        @@keyframes fadein {
            100%{opacity: 1;}
        }
        @@keyframes moveOutLeft {
            100%{transform: translateX(-100%);}
        }
        @@keyframes moveOutRight {
            100%{transform: translateX(100%);}
        }
        .top_ani .hdh_img{position: absolute;bottom: 0;left: 50%;transform: translateX(-50%);animation: fadeOut 1s 3.1s ease-in-out both;z-index: 10;}

        .youtube {position:absolute; top:825px; left:50%;z-index:12;margin-left:-472.5px}
        .youtube iframe {width:945px; height:531px;}

        /************************************************************/
        .wb_cts01 {background:#54a783;padding-top:525px;}

        .wb_cts02 {background:url(https://static.willbes.net/public/images/promotion/2021/07/2282_02_bg.jpg) no-repeat center top;position:relative;}
        .wb_cts02 .curri {position:absolute;left:50%;}
        .wb_cts02 .curri a {display:block; font-size:20px; color:#333743; padding:0 25px; background:#55ff9e; border-radius:60px;height:60px;line-height:60px;}
        .wb_cts02 .curri a:hover {background:#d8ff00;}
        .wb_cts02 .curri li {padding-bottom:20px;}
        .wb_cts02 .curri li:first-child {width:130px;margin-left:-390px;margin-top:-575px;}
        .wb_cts02 .curri li:first-child span{font-size:15px;}
        .wb_cts02 .curri li:first-child a {line-height:25px;}
        .wb_cts02 .curri li:nth-child(2) {width:450px;margin-left:-390px;}
        .wb_cts02 .curri li:nth-child(3) {width:780px;margin-left:-390px;}
        .wb_cts02 .curri li:last-child {width:780px;margin-left:-390px;}

        .wb_cts03 {background:url(https://static.willbes.net/public/images/promotion/2021/07/2282_03_bg.jpg) no-repeat center top;padding-bottom:100px;}

        .wb_cts05 {padding-bottom:100px;}

        .wb_cts04 , .wb_cts06 {background:#f5f5f5;padding-bottom:100px;}

        .wb_cts06 {position:relative;}     
        .wb_cts06 .edit_img img{width:325px;height:200px;}
        .wb_cts06 .meme {position:absolute;left:50%; margin-left:-162.5px;}
        .wb_cts06 .edit_img li:first-child {top:562px; margin-left:-250px;}
        .wb_cts06 .edit_img li:nth-child(2) {top:881px; margin-left:174px;}
        .wb_cts06 .edit_img li:last-child {top:1096px; margin-left:-271px;}

        .wb_preview {background:#54a783;}

        .wb_cts09 {padding-bottom:100px;}

        .emo_area {padding-bottom:100px;} 

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <a href="#curri01">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2282_sky01.png" alt="실전464">
            </a>
            <a href="#curri03">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2282_sky03.png" alt="새벽실저모의고사">
            </a>
        </div>

        <div class="evtCtnsBox wb_cts_top">
            <div class="top_ani">
                <div class="left open_ani"><img src="https://static.willbes.net/public/images/promotion/2021/07/2282_txt01.png" alt=""></div>
                <div class="right open_ani"><img src="https://static.willbes.net/public/images/promotion/2021/07/2282_txt02.png" alt=""></div>
                <img class="hdh_img" src="https://static.willbes.net/public/images/promotion/2021/07/2282_hdh.png" alt="">
            </div>
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2282_txt03.png" alt="">
            <h2><img src="https://static.willbes.net/public/images/promotion/2021/07/2282_txt04.png" alt=""></h2>
            <div class="youtube">
                <iframe src="https://www.youtube.com/embed/bd1YXMDcw7o?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>    

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2282_01.jpg" alt="실전덕후단"/>
        </div>

        <div class="evtCtnsBox wb_cts02" >
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2282_02.jpg" alt="커리큘럼"/>
            <ul class="curri NSK-Black">
                <li>
                    <a href="#curri01">
                        실전 464<br><span class="infinite">(무한 회독)</span>
                    </a>
                </li>
                <li>
                    <a href="#curri02">
                        실전! ONEDAY 영역별 테마특강
                    </a>
                </li>
                <li>
                    <a href="#curri03">
                        새벽실전모의고사
                    </a>
                </li>
                <li>
                    <a href="#curri04">
                        온라인 첨삭지도반
                    </a>
                </li>
            </ul>    
        </div>

        <div class="evtCtnsBox wb_cts03" id="curri01">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2282_03.jpg" alt="실전464"/>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif 
        </div>

        <div class="evtCtnsBox wb_cts04" id="curri02">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2282_04.jpg" alt="테마특강"/>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))            
            @endif 
        </div>

        <div class="evtCtnsBox wb_cts05" id="curri03">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2282_05.jpg" alt="새벽실전모의고사"/>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>3))            
            @endif 
        </div>

        <div class="evtCtnsBox wb_cts06" id="curri04">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2282_06.jpg" alt="온라인첨삭지도반"/>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>4))            
            @endif 
            <ul class="edit_img">
                <li class="meme">
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/editing01.gif" alt="문제풀기" />
                </li>
                <li class="meme">
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/editing02.gif" alt="지문해석" />
                </li>
                <li class="meme">
                    <img src="https://static.willbes.net/public/images/promotion/2021/07/editing03.gif" alt="문법포인트" />
                </li>
            </ul>
        </div>

        <div class="evtCtnsBox wb_preview" >       
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2282_preview.jpg" alt="미리 만나보세요"/>
        </div>              

        <div class="evtCtnsBox wb_cts07" id="comment_event">   
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2282_07.jpg" alt="기대평이벤트"/>
            {{--기본댓글--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_normal_partial')
            @endif 
        </div>

        <div class="evtCtnsBox wb_cts08" >
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2282_08.jpg" alt="퀴즈테스트"/>           
        </div>

        <div class="evtCtnsBox wb_cts09" >
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2282_09.jpg" alt="덕밍아웃하라"/>           
        </div>
        <!--
        <div class="emo_area">
            {{-- 이모티콘 댓글 --}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_emoticon2_partial')
            @endif
        </div>   
        --> 
    </div>
    <!-- End Container -->

    <script type="text/javascript">
      
    </script>

@stop