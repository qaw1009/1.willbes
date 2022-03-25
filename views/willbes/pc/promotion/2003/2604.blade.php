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

        .sky {position:fixed; top:125px;right:10px;z-index:10;}
        .sky a {display:block;margin-bottom:10px;}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/03/2604_top_bg.jpg) no-repeat center;}

        .wb_02 {background:#F4F4F4;}

        .evt_04 {width:1120px; margin:0 auto;padding-bottom:100px;}
        .evt_04 .april {font-size:50px;margin:50px;font-weight:bold;color:#7775E0}
        .evt_04 .april span {color:#0f3e81}
        .evt_04 .title {font-size:26px; text-align:left; margin:80px 0 20px}
        .evt_04 .title span {color:#0f3e81;  box-shadow:inset 0 -20px 0 rgba(252,87,119,.1)}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <a href="#apply"> 
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2604_sky1.png" alt="일반행정9급" >
            </a>    
            <a href="#apply"> 
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2604_sky2.png" alt="세무직9급" >
            </a>          
        </div>  

        <div class="evtCtnsBox wb_top" data-aos="fade-down">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2604_top.jpg" alt="실력향상 문제풀이"  />
        </div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2604_01.jpg" alt="후기"  />
        </div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/03/2604_02.jpg" alt="성적상승과 합격을 경험"  />
        </div>        

        <div class="evtCtnsBox wb_03" id="apply" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/03/2604_03.jpg" alt="수강신청하기"  />
                <a href="https://pass.willbes.net/package/show/cate/3023/pack/648001/prod-code/192914" title="일반행정9급" target="_blank" style="position: absolute;left: 10.92%;top: 80.55%;width: 30.98%;height: 7.15%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/package/show/cate/3023/pack/648001/prod-code/192924" title="세무직9급" target="_blank" style="position: absolute;left: 58.42%;top: 80.55%;width: 30.98%;height: 7.15%;z-index: 2;"></a> 
            </div>
        </div>

        <div class="evtCtnsBox evt_04"  data-aos="fade-up">
            <p class="april">강좌 바로가기</p>            
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