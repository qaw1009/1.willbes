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


        .evtTop {background:url(https://static.willbes.net/public/images/promotion/2021/12/2488_top_bg.jpg) no-repeat center top;}
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2021/12/2488_01_bg.jpg) no-repeat center top;}

        .evt02 {background:#cc3d43}

        .evt03 {background:#e8e1d7;}

        /************************************************************/     

    </style> 

    <div class="evtContent NSK" id="evtContainer">
		<div class="evtCtnsBox evtTop" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2488_top.jpg" alt="소방직 단원 문풀" />
                <a href="#lecpkg" title="" style="position: absolute; left: 13.13%; top: 76.91%; width: 36.96%; height: 8.99%; z-index: 2;"></a>
            </div>
		</div>

        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2488_01.jpg" alt="효과" />       
		</div>       

        <div class="evtCtnsBox evt02" data-aos="fade-up">          
            <img src="https://static.willbes.net/public/images/promotion/2021/12/2488_02.jpg" alt="수강후기">
		</div>

        <div class="evtCtnsBox evt03" data-aos="fade-up" id="lecpkg">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/12/2488_03.jpg" alt="수강신청"/>
                <a href="https://pass.willbes.net/package/show/cate/3023/pack/648001/prod-code/189663" target="_blank" alt="공채 패키지" style="position: absolute; left: 15.98%; top: 73.11%; width: 26.79%; height: 6.5%; z-index:2;"></a>
                <a href="https://pass.willbes.net/package/show/cate/3023/pack/648001/prod-code/189664" target="_blank" alt="경채 패키지" style="position: absolute; left: 56.96%; top: 73.01%; width: 26.79%; height: 6.5%; z-index:2;"></a>
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