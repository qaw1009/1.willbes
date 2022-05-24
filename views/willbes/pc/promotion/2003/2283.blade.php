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
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

        /************************************************************/
                
        .sky {position:fixed;top:200px;right:15px;z-index:200;}
        .sky a {display:block;margin-top:10px;}

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/07/2283_top_bg.jpg) no-repeat center top} 

        .evt02 {background:#f0f0f0}

        .evt04 {padding-bottom:100px;}

    </style>
    
    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evtTop" data-aos="fade-left">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/07/2283_top.jpg" alt="교정학 함다올"/>
                <a href="https://pass.willbes.net/professor/show/cate/3019/prof-idx/51264?subject_idx=1120" target="_blank" title="교수홈" style="position: absolute; left: 83.93%; top: 72.04%; width: 9.46%; height: 8.67%; z-index: 2; "></a>
            </div>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2283_01.jpg" alt="경쟁률과 합격선"/>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2283_02.jpg" alt="집중 커리큘럼"/>
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/07/2283_03.jpg" alt="교정학 함다올을 선택하라"/>
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2022/05/2283_04.jpg" alt="수강신청"/>
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