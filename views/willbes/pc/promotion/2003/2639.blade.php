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

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/04/2639_top_bg.jpg) no-repeat center;position:relative;}
        .wb_top .words{position:absolute;left:50%;top:290px;margin-left:-500px}

        .wb_01 {background:#f9faff;}

        .wb_02 {background:url(https://static.willbes.net/public/images/promotion/2022/04/2639_02_bg.jpg) no-repeat center;}

        .wb_curri {background:#f4f4f4;}

        .evt_04 {width:1120px; margin:0 auto;padding-bottom:100px;}
        .evt_04 .april {font-size:50px;margin:50px;font-weight:bold;color:#7475db}

    </style>

    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="sky" id="QuickMenu">
            <a href="#apply"> 
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2639_sky.png" alt="동형팩 바로가기" >
            </a>
            <a href="#apply"> 
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2639_sky2.png" alt="동형팩 바로가기" >
            </a>            
        </div>  

        <div class="evtCtnsBox wb_top" data-aos="fade-down">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2639_top.jpg" alt="최우영 문제풀이"  />
                <a href="https://pass.willbes.net/professor/show/cate/3028/prof-idx/50163?subject_idx=1193" title="홈 바로가기" target="_blank" style="position: absolute;left: 34.89%;top: 84.15%;width: 19.28%;height: 6.15%;z-index: 2;"></a>
                <div class="words">
                    <img src="https://static.willbes.net/public/images/promotion/2022/04/2639_title.png" alt="문구" data-aos="zoom-in">
                </div>
            </div>    
        </div>

        <div class="evtCtnsBox wb_01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2639_01.jpg" alt="후기"  />
        </div>

        <div class="evtCtnsBox wb_02" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2639_02.jpg" alt="열광하는 이유"  />
        </div>

        <div class="evtCtnsBox wb_curri" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/04/2639_curri.gif" alt="커리큘럼"  />
        </div>       

        <div class="evtCtnsBox wb_03" id="apply" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/04/2639_03.jpg" alt="수강신청하기"  />
                <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/194547" title="신청하기" target="_blank" style="position: absolute;left: 11.02%;top: 77.85%;width: 31.48%;height: 11.15%;z-index: 2;"></a>
                <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/194518" title="신청하기" target="_blank" style="position: absolute;left: 58.32%;top: 77.85%;width: 31.48%;height: 11.15%;z-index: 2;"></a> 
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