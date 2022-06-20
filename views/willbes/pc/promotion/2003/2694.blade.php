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
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/
        /************************************************************/

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2022/06/2694_top_bg.jpg) no-repeat center top;}
        .wb_01 span {position:absolute; left:50%; top:-200px; margin-left:-235px; z-index: 2;}

        .wb_01 {background:#ffe1c8;}
        .wb_02 {background:#242424;}
        .wb_03 {background:#ffcf00; padding-bottom:130px}
        .wb_03 a {display:block; width:600px; margin:30px auto 0; font-size:30px; background:#000; color:#fff; padding:20px 0; text-align:center; border-radius:50px; animation: colorBlink 1s ease-in-out infinite}
        .wb_04 {background:#335ce8;}

        @@keyframes colorBlink {
        0% {background:#335ce8;}
        80% {background:#000;}
        100% {background:#335ce8;}
        }
         
    </style>

    <div class="evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top" data-aos="fade-up">            
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2694_top.jpg" alt="기초입문 무료배포"/>                         
        </div>

        <div class="evtCtnsBox wb_01">
            <span data-aos="fade-down-left" data-aos-duration="500"><img src="https://static.willbes.net/public/images/promotion/2022/06/2694_top_img.png" alt=""/> </span> 
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2694_01.jpg" alt="기초입문" data-aos="fade-up"/>
		</div>

        <div class="evtCtnsBox wb_02">            
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2694_02.jpg" alt="30일간 무료" data-aos="fade-up"/>              
		</div>

        <div class="evtCtnsBox wb_03"> 
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2694_03.jpg"  alt="신청"  data-aos="fade-up"/> 
            <a href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/198488" class="NSK-Black">지금 바로 무료로 받기 ▶</a>      
        </div>

        <div class="evtCtnsBox wb_04">
            <img src="https://static.willbes.net/public/images/promotion/2022/06/2694_04.jpg"  alt="소문내기 이벤트" data-aos="fade-up"/>  
		</div>

        <div class="evtCtnsBox mb100">
            {{--홍보url--}}
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.pc.promotion.show_comment_list_url_partial',array('bottom_cafe_type'=>'N'))
            @endif
		</div>


    </div>

    <!-- End Container -->

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $(document).ready(function(){AOS.init();});
    </script>   
    
@stop