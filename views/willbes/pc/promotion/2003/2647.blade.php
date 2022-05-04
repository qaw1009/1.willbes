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
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/05/2647_top_bg.jpg) no-repeat center;position:relative;}           
        .wb_top span {position:absolute; left:50%;top:600px;margin-left:235px;-webkit-animation:swing 2s linear infinite;animation:swing 2s linear infinite}
        @@keyframes swing{
            0%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
            25%{-webkit-transform:rotate3d(0,0,1,10deg);transform:rotate3d(0,0,1,10deg)}
            50%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
            75%{-webkit-transform:rotate3d(0,0,1,-10deg);transform:rotate3d(0,0,1,-10deg)}
            100%{-webkit-transform:rotate3d(0,0,1,0deg);transform:rotate3d(0,0,1,0deg)}
        }
        
        .wb_02 {background:#4D3670}

        .evt_03 {background:#DBD7E6;padding-bottom:100px;}

        .apply {padding-bottom:100px;}
        .apply .may {font-size:50px;margin:50px;font-weight:bold;color:#5621A3}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top" data-aos="fade-down">           
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2647_top.jpg" alt="동형직 모의고사 패키지 반값"  />
            <a href="#apply">
                <span>                
                    <img src="https://static.willbes.net/public/images/promotion/2022/05/2647_apply.png" alt="신청하기" data-aos="zoom-in"  />                           
                </span>
            </a>                 
        </div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2647_01.jpg" alt="세무team"  />
        </div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2647_02.gif" alt="커리쿨럼"  />
        </div>

        <div class="evtCtnsBox evt_03"  data-aos="fade-up" id="apply">
            <div class="wrap"> 
                <img src="https://static.willbes.net/public/images/promotion/2022/05/2647_03.jpg" alt="수강하고 합격하기"  />
                <a href="https://pass.willbes.net/package/show/cate/3022/pack/648001/prod-code/194832" target="_blank" title="신청" style="position: absolute; left: 58.93%; top: 65.85%; width: 26.68%; height: 6.56%; z-index: 2;"></a>
            </div>               
		</div>

        <div class="evtCtnsBox apply" data-aos="fade-up">
            <p class="may">강좌 바로가기</p>            
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif    
        </div>

    </div>
    <!-- End Container -->
    
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $( document ).ready( function() {
            AOS.init();
        } );      
    </script>
    
@stop