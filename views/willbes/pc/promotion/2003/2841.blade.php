@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
    .evtContent { 
        position:relative;            
        width:100% !important;
        margin-top:20px !important;
        padding:0 !important;
        background:#fff;
    }	
    .evtContent span {vertical-align:top}
    .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative}        
    .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}

    /*****************************************************************/

    .evt_top {background:url(https://static.willbes.net/public/images/promotion/2022/12/2841_top_bg.jpg) no-repeat center top;}

    .passbuy {padding-bottom:50px;}
    .passbuy a {display:block; width:825px; margin:0 auto; background:#000; color:#fff; font-size:45px; border-radius:50px; padding:25px 0; font-weight:bold}  
    .passbuy a:hover {background:#A11C12; color:#fff;}

    .evt03 {background:#7F1E03;padding:50px 0;}

    </style>

    <div class="evtContent NSK">

        <div class="evtCtnsBox evt_top" data-aos="fade-down">  
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2841_top.jpg" title="형사소송법 조문특강">
        </div>
        
        <div class="evtCtnsBox evt01" data-aos="fade-up">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2022/12/2841_01.jpg" title="일정">
                <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/202995" target="_blank" title="접수 바로가기" style="position: absolute;left: 7.99%;top: 62.63%;width: 9.76%;height: 2.79%;z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt02 pb50" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2841_02.jpg" title="조문특강">
            <div class="passbuy">
                <a href="https://pass.willbes.net/lecture/show/cate/3035/pattern/only/prod-code/202995" target="_blank">접수 바로가기 →</a>
            </div>
        </div>

        <div class="evtCtnsBox evt03" data-aos="fade-up">
            <img src="https://static.willbes.net/public/images/promotion/2022/12/2841_03.jpg" title="23년도 시험일까지 무료수강">
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