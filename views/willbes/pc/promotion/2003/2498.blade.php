@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

    /*****************************************************************/

        .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/05/2498_top_bg.jpg) no-repeat center top;}

        .evt_01 {background:url(https://static.willbes.net/public/images/promotion/2022/05/2498_01_bg.jpg) no-repeat center top;}

        .evt_02 {background:#ebe2d4}

        .evt_03 {background:url(https://static.willbes.net/public/images/promotion/2022/05/2498_03_bg.jpg) no-repeat center top;}

        .evt_04 {background:#ebe2d4}

        .evt_05 {width:1120px; margin:0 auto; padding-bottom:100px}

        .evt_05 .title {font-size:70px; color:#333; line-height:1.2; margin:100px 0 50px;}
        .evt_05 .lecwrap {font-size:20px; border:3px solid #1e1e1e; padding:30px 50px; position: relative; text-align:left; width:980px; margin:0 auto}
        .evt_05 .lecwrap > span {background:#1e1e1e; color:#fff; font-size:24px; padding:10px 30px; position:absolute; top:-22px; left:20px; width:auto; border-radius:30px; z-index: 2;}
        .evt_05 .lecwrap > div {border-bottom:1px solid #ccc; padding:20px 0; position: relative;}
        .evt_05 .lecwrap > div a {display:inline-block; background:#2a4aaa; color:#fff; padding:10px 20px; position:absolute; right:0; top:10px; font-size:18px}
        .evt_05 .lecwrap > div a:hover {background:#1e1e1e; color:#fff;}
        .evt_05 .lecwrap > div:last-child {border:0} 

    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evt_top" data-aos="fade-down">  
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2498_top.jpg" alt="" />
        </div>

        <div class="evtCtnsBox evt_01" data-aos="fade-up">  
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2498_01.jpg" alt="" />
        </div>

        <div class="evtCtnsBox evt_02" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/05/2498_02.jpg" alt="" />
                <a href="https://pass.willbes.net/support/notice/show/cate/3019?board_idx=335962&s_cate_code=3103" target="_blank" alt="" style="position: absolute; left: 32.68%; top: 90.01%; width: 34.79%; height: 4.5%; z-index:2;"></a>
            </div>
        </div>   

        <div class="evtCtnsBox evt_03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2498_03.jpg" alt="" />           
        </div> 

        <div class="evtCtnsBox evt_04" data-aos="fade-up">  
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2498_04.jpg" alt="" />
        </div>  
        
        <div class="evtCtnsBox evt_05" data-aos="fade-up">  
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2498_05.jpg" alt="" />
            <div class="lecwrap">
                <span>학원실강+동영상</span>
                <div>
                    7급 PSAT MASTER CLASS PASS반
                    <a href="https://pass.willbes.net/pass/offPackage/index?cate_code=3143" target="_blank">수강신청하기 ></a>
                </div>
                <div>
                    7급 PSAT MASTER CLASS 단과반
                    <a href="https://pass.willbes.net/pass/offLecture/index?cate_code=3143" target="_blank">수강신청하기 ></a>
                </div>              
            </div>

            <div class="lecwrap mt50">
                <span>동영상</span>
                <div>
                    7급 PSAT MASTER CLASS PASS반
                    <a href="https://pass.willbes.net/package/show/cate/3103/pack/648002/prod-code/194897" target="_blank">수강신청하기 ></a>
                </div>
                <div>
                    7급 PSAT MASTER CLASS 단과반
                    <a href="https://pass.willbes.net/userPackage/show/cate/3103/prod-code/194900" target="_blank">수강신청하기 ></a>
                </div>               
            </div>
        </div>      
         
    </div>

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      $( document ).ready( function() {
        AOS.init();
      } );    
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')

   <!-- End Container -->

@stop