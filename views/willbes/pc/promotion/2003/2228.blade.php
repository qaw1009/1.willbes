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
            background:#fff;
        }
        .evtContent span {vertical-align:auto}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}

        /************************************************************/

        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        
        .wb_top {background:#50fec9; position:relative}
        .wb_top span {position: absolute; top:132px; left:50%; margin-left:-100px; animation:iptimg1 1.5s infinite;-webkit-animation:iptimg1 1.5s infinite;}
        @@keyframes iptimg1{
            from{top:132px;}
            50%{top:100px;}
            to{top:132px;}
        }
        @@-webkit-keyframes iptimg1{
            from{top:132px;}
            50%{top:100px;}
            to{top:132px;}
        }

        .wb_cts01 {background:#272d3b;}

        .wb_cts02 {background:#fff;}

        .wb_cts03 {background:url(https://static.willbes.net/public/images/promotion/2021/06/2228_03_bg.jpg) repeat-x left top;}

    </style>


    <div class="p_re evtContent NSK" id="evtContainer">

        <div class="evtCtnsBox wb_top">            
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2228_top.jpg" alt="군무원 행정직 실전동형모의고사" />
            <span><img src="https://static.willbes.net/public/images/promotion/2021/06/2228_top_img.png"></span>         
        </div>

        <div class="evtCtnsBox wb_cts01">
            <img src="https://static.willbes.net/public/images/promotion/2021/06/2228_01.jpg" alt="점수가 부족하다고요?"/>
        </div>

        <div class="evtCtnsBox wb_cts02">  
            <div class="wrap">           
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2228_02.jpg" alt="포인트"> 
                <a href="https://pass.willbes.net/professor/show/cate/3024/prof-idx/50157/?subject_idx=1107&subject_name=%EA%B5%AD%EC%96%B4" target="_blank"  title="오대혁 교수" style="position: absolute; left: 8.66%; top: 83.28%; width: 10%; height: 2.13%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/professor/show/cate/3024/prof-idx/50615?subject_idx=1111&subject_name=%ED%96%89%EC%A0%95%EB%B2%95" target="_blank"  title="이석준 교수" style="position: absolute; left: 40.27%; top: 83.28%; width: 10%; height: 2.13%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/professor/show/cate/3024/prof-idx/50559?subject_idx=1112&subject_name=%ED%96%89%EC%A0%95%ED%95%99" target="_blank"  title="김덕관 교수" style="position: absolute; left: 69.82%; top: 83.28%; width: 10%; height: 2.13%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox wb_cts03">      
            <div class="wrap">      
                <img src="https://static.willbes.net/public/images/promotion/2021/06/2228_03.jpg" alt="실전 동형모의고사 패키지"/>
                <a href="https://pass.willbes.net/package/show/cate/3023/pack/648001/prod-code/182716" target="_blank" title="신청하기" style="position: absolute; left: 78.75%; top: 64.28%; width: 14.73%; height: 14.05%; z-index: 2;"></a>
            </div>
            @if(empty($arr_base['display_product_data']) === false)
                @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
            @endif          
        </div>
    </div>
    <!-- End Container -->


@stop