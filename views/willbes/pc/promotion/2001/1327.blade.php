@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- Container -->
    <style type="text/css">
    .subContainer {
        min-height:auto !important;
        margin-bottom:0 !important;
    }
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
    .evt_top {background:url(https://static.willbes.net/public/images/promotion/2019/07/1327_top_bg.jpg) no-repeat center top;}
    .evt_top div {width:1120px; margin:0 auto; animation:upDown 1s infinite;-webkit-animation:upDown 1s infinite;}
    @@keyframes upDown{
    0%{background-color:#7cffff}
    25%{background-color:#fccdff}
    50%{background-color:#68ed60}
    75%{background-color:#f8f3b3}
    100%{background-color:#fff}
    }
    @@-webkit-keyframes upDown{
    0%{background-color:#7cffff}
    25%{background-color:#fccdff}
    50%{background-color:#68ed60}
    75%{background-color:#f8f3b3}
    100%{background-color:#fff}
    }
    .evt01 {background:#a9a4a0 url(https://static.willbes.net/public/images/promotion/2019/07/1327_01_bg.jpg) no-repeat center top;}
    .evt02 {background:#eeecea; padding-bottom:120px}
    .evt02 a {display:block; height:64px; line-height:64px; color:#fff; font-size:28px; font-weight:bold; text-align:center; border-radius:10px; 
        background:#000; width:460px; margin:0 auto}
    .evt02 a:hover {background:#ed1c24}
    </style>

    <div class="evtContent NGR" id="evtContainer">          
        <div class="evtCtnsBox evt_top">  
            <div><img src="https://static.willbes.net/public/images/promotion/2019/07/1327_top.png" alt="신광은 경찰팀 T-PASS"></div>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1327_01.jpg" alt="커리큘럼">
        </div>  

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2019/07/1327_02.jpg" alt="즉시 4만원 할인">
            <a href="#none" onclick="javascript:popup();">내 합격수기 등록하기  ></a>
        </div>               
    </div>
    <!-- End Container --> 

    <script>
        function popup(){
            var is_login = '{{sess_data('is_login')}}';
            if (is_login != true) {
                alert('로그인 후 이용해 주세요.');
                return;
            }

            var url = "{{ site_url('/pass/promotion/popup/' . $arr_base['promotion_code']) }}";
            window.open(url,'arm_event', 'top=100,scrollbars=yes,toolbar=no,resizable=yes,width=868,height=630');
        }
    </script>
@stop