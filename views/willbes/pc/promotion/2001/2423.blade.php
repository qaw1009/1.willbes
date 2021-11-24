@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .skybanner {position:fixed;top:200px; width:120px; right:10px;z-index:1;}        
        .skybanner a {display:block;}

        .evt00 {background:#0a0a0a}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/11/2423_top_bg.jpg) no-repeat center top; position:relative}  
        .wb_top .star {position:absolute; top:1350px; left:50%; width:716px; z-index:1; margin-left:-358px;}
        .wb_top .youtube {position:absolute; top:2190px; left:50%; width:549px; z-index:1; margin-left:-537px;}
        .wb_top .youtube iframe {width:549px; height: 329px;}
        .wb_top .book {position:absolute; top:2146px; left:50%; width:454px; z-index:1; margin-left:80px;}      
        
        .wb_01 {background:url(https://static.willbes.net/public/images/promotion/2021/11/2423_01_bg.jpg) no-repeat center top;}
        .wb_01 .attend {position:absolute; top:496px; left:50%; width:688px; margin-left:-465px; z-index:1; display: flex; justify-content: space-between; flex-wrap: wrap;}
        .wb_01 .attend span {background:url(https://static.willbes.net/public/images/promotion/2021/11/2423_ch.png) no-repeat center top; width:128px; height:128px;
        font-size:20px; padding-top:22px; font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; color:#4f4f4f; margin-bottom:10px}
        .wb_01 .attend span.end {background-image:url(https://static.willbes.net/public/images/promotion/2021/11/2423_ch_off.png); font-size:0}

        .wb_02 {background:url(https://static.willbes.net/public/images/promotion/2021/11/2423_02_bg.jpg) no-repeat center top;}
        
        /*레이어팝업*/
        .Pstyle {
            opacity: 0;
            display: none;
            position: relative;
            width: auto;
            background-color: #fff;
        }
        .b-close {
            position: absolute;
            right: 10px;
            top: 10px;
            padding: 5px;
            display: inline-block;
            cursor: pointer;
        }
        .Pstyle .content {height:auto; width:auto;}
    </style>

    <div class="p_re evtContent NSK" id="evtContainer">      
        <div class="evtCtnsBox evt00">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>    

        <div class="evtCtnsBox wb_top" id="main" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2423_top.jpg" alt=""/>
            <div class="star" data-aos="flip-left"><img src="https://static.willbes.net/public/images/promotion/2021/11/2423_top_img01.png" alt=""/></div>
            <div class="youtube" data-aos="fade-right">
                <iframe src="https://www.youtube.com/embed/B_SpAwQNwio?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="book p_re" data-aos="fade-left">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2423_top_img03.png" alt="">
                <a href="javascript:go_popup()" style="position: absolute; left: 17.18%; top: 40.45%; width: 19.16%; height: 20.84%; z-index: 2;"></a>
                <a href="javascript:go_popup1()" style="position: absolute; left: 67.84%; top: 40.45%; width: 19.16%; height: 20.84%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2423_01.jpg" alt=""/> 
                <div class="attend" data-aos="fade-right">
                    <span class="end">12/1</span>
                    <span>12/2</span>
                    <span>12/3</span>
                    <span>12/4</span>
                    <span>12/5</span>
                    <span>12/6</span>
                    <span>12/7</span>
                    <span>12/8</span>
                    <span>12/9</span>
                    <span>12/10</span>
                    <span>12/11</span>
                    <span>12/12</span>
                    <span>12/13</span>
                    <span>12/14</span>
                    <span>12/15</span>
                </div>
                <a href="#none" title="신청하기" style="position: absolute; left: 19.55%; top: 67.51%; width: 39.2%; height: 7.32%; z-index: 2;"></a>
            </div>        	
		</div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2423_02.jpg"  alt=""/>
		</div>        

        <div class="evtCtnsBox" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2423_03.jpg"  alt=""/>	
                <a href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이벤트 이미지 다운로드" style="position: absolute; left: 23.93%; top: 70.08%; width: 38.93%; height: 20.08%; z-index: 2;"></a>   
            </div>
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                    @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'Y')){{--기존SNS예외처리시--}}
            @endif         
		</div>    

        

        <!--레이어팝업-->
        <div id="popup" class="Pstyle">
            <span class="b-close">X</span>
            <div class="content">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2423_top_book01.jpg" />
            </div>
        </div>

        <div id="popup1" class="Pstyle">
            <span class="b-close">X</span>
            <div class="content">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2423_top_book02.jpg" />
            </div>
        </div>

             
    </div>
    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );

    /*레이어팝업*/
    function go_popup() {
        $('#popup').bPopup();
    }

    function go_popup1() {
        $('#popup1').bPopup();
    }
    </script>

@stop