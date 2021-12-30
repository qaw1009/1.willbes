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

        /************************************************************/ 


        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/12/2486_top_bg.jpg) no-repeat center top;}

        .evt02 {background:#f5f5f5}

        .evt04 {background:#323943;}

        /************************************************************/     

    </style> 

    <div class="evtContent NSK" id="evtContainer">
		<div class="evtCtnsBox evtTop" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2486_top.jpg" alt="9급 단원별 문풀" />
		</div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2486_01.jpg" alt="본인 취약점 점검" />       
		</div>       

        <div class="evtCtnsBox evt02" data-aos="fade-up">          
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2486_02.jpg" alt="윌비스 교수진">
		</div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2486_03.jpg" alt="성적 상승과 합격" />
		</div>

        <div class="evtCtnsBox evt04" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2486_04.jpg" alt="절대 만족 후기"/>
                <a href="https://pass.willbes.net/package/show/cate/3023/pack/648001/prod-code/189658" target="_blank" title="행정학 김철 패키지" style="position: absolute; left: 17.59%; top: 47.12%; width: 26.7%; height: 4.06%; z-index:2;"></a>
                <a href="https://pass.willbes.net/package/show/cate/3023/pack/648001/prod-code/189657" target="_blank" title="행정학 김덕관 패키지" style="position: absolute; left: 55.54%; top: 47.12%; width: 26.7%; height: 4.06%; z-index:2;"></a>
                <a href="https://pass.willbes.net/package/show/cate/3023/pack/648001/prod-code/189667" target="_blank" title="세무직 패키지" style="position: absolute; left: 17.59%; top: 82.26%; width: 26.7%; height: 4.06%; z-index:2;"></a>
                <a href="https://pass.willbes.net/package/show/cate/3023/pack/648001/prod-code/189665" target="_blank" title="국영한 패키지" style="position: absolute; left: 55.54%; top: 82.26%; width: 26.7%; height: 4.06%; z-index:2;"></a>
            </div>
		</div>

        @if(empty($arr_base['display_product_data']) === false)
            @include('willbes.pc.promotion.display_product_partial',array('group_num'=>1))
        @endif   
        

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