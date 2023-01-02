@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
    <!-- Container -->
    <style type="text/css">
        .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:1.4vh; line-height:1.4; clear:both}
        .evtCtnsBox img {width:100%; max-width:720px;}
        /*.evtCtnsBox a {border:1px solid #000}*/

        /************************************************************/

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2023/01/2866_top_bg.jpg) no-repeat center top;}

        .youtube {position:relative; padding-bottom:56.25%; overflow: hidden; margin-top:-20px !important}
        .youtube object {position:absolute; top:0; left:50%; width:100%; margin-left:-50%; height:100%;}  


        /*레이어팝업*/
        .Pstyle {
            opacity: 0;
            display: none;
            position: relative;
            width: auto;
            max-width:720px; margin:0 auto;
        }
        .b-close {
            position: absolute;
            right:10px;
            top: -18px;
            display: inline-block;
            cursor: pointer;
            width: 36px;
            height: 36px;
            transform: rotate(0deg);
            transition: all 1s;
            z-index: 9999;
        }
        .b-close img {width:100%}
        .b-close:hover {transform: rotate(360deg); transition: all 1s;}

        .Pstyle .content {height:auto; width:auto;}
        .Pstyle .content img {width:100%; max-width:720px;}

    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2866m_top.jpg" alt="김재규 경찰학 백지노트"/>
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/01/2866m_01.jpg" alt="예시"/>
                <a href="javascript:go_popup1()" title="" style="position: absolute; left: 3.33%; top: 10.72%; width: 93.61%; height: 19.61%; z-index: 2;"></a>
                <a href="javascript:go_popup2()" title="" style="position: absolute; left: 3.19%; top: 30.67%; width: 93.61%; height: 15.67%; z-index: 2;"></a>
                <a href="javascript:go_popup3()" title="" style="position: absolute; left: 2.78%; top: 46.5%; width: 93.61%; height: 15.67%; z-index: 2;"></a>
                <a href="javascript:go_popup4()" title="" style="position: absolute; left: 3.19%; top: 62.44%; width: 93.61%; height: 15.67%; z-index: 2;"></a>
                <a href="javascript:go_popup5()" title="" style="position: absolute; left: 3.06%; top: 78.44%; width: 93.61%; height: 15.67%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox" data-aos="fade-up">         
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2866m_02_01.jpg" alt="백지노트란?"/>     
            <div class="youtube">
                <object data="https://www.youtube.com/embed/270p7AXQBi4?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></object>
            </div>
        </div>

        <div class="evtCtnsBox" data-aos="fade-up"> 
            <img src="https://static.willbes.net/public/images/promotion/2023/01/2866m_02_02.jpg" alt="백지노트란?"/>
            <a href="https://cafe.daum.net/policeacademy" target="_blank" title="경시모" style="position: absolute; left: 3.61%; top: 94.13%; width: 21.81%; height: 4.38%; z-index: 2;"></a>
            <a href="https://cafe.naver.com/polstudy" target="_blank" title="경꿈사" style="position: absolute; left: 26.81%; top: 94.13%; width: 21.81%; height: 4.38%; z-index: 2;"></a>
            <a href="https://www.instagram.com" target="_blank" title="" style="position: absolute; left: 49.72%; top: 94.13%; width: 21.81%; height: 4.38%; z-index: 2;"></a>
            <a href="https://ko-kr.facebook.com" target="_blank" title="" style="position: absolute; left: 72.36%; top: 94.13%; width: 21.81%; height: 4.38%; z-index: 2;"></a>
        </div>


<div class="evtCtnsBox" data-aos="fade-up"> 
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
        @include('willbes.m.promotion.show_comment_list_url_partial')
@endif
    </div>
        

        <div id="popup1" class="Pstyle">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>
            <div class="content">
                <div class="sample">
                    <img src="https://static.willbes.net/public/images/promotion/2023/01/2866_01_01.jpg" alt="" />
                </div>
            </div>
        </div>
        <div id="popup2" class="Pstyle">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>
            <div class="content">
                <div class="sample">
                    <img src="https://static.willbes.net/public/images/promotion/2023/01/2866_01_02.jpg" alt="" />
                </div>
            </div>
        </div>
        <div id="popup3" class="Pstyle">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>
            <div class="content">
                <div class="sample">
                    <img src="https://static.willbes.net/public/images/promotion/2023/01/2866_01_03.jpg" alt="" />
                </div>
            </div>
        </div>
        <div id="popup4" class="Pstyle">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>
            <div class="content">
                <div class="sample">
                    <img src="https://static.willbes.net/public/images/promotion/2023/01/2866_01_04.jpg" alt="" />
                </div>
            </div>
        </div>
        <div id="popup5" class="Pstyle">
            <span class="b-close"><img src="https://static.willbes.net/public/images/promotion/2022/11/ic_popupCloseBtn.png"></span>
            <div class="content">
                <div class="sample">
                    <img src="https://static.willbes.net/public/images/promotion/2023/01/2866_01_05.jpg" alt="" />
                </div>
            </div>
        </div>
    </div>
    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>

    <script type="text/javascript">
        $(document).ready( function() {
            AOS.init();
        });

        //팝업
        function go_popup1(){$('#popup1').bPopup();}
        function go_popup2(){$('#popup2').bPopup();}
        function go_popup3(){$('#popup3').bPopup();}
        function go_popup4(){$('#popup4').bPopup();}
        function go_popup5(){$('#popup5').bPopup();}
    </script>
@stop