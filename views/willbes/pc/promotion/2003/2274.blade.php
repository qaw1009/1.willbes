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
        .sky {position:fixed; top:200px; right:10px; z-index:1;}
        .sky a {display:block; margin-bottom:10px;}

        .wb_top {background:url(https://static.willbes.net/public/images/promotion/2021/09/2274_top_bg.jpg) no-repeat center top;}

        .wb_cts01 {background:#FFF;}
        
        .wb_cts02 {background:#0D8C9F;}

        .wb_cts03 {background:#FFF;}

        .wb_cts04 {background:#ebebeb;}    

    </style>


    <div class="evtContent NSK" id="evtContainer">
        <div class="sky" id="QuickMenu">
            <a href="#evt04"><img src="https://static.willbes.net/public/images/promotion/2022/07/2274_quick.png"/></a>
        </div>

        <div class="evtCtnsBox wb_top" >            
            <img src="https://static.willbes.net/public/images/promotion/2022/07/2274_top.jpg" alt="이론 패키지" data-aos="fade-up"/>            
        </div>

        <div class="evtCtnsBox wb_cts01" >
            <img src="https://static.willbes.net/public/images/promotion/2022/07/2274_01.jpg" alt="윌비스 이론" data-aos="fade-right"/>
        </div>

        <div class="evtCtnsBox wb_cts02" >            
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2274_02.jpg" alt="초반 이론 학습" data-aos="fade-left"> 
        </div>

        <div class="evtCtnsBox wb_cts03" >            
            <img src="https://static.willbes.net/public/images/promotion/2021/09/2274_03.jpg" alt="이런 분들이 수강하시면 좋아요." data-aos="fade-right"/>
        </div>

        <div class="evtCtnsBox wb_cts04" id="evt04">       
            <div class="wrap" data-aos="fade-up">     
                <img src="https://static.willbes.net/public/images/promotion/2022/07/2274_04.jpg" alt="본인에게 딱 맞는 학습 전략" />
                <a href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/199948" target="_blank" title="공통" style="position: absolute; left: 71.61%; top: 23.01%; width: 20.89%; height: 2.97%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/199908" target="_blank" title="행정직" style="position: absolute; left: 7.32%; top: 52.24%; width: 20.89%; height: 2.97%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/package/show/cate/3022/pack/648001/prod-code/199906" target="_blank" title="세무직" style="position: absolute; left: 39.46%; top: 52.24%; width: 20.89%; height: 2.97%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/package/show/cate/3023/pack/648001/prod-code/199907" target="_blank" title="소방직" style="position: absolute; left: 71.7%; top: 52.24%; width: 20.89%; height: 2.97%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/package/show/cate/3024/pack/648001/prod-code/199909" target="_blank" title="군무원" style="position: absolute; left: 7.32%; top: 83.67%; width: 20.89%; height: 2.97%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/199724" target="_blank" title="축산직" style="position: absolute; left: 39.46%; top: 83.67%; width: 20.89%; height: 2.97%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/package/show/cate/3028/pack/648001/prod-code/199723" target="_blank" title="조경직" style="position: absolute; left: 71.7%; top: 83.67%; width: 20.89%; height: 2.97%; z-index: 2;"></a>
            </div>     
        </div>
    </div>
    <!-- End Container -->

    
    <link href="/public/js/willbes/dist/aos.css" rel="stylesheet">
    <script src="/public/js/willbes/dist/aos.js"></script>
    <script>
      $(document).ready( function() {
        AOS.init();
      });
    </script>

@stop