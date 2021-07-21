@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->

    <style type="text/css">
        .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5; clear:both}
        .evtCtnsBox img {width:100%; max-width:720px;}

        .evt01 .slide_con {}
        .slide_con .bx-wrapper {box-shadow:none; border:0; margin:0; padding:0}
        .slide_con .bx-wrapper .bx-pager {
            width: auto;
            bottom: 15px;
            left:0;
            right:0;
            text-align: center;
            z-index:90;
        }
        .slide_con .bx-wrapper .bx-pager.bx-default-pager a {
            background: #ccc;
            width: 14px;
            height: 14px;
            margin: 0 4px;
            border-radius:10px;
        }
        .slide_con .bx-wrapper .bx-pager.bx-default-pager a:hover,
        .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active,
        .slide_con .bx-wrapper .bx-pager.bx-default-pager a:focus {
            background: #00ced1;
        }
        .slide_con .bx-wrapper .bx-pager.bx-default-pager a.active {
            width: 30px;
        }

        .evt01 {padding-bottom:80px;}


        /* 폰 가로, 태블릿 세로*/
        @@media only screen and (max-width: 374px)  {

        }

        /* 태블릿 세로 */
        @@media only screen and (min-width: 375px) and (max-width: 640px) {

        }

        /* 태블릿 가로, PC */
        @@media only screen and (min-width: 641px) {

        }
    </style>

    <div id="Container" class="Container NSK c_both">

        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2180m_top.jpg" alt="한덕현 t-PASS" >
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2180m_01.jpg" alt="공무원 영어, 자신 있나요?" >
            <div class="slide_con">
                <ul id="slidesImg1">
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/07/2180m_01_01.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/07/2180m_01_02.jpg" alt=""/></li>
                    <li><img src="https://static.willbes.net/public/images/promotion/2021/07/2180m_01_03.jpg" alt=""/></li>
                </ul>
            </div>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2180m_02.jpg" alt="영어 정복 노하우" >
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2180m_03.jpg" alt="수강신청" >
        </div>

    </div>

    <!-- End Container -->
    <link rel="stylesheet" href="/public/vendor/jquery/bxslider/jquery.bxslider.min.css">
    <script src="/public/vendor/jquery/bxslider/jquery.bxslider.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var slidesImg1 = $("#slidesImg1").bxSlider({
                auto: true,
                speed: 500,
                pause: 4000,
                mode:'fade',
                autoControls: false,
                touchEnabled: true,
                controls:false,
                pager:true,
            });
        });
    </script>
@stop