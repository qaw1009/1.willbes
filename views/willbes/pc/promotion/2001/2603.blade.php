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
            font-size:14px;          
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .sky {position:fixed;top:200px; width:120px; right:10px;z-index:1;}        
        .sky a {display:block; margin-bottom:-1px}

        .evt00 {background:#0a0a0a}

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/03/2603_top_bg.jpg) no-repeat center;}

        .evt_02 {background:#0f3e81}

        .evt_03 {width:1120px; margin:0 auto;padding-bottom:100px;}
        .evt_03 .april {font-size:50px;margin:50px;font-weight:bold;}
        .evt_03 .april span {color:#0f3e81}
        .evt_03 .title {font-size:26px; text-align:left; margin:80px 0 20px}
        .evt_03 .title span {color:#0f3e81;  box-shadow:inset 0 -20px 0 rgba(252,87,119,.1)}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2603_sky.png" alt="" usemap="#2603_sky" border="0">
            <map name="2603_sky" id="2603_sky">
            <area shape="rect" coords="2,0,125,141" href="#apply1" />
            <area shape="rect" coords="2,153,129,290" href="#apply2" />
            </map>
        </div>
        
        <div class="evtCtnsBox evt00" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1009_first.jpg"  alt="경찰학원부분 1위"/>
        </div>    

        <div class="evtCtnsBox evt_top" data-aos="fade-up">    
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2603_top.jpg" alt="4월 추천강좌"/>           
		</div>        

        <div class="evtCtnsBox evt_01" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2603_01.jpg" alt="커리쿨럼"/>
                <a href="#apply1" title="기본이론" style="position: absolute;left: 19.54%;top: 85.35%;width: 27.28%;height: 6.05%;z-index: 2;"></a>
                <a href="#apply2" title="심화이론" style="position: absolute;left: 54.24%;top: 85.35%;width: 27.28%;height: 6.05%;z-index: 2;"></a>
            </div>
		</div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2603_02.jpg" alt="신청하기"/>
                <a href="https://police.willbes.net/promotion/index/cate/3001/code/2595" title="경찰패스 신청하기" target="_blank" style="position: absolute;left: 18.12%;top: 81.35%;width: 63.98%;height: 7.15%;z-index: 2;"></a> 
            </div>   
		</div>

        <div class="evtCtnsBox evt_03" data-aos="fade-up">
            <p class="april"><span>4월 추천 강좌</span> 바로가기</p>
            <div class="title NSK-Black" id="apply1">1. 2022/23년 대비 온라인 <span>기본이론</span> 신청 ></div> 
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif 
            <div class="title NSK-Black" id="apply2">2. 2022/23년 대비 온라인 <span>심화이론</span> 신청 ></div>     
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>2))
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