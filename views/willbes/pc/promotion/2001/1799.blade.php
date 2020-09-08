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
    .evtContent span {vertical-align:auto}
    .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

    /*****************************************************************/ 

    .skybanner {position:fixed; top:225px; right:10px; width:155px; z-index:2;}
    .skybanner a{display:block; margin-bottom:10px;}

    .evt_top {background:url(https://static.willbes.net/public/images/promotion/2020/09/1799_top_bg.jpg) no-repeat center top;}    
    .evt01 {background:#dfdfcf;}
    .evt02 {background:#dfdfcf; padding-bottom:120px}
    .evt02 a {display:block; height:64px; line-height:64px; color:#fff; font-size:28px; font-weight:bold; text-align:center; border-radius:50px; 
        background:#000; width:460px; margin:50px auto}
    .evt02 a:hover {background:#1a80cb}
    </style>

    <div class="evtContent NGR" id="evtContainer">  
        <div class="skybanner">
            <a href="#evt01"><img src="https://static.willbes.net/public/images/promotion/2020/09/1799_sky01.png" alt="수강후기 이벤트"></a>
            <a href="#evt02"><img src="https://static.willbes.net/public/images/promotion/2020/09/1799_sky02.png" alt="필기합격수기 이벤트"></a>
        </div>

        <div class="evtCtnsBox evt_top">  
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1799_top.jpg" alt="경찰 합격수기 공모">
        </div>

        <div class="evtCtnsBox evt01" id="evt01">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1799_01.jpg" alt="수강후기 이벤트">
        </div>  

        <div class="evtCtnsBox evt02" id="evt02">
            <img src="https://static.willbes.net/public/images/promotion/2020/09/1799_02.jpg" alt="필기합격수기 이벤트">
            <a href="#none" onclick="javascript:popup();">내 합격수기 등록하기  ></a>
        </div>               
    </div>
    <!-- End Container --> 

    <script>
        function popup(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','') !!}
            var url = "{{ site_url('/pass/promotion/popup/' . $arr_base['promotion_code']) .'?cert='. $arr_promotion_params['cert'] }}";
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=868,height=630');
        }
    </script>
@stop