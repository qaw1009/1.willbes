@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <!-- Container -->
    <style type="text/css">
        .evtContent {
            width:100%;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:20px auto 0;
            padding:0 !important;
            background:#fff;     
            font-size:14px;       
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position: relative;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a {border:1px solid #000}*/

        /************************************************************/

        .evtTop {background:#ff7c50 url(https://static.willbes.net/public/images/promotion/2022/11/2832_top_bg.jpg) no-repeat center top; height:970px}
        .evtTop span {position: absolute; bottom:0; left:50%;}
        .evtTop span.img01 {margin-left:-650px}
        .evtTop span.img02 {margin-left:300px}
        .evt01 {background:#2a5391;}
        .evt03 {background:#f4f4f4;}        
    </style>

    <div class="evtContent NSK">  
        <div class="evtCtnsBox evtTop">           
            <span class="img01" data-aos="fade-right"><img src="https://static.willbes.net/public/images/promotion/2022/11/2832_top_img01.png" alt="" /></span>       
            <span class="img02" data-aos="fade-left"><img src="https://static.willbes.net/public/images/promotion/2022/11/2832_top_img02.png" alt="" /></span>          
        </div>

        <div class="evtCtnsBox evt01" data-aos="fade-up"> 
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2402_01.jpg" alt="" />
        </div>                   

        <div class="evtCtnsBox evt02" data-aos="fade-up"> 
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2831_02_01.jpg" alt="" /><br>
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2831_02_02.gif" alt="" /><br>
            <img src="https://static.willbes.net/public/images/promotion/2022/11/2832_02_03.jpg" alt="" />    
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up"> 
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/11/2832_03.jpg" alt="" />
                <a href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/202631" target="_blank" title="소방직 공채" style="position: absolute; left: 12.95%; top: 75.44%; width: 28.39%; height: 5.69%; z-index: 2;"></a>
                <a href="https://pass.willbes.net/package/show/cate/3019/pack/648001/prod-code/202632" target="_blank" title="소방직 경채" style="position: absolute; left: 57.86%; top: 75.51%; width: 28.21%; height: 5.69%; z-index: 2;"></a>
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