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
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/
        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2023/03/2325_top_bg.jpg) no-repeat center top;} 
        .evtTop span {position:absolute; left:50%; width:227px; top:180px; margin-left:230px; z-index:1}

        .evt02 {background:#585858}

        .evt04 {background:#f5f5f5; padding-bottom:150px}


        .shinyBtn {width:860px; margin:0 auto; display:flex; justify-content: space-between;}
        .shinyBtn a {display:block; width:100%; padding:18px 0; color:#fff; font-size:30px; background:#ff3d60; border-radius:6px; overflow:hidden; position: relative;}
        .shinyBtn a:hover {color:#ff3d60; background:#000; }
        .shinyBtn a:after{
            content:'';
            position: absolute;
            top:0;
            left:0;
            background-color: #fff;
            width: 30px;
            height: 100%;
            z-index: 1;
            transform: skewY(129deg) skewX(-60deg);
        }
        .shinyBtn a:after{animation:shinyBtn 2s ease-in-out infinite;}
        @@keyframes shinyBtn {
            0% { transform: scale(0) rotate(45deg); opacity: 0; }
            80% { transform: scale(0) rotate(45deg); opacity: 0.2; }
            81% { transform: scale(4) rotate(45deg); opacity: 0.5; }
            100% { transform: scale(60) rotate(45deg); opacity: 0; }
        }

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox evtTop">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2325_top.jpg" alt="인적성검사"/>
            <span data-aos="fade-right">
                <img src="https://static.willbes.net/public/images/promotion/2023/03/2325_top_img.png" alt=""/>
            </span>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2325_01.jpg" alt="인적성검사는 왜 따로 준비해야할까요?"  data-aos="fade-left"/>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2325_02.jpg" alt="인적성검사를 선택해야하는 이유" data-aos="fade-right"/>
        </div>

        <div class="evtCtnsBox evt03">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2325_03.jpg" alt="어떤 것을 평가하나요?" data-aos="fade-left"/>
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2023/03/2325_04.jpg" alt="세부 결과 제공" data-aos="fade-right"/> 
            <div class="shinyBtn NSK-Black">                
                <a href="https://pass.willbes.net/lecture/show/cate/3023/pattern/only/prod-code/206572">윌비스 종합적성검사 온라인 신청하기 ></a>
            </div>
        </div>       

    </div>


    <!-- End Container -->
    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $(document).ready(function() {
        AOS.init();
      });
    </script>
@stop