@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
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
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/
        
        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2023/02/2908_top_bg.jpg) no-repeat center top;}      
        
        .evt_top span {position:absolute; left:50%; z-index:2;}
              
        .evt_top span.img2 {top:225px; margin-left:-348.5px;-webkit-animation:swing 2s linear infinite;animation:swing 2s linear infinite}
        @@keyframes swing{
            0%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
            25%{-webkit-transform:rotate3d(0,0,1,10deg);transform:rotate3d(0,0,1,10deg)}
            50%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
            75%{-webkit-transform:rotate3d(0,0,1,-10deg);transform:rotate3d(0,0,1,-10deg)}
            100%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
        }
        @@-webkit-keyframes swing{
            0%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
            25%{-webkit-transform:rotate3d(0,0,1,10deg);transform:rotate3d(0,0,1,10deg)}
            50%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
            75%{-webkit-transform:rotate3d(0,0,1,-10deg);transform:rotate3d(0,0,1,-10deg)}
            100%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
        }        
        @@keyframes flipInX {
             from {
                 -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 20deg);
                 transform: perspective(400px) rotate3d(1, 0, 0, 20deg);
                 -webkit-animation-timing-function: ease-in;
                 animation-timing-function: ease-in;                
             }
             40% {
                 -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
                 transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
                 -webkit-animation-timing-function: ease-in;
                 animation-timing-function: ease-in;
             }
             60% {
                 -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
                 transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
                 -webkit-animation-timing-function: ease-in;
                 animation-timing-function: ease-in;
                
             }
             80% {
                 -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -10deg);
                 transform: perspective(400px) rotate3d(1, 0, 0, -10deg);
                 -webkit-animation-timing-function: ease-in;
                 animation-timing-function: ease-in;
             }
             to {
                 -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 20deg);
                 transform: perspective(400px) rotate3d(1, 0, 0, 20deg);  
                 -webkit-animation-timing-function: ease-in;
                 animation-timing-function: ease-in;               
             }
        }
        @@-webkit-keyframes flipInX{
            from {
                 -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 20deg);
                 transform: perspective(400px) rotate3d(1, 0, 0, 20deg);
                 -webkit-animation-timing-function: ease-in;
                 animation-timing-function: ease-in;                
             }
             40% {
                 -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
                 transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
                 -webkit-animation-timing-function: ease-in;
                 animation-timing-function: ease-in;
             }
             60% {
                 -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
                 transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
                 -webkit-animation-timing-function: ease-in;
                 animation-timing-function: ease-in;
                
             }
             80% {
                 -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -10deg);
                 transform: perspective(400px) rotate3d(1, 0, 0, -10deg);
                 -webkit-animation-timing-function: ease-in;
                 animation-timing-function: ease-in;
             }
             to {
                 -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 20deg);
                 transform: perspective(400px) rotate3d(1, 0, 0, 20deg);  
                 -webkit-animation-timing-function: ease-in;
                 animation-timing-function: ease-in;               
             }
        }

        .evt_01 {background:url(https://static.willbes.net/public/images/promotion/2023/02/2908_01_bg.jpg) no-repeat center top;}
        
        .evt_01s {padding-bottom:100px; width:1120px; margin:0 auto;}
        .evt_01s .title {font-size:30px; font-weight:bold; margin-bottom:10px; text-align:left}

        .evt_02 {background:url(https://static.willbes.net/public/images/promotion/2023/02/2908_02_bg.jpg) no-repeat center top;} 
      
    </style>

    <div class="p_re evtContent NGR" id="evtContainer">

        <div class="evtCtnsBox evt_top" data-aos="fade-down">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2023/02/2908_top.jpg"  alt="불어라 합격의 봄바람"/>
                <div class="topimg">                
                    <span class="img2"><img src="https://static.willbes.net/public/images/promotion/2023/02/2908_top_title.png" title="봄바람" /></span>                   
                </div>
                <a href="https://pass.willbes.net/lecture/index/cate/3103/pattern/only?search_order=regist&subject_idx=&course_idx=1365" title="결제 바로가기" target="_blank" style="position: absolute;left: 33.25%;top: 92.05%;width: 34.05%;height: 6.56%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2908_01.jpg" title="전문과목">              
        </div>

        <div class="evtCtnsBox evt_01s pt50" data-aos="fade-up">           
            <div class="title">GS1 + GS2 순환 추가 수강 ></div>        
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif            
        </div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2023/02/2908_02.jpg" title="특별 할인 이벤트">            
        </div>
        
    </div>
    <!-- End Container -->

    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script type="text/javascript" src="/public/js/willbes/jquery.bpopup.min.js"></script>
    <script>
      $(document).ready( function() {
        AOS.init();
      });    

    </script>
      
    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

@stop