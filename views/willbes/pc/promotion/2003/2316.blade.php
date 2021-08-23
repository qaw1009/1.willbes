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

        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/08/2316_top_bg.jpg) no-repeat center top} 
        .evtTop .wrap span {position:absolute; left:50%; z-index:1}
        .evtTop .wrap span.img01 {width:227px; top:83px; margin-left:-431px; z-index:2}
        .evtTop .wrap span.img02 {width:303px; top:73px; margin-left:50px; z-index:2}
        .evtTop .wrap span.img03 {width:203px; top:203px; margin-left:225px; z-index:2}

        .evt03 {background:#F4F4F4}

        .evt04 {background:#7A26D6}

    </style> 


    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox evtTop" data-aos="fade-left">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2316_top.jpg" alt="손영민 교육학"/>
                <a href="https://pass.willbes.net/professor/show/cate/3019/prof-idx/51269?subject_idx=1131" target="_blank" title="교수홈" style="position: absolute;left: 70.38%;top: 84.6%;width: 16.57%;height: 5.31%;z-index: 2; "></a>
                <span data-aos="zoom-in-down" data-aos-duration="1000" class="img01"><img src="https://static.willbes.net/public/images/promotion/2021/08/2316_top_img01.png" alt=""/></span>
                <span data-aos="zoom-in-down" data-aos-duration="500" class="img02"><img src="https://static.willbes.net/public/images/promotion/2021/08/2316_top_img02.png" alt=""/></span>
                <span data-aos="zoom-in-down" data-aos-duration="1500" class="img03"><i><img src="https://static.willbes.net/public/images/promotion/2021/08/2316_top_img03.png" alt=""/></span>
            </div>
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-right">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2316_01.jpg" alt="공무원 한국사는 다르게 준비해야 합니다."/>
        </div>

        <div class="evtCtnsBox evt02" data-aos="fade-left">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2316_02.jpg" alt="3단계"/>
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-right">
            <img src="https://static.willbes.net/public/images/promotion/2021/08/2316_03.jpg" alt="커리큘럼"/>
        </div>

        <div class="evtCtnsBox evt04" data-aos="fade-left">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/08/2316_04.jpg" alt=""/>    
                <a href="https://pass.willbes.net/lecture/show/cate/3019/pattern/only/prod-code/184119" target="_blank" title="지금바로수강하기" style="position: absolute;left: 13.46%;top: 66.95%;width: 39.5%;height: 11.78%;z-index: 2;"></a>                
            </div>            

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